@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 50
    });

} );
$("#navigation").change(function()
{
    document.location.href = $(this).val();
});
</script>
@stop
@extends('layouts.app')
@section('dashboard')
DATA TABLE RMART ACC NUM
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

@component('layouts.search1', ['title' => 'Search'])
        <select id="navigation" class="form-control fa fa-search">
        <option selected disabled values="">SELECT SEARCH CATEGORY </option>
        <option value="{{ url('RMARACCNUM/nipnas') }}">By NIPNAS</option>
        <option value="{{ url('RMARACCNUM/standardname') }}">By CC</option>
      </select>
      @endcomponent
      

      <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title pull-right"><a href="{{ URL('/RMARACCNUM') }}"><button id="refresh" class="btn btn-primary btn-sm btn-block"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Refresh</button></a></h3>
      </div>
      </div>
  <div style="overflow-x:auto;">
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th nowrap style="text-align: center;">ACCOUNTNAS</th>
                <th nowrap style="text-align: center;">ACCOUNT_NAME</th>
                <th nowrap style="text-align: center;">CUSTOMER_REF</th>
                <th nowrap style="text-align: center;">BA_TIBS_OLD</th>
                <th nowrap style="text-align: center;">BA_LOCK_OLD</th>
                <th nowrap style="text-align: center;">NIPNAS</th>
                <th nowrap style="text-align: center;">VALID_FROM</th>
                <th nowrap style="text-align: center;">VALID_UNTIL</th>
                <th nowrap style="text-align: center;">UPDATED_BY</th>
                <th nowrap style="text-align: center;">UPDATED_DATE</th>
                <th nowrap style="text-align: center;">BA_TIBS</th>
                <th nowrap style="text-align: center;">LOCKING_RMART</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($data as $datas)
                <tr role="row" class="odd">
                        <td nowrap style="text-align: center;"><a href="{{ url('ncrmbillaccount-caricc/'.$datas->account_num) }}">{{$datas->account_num}}</a></td>
                        <td nowrap >{{$datas->account_name}}</td>
                        <td nowrap style="text-align: center;">{{$datas->customer_ref}}</td>
                        <td nowrap style="text-align: center;">{{$datas->ba_tibs_old}}</td>
                        <td nowrap style="text-align: center;">{{$datas->ba_lock_old}}</td>
                        <td nowrap style="text-align: center;">{{$datas->nip_nas}}</td>
                        <td nowrap style="text-align: center;">{{$datas->valid_from}}</td>
                        <td nowrap style="text-align: center;">{{$datas->valid_until}}</td>
                        <td nowrap style="text-align: center;">{{$datas->updated_by}}</td>
                        <td nowrap style="text-align: center;">{{$datas->updated_date}}</td>
                        <td nowrap style="text-align: center;">{{$datas->ba_tibs}}</td>
                        <td nowrap style="text-align: center;">{{$datas->locking_rmart}}</td>
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