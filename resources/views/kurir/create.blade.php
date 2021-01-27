@extends('layouts.app')

@section('dashboard')
Create kurir
@endsection

@section('breadcrumb')
<li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Create kurir</li>
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
    <div class="box box-primary">
      <div class="box-header with-border" style="text-align: center;">
      
      </div>
      <form id="ket_manual" action="{{ route('tambah-kurir') }}" method="POST" class="ketmanual" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-body">
          <div class="form-group">
            <label for="nama_kurir">kurir (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
            <input id="nama_kurir" type="text" name="nama_kurir" class="form-control" required="">
          </div>
        <div>
          <button id="save" type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Form  Search Data -->

@endsection

@section('scriptss')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
@endsection
