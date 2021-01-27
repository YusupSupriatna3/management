@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 50
    });

} );
</script>
@stop
@extends('layouts.app')
@section('dashboard')
    AccountLock
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="box">
  
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>

      <form action="{{ route('search-accountLock') }}" method="GET" class="form-horizontal">
        {{ csrf_field() }}
        <div class="box-body" style="margin-right:100px;">
          <div class="row">
            <div class="form-group">
              <label class="col-md-4 control-label">ACCOUNT NUM</label>
              <div class="col-md-6">
                <input id="search" type="text" class="form-control" name="cari" placeholder="INPUT ACCOUNT NUM">
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
      </form>

      <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title pull-right"><a href="{{ URL('/accountLock') }}"><button id="refresh" class="btn btn-primary btn-sm btn-block"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Refresh</button></a></h3>
      </div>
      </div>
  <div style="overflow-x:auto;">
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th nowrap style="text-align: center;">Account Num</th>
                <th nowrap style="text-align: center;">Customer Ref</th>
                <th nowrap style="text-align: center;">Account Name</th>
                <th nowrap style="text-align: center;">Currency Code</th>
                <th nowrap style="text-align: center;">Business Share</th>
                <th nowrap style="text-align: center;">BA Tibs</th>
                <th nowrap style="text-align: center;">BA Lock</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($data as $datas)
              <tr role="row" class="odd">
                <td nowrap style="text-align: center;">{{$datas->account_num}}</td>
                <td nowrap style="text-align: center;">{{$datas->customer_ref}}</td>
                <td nowrap style="text-align: center;">{{$datas->account_name}}</td>
                <td nowrap style="text-align: center;">{{$datas->currency_code}}</td>
                <td nowrap style="text-align: center;">{{$datas->business_share}}</td>
                <td nowrap style="text-align: center;">{{$datas->ba_tibs}}</td>
                <td nowrap style="text-align: center;">{{$datas->ba_lock}}</td>
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