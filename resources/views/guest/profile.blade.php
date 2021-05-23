@extends('layouts.guest')

@section('content')
    <section class="page-title-bg pt-250 pb-100" data-bg-img="{{asset('assets/front/img/section-pattern/page-title.png')}}">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title text-center">
                            <h2>Profil</h2>
                            <ul class="list-inline">
                                <li><a href="{{url('/')}}">Beranda</a></li>
                                <li>Profil</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Page Title End -->

        <!-- About Section Begin -->
        <section class="pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Section Title Begin -->
                        <div class="section-title text-center">
                            {{-- <h3>Hallo Indonesia</h3> --}}
                            <h2>Latar Belakang</h2>
                            {{-- <p>Met defective are allowance two perceived listening consulted contained. It chicken oh colonel
                                pressed
                                excited suppose to shortly.</p> --}}
                        </div>
                        <!-- Section Title End -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <img src="{{avatar($profile['latar_belakang_img'])}}" data-rjs="2" alt="" style="width: 1112px;height: 460px;object-fit: cover" >
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="about-text mt-5">
                            {!! $profile['latar_belakang'] !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Section End -->

        <!-- About Section Begin -->
        <section class="pt-120 pb-120 ov-hidden">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <!-- Section Title Begin -->
                        <div class="section-title mb-4">
                            <h2>VISI</h2>
                            {!! $profile['visi'] !!}
                        </div>
                        <!-- Section Title End -->

                    </div>
                    <!-- Video Area -->
                    <div class="col-lg-5 video-area mt-50 mt-lg-0">
                        <a><img class="roundedrci" src="{{avatar($profile['visi_img'])}}" data-rjs="2" alt="" style="max-height: 500px;"></a> 
                        {{-- <a href="#" class="vdo-btn popup-video"><img src="{{asset('assets/front/img/icons/play.svg')}}" class="svg" alt=""> Watch
                            Video</a> --}}
                    </div>
                    <!-- End Video Area -->
                </div>
            </div>
        </section>
        <!-- About Section Begin -->

        <!-- About Section Begin -->
        <section class="pt-120 pb-120">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                       <a><img class="roundedrci" src="{{avatar($profile['misi_img'])}}" data-rjs="2" class="w-100" alt=""></a> 
                    </div>

                    <div class="col-lg-6">
                        <!-- Section Title Begin -->
                        <div class="section-title mb-4 mt-50 mt-lg-0">
                            <h2>MISI</h2>
                            {!! $profile['misi'] !!}
                        </div>
                        <!-- Section Title End -->

                    </div>
                </div>
            </div>
        </section>
        <!-- About Section End -->

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

        <!-- About Section Begin -->
        <section class="pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Section Title Begin -->
                        <div class="section-title text-center">
                            <h2>Kekuatan Kami</h2>
                        </div>
                        <!-- Section Title End -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <img src="{{avatar($profile['model_konsep_img'])}}" data-rjs="2" alt="" style="width: 1112px;height: 460px;object-fit: cover">
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="about-text mt-5">
                            {!! $profile['kekuatan'] !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Section End -->

        <!-- Team Begin -->
        <section class="pt-120 pb-70 section-pattern" data-bg-img="{{asset('assets/front/img/section-pattern/testimonial-pattern.png')}}">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Section Title Begin -->
                        <div class="section-title text-center">
                            <h2>TEAM</h2>
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
                                                <a href="https://facebook.com/{{$item->facebook}}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            </li>
                                            <li>
                                                <a href="https://twitter.com/{{$item->facebook}}"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            </li>
                                            <li>
                                                <a href="https://linkedin.com/u/{{$item->facebook}}"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                            </li>
                                            <li>
                                                <a href="https://instagram.com/{{$item->instagram}}"><i class="fa fa-instagram" aria-hidden="true"></i></a>
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


        <!-- Testimonial Begin -->
        <section class="pt-120 pb-120 section-pattern" data-bg-img="{{asset('assets/front/img/section-pattern/testimonial-pattern.png')}}">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Section Title Begin -->
                        <div class="section-title text-center">
                            <h2>Testimoni</h2>
                        </div>
                        <!-- Section Title End -->
                    </div>
                </div>

                <!-- Testimonial Slider Begin -->
                <div class="testimonial-slider owl-carousel" data-owl-nav="true" data-owl-autoplay="false"
                    data-owl-animate-Out="fadeOut" data-owl-animate-in="fadeIn" data-owl-margin="3">
                    <!-- Single Testimonial Begin -->
                    @foreach ($testimoni as $item)
                        <div class="single-testimonial-slide">
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <!-- Testimonial Image Begin -->
                                    <div class="testimonial-image mb-50 mb-md-0">
                                       <a><img class="roundedrci" src="{{avatar($item->gambar)}}" data-rjs="2" alt="" style="width: 435px;height: 391px;object-fit: cover"></a> 
                                    </div>
                                    <!-- Testimonial Image End -->
                                </div>

                                <div class="col-md-7">
                                    <!-- Testimonial Content Begin -->
                                    <div class="testimonial-content">
                                        <p>{{$item->isi}}</p>

                                        <h4>{{$item->responden}}</h4>
                                        <span>{{$item->asal}}</span>
                                    </div>
                                    <!-- Testimonial Content End -->
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- Single Testimonial End -->
                </div>
                <!-- Testimonial Slider End -->
            </div>
        </section>
        <!-- Testimonial End -->

        <!-- Brand Slider Begin -->
        <section class="pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Partners -->
                        <div class="brand-logo owl-carousel" data-owl-items="4" data-owl-autoplay="true">
                            @foreach ($mitra as $item)
                                <a href="{{$item->link}}" class="single-brand-logo">
                                    <img src="{{avatar($item->logo)}}" alt="" style="max-height: 100px; object-fit:cover;">
                                </a>
                            @endforeach

                        </div>
                        <!-- End of Partners -->
                    </div>
                </div>
            </div>
        </section>
        <!-- Brand Slider End -->


        <!-- Contact Info Begin -->
        <section class="pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <!-- Contact Info Begin -->
                        <div class="contact-info">
                            <h3>Informasi Kontak</h3>
                            <br>
                            <div class="row">
                                <!-- Single Contact Info -->
                                <div class="col-sm-6 col-lg-12 single-contact-info media align-items-center">
                                    <div class="image">
                                        <img src="{{asset('assets/front/img/icons/location.svg')}}" class="svg" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h4>Lokasi Kantor</h4>
                                        {!! $profile['alamat'] !!}
                                    </div>
                                </div>
                                <!-- End Single Contact Info -->

                                <!-- Single Contact Info -->
                                <div class="col-sm-6 col-lg-12 single-contact-info media align-items-center">
                                    <div class="image">
                                        <img src="{{asset('assets/front/img/icons/phone.svg')}}" class="svg" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h4>Telepon</h4>
                                        {!! $profile['telepon'] !!}
                                    </div>
                                </div>
                                <!-- End Single Contact Info -->

                                <!-- Single Contact Info -->
                                <div class="col-sm-6 col-lg-12 single-contact-info media align-items-center">
                                    <div class="image">
                                        <img src="{{asset('assets/front/img/icons/email.svg')}}" class="svg" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h4>Email</h4>
                                        {!! $profile['email'] !!}
                                    </div>
                                </div>
                                <!-- End Single Contact Info -->

                                <!-- Single Contact Info -->
                                <div class="col-sm-6 col-lg-12 single-contact-info media align-items-center">
                                    <div class="image">
                                        <img src="{{asset('assets/front/img/icons/clock.svg')}}" class="svg" alt="">
                                    </div>
                                    <div class="media-body">
                                        <h4>Jam Kerja</h4>
                                        {!! $profile['jam_kerja'] !!}
                                    </div>
                                </div>
                                <!-- End Single Contact Info -->

                            </div>
                        </div>
                        <!-- Contact Info End -->
                    </div>

                    <div class="col-lg-8">

                        <!-- Start Map -->
                        {{-- <div class="map" data-trigger="map"
                            data-map-options='{"latitude": "40.6785635", "longitude": "-73.9664109", "zoom": "11"}'>
                        </div> --}}
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d990.3371413656272!2d107.93128799473689!3d-6.8487532365199755!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68d1472e031477%3A0x4dec446718641ea1!2sApotek%20Tegalkalong!5e0!3m2!1sid!2ssg!4v1612260032210!5m2!1sid!2ssg"
                            width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                            tabindex="0"></iframe>
                        <!-- End Map -->
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Info End -->
@endsection
