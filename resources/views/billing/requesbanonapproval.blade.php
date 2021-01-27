@extends('layouts.app')

@section('dashboard')
Data Request BA Not Approved
<small></small>
@endsection

@section('breadcrumb')
<li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Data Request BA Not Approved</li>
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

<!-- End Form  Search Data -->
<!-- View Table NPK -->
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary" style="background-color: #265a88;">
      <div class="box-header with-border">
        <!-- <h3 class="box-title pull-left"><button id="tambah_kl" class="btn btn-success btn-sm btn-block"><span style="color: red;" class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah KL Baru</button></h3>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<h3 class="box-title"><a href="{{ route('export-excel') }}"><button id="download_kl" class="btn btn-success btn-sm btn-block"><span style="color: red;" class="glyphicon glyphicon-download" aria-hidden="true"></span> Download To Excel</button></a></h3>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<h3 class="box-title"><button id="upload" class="btn btn-success btn-sm btn-block"><span style="color: red;" class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload From Excel</button></h3>
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<h3 class="box-title"><button id="surat_pernyataan" class="btn btn-success btn-sm btn-block"><span style="color: red;" class="glyphicon glyphicon-download" aria-hidden="true"></span> Surat Pernyataan Pembayaran</button></h3>
        <h3 class="box-title pull-right"><a href="{{ route('data-npk') }}"><button id="refresh" class="btn btn-primary btn-sm btn-block"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Refresh</button></a></h3> -->
      </div>
      <div style="overflow-x:auto;">
        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
          <div class="row">
            <div class="col-sm-12">
              <table id="ttable_id" class="table table-responsive">
                <thead>
                  <tr>
                    <th nowrap>No</th>
                    <th nowrap>id req</th>
                    <th nowrap>no npwp</th>
                    <th nowrap>alamat npwp</th>
                    <th nowrap>kecamatan npwp</th>
                    <th nowrap>kota npwp</th>
                    <th nowrap>provinsi npwp</th>
                    <th nowrap>latitude npwp</th>
                    <th nowrap>longitude npwp</th>
                    <th nowrap>alamat tagihan</th>
                    <th nowrap>kecamatan tagihan</th>
                    <th nowrap>kota tagihan</th>
                    <th nowrap>provinsi tagihan</th>
                    <th nowrap>latitude tagihan</th>
                    <th nowrap>longitude tagihan</th>
                    <th nowrap>main phone</th>
                    <th nowrap>segmen</th>
                    <th nowrap>sub segmen</th>
                    <th nowrap>region bill</th>
                    <th nowrap>pic pelanggan</th>
                    <th nowrap>telp pic</th>
                    <th nowrap>email</th>
                    <th nowrap>job title</th>
                    <th nowrap>workphone</th>
                    <th nowrap>top</th>
                    <th nowrap>currency</th>
                    <th nowrap>other currency</th>
                    <th nowrap>bp type</th>
                    <th nowrap>vat</th>
                    <th nowrap>ppn</th>
                    <th nowrap>payment method</th>
                    <th nowrap>bill type</th>
                    <th nowrap>frequency</th>
                    <th nowrap>bill media</th>
                    <th nowrap>payment duedate</th>
                    <th nowrap>main phone pic</th>
                    <th nowrap>keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  @php $no = 1; @endphp
                  @foreach($data as $datas)
                  <tr>
                    <td nowrap>{{ $no++ }}</td>
                    <td nowrap>{{ $datas->id_req }}</td>
                    <td nowrap>{{ $datas->no_npwp }}</td>
                    <td nowrap>{{ $datas->alamat_npwp }}</td>
                    <td nowrap>{{ $datas->kecamatan_npwp }}</td>
                    <td nowrap>{{ $datas->kota_npwp }}</td>
                    <td nowrap>{{ $datas->provinsi_npwp }}</td>
                    <td nowrap>{{ $datas->latitude_npwp }}</td>
                    <td nowrap>{{ $datas->longitude_npwp }}</td>
                    <td nowrap>{{ $datas->alamat_tagihan }}</td>
                    <td nowrap>{{ $datas->kecamatan_tagihan }}</td>
                    <td nowrap>{{ $datas->kota_tagihan }}</td>
                    <td nowrap>{{ $datas->provinsi_tagihan }}</td>
                    <td nowrap>{{ $datas->latitude_tagihan }}</td>
                    <td nowrap>{{ $datas->longitude_tagihan }}</td>
                    <td nowrap>{{ $datas->main_phone }}</td>
                    <td nowrap>{{ $datas->segmen }}</td>
                    <td nowrap>{{ $datas->sub_segmen }}</td>
                    <td nowrap>{{ $datas->region_bill }}</td>
                    <td nowrap>{{ $datas->pic_pelanggan }}</td>
                    <td nowrap>{{ $datas->telp_pic }}</td>
                    <td nowrap>{{ $datas->email }}</td>
                    <td nowrap>{{ $datas->job_title }}</td>
                    <td nowrap>{{ $datas->workphone }}</td>
                    <td nowrap>{{ $datas->top }}</td>
                    <td nowrap>{{ $datas->currency }}</td>
                    <td nowrap>{{ $datas->other_currency }}</td>
                    <td nowrap>{{ $datas->bp_type }}</td>
                    <td nowrap>{{ $datas->vat }}</td>
                    <td nowrap>{{ $datas->ppn }}</td>
                    <td nowrap>{{ $datas->payment_method }}</td>
                    <td nowrap>{{ $datas->bill_type }}</td>
                    <td nowrap>{{ $datas->frequency }}</td>
                    <td nowrap>{{ $datas->bill_media }}</td>
                    <td nowrap>{{ $datas->payment_duedate }}</td>
                    <td nowrap>{{ $datas->main_phone_pic }}</td>
                    <td nowrap>{{ $datas->keterangan }}</td>
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
@endsection

@section('scripts')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
@endsection
