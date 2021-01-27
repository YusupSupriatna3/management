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

class DaftarKeterangancontroller extends Controller
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
      // $this->connection1 = DB::connection('oci8')->table("CDM_REQUEST_BA");
    }
    public function index()
    {
      $data = DB::connection('oci8')->table("cdm_alasan_manual")->orderBy('id','asc')->paginate(10);
      return view('ketmanual.index',compact('data'));
    }

    
    public function edit($id)
    {

      
      $datas = DB::connection('oci8')->table("cdm_alasan_manual")->where('id',$id)->get();
      
      foreach($datas as $data){
        return response()->json($data);
      }
    }

    public function update(Request $request)
    {
      $id = $request->id;
        $data = array(
          'keterangan' => $request->keterangan
        );
        
      $update = DB::connection('oci8')->table("cdm_alasan_manual")->where('id',$id)->update($data);
    
      if ($update) {
        \notification('sukses','Data Berhasil diupdate !!!');
        return redirect()->back();
      }else{
        \notification('warning','Data Gagal diupdate !!!');
        return redirect()->back();
      }
      
    }

    public function viewCreate()
    {
    return view('ketmanual.create');
    }

    public function create(Request $request)
    {
      $data = array(
        'id' => null,
        'keterangan' => $request->keterangan
        );
      
      
      $insert = DB::connection('oci8')->table("cdm_alasan_manual")->insert($data);
      if ($insert) {
        \notification('sukses','Data Berhasil ditambahkan !!!');
        return redirect('daftar-keterangan-manual');
      }else{
        \notification('warning','Data Gagal ditambahkan !!!');
        return redirect('daftar-keterangan-manual');
      }
    }

    
}


