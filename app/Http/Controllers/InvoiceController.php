<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Invoice;
use App\Invoice1;
use App\Mybrains;
use App\Http\notification;
use PDF;
use Jenssegers\Date\Date;
use Excel;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
      $this->middleware('auth');
      $this->connection = new Invoice;
      $this->connection->setConnection('oci8');
      $this->connection1 = new Mybrains;
      $this->connection1->setConnection('oci8');
      $this->connection2 = DB::connection('oci8')->table("CDM_UPLOAD_TAHAP_AWAL");
      $this->connection3 = DB::connection('oci8')->table("CDM_UPLOAD_TAHAP_CETAK");
      $this->connection4 = DB::connection('oci8')->table("CDM_UPLOAD_TAHAP_KIRIM");
      $this->connection5 = DB::connection('oci8')->table("CDM_INVOICE_AWAL");
      $this->connection6 = DB::connection('oci8')->table("CDM_INVOICE_CETAK");
      $this->connection7 = DB::connection('oci8')->table("CDM_INVOICE");
    }
    public function index()
    {
      
      return view('invoice.index');
    }

    public function dashboardsystem()
    {
      
      $system       = DB::connection('oci8')->table("CDM_INVOICE")->select(DB::raw('sum(bill_lcamount) as bill_lcamount'))->where('invoice_status','S')->get();
      $jumsystem    = DB::connection('oci8')->table("CDM_INVOICE")->select(DB::raw('count(id) as jumlah_lcamount'))->where('invoice_status','S')->get();

            return view('invoice.dashboardsystem',compact('system','jumsystem'));
    }
    
    public function dashboardcustom()
    {
      
      $custom       = DB::connection('oci8')->table("CDM_INVOICE")->select(DB::raw('sum(nilai_custome) as nilai_custome'))->where('invoice_status','C')->get();
      $jumcustom    = DB::connection('oci8')->table("CDM_INVOICE")->select(DB::raw('count(id) as jumlah_custome'))->where('invoice_status','C')->get();

            return view('invoice.dashboardcustom',compact('custom','jumcustom'));
    }

    public function getcari(Request $request)
    {
        if ($request->has('q')) {
          $parameter  = $request->q;
          $invoice    = DB::connection('oci8')->table("CDM_INVOICE")->distinct()
                      ->select('account_number','bpnumber','customer_name')
                      ->where('account_number', 'like', '%'.$parameter.'%')
                      ->orWhere('bpnumber', 'like', '%'.$parameter.'%')
                      ->orWhere('customer_name', 'like', '%'.$parameter.'%')
                      ->orderBy('account_number','DESC')->limit(5)->get();

          return response()->json(["data" => $invoice, "message" => "get data successfully", "status" => 200]);
        }
    }

    

    public function search(Request $request)
    {
      //dd($request->all());
      $accountt   = $request->no_akun;
      $custname   = $request->cus_name;
      $bpno       = $request->bp_number;

      $data      = DB::connection('oci8')->table("CDM_INVOICE")
                    ->where('account_number', 'like', '%'.$accountt.'%')
                    ->where('bpnumber', 'like', '%'.$bpno.'%')
                    ->where('customer_name', 'like', '%'.$custname.'%')
                    ->orderBy('cl_period','DESC')->limit(10)->get();
      $data = $this->paginate($data);

      // $alamat    = DB::connection('oci8')->table("cdm_invoice_alamat_pengiriman")
      //               ->where('account_number', 'like', '%'.$accountt.'%')->get();

      $data->appends($request->only('no_akun','cus_name','bp_number')); 
      

      return view('invoice.hasil',compact('data'));
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function paginate($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    /**
     * master -> local -> view
     * -> list master
     * -> list local
     * get master     (collect with local)
     * get data local (collect with master)
     * account_nummber master axist on master
     * 
     */ 

    public function edit($id)
    {

      $data = DB::connection('oci8')->table("CDM_INVOICE")->where('id',$id)->get();
      $ket = DB::connection('oci8')->table("cdm_alasan_manual")->select('keterangan')->orderBy('id','asc')->get();
      // echo"<pre>";
      //   print_r($ket);
      // echo"</pre>";
      // die();
      // var_dump($ket);
      // die();
      // foreach($ket as $ketr):
      //   print_r($ketr->keterangan);
      // endforeach;
      // die();

      return view('invoice.view_edit_invoice', compact('data','ket'));


    }


    public function update(Request $request)
    {

      $file = $request->file('scan')?? false;
      $nama_file = $file ? time()."_".$file->getClientOriginalName() : null;
      $destination = base_path().'/public/invoice';

      if (!is_null($nama_file)) {
        $file->move($destination, $nama_file);
      }
      
      
  
      $id = $request->id;
        $data = array(
          'invoice_status'=> $request->invoice_status,
          'nilai_custome' => $request->nilai_custome,
          'update_date' =>date("m/d/Y H:i:s", mktime(date("H") + 7)),
          'catatan'=> $request->catatan,
          'aoc'=> $request->aoc,
          'scan' =>$nama_file,
          'no_invoice' => $request->no_invoice,
        );
        
      $update = DB::connection('oci8')->table("CDM_INVOICE")->where('id',$id)->update($data);
      
      if ($update) {
        \notification('sukses','Data Berhasil diupdate !!!');
        return redirect('data-invoice');
      }else{
        \notification('warning','Data Gagal diupdate !!!');
        return redirect()->back();
      }

     
    }

    public function editpickup($id)
    {

      $data = DB::connection('oci8')->table("CDM_INVOICE")->where('id',$id)->get();
      $kur = DB::connection('oci8')->table("cdm_kurir")->select('nama_kurir')->orderBy('id','asc')->get();
      

      return view('invoice.view_edit_pickup_invoice', compact('data','kur'));

    }

    public function updatepickup(Request $request)
    {
    
      $status = "Proses Pickup";
      $id = $request->id;
        $data = array(      
          'mitra_delivery'=> $request->mitra_delivery,
          'pickup_date' =>$request->pickup_date,
          'pickup_name'=> $request->pickup_name,
          'jabatan_pickup'=> $request->jabatan_pickup,
          'status'=> $status
        );
        
      $update = DB::connection('oci8')->table("CDM_INVOICE")->where('id',$id)->update($data);
      
      if ($update) {
        \notification('sukses','Data Berhasil diupdate !!!');
        return redirect('data-invoice');
      }else{
        \notification('warning','Data Gagal diupdate !!!');
        return redirect()->back();
      }
    }

    public function editkirim($id)
    {

      $data = DB::connection('oci8')->table("CDM_INVOICE")->where('id',$id)->get();
      $ket = DB::connection('oci8')->table("cdm_status_invoice")->select('status')->orderBy('id','asc')->get();
      

      return view('invoice.view_edit_kirim', compact('data','ket'));

    }

    public function updatekirim(Request $request)
    {
    

      
      $status = "Selesai Antar";
      $id = $request->id;
        $data = array(
          'nama_pengirim' => $request->nama_pengirim,
          'nama_penerima'=> $request->nama_penerima,
          'jabatan_penerima'=> $request->jabatan_penerima,
          'tanggal_diterima' =>$request->tanggal_diterima,
          'status'=> $status
        );
        
      $update = DB::connection('oci8')->table("CDM_INVOICE")->where('id',$id)->update($data);
      
      if ($update) {
        \notification('sukses','Invoice Selesai diantar !!!');
        return redirect('data-invoice');
      }else{
        \notification('warning','Data Gagal diupdate !!!');
        return redirect()->back();
      }
    }

    public function reviewcustom()
    {
     return view('invoice.review1'); 
    }

    public function viewUploadInvoice()
    {
     return view('invoice.upload_from_invoice'); 
    }

    public function format()
    {
    
        $data = [['account_number'=> null,
                  'periode'=> '202009',
                  'invoice_status'=> 'C/S']];
        $fileName = 'format_update_status_invoice';  
            

        $export = Excel::create($fileName.date('Y-m-d_H-i-s'), function($excel) use($data){
            $excel->sheet('invoice', function($sheet) use($data) {
                $sheet->fromArray($data);
            });
        });

        return $export->download('xlsx');
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'importInvoice' => 'required'
        ]);
        if ($request->hasFile('importInvoice')) {
            $path = $request->file('importInvoice')->getRealPath();

            $data = Excel::load($path, function($reader){})->get();
            $reviewa = collect($data);

                  // echo"<pre>";
                  // print_r($reviewa);
                  // echo"</pre>";
                  // die();

            return view('invoice.review_upload_status', compact('reviewa'));
          }
        
    }

    public function saveimport(Request $request)
    {

            $reviewa[] = [];
            for ($i = 0; $i < count($request->reviewAcc); $i++) {
              $reviewa[$i] = [
                'account_number'=> $request->reviewAcc[$i],
                'periode'=> $request->reviewPeriod[$i],
                'invoice_status'=> $request->reviewStats[$i]
              ];

            }

            // $reviewa = collect($reviewa);

            if (!empty($reviewa) && count($reviewa)) {
                foreach ($reviewa as $value) {

                    $update = [];
                    $update = [
                          'invoice_status'=> $value['invoice_status']
                        ];

                  //       echo"<pre>";
                  // print_r($update);
                  // echo"</pre>";
                  // die();

                    DB::connection('oci8')->table("CDM_INVOICE")->where('account_number',$value['account_number'])                   
                                      ->where('periode',$value['periode'])
                                      ->update($update);
                        
                }
            };
        
                    return redirect('home');
    }

    public function viewUploadCustome()
    {
     return view('invoice.upload_from_custome_invoice'); 
    }

    public function formatcustome()
    {
    
        $data = [['account_number'=> null,
                  'periode'=> '202009',
                  'nilai_custome'=> null,
                  'catatan'=> null,
                  'aoc'=> null,
                  'no_invoice'=> null]];
        $fileName = 'format_update_invoice_custome';  
            

        $export = Excel::create($fileName.date('Y-m-d_H-i-s'), function($excel) use($data){
            $excel->sheet('invoice', function($sheet) use($data) {
                $sheet->fromArray($data);
            });
        });

        return $export->download('xlsx');
    }

    public function importcustome(Request $request)
    {

      $this->validate($request, [
        'importInvoice' => 'required',
        'importPdf' => 'required'
      ]);

      // $countfiles = count($_FILES['file']['name']);

      // // Looping all files
      // for($i=0;$i<$countfiles;$i++){
      //   $filename = $_FILES['file']['name'][$i];
 
      // // Upload file
      //   move_uploaded_file($_FILES['file']['tmp_name'][$i],'upload/'.$filename);
 
      // }

      $file = $request->file('importPdf')?? false;
      $nama_file = $file ? $file->getClientOriginalName() : null;
      $name = substr($nama_file, 0, (strlen($nama_file) - 4 ));
      // $destination = base_path().'/public/invoice';

      // if (!is_null($nama_file)) {
      //   $file->move($destination, $nama_file);
      // }

      

    if ($request->hasFile('importInvoice')) {
        $path = $request->file('importInvoice')->getRealPath();

        $data = Excel::load($path, function($reader){})->get();
        $reviewa = collect($data);

        foreach ($reviewa as $val) {
          if($val->no_invoice == $name) {
            $val->ket = 'Ada';
          }else{
            $val->ket = 'Ga Ada';
          }
        }

              // echo"<pre>";
              // print_r($val->ket);
              // // echo"</br>";
              // // print_r($name);
              // echo"</pre>";
              // die();        

        return view('invoice.review_upload_custom', compact('reviewa'));
      }
    }

    public function saveimportcustom(Request $request)
    {
            $reviewa[] = [];
            for ($i = 0; $i < count($request->reviewAcc); $i++) {
              $reviewa[$i] = [
                'account_number'=> $request->reviewAcc[$i],
                'periode'       => $request->reviewPeriod[$i],
                'nilai_custome' => $request->reviewNilaiCustome[$i],
                'catatan'       => $request->reviewCatatan[$i],
                'aoc'           => $request->reviewAoc[$i],
                'no_invoice'    => $request->reviewNoInvoice[$i]
              ];
            }

            if (!empty($reviewa) && count($reviewa)) {
                foreach ($reviewa as $value) {

                    $update = [];
                    $update = [
                          'nilai_custome' => $value['nilai_custome'],
                          'catatan'       => $value['catatan'],
                          'aoc'           => $value['aoc'],
                          'no_invoice'    => $value['no_invoice']
                        ];

                    DB::connection('oci8')->table("CDM_INVOICE")
                                      ->where('account_number',$value['account_number'])                   
                                      ->where('periode',$value['periode'])
                                      ->update($update);
                        
                }
            };
        
                    return redirect('home');
    }

    public function viewUploadPickup()
    {
     return view('invoice.upload_from_pickup_invoice'); 
    }

    public function formatpickup()
    {
    
        $data = [['account_number'=> null,
                  'periode'       => '202009',
                  'no_invoice'    => null,
                  'mitra_delivery'=> null,
                  'pickup_date'   => '2020-10-08',
                  'pickup_name'   => null]];
        $fileName = 'format_update_pickup_invoice';              

        $export = Excel::create($fileName.date('Y-m-d_H-i-s'), function($excel) use($data){
            $excel->sheet('invoice', function($sheet) use($data) {
                $sheet->fromArray($data);
            });
        });

        return $export->download('xlsx');
    }

    public function importpickup(Request $request)
    {
        
      $this->validate($request, [
            'importInvoice' => 'required'
        ]);
        if ($request->hasFile('importInvoice')) {
            $path = $request->file('importInvoice')->getRealPath();

            $data = Excel::load($path, function($reader){})->get();
            $reviewa = collect($data);

            return view('invoice.review_upload_pickup', compact('reviewa'));
          }
    }

    public function saveimportpickup(Request $request)
    {

            $status = "Proses Pickup";
            $reviewa[] = [];
            for ($i = 0; $i < count($request->reviewAcc); $i++) {
              $reviewa[$i] = [
                'account_number'=> $request->reviewAcc[$i],
                'periode'       => $request->reviewPeriod[$i],
                'no_invoice'    => $request->reviewNoInvoice[$i],
                'mitra_delivery'=> $request->reviewMitraDelivery[$i],
                'pickup_date'   => $request->reviewPickupDate[$i],
                'pickup_name'   => $request->reviewPickupName[$i],
                'status'        => $status
              ];
            }

            if (!empty($reviewa) && count($reviewa)) {
                foreach ($reviewa as $value) {

                    $update = [];
                    $update = [
                          'mitra_delivery'=> $value['mitra_delivery'],
                          'pickup_date'   => $value['pickup_date'],
                          'pickup_name'   => $value['pickup_name'],
                          'status'        => $value['status']
                        ];

                    DB::connection('oci8')->table("CDM_INVOICE")
                                      ->where('account_number',$value['account_number'])                   
                                      ->where('periode',$value['periode'])
                                      ->where('no_invoice',$value['no_invoice'])
                                      ->update($update);
                        
                }
            };
        
                    return redirect('home');
    }


    public function viewUploadKirim()
    {
     return view('invoice.upload_from_kirim_invoice'); 
    }

    public function formatkirim()
    {
    
        $data = [['account_number'=> null,
                  'periode'=> '202009',
                  'no_invoice'=> null,
                  'nama_pengirim'=> null,
                  'nama_penerima'=> null,
                  'jabatan_penerima'=> null,
                  'tanggal_diterima'=>'2020-10-08' ]];
        $fileName = 'format_upload_kirim_invoice';  
            

        $export = Excel::create($fileName.date('Y-m-d_H-i-s'), function($excel) use($data){
            $excel->sheet('invoice', function($sheet) use($data) {
                $sheet->fromArray($data);
            });
        });

        return $export->download('xlsx');
    }

    
    
    public function importkirim(Request $request)
    {
      $this->validate($request, [
        'importInvoice' => 'required'
    ]);
    if ($request->hasFile('importInvoice')) {
        $path = $request->file('importInvoice')->getRealPath();

        $data = Excel::load($path, function($reader){})->get();
        $reviewa = collect($data);

        return view('invoice.review_upload_kirim', compact('reviewa'));
      }
    }

    public function saveimportkirim(Request $request)
    {

            $status = "Selesai Antar";
            $reviewa[] = [];
            for ($i = 0; $i < count($request->reviewAcc); $i++) {
              $reviewa[$i] = [
                'account_number'  => $request->reviewAcc[$i],
                'periode'         => $request->reviewPeriod[$i],
                'no_invoice'      => $request->reviewNoInvoice[$i],
                'nama_pengirim'   => $request->reviewNamaPengirim[$i],
                'nama_penerima'   => $request->reviewNamaPenerima[$i],
                'jabatan_penerima'=> $request->reviewJabatanPenerima[$i],
                'tanggal_diterima'=> $request->reviewTanggalDiterima[$i],
                'status'          => $status
              ];
            }

            if (!empty($reviewa) && count($reviewa)) {
                foreach ($reviewa as $value) {

                    $update = [];
                    $update = [
                          'nama_pengirim'   => $value['nama_pengirim'],
                          'nama_penerima'   => $value['nama_penerima'],
                          'jabatan_penerima'=> $value['jabatan_penerima'],
                          'tanggal_diterima'=> $value['tanggal_diterima'],
                          'status'          => $value['status']
                        ];

                    DB::connection('oci8')->table("CDM_INVOICE")
                                      ->where('account_number',$value['account_number'])                   
                                      ->where('periode',$value['periode'])
                                      ->where('no_invoice',$value['no_invoice'])
                                      ->update($update);
                        
                }
            };
        
                    return redirect('home');
    }

    public function system()
    {
      $data = Invoice1::where('invoice_status','System')->paginate(10);
      $akun = Invoice1::distinct()->select('account')->where('invoice_status','System')->orderBy('account','DESC')->get();
      return view('invoice.index',compact('data','akun'));
    }

    public function cetakpos()
    {
   
      $data = Invoice1::where('mitra_printing','POSINDO')->paginate(10);
      $akun = Invoice1::distinct()->select('account')->where('mitra_printing','POSINDO')->orderBy('account','DESC')->get();
      return view('invoice.index',compact('data','akun'));
    }

    public function kirimpos()
    {
      $data = Invoice1::where('mitra_delivery','POSINDO')->paginate(10);
      $akun = Invoice1::distinct()->select('account')->where('mitra_delivery','POSINDO')->orderBy('account','DESC')->get();
      return view('invoice.index',compact('data','akun'));
    }

    public function sampaicc()
    {
      $data = Invoice1::where('status','SUKSES')->paginate(10);
      $akun = Invoice1::distinct()->select('account')->where('status','SUKSES')->orderBy('account','DESC')->get();
      return view('invoice.index',compact('data','akun'));
    }

    public function manual()
    {
      $data = Invoice1::where('invoice_status','Manual')->paginate(10);
      $akun = Invoice1::distinct()->select('account')->where('invoice_status','Manual')->orderBy('account','DESC')->get();
      return view('invoice.manual',compact('data','akun'));
    }

    public function cetakcdm()
    {
      $data = Invoice1::where('mitra_printing','CDM')->paginate(10);
      $akun = Invoice1::distinct()->select('account')->where('mitra_printing','CDM')->orderBy('account','DESC')->get();
      return view('invoice.index',compact('data','akun'));
    }

    public function kirimcdm()
    {
      $data = Invoice1::where('mitra_delivery','!=','POSINDO')->Orwhere('mitra_delivery',null)->paginate(10);
      $akun = Invoice1::distinct()->select('account')->where('mitra_delivery','CDM')->Orwhere('mitra_delivery','Es Segment')->Orwhere('mitra_delivery','Gosend')->Orwhere('mitra_delivery','Petty')->orderBy('account','DESC')->get();
      return view('invoice.index',compact('data','akun'));
    }

    public function belumcetak()
    {
      $data = Invoice1::where('print_status',null)->paginate(10);
      $akun = Invoice1::distinct()->select('account')->where('print_status',null)->orderBy('account','DESC')->get();
      return view('invoice.index',compact('data','akun'));
    }

    public function retur()
    {
      $data = Invoice1::where('status','RETUR')->paginate(10);
      $akun = Invoice1::distinct()->select('account')->where('status','RETUR')->orderBy('account','DESC')->get();
      return view('invoice.index',compact('data','akun'));
    }

    public function inproses()
    {
      $data = Invoice1::where('status','INPROSES')->paginate(10);
      $akun = Invoice1::distinct()->select('account')->where('status','INPROSES')->orderBy('account','DESC')->get();
      return view('invoice.index',compact('data','akun'));
    }

    public function nonpots()
    {
      $data = Invoice1::where('layanan','Non Pots')->paginate(10);
      $akun = Invoice1::distinct()->select('account')->where('layanan','Non Pots')->orderBy('account','DESC')->get();
      return view('invoice.index',compact('data','akun'));
    }

    public function pots()
    {
      $data = Invoice1::where('layanan','Pots')->paginate(10);
      $akun = Invoice1::distinct()->select('account')->where('layanan','Pots')->orderBy('account','DESC')->get();
      return view('invoice.index',compact('data','akun'));
    }

    

    

    

    public function show($id)
    {
      
      $datas = Invoice1::where('id',$id)->get();

      // return response()->json($data);
      foreach($datas as $data){
          return response()->json($data);
      }

    }




    

   

    

    public function searchmanual(Request $request)
    {
      $accountt = $request->no_akun;

        $data = Invoice1::where(function ($query) use ($accountt){
          $query->where('account','like','%'.$accountt.'%');
        })->orderBy('account','DESC')->paginate(10);
        
        
      $data->appends($request->only('no_akun'));
      $akun = Invoice1::distinct()->select('account')->orderBy('account','DESC')->get();
      return view('invoice.manual',compact('data','akun'));
    }

    
}
