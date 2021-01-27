@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
<style type="text/css">
  tr th{
    color: white;
  }
  tr td{
    color: white;
  }
  label{
    color: white;
  }
</style>

<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 50
    });

  } );
  if ($("#customerform").length > 0) {
    $("#customerform").validate({

      rules: {
        paymentid: {
          required: true,
          maxlength: 50
        },
        periode: {
          required: true,
          maxlength: 6
        },  
      },
      messages: {

        paymentid: {
          required: "Please enter paymentid",
          maxlength: "Your last paymentid maxlength should be 50 characters long."
        },
        periode: {
          required: "Please enter periode",
          maxlength: "Your last periode maxlength should be 6 characters long."
        },
        
      },
    })
  }
  $(document).ready( function () {
    $('select').selectize({
          // sortField: 'text'
        });
  });
</script>
@stop
@extends('layouts.app')
@section('dashboard')
Check Data Pembayaran
@endsection
@section('content')
<!-- Main content -->
<section class="content">
  <div class="box" style="background-color: #265a88;">

    <!-- /.box-header -->
    <div class="box-body">
      <div class="row">
      </div>
      <!-- end -->  
      <form action="{{ route('search-cekAp') }}" method="GET" class="form-horizontal">
        {{ csrf_field() }}
        <div class="box-body" style="margin-right:100px;">
          <div class="row">
            <div class="form-group">
              <label class="col-md-4 control-label">ACCOUNT</label>
              <div class="col-md-6">
                <input id="search" type="text" class="form-control" name="account" value="<?php if (isset($account)): ?>{{ $account }}<?php endif ?>" placeholder="INPUT ACCOUNT" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label">BILL_PERIOD</label>
              <div class="col-md-6">
                <select id="periodecari" name="periodee" class="form-control select2" placeholder="PILIH BILL_PERIOD">
                  <option value="">PILIH BILL_PERIOD</option>
                  @foreach($periode as $dat)
                  <option value="{{ $dat->nper }}">{{ $dat->nper }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label">PERIODE AKHIR</label>
              <div class="col-md-6">
                <select id="periodecari2" name="periode2" class="form-control select2" placeholder="PILIH BILL_PERIOD">
                  <option value="">PILIH BILL_PERIOD</option>
                  @foreach($periode as $dat)
                  <option value="{{ $dat->nper }}" required>{{ $dat->nper }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label">&nbsp;</label>
              <div class="col-md-4">
                <button type="submit" id="cari_cekap" class="btn btn-primary btn-sm btn-block"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</button>
              </div>
            </div>
          </div>
        </div>
      </form>


      <div class="box box-primary" style="background-color: #265a88;">
        <div class="box-header with-border">
          <h3 class="box-title pull-right"><a href="{{ URL('/cekAp') }}"><button id="refresh" class="btn btn-primary btn-sm btn-block"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Refresh</button></a></h3>
        </div>
      </div>
      <div style="overflow-x:auto;">
        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
          <div class="row">
            <div class="col-sm-12">
              <table id="example2" style="background-color: #265a88;" class="table table-bordered" role="grid" aria-describedby="example2_info">
                <thead>
                  <tr role="row">
                    <th nowrap style="text-align: center;">ACCOUNT_NUMBER</th>
                    <th nowrap style="text-align: center;">ACCOUNT_NAME</th>
                    <th nowrap style="text-align: center;">PERIODE</th>
                    <th nowrap style="text-align: center;">TANGGAL_FLG</th>
                    <th nowrap style="text-align: center;">CL_HKONT</th>
                    <th nowrap style="text-align: center;">TOTAL_CASH</th>
                    <th nowrap style="text-align: center;">TOTAL_NON_CASH</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $datas)
                  <tr role="row" class="odd">
                    <td nowrap style="text-align: center;">{{$datas->idnumber}}</td>
                    <td nowrap style="text-align: center;">{{$datas->account_name}}</td>
                    <td nowrap style="text-align: center;">{{$datas->nper}}</td>
                    <td nowrap style="text-align: center;">{{$datas->cl_post_date}}</td>
                    <td nowrap style="text-align: center;">{{$datas->cl_hkont}}</td>
                    <td nowrap style="text-align: center;">{{$datas->total_cash}}</td>
                    <td nowrap style="text-align: center;">{{$datas->total_non_cash}}</td>
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
    <!-- /.box-body -->
  </div>
</section>
<!-- /.content -->
</div>
@endsection