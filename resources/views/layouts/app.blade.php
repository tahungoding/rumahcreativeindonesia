<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>@yield('title') - RCI</title>

    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/front/favicon.png')}}" />

    <!-- Bootstrap Css -->
    <link href="{{asset('assets/back/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('assets/back/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('assets/back/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    @yield('css')
</head>

<body data-topbar="light" data-layout="horizontal">
    @auth
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="container-fluid">
                    <div class="float-left">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="{{url('home')}}" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{asset('assets/front')}}/img/logo.png" alt="" height="70">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{asset('assets/front')}}/img/logo.png" alt="" height="67">
                                </span>
                            </a>

                            <a href="{{url('home')}}" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{asset('assets/back')}}/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{asset('assets/back')}}/images/logo-light.png" alt="" height="19">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 d-lg-none header-item waves-effect waves-light" data-toggle="collapse" data-target="#topnav-menu-content">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </div>

                    <div class="float-right">

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="{{ avatar(Auth::user()->foto) }}" alt="Header Avatar">
                                <label style="cursor: pointer">&nbsp; Hai, {{Auth::user()->name}} !</label>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                {{-- <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle font-size-17 text-muted align-middle mr-1"></i>
                                    Profile</a> --}}

                                <a class="dropdown-item d-block" href="{{url('setting')}}"><i class="mdi mdi-settings font-size-17 text-muted align-middle mr-1"></i> Settings</a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();"><i class="mdi mdi-power font-size-17 text-muted align-middle mr-1 text-danger"></i>
                                    Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                                <i class="mdi mdi-spin mdi-settings"></i>
                            </button>
                        </div>

                    </div>
                </div>
            </div>

            <div class="top-navigation">
                <div class="page-title-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="page-title-box">
                                    <h4>Dashboard</h4>
                                    @yield('breadcrumb')
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="topnav">
                        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                            <div class="collapse navbar-collapse" id="topnav-menu-content">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('home')}} ">
                                            <i class="ti-dashboard"></i>Dashboard
                                        </a>
                                    </li>

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-email" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ti-user"></i>Pengguna
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="topnav-email">
                                            <a href="{{url('user')}}" class="dropdown-item">Data Pengguna</a>
                                            <a href="{{url('user_level')}}" class="dropdown-item">Level Pengguna</a>
                                        </div>
                                    </li>

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-email" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ti-briefcase"></i>Profil
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="topnav-email">
                                            <a href="{{url('slider')}}" class="dropdown-item">Slider</a>
                                            <a href="{{url('profile')}}" class="dropdown-item">Profil Perusahaan</a>
                                            <a href="{{url('struktur_tim')}}" class="dropdown-item">Struktur Tim</a>
                                        </div>
                                    </li>

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-email" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ti-calendar"></i>Program
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="topnav-email">
                                            <a href="{{url('program')}}" class="dropdown-item">Data Program</a>
                                            <a href="{{url('agenda')}}" class="dropdown-item">Agenda</a>
                                            <a href="{{url('testimoni')}}" class="dropdown-item">Testimoni</a>
                                        </div>
                                    </li>

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-email" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ti-rocket"></i>UMKM
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="topnav-email">
                                            <a href="{{url('pelaku_umkm')}}" class="dropdown-item">Pelaku UMKM</a>
                                            <a href="{{url('umkm')}}" class="dropdown-item">UMKM</a>
                                            <a href="{{url('kategori_umkm')}}" class="dropdown-item">Kategori UMKM</a>
                                            <a href="{{url('prolog_umkm')}}" class="dropdown-item">Prolog UMKM</a>
                                        </div>
                                    </li>

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-email" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ti-rss"></i>Artikel
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="topnav-email">
                                            <a href="{{url('artikel')}}" class="dropdown-item">Data Artikel</a>
                                            <a href="{{url('kategori_artikel')}}" class="dropdown-item">Kategori Artikel</a>
                                        </div>
                                    </li>
                                    
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-email" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ti-support"></i>Mitra
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="topnav-email">
                                            <a href="{{url('mitra')}}" class="dropdown-item">Data Mitra</a>
                                            <a href="{{url('kategori_mitra')}}" class="dropdown-item">Kategori Mitra</a>
                                            <a href="{{url('prolog_mitra')}}" class="dropdown-item">Prolog Mitra</a>
                                        </div>
                                    </li>

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-email" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ti-money"></i>Donasi
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="topnav-email">
                                            <a href="{{url('donasi')}}" class="dropdown-item">Donasi</a>
                                            <a href="{{url('donasi_akun')}}" class="dropdown-item">Akun</a>
                                            <a href="{{url('donatur')}}" class="dropdown-item">Donatur</a>
                                            <a href="{{url('kategori_donasi_akun')}}" class="dropdown-item">Kategori Akun</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        @endauth
        <div class="main-content">
            <div @auth class="page-content" @endauth>
                <div class="container-fluid">
                    @yield('content')
                    @auth

                    <footer class="footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12">
                                    © 2021 RCI <span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-warning"></i> by TAHUNGODING.</span>
                                </div>
                            </div>
                        </div>
                    </footer>
                    @endauth
                </div>
                <!-- end main content-->

            </div>
            <!-- END layout-wrapper -->

            <!-- Right Sidebar -->
            <div class="right-bar">
                <div data-simplebar class="h-100">
                    <div class="rightbar-title px-3 py-4">
                        <a href="javascript:void(0);" class="right-bar-toggle float-right">
                            <i class="mdi mdi-close noti-icon"></i>
                        </a>
                        <h5 class="m-0">Settings</h5>
                    </div>

                    <!-- Settings -->
                    <hr class="mt-0" />
                    <h6 class="text-center mb-0">Choose Layouts</h6>

                    <div class="p-4">
                        <div class="mb-2">
                            <img src="{{asset('assets/back')}}/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="">
                        </div>
                        <div class="custom-control custom-switch mb-3">
                            <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
                            <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                        </div>

                        <div class="mb-2">
                            <img src="{{asset('assets/back')}}/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="">
                        </div>
                        <div class="custom-control custom-switch mb-3">
                            <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsStyle="{{asset('assets/back')}}/css/bootstrap-dark.min.css" data-appStyle="{{asset('assets/back')}}/css/app-dark.min.css" />
                            <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                        </div>

                        <div class="mb-2">
                            <img src="{{asset('assets/back')}}/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="">
                        </div>
                        <div class="custom-control custom-switch mb-5">
                            <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appStyle="{{asset('assets/back')}}/css/app-rtl.min.css" />
                            <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                        </div>


                    </div>

                </div> <!-- end slimscroll-menu-->
            </div>

            <!-- /Right-bar -->

            <!-- Right bar overlay-->
            <div class="rightbar-overlay"></div>
            <!-- JAVASCRIPT -->
            <script src="{{asset('assets/back/libs/jquery/jquery.min.js')}}"></script>
            <script src="{{asset('assets/back/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
            <script src="{{asset('assets/back/libs/metismenu/metisMenu.min.js')}}"></script>
            <script src="{{asset('assets/back/libs/simplebar/simplebar.min.js')}}"></script>
            <script src="{{asset('assets/back/libs/node-waves/waves.min.js')}}"></script>
            <script src="{{asset('assets/back/libs/jquery-sparkline/jquery.sparkline.min.js')}}"></script>


            @yield('js')
            <script src="{{asset('assets/back/js/app.js')}}"></script>
        </div>
</body>

</html>
