@extends('layouts.app')

@section('dashboard')
Summary
<small>Summary Npk</small>
@endsection

@section('breadcrumb')
<li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Summary Npk</li>
@endsection
@section('content')
<!-- View Table NPK -->
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div style="overflow-x:auto;">
        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
          <div class="row">
            @foreach($data as $datas)
            <div class="col-md-8">
              <div style="margin-left:50px;margin-top:50px;">
                <table>
                    <tr style="font-size: 12px;">
                        <td>RINCIAN PEMBAYARAN DAN PERHITUNGAN HAK MITRA</td>
                    </tr>
                </table>
                <table>
                    <tr style="font-size: 12px;">
                        <td>NAMA CC</td>
                        <td>:</td>
                        <td>{{ $datas->customer_name }}</td>
                    </tr>
                    <tr style="font-size: 12px;">
                        <td>NO AKUN</td>
                        <td>:</td>
                        <td>{{ $datas->account_number }}</td>
                    </tr>
                    <tr style="font-size: 12px;">
                        <td>TAGIHAN</td>
                        <td>:</td>
                        <td>
                            {{ $datas->periode }}
                            @if(!empty($datas->usagee))
                                {{ '(Usage'.' '.$datas->usagee.')' }}
                            @endif</td>
                    </tr>
                </table>
                <table border="1px;" style="font-size: 12px;">
                    <tr style="text-align: center;">
                        <td rowspan="2">NO</td>
                        <td rowspan="2" style="width: 350px;">URAIAN</td>
                        <td rowspan="2" style="width: 110px;">Periode NPK</td>
                        <td style="width: 110px;">Periode</td>
                    </tr>
                    <tr>
                        <td style="text-align: center;width: 110px;">@if(!empty($datas->usagee))
                                {{ $datas->usagee }}@else {{ $datas->periode }}
                            @endif</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <span>HAK MITRA</span><br>
                            <span style="margin-left: 30px;">{{ $datas->mitra_name }}</span><br>
                            <span style="margin-left: 30px;">{{ $datas->pks_number }}</span><br>
                            <span style="margin-left: 30px;">+ <input id="ktr1" style="width: 300px;" type="text" name="keterangan1"></span><br>
                        </td>
                        <td style="text-align: center;"><br><br><br><br>
                          @if($type=='OTC')
                        {{ $datas->keterangan }}
                    @elseif($type=='TERMIN')
                        {{ $datas->keterangan }}
                    @else
                        <!-- bln ke {{ $datas->npk_day }} dari {{ $datas->npk_month }} bln -->
                        {{ $datas->keterangan }}
                    @endif
                        </td>
                        <td style="text-align: right;"><br><br><br><br>
                          @if($type=='OTC')
                            IDR {{ number_format($value) }}
                          @elseif($type=='TERMIN')
                            IDR {{ number_format($value) }}
                          @else
                            IDR {{ number_format($value) }}
                          @endif
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;" colspan="3">TOTAL HAK MITRA</td>
                        <td style="text-align: right;">
                          @if($type=='OTC')
                            IDR {{ number_format($value) }}
                          @elseif($type=='TERMIN')
                            IDR {{ number_format($value) }}
                          @else
                            IDR {{ number_format($value) }}
                          @endif
                        </td>
                    </tr>
                </table>
                <table style="font-size: 12px;">
                    <tr><td>KETERANGAN :</td></tr>
                    <tr><td>HAK MITRA BELUM TERMASUK PPN 10 %</td></tr>
                </table>
                <br>
                <div style="font-size: 12px;">
                    <span style="margin-left: 135px;">Mengetahui</span>
                    <span style="margin-left: 190px;">Jakarta, {{ $tgl }}<br><span style="margin-left: 135px;">OSM CDM</span><span style="margin-left: 180px;">MANAGER AP MANAGEMENT</span></span>
                </div>
                <br><br><br><br>
                <table style="font-size: 12px;">
                    <tr>
                        <td><u style="margin-right: 220px;margin-left: 130px;">ARDI IMAWAN</u><br><span style="margin-right: 200px;margin-left: 133px;">NIK. 670168</span></td>
                        <td><u>IBNU RADHI</u><br><span style="margin-right: 5px;">NIK. 730254</span></td>
                    </tr>
                </table>
              </div>
            </div>
            <div class="col-md-4">
              <form action="{{ url('npk-download/'.$datas->id) }}" method="POST">
                {{ csrf_field() }}
                <div style="margin-top: 150px;">
                  <input type="hidden" name="type" value="{{ $type }}">
                  <input type="hidden" name="value" value="{{ $value }}">
                  <input type="hidden" name="ktr" id="ktr">
                  <button class="btn btn-primmary btn-sm btn-block"><span style="font-size: 50px;" class="glyphicon glyphicon-print" aria-hidden="true"></span><span style="font-size: 30px; font-family: arial;"> Print Data</span></button>
                </div>
              </form>
            </div>
                @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End View Table NPK -->
@endsection

@section('scripts')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />''
<script type="text/javascript">
  $('#ktr1').keyup(function(){
    $('#ktr').val($(this).val());
  });
  $('#hide1').hide();
  $('#hide2').hide();
  $('#hide3').hide();
  $('#hide4').hide();
  $('#hide5').hide();
  $('#hide6').hide();
  $('#hide7').hide();
  $('#hide8').hide();

  $('#hidee1').hide();
  $('#hidee2').hide();
  $('#hidee3').hide();
  $('#hidee4').hide();
  $('#hidee5').hide();
  $('#hidee6').hide();
  $('#hidee7').hide();
  $('#hidee8').hide();
  $('#download_excel').modal('hide');

  $('#download_kl').click(function(){
    $('#download_excel').modal('show');
  });
  
  var otc1,otc2,otc3,otc4;
  $('#otc1').keyup(function(){
    otc1 = $(this).val();
    $('#otc_ke').val('1');
  });
  $('#otc2').keyup(function(){
    otc2 = $(this).val();
    $('#otc_ke').val('2');
  });
  $('#otc3').keyup(function(){
    otc3 = $(this).val();
    $('#otc_ke').val('3');
  });
  $('#otc4').keyup(function(){
    otc3 = $(this).val();
    $('#otc_ke').val('4');
  });

  var termin1,termin2,termin3,termin4;
  $('#termin1').keyup(function(){
    termin1 = $(this).val();
    $('#termin_ke').val('1');
  });
  $('#termin2').keyup(function(){
    termin2 = $(this).val();
    $('#termin_ke').val('2');
  });
  $('#termin3').keyup(function(){
    termin3 = $(this).val();
    $('#termin_ke').val('3');
  });
  $('#termin3').keyup(function(){
    termin3 = $(this).val();
    $('#termin_ke').val('4');
  });
  $("input[name='termin']").change(function(){
    if( $(this).is(":checked") ){
      var val = $(this).val();
      if (val=='tr1') {
        $('#hide1').show();
        $('#hide2').hide();
        $('#hide3').hide();
        $('#hide4').hide();
      }
      if (val=='tr2') {
        $('#hide1').hide();
        $('#hide2').show();
        $('#hide3').hide();
        $('#hide4').hide();
      }
      if (val=='tr3') {
        $('#hide1').hide();
        $('#hide2').hide();
        $('#hide3').show();
        $('#hide4').hide();
      }
      if (val=='tr4') {
        $('#hide1').hide();
        $('#hide2').hide();
        $('#hide3').hide();
        $('#hide4').show();
      }
    }
  });
  $("input[name='otc']").change(function(){
    if( $(this).is(":checked") ){
      var val = $(this).val();
      if (val=='tr1') {
        $('#hide5').show();
        $('#hide6').hide();
        $('#hide7').hide();
        $('#hide8').hide();
      }
      if (val=='tr2') {
        $('#hide5').hide();
        $('#hide6').show();
        $('#hide7').hide();
        $('#hide8').hide();
      }
      if (val=='tr3') {
        $('#hide5').hide();
        $('#hide6').hide();
        $('#hide7').show();
        $('#hide8').hide();
      }
      if (val=='tr4') {
        $('#hide5').hide();
        $('#hide6').hide();
        $('#hide7').hide();
        $('#hide8').show();
      }
    }
  });

  $("input[name='terminn']").change(function(){
    if( $(this).is(":checked") ){
      var val = $(this).val();
      if (val=='trr1') {
        $('#hidee1').show();
        $('#hidee2').hide();
        $('#hidee3').hide();
        $('#hidee4').hide();
      }
      if (val=='trr2') {
        $('#hidee1').hide();
        $('#hidee2').show();
        $('#hidee3').hide();
        $('#hidee4').hide();
      }
      if (val=='trr3') {
        $('#hidee1').hide();
        $('#hidee2').hide();
        $('#hidee3').show();
        $('#hidee4').hide();
      }
      if (val=='trr4') {
        $('#hidee1').hide();
        $('#hidee2').hide();
        $('#hidee3').hide();
        $('#hidee4').show();
      }
    }
  });
  $("input[name='otcc']").change(function(){
    if( $(this).is(":checked") ){
      var val = $(this).val();
      if (val=='trr1') {
        $('#hidee5').show();
        $('#hidee6').hide();
        $('#hidee7').hide();
        $('#hidee8').hide();
      }
      if (val=='trr2') {
        $('#hidee5').hide();
        $('#hidee6').show();
        $('#hidee7').hide();
        $('#hidee8').hide();
      }
      if (val=='trr3') {
        $('#hidee5').hide();
        $('#hidee6').hide();
        $('#hidee7').show();
        $('#hidee8').hide();
      }
      if (val=='trr4') {
        $('#hidee5').hide();
        $('#hidee6').hide();
        $('#hidee7').hide();
        $('#hidee8').show();
      }
    }
  });

  $("input[name='opsi']").change(function(){
    if( $(this).is(":checked") ){
      var val = $(this).val();
      if (val=='mrc') {
        $('#opsi1').show();
        $('#opsi2').hide();
      }
      if (val=='otc') {
        $('#opsi1').hide();
        $('#opsi2').show();
      }
    }
  });
  $('#account_number').keyup(function(){
    var query = $(this).val();
    if (query !='') {
      var _token = $('input[name="_token"]').val();
     $.ajax({
      url:"{{ route('get-account') }}",
      method:"POST",
      data:{query:query, _token:_token},
      success:function(data){
        $('#accountList').fadeIn();  
        $('#accountList').html(data);
      }
     });
    }else{
      $('#accountList').fadeOut();
    }
  });

  $('#pks_number').keyup(function(){
    var query = $(this).val();
    if (query !='') {
      var _token = $('input[name="_token"]').val();
     $.ajax({
      url:"{{ route('get-pks-number') }}",
      method:"POST",
      data:{query:query, _token:_token},
      success:function(data){
        $('#pksList').fadeIn();  
        $('#pksList').html(data);
      }
     });
    }else{
      $('#pksList').fadeOut();
    }
  });

  $(document).on('click', 'li#accountnas', function(){  
      $('#account_number').val($(this).text());  
      $('#accountList').fadeOut();  
  });
  $(document).on('click', 'li#number_pks', function(){  
      $('#pks_number').val($(this).text());  
      $('#pksList').fadeOut();  
  });
  $('.input-daterange').datepicker({
    todayBtn:'linked',
    format:'yyyy-mm-dd',
    autoclose:true
  });

  $('.input-date').datepicker({
    todayBtn:'linked',
    format:'yyyy-mm-dd',
    autoclose:true
  });

  function jangka_waktu(){
    $('#npk_month').val($('#jangka_waktu_kontrak').val());
  }
  $(document).ready( function () {
    $('select').selectize({
    // sortField: 'text'
  });

    $('#exampleModalLong').modal('hide');
    $('#role').hide();
    $('#table_id').DataTable({
     searching:false,
     scrollX:true,
     scrollY:true,
     ordering:false,
     lengthChange:false
   });
    $('#tambah_kl').click(function () {
      $('#hide').hide();
      $('#pesan').html('<pre><strong>Silahkan Isi Periode (Bulan) dan Periode (Tahun)</strong></pre>');
      $('#pesannn').html('<pre><strong>Silahkan Isi <i>Usage Periode</i> Jika Ada (<i>Opsional</i>)</strong></pre>');
      $('#termin').html('<pre><strong>Silahkan Pilih dan Isi <i>Termin</i> Jika Ada (<i>Opsional</i>)</strong></pre>');
      $('#otc').html('<pre><strong>Silahkan Pilih dan Isi <i>Otc</i> Jika Ada (<i>Opsional</i>)</strong></pre>');
      $('#npkJk').html('Silahkan Isi Jika Bukan <i>Otc</i>');
      $('#opsi').html('<pre><strong>Silahkan Pilih <i>Mrc</i> atau <i>Otc</i></strong></pre>');
      $('#mitra_name').val('');
      $('#pks_number').val('');
      $('#customer_name').val('');
      $('#account_number').val('');
      $('#segmen').val('');
      $('#manager_name').val('');
      $('#nik').val('');
      $('#jangka_waktu_kontrak').val('');
      $('#awal_kontrak').val('');
      $('#akhir_kontrak').val('');
      $('#nilai_kontrak').val('');
      $('#periode_bulan').val('');
      $('#periode_tahun').val('');
      $('#curr_type').val('');
      $('#nilai_npk').val('');
      $('#tanggal_npk').val('');
      $('#npk_ke').val('');
      $('#npk_month').val('');
      // $('#termin').val('');
      $('#mrc').val('');
      $('#otc').val('');
      $('#slg').val('');
      $('#keterangan').val('');
      $('#exampleModalLong').modal('show');
    });
    $('#save').click(function() {
      var jk = $('#jangka_waktu_kontrak').val();
      $('#role').show();
      var tgl=new Date();
      var hari=tgl.getDate()
      var bulan=tgl.getMonth()+1
      var tahun=tgl.getFullYear()
      var tglSekarang= tahun+''+bulan
      $('#month').val(tglSekarang);
      $('#npk_month').val(jk);
    });

    $(document).on('keyup','#otc1',function(){
      $('#mrc').val('');
      $('#npk_ke').val('');
    });

    $(document).on('keyup','#otc2',function(){
      $('#mrc').val('');
      $('#npk_ke').val('');
    });

    $(document).on('keyup','#otc3',function(){
      $('#mrc').val('');
      $('#npk_ke').val('');
    });

    $(document).on('keyup','#otc4',function(){
      $('#mrc').val('');
      $('#npk_ke').val('');
    });

    $(document).on('click','#tambah_data',function(){
      $('#pesan').html('Silahkan Isi Periode (Bulan) dan Periode (Tahun) Selanjutnya');
      $('#pesannn').html('<pre><strong>Silahkan Isi <i>Usage Periode</i> Jika Ada (<i>Opsional</i>)</strong></pre>');
      $('#termin').html('<pre><strong>Silahkan Pilih dan Isi <i>Termin</i> Jika Ada (<i>Opsional</i>)</strong></pre>');
      $('#otc').html('<pre><strong>Silahkan Pilih dan Isi <i>Otc</i> Jika Ada (<i>Opsional</i>)</strong></pre>');
      $('#npkJk').html('Npk ke- di Bawah akan Otomatis Terisi');
      $('#hide').show();
      var id = $(this).val();
      $.ajax({
        type: 'GET', //THIS NEEDS TO BE GET
        url: 'data-npk-id/'+id,
        dataType: 'json',
        success: function (data) {
          console.log(data);
          $('#mitra_name').val(data.mitra_name);
          $('#pks_number').val(data.pks_number);
          $('#customer_name').val(data.customer_name);
          $('#account_number').val(data.account_number);
          $('#segmen').val(data.segmen);
          $('#manager_name').val(data.manager_name);
          $('#nik').val(data.nik);
          $('#jangka_waktu_kontrak').val(data.npk_month);
          $('#awal_kontrak').val(data.awal_kontrak);
          $('#akhir_kontrak').val(data.akhir_kontrak);
          $('#nilai_kontrak').val(data.nilai_kontrak);
          $('#pr_bln').val(data.periode);
          $('#periode_bulan').val(data.periode_bulan);
          $('#periode_tahun').val(data.periode_tahun);
          $('#curr_type').val(data.curr_type);
          $('#nilai_npk').val(data.nilai_npk);
          $('#tanggal_npk').val(data.tanggal_npk);
          if (!$.trim(data.npk_day)) {
            $('#npk_ke').val(Number(1)); 
          }else {
            $('#npk_ke').val(Number(data.npk_day)+1);
          }
          $('#npk_month').val(data.npk_month);
          // $('#termin').val(data.termin);
          $('#mrc').val(data.mrc);
          $('#otc1').val(0);
          $('#otc2').val(0);
          $('#otc3').val(0);
          $('#otc4').val(0);
          $('#slg').val(data.slg);
          $('#keterangan').val(data.keterangan);

          $('#exampleModalLong').modal('show');
            // console.log(data.mitra_name);

          },error:function(){
           console.log(data);
         }
       });
    });

    $(document).on('click','#edit_data',function(){
      $('#pesann').html('Silahkan Isi Periode (Bulan) dan Periode (Tahun) Jika Ada Kesalahan');
      $('#hide').show();
      var id = $(this).val();
      $.ajax({
        type: 'GET', //THIS NEEDS TO BE GET
        url: 'data-npk-id/'+id,
        dataType: 'json',
        success: function (data) {
          console.log(data);
          $('#mitra_namee').val(data.mitra_name);
          $('#pks_numberr').val(data.pks_number);
          $('#customer_namee').val(data.customer_name);
          $('#account_numberr').val(data.account_number);
          $('#segmenn').val(data.segmen);
          $('#manager_namee').val(data.manager_name);
          $('#nikk').val(data.nik);
          $('#jangka_waktu_kontrakk').val(data.npk_month);
          $('#awal_kontrakk').val(data.awal_kontrak);
          $('#akhir_kontrakk').val(data.akhir_kontrak);
          $('#nilai_kontrakk').val(data.nilai_kontrak);
          $('#pr_blnn').val(data.periode);
          $('#per_bulann').val(data.periode);
          $('#periode_bulann').val(data.periode_bulan);
          $('#periode_tahunn').val(data.periode_tahun);
          $('#curr_typee').val(data.curr_type);
          $('#nilai_npkk').val(data.nilai_npk);
          $('#tanggal_npkk').val(data.tanggal_npk);
          $('#npk_kee').val(data.npk_day);
          $('#npk_monthh').val(data.npk_month);
          $('#terminn_ke').val(data.termin_ke);
          $('#otcc_ke').val(data.otc_ke);
          if (data.otc1 != '0') {
            $('#ot1').prop('checked',true);
            $('#otcc1').val(data.otc1);
            $('#hidee5').show();
            $('#hidee6').hide();
            $('#hidee7').hide();
            $('#hidee8').hide();
          }

          if (data.otc2 != '0') {
            $('#ot2').prop('checked',true);
            $('#otcc2').val(data.otc2);
            $('#hidee5').hide();
            $('#hidee6').show();
            $('#hidee7').hide();
            $('#hidee8').hide();
          }

          if (data.otc3 != '0') {
            $('#ot3').prop('checked',true);
            $('#otcc3').val(data.otc3);
            $('#hidee5').hide();
            $('#hidee6').hide();
            $('#hidee7').show();
            $('#hidee8').hide();
          }

          if (data.otc4 != '0') {
            $('#ot4').prop('checked',true);
            $('#otcc4').val(data.otc4);
            $('#hidee5').hide();
            $('#hidee6').hide();
            $('#hidee7').hide();
            $('#hidee8').show();
          }

          if (data.termin1 != '0') {
            $('#trr1').prop('checked',true);
            $('#terminn1').val(data.termin1);
            $('#hidee1').show();
            $('#hidee2').hide();
            $('#hidee3').hide();
            $('#hidee4').hide();
          }

          if (data.termin2 != '0') {
            $('#trr2').prop('checked',true);
            $('#terminn2').val(data.termin2);
            $('#hidee1').hide();
            $('#hidee2').show();
            $('#hidee3').hide();
            $('#hidee4').hide();
          }

          if (data.termin3 != '0') {
            $('#trr3').prop('checked',true);
            $('#terminn3').val(data.termin3);
            $('#hidee1').hide();
            $('#hidee2').hide();
            $('#hidee3').show();
            $('#hidee4').hide();
          }

          if (data.termin4 != '0') {
            $('#trr4').prop('checked',true);
            $('#terminn4').val(data.termin4);
            $('#hidee1').hide();
            $('#hidee2').hide();
            $('#hidee3').hide();
            $('#hidee4').show();
          }

          $('#mrcc').val(data.mrc);
          $('#otcc').val(data.otc);
          $('#slgg').val(data.slg);
          $('#keterangann').val(data.keterangan);
          $('#idd').val(data.id);
          $('#monthh').val(data.month);

          $('#example').modal('show');
            // console.log(data.mitra_name);

          },error:function(){
           console.log(data);
         }
       });
    });

  });
</script>
<script type="text/javascript">
//   toastr.info("ABCD",
//   toastr.options = {
//   "closeButton": true,
//   "debug": false,
//   "newestOnTop": false,
//   "progressBar": true,
//   "positionClass": "toast-bottom-right",
//   "preventDuplicates": false,
//   "onclick": null,
//   "showDuration": "300",
//   "hideDuration": "1000",
//   "timeOut": "2000",
//   "extendedTimeOut": "1000",
//   "showEasing": "swing",
//   "hideEasing": "linear",
//   "showMethod": "fadeIn",
//   "hideMethod": "fadeOut"
// })

// swal({
//   title: "Are you sure?",
//   text: "Once deleted, you will not be able to recover this imaginary file!",
//   icon: "success",
//   buttons: true,
//   dangerMode: true,
// })
// .then((willDelete) => {
//   if (willDelete) {
//     swal("Poof! Your imaginary file has been deleted!", {
//       icon: "success",
//     });
//   } else {
//     swal("Your imaginary file is safe!");
//   }
// });
</script>

@endsection
