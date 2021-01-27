@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
  
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 50
    });

} );
  $(document).ready( function () {
          $('select').selectize({
          // sortField: 'text'
        });
  });
  
</script>


@stop
@extends('layouts.app')
@section('dashboard')
Export Pembayaran AP
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="box">
  
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
      </div>
<!-- end -->  
      
{!! Form::open(['url' => route('export.paymentneed.post'), 'method' => 'post']) !!}
<div class="box-body" style="margin-right:100px;">
                      <div class="form-group">
                        <label class="col-md-4 control-label">NOMOR KL</label>
                          <div class="col-md-6">
                            <select id="nomorkl" name="nomorkl" class="form-control select2" placeholder="PILIH NOMOR KL">
                              <option value="">PILIH NOMOR KL</option>
                              @foreach($nomorkls as $kl)
                                <option value="{{ $kl->nomor_kl }}">{{ $kl->nomor_kl }}</option>
                              @endforeach
                            </select>
                          </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-4 control-label">TANGGAL RC</label>
                          <div class="col-md-6">
                            <select id="tanggalrc" name="tanggalrc" class="form-control select2" placeholder="PILIH TANGGAL RC">
                              <option value="">PILIH TANGGAL RC</option>
                              @foreach($tanggals as $tgl)
                                <option value="{{ $tgl->date_rc }}">{{ $tgl->date_rc }}</option>
                              @endforeach
                            </select>
                          </div>
                      </div>

                      <div class="form-group has-feedback{!! $errors->has('type') ? 'has-error' : '' !!}">
                      <div class="col-md-4 control-label">
                        {!! Form::label('type', 'Jenis Output') !!}
                      </div>
                        <div class="col-md-6">
                          <div class="radio">
                            <label>{{ Form::radio('type', 'pdf', true) }} PDF</label>
                          </div>
                            {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
                        </div>
                      </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                      <label class="col-md-4 control-label">&nbsp;</label>
                        <div class="col-md-4">
                          {!! Form::submit('Download', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
 

      
</div>
    </section>
    <!-- /.content -->
  </div>
@endsection