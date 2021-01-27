@extends('layouts.app')

@section('dashboard')
Data Invoice
<small></small>
@endsection

@section('breadcrumb')
<li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Data Invoice</li>
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
      <form id="form-search" name="form-search" action="{{ route('search-invoice') }}" method="GET" class="form-horizontal">
        {{ csrf_field() }}
        <div class="box-body" style="margin-right:100px;">
          <div class="row">
            <div class="form-group">
             <label class="col-md-2 control-label" style="color: white;"></label>
              <div class="col-md-2">
                <select class="invoice-cari form-control select2" name="no_akun">
                </select>
              </div>
              <div class="col-md-2">
                <select class="bp_number form-control select2" name="bp_number" id="bp_number">
                </select>
              </div>
              <div class="col-md-3">
                <select class="cus_name form-control select2" name="cus_name" id="cus_name">
                </select>
              </div>
              <label class="col-md-1 control-label">&nbsp;</label>
              <div class="col-md-2">
                <button type="submit" id="cari_invoice" class="btn btn-warning btn-sm btn-block"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Cari</button>
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
        <span  style="color: white;">Nama Customer &nbsp&nbsp&nbsp&nbsp : {{ $data[0]->customer_name }}</span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <span  style="color: white;">Nomor Account &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : {{ $data[0]->account_number }}</span><br>
      </div>
      <div style="overflow-x:auto;">
        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
          <div class="row">
            <div class="col-sm-12">
              <table id="ttable_id" class="table table-responsive" style="font-size:12px">
                <thead style="background-color: #ffc107;">
                  <tr><th nowrap>PERIODE</th>
                      <th nowrap>MATA UANG</th>
                      <th nowrap>JUMLAH TAGIHAN</th>
                      <th nowrap>BELUM BAYAR</th>
                      <th nowrap>TANGGAL</th>
                      <th nowrap>KODE</th>
                      <th nowrap>NILAI</th>
                      <th nowrap style="text-align: center;">INVOICE</th>
                      <th nowrap style="text-align: center;">DELIVERY</th>
                  </tr>
                </thead>
                <tbody>
                  @php $no = 1; @endphp
                  @foreach($data as $datas)
                  <tr>
                      <td nowrap>{{ $datas->cl_period }}</td>
                      <td nowrap>{{ $datas->mata_uang }}</td>
                      <td nowrap style="text-align: right;">{{ number_format($datas->bill_lcamount) }}</td>
                      <td nowrap style="text-align: right;">{{ number_format($datas->belum_bayar) }}</td>
                      <td nowrap>{{ $datas->tanggal }}</td>
                      <td nowrap style="text-align: center;">{{ $datas->invoice_status }}</td>
                      <td nowrap style="text-align: right;">{{ number_format($datas->nilai_custome) }}</td>
                      <td nowrap style="text-align: center;"><button class="btn btn-success" title="Edit Status Invoice"><i class="fa fa-edit" style="font-size:12px"><a href="{{route('invoice-edit', $datas->id)}}" style="color:white">Edit</a></i></button>&nbsp<button class="btn btn-success" id="view_invoice" value="{{ $datas->id }}" title="View Status Invoice untuk APi"><i class="fa fa-file" style="font-size:12px">View</i></button></td>
                      <td nowrap ><button class="btn btn-success" title="Edit Pickup"><i class="fa fa-edit" style="font-size:12px"><a href="{{route('invoice-edit-pickup', $datas->id)}}" style="color:white">Pickup</a></i></button>&nbsp<button class="btn btn-success" title="Edit Status Delivery"><i class="fa fa-edit" style="font-size:12px"><a href="{{route('invoice-edit-kirim', $datas->id)}}" style="color:white">Kirim</a></i></button>&nbsp<button class="btn btn-success" id="view_invoice" value="{{ $datas->id }}" title="View Status Invoice"><i class="fa fa-file" style="font-size:12px">Lacak</i></button></td>
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
@endsection

@section('scripts')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
<script type="text/javascript">
    $(function(){
   

    //   $('select').selectize({
    // // sortField: 'text'
    //   });   
    });
    // select2(
    //     '.ri-form-group .sku1-data',
    //     '.ri-form-group .sku2-data',
    //     '.ri-form-group .basic-multiple'
    // );

    
    $(document).ready(function(){
        $('.invoice-cari').select2({
            placeholder: 'Cari account number...',
            ajax    : {
            url     : "{{ route('get-akun-bpnumber-cc') }}",
            dataType: 'json',
            delay   : 250,
            // multiple: true,
            processResults: function (data) {
                return {
                    results:  $.map(data.data, function (item) {
                        return {
                            text    : item.account_number,
                            id      : item.account_number
                        }
                    })
                    };
                },
            cache: true
            }
        });

        $('.bp_number').select2({
            placeholder: 'Cari bp number...',
            ajax    : {
            url     : "{{ route('get-akun-bpnumber-cc') }}",
            dataType: 'json',
            delay   : 250,
            // multiple: true,
            processResults: function (data) {
                return {
                    results:  $.map(data.data, function (item) {
                        return {
                            text    : item.bpnumber,
                            id      : item.bpnumber
                        }
                    })
                    };
                },
            cache: true
            }
        });

        $('.cus_name').select2({
            placeholder: 'Cari customer name...',
            ajax    : {
            url     : "{{ route('get-akun-bpnumber-cc') }}",
            dataType: 'json',
            delay   : 250,
            // multiple: true,
            processResults: function (data) {
                return {
                    results:  $.map(data.data, function (item) {
                        return {
                            text    : item.customer_name,
                            id      : item.customer_name
                        }
                    })
                    };
                },
            cache: true
            }
        });            
    })
</script>
@endsection

