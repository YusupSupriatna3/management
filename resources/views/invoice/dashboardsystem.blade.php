@extends('layouts.app')

@section('google_fonts')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<style type="text/css">
    table tr th{
      background-color: #265a88;
      color: white;
    }
    table tr td{
      background-color: #265a88;
      color: white;
    }
    label,span{
        color: white;
    }
    #TableMitra_info{
        color: white;
    }
    select, input{
        color: black;
    }
    a#mitra_color{
        color: white;
    }
</style>

@endsection

@section('dashboard')
Dashboard
<small>Admin Master</small>
@endsection

@section('breadcrumb')
<li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Dashboard Invoice System</li>
@endsection
<style type="text/css">
  /*th {
  color: #FFFFFF;   
  }
  td {
    color: #FFFFFF;
    }*/
</style>

@section('content')
    <section class="content">
        <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box" style="background-color: #3c8dbc;">
                        <h4 class="small-box-footer" style="color: white;font-family: serif; background-color: #ffc107;">INVOICE SYSTEM</h4>
                        <div class="inner">
                            <h4 style="color: white;font-family: serif;">INVOICE : {{ $jumsystem[0]->jumlah_lcamount }}</h4>
                            <h4 style="color: white;font-family: serif;">IDR {{ number_format($system[0]->bill_lcamount) }}</h4>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file" style="margin-top: 15px;font-size: 80px;"></i>
                        </div>
                        <a href="{{ route('dashboard-invoice-system') }}" class="small-box-footer" style="color: white;font-family: serif;">Details</a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box" style="background-color: #3c8dbc;">
                        <h4 class="small-box-footer" style="color: white;font-family: serif; background-color: #ffc107;">CETAK POSINDO</h4>
                        <div class="inner">
                            <h4 style="color: white;font-family: serif;">INVOICE : {{ $jumsystem[0]->jumlah_lcamount }}</h4>
                            <h4 style="color: white;font-family: serif;">IDR {{ number_format($system[0]->bill_lcamount) }}</h4>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file" style="margin-top: 15px;font-size: 80px;"></i>
                        </div>
                        <a href="{{ route('dashboard-invoice-system') }}" class="small-box-footer" style="color: white;font-family: serif;">Details</a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box" style="background-color: #3c8dbc;">
                        <h4 class="small-box-footer" style="color: white;font-family: serif; background-color: #ffc107;">CETAK CDM</h4>
                        <div class="inner">
                            <h4 style="color: white;font-family: serif;">INVOICE : {{ $jumsystem[0]->jumlah_lcamount }}</h4>
                            <h4 style="color: white;font-family: serif;">IDR {{ number_format($system[0]->bill_lcamount) }}</h4>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file" style="margin-top: 15px;font-size: 80px;"></i>
                        </div>
                        <a href="{{ route('dashboard-invoice-system') }}" class="small-box-footer" style="color: white;font-family: serif;">Details</a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box" style="background-color: #3c8dbc;">
                        <h4 class="small-box-footer" style="color: white;font-family: serif; background-color: #ffc107;">KIRIM POSINDO</h4>
                        <div class="inner">
                            <h4 style="color: white;font-family: serif;">INVOICE : {{ $jumsystem[0]->jumlah_lcamount }}</h4>
                            <h4 style="color: white;font-family: serif;">IDR {{ number_format($system[0]->bill_lcamount) }}</h4>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file" style="margin-top: 15px;font-size: 80px;"></i>
                        </div>
                        <a href="{{ route('dashboard-invoice-system') }}" class="small-box-footer" style="color: white;font-family: serif;">Details</a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box" style="background-color: #3c8dbc;">
                        <h4 class="small-box-footer" style="color: white;font-family: serif; background-color: #ffc107;">KIRIM NON POSINDO</h4>
                        <div class="inner">
                            <h4 style="color: white;font-family: serif;">INVOICE : {{ $jumsystem[0]->jumlah_lcamount }}</h4>
                            <h4 style="color: white;font-family: serif;">IDR {{ number_format($system[0]->bill_lcamount) }}</h4>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file" style="margin-top: 15px;font-size: 80px;"></i>
                        </div>
                        <a href="{{ route('dashboard-invoice-system') }}" class="small-box-footer" style="color: white;font-family: serif;">Details</a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box" style="background-color: #3c8dbc;">
                        <h4 class="small-box-footer" style="color: white;font-family: serif; background-color: #ffc107;">BELUM CETAK</h4>
                        <div class="inner">
                            <h4 style="color: white;font-family: serif;">INVOICE : {{ $jumsystem[0]->jumlah_lcamount }}</h4>
                            <h4 style="color: white;font-family: serif;">IDR {{ number_format($system[0]->bill_lcamount) }}</h4>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file" style="margin-top: 15px;font-size: 80px;"></i>
                        </div>
                        <a href="{{ route('dashboard-invoice-system') }}" class="small-box-footer" style="color: white;font-family: serif;">Details</a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box" style="background-color: #3c8dbc;">
                        <h4 class="small-box-footer" style="color: white;font-family: serif; background-color: #ffc107;">SAMPAI CC</h4>
                        <div class="inner">
                            <h4 style="color: white;font-family: serif;">INVOICE : {{ $jumsystem[0]->jumlah_lcamount }}</h4>
                            <h4 style="color: white;font-family: serif;">IDR {{ number_format($system[0]->bill_lcamount) }}</h4>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file" style="margin-top: 15px;font-size: 80px;"></i>
                        </div>
                        <a href="{{ route('dashboard-invoice-system') }}" class="small-box-footer" style="color: white;font-family: serif;">Details</a>
                    </div>
                </div>
            </div>
        <!-- /.row -->
        </div>
    </section>



@endsection

@section('member_script')
<script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready( function () {
        $('#TableMitra').DataTable();
    } );
</script>

@endsection
