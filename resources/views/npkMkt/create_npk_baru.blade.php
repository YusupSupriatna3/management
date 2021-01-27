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
        <h3 class="box-title">Create NPK Baru Marketing</h3>
      </div>
      <form id="tambah-kl" action="{{ route('tambah-npk-mkt') }}" method="POST" class="npk">
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
          <div class="form-group">
            <label for="periode_bulan">Periode (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
            <input id="periode_bulan" type="text" name="periode_bulan" class="form-control">
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
        <input type="hidden" name="month" id="month">
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
  <script type="text/javascript" src="{{ asset('/admin-lte/dist/js/create-npk-baru-mkt.js') }}"></script>
@endsection
