@extends('layouts.app')

@section('dashboard')
   Edit User
@endsection



@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                </div>
                <!-- /.box-header -->
                {!! Form::model($member, ['url' => route('members.update', $member->id), 'method' => 'put', 'files' => 'true']) !!}
                    @include('members._form')
                {!! Form::close() !!}
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection
