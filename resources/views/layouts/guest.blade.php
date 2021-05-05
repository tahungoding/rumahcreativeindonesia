<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Page Title -->
    <title> {{$title.' - '}}Rumah Creativepreuner Indonesia </title>

    <!-- Meta Data -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta property="og:title" content="{{$title}}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('assets/front/favicon.png')}}" />

    <!-- Web Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli%7CRubik:400,400i,500,700" />

    <!-- ======= Bootstrap CSS ======= -->
    <link rel="stylesheet" href="{{asset('assets/front/css/bootstrap.min.css')}}" />

    <!-- ======= Font Awesome CSS ======= -->
    <link rel="stylesheet" href="{{asset('assets/front/css/font-awesome.min.css')}}" />

    <!-- ======= Owl Carousel CSS ======= -->
    <link rel="stylesheet" href="{{asset('assets/front/plugins/owlcarousel/owl.carousel.min.css')}}" />

    <!-- ======= Magnific Popup CSS ======= -->
    <link rel="stylesheet" href="{{asset('assets/front/plugins/magnific-popup/magnific-popup.min.css')}}" />

    <!-- ======= Main Stylesheet ======= -->
    <link rel="stylesheet" href="{{asset('assets/front/css/style.css')}}" />

    <!-- ======= Custom Stylesheet ======= -->
    <link rel="stylesheet" href="{{asset('assets/front/css/custom.css')}}" />

    @yield('css')

    <script type="text/javascript"
        src="https://platform-api.sharethis.com/js/sharethis.js#property=60162321fe6fa50012b7b860&product=inline-share-buttons"
    async="async"></script>

</head>
<body>

    <!-- Preloader Begin -->
    <div class='preloader w-100 h-100 position-fixed'>
        <div class="loader">
            <img class="icon" width="50" src="{{asset('assets/front/img/logo.png')}}" alt="" />
        </div>
    </div>
    <!-- Preloader End -->

    <!-- Header Begin -->
    <header class="header fixed-top">
        <!-- Header Style One Begin -->
        <div class="fixed-top header-main style--one">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-sm-4 col-8">
                        <!-- Logo Begin -->
                        <div class="logo">
                            <a href="{{url('/')}}">
                                <img class="default-logo" src="{{asset('assets/front/img/logo.png')}}"  alt=""
                                    style="width: 100px;">
                                <img class="sticky-logo" src="{{asset('assets/front/img/logo.png')}}" style="width: 100px;" 
                                    alt="">
                            </a>
                        </div>
                        <!-- Logo End -->
                    </div>

                    <div class="col-lg-9 col-sm-8 col-4">
                        <!-- Main Menu Begin -->
                        <div class="main-menu d-flex align-items-center justify-content-end">
                            <ul class="nav align-items-center">
                                @php
                                    $activeMenu = "current-menu-parent";
                                    $uris = Request::segment(1);
                                @endphp
                                <li class="{{(!$uris) ? $activeMenu : null}}">
                                    <a href="/">Beranda</a>
                                </li>
                                <li class="{{($uris == 'profiles') ? $activeMenu : null}}">
                                    <a href="{{url('profiles')}}">Profil</a>
                                </li>
                                <li class="{{($uris == 'programs') ? $activeMenu : null}}">
                                    <a href="{{url('programs')}}">Program</a>
                                </li>
                                <li class="{{($uris == 'agendas') ? $activeMenu : null}}">
                                    <a href="{{url('agendas')}}">Agenda</a>
                                </li>
                                <li class="{{($uris == 'umkms') ? $activeMenu : null}}">
                                    <a href="{{url('umkms')}}">Komunitas UMKM</a>
                                </li>
                                <li class="{{($uris == 'articles') ? $activeMenu : null}}"><a href="{{url('articles')}}">Artikel</a></li>
                                <li class="{{($uris == 'mitras') ? $activeMenu : null}}"><a href="{{url('mitras')}}">Mitra</a></li>
                            </ul>
                            <!-- Offcanvas Holder Trigger -->
                            <span class="offcanvas-trigger text-right d-none d-lg-block">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                            <!-- Offcanvas Trigger End -->
                        </div>
                        <!-- Main Menu ENd -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Style One End -->
    </header>
    <!-- Header End -->

    @yield('content')

    <!-- Offcanvas Begin -->
    <div class="offcanvas-overlay fixed-top w-100 h-100"></div>
    <div class="offcanvas-wrapper bg-white fixed-top h-100">
        <!-- Offcanvas Close Button Begin -->
        <div class="offcanvas-close position-absolute">
            <img src="{{asset('assets/front/img/icons/close.svg')}}" class="svg" alt="">
        </div>
        <!-- Offcanvas Close Button End -->

        <!-- Offcanvas Content Begin -->
        <div class="offcanvas-content">
            <!-- About Widget Begin -->
            <div class="widget widget_about">
                <div class="widget-logo">
                    <img src="{{asset('assets/front/img/logo.png')}}"  alt="">
                </div>

            <!-- Offcanvas Button Begin -->
            @if (Auth::check())
                <div class="offcanvas-btn btn-block">
                    <a href="{{url('home')}}" class="btn"><span>Dashboard</span></a>
                </div>
            @else
                <div class="offcanvas-btn btn-block">
                    <a href="{{url('login')}}" class="btn"><span>Login</span></a>
                </div>
            @endif
            <!-- Offcanvas Button End -->
        </div>
        <!-- Offcanvas Content End -->
    </div>
    <!-- Offcanvas End -->
</div>

<footer class="footer bg-light section-pattern footer-bg" data-bg-img="assets/img/section-pattern/footer-pattern.png">
        <!-- Footer Top Begin -->
        <div class="footer-top pt-60">
            <div class="container border-bottom">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <!-- Contact Widget Begin -->
                        <div class="widget widget_contact_info">
                            <!-- Widget Logo Begin -->
                            <div class="widget-logo">
                                <img src="{{asset('assets/front/img/logo.png')}}" alt="" width="150px">
                            </div>
                            <!-- Widget Logo End -->


                        </div>
                        <!-- About Widget End -->
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <!-- Widget Recent Post Begin -->
                        <div class="widget widget_recent_entries">
                            <!-- Widget Title Begin  -->
                            <div class="widget-title">
                                <h4>Artikel Terakhir</h4>
                            </div>
                            <!-- Widget Title End  -->
                            @php
                                $artikel = App\Artikel::orderBy('created_at', 'DESC')->limit(2)->get();
                            @endphp
                            <!-- Single Latest Post Begin -->
                            @foreach ($artikel as $item)
                                <div class="single-post media">
                                    {{-- <div class="post-image">
                                        <img src="{{avatar($item->gambar)}}" data-rjs="2" alt="">
                                    </div> --}}
                                    <div class="post-content media-body">
                                        <span class="posted-on">{{tgl_indo($item->created_at)}}</span>
                                        <h5><a href="#">{{$item->judul}}</a></h5>
                                    </div>
                                </div>
                            @endforeach
                            <!-- Single Latest Post End -->
                        </div>
                        <!-- Widget Recent Post End -->
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <!-- Widget Quick Nav -->
                        <div class="widget widget_nav_menu">
                            <!-- Widget Title Begin  -->
                            <div class="widget-title">
                                <h4>Menu</h4>
                            </div>
                            <!-- Widget Title End  -->

                            <!-- Menu Begin -->
                            <ul class="menu">
                                <li><a href="{{url('/')}}">Beranda</a></li>
                                <li><a href="{{url('profiles')}}">Profile</a></li>
                                <li><a href="{{url('agendas')}}">Agenda</a></li>
                                <li><a href="{{url('umkms')}}">UMKM</a></li>
                                <li><a href="{{url('articles')}}">Artikel</a></li>
                                <li><a href="{{url('mitras')}}">Mitra</a></li>
                            </ul>
                            <!-- Menu End -->
                        </div>
                        <!-- Widget Quick Nav -->
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <!-- Widget Newsletter Begin -->
                        <div class="widget widget_newsletter">
                            <!-- Widget Title Begin  -->
                            <div class="widget-title">
                                <h4>Kontak</h4>
                            </div>
                            @php
                                $profile = App\Profile::first();
                            @endphp
                            <!-- Widget Title End  -->
                            <!-- Widget Content Begin -->
                            <div class="info-content">
                                <div class="single-info">
                                    <span><i class="fa fa-home"></i> Lokasi Kantor</span>
                                    <p>{{$profile['alamat']}}</p>
                                </div>
                                <div class="single-info">
                                    <span><i class="fa fa-phone"></i> Telepon</span>
                                    <p>{{$profile['telepon']}}</p>
                                </div>
                                <div class="single-info">
                                    <span><i class="fa fa-envelope"></i> Support mail</span>
                                    <p>
                                        {{$profile['email']}}
                                    </p>
                                </div>
                            </div>
                            <!-- Widget Content End -->

                        </div>
                        <!-- Widget Newsletter End -->

                        <!-- Widget Social Icon Begin -->
                        <div class="widget widget_social_icon">
                            <ul class="social_icon_list list-inline">
                                <li>
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div>
                        <!-- Widget Social Icon End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Top End -->

        <!-- Footer Bottom Begin -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="copyright-text text-center">
                            <span><a href="{{url('/')}}">Rumah CreativePreneur Indonesia</a> &copy; Copyright 2021. <br> Crafted with <i class="fa fa-heart text-warning"></i> by <a href="https://tahungoding.com/">TAHUNGODING.</a> </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->

    </footer>
    <!-- Footer End -->

    <!-- Back to Top Begin -->
    <a href="#" class="back-to-top position-fixed">
        <div class="back-toop-tooltip"><span>Back To Top</span></div>
        <div class="top-arrow"></div>
        <div class="top-line"></div>
    </a>
    <!-- Back to Top End -->

    <!-- ======= jQuery Library ======= -->
    <script src="{{asset('assets/front/js/jquery.min.j')}}s"></script>

    <!-- ======= Bootstrap Bundle JS ======= -->
    <script src="{{asset('assets/front/js/bootstrap.bundle.min.js')}}"></script>

    <!-- =======  Mobile Menu JS ======= -->
    <script src="{{asset('assets/front/js/menu.min.js')}}"></script>

    <!-- ======= Waypoints JS ======= -->
    <script src="{{asset('assets/front/plugins/waypoints/jquery.waypoints.min.js')}}"></script>

    <!-- ======= Counter Up JS ======= -->
    <script src="{{asset('assets/front/plugins/waypoints/jquery.counterup.min.js')}}"></script>

    <!-- ======= Owl Carousel JS ======= -->
    <script src="{{asset('assets/front/plugins/owlcarousel/owl.carousel.min.j')}}s"></script>

    <!-- ======= Isotope JS ====== -->
    <script src="{{asset('assets/front/plugins/isotope/isotope.pkgd.min.js')}}"></script>

    <!-- ======= Magnific Popup JS ======= -->
    <script src="{{asset('assets/front/plugins/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

    <!-- ======= Countdown JS ======= -->
    <script src="{{asset('assets/front/plugins/countdown/countdown.min.js')}}"></script>

    <!-- ======= Retina JS ======= -->
    <script src="{{asset('assets/front/plugins/retinajs/retina.min.js')}}"></script>

    <!-- ======= Google API ======= -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjkssBA3hMeFtClgslO2clWFR6bRraGz0"></script>

    <!-- ======= Main JS ======= -->
    <script src="{{asset('assets/front/js/main.js')}}"></script>

    <!-- ======= Custom JS ======= -->
    <script src="{{asset('assets/front/js/custom.js')}}"></script>
    <script src="{{ asset('js/share.js') }}"></script>

    @yield('js')

    </body>

    </html>
