<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\AlamatPengiriman;
use App\Http\notification;
use PDF;
use Jenssegers\Date\Date;
use Excel;
use Session;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class AlamatPengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
      
      $this->middleware('auth');
    }
    public function index()
    {
      $data = AlamatPengiriman::paginate(10);
      $akun = AlamatPengiriman::distinct()->select('account')->orderBy('account','DESC')->get();
      return view('alamatpengiriman.index', compact('data','akun'));
    }


    public function viewUploadAlamat()
    {
     return view('alamatpengiriman.upload_from_alamat'); 
    }


    public function import(Request $request)
    {
        $this->validate($request, [
            'importData' => 'required'
        ]);

        if ($request->hasFile('importData')) {
            $path = $request->file('importData')->getRealPath();

            $data = Excel::load($path, function($reader){})->get();
            $a = collect($data);

            if (!empty($a) && $a->count()) {
                foreach ($a as $key => $value) {
                    $insert[] = [
                            'account'=> $value->account,
                            'payment_no'=> $value->payment_no,
                            'order_id'=> $value->order_id,
                            'nama_cc'=> $value->nama_cc,
                            'cq'=> $value->cq,
                            'jabatan'=> $value->jabatan,
                            'nama_gedung'=> $value->nama_gedung,
                            'lantai'=> $value->lantai,
                            'nama_jalan'=> $value->nama_jalan,
                            'kavling'=> $value->kavling,
                            'no_gedung'=> $value->no_gedung,
                            'kecamatan'=> $value->kecamatan,
                            'city'=> $value->city,
                            'provinsi'=> $value->provinsi,
                            'kode_pos'=> $value->kode_pos,
                            'aoc'=> $value->aoc,
                            'email'=> $value->email,
                            'phone_cc'=> $value->phone_cc,
                            'segment'=> $value->segment,
                            'keterangan'=> $value->keterangan

                        ];

                        AlamatPengiriman::create($insert[$key]);  
                        
                    }
                  
            };
        }
        alert()->success('Berhasil.','Data telah diimport!');
        return back();
    }

    public function format()
    {
        $data = [['account'=> null,'payment_no'=> null,'order_id'=> null,'nama_cc'=> null,'cq'=> null,'jabatan'=> null,'nama_gedung'=> null,'lantai'=> null,'nama_jalan'=> null,'kavling'=> null,'no_gedung'=> null,'kecamatan'=> null,'city'=> null,'provinsi'=> null,'kode_pos'=> null,'aoc'=> null,'email'=> null,'phone_cc'=> null,'segment'=> null,'keterangan'=> null]];    
        $fileName = 'format_upload_alamat_pengiriman';  
            

        $export = Excel::create($fileName.date('Y-m-d_H-i-s'), function($excel) use($data){
            $excel->sheet('alamatpengiriman', function($sheet) use($data) {
                $sheet->fromArray($data);
            });
        });

        return $export->download('xlsx');
    }

    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
         
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $data = $this->connection2->where('id',$id)->paginate(10);
      
      return view('alamatpengiriman.detail',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
      $datas = AlamatPengiriman::where('id',$id)->get();
      foreach($datas as $data){
          return response()->json($data);
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $id = $request->id;
        $data = array(
          'account'=> $request->account,
          'payment_no'=> $request->payment_no,
          'order_id'=> $request->order_id,
          'nama_cc'=> $request->nama_cc,
          'cq'=> $request->cq,
          'jabatan'=> $request->jabatan,
          'nama_gedung'=> $request->nama_gedung,
          'lantai'=> $request->lantai,
          'nama_jalan'=> $request->nama_jalan,
          'kavling'=> $request->kavling,
          'no_gedung'=> $request->no_gedung,
          'kecamatan'=> $request->kecamatan,
          'city'=> $request->city,
          'provinsi'=> $request->provinsi,
          'kode_pos'=> $request->kode_pos,
          'aoc'=> $request->aoc,
          'email'=> $request->email,
          'phone_cc'=> $request->phone_cc,
          'segment'=> $request->segment,
          'keterangan'=> $request->keterangan
        );
        // var_dump($data);
        // die();
        //$cek = DB::connection('oci8')->table("CDM_REQUEST_BA")->select('status')->where('id',$id)->get();

        
      $update = AlamatPengiriman::where('id',$id)->update($data);
      if($update){
        \notification('sukses','Data Berhasil Di Edit !!!');
        return redirect('data-alamat-pengiriman');
      }else{
        \notification('sukses','Data Gagal Di Edit !!!');
        return redirect('data-alamat-pengiriman');
      }
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $delete = AlamatPengiriman::where('id',$id)->delete();
        if ($delete) {
          \notification('sukses','Data Berhasil Di Hapus !!!');
          return redirect('data-alamat-pengiriman');
        }else {
          \notification('warning','Data Gagal Di Hapus !!!');
          return redirect('data-alamat-pengiriman');
        }
    }

    

    
}
