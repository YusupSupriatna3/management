<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Excel;
use Carbon\Carbon;
use View;
use DB;
use Session;
use App\Model_NCRM;


class CBASEDIVEScontroller extends Controller
{
    
    // public function __construct()
    // {
    //     // $this->middleware('auth');
       
    // }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::connection('oci8')->table("amdes.cbase_dives_2020")
        ->paginate(10);
        return view('CBASEDIVES/index',compact('data'));

    }

    public function cari(Request $request)
	{
        $cari = $request->cari;
        $data = DB::connection('oci8')->table("amdes.cbase_dives_2020")
        ->where('NIP_NAS','like',"%".$cari."%")
        ->Orwhere('standard_name','like',"%".$cari."%")
        ->paginate(10);
        $data->appends(['cari' => $cari]);
        return view('CBASEDIVES/index',compact('data'));
    }

    public function nipnas()
    {
        $data = DB::connection('oci8')->table("amdes.cbase_dives_2020")
        ->paginate(10);
        $nipnass = DB::connection('oci8')->table("amdes.cbase_dives_2020")->distinct()->select('nip_nas')->orderBy('nip_nas','ASC')->get();
        return view('CBASEDIVES/nipnas',compact('data','nipnass'));

    }

    public function standardname()
    {
        $data = DB::connection('oci8')->table("amdes.cbase_dives_2020")
        ->paginate(10);
        $standardnames = DB::connection('oci8')->table("amdes.cbase_dives_2020")->distinct()->select('standard_name')->orderBy('standard_name','ASC')->get();
        return view('CBASEDIVES/standardname',compact('data','standardnames'));

    }

    public function carinipnas(Request $request)
	{
        $nipnas     = Input::get('nipnas');
        $data = DB::connection('oci8')->table("amdes.cbase_dives_2020")
        ->where('NIP_NAS','like',"%".$nipnas."%")
        ->paginate(10);
        $data->appends(['nipnas' => $nipnas]);
        $nipnass = DB::connection('oci8')->table("amdes.cbase_dives_2020")->distinct()->select('nip_nas')->orderBy('nip_nas','ASC')->get();
        return view('CBASEDIVES/nipnas',compact('data','nipnass'));
    }

    public function caristandardname(Request $request)
	{
        $standardname     = Input::get('standardname');
        $data = DB::connection('oci8')->table("amdes.cbase_dives_2020")
        ->where('standard_name','like',"%".$standardname."%")
        ->paginate(10);
        $data->appends(['standardname' => $standardname]);
        $standardnames = DB::connection('oci8')->table("amdes.cbase_dives_2020")->distinct()->select('standard_name')->orderBy('standard_name','ASC')->get();
        return view('CBASEDIVES/standardname',compact('data','standardnames'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('create');
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
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nip_nas)
    {
       
    }

    
    
    public function Excel(Request $request)
    {
        $nama = 'Data_table_cbase_dives_'.date('Y-m-d_H-i-s');
        Excel::create($nama, function ($excel) use ($request) {
        $excel->sheet('Data Table Cbase Dives', function ($sheet) use ($request) {
        
        $sheet->mergeCells('A1:G1');

       // $sheet->setAllBorders('thin');
        $sheet->row(1, function ($row) {
            $row->setFontFamily('Calibri');
            $row->setFontSize(11);
            $row->setAlignment('center');
            $row->setFontWeight('bold');
        });

        $sheet->row(1, array('Data Table Cbase Dives'));

        $sheet->row(2, function ($row) {
            $row->setFontFamily('Calibri');
            $row->setFontSize(11);
            $row->setFontWeight('bold');
        });

        $datas = DB::connection('oci8')->select("select * from amdes.cbase_dives_2020");
        $sheet->row($sheet->getHighestRow(), function ($row) {
            $row->setFontWeight('bold');
        });


         $datasheet = array();
         $datasheet[0]  =   array("NO","CUSTACCNTNUM","NIP_NAS", "STANDARD_NAME", "SEGMEN","SEGMENT_6_LNAME", "SUB_SEGMENT");
         $i=1;

         foreach ($datas as $data) {
            $datasheet[$i] = array($i,
                $data->custaccntnum,
                $data->nip_nas,
                $data->standard_name,
                $data->segmen,
                $data->segment_6_lname,
                $data->sub_segment
            );

            $i++;
        }

        $sheet->fromArray($datasheet);
    });

    })->export('xls');

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
            // foreach ($a as $key){
            // echo "<pre>";
            // print_r($key);
            // echo "</pre>";
            // die();
            // }
                foreach ($a as $key => $value) {
                    if ($value->nip_nas != NULL) {
                    $insert[] = [
                        'nip_nas' => $value->nip_nas
                    ];
                    
                    DB::connection('oci8')->table('ade_import_CBASE_DIVES')->insert($insert[$key]);
                        
                    }
                  
            };
            
        }
        $data = DB::connection('oci8')->table("amdes.cbase_dives_2020")
                    ->join('ade_import_CBASE_DIVES', 'amdes.cbase_dives_2020.nip_nas', '=', 'ade_import_CBASE_DIVES.nip_nas')
                        ->select(DB::connection('oci8')->raw('amdes.cbase_dives_2020.*'))
                        ->paginate(1000);
                        return view('CBASEDIVES/index',compact('data'));
    }

    

}
