<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\notification;
use PDF;
use Jenssegers\Date\Date;
use Excel;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class ApiBillingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
      //$this->middleware('auth'); 
      // $this->connection = new Biling;
      // $this->connection->setConnection('oci8');
      // $this->connection1 = DB::connection('oci8')->table("CDM_REQUEST_BA_EPIC");
    }
    public function index()
    {
      // $data = DB::connection('oci8')->table("CDM_REQUEST_BA_EPIC")->orderBy('id','DESC')->where('status','ON PROGRESS')->paginate(10);
      $data = DB::connection('oci8')->table("CDM_REQUEST_BA_EPIC")->orderBy('id','DESC')->where('status','ON PROGRESS')->where('jenis','BA LAMA')->paginate(10);
      return view('billing.requesbaepic',compact('data'));
    }

    public function indexnew()
    {
      // $data = DB::connection('oci8')->table("CDM_REQUEST_BA_EPIC")->orderBy('id','DESC')->where('status','ON PROGRESS')->paginate(10);
      $data = DB::connection('oci8')->table("CDM_REQUEST_BA_EPIC")->orderBy('id','DESC')->where('status','ON PROGRESS')->where('jenis','BA BARU')->paginate(10);
      return view('billing.requesbaepicnew',compact('data'));
    }

    public function createbaepic()
    {
      // $data = DB::connection('oci8')->table("CDM_REQUEST_BA_EPIC")->where('account_num',null)->where('status','PROCESS BA')->orderBy('id','DESC')->paginate(10);
      $data = DB::connection('oci8')->table("CDM_REQUEST_BA_EPIC")->where('account_num',null)->where('status','PROCESS BA')->orderBy('id','DESC')->paginate(10);
      return view('billing.createbaepic',compact('data'));
    }

    public function prosesbaepic()
    {
      // $data = DB::connection('oci8')->table("CDM_REQUEST_BA_EPIC")->where('account_num',null)->where('status','APPROVED')->Orwhere('status','PROCESS BA')->orderBy('id','DESC')->paginate(10);
      $data = DB::connection('oci8')->table("CDM_REQUEST_BA_EPIC")->where('account_num',null)->where('status','APPROVED')->Orwhere('status','PROCESS BA')->orderBy('id','DESC')->paginate(10);
      return view('billing.prosesbaepic',compact('data'));
    }

    public function getTest()
    {
      $data = array(
        "test" => "Uji Coba"
      );

      return response($data);
        
      // echo "<pre>";
      // print_r($data);
      // echo "</pre>";
      // die();
    }

    public function tempRequest(Request $request)
    {
      $status = "ON PROGRESS";
      $ket = " "; 
      if(!is_null($request->nomor_ba)){
        $jenis = "BA LAMA";
      }else{
        $jenis = "BA BARU";
      }
      
      $data = array(
        "id_req" => $request->id_req,
        "id_project" => $request->id_project,
        "no_NPWP" => $request->no_NPWP,
        "nama_NPWP" => $request->nama_NPWP,
        "alamat_NPWP" => $request->alamat_NPWP,
        "kesesuaian_NPWP" =>$request->kesesuaian_NPWP,
        "no_NPWP2" => $request->no_NPWP2,
        "nama_NPWP2" => $request->nama_NPWP2,
        "alamat_NPWP2" => $request->alamat_NPWP2,
        "kecamatan_NPWP" => $request->kecamatan_NPWP,
        "kota_NPWP" => $request->kota_NPWP,
        "provinsi_NPWP" => $request->provinsi_NPWP,
        "latitude_NPWP" => $request->latitude_NPWP,
        "longitude_NPWP" => $request->longitude_NPWP,
        "alamat_TAGIHAN" => $request->alamat_TAGIHAN,
        "kecamatan_TAGIHAN" => $request->kecamatan_TAGIHAN,
        "kota_TAGIHAN" => $request->kota_TAGIHAN,
        "provinsi_TAGIHAN" => $request->provinsi_TAGIHAN,
        "latitude_TAGIHAN" => $request->latitude_TAGIHAN,
        "longitude_TAGIHAN" => $request->longitude_TAGIHAN,
        "main_Phone" => $request->main_Phone,
        "segmen" => $request->segmen,
        "sub_segmen" => $request->sub_segmen,
        "region_bill" => $request->region_bill,
        "PIC_Pelanggan" => $request->PIC_Pelanggan,
        "Telp_PIC" => $request->Telp_PIC,
        "Email" => $request->Email,
        "Job_Title" => $request->Job_Title,
        "Workphone" => $request->Workphone,
        "top" => $request->top,
        "currency" => $request->currency,
        "other_currency" => $request->other_currency,
        "bp_type" => $request->bp_type,
        "vat" => $request->vat,
        "ppn" => $request->ppn,
        "payment_method" => $request->payment_method,
        "bill_type" => $request->bill_type,
        "frequency" => $request->frequency,
        "bill_media" => $request->bill_media,
        "payment_duedate" => $request->payment_duedate,
        "main_phone_pic" => $request->main_phone_pic,
        "file_spk" => $request->file_spk,
        "file_npwp" => $request->file_npwp,
        "file_sphb" => $request->file_sphb,
        "file_other" => $request->file_other,
        "status" => $status,
        "keterangan" =>$ket,
        "jumlah_BA" =>$request->jumlah_BA,
        "request_by" =>$request->request_by,
        "alasan" =>$request->alasan,
        "nomor_ba" =>$request->nomor_ba,
        "jenis" => $jenis,
        "request_date" =>date("m/d/Y H:i:s", mktime(date("H") + 7))
      );

      $cek_id = $request->id_req;
      //$cek_idd= DB::connection('oci8')->table("CDM_REQUEST_BA_EPIC")->select('id_req')->where('id_req',$request->id_req)->get();
      $cek_idd= DB::connection('oci8')->table("CDM_REQUEST_BA_EPIC")->select('id_req')->where('id_req',$request->id_req)->get();
      // $jumlah = DB::connection('oci8')->table("CDM_REQUEST_BA_EPIC")->select(DB::raw('count(id) as jml_akun'))->get();

      // echo "<pre>";
      // print_r($cek_idd[0]);
      // print_r( array_key_exists("id_req",$cek_idd[0]) );
      // echo "</pre>";
      // die();

      if (count($cek_idd) != 0) {
        // $update = DB::connection('oci8')->table("CDM_REQUEST_BA_EPIC")->where('id_req',$request->id_req)->update($data);
        $update = DB::connection('oci8')->table("CDM_REQUEST_BA_EPIC")->where('id_req',$request->id_req)->update($data);
        if($update){
          $res['message'] = "Success!";
          $res['values'] = $data;
          return response($res);
        }else{
          $res['message'] = "Failed!";
          return response($res);
        }
      } else {
        // $insert = DB::connection('oci8')->table("CDM_REQUEST_BA_EPIC")->insert($data);
        $insert = DB::connection('oci8')->table("CDM_REQUEST_BA_EPIC")->insert($data);
        if($insert) {
          $res['message'] = "Success!";
          $res['values'] = $data;
          return response($res);
        } else {
          $res['message'] = "Failed!";
          return response($res);
        }
      }

      
    }

    public function requestBaExist(Request $request)
    {
      $status = "ON PROGRESS";
      $jenis = "BA LAMA";
      $data = array(
        "id_req" => $request->id_req,
        "id_project" => $request->id_project,
        "no_NPWP" => $request->no_NPWP,
        "nama_NPWP" => $request->nama_NPWP,
        "segmen" => $request->segmen,
        "sub_segmen" => $request->sub_segmen,
        "status" => $status,
        "alasan" =>$request->alasan,
        "nomor_ba" =>$request->nomor_ba,
        "jenis" => $jenis,
        "request_date" =>date("m/d/Y H:i:s", mktime(date("H") + 7))
      );

      
        $insert = DB::connection('oci8')->table("CDM_REQUEST_BA_EPIC")->insert($data);
        if($insert) {
          $res['message'] = "Success!";
          $res['values'] = $data;
          return response($res);
        } else {
          $res['message'] = "Failed!";
          return response($res);
        }
      
    }


    public function edit($id)
    {
      // $datas = DB::connection('oci8')->table("CDM_REQUEST_BA_EPIC")->where('id',$id)->get();
      $datas = DB::connection('oci8')->table("CDM_REQUEST_BA_EPIC")->where('id',$id)->get();
      
      foreach($datas as $data){
        return response()->json($data);
      }
    }

    public function update(Request $request)
    {

      $id = $request->id;
      $tampstatus= DB::connection('oci8')->table("CDM_REQUEST_BA_EPIC")->select('jenis')->where('id',$id)->get();
      // echo "<pre>";
      // print_r($tampstatus[0]->jenis);
      // echo "</pre>";
      // die();

      // if($tampstatus[0]->jenis == 'BA BARU'){
      //   $status = "APPROVED";
      // }else{
      //   $status = "CLOSED";
      // }
     
        $data = array(
          'status' => $request->status,
          'keterangan' => $request->keterangan,
          'update_date' =>date("m/d/Y H:i:s", mktime(date("H") + 7)),
          'created_date' =>date("m/d/Y H:i:s", mktime(date("H") + 7))
        );

    
        
      $update = DB::connection('oci8')->table("CDM_REQUEST_BA_EPIC")->where('id',$id)->update($data);
      $getdata = DB::connection('oci8')->table("CDM_REQUEST_BA_EPIC")->where('id',$id)->get();
      // echo "<pre>";
      // print_r($getdata);
      // echo "</pre>";
      // die();

      if($update){
        if($request->status=='APPROVED'){
          $this->postDataNotAppv($getdata[0]);
          return redirect('home');
        }else{
          $this->postDataNotAppv($getdata[0]);
          return redirect('home');
        }
        
      }else{
        echo"gagal";
      }
      
    }

    public function prosesbilling(Request $request)
    {
      $id = $request->id;
      $status = 'PROCESS BA';
        $data = array(
          'status' => $status,
          'keterangan' => $request->keterangan,
          'update_date' =>date("m/d/Y H:i:s", mktime(date("H") + 7)),
          'created_date' =>date("m/d/Y H:i:s", mktime(date("H") + 7))
        );
    
        
      $update = DB::connection('oci8')->table("CDM_REQUEST_BA_EPIC")->where('id',$id)->update($data);
      $getdata = DB::connection('oci8')->table("CDM_REQUEST_BA_EPIC")->where('id',$id)->get();
      

      if($update){
        $this->postDataProBA($getdata[0]);
          return redirect('home');
      }else{
        echo"gagal";
      }
      
    }

    public function createbilling(Request $request)
    {
      
      for ($i=0; $i < $request->jumlah_ba; $i++) {
        $temp = array(
          'id_req'        => $request->id_req,
          'account_num'   => $request->account_num[$i],
          'site'          => $request->site[$i],
          'created_date'  =>date("m/d/Y H:i:s", mktime(date("H") + 7))
        );

        $insert = DB::connection('oci8')->table("CDM_BA_EPIC")->insert($temp);
        $temp = array();
      }
      
      $getdata = DB::connection('oci8')->table("CDM_REQUEST_BA_EPIC")->where('id_req',$request->id_req)->get();
      $getAccNum = DB::connection('oci8')->table("CDM_BA_EPIC")->where('id_req',$request->id_req)->get();

      $acc_num = array();
      $site_temp = array();
      $c_date = array();

      foreach($getAccNum as $i => $var) {
        $acc_num[$i] = $var->account_num;
        $site_temp[$i] = $var->site;
        $c_date[$i] = $var->created_date;
      }

      $status='CLOSED';
      $nData = array(
        'id_req'        => $getdata[0]->id_req,
        'status'        => $status,
        'keterangan'    => $getdata[0]->keterangan,
        'account_num'   => $acc_num,
        'site'          => $site_temp,
        'created_date'  => $c_date
      );

      if($getdata){
        $this->postDataAppv($nData);
          // echo "<pre>";
          // print_r($nData);
          // echo "</pre>";
          // die();
        return redirect('home');
      }else{
        echo"yusup mansur";
      }
      
    }

public function postDataAppv($data)
{
 

  $login = 'cdm_billacc';
  $password = 'T3lk0md3s2020CDM';
  $url = 'epic.telkom.co.id/index.php/api/billaccnt/approvalba';
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL,$url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
  curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
  curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
  $result = curl_exec($ch);
  curl_close($ch);
    
  // return $result;
}

public function postDataNotAppv($data)
{
 
  $nData = array(
    'id_req'        => $data->id_req,
    'status'        => $data->status,
    'keterangan'    => $data->keterangan,
    'update_date'   =>array(date("m/d/Y H:i:s", mktime(date("H") + 7))),
    'created_date'  => array(date("m/d/Y H:i:s", mktime(date("H") + 7)))
  );

  $login = 'cdm_billacc';
  $password = 'T3lk0md3s2020CDM';
  $url = 'epic.telkom.co.id/index.php/api/billaccnt/approvalba';
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL,$url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($nData));
  curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
  curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
  $result = curl_exec($ch);
  curl_close($ch);
  
  // return $result;
}

public function postDataProBA($data)
{
 
  $status = 'PROCESS BA';
  $nData = array(
    'id_req'        => $data->id_req,
    'status'        => $status,
    'keterangan'    => $data->keterangan,
    'update_date'   =>array(date("m/d/Y H:i:s", mktime(date("H") + 7))),
    'created_date'  => array(date("m/d/Y H:i:s", mktime(date("H") + 7)))
  );

  $login = 'cdm_billacc';
  $password = 'T3lk0md3s2020CDM';
  $url = 'epic.telkom.co.id/index.php/api/billaccnt/approvalba';
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL,$url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($nData));
  curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
  curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
  $result = curl_exec($ch);
  curl_close($ch);
  // echo "<pre>";
  //     print_r($nData);
  //     echo "</pre>";
  //     die();  
  // return $result;
}

    
}


