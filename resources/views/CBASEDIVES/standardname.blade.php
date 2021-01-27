@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
  
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 50
    });

} );
  $(document).ready( function () {
          $('select').selectize({
          // sortField: 'text'
        });
  });
  
</script>
@stop
@extends('layouts.app')
@section('dashboard')
DATA TABLE CBASE_ DIVES
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
      <form action="{{ route('CBASEDIVES-caristandardname') }}" method="GET" class="form-horizontal">
        {{ csrf_field() }}
        <div class="box-body" style="margin-right:100px;">
          <div class="row">
          <div class="form-group">
              <label for="kategori" class="col-md-4 control-label">SELECT SEARCH CATEGORY</label>
              <div class="col-md-6">
                <select id="kategori" class="form-control" disabled>
                    <option>BY STANDARD_NAME</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label">STANDARD_NAME</label>
              <div class="col-md-6">
                <select id="standardname" name="standardname" class="form-control select2" placeholder="PILIH STANDARD_NAME">
                <option value="">PILIH STANDARD_NAME</option>
                  @foreach($standardnames as $name)
                    <option value="{{ $name->standard_name }}">{{ $name->standard_name }}</option>
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
      </form>
      <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title pull-right"><a href="{{ URL('/CBASEDIVES') }}"><button id="refresh" class="btn btn-primary btn-sm btn-block"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Refresh</button></a></h3>
      </div>
      </div>
  <div style="overflow-x:auto;">
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th nowrap style="text-align: center;">CUSTACCNTNUM</th>
                <th nowrap style="text-align: center;">NIPNAS</th>
                <th nowrap style="text-align: center;">STANDARD_NAME</th>
                <th nowrap style="text-align: center;">SEGMEN</th>
                <th nowrap style="text-align: center;">SEGMENT_6_LNAME</th>
                <th nowrap style="text-align: center;">SUB_SEGMENT</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($data as $datas)
                <tr role="row" class="odd">
                        <td nowrap style="text-align: center;">{{$datas->custaccntnum}}</td>
                        <td nowrap style="text-align: center;">{{$datas->nip_nas}}</td>
                        <td nowrap >{{$datas->standard_name}}</td>
                        <td nowrap style="text-align: center;">{{$datas->segmen}}</td>
                        <td nowrap >{{$datas->segment_6_lname}}</td>
                        <td nowrap style="text-align: center;">{{$datas->sub_segment}}</td>
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