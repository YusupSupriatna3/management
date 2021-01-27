@extends('layouts.app')

@section('dashboard')
Data Invoice
<small>Data Invoice</small>
@endsection

@section('breadcrumb')
<li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Edit Invoice</li>
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

<!-- View Table NPK -->
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border">
      </div>
      <div class="box-body">
        <form id="edit-kirim" action="{{ route('edit-invoice-kirim') }}" method="POST" class="invoice">
          {{ csrf_field() }}
          <div class="col-md-6">
            <div class="form-group">
              <label for="account_number">Nomor Account : {{ $data[0]->account_number }}</label>
            </div>
            <div class="form-group">
              <label for="no_invoice">Nomor Invoice &nbsp&nbsp: {{ $data[0]->no_invoice }}</label>
            </div>
          <div class="form-group">
            <label for="nama_pengirim">Nama Pengirim </label>
            <input id="nama_pengirim" type="text" value="@if(isset($data[0]->nama_pengirim)){{ $data[0]->nama_pengirim }}@else{{ ''}}@endif" name="nama_pengirim" class="form-control" required="">
          </div>
            <div class="form-group">
              <label for="status">Status Pengiriman</label>
              <select id="status" name="status" class="form-control">
                <option value="">=====>Update Status Pengiriman<=====</option>
                @foreach($ket as $dataket)
                <option value="{{$dataket->status}}">{{$dataket->status}}</option>
                @endforeach
              </select>
            </div>
          <div class="form-group">
            <label for="nama_penerima">Nama Penerima </label>
            <input id="nama_penerima" type="text" value="@if(isset($data[0]->nama_penerima)){{ $data[0]->nama_penerima }}@else{{ ''}}@endif" name="nama_penerima" class="form-control" required="">
          </div>
            <div class="form-group">
              <label for="jabatan_penerima">Jabatan Penerima </label>
              <input id="jabatan_penerima" type="text" value="@if(isset($data[0]->jabatan_penerima)){{ $data[0]->jabatan_penerima }}@else{{ ''}}@endif" name="jabatan_penerima" class="form-control" required="">
            </div>
            <div class="form-group">
              <label for="tanggal_diterima">Tanggal diterima </label>
              <input id="tanggal_diterima" type="date" value="@if(isset($data[0]->tanggal_diterima)){{ $data[0]->tanggal_diterima }}@else{{ ''}}@endif" name="tanggal_diterima" class="form-control" required="">
            </div>
            <input type="hidden" name="id" value="{{ $data[0]->id }}">
            <div class="form-group" style="text-align: right;">
              <button type="submit" class="btn btn-success">Update</button>
            </div>
          </div>
          </form>
      </div>  
      </div>
    </div>
  </div>
  <!-- End View Table NPK -->

  @endsection

  @section('scripts-edit-invoice')
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

  <!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
  <!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
  <!-- <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
  
  <script type="text/javascript">
            $(document).ready(function(){

                // Format mata uang.
                $( '.uang' ).mask('000.000.000', {reverse: true});

            })
        </script>
  <script type="text/javascript">
    $(function(){
    $('#datetimepicker').datetimepicker({format: 'M/D/YYYY HH:mm:ss A'});
  })
    $(document).ready( function () {
      $('#input-daterange').datepicker({
      todayBtn:'linked',
      format:'m/d/yyyy',
      
      autoclose:true
      });

      $('#input-daterangee').datepicker({
      todayBtn:'linked',
      format:'m/d/yyyy',
      autoclose:true
      });

      $('select').selectize({
    // sortField: 'text'
      });   
    });
</script>
@endsection
