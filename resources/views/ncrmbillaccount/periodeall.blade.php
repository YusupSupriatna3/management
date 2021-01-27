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
DATA TABLE NCRM_BILLACCOUNT ALL PERIODS
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
    

      <form action="{{ route('search-cariperiodeall') }}" method="GET" class="form-horizontal">
        {{ csrf_field() }}
        <div class="box-body" style="margin-right:100px;">
          <div class="row">
            <div class="form-group">
              <label class="col-md-4 control-label">ACCOUNTNAS/CREATED_BY_NAME</label>
              <div class="col-md-6">
                <input id="search" type="text" class="form-control" name="cari" placeholder="INPUT ACCOUNTNAS/CREATED_BY_NAME">
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
        <h3 class="box-title pull-right"><a href="{{ URL('/ncrmbillaccount/periodeall') }}"><button id="refresh" class="btn btn-primary btn-sm btn-block"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Refresh</button></a></h3>
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
                <th nowrap style="text-align: center;">BILLACCNTNUM</th>
                <th nowrap style="text-align: center;">BILLACCNTNAME</th>
                <th nowrap style="text-align: center;">BILLACCNTTYPE</th>
                <th nowrap style="text-align: center;">REGION</th>
                <th nowrap style="text-align: center;">WITEL</th>
                <th nowrap style="text-align: center;">SEGMENT</th>
                <th nowrap style="text-align: center;">SUBSEGMENT</th>
                <th nowrap style="text-align: center;">HANDLINGTYPE</th>
                <th nowrap style="text-align: center;">TAXNUMBER</th>
                <th nowrap style="text-align: center;">BILLACCNTSTATUS</th>
                <th nowrap style="text-align: center;">STATUSDATE</th>
                <th nowrap style="text-align: center;">MASTER_OU_ID</th>
                <th nowrap style="text-align: center;">PAR_ROW_ID</th>
                <th nowrap style="text-align: center;">PAR_OU_ID</th>
                <th nowrap style="text-align: center;">CUSTACCNT_ID</th>
                <th nowrap style="text-align: center;">ADDR_ID</th>
                <th nowrap style="text-align: center;">TGL_PROSES</th>
                <th nowrap style="text-align: center;">WIL_ID</th>
                <th nowrap style="text-align: center;">X_BUS_AREA</th>
                <th nowrap style="text-align: center;">BUSINESS_AREA</th>
                <th nowrap style="text-align: center;">ACCOUNT_CREATED</th>
                <th nowrap style="text-align: center;">ADDR_NAME</th>
                <th nowrap style="text-align: center;">LATITUDE</th>
                <th nowrap style="text-align: center;">LONGITUDE</th>
                <th nowrap style="text-align: center;">ADDR</th>
                <th nowrap style="text-align: center;">ADDR_LINE_2</th>
                <th nowrap style="text-align: center;">ADDR_LINE_3</th>
                <th nowrap style="text-align: center;">ADDR_LINE_4</th>
                <th nowrap style="text-align: center;">ADDR_LINE_5</th>
                <th nowrap style="text-align: center;">CITY</th>
                <th nowrap style="text-align: center;">COMMENTS</th>
                <th nowrap style="text-align: center;">COUNTRY</th>
                <th nowrap style="text-align: center;">DISTRICT</th>
                <th nowrap style="text-align: center;">EMAIL_ADDR</th>
                <th nowrap style="text-align: center;">ZIPCODE</th>
                <th nowrap style="text-align: center;">X_PTI1_APART_NUM</th>
                <th nowrap style="text-align: center;">X_PTI1_FLOOR</th>
                <th nowrap style="text-align: center;">X_PTI1_PROVINCE</th>
                <th nowrap style="text-align: center;">X_PTI1_REGION</th>
                <th nowrap style="text-align: center;">X_PTI1_TIME_ZONE</th>
                <th nowrap style="text-align: center;">ROW_ID</th>
                <th nowrap style="text-align: center;">PARTY_TYPE_CD</th>
                <th nowrap style="text-align: center;">GROUP_TYPE_CD</th>
                <th nowrap style="text-align: center;">CREATED_BY_NAME</th>
                <th nowrap style="text-align: center;">FST_NAME</th>
                <th nowrap style="text-align: center;">LAST_NAME</th>
                <th nowrap style="text-align: center;">EMAIL_ADDR_CONTACT</th>
                <th nowrap style="text-align: center;">WORK_PHONE</th>
                <th nowrap style="text-align: center;">MOBILE_PHONE</th>
                <th nowrap style="text-align: center;">JOB_TITLE</th>
                <th nowrap style="text-align: center;">LAST_REFRESH</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($data as $datas)
                <tr role="row" class="odd">
                        <td nowrap style="text-align: center;">{{$datas->accountnas}}</td>
                        <td nowrap style="text-align: center;">{{$datas->billaccntnum}}</td>
                        <td nowrap >{{$datas->billaccntname}}</td>
                        <td nowrap style="text-align: center;">{{$datas->billaccnttype}}</td>
                        <td nowrap style="text-align: center;">{{$datas->region}}</td>
                        <td nowrap style="text-align: center;">{{$datas->witel}}</td>
                        <td nowrap style="text-align: center;">{{$datas->segment}}</td>
                        <td nowrap style="text-align: center;">{{$datas->subsegment}}</td>
                        <td nowrap style="text-align: center;">{{$datas->handlingtype}}</td>
                        <td nowrap style="text-align: center;">{{$datas->taxnumber}}</td>
                        <td nowrap style="text-align: center;">{{$datas->billaccntstatus}}</td>
                        <td nowrap style="text-align: center;">{{ date('d-M-y', strtotime($datas->statusdate)) }}</td>
                        <td nowrap style="text-align: center;">{{$datas->master_ou_id}}</td>
                        <td nowrap style="text-align: center;">{{$datas->par_row_id}}</td>
                        <td nowrap style="text-align: center;">{{$datas->par_ou_id}}</td>
                        <td nowrap style="text-align: center;">{{$datas->custaccnt_id}}</td>
                        <td nowrap style="text-align: center;">{{$datas->addr_id}}</td>
                        <td nowrap style="text-align: center;">{{ date('d-M-y', strtotime($datas->tgl_proses)) }}</td>
                        <td nowrap style="text-align: center;">{{$datas->wil_id}}</td>
                        <td nowrap style="text-align: center;">{{$datas->x_bus_area}}</td>
                        <td nowrap style="text-align: center;">{{$datas->business_area}}</td>
                        <td nowrap style="text-align: center;">{{ date('d-M-y', strtotime($datas->account_created)) }}</td>
                        <td nowrap >{{$datas->addr_name}}</td>
                        <td nowrap style="text-align: center;">{{$datas->latitude}}</td>
                        <td nowrap style="text-align: center;">{{$datas->longitude}}</td>
                        <td nowrap style="text-align: center;">{{$datas->addr}}</td>
                        <td nowrap style="text-align: center;">{{$datas->addr_line_2}}</td>
                        <td nowrap style="text-align: center;">{{$datas->addr_line_3}}</td>
                        <td nowrap style="text-align: center;">{{$datas->addr_line_4}}</td>
                        <td nowrap style="text-align: center;">{{$datas->addr_line_5}}</td>
                        <td nowrap style="text-align: center;">{{$datas->city}}</td>
                        <td nowrap style="text-align: center;">{{$datas->comments}}</td>
                        <td nowrap style="text-align: center;">{{$datas->country}}</td>
                        <td nowrap style="text-align: center;">{{$datas->district}}</td>
                        <td nowrap style="text-align: center;">{{$datas->email_addr}}</td>
                        <td nowrap style="text-align: center;">{{$datas->zipcode}}</td>
                        <td nowrap style="text-align: center;">{{$datas->x_pti1_apart_num}}</td>
                        <td nowrap style="text-align: center;">{{$datas->x_pti1_floor}}</td>
                        <td nowrap style="text-align: center;">{{$datas->x_pti1_province}}</td>
                        <td nowrap style="text-align: center;">{{$datas->x_pti1_region}}</td>
                        <td nowrap style="text-align: center;">{{$datas->x_pti1_time_zone}}</td>
                        <td nowrap style="text-align: center;">{{$datas->row_id}}</td>
                        <td nowrap style="text-align: center;">{{$datas->party_type_cd}}</td>
                        <td nowrap style="text-align: center;">{{$datas->group_type_cd}}</td>
                        <td nowrap style="text-align: center;">{{$datas->created_by_name}}</td>
                        <td nowrap style="text-align: center;">{{$datas->fst_name}}</td>
                        <td nowrap style="text-align: center;">{{$datas->last_name}}</td>
                        <td nowrap style="text-align: center;">{{$datas->email_addr_contact}}</td>
                        <td nowrap style="text-align: center;">{{$datas->phone}}</td>
                        <td nowrap style="text-align: center;">{{$datas->cell_ph_num}}</td>
                        <td nowrap style="text-align: center;">{{$datas->job_title}}</td>
                        <td nowrap style="text-align: center;">{{ date('d-M-y', strtotime($datas->last_refresh)) }}</td>
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