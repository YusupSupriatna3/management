@extends('layouts.app')

@section('dashboard')
    Export Pembayaran AP
@endsection

@section('breadcrumb')
   <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
   <li><a href="{{ url('/paymentneed') }}">paymentneed</a></li>
   <li class="active">Export paymentneed</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
              </div>
                <!-- /.box-header -->
                {!! Form::open(['url' => route('export.paymentneed.post'), 'method' => 'post']) !!}
                    <div class="box-body">
                        <div class="form-group has-feedback{{ $errors->has('paymentid') ? ' has-error' : '' }}">
                            {!! Form::label('paymentid', 'paymentid') !!}

                            {!! Form::text('paymentid', null, ['class' => 'form-control', 'placeholder' => 'Input paymentid']) !!}
                            {!! $errors->first('paymentid', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group has-feedback{!! $errors->has('type') ? 'has-error' : '' !!}">
                            {!! Form::label('type', 'Pilih Output') !!}

                            <div class="radio">
                                <label>
                                {{ Form::radio('type', 'pdf', true) }} PDF
                                </label>
                            </div>
                            {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        {!! Form::submit('Download', ['class' => 'btn btn-primary glyphicon glyphicon-download']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection
