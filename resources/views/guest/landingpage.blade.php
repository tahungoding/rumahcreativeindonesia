@extends('layouts.guest')

@section('content')

<!-- Slider Begin -->
<section class="banner section-pattern" data-bg-img="{{asset('assets')}}/front/img/section-pattern/slider-pattern.png">
    <!-- Banner Slider Begin -->
    <div class="banner-slider owl-carousel d-flex align-items-center justify-content-center" data-owl-animate-in="fadeIn" data-owl-animate-Out="fadeOut" data-owl-autoplay="true" data-owl-dots="true">
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
                            <a href="{{$item->link}}" data-toggle="modal" data-target="#appointmentModalForm" class="banner-btn btn"><span>Selengkapnya</span></a>
                        </div>
                        <!-- Banner Content End -->
                    </div>
                    <div class="col-lg-6">
                        <!-- Banner Content Begin -->
                        <div class="banner-image mt-50 mt-lg-0 text-center text-lg-right">
                            <a><img style="width: 500px;object-fit:cover;" src="{{avatar($item->gambar)}}" data-rjs="2" alt=""></a>
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


<!-- Feature Begin -->
<section class="section-pattern" data-bg-img="{{asset('assets')}}/front/img/section-pattern/feature-pattern.png">
    <div class="container">
        <div class="row justify-content-center">
            <div class="section-title text-center">
                <h3>Rumah Creativepreneur Indonesia</h3>
                <h2>Program</h2>
                <p>Berikut adalah program-program Rumah Creativepreneur Indonesia yang berlandaskan pada konsep CSV <i>(Created Shared Value)</i>  dan CSR <i>(Corporate Social Responsibility)</i> </p>
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
                        <h3>{{$item->nama_program}}  </h3>
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
                    <h2>Berawal dari sebuah gagasan untuk berkontribusi membangun Indonesia melalui ekonomi kreatif</h2>
                    <p>Kami melihat bahwa pemberdayaan Usaha Mikro, Kecil, & Menengah (UMKM) serta memaksimalkan potensi bonus demografi adalah jalan untuk mewujudkan hal tersebut.</p>
                </div>
                <!-- Section Title End -->

                <!-- About Tabs Begin -->
                <div class="about-nav-tab">
                    <!-- Nav Tabs Begin -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-items">
                            <a class="nav-link active" data-toggle="tab" href="#mission" role="tab" aria-selected="true">Misi</a>
                        </li>
                        <li class="nav-items">
                            <a class="nav-link" data-toggle="tab" href="#vission" role="tab" aria-selected="false">Visi</a>
                        </li>
                    </ul>
                    <!-- Nav Tabs End -->

                    <!-- Tab Contents Begin -->
                    <div class="tab-content">
                        <!-- Mission Tab Begin -->
                        <div class="tab-pane fade show active" id="mission" role="tabpanel">
                            {!! \Str::limit($profile->misi, 200) !!}
                            <br><br>
                            <a href="{{url('profiles')}}" class="btn"><span>Selengkapnya</span></a>
                        </div>
                        <!-- Mission Tab End -->

                        <!-- Vission Tab Begin -->
                        <div class="tab-pane fade" id="vission" role="tabpanel">
                            {!! \Str::limit($profile->visi, 200) !!}
                            <br><br>
                            <a href="{{url('profiles')}}" class="btn"><span>Selengkapnya</span></a>
                        </div>
                        <!-- Vission Tab End -->
                    </div>
                    <!-- Tab Contents End -->
                </div>
                <!-- About Tabs End -->
            </div>
            <div class="col-lg-5 video-area mt-50 mt-lg-0">
                <a><img class="roundedrci" src="{{avatar($profile->visi_img)}}" data-rjs="2" alt="" style="max-height: 500px;"></a> 
                {{-- <a href="#" class="vdo-btn popup-video"><img src="{{asset('assets')}}/front/img/icons/play.svg" class="svg" alt=""> Watch
                Video</a> --}}
            </div>
        </div>
    </div>
</section>
<!-- About End -->

<!-- Work Process Begin -->
<section class="section-pattern" data-bg-img="{{asset('assets')}}/front/img/section-pattern/work-process-pattern.png">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section Title Begin -->
                <div class="section-title text-center">
                    <h3>Rumah Creativepreneur Indonesia</h3>
                    <h2>Manfaat Bagi Mitra</h2>
                    <p>Kami percaya bahwa dengan mengedepankan kolaborasi maka ekonomi kreatif akan menjadi bagian penting dalam mendongkrak ekonomi kerakyatan</p>
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
                        <img style="width:80%" src="{{asset('assets')}}/front/img/office.svg" data-rjs="2" alt="">
                    </div>
                    <!-- Image End -->

                    <!-- Content Begin -->
                    <div class="content">
                        <h3>Office</h3>
                        <p>Bangunan fisik yang dikonsep seperti co-working space.</p>
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
                        <img style="width:80%" src="{{asset('assets')}}/front/img/koneksi.svg" data-rjs="2" alt="">
                    </div>
                    <!-- Image End -->

                    <!-- Content Begin -->
                    <div class="content">
                        <h3>Connection</h3>
                        <p>Menjawab aneka kebutuhan pelaku UMKM khususnya dan seluruh mitra pada umumnya.</p>
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
                        <img style="width:80%" src="{{asset('assets')}}/front/img/people.svg" data-rjs="2" alt="">
                    </div>
                    <!-- Image End -->

                    <!-- Content Begin -->
                    <div class="content">
                        <h3>People</h3>
                        <p>Perhatian besar pada pemberdayaan manusia.</p>
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
                        <img style="width:80%" src="{{asset('assets')}}/front/img/sistem.svg" data-rjs="2" alt="">
                    </div>
                    <!-- Image End -->

                    <!-- Content Begin -->
                    <div class="content">
                        <h3>System</h3>
                        <p>Sistem yang terkonsep dan terencana.</p>
                    </div>
                    <!-- Content End -->
                </div>
                <!-- Single Work Process End -->
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
                                <h3>Diantaranya sebagai berikut :</h3>
                                <ul class="list-unstyled list-check">
                                    <li><i class="fa fa-check" aria-hidden="true"></i> Permodalan</li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i> Pemasaran Produk</li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i> Pelatihan Manajemen dan Skill</li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i> Pendampingan Usaha</li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i> Kemitraan</li>
                                </ul>
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
                                <h3>Diantaranya sebagai berikut :</h3>
                                <ul class="list-unstyled list-check">
                                    <li><i class="fa fa-check" aria-hidden="true"></i> Akses Pasar (UMKM)</li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i> Jaringan Kemitraan</li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i> Penyediaan SDM Kreatif</li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i> Infrastruktur (Office) dan Sistem di daerah</li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i> Akses Peluang Bisnis</li>
                                </ul>
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
                                <h3>Diantaranya sebagai berikut :</h3>
                                <ul class="list-unstyled list-check">
                                    <li><i class="fa fa-check" aria-hidden="true"></i> Pelatihan Karakter dan Skills Kreatif</li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i> Akses lapangan kerja dan
                                        aktualisasi diri</li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i> Jaringan</li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i> Peluang Wirausaha</li>
                                </ul>
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
<!-- Work Process End -->

<!-- Service Begin -->
<section class="pt-30 pb-30 section-pattern" data-bg-img="{{asset('assets')}}/front/img/section-pattern/service-pattern.png">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <!-- Section Title Begin -->
                <div class="section-title">
                    <h3>PRODUK</h3>
                    <h2>Menghadirkan Solusi adalah Salah Satu Semangat Nilai yang Selalu Kami Peruangkan</h2>
                    <p>Kami menyediakan beberapa muara produk yang tentunya akan bermanfaat bagi seluruh pihak terkait yang terlibat.</p>
                </div>
                <!-- Section Title End -->

                <!-- Button Begin -->
                {{-- <a href="#" class="btn"><span>SELENGKAPNYA</span></a> --}}
                <!-- Button End -->
            </div>

            <div class="col-lg-6">
                <div class="row mt-40 mt-lg-0">
                    <div class="col-sm-6 single-service-wrapper">
                        <!-- Single Service Begin -->
                        <div class="single-service text-center">
                            <!-- Icon Begin -->
                            <div class="icon">
                                <img src="{{asset('assets')}}/front/img/aplikasi.png" style="width: 45%" data-rjs="2" alt="">
                            </div>
                            <!-- Icon End  -->

                            <!-- Content Begin -->
                            <div class="content">
                                <h4>Aplikasi</h4>
                                <p>Aplikasi ini akan menyediakan semua fitur kebutuhan para mitra UMKM binaan.</p>
                                {{-- <a href="#" class="btn-inline">Selengkapnya</a> --}}
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
                                <img src="{{asset('assets')}}/front/img/event.png" style="width: 30%" data-rjs="2" alt="">
                            </div>
                            <!-- Icon End  -->

                            <!-- Content Begin -->
                            <div class="content">
                                <h4>Event & Creative Media</h4>
                                <p> Menciptakan perluasan pasar bagi seluruh mitra melalui event-event kreatif dan media kreatif.</p>
                                {{-- <a href="#" class="btn-inline">Selengkapnya</a> --}}
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
                                <img src="{{asset('assets')}}/front/img/creative-mover.png" style="width: 40%" data-rjs="2" alt="">
                            </div>
                            <!-- Icon End  -->

                            <!-- Content Begin -->
                            <div class="content">
                                <h4>Creative Mover Academy</h4>
                                <p>Sekolah Kreatif yang sebagian besar diperuntukan bagi mereka yang memiliki concern di dunia kreatif.</p>
                                {{-- <a href="#" class="btn-inline">Selengkapnya</a> --}}
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
                                <img src="{{asset('assets')}}/front/img/sistem-koperasi.png" style="width:45%" data-rjs="2" alt="">
                            </div>
                            <!-- Icon End  -->

                            <!-- Content Begin -->
                            <div class="content">
                                <h4>Sistem Korporasi</h4>
                                <p>Rumah Creativepreneur Indonesia berstatus sebagai yayasan yang mana akan ada beberapa perusahaan turunan yang dikelola dan dijalankan sebagai satu perusahaan besar.</p>
                                {{-- <a href="#" class="btn-inline">Selengkapnya</a> --}}
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
<!-- Pricing Plan End -->

<!-- Project Begin -->
<section class="pt-120 pb-90 section-pattern" data-bg-img="{{asset('assets')}}/front/img/section-pattern/case-study-pattern.png" id="artikel">
    <div class="container">
        <div class="row" id="article-landing-page">
            <div class="col-12">
                <!-- Section Title Begin -->
                <div class="section-title text-center">
                    <h3>Artikel & Berita</h3>
                    <h2>Agenda dan Kegiatan yang Telah Dilaksanakan</h2>
                    <p>Berikut adalah beberapa berita serta tulisan yang memuat kegiatan-kegiatan yang telah dilaksanakan. </p>
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
                            <li class="{{(!isset($_GET['kategori'])) ? 'active' : null }}">
                                <span class="filter-btn"><a href="/#article-landing-page" style="all: unset">All</a></span>
                            </li>
                            @foreach ($kategoriArtikel as $kategori)
                            <li class="{{(isset($_GET['kategori'])) ? (($_GET['kategori'] == $kategori->nama) ? 'active' : null) : null }}">
                                <span class="filter-btn"><a href="?kategori={{ $kategori->nama }}#article-landing-page" style="all: unset">{{ $kategori->nama }}</a></span>
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
            <div class="col-lg-4 grid-item {{ $item->category->name }}">
                <div class="single-project-item" style="border-top:20%">
                    <!-- Project Image Begin -->
                    <div class="image">
                        <a href="{{url('articles',$item->slug)}}"><img style="cursor: pointer" class="roundedrci-no-border" src="{{ Storage::url($item->gambar) }}" style="width:100%;max-height:350px;object-fit: contain;" data-rjs="2" alt=""></a> 
                    </div>
                    <!-- Project Image End -->

                    <!-- Project Body Begin -->
                    <div class="project-body">
                        <h3><a href="{{url('articles',$item->slug)}}">{{ $item->judul }}</a></h3>
                        <p class="project-meta">Penulis:<span>{{ $item->writer->name }}</span></p>
                        <p>{!! Str::limit($item->konten, 50) !!}</p>
                        <a href="{{url('articles',$item->slug)}}" class="btn-inline btn-xs">Selengkapnya</a>
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
<section class="pb-70 section-pattern" data-bg-img="{{asset('assets')}}/front/img/section-pattern/testimonial-pattern.png">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section Title Begin -->
                <div class="section-title text-center">
                    <h3>Founder</h3>
                    <h2>Struktur Tim</h2>
                    <p>Para pendiri terdiri dari kalangan pemerharti, profesional, & ahli di Bidang Ekonomi Kreatif dan Pemberdayaan Manusia.</p>
                </div>
                <!-- Section Title End -->
            </div>
        </div>

        <div class="row text-center">
            @foreach ($struktur_tim as $item)
            <div class="col-lg-3 col-sm-6">
                <!-- Single Team Begin -->
                <div class="single-team-member">
                    <!-- Team Image Begin -->
                    <div class="image position-relative">

                        <img class="roundedrci-no-border" src="{{avatar($item->foto)}}" data-rjs="2" alt="" style="width: 348px;height: 283px;object-fit: cover">
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

<!-- Brand Slider Begin -->
<section class="pb-120">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section Title Begin -->
                <div class="section-title text-center">
                    <h3>Mitra</h3>
                    <h2>Rumah Creativepreneur Indonesia</h2>
                    <p>Dengan mengusung semangat kolaborasi dalam setiap langkah yang ditempuh, berikut adalah tim kolaborator yang telah menjadi mitra Rumah Creativepreneur Indonesia.</p>
                </div>
                <!-- Section Title End -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <!-- Partners -->
                <div class="brand-logo owl-carousel" data-owl-items="4" data-owl-autoplay="true">
                    @foreach ($mitra as $item)
                    <a href="{{$item->link}}" class="single-brand-logo">
                        <img src="{{avatar($item->logo)}}" class="roundedrci-no-border" alt="" style="max-height: 100px; object-fit:contain;">
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