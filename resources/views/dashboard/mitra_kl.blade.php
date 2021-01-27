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
@endsection
@section('member_css')
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
<small>Member</small>
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
<!-- Welcome -->
    <!-- <div class="row">
        <div class="col-md-12">
            <div class="callout callout-success">
              <h4>Selamat Datang di Cappucinno Application</h4>

              <p>Sistem Informasi </p>
              </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                </div>
                <div class="box-body">
                    Selamat datang di Cappucinno Application
                </div>
            </div>
        </div>
    </div> -->
    <!-- /.row -->
    <!-- <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box" style="background-color: #3c8dbc;">
              <div class="inner">
                <h3 style="color: white;font-family: serif;">{{ $npkk[0]->jml_kl }}</h3>
                <p style="font-family: serif; color: white;">NPK</p>
            </div>
            <div class="icon">
                <i class="fa fa-file" style="margin-top: 15px;font-size: 80px;"></i>
            </div>
            <a href="#" class="small-box-footer" style="color: white;font-family: serif;">Jumlah NPK Bulan {{ date('M') }}</a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box" style="background-color: #28a745;">
          <div class="inner">
            <h3 style="color: white;font-family: serif;">{{ $kl[0]->jml_kl }}</h3>

            <p style="color: white;font-family: serif;">Kontrak Layanan</p>
        </div>
        <div class="icon">
            <i class="fa fa-handshake-o" style="margin-top: 15px;"></i>
        </div>
        <a href="#" class="small-box-footer" style="color: white;font-family: serif;">Jumlah KL Bulan {{ date('M') }} </a>
    </div>
</div>
<div class="col-lg-3 col-6">
    <div class="small-box" style="background-color: #ffc107;">
      <div class="inner">
        <h3 style="color: white;font-family: serif;">{{ $tot_mitra[0]->jumlah_mitra }}</h3>
        <p style="color: white;font-family: serif;">Mitra</p>
    </div>
    <div class="icon">
        <i class="ion ion-person-add" style="margin-top: 15px;"></i>
    </div>
    <a href="#" class="small-box-footer" style="color: white;font-family: serif;">Jumlah Mitra Bulan {{ date('M') }}</a>
</div>
</div>
<div class="col-lg-3 col-6">
    <div class="small-box" style="background-color: #dc3545;">
      <div class="inner">
        <span style="font-size: 15px;color: white;font-family: serif;">Rp. {{ number_format($nilai_npk[0]->nilai_npk) }}</span>

        <p style="color: white;font-family: serif;">Nilai NPK</p>
        <p>&nbsp</p>
    </div>
    <div class="icon">
        <i class="ion ion-pie-graph" style="margin-top: 15px;"></i>
    </div>
    <a href="#" class="small-box-footer" style="color: white;font-family: serif;">Jumlah Nilai NPK Bulan {{ date('M') }}</a>
</div>
</div>
</div>
</div>
</section> -->

<div class="row">
    <!-- <div class="col-xs-12">
        <div class="col-md-6">
            <div class="box">
                <div class="box-body">
                    <div id="chart_div" style="align-self: center;"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box">
                <div class="box-body">
                    <div id="chart_divv" style="align-self: center;"></div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="col-xs-12">
        <div class="col-md-12">
            <div class="box" style="background-color: #265a88;color: white;">
                <div class="box-header"><h3 style="color: white;">Data Mitra & KL</h3></div>
                <div class="box-body">
                    <table id="TableMitra" class="table table-responsive">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Kontrak Layanan</td>
                                <td>Nilai Kontrak</td>
                                <td>Sudah Berbayar</td>
                                <td>Belum Berbayar</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach($datas as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->pks_number }}</td>
                                    <td align="right">{{ number_format($data->nilai_kontrak) }}</td>
                                    <td align="right">{{ number_format($data->nilai_npk) }}</td>
                                    <td align="right">{{ number_format($data->nilai_kontrak - $data->nilai_npk) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="jumlah_mitra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 75%;">
        <div class="modal-content">
            <div class="modal-header" style="background: rgb(70 130 180);">
                <h3 class="modal-title" id="exampleModalLongTitle" align="center" style="font-family:sans-serif;color:white;">Data KL Mitra</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <table id="myTableMitra">
                <thead>
                    <tr>
                        <th>Nama Mitra</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection

@section('mitra_kl_script')
<script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready( function () {
        $('#TableMitra').DataTable();
    } );
</script>

@endsection
