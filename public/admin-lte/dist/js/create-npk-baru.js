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

terminnn5.addEventListener('keyup',function(e){
  terminnn5.value = formatRupiah(this.value, 'Rp. ');
  termin5.value = terminnn5.value.replace(/[^,\d]/g, '').toString();
  $('#termin_ke').val('5');
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


  $(document).ready(function() {
    $(".add-more").click(function(){ 
      var html = $(".copy").html();
      $(".after-add-more").after(html);
    });
    $("body").on("click",".remove",function(){ 
      $(this).parents(".control-group").remove();
    });
  });
  $(document)
  $('#pesan').html('<pre><strong>Silahkan Isi Periode (Bulan)</strong></pre>');
  $('#pesannn').html('<pre><strong>Silahkan Isi <i>Periode (Usage)</i> Jika Ada (<i>Opsional</i>)</strong></pre>');
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
  $('#nk').val('');
  $('#periode_bulan').val('');
  $('#periode_bulann_usage').val('');
  $('#curr_type').val('');
  $('#nilai_npk').val('');
  $('#n_npk').val('');
  $('#tanggal_npk').val('');
  $('#npk_ke').val('');
  $('#npk_month').val('');
  $('#mrc').val('');
  $('#otc').val('');
  $('#otccc1').val('');
  $('#otccc2').val('');
  $('#otccc3').val('');
  $('#otccc4').val('');
  $('#terminnn1').val('');
  $('#terminnn2').val('');
  $('#terminnn3').val('');
  $('#terminnn4').val('');
  $('#terminnn5').val('');
  $('#mrccc').val('');
  $('#slg').val('');
  $('#keterangan').val('');
  $('#hargalokasi').val('');
  $('#jmlhari').val('');
  $('#jmlbln').val('');

  $('#hide1').hide();
  $('#hide2').hide();
  $('#hide3').hide();
  $('#hide4').hide();
  $('#hide5').hide();
  $('#hide6').hide();
  $('#hide7').hide();
  $('#hide8').hide();
  $('#hide9').hide();

  $('#hidee1').hide();
  $('#hidee2').hide();
  $('#hidee3').hide();
  $('#hidee4').hide();
  $('#hidee5').hide();
  $('#hidee6').hide();
  $('#hidee7').hide();
  $('#hidee8').hide();
  $('#hidee9').hide();
  $('.OTC').hide();
  $('.TERMIN').hide();
  $('.MRC').hide();
  
  $("input[name='termin']").change(function(){
    if( $(this).is(":checked") ){
      var val = $(this).val();
      if (val=='tr1') {
        $('#hide1').show();
        $('#hide2').hide();
        $('#hide3').hide();
        $('#hide4').hide();
        $('#hide9').hide();
      }
      if (val=='tr2') {
        $('#hide1').hide();
        $('#hide2').show();
        $('#hide3').hide();
        $('#hide4').hide();
        $('#hide9').hide();
      }
      if (val=='tr3') {
        $('#hide1').hide();
        $('#hide2').hide();
        $('#hide3').show();
        $('#hide4').hide();
        $('#hide9').hide();
      }
      if (val=='tr4') {
        $('#hide1').hide();
        $('#hide2').hide();
        $('#hide3').hide();
        $('#hide4').show();
        $('#hide9').hide();
      }
      if (val=='tr5') {
        $('#hide1').hide();
        $('#hide2').hide();
        $('#hide3').hide();
        $('#hide4').hide();
        $('#hide9').show();
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
        $('#hidee9').hide();
      }
      if (val=='trr2') {
        $('#hidee1').hide();
        $('#hidee2').show();
        $('#hidee3').hide();
        $('#hidee4').hide();
        $('#hidee9').hide();
      }
      if (val=='trr3') {
        $('#hidee1').hide();
        $('#hidee2').hide();
        $('#hidee3').show();
        $('#hidee4').hide();
        $('#hidee9').hide();
      }
      if (val=='trr4') {
        $('#hidee1').hide();
        $('#hidee2').hide();
        $('#hidee3').hide();
        $('#hidee4').show();
        $('#hidee9').hide();
      }
      if (val=='trr5') {
        $('#hidee1').hide();
        $('#hidee2').hide();
        $('#hidee3').hide();
        $('#hidee4').hide();
        $('#hidee9').show();
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


  $('.input-daterangee').datepicker({
    todayBtn:'linked',
    format:'yyyy-mm-dd',
    autoclose:true
  });

  $('.input-daterangeee').datepicker({
    todayBtn:'linked',
    format:'yyyy-mm-dd',
    autoclose:true
  });

  $('.input-date').datepicker({
    startView:'months',
    minViewMode:'months',
    language:'id',
    todayBtn:'linked',
    format:'MM yyyy',
    autoclose:true
  });

  function jangka_waktu(){
    $('#npk_month').val($('#jangka_waktu_kontrak').val());
  }
  $(document).ready( function () {
    $('select').selectize({
    // sortField: 'text'
  });

    $('#save').click(function() {
      var jk = $('#jangka_waktu_kontrak').val();
      // $('#role').show();
      var tgl=new Date();
      var hari=tgl.getDate()
      var bulan=tgl.getMonth()+1
      var bl = bulan.toString()
      var tahun=tgl.getFullYear()
      var tglSekarang= bl.length;
      if (tglSekarang>1) {
        $('#month').val(tahun+''+bulan);
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
  });

  $('#segmen').on('change', function() {
    if(this.value == 'A'){
      $("#nik").val("770085");
      $("#manager_name").val("IRMA SILVIA ADYATINI");
    }else if(this.value == 'B'){
      $("#nik").val("740239");
      $("#manager_name").val("MHM. THOHIRUN");
    }else{
      $("#nik").val("720049");
      $("#manager_name").val("GAMYA RIZKI");
    }
  });