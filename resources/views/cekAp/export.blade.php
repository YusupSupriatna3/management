@extends('layouts.app')

@section('dashboard')
    Export Pembayaran AP
@endsection

@section('breadcrumb')
   <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
   <li><a href="{{ url('/cekAp') }}">cekap</a></li>
   <li class="active">Export cekap</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
              </div>
                <!-- /.box-header -->
                {!! Form::open(['url' => route('export.cekAp.post'), 'method' => 'post']) !!}
                    <div class="box-body">
                        <div class="form-group has-feedback{{ $errors->has('periode') ? ' has-error' : '' }}">
                            {!! Form::label('periode', 'periode') !!}

                            {!! Form::text('periode', null, ['class' => 'form-control', 'placeholder' => 'periode']) !!}
                            {!! $errors->first('periode', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group has-feedback{{ $errors->has('account') ? ' has-error' : '' }}">
                            {!! Form::label('account', 'account') !!}

                            {!! Form::text('account', null, ['class' => 'form-control', 'placeholder' => 'account']) !!}
                            {!! $errors->first('account', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group has-feedback{!! $errors->has('type') ? 'has-error' : '' !!}">
                            {!! Form::label('type', 'Pilih Output') !!}

                            <div class="radio">
                                <label>
                                    {{ Form::radio('type', 'xls', true) }} Excel
                                </label>
                            </div>
                            {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        {!! Form::submit('Download', ['class' => 'btn btn-primary']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection
