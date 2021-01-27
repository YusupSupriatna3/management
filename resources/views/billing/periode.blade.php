@extends('layouts.app')

@section('dashboard')
Data Account Billing Bulan {{date('M Y')}}
<small></small>
@endsection

@section('breadcrumb')
<li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Data Account Billing bulan {{date('M Y')}}</li>
@endsection
<style type="text/css">
  form .error {
  color: #ff0000;
}
  th {
  color: #FFFFFF;   
  }
  td {
    color: #FFFFFF;
  }
</style>
@section('content')
<!-- Form Search Data -->
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary" style="background-color: #265a88;">
      <div class="box-header with-border">
        <h3 class="box-title" style="color: white;">Search Account Billing</h3>
      </div>
      <form id="form-search" name="form-search" action="{{ route('search-billing') }}" method="GET" class="form-horizontal">
        {{ csrf_field() }}
        <div class="box-body" style="margin-right:100px;">
          <div class="row">
            <div class="form-group">
              <label class="col-md-4 control-label" style="color: white;">ACCOUNTNAS</label>
              <div class="col-md-6">
                <select class="form-control select2" name="accountnas" id="accountnas">
                  <option value="">=====>Pilih Accountnas<=====</option>
                  @foreach($account as $dat)
                  <option value="{{ $dat->accountnas }}">{{ $dat->accountnas }}</option>
                  @endforeach
                </select>
              </div>
              <label class="error" for="accountnas"></label>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" style="color: white;">CREATED_BY_NAME</label>
              <div class="col-md-6">
                <select id="created_by_name" name="created_by_name" class="form-control select2">
                  <option value="">=====>Pilih Created_by_name<=====</option>
                  @foreach($created as $createds)
                    <option value="{{ $createds->created_by_name }}">{{ $createds->created_by_name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" style="color: white;">NAMA CC</label>
              <div class="col-md-6">
                <select id="billaccntname" name="billaccntname" class="form-control select2">
                  <option value="">=====>Pilih Nama CC<=====</option>
                  @foreach($billaccntname as $cc)
                    <option value="{{ $cc->billaccntname }}">{{ $cc->billaccntname }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label">&nbsp;</label>
              <div class="col-md-4">
                <button type="submit" id="cari_akun" class="btn btn-primary btn-sm btn-block"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</button>
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
        <!-- <h3 class="box-title pull-left"><button id="tambah_kl" class="btn btn-success btn-sm btn-block"><span style="color: red;" class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah KL Baru</button></h3>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<h3 class="box-title"><a href="{{ route('export-excel') }}"><button id="download_kl" class="btn btn-success btn-sm btn-block"><span style="color: red;" class="glyphicon glyphicon-download" aria-hidden="true"></span> Download To Excel</button></a></h3>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<h3 class="box-title"><button id="upload" class="btn btn-success btn-sm btn-block"><span style="color: red;" class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload From Excel</button></h3>
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<h3 class="box-title"><button id="surat_pernyataan" class="btn btn-success btn-sm btn-block"><span style="color: red;" class="glyphicon glyphicon-download" aria-hidden="true"></span> Surat Pernyataan Pembayaran</button></h3>
        <h3 class="box-title pull-right"><a href="{{ route('data-npk') }}"><button id="refresh" class="btn btn-primary btn-sm btn-block"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Refresh</button></a></h3> -->
      </div>
      <div style="overflow-x:auto;">
        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
          <div class="row">
            <div class="col-sm-12">
              <table id="ttable_id" class="table table-responsive">
                <thead>
                  <tr>
                    <th nowrap>No</th>
                    <th nowrap>BILLACCNTNUM</th>
                    <th nowrap>BILLACCNTNAME</th>
                    <th nowrap>REGION</th>
                    <th nowrap>WITEL</th>
                    <th nowrap>SEGMENT</th>
                    <th nowrap>TAXNUMBER</th>
                    <th nowrap>ACCOUNTNAS</th>
                    <th nowrap>BILLACCNTSTATUS</th>
                    <th nowrap>ACCOUNT_CREATED</th>
                    <th nowrap>ADDR_NAME</th>
                    <th nowrap>ADDR</th>
                    <th nowrap>ADDR_LINE_2</th>
                    <th nowrap>ADDR_LINE_3</th>
                    <th nowrap>ADDR_LINE_4</th>
                    <th nowrap>ADDR_LINE_5</th>
                    <th nowrap>CITY</th>
                    <th nowrap>CREATED_BY_NAME</th>
                  </tr>
                </thead>
                <tbody>
                  @php $no = 1; @endphp
                  @foreach($data as $datas)
                  <tr>
                    <td nowrap>{{ $no++ }}</td>
                    <td nowrap>{{ $datas->billaccntnum }}</td>
                    <td nowrap>{{ $datas->billaccntname }}</td>
                    <td nowrap>{{ $datas->region }}</td>
                    <td nowrap>{{ $datas->witel }}</td>
                    <td nowrap>{{ $datas->segment }}</td>
                    <td nowrap>{{ $datas->taxnumber }}</td>
                    <td nowrap>{{ $datas->accountnas }}</td>
                    <td nowrap>{{ $datas->billaccntstatus }}</td>
                    <td nowrap>{{ $datas->account_created }}</td>
                    <td nowrap>{{ $datas->addr_name }}</td>
                    <td nowrap>{{ $datas->addr }}</td>
                    <td nowrap>{{ $datas->addr_line_2 }}</td>
                    <td nowrap>{{ $datas->addr_line_3 }}</td>
                    <td nowrap>{{ $datas->addr_line_4 }}</td>
                    <td nowrap>{{ $datas->addr_line_5 }}</td>
                    <td nowrap>{{ $datas->city }}</td>
                    <td nowrap>{{ $datas->created_by_name }}</td>
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
<!-- End View Table Billing -->
@endsection

@section('scripts')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
@endsection
