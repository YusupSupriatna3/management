@extends('layouts.app')

@section('google_fonts')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

    google.charts.load('current', {'packages':['corechart']});

    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var jsonData = $.ajax({
          url: 'home/getNilaiNpkBulanTerakhir',
          dataType: "json",
          async: false
      }).responseText;

      var data = new google.visualization.DataTable(jsonData);
      var options = {
        title:'Nilai NPK 3 Bulan Terakhir',
        width: 500,
        height: 450,
        vAxis: {title: "Value"},
        isStacked: true,
        hAxis: {title: "Month"}
    };
    var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
    chart.draw(data, options);
}
</script>

<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});

    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var jsonData = $.ajax({
          url: 'home/getJumlahNpkBulanTerakhir',
          dataType: "json",
          async: false
      }).responseText;

      var data = new google.visualization.DataTable(jsonData);
      var options = {
        title:'Jumlah NPK 3 Bulan Terakhir',
        width: 500,
        height: 450,
        vAxis: {title: "Value"},
        isStacked: true,
        hAxis: {title: "Month"}
    };
    var chart = new google.visualization.ColumnChart(document.getElementById('chart_divv'));
    chart.draw(data, options);
}
</script>
    <!-- <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var jsonData = $.ajax({
          url: 'home/getNpkBulanTerakhir',
          dataType: "json",
          async: false
          }).responseText;
        var data = google.visualization.arrayToDataTable([
          ['Tahun', 'NPK'],
        ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          },
          bars: 'vertical',
          hAxis: {format: 'decimal'},
          height: 400,
          colors: ['#1b9e77', '#d95f02', '#7570b3']
        };

        var chart = new google.charts.Bar(document.getElementById('chart_div'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script> -->
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
<li class="active">Dashboard</li>
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
                        <div class="inner">
                            <h3 style="color: white;font-family: serif;">{{ $requestba[0]->jml_akun }}</h3>
                            <h4 style="color: white;font-family: serif;">SUBMISSION</h4>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file" style="margin-top: 15px;font-size: 80px;"></i>
                        </div>
                        <a href="{{ route('data-requestba') }}" class="small-box-footer" style="color: white;font-family: serif;">Details</a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box" style="background-color: #28a745;">
                        <div class="inner">
                            <h3 style="color: white;font-family: serif;">{{ $cek[0]->jml_akun }}</h3>
                            <h4 style="color: white;font-family: serif;">APPROVED</h4>
                        </div>
                        <div class="icon">
                            <i class="fa fa-handshake-o" style="margin-top: 15px;"></i>
                        </div>
                        <a href="#" class="small-box-footer" style="color: white;font-family: serif;">Details</a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box" style="background-color: #dc3545;">
                        <div class="inner">
                            <h3 style="color: white;font-family: serif;">{{ $notapproval[0]->jml_akun }}</h3>
                            <h4 style="color: white;font-family: serif;">NOT APPROVED</h4>
                        </div>
                        <div class="icon">
                            <i class="glyphicon glyphicon-remove" style="margin-top: 15px;"></i>
                        </div>
                        <a href="#" class="small-box-footer" style="color: white;font-family: serif;">Details</a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box" style="background-color: #ffc107;">
                        <div class="inner">
                            <h3 style="color: white;font-family: serif;">{{ $billing_akun[0]->jml_akun }}</h3>
                            <h4 style="color: white;font-family: serif;">CLOSE</h4>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph" style="margin-top: 15px;"></i>
                        </div>
                        <a href="{{ route('data-billing') }}" class="small-box-footer" style="color: white;font-family: serif;">Details</a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box" style="background-color: #3c8dbc;">
                        <div class="inner">
                            <h3 style="color: white;font-family: serif;">{{ $requestba[0]->jml_akun }}</h3>
                            <h4 style="color: white;font-family: serif;">SUBMITTED OLD BA</h4>
                            <h4 style="color: white;font-family: serif;">Bulan {{date('M Y')}}</h4>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file" style="margin-top: 15px;font-size: 80px;"></i>
                        </div>
                        <a href="{{ route('data-requestba') }}" class="small-box-footer" style="color: white;font-family: serif;">Details</a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box" style="background-color: #3c8dbc;">
                        <div class="inner">
                            <h3 style="color: white;font-family: serif;">{{ $requestnew[0]->jml_akun }}</h3>
                            <h4 style="color: white;font-family: serif;">SUBMITTED NEW BA</h4>
                            <h4 style="color: white;font-family: serif;">Bulan {{date('M Y')}}</h4>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file" style="margin-top: 15px;font-size: 80px;"></i>
                        </div>
                        <a href="{{ route('data-requestba-new') }}" class="small-box-footer" style="color: white;font-family: serif;">Details</a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box" style="background-color: #28a745;">
                        <div class="inner">
                            <h3 style="color: white;font-family: serif;">{{ $approval[0]->jml_akun }}</h3>
                            <h4 style="color: white;font-family: serif;">APPROVED</h4>
                            <h4 style="color: white;font-family: serif;">Bulan {{date('M Y')}}</h4>
                        </div>
                        <div class="icon">
                            <i class="fa fa-handshake-o" style="margin-top: 15px;"></i>
                        </div>
                        <a href="{{ route('data-approved-billing') }}" class="small-box-footer" style="color: white;font-family: serif;">Details</a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box" style="background-color: #dc3545;">
                        <div class="inner">
                            <h3 style="color: white;font-family: serif;">{{ $retuned[0]->jml_akun }}</h3>
                            <h4 style="color: white;font-family: serif;">RETURNED</h4>
                            <h4 style="color: white;font-family: serif;">Bulan {{date('M Y')}}</h4>
                        </div>
                        <div class="icon">
                            <i class="glyphicon glyphicon-remove" style="margin-top: 15px;"></i>
                        </div>
                        <a href="{{ route('data-requestba-non-approval') }}" class="small-box-footer" style="color: white;font-family: serif;">Details</a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box" style="background-color: #dc3545;">
                        <div class="inner">
                            <h3 style="color: white;font-family: serif;">{{ $nonapproval[0]->jml_akun }}</h3>
                            <h4 style="color: white;font-family: serif;">NOT APPROVED</h4>
                            <h4 style="color: white;font-family: serif;">Bulan {{date('M Y')}}</h4>
                        </div>
                        <div class="icon">
                            <i class="glyphicon glyphicon-remove" style="margin-top: 15px;"></i>
                        </div>
                        <a href="{{ route('data-requestba-non-approval') }}" class="small-box-footer" style="color: white;font-family: serif;">Details</a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box" style="background-color: #28a745;">
                        <div class="inner">
                            <h3 style="color: white;font-family: serif;">{{ $process[0]->jml_akun }}</h3>
                            <h4 style="color: white;font-family: serif;">PROCESS BA</h4>
                            <h4 style="color: white;font-family: serif;">Bulan {{date('M Y')}}</h4>
                        </div>
                        <div class="icon">
                            <i class="fa fa-handshake-o" style="margin-top: 15px;"></i>
                        </div>
                        <a href="{{ route('data-create-billing') }}" class="small-box-footer" style="color: white;font-family: serif;">Details</a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box" style="background-color: #ffc107;">
                        <div class="inner">
                            <h3 style="color: white;font-family: serif;">{{ $billing[0]->jml_akun }}</h3>
                            <h4 style="color: white;font-family: serif;">BA CLOSE</h4>
                            <h4 style="color: white;font-family: serif;">Bulan {{date('M Y')}}</h4>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph" style="margin-top: 15px;"></i>
                        </div>
                        <a href="{{ route('data-billingperiod') }}" class="small-box-footer" style="color: white;font-family: serif;">Details</a>
                    </div>
                </div>
            </div>
        <!-- /.row -->
        </div>
    </section>



<div class="row">
    <div class="col-xs-12">
        <div class="col-md-12">
            <div class="box" style="background-color: #265a88;color: white;">
                <div class="box-header"><h3 style="color: white;">Data Account Billing Bulan {{date('M Y')}}</h3></div>
                <div class="box-body">
                    <table id="TableMitra" class="table table-responsive">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>ACCOUNTNAS</td>
                                <td>BILLACCNTNAME</td>
                                <td>SEGMENT</td>
                                <td>REGION</td>
                                <td>CREATED_BY_NAME</td>
                                <td>ACCOUNT_CREATED</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach($data as $datas)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $datas->accountnas }}</td>
                                    <td>{{ $datas->billaccntname }}</td>
                                    <td>{{ $datas->segment }}</td>
                                    <td>{{ $datas->region }}</td>
                                    <td>{{ $datas->created_by_name }}</td>
                                    <td>{{ $datas->account_created }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('member_script')
<script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready( function () {
        $('#TableMitra').DataTable();
    } );
</script>

@endsection
