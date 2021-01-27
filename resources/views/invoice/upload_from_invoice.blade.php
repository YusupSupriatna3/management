@extends('layouts.app')

@section('dashboard')
Invoice
<small>Upload From Excel</small>
@endsection

@section('breadcrumb')
<li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active"><a href="{{ route('format-invoice') }}"><u title="Klik di sini untuk format upload by excel">Format Excel</u></a></li>
@endsection
<style type="text/css">
  form .error {
  color: #ff0000;
}
</style>
@section('content')
<!-- Form Search Data -->
<div class="row">
  <div class="col-md-6">
    <div class="box box-primary" style="background-color: #265a88;">
      <div class="box-header with-border">
        <h3 class="box-title" style="color: white;">Upload From Excel</h3>
      </div>
      <form action="{{ route('excel-invoice') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="box-body">
          <div class="form-group">
            <input type="file" name="importInvoice" class="form-control">
          </div>
          <div class="form-group">
            <button id="save" type="submit" class="btn btn-primary">Upload</button>
          </div>
        </div>
      </form>
      </form>
    </div>
  </div>
  <div class="col-md-6">
    <div class="box box-primary" style="background-color: #265a88;">
      <div class="box-header with-border">
      <h3 class="box-title" style="color: white;">Tata Cara Upload</h3>
      </div>
        <div class="box-body" style="color: white;">
          <span>1.</span><br>
          <span>2.</span>
        </div>
    </div>
  </div>
</div>
<!-- End Form  Search Data -->
@endsection

@section('scripts')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
<!-- <script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script> -->
<!-- <script type="text/javascript">
$(function() {
  $("form[name='form-search']").validate({
    rules: {
      no_akun: "required"
    },
    messages: {
      no_akun: "Please enter your account"
    },
    submitHandler: function(form) {
      form.submit();
    }
  });
});

</script> -->
@endsection
