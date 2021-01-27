@extends('layouts.app')

@section('dashboard')
Create NPK
<small>Create Npk Lanjutan</small>
@endsection

@section('breadcrumb')
<li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Create Npk Lanjutan</li>
@endsection
<style type="text/css">
  form .error {
  color: #ff0000;
}
  /*th {
  color: #FFFFFF;   
  }
  td {
    color: #FFFFFF;
  }*/
</style>
@section('content')
<!-- Form Search Data -->
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary" style="background-color: #265a88;">
      <div class="box-header with-border">
        <h3 class="box-title" style="color: white;">Search NPK</h3>
      </div>
      <form id="form-search" name="form-search" action="{{ route('search-data') }}" method="GET" class="form-horizontal">
        {{ csrf_field() }}
        <div class="box-body" style="text-align: center;">
          <div class="col-sm-12">
            <div class="row">
              <div class="form-group">
                <label class="col-md-4 control-label" style="color: white;">NO AKUN</label>
                <div class="col-md-6">
                  <select class="form-control select2" name="no_akun" id="no_akun">
                    <option value="">=====>Pilih No Akun<=====</option>
                    @foreach($account as $dat)
                    <option value="{{ $dat->account_number }}">{{ $dat->account_number }}</option>
                    @endforeach
                  </select>
                </div>
                <label class="error" for="no_akun"></label>
              </div>
              <div class="form-group">
                <label class="col-md-4 control-label" style="color: white;">PERIODE</label>
                <div class="col-md-6">
                  <select id="periode" name="periode" class="form-control select2">
                    <option value="">=====>Pilih Periode<=====</option>
                    @foreach($periode as $per)
                      <option value="{{ $per->periode }}">{{ $per->periode }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-4 control-label" style="color: white;">NO KL</label>
                <div class="col-md-6">
                  <select id="no_kl" name="no_kl" class="form-control select2">
                    <option value="">=====>Pilih No Kl<=====</option>
                    @foreach($pks as $nopks)
                      <option value="{{ $nopks->pks_number }}">{{ $nopks->pks_number }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-4 control-label">&nbsp;</label>
                <div class="col-md-4">
                  <button type="submit" id="cari_pks" class="btn btn-primary btn-sm btn-block"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Form  Search Data -->
<!-- View Table NPK -->
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary" style="background-color: #265a88;">
      <div class="box-header with-border">
      </div>
      <div style="overflow-x:auto;">
        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
          <div class="row">
            <div class="col-sm-12">
              <table style="color: #FFFFFF;" id="ttable_id" class="table table-responsive">
                <thead>
                  <tr>
                    <th nowrap>No</th>
                    <th nowrap>Opsi</th>
                    <th nowrap>Month</th>
                    <th nowrap>Nama Mitra</th>
                    <th nowrap>No Pks</th>
                    <th nowrap>Customer Name</th>
                    <th nowrap>No Account</th>
                    <th nowrap>Segmen</th>
                    <th nowrap>Nama Manajer</th>
                    <th nowrap>Nik</th>
                    <th nowrap>Jangka Waktu Kontrak</th>
                    <th nowrap>Awal Kontrak</th>
                    <th nowrap>Akhir Kontrak</th>
                    <th nowrap>Nilai Kontrak</th>
                    <th nowrap>Periode</th>
                    <th nowrap>Usage</th>
                    <th nowrap>Curr</th>
                    <th nowrap>Nilai Npk</th>
                    <th nowrap>Tanggal Npk</th>
                    <th nowrap>Mrc</th>
                    <th nowrap>Otc ke-</th>
                    <th nowrap>Otc ke-1</th>
                    <th nowrap>Otc ke-2</th>
                    <th nowrap>Otc ke-3</th>
                    <th nowrap>Otc ke-4</th>
                    <th nowrap>Termin ke-</th>
                    <th nowrap>Termin ke-1</th>
                    <th nowrap>Termin ke-2</th>
                    <th nowrap>Termin ke-3</th>
                    <th nowrap>Termin ke-4</th>
                    <th nowrap>Termin ke-5</th>
                    <th nowrap>Npk Ke-</th>
                    <th nowrap>Penalty Slg</th>
                    <th nowrap>Keterangan</th>
                    <th nowrap>Keterangan Cetak Otc</th>
                    <th nowrap>Keterangan Cetak Mrc</th>
                    <th nowrap>Keterangan Cetak Termin</th>
                    <th nowrap>Created_at</th>
                    <th nowrap>Tanggal Cetak</th>
                    <th nowrap>Updated_at</th>
                  </tr>
                </thead>
                <tbody>
                  @php $no = 1; @endphp
                  @foreach($data as $datas)
                  <tr>
                    <td nowrap>{{ $no++ }}</td>
                    <td nowrap><button class="btn btn-primary" id="tambah_data" value="{{ $datas->id }}"><i class="fa fa-plus"></i></button>&nbsp&nbsp&nbsp<button class="btn btn-warning" id="edit_data" value="{{ $datas->id }}"><i class="fa fa-edit"></i></button>&nbsp&nbsp&nbsp<button id="print_data" class="btn btn-success" value="{{ $datas->id }}"><i class="fa fa-print"></i></button>&nbsp&nbsp&nbsp<a href="{{ url('npk-delete/'.$datas->id) }}" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                    <td nowrap>{{ $datas->month }}</td>
                    <td nowrap>{{ $datas->mitra_name }}</td>
                    <td nowrap>{{ $datas->pks_number }}</td>
                    <td nowrap>{{ $datas->customer_name }}</td>
                    <td nowrap>{{ $datas->account_number }}</td>
                    <td nowrap align="center">{{ $datas->segmen }}</td>
                    <td nowrap>{{ $datas->manager_name }}</td>
                    <td nowrap>{{ $datas->nik }}</td>
                    <td nowrap align="center">{{ $datas->jangka_waktu_kontrak }}</td>
                    <td nowrap align="center">{{ $datas->awal_kontrak }}</td>
                    <td nowrap align="center">{{ $datas->akhir_kontrak }}</td>
                    <td nowrap>{{ number_format($datas->nilai_kontrak) }}</td>
                    <td nowrap>{{ $datas->periode }}</td>
                    <td nowrap>{{ $datas->usagee }}</td>
                    <td nowrap align="center">{{ $datas->curr_type }}</td>
                    <td nowrap>{{ number_format($datas->nilai_npk) }}</td>
                    <td nowrap align="center">{{ $datas->tanggal_npk }}</td>
                    <td nowrap>{{ number_format($datas->mrc) }}</td>
                    <td nowrap>{{ $datas->otc_ke }}</td>
                    <td nowrap>{{ number_format($datas->otc1) }}</td>
                    <td nowrap>{{ number_format($datas->otc2) }}</td>
                    <td nowrap>{{ number_format($datas->otc3) }}</td>
                    <td nowrap>{{ number_format($datas->otc4) }}</td>
                    <td nowrap>{{ $datas->termin_ke }}</td>
                    <td nowrap>{{ number_format($datas->termin1) }}</td>
                    <td nowrap>{{ number_format($datas->termin2) }}</td>
                    <td nowrap>{{ number_format($datas->termin3) }}</td>
                    <td nowrap>{{ number_format($datas->termin4) }}</td>
                    <td nowrap>{{ number_format($datas->termin5) }}</td>
                    <td nowrap>{{ $datas->npk_ke }}</td>
                    <td nowrap>{{ $datas->slg }}</td>
                    <td nowrap>{{ $datas->keterangan }}</td>
                    <td nowrap>{{ $datas->keterangan_download_otc }}</td>
                    <td nowrap>{{ $datas->keterangan_download_mrc }}</td>
                    <td nowrap>{{ $datas->keterangan_download_termin }}</td>
                    <td nowrap>{{ $datas->created_at }}</td>
                    <td nowrap>{{ $datas->tanggal_cetak }}</td>
                    <td nowrap>{{ $datas->updated_at }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="pull-right" id="example2_paginate">
        {{$data->render()}}
      </div>
    </div>
  </div>
</div>
<!-- End View Table NPK -->

<!-- Modal Tambah -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: rgb(70 130 180);">
        <h3 class="modal-title" id="exampleModalLongTitle" align="center" style="font-family:sans-serif;color:white;">Tambah KL</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="tambah-kl" action="{{ route('tambah-kl') }}" method="POST" class="npk">
        {{ csrf_field() }}
        <div class="modal-body">
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
            <input id="segmen" type="text" name="segmen" class="form-control">
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
            <div class="col-md-6">
              <label for="awal_kontrak">Awal Kontrak (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="awal_kontrak" type="text" name="awal_kontrak" class="form-control input-daterangee"/>
            </div>
            <div class="col-md-6">
              <label for="akhir_kontrak">Akhir Kontrak (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="akhir_kontrak" type="text" name="akhir_kontrak" class="form-control input-daterangeee"/>
            </div>
          </div><br>
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="periode_bulan">Periode (Bulan) (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
                        <input id="periode_bulan" type="text" name="periode_bulan" class="form-control input-date">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="periode_bulan_usage">Periode (Bulan Usage) <i>(Opsional)</i></label>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button id="save" type="submit" class="btn btn-primary">Save changes</button>
        </div>
          <input type="hidden" name="month" id="month">
          <input type="hidden" name="termin_ke" id="termin_ke">
          <input type="hidden" name="otc_ke" id="otc_ke">
      </form>
    </div>
  </div>
</div>
<!-- End Modal Tambah -->

<!-- Modal Edit -->
<div class="modal fade" id="example" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: rgb(70 130 180);">
        <h3 class="modal-title" id="exampleModalLongTitle" align="center" style="font-family:sans-serif;color:white;">Edit KL</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="edit-kl" action="{{ route('edit-kl') }}" method="POST" class="npk">
        {{ csrf_field() }}
        <div class="modal-body">
          <div class="form-group">
            <label for="mitra_namee">Mitra Name (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
            <input id="mitra_namee" type="text" name="mitra_name" class="form-control">
          </div>
          <div class="form-group">
            <label for="pks_numberr">Pks Number (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
            <input id="pks_numberr" type="text" name="pks_number" class="form-control">
          </div>
          <div class="form-group">
            <label for="customer_namee">Customer Name (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
            <input id="customer_namee" type="text" name="customer_name" class="form-control">
          </div>
          <div class="form-group">
            <label for="account_numberr">Account Number (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
            <input id="account_numberr" type="text" name="account_number" class="form-control">
          </div>
          <div class="form-group">
            <label for="segmenn">Segmen (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
            <input id="segmenn" type="text" name="segmen" class="form-control">
          </div>
          <div class="form-group">
            <label for="manager_namee">Manager Name (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
            <input id="manager_namee" type="text" name="manager_name" class="form-control">
          </div>
          <div class="form-group">
            <label for="nikk">Nik (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
            <input id="nikk" type="text" name="nik" class="form-control">
          </div>
          <div class="form-group">
            <label for="jangka_waktu_kontrakk">Jangka Waktu Kontrak (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
            <input id="jangka_waktu_kontrakk" onkeyup="jangka_waktu()" type="text" name="jangka_waktu_kontrak" class="form-control">
          </div>
          <div class="form-group">
            <label for="nilai_kontrakk">Nilai Kontrak (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
            <input id="nkk" type="text" class="form-control">
            <input id="nilai_kontrakk" type="hidden" name="nilai_kontrak" class="form-control">
          </div>
          <div class="row">
            <div class="col-md-6">
              <label for="awal_kontrakk">Awal Kontrak (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="awal_kontrakk" type="text" name="awal_kontrak" class="form-control input-daterangee"/>
            </div>
            <div class="col-md-6">
              <label for="akhir_kontrakk">Akhir Kontrak (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="akhir_kontrakk" type="text" name="akhir_kontrak" class="form-control input-daterangeee"/>
            </div>
          </div><br>
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="periode_bulann">Periode (Bulan) (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
                        <input id="periode_bulann" type="text" name="periode_bulan" class="form-control input-date">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="periode_bulan_usagee">Periode (Bulan Usage) <i>(Opsional)</i></label>
                        <input id="periode_bulan_usagee" type="text" name="periode_bulan_usage" class="form-control input-date">
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
                        <input type="radio" id="ot1" name="otcc" value="trr1"> <span><strong>Otc 1</strong></span>
                        &nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" id="ot2" name="otcc" value="trr2"> <span><strong>Otc 2</strong></span>
                        &nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" id="ot3" name="otcc" value="trr3"> <span><strong>Otc 3</strong></span>
                        &nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" id="ot4" name="otcc" value="trr4"> <span><strong>Otc 4</strong></span>
                      </div>
                    </div><br>
                    <div class="row">
                      <div class="col-md-5" id="hidee5">
                        <label>Otc Ke-1</label>
                        <input id="otccccc1" type="text" class="form-control">
                        <input id="otcc1" type="hidden" name="otcc1" class="form-control">
                      </div>
                      <div class="col-md-5" id="hidee6">
                        <label>Otc Ke-2</label>
                        <input id="otccccc2" type="text" class="form-control">
                        <input id="otcc2" type="hidden" name="otcc2" class="form-control">
                      </div>
                      <div class="col-md-5" id="hidee7">
                        <label>Otc Ke-3</label>
                        <input id="otccccc3" type="text" class="form-control">
                        <input id="otcc3" type="hidden" name="otcc3" class="form-control">
                      </div>
                      <div class="col-md-5" id="hidee8">
                        <label>Otc Ke-4</label>
                        <input id="otccccc4" type="text" class="form-control">
                        <input id="otcc4" type="hidden" name="otcc4" class="form-control">
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
                        <input type="radio" id="trr1" name="terminn" value="trr1"> <span><strong>Termin 1</strong></span>
                        &nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" id="trr2" name="terminn" value="trr2"> <span><strong>Termin 2</strong></span>
                        &nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" id="trr3" name="terminn" value="trr3"> <span><strong>Termin 3</strong></span>
                        &nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" id="trr4" name="terminn" value="trr4"> <span><strong>Termin 4</strong></span>
                        &nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" id="trr5" name="terminn" value="trr5"> <span><strong>Termin 5</strong></span>
                      </div>
                    </div><br>
                    <div class="row">
                      <div class="col-md-5" id="hidee1">
                        <label>Termin Ke-1</label>
                        <input id="terminnnnn1" type="text" class="form-control">
                        <input id="terminn1" type="hidden" name="terminn1" class="form-control">
                      </div>
                      <div class="col-md-5" id="hidee2">
                        <label>Termin Ke-2</label>
                        <input id="terminnnnn2" type="text" class="form-control">
                        <input id="terminn2" type="hidden" name="terminn2" class="form-control">
                      </div>
                      <div class="col-md-5" id="hidee3">
                        <label>Termin Ke-3</label>
                        <input id="terminnnnn3" type="text" class="form-control">
                        <input id="terminn3" type="hidden" name="terminn3" class="form-control">
                      </div>
                      <div class="col-md-5" id="hidee4">
                        <label>Termin Ke-4</label>
                        <input id="terminnnnn4" type="text" class="form-control">
                        <input id="terminn4" type="hidden" name="terminn4" class="form-control">
                      </div>
                      <div class="col-md-5" id="hidee9">
                        <label>Termin Ke-5</label>
                        <input id="terminnnnn5" type="text" class="form-control">
                        <input id="terminn5" type="hidden" name="terminn5" class="form-control">
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="mrcc">Mrc</label>
            <input id="mrccccc" type="text" class="form-control">
            <input id="mrcc" type="hidden" name="mrc" class="form-control">
          </div>
          <div class="form-group">
            <label for="curr_typee">Currency Type (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
            <input id="curr_typee" type="text" name="curr_type" class="form-control">
          </div>
          <div class="form-group">
            <label for="nilai_npkk">Nilai Npk (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
            <input id="nilai_npkkkkk" type="text" class="form-control">
            <input id="nilai_npkk" type="hidden" name="nilai_npk" class="form-control">
          </div>
          <div class="form-group">
            <label for="tanggal_npkk">Tanggal Npk (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
            <input id="tanggal_npkk" type="text" name="tanggal_npk" class="form-control input-daterangeeee">
          </div>
          <div class="row">
            <div class="col-md-5">
              <label for="npk_kee">Npk-ke (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="npk_kee" type="text" name="npk_day" class="form-control">
            </div>
            <div class="col-md-5">
              <label for="npk_monthh">Dari Jangka Waktu (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="npk_monthh" type="text" name="npk_month" class="form-control">
            </div>
          </div><br>
          <div class="form-group">
            <label for="keterangann">Keterangan</label>
            <input id="keterangann" type="text" name="keterangan" class="form-control">
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><span>Faktor Pengurang <i>(Silahkan Isi Jika Ada Faktor Pengurang)</i></span></h3>
                </div>
                  <div class="box-body" style="margin-right:100px;">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <input id="slg" type="text" name="slg" class="form-control" placeholder="Penalty Slg">
                        </div>
                      </div>
                      <div class="after-add-more">
                        <div class="col-md-6">
                          <div class="form-group">
                            <input type="text" name="addmore0[]" class="form-control" placeholder="Harga Total">    
                          </div>
                          <div class="form-group">
                            <input type="text" name="addmore[]" class="form-control" placeholder="Quantity">    
                          </div>
                          <div class="form-group">
                            <input type="text" name="addmore1[]" class="form-control" placeholder="Harga/Unit">    
                          </div>
                          <div class="form-group">
                            <input type="text" name="addmore2[]" class="form-control" placeholder="Jumlah Hari Tidak Aktif">    
                          </div>
                          <div class="form-group">
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
                              <input type="text" name="addmore0[]" class="form-control" placeholder="Harga Total">    
                            </div>
                            <div class="form-group">
                              <input type="text" name="addmore[]" class="form-control" placeholder="Quantity">    
                            </div>
                            <div class="form-group">
                              <input type="text" name="addmore1[]" class="form-control" placeholder="Harga/Unit">    
                            </div>
                            <div class="form-group">
                              <input type="text" name="addmore2[]" class="form-control" placeholder="Jumlah Hari Tidak Aktif">    
                            </div>
                            <div class="form-group">
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
                        <input type="text" name="hargaunit" placeholder="Harga/Unit" class="form-control">
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
          <input type="hidden" name="month" id="monthh">
          <input type="hidden" name="id" id="idd">
          <input type="hidden" name="otc_ke" id="otcc_ke">
          <input type="hidden" name="termin_ke" id="terminn_ke">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button id="save" type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal Edit -->
<!-- Modal Option Download -->
<div class="modal fade" id="download_option" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-3" style="margin-left: 70px;margin-right: 50px;">
            <button id="rincian" class="btn btn-success"><span class="glyphicon glyphicon-download"></span> Rincian Pembayaran</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Option Download -->
<!-- Modal Download -->
<div class="modal fade" id="download_npk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-3 OTC" style="margin-left: 200px;">
            <form action="{{ route('npk-preview-download') }}" method="POST">
              {{ csrf_field() }}
              <input type="hidden" name="otc_download" id="otc_download">
              <input type="hidden" name="otc_dw" id="otc_dw">
              <input type="hidden" name="id" id="id">
                <button formtarget="_blank" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-download"></span> Downlaod OTC</button>
            </form>
          </div>
          <div class="col-md-3 TERMIN" style="margin-left: 120px;margin-right: 50px;">
            <form action="{{ route('npk-preview-download') }}" method="POST">
              {{ csrf_field() }}
              <input type="hidden" name="termin_download" id="termin_download">
              <input type="hidden" name="termin_dw" id="termin_dw">
              <input type="hidden" name="idd1" id="idd1">
                <button formtarget="_blank" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-download"></span> Downlaod TERMIN</button>
            </form>
          </div>
          <div class="col-md-3 MRC">
            <form id="mrcc_download" action="{{ route('npk-preview-download') }}" method="POST">
              {{ csrf_field() }}
              <input type="hidden" name="mrc_download" id="mrc_download">
              <input type="hidden" name="mrc_dw" id="mrc_dw">
              <input type="hidden" name="iddd" id="iddd">
                <button formtarget="_blank" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-download"></span> Downlaod MRC</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Download -->


@endsection

@section('scripts')
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
  <script type="text/javascript" src="{{ asset('/admin-lte/dist/js/bootstrap-datepicker-id.js') }}"></script>
  <script type="text/javascript" src="{{ asset('/admin-lte/dist/js/index-blade.js') }}"></script>

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
      $('#pesannn').html('<pre><strong>Silahkan Isi <i>Usage Periode</i> Jika Ada(<i>Opsional</i>)</strong></pre>');
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

    $(document).on('click','#tambah_data',function(){
      $('#pesan').html('<pre><strong>Isi Periode (Bulan)</strong></pre>');
      $('#pesannn').html('<pre><strong>Isi <i>Usage Periode</i> (<i>Opsional</i>)</strong></pre>');
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
</script> -->
@endsection
