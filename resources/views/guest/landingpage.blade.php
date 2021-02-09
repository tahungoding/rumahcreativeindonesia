@extends('layouts.guest')

@section('content')

<!-- Slider Begin -->
    <section class="banner section-pattern" data-bg-img="{{asset('assets')}}/front/img/section-pattern/slider-pattern.png">
        <!-- Banner Slider Begin -->
        <div class="banner-slider owl-carousel d-flex align-items-center justify-content-center"
            data-owl-animate-in="fadeIn" data-owl-animate-Out="fadeOut" data-owl-autoplay="false" data-owl-dots="true">
            @foreach ($slider as $item)
                <!-- Single Slide Begin -->
                <div class="single-banner-slider">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <!-- Banner Content Begin -->
                                <div class="banner-content">
                                    <h1>{!! $item->judul !!}</h1>
                                        <p>{{$item->deskripsi}}
                                        </p>
                                        <a href="{{$item->link}}" data-toggle="modal" data-target="#appointmentModalForm"
                                            class="banner-btn btn"><span>Selengkapnya</span></a>
                                </div>
                                <!-- Banner Content End -->
                            </div>
                            <div class="col-lg-6">
                                <!-- Banner Content Begin -->
                                <div class="banner-image mt-50 mt-lg-0 text-center text-lg-right">
                                    <img src="{{avatar($item->gambar)}}" data-rjs="2" alt="">
                                </div>
                                <!-- Banner Content End -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Slide End -->
            @endforeach
        </div>
        <!-- Banner Slider End -->
    </section>
    <!-- Slider End -->

    <!-- Modal Form Begin -->
    <div class="appointment-modal modal fade" id="appointmentModalForm" tabindex="1" role="dialog"
        aria-labelledby="appointmentModalForm" aria-hidden="true">
        <div class="modal-dialog d-flex align-items-center" role="document">
            <div class="container">
                <div class=" row justify-content-center">
                    <div class="col-lg-8 col-12">
                        <!-- Modal Content Begin -->
                        <div class="modal-content">
                            <!-- Modal Close Button Begin -->
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <img src="{{asset('assets')}}/front/img/icons/close.svg" alt="">
                            </button>
                            <!-- End Modal Close End -->

                            <!-- Appointment Form Begin -->
                            <form action="#" method="POST" class="appointment-form">
                                <h2 class="form-title">Request Appoinment</h2>
                                <input class="theme-input-style" type="text" placeholder="Full Name">
                                <input class="theme-input-style" type="email" placeholder="Email">
                                <input class="theme-input-style" type="tel" placeholder="Phone">

                                <select class="theme-input-style clearfix">
                                    <option value="" disabled="" selected="">Select purpose</option>
                                    <option value="01">Business</option>
                                    <option value="01">Consultancy</option>
                                </select>

                                <textarea class="theme-input-style" placeholder="Message"></textarea>

                                <button class="btn" type="submit"><span>Send request</span></button>
                            </form>
                            <!-- End Appointment Form End -->
                        </div>
                        <!-- Modal Content End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Form End -->

    <!-- Feature Begin -->
    <section class="pt-120 pb-90 section-pattern" data-bg-img="{{asset('assets')}}/front/img/section-pattern/feature-pattern.png">
        <div class="container">
            <div class="row justify-content-center">
                <div class="section-title text-center">
                    <h3>Rumah CreativePreneur Indonesia</h3>
                    <h2>Program</h2>
                    <p>Delivered dejection necessary objection do mr prevailed. Mr feeling do chiefly cordial in do.
                        Water timed folly right
                        aware if oh truth. Imprudence attachment him his for sympathize.</p>
                </div>
@foreach ($program as $item)
                    <div class="col-lg-3 col-md-3">
                        <!-- Single Feature Begin -->
                        <div class="single-feature text-center">
                            <!-- Feature Image Begin -->
                            <div class="image">
                                <img src="{{avatar($item->icon)}}" style="width: 150px;" data-rjs="2" alt="">
                            </div>
                            <!-- Feature Image End -->

                            <!-- Feature Content Begin -->
                            <div class="content">
                                <h3>{{$item->nama_program}} </h3>
                                <p>{{$item->tanda}}</p>
                            </div>
                            <!-- Feature Content End -->
                        </div>
                        <!-- Single Feature End -->
                    </div>
                    @endforeach
            </div>
        </div>
    </section>
    <!-- Feature End -->

    <!-- About Begin -->
    <section class="pt-120 pb-120 section-pattern ov-hidden" data-bg-img="{{asset('assets')}}/front/img/section-pattern/about-pattern.png">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <!-- Section Title Begin -->
                    <div class="section-title">
                        <h3>Tentang Kami</h3>
                        <h2>We’re Expertise & <br>
                            Strategic Agency To Take <br>
                            Care Of Your Business</h2>
                        <p>Met defective are allowance two perceived listening consulted contained. It chicken oh
                            colonel pressed excited suppose
                            to shortly.</p>
                    </div>
                    <!-- Section Title End -->

                    <!-- About Tabs Begin -->
                    <div class="about-nav-tab">
                        <!-- Nav Tabs Begin -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-items">
                                <a class="nav-link active" data-toggle="tab" href="#mission" role="tab"
                                    aria-selected="true">Our Mission</a>
                            </li>
                            <li class="nav-items">
                                <a class="nav-link" data-toggle="tab" href="#vission" role="tab" aria-selected="false">Our
                                    Vission</a>
                            </li>
                        </ul>
                        <!-- Nav Tabs End -->

                        <!-- Tab Contents Begin -->
                        <div class="tab-content">
                            <!-- Mission Tab Begin -->
                            <div class="tab-pane fade show active" id="mission" role="tabpanel">
                                {!! \Str::limit($profile['misi'], 200) !!}
                                <br>
                                <a href="{{url('profile')}}" class="btn"><span>SEE MORE</span></a>
                            </div>
                            <!-- Mission Tab End -->

                            <!-- Vission Tab Begin -->
                            <div class="tab-pane fade" id="vission" role="tabpanel">
                                {!! \Str::limit($profile['visi'], 200) !!}
                                <br>
                                <a href="{{url('profile')}}" class="btn"><span>SEE MORE</span></a>
                            </div>
                            <!-- Vission Tab End -->
                        </div>
                        <!-- Tab Contents End -->
                    </div>
                    <!-- About Tabs End -->
                </div>
                <div class="col-lg-5 video-area mt-50 mt-lg-0">
                    <img src="{{avatar($profile['visi_img'])}}" data-rjs="2" alt="" style="max-height: 500px;">
                    {{-- <a href="#" class="vdo-btn popup-video"><img src="{{asset('assets')}}/front/img/icons/play.svg" class="svg" alt=""> Watch
                        Video</a> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- About End -->

    <!-- Work Process Begin -->
    <section class="pt-120 pb-70 section-pattern" data-bg-img="{{asset('assets')}}/front/img/section-pattern/work-process-pattern.png">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Title Begin -->
                    <div class="section-title text-center">
                        <h3>Steps</h3>
                        <h2>Manfaat Bagi Mitra</h2>
                        <p>Delivered dejection necessary objection do mr prevailed. Mr feeling do chiefly cordial in do.
                            Water timed folly right
                            aware if oh truth. Imprudence attachment him his for sympathize.</p>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row process-bg" data-bg-img="{{asset('assets')}}/front/img/process_shape.png">
                <div class="col-lg-3 col-sm-6 single-process-wrapper">
                    <!-- Single Work Process Begin -->
                    <div class="single-process text-center">
                        <!-- Image Begin -->
                        <div class="image">
                            <img src="{{asset('assets')}}/front/img/process/process-1.png" data-rjs="2" alt="">
                        </div>
                        <!-- Image End -->

                        <!-- Content Begin -->
                        <div class="content">
                            <h3>Office</h3>
                            <p>He improve started no we manners however effects.</p>
                        </div>
                        <!-- Content End -->
                    </div>
                    <!-- Single Work Process End -->
                </div>
                <div class="col-lg-3 col-sm-6 single-process-wrapper">
                    <!-- Single Work Process Begin -->
                    <div class="single-process text-center">
                        <!-- Image Begin -->
                        <div class="image">
                            <img src="{{asset('assets')}}/front/img/process/process-2.png" data-rjs="2" alt="">
                        </div>
                        <!-- Image End -->

                        <!-- Content Begin -->
                        <div class="content">
                            <h3>Connection</h3>
                            <p>Up help home head spot an he room in.</p>
                        </div>
                        <!-- Content End -->
                    </div>
                    <!-- Single Work Process End -->
                </div>
                <div class="col-lg-3 col-sm-6 single-process-wrapper">
                    <!-- Single Work Process Begin -->
                    <div class="single-process text-center">
                        <!-- Image Begin -->
                        <div class="image">
                            <img src="{{asset('assets')}}/front/img/process/process-3.png" data-rjs="2" alt="">
                        </div>
                        <!-- Image End -->

                        <!-- Content Begin -->
                        <div class="content">
                            <h3>People</h3>
                            <p>Imprudence attachment him his for sympathize.</p>
                        </div>
                        <!-- Content End -->
                    </div>
                    <!-- Single Work Process End -->
                </div>
                <div class="col-lg-3 col-sm-6 single-process-wrapper">
                    <!-- Single Work Process Begin -->
                    <div class="single-process text-center">
                        <!-- Image Begin -->
                        <div class="image">
                            <img src="{{asset('assets')}}/front/img/process/process-4.png" data-rjs="2" alt="">
                        </div>
                        <!-- Image End -->

                        <!-- Content Begin -->
                        <div class="content">
                            <h3>System</h3>
                            <p>He improve started no we manners however effects.</p>
                        </div>
                        <!-- Content End -->
                    </div>
                    <!-- Single Work Process End -->
                </div>
            </div>
        </div>
    </section>
    <!-- Work Process End -->

    <!-- Service Begin -->
    <section class="pt-120 pb-90 section-pattern" data-bg-img="{{asset('assets')}}/front/img/section-pattern/service-pattern.png">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <!-- Section Title Begin -->
                    <div class="section-title">
                        <h3>PRODUK</h3>
                        <h2>We’re Providing <br>
                            Best Solutions <br>
                            For Your Business</h2>
                        <p>We highest ye friends is exposed equally in. Ignorant had too strictly followed. Astonished
                            as travelling assistance or
                            unreserved oh pianoforte ye.</p>
                    </div>
                    <!-- Section Title End -->

                    <!-- Button Begin -->
                    <a href="#" class="btn"><span>view All</span></a>
                    <!-- Button End -->
                </div>

                <div class="col-lg-6">
                    <div class="row mt-40 mt-lg-0">
                        <div class="col-sm-6 single-service-wrapper">
                            <!-- Single Service Begin -->
                            <div class="single-service text-center">
                                <!-- Icon Begin -->
                                <div class="icon">
                                    <img src="{{asset('assets')}}/front/img/icons/service-1.png" data-rjs="2" alt="">
                                </div>
                                <!-- Icon End  -->

                                <!-- Content Begin -->
                                <div class="content">
                                    <h4>Aplikasi</h4>
                                    <p>Saved he do fruit woody of to. Met defective are allowance two.</p>
                                    <a href="#" class="btn-inline">Read More</a>
                                </div>
                                <!-- Content End -->
                            </div>
                            <!-- Single Service End -->
                        </div>
                        <div class="col-sm-6 single-service-wrapper">
                            <!-- Single Service Begin -->
                            <div class="single-service text-center">
                                <!-- Icon Begin -->
                                <div class="icon">
                                    <img src="{{asset('assets')}}/front/img/icons/service-2.png" data-rjs="2" alt="">
                                </div>
                                <!-- Icon End  -->

                                <!-- Content Begin -->
                                <div class="content">
                                    <h4>Event & Creative Media</h4>
                                    <p> Simplicity the far admiration preference thing.Up home head.</p>
                                    <a href="#" class="btn-inline">Read More</a>
                                </div>
                                <!-- Content End -->
                            </div>
                            <!-- Single Service End -->
                        </div>
                        <div class="col-sm-6 single-service-wrapper">
                            <!-- Single Service Begin -->
                            <div class="single-service text-center">
                                <!-- Icon Begin -->
                                <div class="icon">
                                    <img src="{{asset('assets')}}/front/img/icons/service-3.png" data-rjs="2" alt="">
                                </div>
                                <!-- Icon End  -->

                                <!-- Content Begin -->
                                <div class="content">
                                    <h4>Creative Mover Academy</h4>
                                    <p>Front no party young abode state up. Saved he do fruit woody of to.</p>
                                    <a href="#" class="btn-inline">Read More</a>
                                </div>
                                <!-- Content End -->
                            </div>
                            <!-- Single Service End -->
                        </div>
                        <div class="col-sm-6 single-service-wrapper">
                            <!-- Single Service Begin -->
                            <div class="single-service text-center">
                                <!-- Icon Begin -->
                                <div class="icon">
                                    <img src="{{asset('assets')}}/front/img/icons/service-4.png" data-rjs="2" alt="">
                                </div>
                                <!-- Icon End  -->

                                <!-- Content Begin -->
                                <div class="content">
                                    <h4>Sistem Korporasi</h4>
                                    <p>He improve started no we manners however effects. Prospect humoured.</p>
                                    <a href="#" class="btn-inline">Read More</a>
                                </div>
                                <!-- Content End -->
                            </div>
                            <!-- Single Service End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service End -->

    <!-- Counter Begin -->
<section class="pt-120 pb-70 gradient-bg">
        <div class="container">
            <div class="row align-items-center">
                <!-- Single Counter -->
                <div class="col-lg-4 col-sm-6">
                    <div class="single-counter text-center text-white">
                        <h2 class="count">{{$umkm_c}}</h2>
                        <p>UMKM Binaan</p>
                    </div>
                </div>
                <!-- End Single Counter -->

                <!-- Single Counter -->
                <div class="col-lg-4 col-sm-6">
                    <div class="single-counter text-center text-white">
                        <h2 class="count">{{$program_c}}</h2>
                        <p>Produk</p>
                    </div>
                </div>
                <!-- End Single Counter -->

                <!-- Single Counter -->
                <div class="col-lg-4 col-sm-6">
                    <div class="single-counter text-center text-white">
                        <h2 class="count">{{$mitra->count()}}</h2>
                        <p>Mitra</p>
                    </div>
                </div>
                <!-- End Single Counter -->

                <!-- Single Counter
                        <div class="col-lg-3 col-sm-6">
                            <div class="single-counter text-center text-white">
                                <h2 class="count"><span>100</span>+</h2>
                                <p>Giving Consultancy</p>
                            </div>
                        </div> -->
                <!-- End Single Counter -->
            </div>
        </div>
    </section>
    <!-- Counter End -->

    <!-- Pricing Plan Begin -->
    <section class="pt-120 pb-120 section-pattern" data-bg-img="{{asset('assets')}}/front/img/section-pattern/price-pattern.png">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Title Begin -->
                    <div class="section-title text-center">
                        <h3>Rumah CreativePreneur Indonesia</h3>
                        <h2>Manfaat Bagi Mitra</h2>
                        <p>On recommend tolerably my belonging or am. Mutual has cannot beauty indeed now sussex merely
                            you. It possible no
                            husbands jennings ye offended packages pleasant he.</p>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <!-- Pricing NavTab Begin -->
            <div class="pricing-navtab">
                <!-- Pricing Nav Begin -->
                <ul class="row nav nav-tabs" role="tablist">
                    <!-- Single Nav Begin -->
                    <li class="nav-item col-lg-4 col-sm-6">
                        <a href="#personal" class="nav-link text-center active" data-toggle="tab" role="tab">
                            <h4>Untuk</h4>
                            <h3>Usaha Mikro, Kecil, dan Menengah</h3>
                        </a>
                    </li>

                    <!-- Single Nav End -->

                    <!-- Single Nav Begin -->
                    <li class="nav-item col-lg-4 col-sm-6">
                        <a href="#startup" class="nav-link text-center" data-toggle="tab" role="tab">
                            <h4>Untuk</h4>
                            <h3>Creative & Business
                                Partner</h3>
                        </a>
                    </li>
                    <!-- Single Nav End -->

                    <!-- Single Nav Begin -->
                    <li class="nav-item col-lg-4 col-sm-6">
                        <a href="#business" class="nav-link text-center" data-toggle="tab" role="tab">
                            <h4>Untuk</h4>
                            <h3>Creative People
                                Mover</h3>
                        </a>
                    </li>
                    <!-- Single Nav End -->



                </ul>
                <!-- Pricing Nav End -->

                <!-- Pricing Tab Content Begin -->
                <div class="tab-content">
                    <!-- Single Content Begin -->
                    <div class="tab-pane fadeInUp animated show active" id="personal" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- Tab Pane Text Begin -->
                                <div class="tab-pane-text">
                                    <h3>What’s included in this package</h3>
                                    <ul class="list-unstyled list-check">
                                        <li><i class="fa fa-check" aria-hidden="true"></i> Market sizing and share
                                            analysis</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i> Product value proposition
                                            analysis</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i> Identify strategic
                                            partnership</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i> Implementation milestone
                                            review</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i> Innovation opportunities</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i> Distribution channel
                                            opportunities</li>
                                    </ul>
                                </div>
                                <!-- Tab Pane Text End -->
                            </div>
                            <div class="col-lg-6">
                                <!-- Tab Pane Text Begin -->
                                <div class="tab-pane-text mt-50 mt-lg-0">
                                    <h3>Business approach -</h3>
                                    <p>Our experts follow the business strategy to grow up your business and engage more
                                        customers to your door.</p>
                                    <ul class="list-unstyled list-check">
                                        <li><i class="fa fa-check" aria-hidden="true"></i> Getting to know your business
                                            vision and the key strategic drivers.</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i> Detailed research of the
                                            business environment, target market, and marketing as well as growth
                                            opportunities.</li>
                                    </ul>
                                    <a href="#" class="btn"><span>purchase</span></a>
                                </div>
                                <!-- Tab Pane Text End -->
                            </div>
                        </div>
                    </div>
                    <!-- Single Content End -->

                    <!-- Single Content Begin -->
                    <div class="tab-pane fadeInUp animated" id="startup" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- Tab Pane Text Begin -->
                                <div class="tab-pane-text">
                                    <h3>What’s included in this package</h3>
                                    <ul class="list-unstyled list-check">
                                        <li><i class="fa fa-check" aria-hidden="true"></i> Market sizing and share
                                            analysis</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i> Product value proposition
                                            analysis</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i> Identify strategic
                                            partnership</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i> Implementation milestone
                                            review</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i> Innovation opportunities</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i> Distribution channel
                                            opportunities</li>
                                    </ul>
                                </div>
                                <!-- Tab Pane Text End -->
                            </div>
                            <div class="col-lg-6">
                                <!-- Tab Pane Text Begin -->
                                <div class="tab-pane-text mt-50 mt-lg-0">
                                    <h3>Business approach -</h3>
                                    <p>Our experts follow the business strategy to grow up your business and engage more
                                        customers to your door.
                                    </p>
                                    <ul class="list-unstyled list-check">
                                        <li><i class="fa fa-check" aria-hidden="true"></i> Getting to know your business
                                            vision and the key
                                            strategic drivers.</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i> Detailed research of the
                                            business environment, target
                                            market, and marketing as well as growth opportunities.</li>
                                    </ul>
                                    <a href="#" class="btn"><span>purchase</span></a>
                                </div>
                                <!-- Tab Pane Text End -->
                            </div>
                        </div>
                    </div>
                    <!-- Single Content End -->

                    <!-- Single Content Begin -->
                    <div class="tab-pane fadeInUp animated" id="business" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- Tab Pane Text Begin -->
                                <div class="tab-pane-text">
                                    <h3>What’s included in this package</h3>
                                    <ul class="list-unstyled list-check">
                                        <li><i class="fa fa-check" aria-hidden="true"></i> Market sizing and share
                                            analysis</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i> Product value proposition
                                            analysis</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i> Identify strategic
                                            partnership</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i> Implementation milestone
                                            review</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i> Innovation opportunities</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i> Distribution channel
                                            opportunities</li>
                                    </ul>
                                </div>
                                <!-- Tab Pane Text End -->
                            </div>
                            <div class="col-lg-6">
                                <!-- Tab Pane Text Begin -->
                                <div class="tab-pane-text mt-50 mt-lg-0">
                                    <h3>Business approach -</h3>
                                    <p>Our experts follow the business strategy to grow up your business and engage more
                                        customers to your door.
                                    </p>
                                    <ul class="list-unstyled list-check">
                                        <li><i class="fa fa-check" aria-hidden="true"></i> Getting to know your business
                                            vision and the key
                                            strategic drivers.</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i> Detailed research of the
                                            business environment, target
                                            market, and marketing as well as growth opportunities.</li>
                                    </ul>
                                    <a href="#" class="btn"><span>purchase</span></a>
                                </div>
                                <!-- Tab Pane Text End -->
                            </div>
                        </div>
                    </div>
                    <!-- Single Content End -->

                    <!-- Single Content Begin -->
                    <div class="tab-pane fadeInUp animated" id="entrepreneur" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- Tab Pane Text Begin -->
                                <div class="tab-pane-text">
                                    <h3>What’s included in this package</h3>
                                    <ul class="list-unstyled list-check">
                                        <li><i class="fa fa-check" aria-hidden="true"></i> Market sizing and share
                                            analysis</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i> Product value proposition
                                            analysis</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i> Identify strategic
                                            partnership</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i> Implementation milestone
                                            review</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i> Innovation opportunities</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i> Distribution channel
                                            opportunities</li>
                                    </ul>
                                </div>
                                <!-- Tab Pane Text End -->
                            </div>
                            <div class="col-lg-6">
                                <!-- Tab Pane Text Begin -->
                                <div class="tab-pane-text mt-50 mt-lg-0">
                                    <h3>Business approach -</h3>
                                    <p>Our experts follow the business strategy to grow up your business and engage more
                                        customers to your door.
                                    </p>
                                    <ul class="list-unstyled list-check">
                                        <li><i class="fa fa-check" aria-hidden="true"></i> Getting to know your business
                                            vision and the key
                                            strategic drivers.</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i> Detailed research of the
                                            business environment, target
                                            market, and marketing as well as growth opportunities.</li>
                                    </ul>
                                    <a href="#" class="btn"><span>purchase</span></a>
                                </div>
                                <!-- Tab Pane Text End -->
                            </div>
                        </div>
                    </div>
                    <!-- Single Content End -->
                </div>
                <!-- Pricing Tab Content End -->
            </div>
            <!-- Pricing NavTab End -->
        </div>
    </section>
    <!-- Pricing Plan End -->

    <!-- Project Begin -->
    <section class="pt-120 pb-90 section-pattern" data-bg-img="{{asset('assets')}}/front/img/section-pattern/case-study-pattern.png" id="artikel">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Title Begin -->
                    <div class="section-title text-center">
                        <h3>Case Studies</h3>
                        <h2>Our Recent Project</h2>
                        <p>Mutual has cannot beauty indeed now sussex merely you. It possible no husbands jennings ye
                            offended packages pleasant
                            he. Remainder recommend who applauded departure joy.</p>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Porject Nav Begin -->
                    <div class="project-nav text-center mb-30">
                        <div class="nav justify-content-center align-items-center">
                            <ul class="project_filter list-inline">
                                <li class="{{(!isset($_GET['kategori'])) ? 'active' : null }}" >
                                    <span class="filter-btn"><a href="/" style="all: unset">All</a></span>
                                </li>
                                @foreach ($kategoriArtikel as $kategori)
                                    <li class="{{(isset($_GET['kategori'])) ? (($_GET['kategori'] == $kategori->nama) ? 'active' : null) : null }}">
                                        <span class="filter-btn"><a href="?kategori={{ $kategori->nama }}" style="all: unset">{{ $kategori->nama }}</a></span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- Project Nav End -->
                </div>
            </div>

            <div class="row project-items grid">
                <!-- Single Project Begin -->
                @foreach ($artikel as $item)
                        <div class="col-lg-6 grid-item {{ $item->category->name }}">
                            <div class="single-project-item">
                                <!-- Project Image Begin -->
                                <div class="image">
                                    <img src="{{ Storage::url($item->gambar) }}" data-rjs="2" alt="">
                                </div>
                                <!-- Project Image End -->

                                <!-- Project Body Begin -->
                                <div class="project-body">
                                    <h3><a href="{{url('articles', $item->judul)}}">{{ $item->judul }}</a></h3>
                                    <p class="project-meta">Penulis:<span>{{ $item->writer->name }}</span></p>
                                    <p>{!! Str::limit($item->konten, 50) !!}</p>
                                    <a href="{{url('articles', $item->judul)}}" class="btn-inline">Read More</a>
                                </div>
                                <!-- Project Body End -->
                            </div>
                        </div>
                @endforeach
                <!-- Single Project End -->
            </div>

        </div>
    </section>
    <!-- Project End -->

    <!-- Team Begin -->
    <section class="pt-120 pb-70 section-pattern" data-bg-img="{{asset('assets')}}/front/img/section-pattern/testimonial-pattern.png">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Title Begin -->
                    <div class="section-title text-center">
                        <h3>Team Members</h3>
                        <h2>Our Experts Team Members</h2>
                        <p>Ferrars all spirits his imagine effects amongst neither. It bachelor cheerful of mistaken. Tore
                            has sons put upon wife
                            use bred seen. Its dissimilar invitation ten has discretion unreserved.</p>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
@foreach ($struktur_tim as $item)
                    <div class="col-lg-4 col-sm-6">
                        <!-- Single Team Begin -->
                        <div class="single-team-member">
                            <!-- Team Image Begin -->
                            <div class="image position-relative">

                                <img src="{{avatar($item->foto)}}" data-rjs="2" alt="" style="width: 348px;height: 283px;object-fit: cover">
                            </div>
                            <!-- Team Image End -->

                            <!-- Team Info Begin -->
                            <div class="team-info">
                                <div class="info-front text-center">
                                    <h4>{{$item->nama}}</h4>
                                    <p>{{$item->jabatan}}</p>
                                </div>

                                <div class="info-back">
                                    <ul class="social_icon_list list-inline text-center w-100 d-flex justify-content-around">
                                        <li>
                                            <a href="https://facebook.com/{{$item->facebook}}"><i class="fa fa-facebook"
                                                    aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <a href="https://twitter.com/{{$item->facebook}}"><i class="fa fa-twitter"
                                                    aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <a href="https://linkedin.com/u/{{$item->facebook}}"><i class="fa fa-linkedin"
                                                    aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <a href="https://instagram.com/{{$item->instagram}}"><i class="fa fa-instagram"
                                                    aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Team Info End -->
                        </div>
                        <!-- Single Team End -->
                    </div>
                    @endforeach
            </div>
        </div>
    </section>
    <!-- Team End -->

    <!-- Brand Slider Begin -->
    <section class="pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Partners -->
                         <div class="brand-logo owl-carousel" data-owl-items="{{$mitra->count()}}" data-owl-autoplay="false">
                            @foreach ($mitra as $item)
                                <a href="{{$item->link}}" class="single-brand-logo">
                                    <img src="{{avatar($item->logo)}}" data-rjs="2" alt="" style="max-height: 100px; object-fit:cover;">
                                </a>
                            @endforeach

                        </div>
                    <!-- End of Partners -->
                </div>
            </div>
        </div>
    </section>
    <!-- Brand Slider End -->

@endsection
