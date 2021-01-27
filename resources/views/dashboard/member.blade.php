@extends('layouts.app')

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

        /* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  /* display: none; */
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
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
@section('content')
    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'APManagement')">AP Management</button>
        <button class="tablinks" onclick="openCity(event, 'MarketingFee')">Marketing Fee</button>
    </div>
    <div id="APManagement" class="tabcontent">
        <section class="content">
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
                            <a href="#" class="small-box-footer" style="color: white;font-family: serif;">Jumlah NPK Bulan {{ $tgl }}</a>
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
                            <a href="#" class="small-box-footer" style="color: white;font-family: serif;">Jumlah KL Bulan {{ $tgl }} </a>
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
                            <a href="#" class="small-box-footer" style="color: white;font-family: serif;">Jumlah Mitra Bulan {{ $tgl }}</a>
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
                            <a href="#" class="small-box-footer" style="color: white;font-family: serif;">Jumlah Nilai NPK Bulan {{ $tgl }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <div class="box" style="background-color: #265a88;color: white;">
                        <div class="box-header"><h3 style="color: white;">Data Mitra & KL</h3></div>
                        <div class="box-body">
                            <table id="TableMitra" class="table table-responsive">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Nama Mitra</td>
                                        <td>Jumlah KL</td>
                                        <td>Jumlah Kontrak</td>
                                        <td>Sudah Berbayar</td>
                                        <td>Belum Berbayar</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($data as $datas)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td><a id="mitra_color" href="home/mitra/{{ $datas->mitra_name }}">{{ $datas->mitra_name }}</a></td>
                                        <td>{{ $datas->jumlah_kl }}</td>
                                        <td align="right">{{ number_format($datas->jumlah_kontrak) }}</td>
                                        <td align="right">{{ number_format($datas->jumlah_npk) }}</td>
                                        <td align="right">{{ number_format($datas->jumlah_kontrak-$datas->jumlah_npk) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="MarketingFee" class="tabcontent">
        <section class="content">
            <div class="container-fluid">
                <div class="row"> 
                    <div class="col-lg-3 col-6">
                        <div class="small-box" style="background-color: #3c8dbc;">
                            <div class="inner">
                                <h3 style="color: white;font-family: serif;">{{ $total_npk[0]->jumlah_npk }}</h3>
                                <p style="font-family: serif; color: white;">NPK</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-file" style="margin-top: 15px;font-size: 80px;"></i>
                            </div>
                            <a href="#" class="small-box-footer" style="color: white;font-family: serif;">Jumlah NPK Bulan {{ $tgl }}</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box" style="background-color: #28a745;">
                            <div class="inner">
                                <h3 style="color: white;font-family: serif;">{{ $total_pks[0]->jumlah_pks }}</h3>
                                <p style="color: white;font-family: serif;">Kontrak Layanan</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-handshake-o" style="margin-top: 15px;"></i>
                            </div>
                            <a href="#" class="small-box-footer" style="color: white;font-family: serif;">Jumlah KL Bulan {{ $tgl }} </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box" style="background-color: #ffc107;">
                            <div class="inner">
                                <h3 style="color: white;font-family: serif;">{{ $total_mitra[0]->jumlah_mitra }}</h3>
                                <p style="color: white;font-family: serif;">Mitra</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add" style="margin-top: 15px;"></i>
                            </div>
                            <a href="#" class="small-box-footer" style="color: white;font-family: serif;">Jumlah Mitra Bulan {{ $tgl }}</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box" style="background-color: #dc3545;">
                            <div class="inner">
                                <span style="font-size: 15px;color: white;font-family: serif;">Rp. {{ number_format($jumlah_npk[0]->nilai_npk) }}</span>
                                <p style="color: white;font-family: serif;">Nilai NPK</p>
                                <p>&nbsp</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph" style="margin-top: 15px;"></i>
                            </div>
                            <a href="#" class="small-box-footer" style="color: white;font-family: serif;">Jumlah Nilai NPK Bulan {{ $tgl }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <div class="box" style="background-color: #265a88;color: white;">
                        <div class="box-header"><h3 style="color: white;">Data Mitra & KL</h3></div>
                        <div class="box-body">
                            <table id="Marketing" class="table table-responsive">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Nama Mitra</td>
                                        <td>Jumlah KL</td>
                                        <td>Jumlah NPK</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($dt as $dtt)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td><a id="mitra_color" href="home/mitra/mkt/{{ $dtt->mitra_name }}">{{ $dtt->mitra_name }}</a></td>
                                        <td>{{ $dtt->jumlah_pks }}</td>
                                        <td align="right">{{ number_format($dtt->jumlah_npk) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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

@section('member_script')
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready( function () {
            $('#TableMitra').DataTable();
            $('#Marketing').DataTable();
        } );

        function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
        }
    </script>
@endsection
