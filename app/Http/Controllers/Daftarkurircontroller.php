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

class Daftarkurircontroller extends Controller
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
      $data = DB::connection('oci8')->table("cdm_kurir")->orderBy('id','asc')->paginate(10);
      return view('kurir.index',compact('data'));
    }

    
    public function edit($id)
    {

      
      $datas = DB::connection('oci8')->table("cdm_kurir")->where('id',$id)->get();
      
      foreach($datas as $data){
        return response()->json($data);
      }
    }

    public function update(Request $request)
    {
      $id = $request->id;
        $data = array(
          'nama_kurir' => $request->nama_kurir
        );
        
      $update = DB::connection('oci8')->table("cdm_kurir")->where('id',$id)->update($data);
    
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
    return view('kurir.create');
    }

    public function create(Request $request)
    {
      $data = array(
        'id' => null,
        'nama_kurir' => $request->nama_kurir
        );
      
      
      $insert = DB::connection('oci8')->table("cdm_kurir")->insert($data);
      if ($insert) {
        \notification('sukses','Data Berhasil ditambahkan !!!');
        return redirect('daftar-kurir');
      }else{
        \notification('warning','Data Gagal ditambahkan !!!');
        return redirect('daftar-kurir');
      }
    }

    
}


