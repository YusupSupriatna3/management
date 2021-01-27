<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Biling;
use App\Http\notification;
use PDF;
use Jenssegers\Date\Date;
use Excel;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
      
      $this->connection = new Biling;
      $this->connection->setConnection('oci8');
      $this->connection1 = DB::connection('oci8')->table("CDM_REQUEST_BA");
    }
    public function index()
    {
      $data = $this->connection->orderBy('account_created','DESC')->paginate(20);
      $account = $this->connection->distinct()->select('accountnas')->orderBy('accountnas','DESC')->get();
      $created = $this->connection->distinct()->select('created_by_name')->orderBy('created_by_name','ASC')->get();
      $billaccntname = $this->connection->distinct()->select('billaccntname')->orderBy('billaccntname','ASC')->get();
      return view('billing.index',compact('data','account','created','billaccntname'));
    }

    public function jan()
    {
      $data = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202001")->orderBy('account_created','DESC')->paginate(20);
      $account = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202001")->distinct()->select('accountnas')->orderBy('accountnas','DESC')->get();
      $created = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202001")->distinct()->select('created_by_name')->orderBy('created_by_name','ASC')->get();
      $billaccntname = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202001")->distinct()->select('billaccntname')->orderBy('billaccntname','ASC')->get();
      return view('billing.index',compact('data','account','created','billaccntname'));
    }

    public function feb()
    {
      $data = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202002")->orderBy('account_created','DESC')->paginate(20);
      $account = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202002")->distinct()->select('accountnas')->orderBy('accountnas','DESC')->get();
      $created = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202002")->distinct()->select('created_by_name')->orderBy('created_by_name','ASC')->get();
      $billaccntname = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202002")->distinct()->select('billaccntname')->orderBy('billaccntname','ASC')->get();
      return view('billing.index',compact('data','account','created','billaccntname'));
    }

    public function mar()
    {
      $data = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202003")->orderBy('account_created','DESC')->paginate(20);
      $account = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202003")->distinct()->select('accountnas')->orderBy('accountnas','DESC')->get();
      $created = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202003")->distinct()->select('created_by_name')->orderBy('created_by_name','ASC')->get();
      $billaccntname = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202003")->distinct()->select('billaccntname')->orderBy('billaccntname','ASC')->get();
      return view('billing.index',compact('data','account','created','billaccntname'));
    }

    public function apr()
    {
      $data = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202004")->orderBy('account_created','DESC')->paginate(20);
      $account = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202004")->distinct()->select('accountnas')->orderBy('accountnas','DESC')->get();
      $created = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202004")->distinct()->select('created_by_name')->orderBy('created_by_name','ASC')->get();
      $billaccntname = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202004")->distinct()->select('billaccntname')->orderBy('billaccntname','ASC')->get();
      return view('billing.index',compact('data','account','created','billaccntname'));
    }

    public function mei()
    {
      $data = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202005")->orderBy('account_created','DESC')->paginate(20);
      $account = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202005")->distinct()->select('accountnas')->orderBy('accountnas','DESC')->get();
      $created = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202005")->distinct()->select('created_by_name')->orderBy('created_by_name','ASC')->get();
      $billaccntname = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202005")->distinct()->select('billaccntname')->orderBy('billaccntname','ASC')->get();
      return view('billing.index',compact('data','account','created','billaccntname'));
    }

    public function jun()
    {
      $data = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202006")->orderBy('account_created','DESC')->paginate(20);
      $account = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202006")->distinct()->select('accountnas')->orderBy('accountnas','DESC')->get();
      $created = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202006")->distinct()->select('created_by_name')->orderBy('created_by_name','ASC')->get();
      $billaccntname = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202006")->distinct()->select('billaccntname')->orderBy('billaccntname','ASC')->get();
      return view('billing.index',compact('data','account','created','billaccntname'));
    }

    public function jul()
    {
      $data = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202007")->orderBy('account_created','DESC')->paginate(20);
      $account = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202007")->distinct()->select('accountnas')->orderBy('accountnas','DESC')->get();
      $created = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202007")->distinct()->select('created_by_name')->orderBy('created_by_name','ASC')->get();
      $billaccntname = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202007")->distinct()->select('billaccntname')->orderBy('billaccntname','ASC')->get();
      return view('billing.index',compact('data','account','created','billaccntname'));
    }

    public function agus()
    {
      $data = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202008")->orderBy('account_created','DESC')->paginate(20);
      $account = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202008")->distinct()->select('accountnas')->orderBy('accountnas','DESC')->get();
      $created = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202008")->distinct()->select('created_by_name')->orderBy('created_by_name','ASC')->get();
      $billaccntname = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202008")->distinct()->select('billaccntname')->orderBy('billaccntname','ASC')->get();
      return view('billing.index',compact('data','account','created','billaccntname'));
    }

    public function sep()
    {
      $data = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202009")->orderBy('account_created','DESC')->paginate(20);
      $account = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202009")->distinct()->select('accountnas')->orderBy('accountnas','DESC')->get();
      $created = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202009")->distinct()->select('created_by_name')->orderBy('created_by_name','ASC')->get();
      $billaccntname = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202009")->distinct()->select('billaccntname')->orderBy('billaccntname','ASC')->get();
      return view('billing.index',compact('data','account','created','billaccntname'));
    }

    public function oct()
    {
      $data = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202010")->orderBy('account_created','DESC')->paginate(20);
      $account = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202010")->distinct()->select('accountnas')->orderBy('accountnas','DESC')->get();
      $created = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202010")->distinct()->select('created_by_name')->orderBy('created_by_name','ASC')->get();
      $billaccntname = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202010")->distinct()->select('billaccntname')->orderBy('billaccntname','ASC')->get();
      return view('billing.index',compact('data','account','created','billaccntname'));
    }

    public function billingperiod()
    {
      $data = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202010")->orderBy('account_created','DESC')->paginate(20);
      $account = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202010")->distinct()->select('accountnas')->orderBy('accountnas','DESC')->get();
      $created = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202010")->distinct()->select('created_by_name')->orderBy('created_by_name','DESC')->get();
      $billaccntname = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202010")->distinct()->select('billaccntname')->orderBy('billaccntname','DESC')->get();
      return view('billing.periode',compact('data','account','created','billaccntname'));
    }

    public function requesba()
    {
      $data = DB::connection('oci8')->table("CDM_REQUEST_BA")->orderBy('periode','DESC')->where('status','Waiting')->paginate(20);
      //$nipnas = DB::connection('oci8')->table("CDM_REQUEST_BA")->distinct()->select('nipnas')->orderBy('nipnas','DESC')->get();
      //$npwp = DB::connection('oci8')->table("CDM_REQUEST_BA")->distinct()->select('nama_npwp')->orderBy('nama_npwp','ASC')->get();
      return view('billing.requesba',compact('data'));
    }

    public function requesbaapproval()
    {
      $data = DB::connection('oci8')->table("CDM_REQUEST_BA_EPIC")->where('status','APPROVED')->orderBy('created_date','DESC')->paginate(10);
      //$nipnas = DB::connection('oci8')->table("CDM_REQUEST_BA_EPIC")->distinct()->select('nipnas')->orderBy('nipnas','DESC')->get();
      //$npwp = DB::connection('oci8')->table("CDM_REQUEST_BA_EPIC")->distinct()->select('nama_npwp')->orderBy('nama_npwp','ASC')->get();
      return view('billing.requesbaapproval',compact('data'));
    }

    public function requesbanonapproval()
    {
      $data = DB::connection('oci8')->table("CDM_REQUEST_BA_EPIC")->where('status','NOTAPPROVED')->orderBy('created_date','DESC')->paginate(20);
      // $nipnas = DB::connection('oci8')->table("CDM_REQUEST_BA_EPIC")->distinct()->select('nipnas')->orderBy('nipnas','DESC')->get();
      // $npwp = DB::connection('oci8')->table("CDM_REQUEST_BA_EPIC")->distinct()->select('nama_npwp')->orderBy('nama_npwp','ASC')->get();
      return view('billing.requesbanonapproval',compact('data'));
    }

    public function search(Request $request)
    {
      $accountt = $request->accountnas;
      $createdd = $request->created_by_name;
      $billaccntnamee = $request->billaccntname;
        $data = $this->connection->where(function ($query) use ($accountt,$createdd,$billaccntnamee){
          $query->where('accountnas','like','%'.$accountt.'%')->where('created_by_name','like','%'.$createdd.'%')->where('billaccntname','like','%'.$billaccntnamee.'%');
        })->orderBy('account_created','DESC')->paginate(20);
        
        $account = $this->connection->distinct()->select('accountnas')->orderBy('accountnas','DESC')->get();
        $created = $this->connection->distinct()->select('created_by_name')->orderBy('created_by_name','ASC')->get();
        $billaccntname = $this->connection->distinct()->select('billaccntname')->orderBy('billaccntname','ASC')->get();
        
      $data->appends($request->only('accountnas','created_by_name','billaccntname'));
      return view('billing.index',compact('data','account','created','billaccntname'));
    }

    public function viewCreateRequest()
    {
      $segment = DB::connection('oci8')->table("amdes.cbase_dives_2020")->distinct()->select('segmen')->orderBy('segmen','ASC')->get();
      $nipnas = DB::connection('oci8')->table("amdes.cbase_dives_2020")->distinct()->select('nip_nas')->orderBy('nip_nas','DESC')->get();
      $region = $this->connection->distinct()->select('region')->orderBy('region','ASC')->get();
      return view('billing.request_ba',compact('segment','nipnas','region'));
    }

    public function spliting()
    {
      $segment = DB::connection('oci8')->table("amdes.cbase_dives_2020")->distinct()->select('segmen')->orderBy('segmen','ASC')->get();
      $nipnas = DB::connection('oci8')->table("amdes.cbase_dives_2020")->distinct()->select('nip_nas')->orderBy('nip_nas','DESC')->get();
      $region = $this->connection->distinct()->select('region')->orderBy('region','ASC')->get();
      return view('billing.spliting_ba',compact('segment','nipnas','region'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
         
      $status = 'pending';

      $file = $request->file('file_npwp');
      $file1 = $request->file('file_sphb');
      $file2 = $request->file('file_excel');
      $file3 = $request->file('file_add1') ?? false;
      $file4 = $request->file('file_add2') ?? false;

    $nama_file = time()."_".$file->getClientOriginalName();
    $nama_file1 = time()."_".$file1->getClientOriginalName();
    $nama_file2 = time()."_".$file2->getClientOriginalName();
    $nama_file3 = $file3 ? time()."_".$file3->getClientOriginalName() : null;
    $nama_file4 = $file4 ? time()."_".$file4->getClientOriginalName() : null;

      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'billing';
    $file->move($tujuan_upload,$nama_file);
    $file1->move($tujuan_upload,$nama_file1);
    $file2->move($tujuan_upload,$nama_file2);
    
    if (!is_null($nama_file3) && !is_null($nama_file4)) {
        $file3->move($tujuan_upload,$nama_file3);
        $file4->move($tujuan_upload,$nama_file4);
    }

      $data = array(
        'id' => null,
        'segmen' => $request->segmen,
        'nipnas' => $request->nipnas,
        'nama_npwp' => $request->nama_npwp,
        'taxnumber' => $request->taxnumber,
        'alamat_npwp' => $request->alamat_npwp,
        'kecamatan_npwp' => $request->kecamatan_npwp,
        'kota_npwp' => $request->kota_npwp,
        'provinsi_npwp' => $request->provinsi_npwp,
        'alamat_tagihan' => $request->alamat_tagihan,
        'kecamatan_tagihan' => $request->kecamatan_tagihan,
        'kota_tagihan' => $request->kota_tagihan,
        'provinsi_tagihan' => $request->provinsi_tagihan,
        'main_phone' => $request->main_phone,
        'region' => $request->region,
        'pic' => $request->pic,
        'telpon_pic' => $request->telpon_pic,
        'job_title' => $request->job_title,
        'email' => $request->email,
        'work_phone' => $request->work_phone,
        'mobile_phone' => $request->mobile_phone,
        'periode' => date('mY'),
        'status' => $status,
        'file_npwp' =>$nama_file,
        'file_sphb' =>$nama_file1,
        'file_excel' =>$nama_file2,
        'file_add1' =>$nama_file3,
        'file_add2' =>$nama_file4
        );
      
      
       
      $insert = DB::connection('oci8')->table("CDM_REQUEST_BA")->insert($data);
      return redirect('home');
    }

    public function download1($file_npwp){
      
      $filePath = public_path('billing/'.$file_npwp);
      $headers = ['Content-Type: application/pdf'];
      $fileName = time().$file_npwp.'.pdf';

      // echo "<pre>";
      // print_r($fileName);
      // echo "</pre>";
      // die();
      return response()->download($filePath, $fileName, $headers);
      
    }

    public function download2($file_sphb){
      
      $filePath = public_path('billing/'.$file_sphb);
      $headers = ['Content-Type: application/pdf'];
      $fileName = time().$file_sphb.'.pdf';

      return response()->download($filePath, $fileName, $headers);
      
    }

    public function download3($file_excel){
      
      $filePath = public_path('billing/'.$file_excel);
      $headers = ['Content-Type: application/xlsx'];
      $fileName = time().$file_excel.'.xlsx';

      return response()->download($filePath, $fileName, $headers);
      
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $datas = $this->connection1->where('id',$id)->get();
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
          'status' => $request->status
        );
        // var_dump($data);
        // die();
        //$cek = DB::connection('oci8')->table("CDM_REQUEST_BA")->select('status')->where('id',$id)->get();

        
      $update = $this->connection1->where('id',$id)->update($data);
      if($update){
        return redirect('data-requestba');
      }else{
        echo"yusup mansur";
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
      
    }

    
}
