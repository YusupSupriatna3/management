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
  nilai_npk.value = nk.value.replace(/[^,\d]/g, '').toString();
  console.log(nilai_npk.value)
})
  $('.input-date').datepicker({
    startView:'months',
    minViewMode:'months',
    language:'id',
    todayBtn:'linked',
    format:'MM yyyy',
    autoclose:true
  });

  $('#save').click(function() {
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
  });