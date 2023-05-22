<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Serba Sambal</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="{{  asset('backend/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{  asset('backend/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{  asset('backendvendors/themify-icons/css/themify-icons.css') }}" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="{{  asset('backend/vendors/DataTables/datatables.min.css') }}" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="{{  asset('backend/css/main.min.css') }}" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
</head>

<body class="fixed-navbar">

    <div class="page-wrapper">
        <!-- START HEADER-->
        <header class="header">
            <div class="page-brand bg-danger">
                <a class="link" href="index.html">
                    <span class="brand">Serba Sambal
                        {{-- <span class="brand-tip">Maju Jaya</span> --}}
                    </span>
                    {{-- <span class="brand-mini">Maju Jaya</span> --}}
                </a>
            </div>
            <div class="flexbox flex-1">
                <!-- START TOP-LEFT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li>
                        <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="fa fa-bars"></i></a>
                    </li>
                </ul>
                <!-- END TOP-LEFT TOOLBAR-->
                <!-- START TOP-RIGHT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li class="dropdown dropdown-user">
                        <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                            <img src="{{ asset('backend/img/serba_sambal.png') }}" />
                            <span></span>Admin<i class="fa fa-angle-down m-l-5"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="profile.html"><i class="fa fa-user"></i>Profile</a>
                            <a class="dropdown-item" href="profile.html"><i class="fa fa-cog"></i>Settings</a>
                            <a class="dropdown-item" href="javascript:;"><i class="fa fa-support"></i>Support</a>
                            <li class="dropdown-divider"></li>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i>Logout</a>
                        </ul>
                    </li>
                </ul>
                <!-- END TOP-RIGHT TOOLBAR-->
            </div>
        </header>
        <!-- END HEADER-->
        <!-- START SIDEBAR-->
        <nav class="page-sidebar bg-danger" id="sidebar">
            <div id="sidebar-collapse">
                <div class="admin-block d-flex">
                    <div>
                        <img src="{{  asset('backend/img/serba_sambal.png') }}" width="60px" />
                    </div>
                    <div class="admin-info">
                        <div class="font-strong">{{ Auth::user()->name }}</div><small
                            class="text-white">Administrator</small>
                    </div>
                </div>
                <ul class="side-menu metismenu">
                    <li>
                        <a href="{{ route('home') }}" class="text-white"><i class="sidebar-item-icon fa fa-home"></i>
                            <span class="nav-label"> Beranda</span></a>
                    </li>
                    <li>
                        <a href="{{ route('user.index') }}" class="text-white"><i
                                class="sidebar-item-icon fa fa-user"></i>
                            <span class="nav-label"> User</span></a>
                    </li>
                    <li>
                        <a href="{{ route('akun.index') }}" class="text-white"><i
                                class="sidebar-item-icon fa fa-bank"></i>
                            <span class="nav-label"> Akun</span></a>
                    </li>
                    <li>
                        <a href="{{ route('karyawan.index') }}" class="text-white"><i
                                class="sidebar-item-icon fa fa-users"></i>
                            <span class="nav-label"> Data Karyawan</span></a>
                    </li>
                    <li>
                        <a href="{{ route('jabatan.index') }}" class="text-white"><i
                                class="sidebar-item-icon fa fa-briefcase"></i>
                            <span class="nav-label"> Jabatan</span></a>
                    </li>
                    <li>
                        <a href="{{ route('absensi.index') }}" class="text-white"><i
                                class="sidebar-item-icon fa fa-briefcase"></i>
                            <span class="nav-label"> Absensi</span></a>
                    </li>
                    <li>
                        <a href="{{ route('master_gaji.index') }}" class="text-white"><i
                                class="sidebar-item-icon fa fa-briefcase"></i>
                            <span class="nav-label"> Master Gaji</span></a>
                    </li>
                    <li>
                        <a href="{{ route('master_gaji.index') }}" class="text-white"><i
                                class="sidebar-item-icon fa fa-angle-left arrow"></i>
                            <span class="nav-label"> Laporan</span></a>
                    </li>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" class="text-white" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="sidebar-item-icon fa fa-power-off"></i>
                            <span class="nav-label">Keluar</span>
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            </div>
        </nav>
        <!-- END SIDEBAR-->
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">{{ $judul }}</h1>

            </div>
            <div class="page-content fade-in-up">
                {{-- isi conten --}}
                @yield('content')

                <!-- END PAGE CONTENT-->
                {{-- <footer class="page-footer">
                <div class="font-13">2018 © <b>AdminCAST</b> - All rights reserved.</div>
                <a class="px-4" href="http://themeforest.net/item/adminca-responsive-bootstrap-4-3-angular-4-admin-dashboard-template/20912589" target="_blank">BUY PREMIUM</a>
                <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
            </footer> --}}
            </div>
        </div>
        <!-- BEGIN THEME CONFIG PANEL-->
        <div class="theme-config">
            {{-- <div class="theme-config-toggle"><i class="fa fa-cog theme-config-show"></i><i class="ti-close theme-config-close"></i></div> --}}
            <div class="theme-config-box">
                <div class="text-center font-18 m-b-20">SETTINGS</div>
                <div class="font-strong">LAYOUT OPTIONS</div>
                <div class="check-list m-b-20 m-t-10">
                    <label class="ui-checkbox ui-checkbox-gray">
                        <input id="_fixedNavbar" type="checkbox" checked>
                        <span class="input-span"></span>Fixed navbar</label>
                    <label class="ui-checkbox ui-checkbox-gray">
                        <input id="_fixedlayout" type="checkbox">
                        <span class="input-span"></span>Fixed layout</label>
                    <label class="ui-checkbox ui-checkbox-gray">
                        <input class="js-sidebar-toggler" type="checkbox">
                        <span class="input-span"></span>Collapse sidebar</label>
                </div>
                <div class="font-strong">LAYOUT STYLE</div>
                <div class="m-t-10">
                    <label class="ui-radio ui-radio-gray m-r-10">
                        <input type="radio" name="layout-style" value="" checked="">
                        <span class="input-span"></span>Fluid</label>
                    <label class="ui-radio ui-radio-gray">
                        <input type="radio" name="layout-style" value="1">
                        <span class="input-span"></span>Boxed</label>
                </div>
                <div class="m-t-10 m-b-10 font-strong">THEME COLORS</div>
                <div class="d-flex m-b-20">
                    <div class="color-skin-box" data-toggle="tooltip" data-original-title="Default">
                        <label>
                            <input type="radio" name="setting-theme" value="default" checked="">
                            <span class="color-check-icon"><i class="fa fa-check"></i></span>
                            <div class="color bg-white"></div>
                            <div class="color-small bg-ebony"></div>
                        </label>
                    </div>
                    <div class="color-skin-box" data-toggle="tooltip" data-original-title="Blue">
                        <label>
                            <input type="radio" name="setting-theme" value="blue">
                            <span class="color-check-icon"><i class="fa fa-check"></i></span>
                            <div class="color bg-blue"></div>
                            <div class="color-small bg-ebony"></div>
                        </label>
                    </div>
                    <div class="color-skin-box" data-toggle="tooltip" data-original-title="Green">
                        <label>
                            <input type="radio" name="setting-theme" value="green">
                            <span class="color-check-icon"><i class="fa fa-check"></i></span>
                            <div class="color bg-green"></div>
                            <div class="color-small bg-ebony"></div>
                        </label>
                    </div>
                    <div class="color-skin-box" data-toggle="tooltip" data-original-title="Purple">
                        <label>
                            <input type="radio" name="setting-theme" value="purple">
                            <span class="color-check-icon"><i class="fa fa-check"></i></span>
                            <div class="color bg-purple"></div>
                            <div class="color-small bg-ebony"></div>
                        </label>
                    </div>
                    <div class="color-skin-box" data-toggle="tooltip" data-original-title="Orange">
                        <label>
                            <input type="radio" name="setting-theme" value="orange">
                            <span class="color-check-icon"><i class="fa fa-check"></i></span>
                            <div class="color bg-orange"></div>
                            <div class="color-small bg-ebony"></div>
                        </label>
                    </div>
                    <div class="color-skin-box" data-toggle="tooltip" data-original-title="Pink">
                        <label>
                            <input type="radio" name="setting-theme" value="pink">
                            <span class="color-check-icon"><i class="fa fa-check"></i></span>
                            <div class="color bg-pink"></div>
                            <div class="color-small bg-ebony"></div>
                        </label>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="color-skin-box" data-toggle="tooltip" data-original-title="White">
                        <label>
                            <input type="radio" name="setting-theme" value="white">
                            <span class="color-check-icon"><i class="fa fa-check"></i></span>
                            <div class="color"></div>
                            <div class="color-small bg-silver-100"></div>
                        </label>
                    </div>
                    <div class="color-skin-box" data-toggle="tooltip" data-original-title="Blue light">
                        <label>
                            <input type="radio" name="setting-theme" value="blue-light">
                            <span class="color-check-icon"><i class="fa fa-check"></i></span>
                            <div class="color bg-blue"></div>
                            <div class="color-small bg-silver-100"></div>
                        </label>
                    </div>
                    <div class="color-skin-box" data-toggle="tooltip" data-original-title="Green light">
                        <label>
                            <input type="radio" name="setting-theme" value="green-light">
                            <span class="color-check-icon"><i class="fa fa-check"></i></span>
                            <div class="color bg-green"></div>
                            <div class="color-small bg-silver-100"></div>
                        </label>
                    </div>
                    <div class="color-skin-box" data-toggle="tooltip" data-original-title="Purple light">
                        <label>
                            <input type="radio" name="setting-theme" value="purple-light">
                            <span class="color-check-icon"><i class="fa fa-check"></i></span>
                            <div class="color bg-purple"></div>
                            <div class="color-small bg-silver-100"></div>
                        </label>
                    </div>
                    <div class="color-skin-box" data-toggle="tooltip" data-original-title="Orange light">
                        <label>
                            <input type="radio" name="setting-theme" value="orange-light">
                            <span class="color-check-icon"><i class="fa fa-check"></i></span>
                            <div class="color bg-orange"></div>
                            <div class="color-small bg-silver-100"></div>
                        </label>
                    </div>
                    <div class="color-skin-box" data-toggle="tooltip" data-original-title="Pink light">
                        <label>
                            <input type="radio" name="setting-theme" value="pink-light">
                            <span class="color-check-icon"><i class="fa fa-check"></i></span>
                            <div class="color bg-pink"></div>
                            <div class="color-small bg-silver-100"></div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <!-- END THEME CONFIG PANEL-->
        <!-- BEGIN PAGA BACKDROPS-->
        <div class="sidenav-backdrop backdrop"></div>
        <div class="preloader-backdrop">
            <div class="page-preloader">Loading</div>
        </div>
        <!-- END PAGA BACKDROPS-->
        <!-- CORE PLUGINS-->
        <script src="{{  asset('backend/vendors/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>
        <script src="{{  asset('backend/vendors/popper.js/dist/umd/popper.min.js') }}" type="text/javascript"></script>
        <script src="{{  asset('backend/vendors/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript">
        </script>
        <script src="{{  asset('backend/vendors/metisMenu/dist/metisMenu.min.js') }}" type="text/javascript"></script>
        <script src="{{  asset('backend/vendors/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript">
        </script>
        <!-- PAGE LEVEL PLUGINS-->
        <script src="{{  asset('backend/vendors/DataTables/datatables.min.js') }}" type="text/javascript"></script>
        <!-- CORE SCRIPTS-->
        <script src="{{  asset('backend/js/app.min.js') }}" type="text/javascript"></script>
        <!-- PAGE LEVEL SCRIPTS-->
        <script type="text/javascript">
        $(function() {
            $('#example-table').DataTable({
                pageLength: 10,
                //"ajax": './assets/demo/data/table_data.json',
                /*"columns": [
                    { "data": "name" },
                    { "data": "office" },
                    { "data": "extn" },
                    { "data": "start_date" },
                    { "data": "salary" }
                ]*/
            });
        })
        </script>
</body>

</html>