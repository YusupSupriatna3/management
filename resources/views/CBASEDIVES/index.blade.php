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


    

  @component('layouts.search1', ['title' => 'Search'])
       <select id="navigation" class="form-control fa fa-search">
        <option selected disabled values="">SELECT SEARCH CATEGORY </option>
        <option value="{{ url('CBASEDIVES/nipnas') }}">By NIPNAS</option>
        <option value="{{ url('CBASEDIVES/standardname') }}">By STANDARD_NAME</option>
      </select>
      @endcomponent

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