@extends('layouts.app')

@section('dashboard')
Data Request BA bulan {{date('M Y')}}
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
                    <th nowrap>kesesuaian npwp</th>
                    <th nowrap>no npwp</th>
                    <th nowrap>nama npwp</th>
                    <th nowrap>alamat npwp</th>
                    <th nowrap>no npwp2</th>
                    <th nowrap>nama npwp2</th>
                    <th nowrap>alamat npwp2</th>
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
                    <th nowrap>jumlah BA</th>
                    <th nowrap>request by</th>
                    <th nowrap>request date</th>
                  </tr>
                </thead>
                <tbody>
                  @php $no = 1; @endphp
                  @foreach($data as $datas)
                  <tr>
                    <td nowrap>{{ $no++ }}</td>
                    <td nowrap>
                      <button class="btn btn-warning" id="create_billing" value="{{ $datas->id }}" <?php if($datas->status=='PROCESS BA'){ ?> disabled <?php } ?> >
                        <i class="fa fa-edit"></i>
                      </button>
                    </td>
                    <td nowrap>{{ $datas->id_req }}</td>
                    <td nowrap>{{ $datas->id_project }}</td>
                    <td nowrap>{{ $datas->jenis }}</td>
                    <td nowrap>{{ $datas->kesesuaian_npwp }}</td>
                    <td nowrap>{{ $datas->no_npwp }}</td>
                    <td nowrap>{{ $datas->nama_npwp }}</td>
                    <td nowrap>{{ $datas->alamat_npwp }}</td>
                    <td nowrap>{{ $datas->no_npwp2 }}</td>
                    <td nowrap>{{ $datas->nama_npwp2 }}</td>
                    <td nowrap>{{ $datas->alamat_npwp2 }}</td>
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
                    <td nowrap>{{ $datas->jumlah_ba }}</td>
                    <td nowrap>{{ $datas->request_by }}</td>
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
      <form id="proses-ba-epic" action="{{ route('proses-ba-epic') }}" method="POST" class="request">
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
            <label for="kesesuaian_npwp">kesesuaian NPWP </label>
            <input id="kesesuaian_npwp" type="text" name="kesesuaian_npwp" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="no_npwp">Nomor NPWP </label>
            <input id="no_npwp" type="text" name="no_npwp" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="nama_npwp">Nama NPWP </label>
            <input id="nama_npwp" type="text" name="nama_npwp" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="alamat_npwp">Alamat NPWP </label>
            <input id="alamat_npwp" type="text" name="alamat_npwp" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="no_npwp2">Nomor NPWP2 </label>
            <input id="no_npwp2" type="text" name="no_npwp2" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="nama_npwp2">Nama NPWP2 </label>
            <input id="nama_npwp2" type="text" name="nama_npwp2" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="alamat_npwp2">Alamat NPWP2 </label>
            <input id="alamat_npwp2" type="text" name="alamat_npwp2" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="kecamatan_npwp">Kecamatan NPWP </label>
            <input id="kecamatan_npwp" type="text" name="kecamatan_npwp" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="kota_npwp">Kota NPWP </label>
            <input id="kota_npwp" type="text" name="kota_npwp" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="provinsi_npwp">Provinsi NPWP </label>
            <input id="provinsi_npwp" type="text" name="provinsi_npwp" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="latitude_npwp">LATITUDE NPWP </label>
            <input id="latitude_npwp" type="text" name="latitude_npwp" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="longitude_npwp">LONGITUDE NPWP </label>
            <input id="longitude_npwp" type="text" name="longitude_npwp" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="alamat_tagihan">Alamat Tagihan </label>
            <input id="alamat_tagihan" type="text" name="alamat_tagihan" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="kecamatan_tagihan">Kecamatan Tagihan </label>
            <input id="kecamatan_tagihan" type="text" name="kecamatan_tagihan" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="kota_tagihan">Kota Tagihan </label>
            <input id="kota_tagihan" type="text" name="kota_tagihan" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="provinsi_tagihan">Provinsi Tagihan </label>
            <input id="provinsi_tagihan" type="text" name="provinsi_tagihan" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="latitude_tagihan">LATITUDE TAGIHAN </label>
            <input id="latitude_tagihan" type="text" name="latitude_tagihan" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="longitude_tagihan">LONGITUDE TAGIHAN </label>
            <input id="longitude_tagihan" type="text" name="longitude_tagihan" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="main_phone">Main Phone </label>
            <input id="main_phone" type="text" name="main_phone" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="segmen">SEGMEN </label>
            <input id="segmen" type="text" name="segmen" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="sub_segmen">SUB_SEGMEN </label>
            <input id="sub_segmen" type="text" name="sub_segmen" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="region_bill">REGION BILL </label>
            <input id="region_bill" type="text" name="region_bill" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="pic_pelanggan">PIC PELANGGAN </label>
            <input id="pic_pelanggan" type="text" name="pic_pelanggan" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="telp_pic">Telpon PIC </label>
            <input id="telp_pic" type="text" name="telp_pic" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="email">Email </label>
            <input id="email" type="email" name="email" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="job_title">JOB TITLE </label>
            <input id="job_title" type="text" name="job_title" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="workphone">WORKPHONE </label>
            <input id="workphone" type="text" name="workphone" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="top">TOP </label>
            <input id="top" type="text" name="top" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="currency">CURRENCY </label>
            <input id="currency" type="text" name="currency" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="other_currency">OTHER CURRENCY </label>
            <input id="other_currency" type="text" name="other_currency" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="bp_type">BP TYPE </label>
            <input id="bp_type" type="text" name="bp_type" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="vat">VAT </label>
            <input id="vat" type="text" name="vat" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="ppn">PPN </label>
            <input id="ppn" type="text" name="ppn" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="payment_method">PAYMENT METHOD </label>
            <input id="payment_method" type="text" name="payment_method" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="bill_type">BILL TYPE </label>
            <input id="bill_type" type="text" name="bill_type" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="frequency">FREQUENCY </label>
            <input id="frequency" type="text" name="frequency" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="bill_media">BILL MEDIA </label>
            <input id="bill_media" type="text" name="bill_media" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="payment_duedate">PAYMENT DUEDATE </label>
            <input id="payment_duedate" type="text" name="payment_duedate" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="main_phone_pic">MAIN PHONE PIC </label>
            <input id="main_phone_pic" type="text" name="main_phone_pic" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="status">Status </label>
            <input id="status" type="text" name="status" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="keterangan">KETERANGAN </label>
            <input id="keterangan" type="text" name="keterangan" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="jumlah_ba">JUMLAH BA </label>
            <input id="jumlah_ba" type="text" name="jumlah_ba" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label for="request_by">REQUEST BY </label>
            <input id="request_by" type="text" name="request_by" class="form-control" readonly="">
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button id="save" type="submit" class="btn btn-primary">Process BA</button>
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
</script>
<script type="text/javascript">
    $(document).ready(function() {
      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });
    });
</script>
<script type="text/javascript">
  $(document).on('click','#create_billing',function(){
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
          $('#no_npwp').val(data.no_npwp);
          $('#nama_npwp').val(data.nama_npwp);
          $('#alamat_npwp').val(data.alamat_npwp);
          $('#kesesuaian_npwp').val(data.kesesuaian_npwp);
          $('#no_npwp2').val(data.no_npwp2);
          $('#nama_npwp2').val(data.nama_npwp2);
          $('#alamat_npwp2').val(data.alamat_npwp2);
          $('#kecamatan_npwp').val(data.kecamatan_npwp);
          $('#kota_npwp').val(data.kota_npwp);
          $('#provinsi_npwp').val(data.provinsi_npwp);
          $('#latitude_npwp').val(data.latitude_npwp);
          $('#longitude_npwp').val(data.longitude_npwp);
          $('#alamat_tagihan').val(data.alamat_tagihan);
          $('#kecamatan_tagihan').val(data.kecamatan_tagihan);
          $('#kota_tagihan').val(data.kota_tagihan);
          $('#provinsi_tagihan').val(data.provinsi_tagihan);
          $('#latitude_tagihan').val(data.latitude_tagihan);
          $('#longitude_tagihan').val(data.longitude_tagihan);
          $('#main_phone').val(data.main_phone);
          $('#segmen').val(data.segmen);
          $('#sub_segmen').val(data.sub_segmen);
          $('#region_bill').val(data.region_bill);
          $('#pic_pelanggan').val(data.pic_pelanggan);
          $('#telp_pic').val(data.telp_pic);
          $('#email').val(data.email);
          $('#job_title').val(data.job_title);
          $('#workphone').val(data.workphone);
          $('#top').val(data.top);
          $('#currency').val(data.currency);
          $('#other_currency').val(data.other_currency);
          $('#bp_type').val(data.bp_type);
          $('#vat').val(data.vat);
          $('#ppn').val(data.ppn);
          $('#payment_method').val(data.payment_method);
          $('#bill_type').val(data.bill_type);
          $('#frequency').val(data.frequency);
          $('#bill_media').val(data.bill_media);
          $('#payment_duedate').val(data.payment_duedate);
          $('#main_phone_pic').val(data.main_phone_pic);
          $('#status').val(data.status);
          $('#keterangan').val(data.keterangan);
          $('#jumlah_ba').val(data.jumlah_ba);
          $('#request_by').val(data.request_by);
          $('#account_num').val(data.account_num);
          $('#site').val(data.site);
          $('#example').modal('show');

          },error:function(){
           console.log(data);
         }
       });
    });
</script>
@endsection

