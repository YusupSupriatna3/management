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

  $(document).ready( function () {
    $('select').selectize({
    // sortField: 'text'
  })
  })

  nk.addEventListener('keyup',function(e){
    nk.value = formatRupiah(this.value, 'Rp. ');
  nilai_npk.value = nk.value.replace(/[^,\d]/g, '').toString();
  console.log(nilai_npk.value)
  })

  nkk.addEventListener('keyup',function(e){
    nkk.value = formatRupiah(this.value, 'Rp. ');
  nilai_npkk.value = nkk.value.replace(/[^,\d]/g, '').toString();
  console.log(nilai_npkk.value)
  })

  $('.input-date').datepicker({
    startView:'months',
    minViewMode:'months',
    language:'id',
    todayBtn:'linked',
    format:'MM yyyy',
    autoclose:true
  });

  $(document).on('click','#tambah_data_mkt',function(){
    var id = $(this).val();
    $.ajax({
      type: 'GET', //THIS NEEDS TO BE GET
      url: 'data-npk-mkt-id/'+id,
      dataType: 'json',
      success: function (data) {
        console.log(data);
        $('#id').val(data.id);
        $('#month').val(data.month);
        $('#mitra_name').val(data.mitra_name);
        $('#pks_number').val(data.pks_number);
        $('#periode_bulan').val(data.periode);
        $('#nk').val(formatRupiah(data.nilai_npk, 'Rp. '));
        $('#nilai_npk').val(data.nilai_npk);
        $('#keterangan').val(data.keterangan);
        $('#exampleModalLong').modal('show');
        },error:function(){
         console.log(data);
       }
     });
  });

  $(document).on('click','#edit_data_mkt',function(){
    var id = $(this).val();
    console.log(id)
    $.ajax({
      type: 'GET', //THIS NEEDS TO BE GET
      url: 'data-npk-mkt-id/'+id,
      dataType: 'json',
      success: function (data) {
        console.log(data);
        $('#id').val(data.id);
        $('#monthh').val(data.month);
        $('#mitra_namee').val(data.mitra_name);
        $('#pks_numberr').val(data.pks_number);
        $('#periode_bulann').val(data.periode);
        $('#nkk').val(formatRupiah(data.nilai_npk, 'Rp. '));
        $('#nilai_npkk').val(data.nilai_npk);
        $('#keterangann').val(data.keterangan);
        $('#example').modal('show');
        },error:function(){
         console.log(data);
       }
     });
  });