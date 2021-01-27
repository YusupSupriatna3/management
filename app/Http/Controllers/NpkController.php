<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Npk;
use App\Npk_Mkt;
use App\Http\notification;
use PDF;
use Jenssegers\Date\Date;
use Excel;
use Session;
class NpkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
      $this->connection = new Npk;
      $this->connection->setConnection('oci8');
      $this->connection1= new Npk_Mkt;
      $this->connection1->setConnection('oci8');
    }
    public function index()
    {
      // $db = "(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=10.60.185.140)(PORT=1521))(CONNECT_DATA=(SERVER=DEDICATED)(SERVICE_NAME=desdbn)))";
      // $conn = oci_connect("DES_USR","desusr#123",$db);
      // $curs = oci_new_cursor($conn);
      // $stid = oci_parse($conn, "begin DES_USR.get_acc_ls(:message); end;");
      // oci_bind_by_name($stid, ":message", $curs, -1, OCI_B_CURSOR);
      // oci_execute($stid);

      // oci_execute($curs);  // Execute the REF CURSOR like a normal statement id
      // while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
      //     print_r(json_encode($row));
      // }

      // oci_free_statement($stid);
      // oci_free_statement($curs);
      // oci_close($conn);
      // die();
      $data = $this->connection->orderBy('id','DESC')->paginate(20);
      $account = $this->connection->distinct()->select('account_number')->orderBy('account_number','ASC')->get();
      $periode = $this->connection->distinct()->select('periode')->orderBy('periode','ASC')->get();
      $pks = $this->connection->distinct()->select('pks_number')->orderBy('pks_number','ASC')->get();
      return view('npk.index',compact('data','account','periode','pks'));
    }

    public function viewCreateNpk()
    {
      $pks = $this->connection->distinct()->select('pks_number')->orderBy('pks_number','ASC')->get();
      $account = $this->connection->distinct()->select('account_number')->orderBy('account_number','ASC')->get();
      return view('npk.create_npk_baru',compact('pks'));
    }

    public function viewUploadExcel()
    {
     return view('npk.upload_from_excel'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

      // echo "<pre>";
      //   print_r($_POST);
      // echo "</pre>";
      // die();

      if (!empty($request->termin1)) {
        $termin1 = $request->termin1;
        $npk = $request->termin1;
      }else{
        $termin1 = 0;
      }

      if (!empty($request->termin2)) {
        $termin2 = $request->termin2;
        $npk = $request->termin2;
      }else{
        $termin2 = 0;
      }

      if (!empty($request->termin3)) {
        $termin3 = $request->termin3;
        $npk = $request->termin3;
      }else{
        $termin3 = 0;
      }

      if (!empty($request->termin4)) {
        $termin4 = $request->termin4;
        $npk = $request->termin4;
      }else{
        $termin4 = 0;
      }

      if (!empty($request->termin5)) {
        $termin5 = $request->termin5;
        $npk = $request->termin5;
      }else{
        $termin5 = 0;
      }
      
      $mr=0;
      $mr1=0;
      if (!empty($request->mrc)) {
          for ($i=0; $i < count($request->addmore)-1; $i++) {
            if (!empty($request->addmore[$i])) {
              if (count($request->addmore)-1==1) {
                if (!empty($request->addmore0[$i]) && !empty($request->addmore[$i]) && !empty($request->addmore1[$i]) && !empty($request->addmore2[$i]) && !empty($request->addmore3[$i])) {
                  $mr += $request->addmore0[$i]-(($request->addmore[$i]*$request->addmore1[$i])*($request->addmore2[$i]/$request->addmore3[$i]));
                }
              }else {
                if (!empty($request->addmore0[$i]) && !empty($request->addmore[$i]) && !empty($request->addmore1[$i]) && !empty($request->addmore2[$i]) && !empty($request->addmore3[$i])) {
                $mr += ($request->addmore[$i]*$request->addmore1[$i]);
                $mr1 += (($request->addmore[$i]*$request->addmore1[$i]*$request->addmore2[$i]/$request->addmore3[$i]));
                }
              }
            }else{
              $mrc = $request->mrc;
              $npk = $request->nilai_npk;
            }
          }
          if (!empty($request->addmore[0])) {
            if (count($request->addmore)-1==1) {
              $mrc = ceil($mr);
              $npk = ceil($mr);
            }else {
              $mrc = ceil($request->mrc-$mr-$mr1);
              $npk = ceil($request->mrc-$mr-$mr1);
            } 
          }else{
              $mrc = $request->mrc;
              $npk = $request->nilai_npk;
            }      
      }else{
        $mrc = 0;
      }

      if (!empty($request->otc1)) {
        if (!empty($request->hargaunit) && !empty($request->jmlnon)) {
          $otc1 = $request->otc1-($request->hargaunit*$request->jmlnon);
          $npk = $request->otc1-($request->hargaunit*$request->jmlnon);
        }else{
          $otc1 = $request->otc1;
          $npk = $request->nilai_npk;
        }
      }else{
        $otc1 = 0;
      }

      if (!empty($request->otc2)) {
        if (!empty($request->hargaunit) && !empty($request->jmlnon)) {
          $otc2 = $request->otc2-($request->hargaunit*$request->jmlnon);
          $npk = $request->otc2-($request->hargaunit*$request->jmlnon);
        }else{
          $otc2 = $request->otc2;
          $npk = $request->nilai_npk;
        }
      }else{
        $otc2 = 0;
      }

      if (!empty($request->otc3)) {
        if (!empty($request->hargaunit) && !empty($request->jmlnon)) {
          $otc3 = $request->otc3-($request->hargaunit*$request->jmlnon);
          $npk = $request->otc3-($request->hargaunit*$request->jmlnon);
        }else{
          $otc3 = $request->otc3;
          $npk = $request->nilai_npk;
        }
      }else{
        $otc3 = 0;
      }

      if (!empty($request->otc4)) {
        if (!empty($request->hargaunit) && !empty($request->jmlnon)) {
          $otc4 = $request->otc4-($request->hargaunit*$request->jmlnon);
          $npk = $request->otc4-($request->hargaunit*$request->jmlnon);
        }else{
          $otc4 = $request->otc4;
          $npk = $request->nilai_npk;
        }
      }else{
        $otc4 = 0;
      }

      if (!empty($request->slg)) {
        $slg = $request->slg;
      }else{
        $slg = 0;
      }

      if (!empty($request->otc_ke)) {
        $otc_ke = $request->otc_ke;
      }else{
        $otc_ke = 0;
      }

      if (!empty($request->termin_ke)) {
        $termin_ke = $request->termin_ke;
      }else{
        $termin_ke = 0;
      }

      if (!empty($request->hargalokasi)) {
        $hargalokasi = $request->hargalokasi;
      }else{
        $hargalokasi = 0;
      }

      if (!empty($request->jmlhari)) {
        $jmlhari = $request->jmlhari;
      }else{
        $jmlhari = 0;
      }

      if (!empty($request->jmlbln)) {
        $jmlbln = $request->jmlbln;
      }else{
        $jmlbln = 0;
      }

      if (!empty($request->periode_bulan_usage)) {
        $usage = $request->periode_bulan_usage;
      }else {
        $usage ='';
      }

      if (empty($request->nilai_kontrak)) {
        $nilai_kontrak = 0;
      }else {
        $nilai_kontrak = $request->nilai_kontrak;
      }

      $data = array(
      'id' =>null,
      'month' => $request->month,
      'mitra_name' => $request->mitra_name,
      'pks_number' => $request->pks_number,
      'customer_name' => $request->customer_name,
      'account_number' => $request->account_number,
      'segmen' => $request->segmen,
      'manager_name' => $request->manager_name,
      'nik' => $request->nik,
      'jangka_waktu_kontrak' => $request->jangka_waktu_kontrak.' '.'bulan',
      'awal_kontrak' => $request->awal_kontrak,
      'akhir_kontrak' => $request->akhir_kontrak,
      'nilai_kontrak' => $nilai_kontrak,
      'periode' => $request->periode_bulan,
      'curr_type' => $request->curr_type,
      'nilai_npk' => $npk,
      'tanggal_npk' => $request->tanggal_npk,
      'mrc' => $mrc,
      'otc_ke' => $otc_ke,
      'otc1' => $otc1,
      'otc2' => $otc2,
      'otc3' => $otc3,
      'otc4' => $otc4,
      'termin_ke' => $termin_ke, 
      'termin1' => $termin1,
      'termin2' => $termin2,
      'termin3' => $termin3,
      'termin4' => $termin4,
      'npk_ke' => $request->npk_day.'/'.$request->npk_month,
      'npk_day' => $request->npk_day,
      'npk_month' => $request->npk_month,
      'slg' => $slg,
      'usagee' => $usage,
      'keterangan' => $request->keterangan,
      'keterangan_download_otc' => '',
      'keterangan_download_mrc' => '',
      'keterangan_download_termin' => '',
      'qty' => $hargalokasi,
      'jumlah_hari' => $jmlhari,
      'jumlah_bulan' => $jmlbln,
      'created_at' => date('Y-m-d H:i:s', mktime(date("H") + 7, date("i"), date("s"), date("m"), date("d"), date("Y"))),
      'termin5'=> $termin5
      );

      // echo "<pre>";
      //   print_r($data);
      // echo "</pre>";
      // die();

      $insert = $this->connection->insert($data);
      
      if ($insert) {
        \notification('sukses','Data Berhasil Di Tambahkan !!!');
        return redirect('data-npk');
      }else{
        \notification('warning','Data Gagal Di Tambahkan !!!');
        return redirect('data-npk');
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if (!empty($request->termin1)) {
        $termin1 = $request->termin1;
      }else{
        $termin1 = '0';
      }

      if (!empty($request->termin2)) {
        $termin2 = $request->termin2;
      }else{
        $termin2 = '0';
      }

      if (!empty($request->termin3)) {
        $termin3 = $request->termin3;
      }else{
        $termin3 = '0';
      }

      if (!empty($request->termin4)) {
        $termin4 = $request->termin4;
      }else{
        $termin4 = '0';
      }
      $mr=0;
      if (!empty($request->mrc)) {
        if (count($request->addmore)!=0) {
          for ($i=0; $i < count($request->addmore); $i++) { 
            $mr += $request->addmore0[$i]-($request->addmore[$i]*$request->addmore1[$i]*$request->addmore2[$i]/$request->addmore3[$i]);
          }
          $mrc = $request->mrc-$mr;
        }else{
          $mrc = $request->mrc;
        }
      }else{
        $mrc = '0';
      }

      if (!empty($request->otc1)) {
        $otc1 = $request->otc1;
      }else{
        $otc1 = '0';
      }

      if (!empty($request->otc2)) {
        $otc2 = $request->otc2;
      }else{
        $otc2 = '0';
      }

      if (!empty($request->otc3)) {
        $otc3 = $request->otc3;
      }else{
        $otc3 = '0';
      }

      if (!empty($request->otc4)) {
        $otc4 = $request->otc4;
      }else{
        $otc4 = '0';
      }

      if (!empty($request->slg)) {
        $slg = $request->slg;
      }else{
        $slg = '0';
      }

      if (!empty($request->otc_ke)) {
        $otc_ke = $request->otc_ke;
      }else{
        $otc_ke = '0';
      }

      if (!empty($request->termin_ke)) {
        $termin_ke = $request->termin_ke;
      }else{
        $termin_ke = '0';
      }

      if (!empty($request->periode_bulan_usage) && !empty($request->periode_tahun_usage)) {
        $usage = $request->periode_bulan_usage.' '.$request->periode_tahun_usage;
      }else {
        $usage ='';
      }

      if (empty($request->periode_bulan) && empty($request->periode_tahun)) {
        $periode = $request->pr_bln;
      }else{
        $periode = $request->periode_bulan.' '.$request->periode_tahun;
      }

      

      $data = array(
      'id' =>null,
      'month' => $request->month,
      'mitra_name' => $request->mitra_name,
      'pks_number' => $request->pks_number,
      'customer_name' => $request->customer_name,
      'account_number' => $request->account_number,
      'segmen' => $request->segmen,
      'manager_name' => $request->manager_name,
      'nik' => $request->nik,
      'jangka_waktu_kontrak' => $request->jangka_waktu_kontrak.' '.'bulan',
      'awal_kontrak' => $request->awal_kontrak,
      'akhir_kontrak' => $request->akhir_kontrak,
      'nilai_kontrak' => $request->nilai_kontrak,
      'periode' => $periode,
      'curr_type' => $request->curr_type,
      'nilai_npk' => $request->nilai_npk,
      'tanggal_npk' => $request->tanggal_npk,
      'mrc' => $mrc,
      'otc_ke' => $otc_ke,
      'otc1' => $otc1,
      'otc2' => $otc2,
      'otc3' => $otc3,
      'otc4' => $otc4,
      'termin_ke' => $termin_ke, 
      'termin1' => $termin1,
      'termin2' => $termin2,
      'termin3' => $termin3,
      'termin4' => $termin4,
      'npk_ke' => $request->npk_day.'/'.$request->npk_month,
      'npk_day' => $request->npk_day,
      'npk_month' => $request->npk_month,
      'slg' => $slg,
      'usagee' => $usage,
      'keterangan' => $request->keterangan
      );

      $insert = $this->connection->insert($data);
      
      if ($insert) {
        \notification('sukses','Data Berhasil Di Tambahkan !!!');
        return redirect('data-npk');
      }else{
        \notification('warning','Data Gagal Di Tambahkan !!!');
        return redirect('data-npk');
      }
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
      $datas = $this->connection->where('id',$id)->get();
      foreach($datas as $data){
        return response()->json($data);
      }
      // return view('npk.index',compact('data'));
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
      if (!empty($request->terminn1)) {
        $terminn1 = $request->terminn1;
        $npk = $request->terminn1;
      }else{
        $terminn1 = '0';
      }

      if (!empty($request->terminn2)) {
        $terminn2 = $request->terminn2;
        $npk = $request->terminn2;
      }else{
        $terminn2 = '0';
      }

      if (!empty($request->terminn3)) {
        $terminn3 = $request->terminn3;
        $npk = $request->terminn3;
      }else{
        $terminn3 = '0';
      }

      if (!empty($request->terminn4)) {
        $terminn4 = $request->terminn4;
        $npk = $request->terminn4;
      }else{
        $terminn4 = '0';
      }

      if (!empty($request->terminn5)) {
        $terminn5 = $request->terminn5;
        $npk = $request->terminn5;
      }else{
        $terminn5 = '0';
      }

      $mr=0;
      if (!empty($request->mrc)) {
        for ($i=0; $i < count($request->addmore)-1; $i++) {
          if (count($request->addmore)!=0) {
            if (!empty($request->addmore0[$i]) && !empty($request->addmore[$i]) && !empty($request->addmore1[$i]) && !empty($request->addmore2[$i]) && !empty($request->addmore3[$i])) {
              $mr += ($request->addmore[$i]*$request->addmore1[$i])*($request->addmore2[$i]/$request->addmore3[$i]);
            }else{
              $mr += ($request->addmore[$i]*$request->addmore1[$i]);
            }

          }else{
            $mrc = $request->mrc;
            $npk = $request->mrc;
          }
        }
        $mrc = $request->mrc-$mr;
        $npk = $request->mrc-$mr;
      }else{
        $mrc = '0';
      }

      if (!empty($request->otcc1)) {
        if (!empty($request->hargaunit) && !empty($request->jmlnon)) {
          $otcc1 = $request->otcc1-($request->hargaunit*$request->jmlnon);
          $npk = $request->otcc1-($request->hargaunit*$request->jmlnon);
        }else{
          $otcc1 = $request->otcc1;
          $npk = $request->nilai_npk;
        }
      }else{
        $otcc1 = '0';
      }

      if (!empty($request->otcc2)) {
        if (!empty($request->hargaunit) && !empty($request->jmlnon)) {
          $otcc2 = $request->otcc2-($request->hargaunit*$request->jmlnon);
          $npk = $request->otcc2-($request->hargaunit*$request->jmlnon);
        }else{
          $otcc2 = $request->otcc2;
          $npk = $request->nilai_npk;
        }
      }else{
        $otcc2 = '0';
      }

      if (!empty($request->otcc3)) {
        if (!empty($request->hargaunit) && !empty($request->jmlnon)) {
          $otcc3 = $request->otcc3-($request->hargaunit*$request->jmlnon);
          $npk = $request->otcc3-($request->hargaunit*$request->jmlnon);
        }else{
          $otcc3 = $request->otcc3;
          $npk = $request->nilai_npk;
        }
      }else{
        $otcc3 = '0';
      }

      if (!empty($request->otcc4)) {
        if (!empty($request->hargaunit) && !empty($request->jmlnon)) {
          $otcc4 = $request->otcc4-($request->hargaunit*$request->jmlnon);
          $npk = $request->otcc4-($request->hargaunit*$request->jmlnon);
        }else{
          $otcc4 = $request->otcc4;
          $npk = $request->nilai_npk;
        }
      }else{
        $otcc4 = '0';
      }

      if (!empty($request->slg)) {
        $slg = $request->slg;
      }else{
        $slg = '0';
      }

      if (!empty($request->otc_ke)) {
        $otc_ke = $request->otc_ke;
      }else{
        $otc_ke = '0';
      }

      if (!empty($request->termin_ke)) {
        $termin_ke = $request->termin_ke;
      }else{
        $termin_ke = '0';
      }
      if (!empty($request->periode_bulan_usage)) {
        $usage = $request->periode_bulan_usage;
      }else {
        $usage ='';
      }

      if (empty($request->nilai_kontrak)) {
        $nilai_kontrak = 0;
      }else {
        $nilai_kontrak = $request->nilai_kontrak;
      }

      $id = $request->id;
        $data = array(
          'month' => $request->month,
          'mitra_name' => $request->mitra_name,
          'pks_number' => $request->pks_number,
          'customer_name' => $request->customer_name,
          'account_number' => $request->account_number,
          'segmen' => $request->segmen,
          'manager_name' => $request->manager_name,
          'nik' => $request->nik,
          'jangka_waktu_kontrak' => $request->jangka_waktu_kontrak.' '.'bulan',
          'awal_kontrak' => $request->awal_kontrak,
          'akhir_kontrak' => $request->akhir_kontrak,
          'nilai_kontrak' => $nilai_kontrak,
          'periode' => $request->periode_bulan,
          'curr_type' => $request->curr_type,
          'nilai_npk' => $npk,
          'tanggal_npk' => $request->tanggal_npk,
          'mrc' => $mrc,
          'otc_ke' => $otc_ke,
          'otc1' => $otcc1,
          'otc2' => $otcc2,
          'otc3' => $otcc3,
          'otc4' => $otcc4,
          'termin_ke' => $termin_ke, 
          'termin1' => $terminn1,
          'termin2' => $terminn2,
          'termin3' => $terminn3,
          'termin4' => $terminn4,
          'npk_ke' => $request->npk_day.'/'.$request->npk_month,
          'npk_day' => $request->npk_day,
          'npk_month' => $request->npk_month,
          'slg' => $slg,
          'usagee' => $usage,
          'keterangan' => $request->keterangan,
          'updated_at' => date('Y-m-d H:i:s', mktime(date("H") + 7, date("i"), date("s"), date("m"), date("d"), date("Y"))),
          'termin5' => $terminn5
        );

      $update = $this->connection->where('id',$id)->update($data);
      
      if ($update) {
        \notification('sukses','Data Berhasil Di Ubah !!!');
        return redirect('data-npk');
      }else{
        \notification('warning','Data Gagal Di Ubah !!!');
        return redirect('data-npk');
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
      $delete = $this->connection->where('id',$id)->delete();
        if ($delete) {
          \notification('sukses','Data Berhasil Di Hapus !!!');
          return redirect('data-npk');
        }else {
          \notification('warning','Data Gagal Di Hapus !!!');
          return redirect('data-npk');
        }
    }

    public function search(Request $request)
    {
      $accountt = $request->no_akun;
      $periodee = $request->periode;
      $kl = $request->no_kl;
        $data = $this->connection->where(function ($query) use ($accountt,$periodee,$kl){
          $query->where('account_number','like','%'.$accountt.'%')->where('periode','like','%'.$periodee.'%')->where('pks_number','like','%'.$kl.'%');
        })->orderBy('id','DESC')->paginate(20);
        
      $account = $this->connection->distinct()->select('account_number')->orderBy('account_number','ASC')->get();
      $periode = $this->connection->distinct()->select('periode')->orderBy('periode','ASC')->get();
      $pks = $this->connection->distinct()->select('pks_number')->orderBy('pks_number','ASC')->get();
        // return response()->json($data);
      $data->appends($request->only('no_akun','periode','no_kl'));
      return view('npk.index',compact('data','account','periode','pks'));
    }

    public function PreviewDownloadPdf(Request $request)
    {
      if ($request->id) {
        $id = $request->id;
        $type = $request->otc_dw;
        $value = $request->otc_download;
      }
      if ($request->idd1) {
        $id = $request->idd1;
        $type = $request->termin_dw;
        $value = $request->termin_download;
      }
      if ($request->iddd) {
        $id = $request->iddd;
        $type = $request->mrc_dw;
        $value = $request->mrc_download;
      }
      $data = $this->connection->where('id',$id)->get();
      Date::setLocale('id');//id kode untuk indonesia
      $tgl= Date::now()->format('j F Y'); 
      return view('npk.preview_pdf',compact('data','tgl','type','value')); 
    }

    public function DownloadPdf(Request $request, $id)
    {
      $type = $request->type;
      if ($type=='MRC') {
        $data = array(
          'keterangan_download_mrc' => $request->ktr,
          'tanggal_cetak' => date('Y-m-d H:i:s', mktime(date("H") + 7, date("i"), date("s"), date("m"), date("d"), date("Y"))),
          'updated_at' => date('Y-m-d H:i:s', mktime(date("H") + 7, date("i"), date("s"), date("m"), date("d"), date("Y")))
        ); 
      }elseif ($type=='OTC') {
        $data = array(
          'keterangan_download_otc' => $request->ktr,
          'tanggal_cetak' => date('Y-m-d H:i:s', mktime(date("H") + 7, date("i"), date("s"), date("m"), date("d"), date("Y"))),
          'updated_at' => date('Y-m-d H:i:s', mktime(date("H") + 7, date("i"), date("s"), date("m"), date("d"), date("Y")))
        );
      }else {
        $data = array(
          'keterangan_download_termin' => $request->ktr,
          'tanggal_cetak' => date('Y-m-d H:i:s', mktime(date("H") + 7, date("i"), date("s"), date("m"), date("d"), date("Y"))),
          'updated_at' => date('Y-m-d H:i:s', mktime(date("H") + 7, date("i"), date("s"), date("m"), date("d"), date("Y")))
        );
      }
      $value = $request->value;

      $update = $this->connection->where('id',$id)->update($data);
      if ($update) {
       $data = $this->connection->where('id',$id)->get(); 
      }
      Date::setLocale('id');//id kode untuk indonesia
      $tgl= Date::now()->format('j F Y');
    
      $pdf = PDF::loadview('npk.npk_pdf',compact('data','tgl','type','value'));
      $dw = $this->connection->where('id',$id)->get();
      return $pdf->stream($dw[0]->customer_name."-".$dw[0]->periode."-".$dw[0]->usagee);
    }

    public function CobaPdf()
    {
      $data = $this->connection->where('pks_number','like','%'.'K.TEL.0518-0102/HK.810/DES-A10000000/2018'.'%')->get();
      $pdf = PDF::loadview('npk.coba',compact('data'));
      return $pdf->stream();
    }

    public function SuratPernyataan(Request $request)
    {
    //   echo "<pre>";
    //     echo date('Ym',strtotime($request->awal_kontrak));echo"<br>"; echo date('Ym',strtotime($request->akhir_kontrak));
    //   echo "</pre>";
    //   die();
      $awal_kontrak = $request->awal_kontrak;
      $akhir_kontrak = $request->akhir_kontrak;
      // echo "<pre>";
      //   echo date('m.Y',strtotime($awal_kontrak)); echo "<br>";
      //   echo date('m.Y',strtotime($akhir_kontrak));
      // echo "</pre>";
      // die();

      // $data = DB::connection('oci8')->table('SW_FLAG_JOIN_RCDES')->where('accnum','like','%'.$request->account.'%')->where(function($query) use($awal_kontrak,$akhir_kontrak){
      //   $query->whereBetween('periode',[date('Ym',strtotime($awal_kontrak)),date('Ym',strtotime($akhir_kontrak))])->orWhereBetween('periode',[date('m.Y',strtotime($awal_kontrak)),date('m.Y',strtotime($akhir_kontrak))]);
      // })->get();

      // $data = DB::connection('oci8')->table('sw_all_rcdes')->where('acc_numb',$request->account)->whereBetween('m_date',[date('Ym',strtotime($request->awal_kontrak)),date('Ym',strtotime($request->akhir_kontrak))])->get();
      $data = DB::connection('oci8')->table('mybrains_trems_np_cyc_des')->where('idnumber','like','%'.$request->account.'%')->whereBetween('bill_period',[date('Ym',strtotime($awal_kontrak)),date('Ym',strtotime($akhir_kontrak))])->get();
      $res = DB::connection('oci8')->table('sw_npk')->distinct()->where('account_number','like','%'.$request->account.'%')->first();
      if (!empty($res)) {
        Date::setLocale('id');//id kode untuk indonesia
        $tgl= Date::now()->format('j F Y');
      
        $pdf = PDF::loadview('npk.pernyataan_bayar_pdf',compact('data','tgl','res'));
        return $pdf->stream();
      }else{
        echo "<script>alert('Data Tidak Di Temukan !!!')</script>";
        return redirect('data-npk');
      }
    }

    public function DataSuratPembayaran(Request $request)
    {
      $periode = DB::connection('oci8')->table("NPK_PERNYATAAN_PEMBAYARAN")->distinct()->select('nper')->orderBy('nper','DESC')->get();
      return view('suratPembayaran.index',compact('periode'));
    }

    public function CetakSuratPembayaran(Request $request)
    {
      $account = $request->account;
      $periode1 = $request->periode1;
      $periode2 = $request->periode2;
      // $mgr = $this->connection->distinct()->select('manager_name','nik','segmen','customer_name','account_number')->where('account_number','=',$account)->get();
      $mgr = array(
        'manager_name' => $request->mgr_name,
        'nik' => $request->nik,
        'segmen' => $request->segmen,
        'customer_name' => $request->customer_name,
        'account_number' => $request->account
      );
      $tamp= (object) $mgr;
      if(isset($_POST["pdf"])){
        Date::setLocale('id');//id kode untuk indonesia
        $tgl= Date::now()->format('j F Y');
        $data = DB::connection('oci8')->table("NPK_PERNYATAAN_PEMBAYARAN")->select('cl_id','idnumber','account_name','nper','cl_hkont','cl_post_date',
                 DB::raw('sum(total_cash) as total_cash'),DB::raw('sum(total_non_cash) as total_non_cash'))->where('idnumber','=',$account)->where('total_cash','!=',0)->whereNotNull('cl_hkont')->whereBetween('nper',[$periode1,$periode2])->groupBy('cl_id','idnumber','account_name','nper','cl_hkont','cl_post_date')->orderBy('nper','ASC')->get();
        
        $pdf = PDF::loadview('suratPembayaran.pernyataanPembayaranPdf',compact('data','tgl','mgr'));
        return $pdf->stream($mgr['customer_name']."-".$mgr['account_number']);
      }else{
        $data = DB::connection('oci8')->table("NPK_PERNYATAAN_PEMBAYARAN")->select('cl_id','idnumber','account_name','nper','cl_hkont','cl_post_date',
                DB::raw('sum(total_cash) as total_cash'),DB::raw('sum(total_non_cash) as total_non_cash'))->where('idnumber','=',$account)->where('total_cash','!=',0)->whereNotNull('cl_hkont')->whereBetween('nper',[$periode1,$periode2])->groupBy('cl_id','idnumber','account_name','nper','cl_hkont','cl_post_date')->orderBy('nper','ASC')->get();
        Excel::create('Surat Pembayaran '.$tamp->customer_name, function ($excel) use ($data,$mgr) {
          $excel->sheet('Surat Pembayaran', function ($sheet) use ($data,$mgr) {
              $sheet->appendRow(array(
                  'CUSTOMER NAME',
                  'AKUN',
                  'TAGIHAN',
                  'TANGGAL FLAGING',
                  'JUMLAH FLAGING',
                  'PAYMENT ID'
              ));
              foreach ($data as $row)
              {
                  $sheet->appendRow(array(
                      $mgr['customer_name'],
                      $row->idnumber,
                      date_format(date_create(substr($row->nper,0,4).'-'.substr($row->nper,4,6)),"M'y"),
                      date('d/m/Y',strtotime($row->cl_post_date)),
                      number_format($row->total_cash),
                      $row->cl_id
                  ));
              }
          });
  
      })->download('csv');
      }
    }

    public function getAccount(Request $request)
    {
      if($request->get('query'))
     {
      $query = $request->get('query');
      $data = DB::connection('oci8')->table('promise_detail_imes_quote')->distinct()->select('accountnas')
        ->where('accountnas', 'LIKE', "%{$query}%")
        ->get();
      $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
      foreach($data as $row)
      {
       $output .= '
       <li id="accountnas"><a href="#">'.$row->accountnas.'</a></li>
       ';
      }
      $output .= '</ul>';
      echo $output;
     }
    }

    public function getPksNumber(Request $request)
    {
      if($request->get('query'))
     {
      $query = $request->get('query');
      $data = DB::connection('oci8')->table('promise_detail_imes_quote')->distinct()->select('nomor_kl','accountnas')
        ->where('nomor_kl', 'LIKE', "%{$query}%")
        ->get();
      $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
      foreach($data as $row)
      {
       $output .= '
       <li id="number_pks"><a href="#">'.$row->nomor_kl.'</a></li>
       ';
      }
      $output .= '</ul>';
      echo $output;
     }
    }

    public function exportExcel()
    {
    $records = $this->connection->get();

    Excel::create('SUMMARY NPK '.strtoupper(date('M')), function ($excel) use ($records) {
        $excel->sheet('SUMMARY', function ($sheet) use ($records) {

            $sheet->appendRow(array(
                'NO',
                'ID',
                'MONTH',
                'MITRA NAME',
                'PKS NUMMBER',
                'CUSTOMER NAME',
                'ACCOUNT NUMBER',
                'SEGMEN',
                'MANAGER NAME',
                'NIK',
                'JANGKA WAKTU KONTRAK',
                'AWAL KONTRAK',
                'AKHIR KONTRAK',
                'NILAI KONTRAK',
                'PERIODE',
                'CURR TYPE',
                'NILAI NPK',
                'TANGGAL NPK',
                'MRC',
                'OTC KE',
                'OTC1',
                'OTC2',
                'OTC3',
                'OTC4',
                'TERMIN KE',
                'TERMIN1',
                'TERMIN2',
                'TERMIN3',
                'TERMIN4',
                'NPK KE',
                'NPK DAY',
                'NPK MONTH',
                'SLG',
                'USAGEE',
                'KETERANGAN',
                'KETERANGAN DOWNLOAD OTC',
                'KETERANGAN DOWNLOAD MRC',
                'KETERANGAN DOWNLOAD TERMIN',
                'CREATED_AT',
                'TANGGAL CETAK'
            ));
            $no=1;
            foreach ($records as $row)
            {
              $npk_ke = "'".$row->npk_ke;
                $sheet->appendRow(array(
                    $no++,
                    $row->id,
                    $row->month,
                    $row->mitra_name,
                    $row->pks_number,
                    $row->customer_name,
                    $row->account_number,
                    $row->segmen,
                    $row->manager_name,
                    $row->nik,
                    $row->jangka_waktu_kontrak,
                    $row->awal_kontrak,
                    $row->akhir_kontrak,
                    $row->nilai_kontrak,
                    $row->periode,
                    $row->curr_type,
                    $row->nilai_npk,
                    $row->tanggal_npk,
                    $row->mrc,
                    $row->otc_ke,
                    $row->otc1,
                    $row->otc2,
                    $row->otc3,
                    $row->otc4,
                    $row->termin_ke,
                    $row->termin1,
                    $row->termin2,
                    $row->termin3,
                    $row->termin4,
                    $npk_ke,
                    $row->npk_day,
                    $row->npk_month,
                    $row->slg,
                    $row->usagee,
                    $row->keterangan,
                    $row->keterangan_download_otc,
                    $row->keterangan_download_mrc,
                    $row->keterangan_download_termin,
                    $row->created_at,
                    $row->tanggal_cetak
                ));
            }
        });

    })->download('csv');

    }

    public function import(Request $request)
    {
      if ($request->hasFile('importData')) {
        $path = $request->file('importData')->getRealPath();
        $data = Excel::load($path, function($reader){})->get();
        $a = collect($data);
        foreach ($a as $key => $value) {
          if (!empty($value->termin1)) {
            $termin1 = $value->termin1;
          }else{
            $termin1 = '0';
          }

          if (!empty($value->termin2)) {
            $termin2 = $value->termin2;
          }else{
            $termin2 = '0';
          }

          if (!empty($value->termin3)) {
            $termin3 = $value->termin3;
          }else{
            $termin3 = '0';
          }

          if (!empty($value->termin4)) {
            $termin4 = $value->termin4;
          }else{
            $termin4 = '0';
          }

          if (!empty($value->mrc)) {
            $mrc = $value->mrc;
          }else{
            $mrc = '0';
          }

          if (!empty($value->otc1)) {
            $otc1 = $value->otc1;
          }else{
            $otc1 = '0';
          }

          if (!empty($value->otc2)) {
            $otc2 = $value->otc2;
          }else{
            $otc2 = '0';
          }

          if (!empty($value->otc3)) {
            $otc3 = $value->otc3;
          }else{
            $otc3 = '0';
          }

          if (!empty($value->otc4)) {
            $otc4 = $value->otc4;
          }else{
            $otc4 = '0';
          }

          if (!empty($value->slg)) {
            $slg = $value->slg;
          }else{
            $slg = '0';
          }

          if (!empty($value->otc_ke)) {
            $otc_ke = $value->otc_ke;
          }else{
            $otc_ke = '0';
          }

          if (!empty($value->termin_ke)) {
            $termin_ke = $value->termin_ke;
          }else{
            $termin_ke = '0';
          }

          if (!empty($value->periode_bulan_usage) && !empty($value->periode_tahun_usage)) {
            $usage = $value->periode_bulan_usage.' '.$value->periode_tahun_usage;
          }else {
            $usage ='';
          }

          if ($value->awal_kontrak=='Tanggal BASO') {
            $awal_kontrak = 'Tanggal BASO';
          }elseif ($value->awal_kontrak=='Tanggal BAST') {
            $awal_kontrak = 'Tanggal BAST';
          }else {
            $awal_kontrak = date('Y-m-d',strtotime($value->awal_kontrak));
          }

          if (!empty($value->akhir_kontrak)) {
            $akhir_kontrak = date('Y-m-d',strtotime($value->akhir_kontrak));
          }else {
            $akhir_kontrak = '';
          }

          if (!empty($value->npk_day) && !empty($value->npk_month)) {
            $npk_ke = $value->npk_day.'/'.$value->npk_month;
          }else{
            $npk_ke = 'OTC';
          }

          $insert[] = [
            'id' =>null,
            'month' => $value->month,
            'mitra_name' => $value->mitra_name,
            'pks_number' => $value->pks_number,
            'customer_name' => $value->customer_name,
            'account_number' => $value->account_number,
            'segmen' => $value->segmen,
            'manager_name' => $value->manager_name,
            'nik' => $value->nik,
            'jangka_waktu_kontrak' => $value->jangka_waktu_kontrak,
            'awal_kontrak' => $awal_kontrak,
            'akhir_kontrak' => $akhir_kontrak,
            'nilai_kontrak' => $value->nilai_kontrak,
            'periode' => $value->periode,
            'curr_type' => $value->curr_type,
            'nilai_npk' => $value->nilai_npk,
            'tanggal_npk' => date('Y-m-d',strtotime($value->tanggal_npk)),
            'mrc' => $mrc,
            'otc_ke' => $otc_ke,
            'otc1' => $otc1,
            'otc2' => $otc2,
            'otc3' => $otc3,
            'otc4' => $otc4,
            'termin_ke' => $termin_ke, 
            'termin1' => $termin1,
            'termin2' => $termin2,
            'termin3' => $termin3,
            'termin4' => $termin4,
            'npk_ke' => $npk_ke,
            'npk_day' => $value->npk_day,
            'npk_month' => $value->npk_month,
            'slg' => $slg,
            'usagee' => $usage,
            'keterangan' => $value->keterangan,
            'keterangan_download_otc' => $value->keterangan_download_otc,
            'keterangan_download_mrc' => $value->keterangan_download_mrc,
            'keterangan_download_termin' => $value->keterangan_download_termin,
            'created_at' => null
          ];    
          $this->connection->insert($insert[$key]);      
        }
      }
      return redirect('data-npk');
    }

    public function IndexNpkMkt()
    {
      $data = $this->connection1->orderBy('id','DESC')->paginate(20);
      $pks_number = $this->connection1->distinct()->select('pks_number')->orderBy('pks_number','ASC')->get();
      $mitra_name = $this->connection1->distinct()->select('mitra_name')->orderBy('mitra_name','ASC')->get();
      return view('npkMkt.index',compact('data','pks_number','mitra_name'));
    }

    public function viewCreateNpkMkt()
    {
      return view('npkMkt.create_npk_baru');
    }

    public function CreateNpkMkt(Request $request)
    {
      $data = array(
        'id' =>null,
        'month' => $request->month,
        'mitra_name' => $request->mitra_name,
        'pks_number' => $request->pks_number,
        'periode' => $request->periode_bulan,
        'nilai_npk' => $request->nilai_npk,
        'keterangan' => $request->keterangan,
        'created_at' => date('Y-m-d H:i:s', mktime(date("H") + 7, date("i"), date("s"), date("m"), date("d"), date("Y"))) 
      );

      echo"<pre>";
        print_r($data);
      echo"</pre>";
      die();
        $insert = $this->connection1->insert($data);
        
        if ($insert) {
          \notification('sukses','Data Berhasil Di Tambahkan !!!');
          return redirect('data-npk-mkt');
        }else{
          \notification('warning','Data Gagal Di Tambahkan !!!');
          return redirect('data-npk-mkt');
        }
    }

    public function updateNpkMkt(Request $request)
    {
        $id = $request->id;
        $data = array(
          'month' => $request->monthh,
          'mitra_name' => $request->mitra_namee,
          'pks_number' => $request->pks_numberr,
          'periode' => $request->periode_bulann,
          'nilai_npk' => $request->nilai_npkk,
          'keterangan' => $request->keterangann,
          'updated_at' => date('Y-m-d H:i:s', mktime(date("H") + 7, date("i"), date("s"), date("m"), date("d"), date("Y"))) 
        );

      $update = $this->connection1->where('id',$id)->update($data);
      
      if ($update) {
        \notification('sukses','Data Berhasil Di Ubah !!!');
        return redirect('data-npk-mkt');
      }else{
        \notification('warning','Data Gagal Di Ubah !!!');
        return redirect('data-npk-mkt');
      }
    }

    public function getNpkMkt($id)
    {
      $datas = $this->connection1->where('id',$id)->get();
      foreach($datas as $data){
        return response()->json($data);
      }
    }

    public function delete($id)
    {
      $delete = $this->connection1->where('id',$id)->delete();
        if ($delete) {
          \notification('sukses','Data Berhasil Di Hapus !!!');
          return redirect('data-npk-mkt');
        }else {
          \notification('warning','Data Gagal Di Hapus !!!');
          return redirect('data-npk-mkt');
        }
    }

    public function searchNpk(Request $request)
    {
      $mitra_name = $request->mitra_name;
      $pks_number = $request->pks_number;
        $data = $this->connection1->where(function ($query) use ($mitra_name,$pks_number){
          $query->where('mitra_name','like','%'.$mitra_name.'%')->where('pks_number','like','%'.$pks_number.'%');
        })->orderBy('id','DESC')->paginate(20);
        $pks_number = $this->connection1->distinct()->select('pks_number')->orderBy('pks_number','ASC')->get();
        $mitra_name = $this->connection1->distinct()->select('mitra_name')->orderBy('mitra_name','ASC')->get();
      $data->appends($request->only('mitra_name','pks_number'));
      return view('npkMkt.index',compact('data','mitra_name','pks_number'));
    }
}
