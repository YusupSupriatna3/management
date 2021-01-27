<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laratrust\LaratrustFacade as Laratrust;
use App\Http\Requests;
use App\Book;
use App\Author;
use App\Role;
use App\BorrowLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Npk;
use App\Npk_Mkt;
use App\Biling;
use Datatables;
use Carbon\Carbon;
use Jenssegers\Date\Date;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->connection = new Npk;
        $this->connection1 = new Biling;
        $this->connection4 = new Npk_Mkt;
        $this->connection->setConnection('oci8');
        $this->connection1->setConnection('oci8');
        $this->connection4->setConnection('oci8');
        $this->connection2 = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_bulan");
        $this->connection3 = DB::connection('oci8')->table("CDM_REQUEST_BA");
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Laratrust::hasRole('member')) {
            $tamp = date('Ym');
            $data = $this->connection->distinct()->select('mitra_name', 
              DB::raw('count(distinct pks_number) as jumlah_kl'),
              DB::raw('count(distinct customer_name) as jumlah_customer'),
              DB::raw('sum(distinct nilai_kontrak) as jumlah_kontrak'),
              DB::raw('sum(nilai_npk) as jumlah_npk'))
            ->orderBy('mitra_name', 'ASC')->groupBy('mitra_name')->get();
            
            $tot_mitra = $this->connection->select(DB::raw('count(distinct mitra_name) as jumlah_mitra'))->where('month',$tamp)->get();
            $npk = $this->connection->select('month','mitra_name','customer_name','pks_number','nilai_npk')->where('month',$tamp)->orderBy('id','DESC')->get();
            $npkk = $this->connection->select(DB::raw('count(pks_number) as jml_kl'))->where('month',$tamp)->get();
            $kl = $this->connection->select(DB::raw('count(distinct pks_number) as jml_kl'))->where('month',$tamp)->get();
            $nilai_npk = $this->connection->select(DB::raw('sum(nilai_npk) as nilai_npk'))->where('month',$tamp)->get();

            $dt = $this->connection4->distinct()->select('mitra_name', 
              DB::raw('count(distinct pks_number) as jumlah_pks'),
              DB::raw('sum(nilai_npk) as jumlah_npk'))
            ->orderBy('mitra_name', 'ASC')->groupBy('mitra_name')->get();
            $total_mitra = $this->connection4->select(DB::raw('count(distinct mitra_name) as jumlah_mitra'))->where('month',$tamp)->get();
            $total_npk = $this->connection4->select(DB::raw('count(mitra_name) as jumlah_npk'))->where('month',$tamp)->get();
            $total_pks = $this->connection4->select(DB::raw('count(distinct pks_number) as jumlah_pks'))->where('month',$tamp)->get();
            $jumlah_npk = $this->connection4->select(DB::raw('sum(nilai_npk) as nilai_npk'))->where('month',$tamp)->get();
            Date::setLocale('id');//id kode untuk indonesia
            $tgl= Date::now()->format('F');
              return view('dashboard.member',compact('data','tot_mitra','npk','npkk','kl','nilai_npk','tgl','dt','total_mitra','total_npk','total_pks','jumlah_npk'));
          }
          else if (Laratrust::hasRole('AdminBillingAccount')) {    
          
            $tamp = date('10/01/2020');
            $tamp1 = date('10/31/2020');
           
            $cek      = $this->connection1->select(DB::raw('count(distinct accountnas) as jml_akun'))->get();
            
            $data = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_202010")->orderBy('account_created', 'DESC')->get();
            
            
            $billing_akun = $this->connection1->select(DB::raw('count(distinct accountnas) as jml_akun'))->get();
            $billing      = $this->connection2->select(DB::raw('count(distinct accountnas) as jml_akun'))->get();
            $requestba       = DB::connection('oci8')->table("CDM_REQUEST_BA_EPIC")->select(DB::raw('count(id) as jml_akun'))->where('status','ON PROGRESS')->where('jenis','BA LAMA')->get();
            $requestnew       = DB::connection('oci8')->table("CDM_REQUEST_BA_EPIC")->select(DB::raw('count(id) as jml_akun'))->where('status','ON PROGRESS')->where('jenis','BA BARU')->get();
            $approval       = DB::connection('oci8')->table("CDM_REQUEST_BA_EPIC")->select(DB::raw('count(id) as jml_akun'))->where('status','APPROVED')->orWhere('status','PROCESS BA')->whereBetween('update_date',[$tamp,$tamp1])->get();
            $nonapproval       = DB::connection('oci8')->table("CDM_REQUEST_BA_EPIC")->select(DB::raw('count(distinct id) as jml_akun'))->where('status','NOTAPPROVED')->whereBetween('update_date',[$tamp,$tamp1])->get();
            $notapproval       = DB::connection('oci8')->table("CDM_REQUEST_BA_EPIC")->select(DB::raw('count(distinct id) as jml_akun'))->where('status','NOTAPPROVED')->get();
            $retuned       = DB::connection('oci8')->table("CDM_REQUEST_BA_EPIC")->select(DB::raw('count(distinct id) as jml_akun'))->where('status','RETURNED')->whereBetween('update_date',[$tamp,$tamp1])->get();
            $process       = DB::connection('oci8')->table("CDM_REQUEST_BA_EPIC")->select(DB::raw('count(distinct id) as jml_akun'))->where('status','PROCESS BA')->whereBetween('update_date',[$tamp,$tamp1])->get();

            return view('dashboard.adminbilling',compact('data','billing_akun','billing','requestba','approval','nonapproval','cek','retuned','process','requestnew','notapproval'));
        }
        else if (Laratrust::hasRole('CreateBa')) {
            

            $data = DB::connection('oci8')->table("CDM_NCRM_BILLACCOUNT_bulan")->orderBy('account_created', 'DESC')->get();
            
            $billing      = $this->connection2->select(DB::raw('count(distinct accountnas) as jml_akun'))->get();
            $approval       = DB::connection('oci8')->table("CDM_REQUEST_BA_EPIC")->select(DB::raw('count(id) as jml_akun'))->where('account_num',null)->where('status','APPROVED')->get();

            return view('dashboard.createbilling',compact('data','billing','approval'));
        }
        else if (Laratrust::hasRole('AdminInvoice')) {
            
            $tamp = date('01/01/2020');
            $tamp1 = date('m/d/Y');
            
            //$sukses = DB::connection('oci8')->table("CDM_INVOICE")->select(DB::raw('count(id) as jml_system'))->where('status','SUKSES')->get();

            $custom       = DB::connection('oci8')->table("CDM_INVOICE")->select(DB::raw('sum(nilai_custome) as nilai_custome'))->where('invoice_status','C')->get();
            $jumcustom       = DB::connection('oci8')->table("CDM_INVOICE")->select(DB::raw('count(id) as jumlah_custome'))->where('invoice_status','C')->get();
            $system       = DB::connection('oci8')->table("CDM_INVOICE")->select(DB::raw('sum(bill_lcamount) as bill_lcamount'))->where('invoice_status','S')->get();
            $jumsystem       = DB::connection('oci8')->table("CDM_INVOICE")->select(DB::raw('count(id) as jumlah_lcamount'))->where('invoice_status','S')->get();

            return view('dashboard.admininvoice',compact('custom','system','jumcustom','jumsystem'));
        }
        else if (Laratrust::hasRole('admin')) {

            return view('dashboard.admin');
        }
        else{
            return view('login');
        }
    
}

    public function getKLMitra($mitra)
    {
        $datas = $this->connection->distinct()->select('pks_number','nilai_kontrak',
            DB::raw('count(pks_number) as jml_kl'),
            DB::raw('count(keterangan_download_otc) as jml_otc'),
            DB::raw('count(keterangan_download_termin) as jml_termin'),
            DB::raw('sum(nilai_npk) as nilai_npk'))->where('mitra_name',$mitra)->groupBy('pks_number','nilai_kontrak')->get();
        $tamp = date('Ym');
        $tot_mitra = $this->connection->select(DB::raw('count(distinct mitra_name) as jumlah_mitra'))->where('month',$tamp)->get();
        $npk = $this->connection->select('month','mitra_name','customer_name','pks_number','nilai_npk')->where('month',$tamp)->orderBy('id','DESC')->get();
        $npkk = $this->connection->select(DB::raw('count(pks_number) as jml_kl'))->where('month',$tamp)->get();
        $kl = $this->connection->select(DB::raw('count(distinct pks_number) as jml_kl'))->where('month',$tamp)->get();
        $nilai_npk = $this->connection->select(DB::raw('sum(nilai_npk) as nilai_npk'))->where('month',$tamp)->get();
        return view('dashboard.mitra_kl',compact('datas','tot_mitra','npk','npkk','kl','nilai_npk','tgl','total_mitra','total_npk','total_pks','jumlah_npk'));
    }

    public function getKLMkt($mitra)
    {
        $datas = $this->connection->distinct()->select('pks_number',
            DB::raw('count(pks_number) as jumlah_pks'),
            DB::raw('sum(nilai_npk) as nilai_npk'))->where('mitra_name',$mitra)->groupBy('pks_number')->get();
            return view('dashboard.marketing_kl',compact('datas'));
    }

    public function getNilaiNpkBulanTerakhir()
    {
        $tamp = date('Ym')-2;
        $tamp1 = date('Ym');
        $npk_akhir = $this->connection->select('month',DB::raw('sum(nilai_npk) as nilai_npk'),DB::raw('count(pks_number) as pks_number'))->whereBetween('month',[$tamp,$tamp1])->groupBy('month')->orderBy('month','ASC')->get();
        $table = array();
        $table['cols'] = array(

            // Labels for your chart, these represent the column titles
            // Note that one column is in "string" format and another one is in "number" format as pie chart only required "numbers" for calculating percentage and string will be used for column title
            array('label' => 'Month', 'type' => 'string'),
            array('label' => 'Nilai NPK', 'type' => 'number')

        );

        $rows = array();
        foreach ($npk_akhir as $key) {
            $temp = array();
            // the following line will be used to slice the Pie chart
            $temp[] = array('v' => (string) $key->month); 

            // Values of each slice
            $temp[] = array('v' => (int) $key->nilai_npk);
            $rows[] = array('c' => $temp);
        }

        $table['rows'] = $rows;
        return response()->json($table);
    }

    public function getJumlahNpkBulanTerakhir()
    {
        $tamp = date('Ym')-2;
        $tamp1 = date('Ym');
        $jml_npk_akhir = $this->connection->select('month',DB::raw('count(pks_number) as pks_number'))->whereBetween('month',[$tamp,$tamp1])->groupBy('month')->orderBy('month','ASC')->get();
        $table = array();
        $table['cols'] = array(

            // Labels for your chart, these represent the column titles
            // Note that one column is in "string" format and another one is in "number" format as pie chart only required "numbers" for calculating percentage and string will be used for column title
            array('label' => 'Month', 'type' => 'string'),
            array('label' => 'Jumlah NPK', 'type' => 'number')

        );

        $rows = array();
        foreach ($jml_npk_akhir as $key) {
            $temp = array();
            // the following line will be used to slice the Pie chart
            $temp[] = array('v' => (string) $key->month); 

            // Values of each slice
            $temp[] = array('v' => (int) $key->pks_number);
            $rows[] = array('c' => $temp);
        }

        $table['rows'] = $rows;
        return response()->json($table);
    }
}
