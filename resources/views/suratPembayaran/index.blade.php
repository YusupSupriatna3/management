@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
<style type="text/css">
  label{
    color: white;
  }
</style>

<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 50
    });

  } );
  if ($("#customerform").length > 0) {
    $("#customerform").validate({

      rules: {
        paymentid: {
          required: true,
          maxlength: 50
        },
        periode: {
          required: true,
          maxlength: 6
        },  
      },
      messages: {

        paymentid: {
          required: "Please enter paymentid",
          maxlength: "Your last paymentid maxlength should be 50 characters long."
        },
        periode: {
          required: "Please enter periode",
          maxlength: "Your last periode maxlength should be 6 characters long."
        },
        
      },
    })
  }
  $(document).ready( function () {
    $('select').selectize({
          // sortField: 'text'
        });
  });

  $('#mgr_name').on('change', function() {
    if(this.value == 'IRMA SILVIA ADYATINI'){
      $("#nik").val("770085");
      $("#segmen").val("A");
    }else if(this.value == 'MHM. THOHIRUN'){
      $("#nik").val("740239");
      $("#segmen").val("B");
    }else{
      $("#nik").val("720049");
      $("#segmen").val("C");
    }
  });
  
</script>
@stop
@extends('layouts.app')
@section('dashboard')
Create Surat Pembayaran
@endsection
@section('content')
<!-- Main content -->
<section class="content">
  <div class="box" style="background-color: #265a88;">

    <!-- /.box-header -->
    <div class="box-body">
      <!-- end -->  
      <form action="{{ route('cetak-surat-pembayaran') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        <div class="box-body" style="margin-right:100px;">
          <div class="row">
            <div class="form-group">
              <label class="col-md-4 control-label">NAMA CUSTOMER</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="customer_name" placeholder="NAMA CUSTOMER" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label">AKUN</label>
              <div class="col-md-6">
                <input id="search" type="text" class="form-control" name="account" placeholder="INPUT ACCOUNT" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label">NAMA MANAGER</label>
              <div class="col-md-6">
                <select id="mgr_name" name="mgr_name" class="form-control select2" placeholder="NAMA MANAGER">
                  <option value="">NAMA MANAGER</option>
                  <option value="IRMA SILVIA ADYATINI">IRMA SILVIA ADYATINI</option>
                  <option value="MHM. THOHIRUN">MHM. THOHIRUN</option>
                  <option value="GAMYA RIZKI">GAMYA RIZKI</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label">NIK</label>
              <div class="col-md-6">
                <input type="text" id="nik" class="form-control" name="nik" placeholder="NIK" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label">SEGMEN</label>
              <div class="col-md-6">
                <input type="text" id="segmen" class="form-control" name="segmen" placeholder="SEGMEN" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label">PERIODE AWAL</label>
              <div class="col-md-6">
                <select id="periodecari" name="periode1" class="form-control select2" placeholder="PILIH BILL_PERIOD">
                  <option value="">PILIH BILL_PERIOD</option>
                  @foreach($periode as $dat)
                  <option value="{{ $dat->nper }}" required>{{ $dat->nper }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label">PERIODE AKHIR</label>
              <div class="col-md-6">
                <select name="periode2" class="form-control select2" placeholder="PILIH BILL_PERIOD">
                  <option value="">PILIH BILL_PERIOD</option>
                  @foreach($periode as $dat)
                  <option value="{{ $dat->nper }}" required>{{ $dat->nper }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label">&nbsp;</label>
              <div class="col-md-3">
                <button type="submit" name="pdf" value="pdf" class="btn btn-danger btn-sm btn-block"><span class="glyphicon glyphicon-download" aria-hidden="true"></span> Print To PDF</button>
              </div>
              <div class="col-md-3">
                <button type="submit" name="excel" value="excel" class="btn btn-success btn-sm btn-block"><span class="glyphicon glyphicon-download" aria-hidden="true"></span> Print To Excel</button>
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- /.box-body -->
    </div>
  </section>
  <!-- /.content -->
</div>
@endsection