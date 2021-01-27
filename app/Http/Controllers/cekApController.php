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

class cekApController extends Controller
{
       /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/cekAp';


    public function index()
    {
        // $data = DB::connection('oci8')->table("ADEX_PEMBAYARAN_2020")->orderBy('BILL_PERIOD','DESC')->paginate(10);
        $periode = DB::connection('oci8')->table("NPK_PERNYATAAN_PEMBAYARAN")->distinct()->select('nper')->orderBy('nper','DESC')->get();
        return view('cekAp/index',compact('periode'));
    }

    public function cari(Request $request)
	{

        

        $periodee     = Input::get('periodee');
        $periode2     = Input::get('periode2');
        $account      = Input::get('account');
        

        $data = DB::connection('oci8')->table("NPK_PERNYATAAN_PEMBAYARAN")->select('idnumber','account_name','nper','cl_hkont','cl_post_date',
                DB::raw('sum(total_cash) as total_cash'),DB::raw('sum(total_non_cash) as total_non_cash'))->where('idnumber','=',$account)->whereNotNull('cl_hkont')->whereBetween('nper',[$periodee,$periode2])->groupBy('idnumber','account_name','nper','cl_hkont','cl_post_date')->orderBy('nper','ASC')->paginate(10);
        $periode = DB::connection('oci8')->table("NPK_PERNYATAAN_PEMBAYARAN")->distinct()->select('nper')->orderBy('nper','DESC')->get();
        $data->appends(['account' => $account,'periodee' => $periodee,'periode2' => $periode2]);
        return view('cekAp/hasil',compact('data','periode','account','periodee','periode2'));
    }

   
    public function export()
    {
        return view('cekap.export');
    }

    public function exportPost(Request $request)
    {
        
        
        // Validasi
        $periode     = Input::get('periode');
        $account      = Input::get('account');
        

        $cekaps = DB::connection('oci8')->table("ADEX_PERNYATAAN_PEMBAYARAN")
                            ->where('idnumber', $request->get('account'))
                            ->where('BILL_PERIOD', $request->get('periode'))->get();
       


        $handler = 'export' . ucfirst($request->get('type'));
        return $this->$handler($cekaps);
        
    }

    private function exportXls($cekaps)
    {
        $nama = 'Data_table_cekAp_'.date('Y-m-d_H-i-s');
        Excel::create($nama, function ($excel) use ($cekaps) {
            // Set property
            $excel->setTitle('Data Cek AP')
                ->setCreator(Auth::user()->name);

            $excel->sheet('Data Ap', function($sheet) use ($cekaps) {
                $row = 1;
                $sheet->row($row, [
                            'keterangan',
                            'partner',
                            'ca',
                            'idnumber',
                            'bpext',
                            'nipnas',
                            'account_name',
                            'bpname',
                            'produk',
                            'bpstatus',
                            'bpinext',
                            'subsidiary',
                            'bpdom',
                            'cfu',
                            'ubis',
                            'segmen',
                            'subsegmen',
                            'bisnis_area',
                            'business_share',
                            'divisi',
                            'witel',
                            'ba_trems',
                            'nfact',
                            'fikey',
                            'bill_doc',
                            'bill_type',
                            'bill_period',
                            'bill_post_date',
                            'bill_doc_date',
                            'nper',
                            'due_date',
                            'subproduk',
                            'tr_type',
                            'l11_seq',
                            'l11_element',
                            'bill_element',
                            'account',
                            'hkont',
                            'zzaccount',
                            'zzhkont',
                            'idrev',
                            'prod_seq',
                            'prod_sid',
                            'bill_curr',
                            'bill_jenis',
                            'bill_sign',
                            'stakz',
                            'cl_doc',
                            'cl_type',
                            'cl_period',
                            'cl_post_date',
                            'cl_doc_date',
                            'cl_status',
                            'cl_jenis',
                            'cl_user',
                            'cl_fikey',
                            'cl_id',
                            'cl_loket',
                            'cl_hkont',
                            'ba_pay',
                            'cl_curr',
                            'st_status',
                            'st_doc',
                            'st_period',
                            'st_post_date',
                            'st_doc_date',
                            'st_user',
                            'st_fikey',
                            'invstatus',
                            'invdocno',
                            'inv_period',
                            'inv_date',
                            'inv_due_date',
                            'bill_dcamount',
                            'bill_lcamount',
                            'cl_dcamount',
                            'cl_lcamount',
                            'cl_cash',
                            'cl_non_cash',
                            'c3mr_bill',
                            'c3mr_coll',
                            'c3mr_cash',
                            'c3mr_non_cash',
                            'c3mr_bayar',
                            'c3mr_netoff',
                            'c3mr_klaim',
                            'c3mr_wroff',
                            'bwmp_bill',
                            'bwmp_coll',
                            'bwmp_cash',
                            'bwmp_non_cash',
                            'bwmp_bayar',
                            'bwmp_netoff',
                            'bwmp_klaim',
                            'bwmp_wroff',
                            'bwmp_bill_bjt',
                            'bwmp_coll_bjt',
                            'bwmp_cash_bjt',
                            'cyc_bill',
                            'cyc_coll',
                            'cyc_cash',
                            'cyc_non_cash',
                            'cyc_bayar',
                            'cyc_netoff',
                            'cyc_klaim',
                            'cyc_wroff',
                            'cyc_bill_bjt',
                            'cyc_coll_bjt',
                            'cyc_cash_bjt',
                            'saldo_awal',
                            'total_ly_bill',
                            'total_bill',
                            'total_coll',
                            'total_cash',
                            'total_non_cash',
                            'total_bayar',
                            'total_netoff',
                            'total_klaim',
                            'total_wroff',
                            'bill_bjt',
                            'coll_bjt',
                            'cash_bjt',
                            'saldo_akhir',
                            'jhr',
                            'ly_balance',
                            'rev_ly_bill',
                            'rev_bill',
                            'rev_coll',
                            'rev_cash',
                            'rev_non_cash',
                            'rev_bayar',
                            'rev_netoff',
                            'rev_klaim',
                            'rev_wroff',
                            'reverse_bill',
                            'transfer_item',
                            'rev_cyc',
                            'rev_bill_bjt',
                            'rev_coll_bjt',
                            'rev_cash_bjt',
                            'current_balance'
                ]);
                foreach ($cekaps as $cekap) {
                    $sheet->row(++$row, [
                            $cekap->keterangan,
                            $cekap->partner,
                            $cekap->ca,
                            $cekap->idnumber,
                            $cekap->bpext,
                            $cekap->nipnas,
                            $cekap->account_name,
                            $cekap->bpname,
                            $cekap->produk,
                            $cekap->bpstatus,
                            $cekap->bpinext,
                            $cekap->subsidiary,
                            $cekap->bpdom,
                            $cekap->cfu,
                            $cekap->ubis,
                            $cekap->segmen,
                            $cekap->subsegmen,
                            $cekap->bisnis_area,
                            $cekap->business_share,
                            $cekap->divisi,
                            $cekap->witel,
                            $cekap->ba_trems,
                            $cekap->nfact,
                            $cekap->fikey,
                            $cekap->bill_doc,
                            $cekap->bill_type,
                            $cekap->bill_period,
                            $cekap->bill_post_date,
                            $cekap->bill_doc_date,
                            $cekap->nper,
                            $cekap->due_date,
                            $cekap->subproduk,
                            $cekap->tr_type,
                            $cekap->l11_seq,
                            $cekap->l11_element,
                            $cekap->bill_element,
                            $cekap->account,
                            $cekap->hkont,
                            $cekap->zzaccount,
                            $cekap->zzhkont,
                            $cekap->idrev,
                            $cekap->prod_seq,
                            $cekap->prod_sid,
                            $cekap->bill_curr,
                            $cekap->bill_jenis,
                            $cekap->bill_sign,
                            $cekap->stakz,
                            $cekap->cl_doc,
                            $cekap->cl_type,
                            $cekap->cl_period,
                            $cekap->cl_post_date,
                            $cekap->cl_doc_date,
                            $cekap->cl_status,
                            $cekap->cl_jenis,
                            $cekap->cl_user,
                            $cekap->cl_fikey,
                            $cekap->cl_id,
                            $cekap->cl_loket,
                            $cekap->cl_hkont,
                            $cekap->ba_pay,
                            $cekap->cl_curr,
                            $cekap->st_status,
                            $cekap->st_doc,
                            $cekap->st_period,
                            $cekap->st_post_date,
                            $cekap->st_doc_date,
                            $cekap->st_user,
                            $cekap->st_fikey,
                            $cekap->invstatus,
                            $cekap->invdocno,
                            $cekap->inv_period,
                            $cekap->inv_date,
                            $cekap->inv_due_date,
                            $cekap->bill_dcamount,
                            $cekap->bill_lcamount,
                            $cekap->cl_dcamount,
                            $cekap->cl_lcamount,
                            $cekap->cl_cash,
                            $cekap->cl_non_cash,
                            $cekap->c3mr_bill,
                            $cekap->c3mr_coll,
                            $cekap->c3mr_cash,
                            $cekap->c3mr_non_cash,
                            $cekap->c3mr_bayar,
                            $cekap->c3mr_netoff,
                            $cekap->c3mr_klaim,
                            $cekap->c3mr_wroff,
                            $cekap->bwmp_bill,
                            $cekap->bwmp_coll,
                            $cekap->bwmp_cash,
                            $cekap->bwmp_non_cash,
                            $cekap->bwmp_bayar,
                            $cekap->bwmp_netoff,
                            $cekap->bwmp_klaim,
                            $cekap->bwmp_wroff,
                            $cekap->bwmp_bill_bjt,
                            $cekap->bwmp_coll_bjt,
                            $cekap->bwmp_cash_bjt,
                            $cekap->cyc_bill,
                            $cekap->cyc_coll,
                            $cekap->cyc_cash,
                            $cekap->cyc_non_cash,
                            $cekap->cyc_bayar,
                            $cekap->cyc_netoff,
                            $cekap->cyc_klaim,
                            $cekap->cyc_wroff,
                            $cekap->cyc_bill_bjt,
                            $cekap->cyc_coll_bjt,
                            $cekap->cyc_cash_bjt,
                            $cekap->saldo_awal,
                            $cekap->total_ly_bill,
                            $cekap->total_bill,
                            $cekap->total_coll,
                            $cekap->total_cash,
                            $cekap->total_non_cash,
                            $cekap->total_bayar,
                            $cekap->total_netoff,
                            $cekap->total_klaim,
                            $cekap->total_wroff,
                            $cekap->bill_bjt,
                            $cekap->coll_bjt,
                            $cekap->cash_bjt,
                            $cekap->saldo_akhir,
                            $cekap->jhr,
                            $cekap->ly_balance,
                            $cekap->rev_ly_bill,
                            $cekap->rev_bill,
                            $cekap->rev_coll,
                            $cekap->rev_cash,
                            $cekap->rev_non_cash,
                            $cekap->rev_bayar,
                            $cekap->rev_netoff,
                            $cekap->rev_klaim,
                            $cekap->rev_wroff,
                            $cekap->reverse_bill,
                            $cekap->transfer_item,
                            $cekap->rev_cyc,
                            $cekap->rev_bill_bjt,
                            $cekap->rev_coll_bjt,
                            $cekap->rev_cash_bjt,
                            $cekap->current_balance
                    ]);
                }
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
                    
                    DB::connection('oci8')->table('ade_import_ADEX_PERNYATAAN_PEMBAYARAN')->insert($insert[$key]);
                        
                    }
                  
            };
            
        }
        $data = DB::connection('oci8')->table("ADEX_PERNYATAAN_PEMBAYARAN")
                    ->join('ade_import_ADEX_PERNYATAAN_PEMBAYARAN', 'ADEX_PERNYATAAN_PEMBAYARAN.account_num', '=', 'ade_import_ADEX_PERNYATAAN_PEMBAYARAN.account_num')
                        ->select(DB::connection('oci8')->raw('ADEX_PERNYATAAN_PEMBAYARAN.*'))
                        ->paginate(1000);
                        return view('cekAp/index',compact('data'));
    }



    public function create()
    {
        

        
    }

    public function store(Request $request)
    {
       
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
       
    }

    public function update(Request $request, $id)
    {
        
    }


    public function destroy($id)
    {
        
    }
    
    
}
