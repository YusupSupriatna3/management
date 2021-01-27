@extends('layouts.app')

@section('dashboard')
Data Alamat Pengiriman
<small></small>
@endsection

@section('breadcrumb')
<li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Data Nama Dan Alamat Pengiriman Invoice</li>
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
        <h3 class="box-title" style="color: white;">Data Nama Dan Alamat Pengiriman Invoice</h3>
      </div>
      <form id="form-search" name="form-search" action="{{ route('search-alamat') }}" method="GET" class="form-horizontal">
        {{ csrf_field() }}
        <div class="box-body" style="margin-right:100px;">
          <div class="row">
            <div class="form-group">
              <label class="col-md-4 control-label" style="color: white;">ACCOUNT_NUMBER</label>
              <div class="col-md-6">
                <select class="form-control select2" name="no_akun" id="no_akun">
                  <option value="">=====>Pilih Account_number<=====</option>
                  @foreach($akun as $dat)
                  <option value="{{ $dat->account }}">{{ $dat->account }}</option>
                  @endforeach
                </select>
              </div>
              <label class="error" for="no_akun"></label>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label">&nbsp;</label>
              <div class="col-md-4">
                <button type="submit" id="cari_alamat" class="btn btn-primary btn-sm btn-block"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
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
                <thead style="background-color: #ffc107;">
                  <tr>
                      <th nowrap>No</th>
                      <th nowrap>Action</th>
                      <th nowrap>Account Number</th>
                      <th nowrap>Nama Customer</th>
                      <th nowrap>Cq</th>
                      <th nowrap>Jabatan</th>
                      <th nowrap>Nama Gedung</th>
                      <th nowrap>Lantai</th>
                      <th nowrap>Nama Jalan</th>
                      <th nowrap>Kavling</th>
                      <th nowrap>Nomor Gedung</th>
                      <th nowrap>Kecamatan</th>
                      <th nowrap>City</th>
                      <th nowrap>Provinsi</th>
                      <th nowrap>Kode Pos</th>
                      <th nowrap>Aoc</th>
                      <th nowrap>Email</th>
                      <th nowrap>Phone</th>
                      <th nowrap>Segment</th>
                      <th nowrap>Keterangan</th>
                      <th nowrap>Last Update</th>
                  </tr>
                </thead>
                <tbody>
                  @php $no = 1; @endphp
                  @foreach($data as $datas)
                  <tr>
                      <td nowrap>{{ $no++ }}</td>
                      <td nowrap><button class="btn btn-warning" id="edit_data" value="{{ $datas->id }}"><i class="fa fa-edit" title="klik untuk edit"></i></button></td>
                      <td nowrap>{{$datas->account}}</td>
                      <td nowrap>{{$datas->nama_cc}}</td>
                      <td nowrap>{{$datas->cq}}</td>
                      <td nowrap>{{$datas->jabatan}}</td>
                      <td nowrap>{{$datas->nama_gedung}}</td>
                      <td nowrap>{{$datas->lantai}}</td>
                      <td nowrap>{{$datas->nama_jalan}}</td>
                      <td nowrap>{{$datas->kavling}}</td>
                      <td nowrap>{{$datas->no_gedung}}</td>
                      <td nowrap>{{$datas->kecamatan}}</td>
                      <td nowrap>{{$datas->city}}</td>
                      <td nowrap>{{$datas->provinsi}}</td>
                      <td nowrap>{{$datas->kode_pos}}</td>
                      <td nowrap>{{$datas->aoc}}</td>
                      <td nowrap>{{$datas->email}}</td>
                      <td nowrap>{{$datas->phone_cc}}</td>
                      <td nowrap>{{$datas->segment}}</td>
                      <td nowrap>{{$datas->keterangan}}</td>
                      <td nowrap>{{$datas->updated_at}}</td>          
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
        <h3 class="modal-title" id="exampleModalLongTitle" align="center" style="font-family:sans-serif;color:white;">Edit Alamat Pengiriman</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="box-body">
      <form id="edit-alamat-pengiriman" action="{{ route('edit-alamat-pengiriman') }}" method="POST" class="request">
        {{ csrf_field() }}
        <div class="modal-body">
        <div class="col-md-6">
            <div class="form-group">
              <label for="account">Account (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="account" type="text" name="account" class="form-control" >
            </div>
            <div class="form-group">
              <label for="nama_cc">Nama_cc (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="nama_cc" type="text" name="nama_cc" class="form-control" >
            </div>
            <div class="form-group">
              <label for="cq">Cq (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="cq" type="text" name="cq" class="form-control">
            </div>
            <div class="form-group">
              <label for="jabatan">Jabatan (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="jabatan" type="text" name="jabatan" class="form-control" >
            </div>
            <div class="form-group">
              <label for="nama_gedung">Nama_gedung (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="nama_gedung" type="text" name="nama_gedung" class="form-control" >
            </div>
            <div class="form-group">
              <label for="lantai">Lantai (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="lantai" type="text" name="lantai" class="form-control">
            </div>
            <div class="form-group">
              <label for="nama_jalan">Nama_jalan (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="nama_jalan" type="text" class="form-control" >
            </div>
            <div class="form-group">
              <label for="kavling">Kavling (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="kavling" type="text" name="kavling" class="form-control">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="no_gedung">No_gedung (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="no_gedung" type="text" name="no_gedung" class="form-control">
            </div>
            <div class="form-group">
              <label for="kecamatan">Kecamatan (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="kecamatan" type="text" name="kecamatan" class="form-control">
            </div>
            <div class="form-group">
              <label for="city">City (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="city" type="text"  name="city" class="form-control">
            </div>
            <div class="form-group">
              <label for="provinsi">Provinsi (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="provinsi" type="text" name="provinsi" class="form-control">
            </div>
            <div class="form-group">
              <label for="kode_pos">Kode_pos (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="kode_pos" type="text" name="kode_pos" class="form-control">
            </div>
            <div class="form-group">
              <label for="aoc">Aoc (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="aoc" type="text"  name="aoc" class="form-control">
            </div>
            <div class="form-group">
              <label for="email">Email (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="email" type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
              <label for="phone_cc">Phone_cc (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="phone_cc" type="text" name="phone_cc" class="form-control">
            </div>
            <div class="form-group">
              <label for="segment">Segment (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="segment" type="text" name="segment" class="form-control">
            </div>
            <div class="form-group">
              <label for="keterangan">Keterangan (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="keterangan" type="text" name="keterangan" class="form-control">
            </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button id="save" type="submit" class="btn btn-primary">Save changes</button>
        </div>
        <input type="hidden" name="id" id="idd">
        </div>
      </form>
      </div>
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
  $(document).on('click','#edit_data',function(){
      $('#hide').show();
      var id = $(this).val();
      $('#idd').val(id);
      console.log(id)
      $.ajax({
        type: 'GET', //THIS NEEDS TO BE GET
        url: 'data-alamat-pengiriman-id/'+id,
        dataType: 'json',
        success: function (data) {
          console.log(data);
          $('#account').val(data.account);
          $('#payment_no').val(data.payment_no);
          $('#order_id').val(data.order_id);
          $('#nama_cc').val(data.nama_cc);
          $('#cq').val(data.cq);
          $('#jabatan').val(data.jabatan);
          $('#nama_gedung').val(data.nama_gedung);
          $('#lantai').val(data.lantai);
          $('#nama_jalan').val(data.nama_jalan);
          $('#kavling').val(data.kavling);
          $('#no_gedung').val(data.no_gedung);
          $('#kecamatan').val(data.kecamatan);
          $('#city').val(data.city);
          $('#provinsi').val(data.provinsi);
          $('#kode_pos').val(data.kode_pos);
          $('#aoc').val(data.aoc);
          $('#email').val(data.email);
          $('#phone_cc').val(data.phone_cc);
          $('#segment').val(data.segment);
          $('#keterangan').val(data.keterangan);
          $('#example').modal('show');
            // console.log(data.mitra_name);

          },error:function(){
           console.log(data);
         }
       });
    });
</script>
@endsection

