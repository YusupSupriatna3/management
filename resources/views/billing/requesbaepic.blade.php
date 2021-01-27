@extends('layouts.app')

@section('dashboard')
Data Request BA Bulan {{date('M Y')}}
<small></small>
@endsection

@section('breadcrumb')
<li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Data Request BA</li>
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
       
      </div>
      <div style="overflow-x:auto;">
        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
          <div class="row">
            <div class="col-sm-12">
              <table id="ttable_id" class="table table-responsive">
                <thead>
                  <tr>
                    <th nowrap>No</th>
                    <th nowrap>Opsi</th>
                    <th nowrap>id req</th>
                    <th nowrap>id project</th>
                    <th nowrap>jenis request</th>
                    <th nowrap>nama npwp</th>
                    <th nowrap>segmen</th>
                    <th nowrap>request date</th>
                  </tr>
                </thead>
                <tbody>
                  @php $no = 1; @endphp
                  @foreach($data as $datas)
                  <tr>
                    <td nowrap>{{ $no++ }}</td>
                    <td nowrap><button class="btn btn-warning" id="edit_epic" value="{{ $datas->id }}"><i class="fa fa-edit"></i></button></td>
                    <td nowrap>{{ $datas->id_req }}</td>
                    <td nowrap>{{ $datas->id_project }}</td>
                    <td nowrap>{{ $datas->jenis }}</td>
                    <td nowrap>{{ $datas->nama_npwp }}</td>
                    <td nowrap>{{ $datas->segmen }}</td>
                    <td nowrap>{{ $datas->request_date }}</td>
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
        <h3 class="modal-title" id="exampleModalLongTitle" align="center" style="font-family:sans-serif;color:white;">Request Billing Account</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="edit-epic" action="{{ route('edit-epic') }}" method="POST" class="request">
        {{ csrf_field() }}
        <div class="modal-body">
          <div class="form-group">
            <label for="id_req">ID REQ </label>
            <input id="id_req" type="text" name="id_req" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="id_project">ID PROJECT </label>
            <input id="id_project" type="text" name="id_project" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="nama_npwp">Nama NPWP </label>
            <input id="nama_npwp" type="text" name="nama_npwp" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="segmen">SEGMEN </label>
            <input id="segmen" type="text" name="segmen" class="form-control" readonly="">
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                  <div class="box-body" style="margin-right:100px;">
                    <div class="row">
                      <div class="col-md-5">
                        <label for="status">Status (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
                        <select id="status" class="form-control select2" name="status" required>
                          <option value="">===>Pilih Status<===</option>
                          <option value="CLOSED">APPROVED</option>
                          <option value="NOTAPPROVED">NOT APPROVED</option>
                          <option value="RETURNED">RETURNED</option>
                        </select>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="keterangan">KETERANGAN (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
            <input id="keterangan" type="text" name="keterangan" class="form-control" required="">
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
  $(document).on('click','#edit_epic',function(){
      $('#hide').show();
      var id = $(this).val();
      $('#idd').val(id);
      console.log(id)
      $.ajax({
        type: 'GET', //THIS NEEDS TO BE GET
        url: 'data-epic-id/'+id,
        dataType: 'json',
        success: function (data) {
          console.log(data);
          $('#id_req').val(data.id_req);
          $('#id_project').val(data.id_project);
          $('#nama_npwp').val(data.nama_npwp);
          $('#segmen').val(data.segmen);
          $('#keterangan').val(data.keterangan);
          $('#example').modal('show');

          },error:function(){
           console.log(data);
         }
       });
    });
</script>
@endsection

