<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use View;
use Session;
use Excel;
use Auth;
use DB;
use App\User;
use Carbon\Carbon;

class accountLockController extends Controller
{
       /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/accountLock';

         /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::connection('oci8')->table("v_account_lock")->paginate(10);
        // print_r($data);
        // // $data = DB::connection('oci8')->table("v_account_lock")
        // // ->paginate(10);
        return view('accountLock/index',compact('data'));
    }

    public function cari(Request $request)
	{
		$cari = $request->cari;
        $data = DB::connection('oci8')->table("v_account_lock")
        ->where('account_num','like',"%".$cari."%")
        ->paginate(10);
        $data->appends(['cari' => $cari]);
        return view('accountLock/index',compact('data'));
    }

    public function Excel(Request $request)
    {
        $nama = 'Data_table_v-accountlock_'.date('Y-m-d_H-i-s');
        Excel::create($nama, function ($excel) use ($request) {
        $excel->sheet('Data Table AccountLock', function ($sheet) use ($request) {
        
        $sheet->mergeCells('A1:H1');

       // $sheet->setAllBorders('thin');
        $sheet->row(1, function ($row) {
            $row->setFontFamily('Calibri');
            $row->setFontSize(11);
            $row->setAlignment('center');
            $row->setFontWeight('bold');
        });

        $sheet->row(1, array('Data Table AccountLock'));

        $sheet->row(2, function ($row) {
            $row->setFontFamily('Calibri');
            $row->setFontSize(11);
            $row->setFontWeight('bold');
        });

        $datas = DB::connection('oci8')->select("select * from v_account_lock");
        $sheet->row($sheet->getHighestRow(), function ($row) {
            $row->setFontWeight('bold');
        });


         $datasheet = array();
         $datasheet[0]  =   array("NO","ACCOUNT_NUM","CUSTOMER_REF", "ACCOUNT_NAME", "CURRENCY_CODE","BUSINESS_SHARE", "BA_TIBS", "BA_LOCK");
         $i=1;

         foreach ($datas as $data) {
            $datasheet[$i] = array($i,
                $data->account_num,
                $data->customer_ref,
                $data->account_name,
                $data->currency_code,
                $data->business_share,
                $data->ba_tibs,
                $data->ba_lock
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
                    if ($value->account_num != NULL) {
                    $insert[] = [
                        'account_num' => $value->account_num
                    ];
                    
                    DB::connection('oci8')->table('ade_import_v_account_lock')->insert($insert[$key]);
                        
                    }
                  
            };
            
        }
        $data = DB::connection('oci8')->table("v_account_lock")
                    ->join('ade_import_v_account_lock', 'v_account_lock.account_num', '=', 'ade_import_v_account_lock.account_num')
                        ->select(DB::connection('oci8')->raw('v_account_lock.*'));
                        foreach ($data as $key => $value) {
                            if ($value->account_num != NULL) {
                            $insert[] = [
                                'account_num' => $value->account_num
                            ];
                            
                            DB::connection('oci8')->table('ade_import_v_account_lock')->insert($insert[$key]);
                                
                            }
                          
                    };
        

                        return view('accountLock/index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function reset(){

        //DB::table('ade_import_v_account_lock')->truncate();
        echo"berhasil";
        die();
    }
    public function create()
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
    public function destroy($id)
    {
        
    }
    
    
}
