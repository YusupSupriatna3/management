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
      <form id="form-search" name="form-search" action="{{ route('search-data-mkt') }}" method="GET" class="form-horizontal">
        {{ csrf_field() }}
        <div class="box-body" style="text-align: center;">
          <div class="col-sm-12">
            <div class="row">
              <div class="form-group">
                <label class="col-md-4 control-label" style="color: white;">Nama Mitra</label>
                <div class="col-md-6">
                  <select id="periode" name="periode" class="form-control select2">
                    <option value="">=====>Pilih Mitra<=====</option>
                    @foreach($mitra_name as $mitra)
                      <option value="{{ $mitra->mitra_name }}">{{ $mitra->mitra_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-4 control-label" style="color: white;">NO KL</label>
                <div class="col-md-6">
                  <select id="no_kl" name="no_kl" class="form-control select2">
                    <option value="">=====>Pilih No Kl<=====</option>
                    @foreach($pks_number as $nopks)
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
                    <th nowrap>Periode</th>
                    <th nowrap>Nilai NPK</th>
                    <th nowrap>Keterangan</th>
                    <th nowrap>Created_at</th>
                    <th nowrap>Updated_at</th>
                  </tr>
                </thead>
                <tbody>
                  @php $no = 1; @endphp
                  @foreach($data as $datas)
                  <tr>
                    <td nowrap>{{ $no++ }}</td>
                    <td nowrap><button class="btn btn-primary" id="tambah_data_mkt" value="{{ $datas->id }}"><i class="fa fa-plus"></i></button>&nbsp&nbsp&nbsp<button class="btn btn-warning" id="edit_data_mkt" value="{{ $datas->id }}"><i class="fa fa-edit"></i></button>&nbsp&nbsp&nbsp<button id="print_data" class="btn btn-success" value="{{ $datas->id }}"><i class="fa fa-print"></i></button>&nbsp&nbsp&nbsp<a href="{{ url('npk-mkt-delete/'.$datas->id) }}" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                    <td nowrap>{{ $datas->month }}</td>
                    <td nowrap>{{ $datas->mitra_name }}</td>
                    <td nowrap>{{ $datas->pks_number }}</td>
                    <td nowrap>{{ $datas->periode }}</td>
                    <td nowrap>{{ number_format($datas->nilai_npk) }}</td>
                    <td nowrap>{{ $datas->keterangan }}</td>
                    <td nowrap>{{ $datas->created_at }}</td>
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
      <form id="tambah-kl" action="{{ route('tambah-npk-mkt') }}" method="POST" class="npk">
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
          <div class="form-group">
            <label for="periode_bulan">Periode (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
            <input id="periode_bulan" type="text" name="periode_bulan" class="form-control input-date">
          </div>
          <div class="form-group">
            <label for="nilai_npk">Nilai NPK (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
            <input id="nk" type="text" class="form-control">
            <input id="nilai_npk" type="hidden" name="nilai_npk" class="form-control">
          </div>
          <div class="form-group">
            <label for="keterangan">Keterangan (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
            <input id="keterangan" type="text" name="keterangan" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button id="save" type="submit" class="btn btn-primary">Save changes</button>
        </div>
          <input type="hidden" name="month" id="month">
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
      <form id="edit-kl" action="{{ route('edit-npk-mkt') }}" method="POST" class="npk">
        {{ csrf_field() }}
        <div class="modal-body">
          <div class="form-group">
            <label for="mitra_namee">Mitra Name (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
            <input id="mitra_namee" type="text" name="mitra_namee" class="form-control">
          </div>
          <div class="form-group">
            <label for="pks_numberr">Pks Number (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
            <input id="pks_numberr" type="text" name="pks_numberr" class="form-control">
          </div>
          <div class="form-group">
            <label for="periode_bulann">Periode (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
            <input id="periode_bulann" type="text" name="periode_bulann" class="form-control input-date">
          </div>
          <div class="form-group">
            <label for="nilai_npkk">Nilai NPK (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
            <input id="nkk" type="text" class="form-control">
            <input id="nilai_npkk" type="hidden" name="nilai_npkk" class="form-control">
          </div>
          <div class="form-group">
            <label for="keterangann">Keterangan (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
            <input id="keterangann" type="text" name="keterangann" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button id="save" type="submit" class="btn btn-primary">Save changes</button>
        </div>
          <input type="hidden" name="id" id="id">
          <input type="hidden" name="monthh" id="monthh">
      </form>
    </div>
  </div>
</div>
<!-- End Modal Edit -->

@endsection

@section('scripts')
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
  <script type="text/javascript" src="{{ asset('/admin-lte/dist/js/bootstrap-datepicker-id.js') }}"></script>
  <script type="text/javascript" src="{{ asset('/admin-lte/dist/js/index-mkt-blade.js') }}"></script>
@endsection
