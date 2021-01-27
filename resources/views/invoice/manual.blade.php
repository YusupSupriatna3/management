@extends('layouts.app')

@section('dashboard')
Data Invoice Manual
<small></small>
@endsection

@section('breadcrumb')
<li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Data Invoice Manual</li>
@endsection
<style type="text/css">
  form .error {
  color: #ff0000;
}
  /* th {
  color: #FFFFFF;   
  }
  td {
    color: #FFFFFF;
  } */
</style>
@section('content')
<!-- Form Search Data -->
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary" style="background-color: #265a88;">
      <div class="box-header with-border">
        <h3 class="box-title" style="color: white;">Search Data Invoice Manual</h3>
      </div>
      <form id="form-search-manual" name="form-search-manual" action="{{ route('search-invoice-manual') }}" method="GET" class="form-horizontal">
        {{ csrf_field() }}
        <div class="box-body" style="margin-right:100px;">
          <div class="row">
            <div class="form-group">
              <label class="col-md-4 control-label" style="color: white;">NO AKUN</label>
              <div class="col-md-6">
                <select class="form-control select2" name="no_akun" id="no_akun">
                  <option value="">=====>Pilih No Akun<=====</option>
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
                <button type="submit" id="cari_invoice" class="btn btn-primary btn-sm btn-block"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</button>
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
                <thead>
                  <tr style="color: white;">
                      <th nowrap>No</th>
                      <th nowrap>Opsi</th>
                      <th nowrap>Billing Periode</th>
                      <th nowrap>Account</th>
                      <th nowrap>Customer Name</th>
                      <th nowrap>Invoice Status</th>
                      <th nowrap>Print Status</th>
                      <th nowrap>Keterangan</th>
                      <th nowrap>AOC</th>
                      <th nowrap>Delivery Name</th>
                      <th nowrap>No Resi</th>
                      <th nowrap>Status</th>
                      <th nowrap>Tanggal</th>
                      <th nowrap>Jabatan Penerima</th>
                      <th nowrap>Nama Penerima</th>
                      <th nowrap>Last Refresh</th>
                  </tr>
                </thead>
                <tbody>
                  @php $no = 1; @endphp
                  @foreach($data as $datas)
                  <tr style="color: white;">
                      <td nowrap>{{ $no++ }}</td>
                      <td nowrap><button class="btn btn-danger" id="edit_data" value="{{ $datas->id }}"><i class="fa fa-edit" title="klik untuk edit"></i></button>&nbsp&nbsp&nbsp<button class="btn btn-warning" id="view_data" value="{{ $datas->id }}"><i class="fa fa-list" title="klik untuk detail"></i></button></td>
                      <td nowrap>{{ $datas->bill_prod }}</td>
                      <td nowrap>{{ $datas->account }}</td>
                      <td nowrap>{{ $datas->cust_name }}</td>
                      <td nowrap>{{ $datas->invoice_status }}</td>
                      <td nowrap>{{ $datas->print_status }}</td>
                      <td nowrap>{{ $datas->catatan }}</td>
                      <td nowrap>{{ $datas->aoc }}</td>
                      <td nowrap>{{ $datas->delivery_name }}</td>
                      <td nowrap>{{ $datas->no_resi }}</td>
                      <td nowrap>{{ $datas->status }}</td>
                      <td nowrap>{{ $datas->tanggal }}</td>
                      <td nowrap>{{ $datas->jabatan_penerima }}</td>
                      <td nowrap>{{ $datas->nama_penerima }}</td> 
                      <td nowrap>{{ $datas->updated_at }}</td>         
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
        <h3 class="modal-title" id="exampleModalLongTitle" align="center" style="font-family:sans-serif;color:white;">Edit Invoice</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="box-body">
      <form id="edit-kl" action="{{ route('edit-invoice') }}" method="POST" class="npk">
          {{ csrf_field() }}
          <div class="col-md-6">
            <div class="form-group">
              <label for="bill_prod">Billing Periode (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="bill_prod" type="text" value="@if(isset($datas->bill_prod)){{ $datas->bill_prod }}@else{{ ''}}@endif" name="bill_prod" class="form-control">
            </div>
            <div class="form-group">
              <label for="account">Account (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="account" type="text" value="@if(isset($datas->account)){{ $datas->account }}@else{{ ''}}@endif" name="account" class="form-control">
            </div>
            <div class="form-group">
              <label for="cust_name">Customer Name (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="cust_name" type="text" value="@if(isset($datas->cust_name)){{ $datas->cust_name }}@else{{ ''}}@endif" name="cust_name" class="form-control">
            </div>
            <div class="form-group">
              <label for="nipnas">Nipnas (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="nipnas" type="text" value="@if(isset($datas->nipnas)){{ $datas->nipnas }}@else{{ ''}}@endif" name="nipnas" class="form-control">
            </div>
            <div class="form-group">
              <label for="divisi">Divisi (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="divisi" type="text" value="@if(isset($datas->divisi)){{ $datas->divisi }}@else{{ ''}}@endif" name="divisi" class="form-control">
            </div>
            <div class="form-group">
              <label for="aoc">AOC (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="aoc" type="text" value="@if(isset($datas->aoc)){{ $datas->aoc }}@else{{ ''}}@endif" name="aoc" class="form-control">
            </div>
            <div class="form-group">
              <label for="curr_type">Curr Type (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="curr_type" type="text" value="@if(isset($datas->curr_type)){{ $datas->curr_type }}@else{{ ''}}@endif" name="curr_type" class="form-control">
            </div>
            <div class="form-group">
              <label for="total_bill">Total Billing (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="total_bill" type="text" value="@if(isset($datas->total_bill)){{ $datas->total_bill }}@else{{ ''}}@endif" name="total_bill" class="form-control">
            </div>
            <div class="form-group">
              <label for="invoice_status">Invoice Status (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <select id="invoice_status" name="invoice_status" class="form-control">
                <option value="">=====>Pilih Invoice Status<=====</option>
                <option @if($datas->invoice_status=='System'){{ 'selected' }}@else{{ '' }}@endif value="System">System</option>
                <option @if($datas->invoice_status=='Manual'){{ 'selected' }}@else{{ '' }}@endif value="Manual">Manual</option>
              </select>
            </div>
            <div class="form-group">
              <label for="print_status">Print Status (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <select id="print_status" name="print_status" class="form-control">
                <option value="">=====>Pilih Print Status<=====</option>
                <option @if($datas->print_status=='SDH CETAK'){{ 'selected' }}@else{{ '' }}@endif value="SDH CETAK">SDH CETAK</option>
                <option @if($datas->print_status=='BELUM CETAK'){{ 'selected' }}@else{{ '' }}@endif value="BELUM CETAK">BELUM CETAK</option>
              </select>
            </div>
            <div class="form-group">
              <label for="print_date">Print Date (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <div class="input-group">
                <input id="input-daterange" type="text" value="@if(isset($datas->print_date)){{ $datas->print_date }}@else{{ ''}}@endif" name="print_date" class="form-control">
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="form-group">
              <label for="mitra_printing">Mitra Printing (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="mitra_printing" type="text" value="@if(isset($datas->mitra_printing)){{ $datas->mitra_printing }}@else{{ ''}}@endif" name="mitra_printing" class="form-control">
            </div>
            <div class="form-group">
              <label for="delivery_date">Delivery Date (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <div class="input-group">
                <input id="input-daterangee" type="text" value="@if(isset($datas->delivery_date)){{ $datas->delivery_date }}@else{{ ''}}@endif" name="delivery_date" class="form-control">
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
            </div>
            <div class="form-group">
              <label for="mitra_delivery">Mitra Delivery (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="mitra_delivery" type="text" value="@if(isset($datas->mitra_delivery)){{ $datas->mitra_delivery }}@else{{ ''}}@endif" name="mitra_delivery" class="form-control">
            </div>
            <div class="form-group">
              <label for="delivery_name">Delivery Name (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="delivery_name" type="text" value="@if(isset($datas->delivery_name)){{ $datas->delivery_name }}@else{{ ''}}@endif" name="delivery_name" class="form-control">
            </div>
            <div class="form-group">
              <label for="keterangan">Keterangan (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="keterangan" type="text" value="@if(isset($datas->keterangan)){{ $datas->keterangan }}@else{{ ''}}@endif" name="keterangan" class="form-control">
            </div>
            <div class="form-group">
              <label for="no_resi">No Resi (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="no_resi" type="text" value="@if(isset($datas->no_resi)){{ $datas->no_resi }}@else{{ ''}}@endif" name="no_resi" class="form-control">
            </div>
            <div class="form-group">
              <label for="status">Status (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="status" type="text" value="@if(isset($datas->status)){{ $datas->status }}@else{{ ''}}@endif" name="status" class="form-control">
            </div>
            <div class="form-group">
              <label for="tanggal">Tanggal (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <div class="input-group">
                <input type="text" id="datetimepicker" value="@if(isset($datas->tanggal)){{ $datas->tanggal }}@else{{ ''}}@endif" name="tanggal" class="form-control">
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
            </div>
            <div class="form-group">
              <label for="jabatan_penerima">Jabatan Penerima (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="jabatan_penerima" type="text" value="@if(isset($datas->jabatan_penerima)){{ $datas->jabatan_penerima }}@else{{ ''}}@endif" name="jabatan_penerima" class="form-control">
            </div>
            <div class="form-group">
              <label for="nama_penerima">Penerima (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="nama_penerima" type="text" value="@if(isset($datas->nama_penerima)){{ $datas->nama_penerima }}@else{{ ''}}@endif" name="nama_penerima" class="form-control">
            </div>
            <input type="hidden" name="id" value="{{ $datas->id }}">
            <div class="form-group" style="text-align: right;">
              <button id="save" type="submit" class="btn btn-primary">Update</button>
            </div>
          </div>
          </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="examplee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: rgb(70 130 180);">
        <h3 class="modal-title" id="exampleModalLongTitle" align="center" style="font-family:sans-serif;color:white;">View Invoice</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="box-body">
      <form id="view-invoice" action="#" method="POST" class="request">
        {{ csrf_field() }}
        <div class="modal-body">
        <div class="col-md-6">
        <div class="form-group">
              <label for="bill_prod">Billing Periode (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="bill_prod" type="text" name="bill_prod" class="form-control" readonly />
            </div>
            <div class="form-group">
              <label for="account">Account (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="account" type="text" name="account" class="form-control" readonly />
            </div>
            <div class="form-group">
              <label for="cust_name">Customer Name (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="cust_name" type="text" name="cust_name" class="form-control" readonly />
            </div>
            <div class="form-group">
              <label for="nipnas">Nipnas (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="nipnas" type="text"  name="nipnas" class="form-control" readonly />
            </div>
            <div class="form-group">
              <label for="divisi">Divisi (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="divisi"  type="text" name="divisi" class="form-control" readonly />
            </div>
            <div class="form-group">
              <label for="aoc">AOC (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="aoc" type="text" name="aoc" class="form-control" readonly />
            </div>
            <div class="form-group">
              <label for="curr_type">Curr Type (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="curr_type" type="text"  name="curr_type" class="form-control" readonly />
            </div>
            <div class="form-group">
              <label for="total_bill">Total Billing (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="total_bill" type="text" name="total_bill" class="form-control" readonly />
            </div>
             <div class="form-group">
              <label for="invoice_status">Invoice Status (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="invoice_status" type="text" name="invoice_status" class="form-control" readonly />
            </div>
             <div class="form-group">
              <label for="print_status">Print Status (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="print_status" type="text" name="print_status" class="form-control" readonly />
            </div>
            <div class="form-group">
              <label for="print_date">Print Date (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="print_date" type="text" name="print_date" class="form-control" readonly />
            </div>
          </div>
        <div class="col-md-6">
            <div class="form-group">
              <label for="mitra_printing">Mitra Printing (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="mitra_printing" type="text" name="mitra_printing" class="form-control" readonly />
            </div>
            <div class="form-group">
              <label for="delivery_date">Delivery Date (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="delivery_date" type="text" name="delivery_date" class="form-control" readonly />
            </div>            
            <div class="form-group">
              <label for="mitra_delivery">Mitra Delivery (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="mitra_delivery" type="text" name="mitra_delivery" class="form-control" readonly />
            </div>
            <div class="form-group">
              <label for="delivery_name">Delivery Name (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="delivery_name" type="text" name="delivery_name" class="form-control" readonly />
            </div>
            <div class="form-group">
              <label for="keterangan">Keterangan (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="keterangan" type="text"  name="keterangan" class="form-control" readonly />
            </div>
            <div class="form-group">
              <label for="no_resi">No Resi (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="no_resi" type="text"  name="no_resi" class="form-control" readonly />
            </div>
            <div class="form-group">
              <label for="status">Status (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="status" type="text"  name="status" class="form-control" readonly />
            </div>
            <div class="form-group">
              <label for="tanggal">Tanggal (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="tanggal" type="text" name="tanggal" class="form-control" readonly />
            </div>
            <div class="form-group">
              <label for="jabatan_penerima">Keterangan (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="jabatan_penerima" type="text" name="jabatan_penerima" class="form-control" readonly />
            </div>
            <div class="form-group">
              <label for="nama_penerima">Penerima (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="nama_penerima" type="text" name="penerima" class="form-control" readonly />
            </div>
            <div class="form-group">
              <label for="updated_at">Last Refresh (<i style="color: red;" class="fa fa-asterisk"></i>)</label>
              <input id="updated_at" type="text" name="updated_at" class="form-control" readonly />
            </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        <input type="hidden" name="id" id="idd">
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts-edit-invoice')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

  <!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
  <!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
  <!-- <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
  
<script type="text/javascript">
    $(function(){
    $('#datetimepicker').datetimepicker({format: 'M/D/YYYY HH:mm:ss A'});
  })
    $(document).ready( function () {
      $('#input-daterange').datepicker({
      todayBtn:'linked',
      format:'m/d/yyyy',
      
      autoclose:true
      });

      $('#input-daterangee').datepicker({
      todayBtn:'linked',
      format:'m/d/yyyy',
      autoclose:true
      });

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
        url: 'data-invoice-id/'+id,
        dataType: 'json',
        success: function (datas) {
          console.log(datas);
          $('#bill_prod').val(datas[0].bill_prod);
          $('#account').val(datas[0].account);
          $('#cust_name').val(datas[0].cust_name);
          $('#nipnas').val(datas[0].nipnas);
          $('#divisi').val(datas[0].divisi);
          $('#aoc').val(datas[0].aoc);
          $('#curr_type').val(datas[0].curr_type);
          $('#total_bill').val(datas[0].total_bill);
          $('#invoice_status').val(datas[0].invoice_status);
          $('#print_status').val(datas[0].print_status);
          $('#print_date').val(datas[0].print_date);
          $('#mitra_printing').val(datas[0].mitra_printing);
          $('#delivery_date').val(datas[0].delivery_date);
          $('#mitra_delivery').val(datas[0].mitra_delivery);
          $('#delivery_name').val(datas[0].delivery_name);
          $('#keterangan').val(datas[0].keterangan);
          $('#no_resi').val(datas[0].no_resi);
          $('#status').val(datas[0].status);
          $('#tanggal').val(datas[0].tanggal);
          $('#jabatan_penerima').val(datas[0].jabatan_penerima);
          $('#nama_penerima').val(datas[0].nama_penerima);
          $('#example').modal('show');
            // console.log(datas.mitra_name);

          },error:function(){
           console.log(datas);
         }
       });
    });
</script>
<script type="text/javascript">
  $(document).on('click','#view_data',function(){
      $('#hide').show();
      var id = $(this).val();
      $('#idd').val(id);
      console.log(id)
      $.ajax({
        type: 'GET', //THIS NEEDS TO BE GET
        url: 'view-invoice-id/'+id,
        dataType: 'json',
        success: function (data) {
          console.log(data);
          $('#bill_prod').val(data.bill_prod);
          $('#account').val(data.account);
          $('#cust_name').val(data.cust_name);
          $('#nipnas').val(data.nipnas);
          $('#divisi').val(data.divisi);
          $('#aoc').val(data.aoc);
          $('#curr_type').val(data.curr_type);
          $('#total_bill').val(data.total_bill);
          $('#invoice_status').val(data.invoice_status);
          $('#print_status').val(data.print_status);
          $('#print_date').val(data.print_date);
          $('#mitra_printing').val(data.mitra_printing);
          $('#delivery_date').val(data.delivery_date);
          $('#mitra_delivery').val(data.mitra_delivery);
          $('#delivery_name').val(data.delivery_name);
          $('#keterangan').val(data.keterangan);
          $('#no_resi').val(data.no_resi);
          $('#status').val(data.status);
          $('#tanggal').val(data.tanggal);
          $('#jabatan_penerima').val(data.jabatan_penerima);
          $('#nama_penerima').val(data.nama_penerima);
          $('#updated_at').val(data.updated_at);
          $('#example').modal('show');
            // console.log(data.mitra_name);

          },error:function(){
           console.log(data);
         }
       });
    });
</script>
@endsection

