@extends('layouts.app')

@section('dashboard')
Data Members
@endsection


<style type="text/css">
  form .error {
  color: #ff0000;
}
</style>
@section('content')
<!-- Form Search Data -->
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      
    </div>
  </div>
</div>
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title pull-left"><button id="tambah_member" class="btn btn-success btn-sm btn-block"><span style="color: red;" class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Member</button></h3>
      </div>
      <div style="overflow-x:auto;">
        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
          <div class="row">
            <div class="col-sm-12">
              <table id="ttable_id" class="table table-responsive">
                <thead>
                  <tr>
                    <th nowrap>No</th>
                    <th nowrap>Nama Lengkap</th>
                    <th nowrap>Username</th>
                    <th nowrap></th>
                  </tr>
                </thead>
                <tbody>
                  @php $no = 1; @endphp
                  @foreach($members as $datas)
                  <tr>
                    <td nowrap>{{ $no++ }}</td>
                    <td nowrap>{{ $datas->name }}</td>
                    <td nowrap>{{ $datas->email }}</td>
                    <td nowrap><button class="btn btn-warning" id="edit_data" value="{{ $datas->id }}"><i class="fa fa-edit"></i></button>&nbsp&nbsp&nbsp<a href="{{ url('member-delete/'.$datas->id) }}" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End View Table User -->

<!-- Modal Tambah -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: rgb(70 130 180);">
        <h3 class="modal-title" id="exampleModalLongTitle" align="center" style="font-family:sans-serif;color:white;">Tambah Member</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="tambah-member" action="{{ route('tambah-member') }}" method="POST" class="user">
        {{ csrf_field() }}
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Nama Lengkap (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
            <input id="name" type="text" name="name" class="form-control">
          </div>
          <div class="form-group">
            <label for="email">Username (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
            <input id="email" type="text" name="email" class="form-control">
          </div>
          <div class="form-group">
            <label for="password">Password (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
            <input id="password" type="text" name="password" class="form-control">
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button id="save" type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal Tambah -->

<!-- Modal Edit -->
<div class="modal fade" id="example" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: rgb(70 130 180);">
        <h3 class="modal-title" id="exampleModalLongTitle" align="center" style="font-family:sans-serif;color:white;">Edit Member</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="edit-member" action="{{ route('edit-member') }}" method="POST" class="member">
        {{ csrf_field() }}
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Nama Lengkap (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
            <input id="name" type="text" name="name" class="form-control">
          </div>
          <div class="form-group">
            <label for="email">Username (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
            <input id="email" type="text" name="email" class="form-control">
          </div>
          <div class="box-body" style="margin-right:100px;">
                    <div class="row">
                      <div class="col-md-5">
                        <label for="is_verified">Status (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
                        <select id="is_verified" class="form-control select2" name="is_verified">
                          <option value="1">Aktif</option>
                          <option value="0">Tidak Aktif</option>
                        </select>
                      </div>
                    </div>
                  </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button id="save" type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal Edit -->


@endsection

@section('scripts')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />


<script type="text/javascript">
    $(document).ready(function() {
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });
    });
</script>
<script type="text/javascript">

  $(document).ready( function () {
    $('select').selectize({
    // sortField: 'text'
  });

    $('#exampleModalLong').modal('hide');
    $('#role').hide();
    $('#table_id').DataTable({
     searching:false,
     scrollX:true,
     scrollY:true,
     ordering:false,
     lengthChange:false
   });
    $('#tambah_member').click(function () {
      $('#hide').hide();
      $('#name').val('');
      $('#email').val('');
      $('#password').val('');
      $('#exampleModalLong').modal('show');
    });
    $('#save').click(function() {
      $('#role').show();
      
    });

    $(document).on('click','#edit_data',function(){
      $('#hide').show();
      var id = $(this).val();
      console.log(id)
      $.ajax({
        type: 'GET', //THIS NEEDS TO BE GET
        url: 'data-member-id/'+id,
        dataType: 'json',
        success: function (data) {
          console.log(data);
          $('#name').val(data.name);
          $('#email').val(data.email);
          $('#is_verified').val(data.is_verified);

          },error:function(){
           console.log(data);
         }
       });
    });
    

  });
</script>
@endsection
