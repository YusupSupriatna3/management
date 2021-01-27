@extends('layouts.app')

@section('dashboard')
Alamat Pengiriman
<small>Upload From Excel</small>
@endsection

@section('breadcrumb')
<li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active"><a href="{{ route('format-alamat') }}"><u title="Klik di sini untuk format upload by excel">Format Excel</u></a></li>
@endsection
<style type="text/css">
  form .error {
  color: #ff0000;
}
</style>
@section('content')
<!-- Form Search Data -->
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary" style="background-color: #265a88;">
      <div class="box-header with-border">
        <h3 class="box-title" style="color: white;">Upload From Excel</h3>
      </div>
      <form action="{{ route('excel-alamat') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="box-body">
          <div class="form-group">
            <input type="file" name="importData" class="form-control">
          </div>
          <div class="form-group">
            <button id="save" type="submit" class="btn btn-primary">Upload</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Form  Search Data -->
@endsection

@section('scripts')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
<!-- <script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script> -->
<!-- <script type="text/javascript">
$(function() {
  $("form[name='form-search']").validate({
    rules: {
      no_akun: "required"
    },
    messages: {
      no_akun: "Please enter your account"
    },
    submitHandler: function(form) {
      form.submit();
    }
  });
});

</script> -->
<script type="text/javascript">
function formatRupiah(angka, prefix){
  var number_string = angka.replace(/[^,\d]/g, '').toString(),
  split       = number_string.split(','),
  sisa        = split[0].length % 3,
  rupiah        = split[0].substr(0, sisa),
  ribuan        = split[0].substr(sisa).match(/\d{3}/gi);
 
  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if(ribuan){
    separator = sisa ? '.' : '';
    rupiah += separator + ribuan.join('.');
  }
 
  rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
  return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}

nk.addEventListener('keyup',function(e){
  nk.value = formatRupiah(this.value, 'Rp. ');
nilai_kontrak.value = nk.value.replace(/[^,\d]/g, '').toString();
console.log(nilai_kontrak.value)
})

// FORM TAMBAH
otccc1.addEventListener('keyup',function(e){
  otccc1.value = formatRupiah(this.value, 'Rp. ');
  otc1.value = otccc1.value.replace(/[^,\d]/g, '').toString();
  $('#otc_ke').val('1');
})

otccc2.addEventListener('keyup',function(e){
  otccc2.value = formatRupiah(this.value, 'Rp. ');
  otc2.value = otccc2.value.replace(/[^,\d]/g, '').toString();
  $('#otc_ke').val('2');
})

otccc3.addEventListener('keyup',function(e){
  otccc3.value = formatRupiah(this.value, 'Rp. ');
  otc3.value = otccc3.value.replace(/[^,\d]/g, '').toString();
  $('#otc_ke').val('3');
})

otccc4.addEventListener('keyup',function(e){
  otccc4.value = formatRupiah(this.value, 'Rp. ');
  otc4.value = otccc4.value.replace(/[^,\d]/g, '').toString();
  $('#otc_ke').val('4');
})

terminnn1.addEventListener('keyup',function(e){
  terminnn1.value = formatRupiah(this.value, 'Rp. ');
  termin1.value = terminnn1.value.replace(/[^,\d]/g, '').toString();
  $('#termin_ke').val('1');
})

terminnn2.addEventListener('keyup',function(e){
  terminnn2.value = formatRupiah(this.value, 'Rp. ');
  termin2.value = terminnn2.value.replace(/[^,\d]/g, '').toString();
  $('#termin_ke').val('2');
})

terminnn3.addEventListener('keyup',function(e){
  terminnn3.value = formatRupiah(this.value, 'Rp. ');
  termin3.value = terminnn3.value.replace(/[^,\d]/g, '').toString();
  $('#termin_ke').val('3');
})

terminnn4.addEventListener('keyup',function(e){
  terminnn4.value = formatRupiah(this.value, 'Rp. ');
  termin4.value = terminnn4.value.replace(/[^,\d]/g, '').toString();
  $('#termin_ke').val('4');
})

mrccc.addEventListener('keyup',function(e){
  mrccc.value = formatRupiah(this.value, 'Rp. ');
  mrc.value = mrccc.value.replace(/[^,\d]/g, '').toString();
})

n_npk.addEventListener('keyup',function(e){
  n_npk.value = formatRupiah(this.value, 'Rp. ');
  nilai_npk.value = n_npk.value.replace(/[^,\d]/g, '').toString();
})

slggg.addEventListener('keyup',function(e){
  slggg.value = formatRupiah(this.value, 'Rp. ');
  slg.value = slggg.value.replace(/[^,\d]/g, '').toString();
})

hrg_unit.addEventListener('keyup',function(e){
  hrg_unit.value = formatRupiah(this.value, 'Rp. ');
  hargaunit.value = hrg_unit.value.replace(/[^,\d]/g, '').toString();
})

//END

//Edit
nkk.addEventListener('keyup',function(e){
  nkk.value = formatRupiah(this.value, 'Rp. ');
nilai_kontrakk.value = nkk.value.replace(/[^,\d]/g, '').toString();
})

otccccc1.addEventListener('keyup',function(e){
  otccccc1.value = formatRupiah(this.value, 'Rp. ');
otcc1.value = otccccc1.value.replace(/[^,\d]/g, '').toString();
})

otccccc2.addEventListener('keyup',function(e){
  otccccc2.value = formatRupiah(this.value, 'Rp. ');
otcc2.value = otccccc2.value.replace(/[^,\d]/g, '').toString();
})

otccccc3.addEventListener('keyup',function(e){
  otccccc3.value = formatRupiah(this.value, 'Rp. ');
otcc3.value = otccccc3.value.replace(/[^,\d]/g, '').toString();
})

otccccc4.addEventListener('keyup',function(e){
  otccccc4.value = formatRupiah(this.value, 'Rp. ');
otcc4.value = otccccc4.value.replace(/[^,\d]/g, '').toString();
})

terminnnnn1.addEventListener('keyup',function(e){
  terminnnnn1.value = formatRupiah(this.value, 'Rp. ');
terminn1.value = terminnnnn1.value.replace(/[^,\d]/g, '').toString();
})

terminnnnn2.addEventListener('keyup',function(e){
  terminnnnn2.value = formatRupiah(this.value, 'Rp. ');
terminn2.value = terminnnnn2.value.replace(/[^,\d]/g, '').toString();
})

terminnnnn3.addEventListener('keyup',function(e){
  terminnnnn3.value = formatRupiah(this.value, 'Rp. ');
terminn3.value = terminnnnn3.value.replace(/[^,\d]/g, '').toString();
})

terminnnnn4.addEventListener('keyup',function(e){
  terminnnnn4.value = formatRupiah(this.value, 'Rp. ');
terminn4.value = terminnnnn4.value.replace(/[^,\d]/g, '').toString();
})

mrccccc.addEventListener('keyup',function(e){
  mrccccc.value = formatRupiah(this.value, 'Rp. ');
mrcc.value = mrccccc.value.replace(/[^,\d]/g, '').toString();
console.log(mrccccc.value);
})

nilai_npkkkkk.addEventListener('keyup',function(e){
  nilai_npkkkkk.value = formatRupiah(this.value, 'Rp. ');
nilai_npkk.value = nilai_npkkkkk.value.replace(/[^,\d]/g, '').toString();
})

</script>
<script type="text/javascript">
    $(document).ready(function() {
      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });
    });
</script>
<script type="text/javascript">
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
  $('.OTC').hide();
  $('.TERMIN').hide();
  $('.MRC').hide();
  $('#hiderange').hide();
  $('#download_npk').modal('hide');
  $('#download_option').modal('hide');
  $('#download_pernyataan').modal('hide');
  $('#modalUpload').modal('hide');

  $(document).on('click','#upload',function(){
    $('#modalUpload').modal('show');
  })

  $(document).on('click','#surat_pernyataan',function(){
    $('#savepernyataan').attr('disabled', true);
    $('#hiderange').hide();
    $('#download_pernyataan').modal('show');
    $('#request').val('');
    $('#spin').html('');
    $('#acc_num').val('');
    $('#akhir_kontrak').val('');
    $('#awal_kontrak').val('');
  });
  $(document).on('click','#close',function(){
    $('#savepernyataan').attr('disabled', true);
    $('#hiderange').hide();
    $('#acc_num').val('');
    $('#akhir_kontrak').val('');
    $('#awal_kontrak').val('');
    $('#spin').html('');
  });
  $(document).on('keyup','#request',function(){
    var key = $(this).val();
    var _token = $('input[name="_token"]').val();
    $('#spin').attr('style','color:black');
    $('#spin').html('<i class="fa fa-spinner fa-spin"></i> Search');
    $.ajax({
        type: 'POST',
        url: "{{ route('data-surat-pembayaran') }}",
        data:{key:key, _token:_token},
        success: function (data)
        {
          if (data.jml!==0) {
            $('#spin').attr('style','color:green');
            $('#spin').html('Data Di Temukan');
            $('#acc_num').val(data.result[0].accountnas);
            $('#savepernyataan').attr('disabled', false);
            $('#hiderange').show();
          }else {
            $('#spin').attr('style','color:red');
            $('#spin').html('Data Tidak Di Temukan !!!');
            $('#hiderange').hide();
            $('#acc_num').val('');
            $('#savepernyataan').attr('disabled', true);
          }
          },error:function(){
         }
       });
  });

  $(document).on('click','#print_data',function(){
    var id = $(this).val();
    $('#rincian').val(id);
    $('#pernyataan').val(id);
    $('#download_option').modal('show');
  });

  $(document).on('click','#rincian',function(){
    var id = $(this).val();
      $.ajax({
        type: 'GET',
        url: 'data-npk-id/'+id,
        dataType: 'json',
        success: function (data) {
          $('#id').val(data.id);
          $('#idd1').val(data.id);
          $('#iddd').val(data.id);
          if (data.otc_ke!=='0') {
            $('#otc_dw').val("OTC");
            if (data.otc1!=='0') {
              $('#otc_download').val(data.otc1);
            }else if(data.otc2!=='0') {
              $('#otc_download').val(data.otc2);
            }else if(data.otc3!=='0') {
              $('#otc_download').val(data.otc3);
            }else{
              $('#otc_download').val(data.otc4);
            }
            $('.OTC').show();
            $('.TERMIN').hide();
            $('.MRC').hide();
          }
          if (data.termin_ke!=='0') {
            $('#termin_dw').val("TERMIN");
            if (data.termin1!=='0') {
              $('#termin_download').val(data.termin1);
            }else if(data.termin2!=='0') {
              $('#termin_download').val(data.termin2);
            }else if(data.termin3!=='0') {
              $('#termin_download').val(data.termin3);
            }else{
              $('#termin_download').val(data.termin4);
            }
            $('.TERMIN').show();
            $('.OTC').hide();
          }
          if (data.mrc!=='0') {
            $('#mrc_dw').val("MRC");
            $('#mrc_download').val(data.mrc);
            $('.MRC').show();
            $('.OTC').hide();
          }
          },error:function(){
         }
       });
    $('#download_option').modal('hide');
    $('#download_npk').modal('show');
  });

  $(document).on('click','#print_data',function(){
    var id = $(this).val();
    $('#rincian').val(id);
    $('#pernyataan').val(id);
    $('#download_option').modal('show');
  });
  
  // var otc1,otc2,otc3,otc4;
  // $('#otc1').keyup(function(){
  //   otc1 = $(this).val();
  //   $('#otc_ke').val('1');
  // });
  // $('#otc2').keyup(function(){
  //   otc2 = $(this).val();
  //   $('#otc_ke').val('2');
  // });
  // $('#otc3').keyup(function(){
  //   otc3 = $(this).val();
  //   $('#otc_ke').val('3');
  // });
  // $('#otc4').keyup(function(){
  //   otc3 = $(this).val();
  //   $('#otc_ke').val('4');
  // });

  // var termin1,termin2,termin3,termin4;
  // $('#termin1').keyup(function(){
  //   termin1 = $(this).val();
  //   $('#termin_ke').val('1');
  // });
  // $('#termin2').keyup(function(){
  //   termin2 = $(this).val();
  //   $('#termin_ke').val('2');
  // });
  // $('#termin3').keyup(function(){
  //   termin3 = $(this).val();
  //   $('#termin_ke').val('3');
  // });
  // $('#termin3').keyup(function(){
  //   termin3 = $(this).val();
  //   $('#termin_ke').val('4');
  // });
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
      $('#hargalokasi').val('');
      $('#jmlhari').val('');
      $('#jmlbln').val('');
      $('#exampleModalLong').modal('show');
    });
    $('#save').click(function() {
      var jk = $('#jangka_waktu_kontrak').val();
      $('#role').show();
      var tgl=new Date();
      var hari=tgl.getDate()
      var bulan=tgl.getMonth()+1
      var bl = bulan.toString()
      var tahun=tgl.getFullYear()
      var tglSekarang= bl.length;
      if (tglSekarang>1) {
        $('#month').val(bulan);
      }else {
        $('#month').val(tahun+'0'+bulan);
      }
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
          $('#nk').val(formatRupiah(data.nilai_kontrak, 'Rp. '));
          $('#nilai_kontrak').val(data.nilai_kontrak);
          $('#pr_bln').val(data.periode);
          $('#prr_bln').val(data.periode);
          $('#periode_bulan').val(data.periode_bulan);
          $('#periode_tahun').val(data.periode_tahun);
          $('#curr_type').val(data.curr_type);
          $('#n_npk').val(formatRupiah(data.nilai_npk, 'Rp. '));
          $('#nilai_npk').val(data.nilai_npk);
          $('#tanggal_npk').val(data.tanggal_npk);
          if (!$.trim(data.npk_day)) {
            $('#npk_ke').val(Number(1)); 
          }else {
            $('#npk_ke').val(Number(data.npk_day)+1);
          }
          $('#npk_month').val(data.npk_month);
          // $('#termin').val(data.termin);
          $('#mrccc').val(formatRupiah(data.mrc, 'Rp. '));
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
      console.log(id)
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
          $('#nkk').val(formatRupiah(data.nilai_kontrak, 'Rp. '));
          $('#nilai_kontrakk').val(data.nilai_kontrak);
          $('#pr_blnn').val(data.periode);
          $('#per_bulann').val(data.periode);
          $('#periode_bulann').val(data.periode_bulan);
          $('#periode_tahunn').val(data.periode_tahun);
          if (!$.trim(data.usagee)) {
            $('#usage').val('');
            $('#usagee').val(''); 
          }else {
            $('#usage').val(data.usagee);
            $('#usagee').val(data.usagee);
          }
          $('#curr_typee').val(data.curr_type);
          $('#nilai_npkkkkk').val(formatRupiah(data.nilai_npk, 'Rp. '));
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
          $('#mrccccc').val(formatRupiah(data.mrc, 'Rp. '));
          $('#mrcc').val(data.mrc);
          $('#otcc').val(data.otc);
          $('#slgg').val(data.slg);
          $('#keterangann').val(data.keterangan);
          $('#idd').val(data.id);
          $('#monthh').val(data.month);
          $('#hargalokasii').val(data.qty);
          $('#jmlharii').val(data.jumlah_hari);
          $('#jmlblnn').val(data.jumlah_bulan);
          $('#example').modal('show');
            // console.log(data.mitra_name);

          },error:function(){
           console.log(data);
         }
       });
    });

  });
</script>
@endsection
