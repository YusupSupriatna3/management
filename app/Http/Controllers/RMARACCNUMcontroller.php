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


class RMARACCNUMcontroller extends Controller
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
        $data = DB::connection('oci8')->table("amdes.rmart_acc_num")->orderBy('ACCOUNT_NAME','ASC')->paginate(10);
        return view('RMARACCNUM/index',compact('data'));

    }


    public function caricc($account)
    {
      $data = DB::connection('oci8')->table("V_NCRM_BILLACCOUNT_CONTACT")
                ->where('ACCOUNTNAS',$account)->paginate(10);
                return view('ncrmbillaccount/periodeall',compact('data'));
    }

    public function cari(Request $request)
	{

        

        $nipnas     = Input::get('nipnas');
        $accountname      = Input::get('accountname');
        

        $data = DB::connection('oci8')->table('amdes.rmart_acc_num')
            ->where(function ($query) use ($accountname,$nipnas){
                $query->where('ACCOUNT_NAME','like','%'.$accountname.'%')
                    ->where('NIP_NAS','like','%'.$nipnass.'%');
            })->paginate(10);

           
                
                $data->appends(['accountname' => $accountname,'nipnas' => $nipnas]);
                dd('$data');
                //return view('RMARACCNUM/index',compact('data'));
                
    }


    public function nipnas()
    {
        $data = DB::connection('oci8')->table("amdes.rmart_acc_num")->orderBy('ACCOUNT_NAME','ASC')->paginate(10);
        $nipnass = DB::connection('oci8')->table("amdes.rmart_acc_num")->distinct()->select('nip_nas')->get();
        return view('RMARACCNUM/nipnas',compact('data','nipnass'));

    }


    public function standardname()
    {
        $data = DB::connection('oci8')->table("amdes.rmart_acc_num")->orderBy('ACCOUNT_NAME','ASC')->paginate(10);
        $accountnames = DB::connection('oci8')->table("amdes.rmart_acc_num")->distinct()->select('ACCOUNT_NAME')->orderBy('ACCOUNT_NAME','ASC')->get();
        return view('RMARACCNUM/standardname',compact('data','accountnames'));

    }

    public function carinipnas(Request $request)
	{
        $nipnas     = Input::get('nipnas');
        $data = DB::connection('oci8')->table("amdes.rmart_acc_num")
        ->where('NIP_NAS','like',"%".$nipnas."%")
        ->paginate(10);
        $data->appends(['nipnas' => $nipnas]);
        $nipnass = DB::connection('oci8')->table("amdes.rmart_acc_num")->distinct()->select('nip_nas')->get();
        return view('RMARACCNUM/nipnas',compact('data','nipnass'));
    }


    public function caristandardname(Request $request)
	{
        $accountname     = Input::get('accountname');
        $data = DB::connection('oci8')->table("amdes.rmart_acc_num")
        ->where('ACCOUNT_NAME','like',"%".$accountname."%")
        ->paginate(10);
        $data->appends(['accountname' => $accountname]);
        $accountnames = DB::connection('oci8')->table("amdes.rmart_acc_num")->distinct()->select('ACCOUNT_NAME')->orderBy('ACCOUNT_NAME','ASC')->get();
        return view('RMARACCNUM/standardname',compact('data','accountnames'));
    }


    public function Excel(Request $request)
    {
        $nama = 'Data_table_cbase_dives_'.date('Y-m-d_H-i-s');
        Excel::create($nama, function ($excel) use ($request) {
        $excel->sheet('Data Table AccountLock', function ($sheet) use ($request) {
        
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

        $datas = DB::connection('oci8')->select("select * from amdes.rmart_acc_num");
        $sheet->row($sheet->getHighestRow(), function ($row) {
            $row->setFontWeight('bold');
        });


         $datasheet = array();
         $datasheet[0]  =     array("NO",
                                    "ACCOUNT_NUM",
                                    "ACCOUNT_NAME",
                                    "CUSTOMER_REF", 
                                    "BA_TIBS_OLD",
                                    "BA_LOCK_OLD", 
                                    "NIP_NAS", 
                                    "VALID_FROM", 
                                    "VALID_UNTIL", 
                                    "UPDATED_BY", 
                                    "UPDATED_DATE", 
                                    "BA_TIBS", 
                                    "LOCKING_RMART"
                                );
         $i=1;

         foreach ($datas as $data) {
            $datasheet[$i] = array($i,
                    $data->account_num,
                    $data->account_name,
                    $data->customer_ref,
                    $data->ba_tibs_old,
                    $data->ba_lock_old,
                    $data->nip_nas,
                    $data->valid_from,
                    $data->valid_until,
                    $data->update_by,
                    $data->update_date,
                    $data->ba_tibs,
                    $data->locking_rmart
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
                foreach ($a as $key => $value) {
                    if ($value->nip_nas != NULL) {
                    $insert[] = [
                        'nip_nas' => $value->nip_nas
                    ];
                    
                    DB::connection('oci8')->table('ade_import_RMART_ACC_NUM')->insert($insert[$key]);
                        
                    }
                  
            };
            
        }
        $data = DB::connection('oci8')->table("RMART_ACC_NUM")
                    ->join('ade_import_RMART_ACC_NUM', 'RMART_ACC_NUM.nip_nas', '=', 'ade_import_RMART_ACC_NUM.nip_nas')
                        ->select(DB::connection('oci8')->raw('RMART_ACC_NUM.*'))
                        ->paginate(1000);
                        return view('RMARACCNUM/index',compact('data'));
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

    
    
    

    

}
