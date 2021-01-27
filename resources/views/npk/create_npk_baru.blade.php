@extends('layouts.app')

@section('dashboard')
Create NPK
<small>Create NPK Baru</small>
@endsection

@section('breadcrumb')
<li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Create Npk Baru</li>
@endsection
<style type="text/css">
  form .error {
    color: #ff0000;
  }
</style>
@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border" style="text-align: center;">
        <h3 class="box-title">Create NPK Baru</h3>
      </div>
      <form id="tambah-kl" action="{{ route('tambah-kl') }}" method="POST" class="npk">
        {{ csrf_field() }}
        <div class="box-body">
          <div class="form-group">
            <label for="mitra_name">Mitra Name (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
            <input id="mitra_name" type="text" name="mitra_name" class="form-control">
          </div>
          <div class="form-group">
            <label for="pks_number">Pks Number (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
            <input id="pks_number" type="text" name="pks_number" class="form-control">
          </div>
          <div class="form-group" id="pksList"></div>
          <div class="form-group">
            <label for="customer_name">Customer Name (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
            <input id="customer_name" type="text" name="customer_name" class="form-control">
          </div>
          <div class="form-group">
            <label for="account_number">Account Number (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
            <input id="account_number" type="text" name="account_number" class="form-control">
            <div id="accountList"></div>
          </div>
          <div class="form-group">
            <label for="segmen">Segmen (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
            <!-- <input id="segmen" type="text" name="segmen" class="form-control"> -->
            <select id="segmen" name="segmen" class="form-control select2" placeholder="SEGMEN">
                  <option value="">SEGMEN</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
            </select>
          </div>
          <div class="form-group">
            <label for="manager_name">Manager Name (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
            <input id="manager_name" type="text" name="manager_name" class="form-control">
          </div>
          <div class="form-group">
            <label for="nik">Nik (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
            <input id="nik" type="text" name="nik" class="form-control">
          </div>
          <div class="form-group">
            <label for="jangka_waktu_kontrak">Jangka Waktu Kontrak (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
            <input id="jangka_waktu_kontrak" onkeyup="jangka_waktu()" type="text" name="jangka_waktu_kontrak" class="form-control">
          </div>
          <div class="form-group">
            <label for="nilai_kontrak">Nilai Kontrak (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
            <input id="nk" type="text" class="form-control">
            <input id="nilai_kontrak" type="hidden" name="nilai_kontrak" class="form-control">
          </div>
          <div class="row">
            <div class="col-md-5">
              <label for="awal_kontrak">Awal Kontrak (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="awal_kontrak" type="text" name="awal_kontrak" class="form-control input-daterangee"/>
            </div>
            <div class="col-md-5">
              <label for="akhir_kontrak">Akhir Kontrak (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="akhir_kontrak" type="text" name="akhir_kontrak" class="form-control input-daterangeee"/>
            </div>
          </div><br>
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-5">
                      <div class="box-header with-border">
                        <h3 class="box-title"><span id="pesan"></span></h3>
                      </div>
                      <div class="form-group">
                        <label for="periode_bulan">Periode (Bulan) (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
                        <input id="periode_bulan" type="text" name="periode_bulan" class="form-control input-date">
                      </div>
                    </div>
                    <div class="col-md-5">
                      <div class="box-header with-border">
                        <h3 class="box-title"><span id="pesannn"></span></h3>
                      </div>
                      <div class="form-group">
                        <label for="periode_bulan_usage">Periode (Bulan Usage)</label>
                        <input id="periode_bulan_usage" type="text" name="periode_bulan_usage" class="form-control input-date">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><span id="otc"></span></h3>
                </div>
                <div class="box-body" style="margin-right:100px;">
                  <div class="row">
                    <div class="col-md-10">
                      <input type="radio" name="otc" value="tr1"> <span><strong>Otc 1</strong></span>
                      &nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="otc" value="tr2"> <span><strong>Otc 2</strong></span>
                      &nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="otc" value="tr3"> <span><strong>Otc 3</strong></span>
                      &nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="otc" value="tr4"> <span><strong>Otc 4</strong></span>
                    </div>
                  </div><br>
                  <div class="row">
                    <div class="col-md-5" id="hide5">
                      <label>Otc Ke-1</label>
                      <input id="otccc1" type="text" class="form-control">
                      <input id="otc1" type="hidden" name="otc1" class="form-control">
                    </div>
                    <div class="col-md-5" id="hide6">
                      <label>Otc Ke-2</label>
                      <input id="otccc2" type="text" class="form-control">
                      <input id="otc2" type="hidden" name="otc2" class="form-control">
                    </div>
                    <div class="col-md-5" id="hide7">
                      <label>Otc Ke-3</label>
                      <input id="otccc3" type="text" class="form-control">
                      <input id="otc3" type="hidden" name="otc3" class="form-control">
                    </div>
                    <div class="col-md-5" id="hide8">
                      <label>Otc Ke-4</label>
                      <input id="otccc4" type="text" class="form-control">
                      <input id="otc4" type="hidden" name="otc4" class="form-control">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><span id="termin"></span></h3>
                </div>
                <div class="box-body" style="margin-right:100px;">
                  <div class="row">
                    <div class="col-md-10">
                      <input type="radio" name="termin" value="tr1"> <span><strong>Termin 1</strong></span>
                      &nbsp&nbsp&nbsp<input type="radio" name="termin" value="tr2"> <span><strong>Termin 2</strong></span>
                      &nbsp&nbsp&nbsp<input type="radio" name="termin" value="tr3"> <span><strong>Termin 3</strong></span>
                      &nbsp&nbsp&nbsp<input type="radio" name="termin" value="tr4"> <span><strong>Termin 4</strong></span>
                      &nbsp&nbsp&nbsp<input type="radio" name="termin" value="tr5"> <span><strong>Termin 5</strong></span>
                    </div>
                  </div><br>
                  <div class="row">
                    <div class="col-md-5" id="hide1">
                      <label>Termin Ke-1</label>
                      <input id="terminnn1" type="text" class="form-control">
                      <input id="termin1" type="hidden" name="termin1" class="form-control">
                    </div>
                    <div class="col-md-5" id="hide2">
                      <label>Termin Ke-2</label>
                      <input id="terminnn2" type="text" class="form-control">
                      <input id="termin2" type="hidden" name="termin2" class="form-control">
                    </div>
                    <div class="col-md-5" id="hide3">
                      <label>Termin Ke-3</label>
                      <input id="terminnn3" type="text" class="form-control">
                      <input id="termin3" type="hidden" name="termin3" class="form-control">
                    </div>
                    <div class="col-md-5" id="hide4">
                      <label>Termin Ke-4</label>
                      <input id="terminnn4" type="text" class="form-control">
                      <input id="termin4" type="hidden" name="termin4" class="form-control">
                    </div>
                    <div class="col-md-5" id="hide9">
                      <label>Termin Ke-5</label>
                      <input id="terminnn5" type="text" class="form-control">
                      <input id="termin5" type="hidden" name="termin5" class="form-control">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="mrc">Mrc</label>
            <input id="mrccc" type="text" class="form-control">
            <input id="mrc" type="hidden" name="mrc" class="form-control">
          </div>
          <div class="form-group">
            <label for="curr_type">Currency Type (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
            <input id="curr_type" type="text" name="curr_type" class="form-control">
          </div>
          <div class="form-group">
            <label for="nilai_npk">Nilai Npk (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
            <input id="n_npk" type="text" class="form-control">
            <input id="nilai_npk" type="hidden" name="nilai_npk" class="form-control">
          </div>
          <div class="form-group">
            <label for="tanggal_npk">Tanggal Npk (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
            <input id="tanggal_npk" type="text" name="tanggal_npk" class="form-control input-daterangee">
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><span id="npkJk"></span></h3>
                </div>
                <div class="box-body" style="margin-right:100px;">
                  <div class="row">
                    <div class="col-md-5">
                      <label for="npk_ke">Npk-ke (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
                      <input id="npk_ke" type="text" name="npk_day" class="form-control">
                    </div>
                    <div class="col-md-5">
                      <label for="npk_month">Dari Jangka Waktu (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
                      <input id="npk_month" type="text" name="npk_month" class="form-control">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <input id="keterangan" type="text" name="keterangan" class="form-control">
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><span>Faktor Pengurang Mrc <i>(Silahkan Isi Jika Ada Faktor Pengurang Mrc)</i></span></h3>
                </div>
                <div class="box-body" style="margin-right:100px;">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="slg">Penalty Slg</label>
                        <input id="slggg" type="text" class="form-control" placeholder="Penalty Slg">
                        <input id="slg" type="hidden" name="slg" class="form-control" placeholder="Penalty Slg">
                      </div>
                    </div>
                    <div class="after-add-more">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Total Harga/Bulan</label>
                          <!-- <input id="addmoree0" type="text" class="form-control" placeholder="Total Harga/Bulan"> -->
                          <input id="addmore0" type="text" name="addmore0[]" class="form-control" placeholder="Total Harga/Bulan">    
                        </div>
                        <div class="form-group">
                          <label>Quantity</label>
                          <input type="text" name="addmore[]" class="form-control" placeholder="Quantity">    
                        </div>
                        <div class="form-group">
                          <label>Harga/Unit</label>
                          <!-- <input id="addmoree1" type="text" class="form-control" placeholder="Harga/Unit"> -->
                          <input id="addmore1" type="text" name="addmore1[]" class="form-control" placeholder="Harga/Unit">
                        </div>
                        <div class="form-group">
                          <label>Jumlah Hari Tidak Aktif</label>
                          <input type="text" name="addmore2[]" class="form-control" placeholder="Jumlah Hari Tidak Aktif">    
                        </div>
                        <div class="form-group">
                          <label>Jumlah Hari dalam 1 Bulan</label>
                          <input type="text" name="addmore3[]" class="form-control" placeholder="Jumlah Hari dalam 1 Bulan">
                        </div>
                        <div class="form-group"> 
                          <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
                        </div>
                      </div>
                    </div>
                    <div class="copy hide">
                      <div class="control-group">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Total Harga/Bulan</label>
                            <!-- <input id="addmoree0" type="text" class="form-control" placeholder="Total Harga/Bulan"> -->
                            <input id="addmore0" type="text" name="addmore0[]" class="form-control" placeholder="Total Harga/Bulan">    
                          </div>
                          <div class="form-group">
                            <label>Quantity</label>
                            <input type="text" name="addmore[]" class="form-control" placeholder="Quantity">    
                          </div>
                          <div class="form-group">
                            <label>Harga/Unit</label>
                            <!-- <input id="addmoree1" type="text" class="form-control" placeholder="Harga/Unit"> -->
                            <input id="addmore1" type="text" name="addmore1[]" class="form-control" placeholder="Harga/Unit">
                          </div>
                          <div class="form-group">
                            <label>Jumlah Hari Tidak Aktif</label>
                            <input type="text" name="addmore2[]" class="form-control" placeholder="Jumlah Hari Tidak Aktif">    
                          </div>
                          <div class="form-group">
                            <label>Jumlah Hari dalam 1 Bulan</label>
                            <input type="text" name="addmore3[]" class="form-control" placeholder="Jumlah Hari dalam 1 Bulan">
                          </div>
                          <div class="form-group"> 
                            <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Del</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Faktor Pengurang Otc <i>(Silahkan Isi Jika Ada Faktor Pengurang Otc)</i></h3>
                </div>
                <div class="box-body" style="margin-right:100px;">
                  <div class="row">
                    <div class="col-md-6">
                      <label>Harga/Unit</label>
                      <input id="hrg_unit" type="text" placeholder="Harga/Unit" class="form-control">
                      <input id="hargaunit" type="hidden" name="hargaunit" placeholder="Harga/Unit" class="form-control">
                    </div>
                    <div class="col-md-6">
                      <label>Jumlah Tidak Aktif</label>
                      <input type="text" name="jmlnon" placeholder="Jumlah Tidak Aktif" class="form-control">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <input type="hidden" name="month" id="month">
        <input type="hidden" name="termin_ke" id="termin_ke">
        <input type="hidden" name="otc_ke" id="otc_ke">
        <div class="box-body">
          <button id="save" type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Form  Create NPK Baru -->

@endsection

@section('scriptss')
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
  <script type="text/javascript" src="{{ asset('/admin-lte/dist/js/bootstrap-datepicker-id.js') }}"></script>
  <script type="text/javascript" src="{{ asset('/admin-lte/dist/js/create-npk-baru.js') }}"></script>

<!-- <script type="text/javascript">
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
</script> -->
@endsection
