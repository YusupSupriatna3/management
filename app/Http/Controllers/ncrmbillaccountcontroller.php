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


class ncrmbillaccountcontroller extends Controller
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
    //periode november 2018 sampai 2022
    public function periode20182019()
    {
        
        $data = DB::connection('oci8')->table("V_BILLACCOUNT_CONTACT_20182022")->orderBy('billaccntname','ASC')
        ->paginate(10);
        return view('ncrmbillaccount/periode20182019',compact('data'));

    }

    public function periodeall()
    {
        
        $data = DB::connection('oci8')->table("V_NCRM_BILLACCOUNT_CONTACT")->orderBy('billaccntname','ASC')
        ->paginate(10);
        return view('ncrmbillaccount/periodeall',compact('data'));

    }


    public function cariperiode20182019(Request $request)
	{
        $cari = $request->cari;
        $data = DB::connection('oci8')->table("V_BILLACCOUNT_CONTACT_20182022")
        ->where('ACCOUNTNAS','like',"%".$cari."%")
        ->orWhere('created_by_name','like',"%".$cari."%")
        ->paginate(10);
        $data->appends(['cari' => $cari]);
        return view('ncrmbillaccount/periode20182019',compact('data'));
    }

    public function cariperiodeall(Request $request)
	{
        $cari = $request->cari;
        $data = DB::connection('oci8')->table("V_NCRM_BILLACCOUNT_CONTACT")
        ->where('ACCOUNTNAS','like',"%".$cari."%")
        ->Orwhere('CREATED_BY_NAME','like',"%".$cari."%")
        ->paginate(10);
        $data->appends(['cari' => $cari]);
        return view('ncrmbillaccount/periodeall',compact('data'));
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
    public function Excelall(Request $request)
    {
        $nama = 'Data_table_ncrm_billaccount_'.date('Y-m-d_H-i-s');
        Excel::create($nama, function ($excel) use ($request) {
        $excel->sheet('Ncrm Billaccount', function ($sheet) use ($request) {
        
        $sheet->mergeCells('A1:AT1');

       // $sheet->setAllBorders('thin');
        $sheet->row(1, function ($row) {
            $row->setFontFamily('Calibri');
            $row->setFontSize(11);
            $row->setAlignment('center');
            $row->setFontWeight('bold');
        });

        $sheet->row(1, array('Ncrm Billaccount'));

        $sheet->row(2, function ($row) {
            $row->setFontFamily('Calibri');
            $row->setFontSize(11);
            $row->setFontWeight('bold');
        });

        $datas = DB::connection('oci8')->select("select * from V_NCRM_BILLACCOUNT_CONTACT");
        $sheet->row($sheet->getHighestRow(), function ($row) {
            $row->setFontWeight('bold');
        });


         $datasheet = array();
         $datasheet[0]  =  array("NO",
                                "BILLACCNTNUM",
                                "BILLACCNTNAME",
                                "BILLACCNTTYPE",
                                "REGION",
                                "WITEL",
                                "SEGMENT",
                                "SUBSEGMENT",
                                "HANDLINGTYPE",
                                "TAXNUMBER",
                                "ACCOUNTNAS",
                                "BILLACCNTSTATUS",
                                "STATUSDATE",
                                "MASTER_OU_ID",
                                "PAR_ROW_ID",
                                "PAR_OU_ID",
                                "CUSTACCNT_ID",
                                "ADDR_ID",
                                "TGL_PROSES",
                                "WIL_ID",
                                "X_BUS_AREA",
                                "BUSINESS_AREA",
                                "ACCOUNT_CREATED",
                                "ADDR_NAME",
                                "LATITUDE",
                                "LONGITUDE",
                                "ADDR",
                                "ADDR_LINE_2",
                                "ADDR_LINE_3",
                                "ADDR_LINE_4",
                                "ADDR_LINE_5",
                                "CITY",
                                "COMMENTS",
                                "COUNTRY",
                                "DISTRICT",
                                "EMAIL_ADDR",
                                "ZIPCODE",
                                "X_PTI1_APART_NUM",
                                "X_PTI1_FLOOR",
                                "X_PTI1_PROVINCE",
                                "X_PTI1_REGION",
                                "X_PTI1_TIME_ZONE",
                                "ROW_ID",
                                "PARTY_TYPE_CD",
                                "GROUP_TYPE_CD",
                                "CREATED_BY_NAME",
                                "LAST_REFRESH"                 
        );
         $i=1;

         foreach ($datas as $data) {
            $datasheet[$i] = array($i,
                $data ->billaccntnum,
                $data ->billaccntname,
                $data ->billaccnttype,
                $data ->region,
                $data ->witel,
                $data ->segment,
                $data ->subsegment,
                $data ->handlingtype,
                $data ->taxnumber,
                $data ->accountnas,
                $data ->billaccntstatus,
                $data ->statusdate,
                $data ->master_ou_id,
                $data ->par_row_id,
                $data ->par_ou_id,
                $data ->custaccnt_id,
                $data ->addr_id,
                $data ->tgl_proses,
                $data ->wil_id,
                $data ->x_bus_area,
                $data ->business_area,
                $data ->account_created,
                $data ->addr_name,
                $data ->latitude,
                $data ->longitude,
                $data ->addr,
                $data ->addr_line_2,
                $data ->addr_line_3,
                $data ->addr_line_4,
                $data ->addr_line_5,
                $data ->city,
                $data ->comments,
                $data ->country,
                $data ->district,
                $data ->email_addr,
                $data ->zipcode,
                $data ->x_pti1_apart_num,
                $data ->x_pti1_floor,
                $data ->x_pti1_province,
                $data ->x_pti1_region,
                $data ->x_pti1_time_zone,
                $data ->row_id,
                $data ->party_type_cd,
                $data ->group_type_cd,
                $data ->created_by_name,
                $data ->last_refresh
            );

            $i++;
        }

        $sheet->fromArray($datasheet);
    });

    })->export('xls');

    }

    public function Excel20182019(Request $request)
    {
        $nama = 'table_ncrm_billaccount'.date('Y-m-d_H-i-s');
        Excel::create($nama, function ($excel) use ($request) {
        $excel->sheet('Ncrm Billaccount', function ($sheet) use ($request) {
        
        $sheet->mergeCells('A1:AT1');

       // $sheet->setAllBorders('thin');
        $sheet->row(1, function ($row) {
            $row->setFontFamily('Calibri');
            $row->setFontSize(11);
            $row->setAlignment('center');
            $row->setFontWeight('bold');
        });

        $sheet->row(1, array('Ncrm Billaccount'));

        $sheet->row(2, function ($row) {
            $row->setFontFamily('Calibri');
            $row->setFontSize(11);
            $row->setFontWeight('bold');
        });

        $datas = DB::connection('oci8')->select("select * from V_BILLACCOUNT_CONTACT_20182022");
        $sheet->row($sheet->getHighestRow(), function ($row) {
            $row->setFontWeight('bold');
        });


         $datasheet = array();
         $datasheet[0]  =  array("NO",
                                "BILLACCNTNUM",
                                "BILLACCNTNAME",
                                "BILLACCNTTYPE",
                                "REGION",
                                "WITEL",
                                "SEGMENT",
                                "SUBSEGMENT",
                                "HANDLINGTYPE",
                                "TAXNUMBER",
                                "ACCOUNTNAS",
                                "BILLACCNTSTATUS",
                                "STATUSDATE",
                                "MASTER_OU_ID",
                                "PAR_ROW_ID",
                                "PAR_OU_ID",
                                "CUSTACCNT_ID",
                                "ADDR_ID",
                                "TGL_PROSES",
                                "WIL_ID",
                                "X_BUS_AREA",
                                "BUSINESS_AREA",
                                "ACCOUNT_CREATED",
                                "ADDR_NAME",
                                "LATITUDE",
                                "LONGITUDE",
                                "ADDR",
                                "ADDR_LINE_2",
                                "ADDR_LINE_3",
                                "ADDR_LINE_4",
                                "ADDR_LINE_5",
                                "CITY",
                                "COMMENTS",
                                "COUNTRY",
                                "DISTRICT",
                                "EMAIL_ADDR",
                                "ZIPCODE",
                                "X_PTI1_APART_NUM",
                                "X_PTI1_FLOOR",
                                "X_PTI1_PROVINCE",
                                "X_PTI1_REGION",
                                "X_PTI1_TIME_ZONE",
                                "ROW_ID",
                                "PARTY_TYPE_CD",
                                "GROUP_TYPE_CD",
                                "CREATED_BY_NAME",
                                "LAST_REFRESH"                 
        );
         $i=1;

         foreach ($datas as $data) {
            $datasheet[$i] = array($i,
                $data ->billaccntnum,
                $data ->billaccntname,
                $data ->billaccnttype,
                $data ->region,
                $data ->witel,
                $data ->segment,
                $data ->subsegment,
                $data ->handlingtype,
                $data ->taxnumber,
                $data ->accountnas,
                $data ->billaccntstatus,
                $data ->statusdate,
                $data ->master_ou_id,
                $data ->par_row_id,
                $data ->par_ou_id,
                $data ->custaccnt_id,
                $data ->addr_id,
                $data ->tgl_proses,
                $data ->wil_id,
                $data ->x_bus_area,
                $data ->business_area,
                $data ->account_created,
                $data ->addr_name,
                $data ->latitude,
                $data ->longitude,
                $data ->addr,
                $data ->addr_line_2,
                $data ->addr_line_3,
                $data ->addr_line_4,
                $data ->addr_line_5,
                $data ->city,
                $data ->comments,
                $data ->country,
                $data ->district,
                $data ->email_addr,
                $data ->zipcode,
                $data ->x_pti1_apart_num,
                $data ->x_pti1_floor,
                $data ->x_pti1_province,
                $data ->x_pti1_region,
                $data ->x_pti1_time_zone,
                $data ->row_id,
                $data ->party_type_cd,
                $data ->group_type_cd,
                $data ->created_by_name,
                $data ->last_refresh
            );

            $i++;
        }

        $sheet->fromArray($datasheet);
    });

    })->export('xls');

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

   
    
    public function ncrmExcel(Request $request)
    {
        
           
    //     $nama = 'data_ncrm_'.date('Y-m-d_H-i-s');
    //     Excel::create($nama, function ($excel) use ($request) {
    //     $excel->sheet('Data NCRM', function ($sheet) use ($request) {
        
    //     $sheet->mergeCells('A1:H1');

    //     $sheet->row(1, function ($row) {
    //         $row->setFontFamily('Calibri');
    //         $row->setFontSize(11);
    //         $row->setAlignment('center');
    //         $row->setFontWeight('bold');
    //     });

    //     $sheet->row(1, array('Data NCRM'));

    //     $sheet->row(2, function ($row) {
    //         $row->setFontFamily('Calibri');
    //         $row->setFontSize(11);
    //         $row->setFontWeight('bold');
    //     });

        
    //     $datas = DB::connection('oci8')->select("select li_id,accountnas from AMDES.NCRM_AGREE_ORDER_LINE")
    //                 ->where('li_id','like',"%".$cari."%");
    //     $sheet->row($sheet->getHighestRow(), function ($row) {
    //         $row->setFontWeight('bold');
    //     });

    //      $datasheet = array();
    //      $datasheet[0]  =   array("NO", "LI_ID", "ACCOUNTNAS");
    //      $i=1;

    //     foreach ($datas as $data) {

    //        // $sheet->appendrow($data);
    //       $datasheet[$i] = array($i,
    //                     $data->li_id,
    //                     $data->accountnas
    //                 );
          
    //       $i++;
    //     }

    //     $sheet->fromArray($datasheet);
    // });

    // })->export('xls');

    }

    

}
