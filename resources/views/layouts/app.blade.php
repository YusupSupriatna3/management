<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @if (Auth::check())
    @role('AdminBillingAccount')
    <title>Request Billing</title>
    @endrole
    @role('CreateBa')
    <title>Request Billing</title>
    @endrole
    @role('AdminInvoice')
    <title>Tracking Invoice</title>
    @endrole
    <title>{{ config('app.name', 'Laravel') }}</title>
    @endif
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ asset('/admin-lte/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('/admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('/admin-lte/plugins/select2/select2.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/admin-lte/plugins/datatables/dataTables.bootstrap.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/admin-lte/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{ asset('/admin-lte/dist/css/skins/_all-skins.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

        <!-- Include this in your blade layout -->

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
@yield('member_css')
</head>
<body class="hold-transition skin-blue sidebar-mini">
    @include('sweet::alert')
    
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            @if (Auth::check())
            @role('AdminBillingAccount')
            <a href="{{ url('home') }}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>B</b>A</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Request</b>BA</span>
            </a>
            @endrole
            @role('CreateBa')
            <a href="{{ url('home') }}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>B</b>A</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Request</b>BA</span>
            </a>
            @endrole
            @role('AdminInvoice')
            <a href="{{ url('home') }}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>M</b>I</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Manage</b>Invoice</span>
            </a>
            @endrole
            <a href="{{ url('home') }}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>S</b>NPK</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>SINOPAK</b></span>
            </a>
            @endif

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                @if (Auth::check())
                                <!-- The user image in the navbar-->
                                <img src="{{ asset('/img/'. auth()->user()->avatar) }}" class="user-image" alt="User Image">
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">{!! auth()->user()->name !!}</span>
                                @else
                                <!-- The user image in the navbar-->
                                <img src="{{ asset('/img/default-50x50.gif') }}" class="user-image" alt="User Image">
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">User</span>
                                @endif
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    @if (Auth::check())
                                    <img src="{{ asset('/img/'. auth()->user()->avatar) }}" class="img-circle" alt="User Image">

                                    <p>
                                        {!! auth()->user()->name !!}
                                        <small>{!! auth()->user()->email !!}</small>
                                    </p>
                                    @else
                                    <img src="{{ asset('/img/default-50x50.gif') }}" class="img-circle" alt="User Image">

                                    <p>
                                        User
                                        <small>Email</small>
                                    </p>
                                    @endif
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    @if (Auth::check())
                                    <div class="pull-left">
                                        <a href="{{ url('/settings/profile/') }}" class="btn btn-default btn-flat">Profil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>
                                    </div>
                                    @else
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                    @endif
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar user panel (optional) -->
                <div class="user-panel">
                    @if (Auth::check())
                    <div class="pull-left image">
                        <img src="{{ asset('/img/'. auth()->user()->avatar) }}" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{!! auth()->user()->name !!}</p>
                        <!-- Status -->
                        <a href="#">
                            <i class="fa fa-circle text-success"></i>
                            Online
                        </a>
                    </div>
                    @else
                    <div class="pull-left image">
                        <img src="{{ asset('/img/default-50x50.gif') }}" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>User</p>
                        <!-- Status -->
                        <a href="#">
                            <i class="fa fa-circle text-success"></i>
                            Belum Terdaftar
                        </a>
                    </div>
                    @endif
                </div>

                <!-- Sidebar Menu -->
                <ul class="sidebar-menu">
                    <li class="header">MENU</li>
                    @if (Auth::check())

                    @role('AdminBillingAccount')
                    <li class="treeview {!! Request::is('adminmaster/menu1*') ? 'active' : '' !!}">
                        <a href="{{ url('home') }}">
                            <i class="fa fa-home"></i> <span>Dashboard</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>
                    <li class="treeview {!! Request::is('adminmaster/menu2*') ? 'active' : '' !!}">
                        <a href="#">
                            <i class="fa fa-bars"></i> <span>SUPPORTING DATA</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="treeview {!! Request::is('accountLock/accountlock*') ? 'active' : '' !!}">
                                <a href="{{ url('accountLock') }}">
                                    <i class="fa fa-database"></i>
                                    <span>V ACCOUNT LOCK</span>
                                </a>
                            </li>
                            <li class="treeview {!! Request::is('admin/rmart*') ? 'active' : '' !!}">
                                <a href="{{ route('RMARACCNUM.index') }}">
                                    <i class="fa fa-database"></i>
                                    <span>RMART ACC NUM</span>
                                </a>
                            </li>
                            <li class="treeview {!! Request::is('admin/cbase*') ? 'active' : '' !!}">
                                <a href="{{ route('CBASEDIVES.index') }}">
                                    <i class="fa fa-database"></i>
                                    <span>CBASE DIVES</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endrole
                    @role('AdminInvoice')
                    <li class="treeview {!! Request::is('admininvoice/menu1*') ? 'active' : '' !!}">
                        <a href="{{ url('home') }}">
                            <i class="fa fa-home"></i> <span>Dashboard</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>
                    <li class="treeview {!! Request::is('admininvoice/menu1*') ? 'active' : '' !!}">
                        <a href="#">
                            <i class="fa fa-bars"></i> <span>Manage Account</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="treeview {!! Request::is('admininvoice/menu1*') ? 'active' : '' !!}">
                                <a href="#">
                                    <i class="fa fa-database"></i>
                                    <span>Invoice</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="treeview {!! Request::is('admininvoice/menu1*') ? 'active' : '' !!}">
                                        <a href="{{ route('data-invoice') }}">
                                            <i class="fa fa-file"></i>
                                            <span>Data Invoice</span>
                                        </a>    
                                    </li>
                                </ul>
                                <ul class="treeview-menu">
                                    <li class="treeview {!! Request::is('admininvoice/menu1*') ? 'active' : '' !!}">
                                        <a href="#">
                                            <i class="fa fa-database"></i>
                                            <span>Update Invoice</span>
                                            <span class="pull-right-container">
                                                <i class="fa fa-angle-left pull-right"></i>
                                            </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li class="treeview {!! Request::is('admininvoice/menu1*') ? 'active' : '' !!}">
                                                <a href="{{ route('view-upload-invoice') }}">
                                                    <i class="fa fa-upload"></i>
                                                    <span>Update Status Invoice</span>
                                                </a>    
                                            </li>
                                            <li class="treeview {!! Request::is('admininvoice/menu1*') ? 'active' : '' !!}">
                                                <a href="{{ route('view-upload-invoice-custome') }}">
                                                    <i class="fa fa-upload"></i>
                                                    <span>Update Invoice custom</span>
                                                </a>    
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="treeview-menu">
                                    <li class="treeview {!! Request::is('admininvoice/menu1*') ? 'active' : '' !!}">
                                        <a href="#">
                                            <i class="fa fa-database"></i>
                                            <span>Update Delivery</span>
                                            <span class="pull-right-container">
                                                <i class="fa fa-angle-left pull-right"></i>
                                            </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li class="treeview {!! Request::is('admininvoice/menu1*') ? 'active' : '' !!}">
                                                <a href="{{ route('view-upload-pickup-invoice') }}">
                                                    <i class="fa fa-upload"></i>
                                                    <span>Update Pickup</span>
                                                </a>    
                                            </li>
                                            <li class="treeview {!! Request::is('admininvoice/menu1*') ? 'active' : '' !!}">
                                                <a href="{{ route('view-upload-kirim-invoice') }}">
                                                    <i class="fa fa-upload"></i>
                                                    <span>Update Delivery</span>
                                                </a>    
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="treeview-menu">
                            <li class="treeview {!! Request::is('admininvoice/menu2*') ? 'active' : '' !!}">
                                <a href="#">
                                    <i class="fa fa-database"></i>
                                    <span>Alamat Pengiriman</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="treeview {!! Request::is('admininvoice/menu2*') ? 'active' : '' !!}">
                                        <a href="{{ route('data-alamat-pengiriman') }}">
                                            <i class="fa fa-file"></i>
                                            <span>Data Alamat</span>
                                        </a>    
                                    </li>
                                    <li class="treeview {!! Request::is('admininvoice/menu2*') ? 'active' : '' !!}">
                                        <a href="{{ route('view-upload-alamat') }}">
                                            <i class="fa fa-upload"></i>
                                            <span>Upload Data Alamat</span>
                                        </a>    
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    @endrole
                    @role('member')
                    <li class="treeview {!! Request::is('member/menu1*') ? 'active' : '' !!}">
                        <a href="{{ url('home') }}">
                            <i class="fa fa-home"></i> <span>Dashboard</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>
                    <li class="treeview {!! Request::is('member/menu1*') ? 'active' : '' !!}">
                        <a href="{{ route('ncx-index') }}">
                            <i class="fa fa-search"></i> <span>Search Account</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>
                    <li class="treeview {!! Request::is('member/menu2*') ? 'active' : '' !!}">
                        <a href="#">
                            <i class="fa fa-envelope"></i> <span>Surat Pembayaran</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="treeview {!! Request::is('member/menu3*') ? 'active' : '' !!}">
                                <a href="{{ route('cekAp.index') }}">
                                    <i class="fa fa-check"></i>
                                    <span>Check Data Pembayaran</span>
                                </a>
                            </li>
                            <li class="treeview {!! Request::is('member/menu4*') ? 'active' : '' !!}">
                                <a href="{{ route('data-surat-pembayaran') }}">
                                    <i class="fa fa-pencil"></i>
                                    <span>Create Surat Pembayaran</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="treeview {!! Request::is('member/menu2*') ? 'active' : '' !!}">
                        <a href="#">
                            <i class="fa fa-file"></i> <span>NPK</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="treeview {!! Request::is('member/summary*') ? 'active' : '' !!}">
                                <a href="#">
                                    <i class="fa fa-pencil"></i>
                                    <span>Create NPK</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="treeview {!! Request::is('member/summary*') ? 'active' : '' !!}">
                                        <a href="{{ route('create-npk') }}">
                                            <i class="fa fa-pencil"></i>
                                            <span>Ap Management</span>
                                        </a>    
                                    </li>
                                    <li class="treeview {!! Request::is('member/summary*') ? 'active' : '' !!}">
                                        <a href="{{ route('view-upload-excel') }}">
                                            <i class="fa fa-file-excel-o"></i>
                                            <span>Upload From Excel</span>
                                        </a>    
                                    </li>
                                    <li class="treeview {!! Request::is('member/summary*') ? 'active' : '' !!}">
                                        <a href="{{ route('create-npk-mkt') }}">
                                            <i class="fa fa-pencil"></i>
                                            <span>Marketing Fee</span>
                                        </a>    
                                    </li>
                                </ul>
                            </li>
                            <li class="treeview {!! Request::is('member/summary*') ? 'active' : '' !!}">
                                <a href="#">
                                    <i class="fa fa-pencil"></i>
                                    <span>Create NPK Lanjutan</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="treeview {!! Request::is('member/summary*') ? 'active' : '' !!}">
                                        <a href="{{ route('data-npk') }}">
                                            <i class="fa fa-pencil"></i>
                                            <span>Ap Management</span>
                                        </a>
                                    </li>
                                    <li class="treeview {!! Request::is('member/summary*') ? 'active' : '' !!}">
                                        <a href="{{ route('data-npk-mkt') }}">
                                            <i class="fa fa-pencil"></i>
                                            <span>Marketing Fee</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="treeview {!! Request::is('member/summary*') ? 'active' : '' !!}">
                                <a href="#">
                                    <i class="fa fa-pencil"></i>
                                    <span>Download To Excel</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">        
                                    <li class="treeview {!! Request::is('member/summary*') ? 'active' : '' !!}">
                                        <a href="{{ route('export-excel') }}">
                                            <i class="fa fa-download"></i>
                                            <span>Ap Management</span>
                                        </a>
                                    </li>
                                    <li class="treeview {!! Request::is('member/summary*') ? 'active' : '' !!}">
                                        <a href="{{ route('export-excel') }}">
                                            <i class="fa fa-download"></i>
                                            <span>Marketing Fee</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    @endrole
                            <li class="treeview {!! Request::is('settings/*') ? 'active' : '' !!}">
                                <a href="#">
                                    <i class="fa fa-cogs"></i> <span>Pengaturan</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="{!! Request::is('settings/profile*') ? 'active' : '' !!}">
                                        <a href="{{ url('/settings/profile/') }}">
                                            <i class="fa fa-user-o"></i> Profil
                                        </a>
                                    </li>
                                    <li class="{!! Request::is('settings/password') ? 'active' : '' !!}">
                                        <a href="{{ url('/settings/password') }}">
                                            <i class="fa fa-lock"></i> Ubah Password
                                        </a>
                                    </li>
                                    @if (Auth::check())
                                    @role('AdminInvoice')
                                    <li class="{!! Request::is('settings/ket') ? 'active' : '' !!}">
                                        <a href="{{ route('daftar-keterangan-manual') }}">
                                            <i class="fa fa-lock"></i> Daftar Keterangan
                                        </a>
                                    </li>
                                    <li class="{!! Request::is('settings/kurir') ? 'active' : '' !!}">
                                        <a href="{{ route('daftar-kurir') }}">
                                            <i class="fa fa-lock"></i> Daftar Kurir
                                        </a>
                                    </li>
                                    <li class="{!! Request::is('settings/status') ? 'active' : '' !!}">
                                        <a href="{{ route('daftar-status') }}">
                                            <i class="fa fa-lock"></i> Daftar Status
                                        </a>
                                    </li>
                                    @endrole
                            @endif
                                </ul>
                            </li>

                            <li class="treeview {!! Request::is('logout') ? 'active' : '' !!}">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i>
                                    <span>Sign out</span>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                            @else

                            <li class="treeview">
                                <a href="{{ url('/login') }}">
                                    <i class="fa fa-lock"></i>
                                    <span>Login</span>
                                </a>
                            </li>
                            @endif

                        </ul>
                        <!-- /.sidebar-menu -->
                    </section>
                    <!-- /.sidebar -->
                </aside>

                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <h1>
                            @yield('dashboard')
                        </h1>
                        <ol class="breadcrumb">
                            @yield('breadcrumb')
                        </ol>
                    </section>

                    <!-- Main content -->
                    <section class="content">

                        <!-- Your Page Content Here -->
                        @include('layouts._flash')
                        @yield('content')

                    </section>
                    <!-- /.content -->
                </div>
                <!-- /.content-wrapper -->

                <!-- Main Footer -->
                <footer class="main-footer">
                    <!-- To the right -->
                    <div class="pull-right hidden-xs">
                        ESCDM
                    </div>
                    <!-- Default to the left -->
                    <strong>Copyright &copy; 2020 <a href="#">ESCDM</a>.</strong> All rights reserved.
                </footer>

                <!-- ./wrapper -->

                <!-- jQuery 2.2.3 -->
                <script src="{{ asset('/admin-lte/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
                <!-- Bootstrap 3.3.6 -->
                <script src="{{ asset('/admin-lte/bootstrap/js/bootstrap.min.js') }}"></script>
                <!-- FastClick -->
                <script src="{{ asset('/admin-lte/plugins/fastclick/fastclick.js') }}"></script>
                <!-- AdminLTE App -->
                <script src="{{ asset('/admin-lte/dist/js/app.min.js') }}"></script>
                <!-- Sparkline -->
                <script src="{{ asset('/admin-lte/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
                <!-- jvectormap -->
                <script src="{{ asset('/admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
                <script src="{{ asset('/admin-lte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
                <!-- SlimScroll -->
                <script src="{{ asset('/admin-lte/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
                <!-- ChartJS 1.0.1 -->
                <script src="{{ asset('/admin-lte/plugins/chartjs/Chart.min.js') }}"></script>
                <!-- DataTables -->
                <script src="{{ asset('/admin-lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
                <script src="{{ asset('/admin-lte/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
                <!-- Select2 -->
                <script src="{{ asset('/admin-lte/plugins/select2/select2.full.min.js') }}"></script>
                <!-- Custom JS -->
                <script src="{{ asset('/js/custom.js') }}"></script>
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
                <!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> -->
                <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
                <script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>
                <script type="text/javascript">
                    $('#tambah-kl').bootstrapValidator({
                        feedbackIcons: {
                            valid: 'glyphicon glyphicon-ok',
                            invalid: 'glyphicon glyphicon-remove',
                            validating: 'glyphicon glyphicon-refresh'
                        },
                        fields: {
                            mitra_name: {
                                validators: {
                                    notEmpty: {
                                        message: 'Please Enter Mitra Name'
                                    }
                                }
                            },
                            pks_number: {
                                validators: {
                                    notEmpty: {
                                        message: 'Please Enter Pks Number'
                                    }
                                }
                            },
                            customer_name: {
                                validators: {
                                    notEmpty: {
                                        message: 'Please Enter Customer Name'
                                    }
                                }
                            },
                            account_number: {
                                validators: {
                                    notEmpty: {
                                        message: 'Please Enter Account Number'
                                    }
                                }
                            },
                            segmen: {
                                validators: {
                                    notEmpty: {
                                        message: 'Please Enter Segmen'
                                    }
                                }
                            },
                            manager_name: {
                                validators: {
                                    notEmpty: {
                                        message: 'Please Enter Manager Name'
                                    }
                                }
                            },
                            nik: {
                                validators: {
                                    notEmpty: {
                                        message: 'Please Enter Nik'
                                    }
                                }
                            },
                            jangka_waktu_kontrak: {
                                validators: {
                                    notEmpty: {
                                        message: 'Please Enter Jangka Waktu Kontrak'
                                    }
                                }
                            },
                            nk: {
                                validators: {
                                    notEmpty: {
                                        message: 'Please Enter Nilai Kontrak'
                                    }
                                }
                            },
                            curr_type: {
                                validators: {
                                    notEmpty: {
                                        message: 'Pleae Enter Currency Type'
                                    }
                                }
                            },
                            nilai_npk: {
                                validators: {
                                    notEmpty: {
                                        message: 'Please Enter Nilai Npk'
                                    }
                                }
                            },
                            // keterangan: {
                            //     validators: {
                            //         notEmpty: {
                            //             message: 'Please Enter Keterangan'
                            //         }
                            //     }
                            // },
                            mrccc: {
                                validators: {
                                    notEmpty: {
                                        message: 'Please Enter NPK-ke'
                                    }
                                }
                            }
                        }
                    });

                    $('#edit-kl').bootstrapValidator({
                        feedbackIcons: {
                            valid: 'glyphicon glyphicon-ok',
                            invalid: 'glyphicon glyphicon-remove',
                            validating: 'glyphicon glyphicon-refresh'
                        },
                        fields: {
                            mitra_name: {
                                validators: {
                                    notEmpty: {
                                        message: 'Please Enter Mitra Name'
                                    }
                                }
                            },
                            pks_number: {
                                validators: {
                                    notEmpty: {
                                        message: 'Please Enter Pks Number'
                                    }
                                }
                            },
                            customer_name: {
                                validators: {
                                    notEmpty: {
                                        message: 'Please Enter Customer Name'
                                    }
                                }
                            },
                            account_number: {
                                validators: {
                                    notEmpty: {
                                        message: 'Please Enter Account Number'
                                    }
                                }
                            },
                            segmen: {
                                validators: {
                                    notEmpty: {
                                        message: 'Please Enter Segmen'
                                    }
                                }
                            },
                            manager_name: {
                                validators: {
                                    notEmpty: {
                                        message: 'Please Enter Manager Name'
                                    }
                                }
                            },
                            nik: {
                                validators: {
                                    notEmpty: {
                                        message: 'Please Enter Nik'
                                    }
                                }
                            },
                            jangka_waktu_kontrak: {
                                validators: {
                                    notEmpty: {
                                        message: 'Please Enter Jangka Waktu Kontrak'
                                    }
                                }
                            },
                            nk: {
                                validators: {
                                    notEmpty: {
                                        message: 'Please Enter Nilai Kontrak'
                                    }
                                }
                            },
                            curr_type: {
                                validators: {
                                    notEmpty: {
                                        message: 'Pleae Enter Currency Type'
                                    }
                                }
                            },
                            nilai_npk: {
                                validators: {
                                    notEmpty: {
                                        message: 'Please Enter Nilai Npk'
                                    }
                                }
                            },
                        }
                    });
                </script>
                <script type="text/javascript">
                  @if($msg = Session::get('sukses'))
                  toastr.success('<?php echo $msg; ?>','Sukses',toastr.options = {
                      "closeButton": true,
                      "debug": false,
                      "newestOnTop": false,
                      "progressBar": true,
                      "positionClass": "toast-top-right",
                      "preventDuplicates": false,
                      "onclick": null,
                      "showDuration": "300",
                      "hideDuration": "1000",
                      "timeOut": "3000",
                      "extendedTimeOut" : "1000",
                      "showEasing": "swing",
                      "hideEasing": "linear",
                      "showMethod": "fadeIn",
                      "hideMethod": "fadeOut"
                  })
                  @php
                  Session::forget('sukses');
                  @endphp
                  @endif
                  @if($msg = Session::get('warning'))
                  toastr.warning('<?php echo $msg; ?>','Warning',{timeOut:5000})
                  @php
                  Session::forget('warning');
                  @endphp
                  @endif
                </script>

            @yield('scripts')
            @yield('js')
            @yield('scriptss')
            @yield('member_script')
            @yield('mitra_kl_script')
            @yield('scripts-invoice')
            @yield('scripts-edit-invoice')
            @yield('index-pembayaran')

</body>
</html>
