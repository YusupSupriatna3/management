@extends('layouts.app')

@section('dashboard')
Daftar Status
<small></small>
@endsection

@section('breadcrumb')
<li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Daftar Status</li>
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
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary" style="background-color: #265a88;">
      <div class="box-header with-border">
      <h3 class="box-title pull-left"><button class="btn btn-success btn-sm btn-block"><a href="{{ route('create-status') }}" style="color: white;"><span style="color: red;" class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Status</a></button></h3>
     </div>
      <div style="overflow-x:auto;">
        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
          <div class="row">
            <div class="col-sm-12">
              <table id="ttable_id" class="table table-responsive">
                <thead>
                  <tr><th nowrap>NOMOR</th>
                      <th nowrap>STATUS</th>
                      <th nowrap>OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  @php $no = 1; @endphp
                  @foreach($data as $datas)
                  <tr>
                      <td nowrap>{{ $no++ }}</td>
                      <td nowrap>{{ $datas->status }}</td>
                      <td nowrap ><button class="btn btn-warning" id="edit_status" value="{{ $datas->id }}" title="Edit status"><i class="fa fa-edit"></i></button></td>
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
<div class="modal fade" id="example" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: rgb(70 130 180);">
        <h3 class="modal-title" id="exampleModalLongTitle" align="center" style="font-family:sans-serif;color:white;">Edit Status</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="edit-status" action="{{ route('edit-status') }}" method="POST" class="request">
        {{ csrf_field() }}
        <div class="modal-body">
          <div class="form-group">
            <label for="status">Status </label>
            <input id="status" type="text" name="status" class="form-control">
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button id="save" type="submit" class="btn btn-primary">Save changes</button>
        </div>
        <input type="hidden" name="id" id="idd">
      </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
<script type="text/javascript">
    $(function(){
   

      $('select').selectize({
    // sortField: 'text'
      });   
    });
</script>
<script type="text/javascript">
  $(document).on('click','#edit_status',function(){
      $('#hide').show();
      var id = $(this).val();
      $('#idd').val(id);
      console.log(id)
      $.ajax({
        type: 'GET', //THIS NEEDS TO BE GET
        url: 'data-status-id/'+id,
        dataType: 'json',
        success: function (data) {
          console.log(data);
          $('#status').val(data.status);
          $('#example').modal('show');
          },error:function(){
           console.log(data);
         }
       });
    });
</script>
@endsection

