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
use PDF;
use Auth;
use DB;
use App\User;
use Carbon\Carbon;

class ncxController extends Controller
{
       /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/ncx';


    public function index()
    {
        // $data = DB::connection('oci8')->table("ncrm_agree_order_line")
        // ->paginate(10);
    //    return view('ncx.index',compact('data'));
    return view('ncx.index');
    }



    public function cari(Request $request)
	{


        $sid     = Input::get('sid');
        
        $data = DB::connection('oci8')->table("ncrm_agree_order_line")
        ->where('li_sid','like',"%".$sid."%")
        ->Orwhere('order_id','like',"%".$sid."%")
        ->paginate(10);
        $data->appends(['sid' => $sid]);
        return view('ncx.hasil',compact('data'));
        
    }



   
    public function export()
    {
        $nomorkls = DB::connection('oci8')->table("amdes.ncrm_agree_order_line")->distinct()->select('nomor_kl')->orderBy('nomor_kl','DESC')->get();
        $tanggals = DB::connection('oci8')->table("amdes.ncrm_agree_order_line")->distinct()->select('date_rc')->orderBy('date_rc','DESC')->get();

        return view('paymentneed.export',compact('nomorkls','tanggals'));
    }

    public function exportPost(Request $request)
    {
        
        // $accnum      = Input::get('accnum');
        // $tagihan      = Input::get('tagihan');
        

        $payment = DB::connection('oci8')->table("amdes.ncrm_agree_order_line")
                        ->where('nomor_kl', $request->nomorkl)
                        ->where('date_rc', $request->tanggalrc)->distinct()->get()->groupBy('m_date')->toArray();

    
        // echo "<pre>";
        //     print_r($payment);
        // echo "</pre>";
        // die();

        
        $arr = [];
        foreach($payment as $idx => $value) {
            $data = array_push($arr, 
            (array) [
                'accnum' => $idx,
                'details' => $value
            ]);
        }
        $handler = 'export' . ucfirst($request->get('type'));

        if($arr != null){
            return $this->$handler($arr);
        }
        else{
            $nomorkls = DB::connection('oci8')->table("amdes.ncrm_agree_order_line")->distinct()->select('nomor_kl')->orderBy('nomor_kl','DESC')->get();
            $tanggals = DB::connection('oci8')->table("amdes.ncrm_agree_order_line")->distinct()->select('date_rc')->orderBy('date_rc','DESC')->get();

        return view('paymentneed.export',compact('nomorkls','tanggals'));

        }
        // dd($arr);
        //return response()->json($arr);
        //return $this->$handler($arr);
        
    }

    public function exportPdf($arr)
    {
        
    // echo"<pre>";
    //   print_r($arr);
    // echo"</pre>";
        // var_dump($arr);
        // die();
        $pdf = PDF::loadview('pdf.paymentneeds', compact('arr'))->setPaper('a4', 'potraid');
        // return $pdf->download('surat_pernyataan_pembayaran_customer_telkom.pdf');
        return $pdf->stream();

        // $pdf = PDF::loadView('pdf_view', $data);  
        // return $pdf->download('medium.pdf');
    }

    private function exportXls($arr)
    {
        $nama = 'surat_pernyataan_pembayaran_'.date('Y-m-d_H-i-s');
        Excel::create($nama, function($excel) use ($arr) {
            // Set property
            $excel->setTitle('Surat Pernyataan Pembayaran')
                ->setCreator(Auth::user()->name);
            
            $excel->sheet('Surat Pernyataan Pembayaran', function($sheet) use ($arr) {    
                //dd($arr);
                $row = 9;
                $row8 = 11;
                $c5 = 'C5';
                $c6 = 'C6';
                
                
                // $sheet->cell('C7', function ($cell) {$cell->setAlignment('left');});
                      
                $sheet->mergeCells('A1:F1');
                $sheet->cell('A1', function($cell) {$cell->setValue('SURAT PERNYATAAN PEMBAYARAN CUSTOMER TELKOM');
                });

                $sheet->mergeCells('A3:F3');
                $sheet->cell('A3', function($cell) {$cell->setValue('yang bertanda tangan di bawah ini :');
                });

                $sheet->cell('A5', function($cell) {$cell->setValue('Nama/NIK');
                });

                $sheet->cell('B5', function($cell) {$cell->setValue(':');
                });

                // foreach($arr as $idx => $value) {$sheet->cell($c5, function($cell) use ($value) {
                //         $cell->setValue($value['details'][0]['nomor_tagihan']);
                //     });
                // }

                $sheet->cell('A6', function($cell) {$cell->setValue('Jabatan');
                });

                $sheet->cell('B6', function($cell) {$cell->setValue(':');
                });

                // foreach($arr as $idx => $value) {$sheet->cell($c6, function($cell) use ($value) {
                //         $cell->setValue($value['details'][0]['nomor_tagihan']);
                //     });
                // }

                $sheet->mergeCells('A7:F7');
                $sheet->cell('A7', function($cell) {$cell->setValue('Menyatakan Bahwa customer Telkom di bawah ini telah melakukan pembayaran ke Telkom dengan rincian sebagai berikut :');
                });
                
                // $row_header = 1; 
                // foreach ($arr as $idx => $value) { 
                //     $i = 1;
                //     $row_header++;
                //     $sheet->row($row_header, [
                //         'Nama CC',
                //         'ACCOUNT',
                //         'TAGIHAN',
                //         'TANGGAL RC',
                //         'JUMLAH BAYAR',
                //         'NO REK MANDIRI'
                //     ]);
                //     foreach ($arr as $idx => $value) {
                //         foreach($value['details'] as $detail) {
                //             $sheet->row(++$row_header, [
                //                 $detail['customer'],
                //                 $detail['accnum'],
                //                 $detail['periode'],
                //                 $detail['cidnas'],
                //                 $detail['periode'],//INI BELOM ADA
                //                 $detail['amount'],
                //                 $detail['periode']//ini belom ada
                //             ]);
                //         $i++;
                //         }
                //     }
                // }
                // dd($arr);
            });
        })->export('xls');
    }

    

    // private function exportXls($paymentneed)
    // {
    //     $nama = 'Data_table_paymentneed_'.date('Y-m-d_H-i-s');
    //     Excel::create($nama, function ($excel) use ($paymentneed) {
    //         // Set property
    //         $excel->setTitle('Data Cek AP')
    //             ->setCreator(Auth::user()->name);

    //         $excel->sheet('Data Ap', function($sheet) use ($paymentneed) {
    //             $row = 1;
    //             $sheet->row($row, [
    //                         'paymentid',
    //                         'typetrans',
    //                         'babill',
    //                         'deskripsi',
    //                         'accnum',
    //                         'customer',
    //                         'periode',
    //                         'cur',
    //                         'amount',
    //                         'product',
    //                         'userflg',
    //                         'clearingdoc',
    //                         'flagdate',
    //                         'keterangan',
    //                         'postdate',
    //                         'potppn',
    //                         'potpph',
    //                         'potlain',
    //                         'reversedoc',
    //                         'reversedate',
    //                         'nodoc'                     
    //                     ]);
    //             foreach ($paymentneed as $paymentneeds) {
    //                 $sheet->row(++$row, [
    //                         $paymentneeds->paymentid,
    //                         $paymentneeds->typetrans,
    //                         $paymentneeds->babill,
    //                         $paymentneeds->deskripsi,
    //                         $paymentneeds->accnum,
    //                         $paymentneeds->customer,
    //                         $paymentneeds->periode,
    //                         $paymentneeds->cur,
    //                         $paymentneeds->amount,
    //                         $paymentneeds->product,
    //                         $paymentneeds->userflg,
    //                         $paymentneeds->clearingdoc,
    //                         $paymentneeds->flagdate,
    //                         $paymentneeds->keterangan,
    //                         $paymentneeds->postdate,
    //                         $paymentneeds->potppn,
    //                         $paymentneeds->potpph,
    //                         $paymentneeds->potlain,
    //                         $paymentneeds->reversedoc,
    //                         $paymentneeds->reversedate,
    //                         $paymentneeds->nodoc        
    //                 ]);
    //             }
    //         });
    //     })->export('xls');
    // }

    public function ViewCekPembayaran($account)
    {
        $periode = DB::connection('oci8')->table("ADEX_PERNYATAAN_PEMBAYARAN")->distinct()->select('BILL_PERIOD')->orderBy('BILL_PERIOD','DESC')->get();
        return view('cekAp.index',compact('account','periode'));
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
