@extends('layouts.guest')

@section('content')
<section class="page-title-bg pt-250 pb-100" data-bg-img="{{asset('assets/front/img/section-pattern/page-title.png')}}">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2  style="font-size: 35px;">Campaign</h2>
                    <ul class="list-inline">
                        <li><a href="index.html">Beranda</a></li>
                        <li>Campaign</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Page Title End -->

<!-- About Section Begin -->
<section class="pt-120 pb-20">
    <div class="container">
        <div class="row">
                <!-- Section Title Begin -->
                <div class="col-md-7 text-left">
                            <div class="section-title">
                            <h3>Rumah Creativepreneur Indonesia</h3>
                                <h2  style="font-size: 35px;">Mari bersama saling menguatkan 
                                    Gotong Royong membangun kemanusian</h2>
                                <p >Rumah Creativepreneur Indonesia ( RCI ) berkolaborasi dengan PT Bisnis Cukur Nusantara ,
                                    Sawala Foundation , dan TDA Sumedang memiliki gagasan Bersama untuk menciptakan ekosistem
                                    positif yang membantu para kelompok Difabel
                                    Melalui pengadaan dan pelatihan usaha Barber & Coffee Shop dengan pelaku tenaga kerja dan
                                    usaha dari kelompok difabel , diharapkan dapat menjadi media produktif dan motivasi bagi
                                    kaum disabilitas
                                    Pengumpulan dana untuk fasilitas kerja dilakukan secara crowdfunding dengan melibatkan
                                    seluruh lapisan masyarakat yang peduli akan membangun dunia yang lebih baik bagi kaum
                                    disabilitas
                                </p>
                            </div>
                        </div>
                            <div class="col-md-5">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                      <div class="carousel-item active">
                                        <img class="d-block w-100" src="{{asset('assets/front/img/campaign/campaign-1.jpeg')}}" alt="First slide">
                                      </div>
                                      <div class="carousel-item">
                                        <img class="d-block w-100" src="{{asset('assets/front/img/campaign/campaign-2.jpeg')}}" alt="Second slide">
                                      </div>
                                      <div class="carousel-item">
                                        <img class="d-block w-100" src="{{asset('assets/front/img/campaign/campaign-3-rev-1.jpg')}}" alt="Third slide">
                                      </div>
                                      <div class="carousel-item">
                                        <img class="d-block w-100" src="{{asset('assets/front/img/campaign/campaign-4.jpeg')}}" alt="Forth slide">
                                      </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Next</span>
                                    </a>
                                  </div>
                </div>
                <!-- Section Title End -->
        </div>
    </div>
</section>

<!-- Work Process Begin -->
<section class="pb-20 section-pattern" data-bg-img="{{asset('assets/front/img/section-pattern/work-process-pattern.png')}}">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section Title Begin -->
                <div class="section-title text-center">
                    <h3>Rumah Creativepreneur Indonesia</h3>
                    <h2  style="font-size: 35px;">Konsep Program</h2>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row process-bg" data-bg-img="{{asset('assets/front/img/process_shape.png')}}">
                <div class="col-lg-3 col-sm-6 single-process-wrapper">
                    <!-- Single Work Process Begin -->
                    <div class="single-process text-center">
                        <!-- Image Begin -->
                        <div class="image">
                            <img src="{{asset('assets/front/img/aim.svg')}}" width="85%" data-rjs="2" alt="">
                        </div>
                        <!-- Image End -->

                        <!-- Content Begin -->
                        <div class="content">
                            <h3>Chalange</h3>
                            <p>Belum adanya wadah pengembangan kapasitas kreatif untuk teman Disabilitas</p>
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
                            <img src="{{asset('assets/front/img/group.svg')}}" width="85%" data-rjs="2" alt="">
                        </div>
                        <!-- Image End -->

                        <!-- Content Begin -->
                        <div class="content">
                            <h3>Input</h3>
                            <p>5 Peserta berpontesi terpilih menjadi perwakilan teman difabel</p>
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
                            <img src="{{asset('assets/front/img/online-business.svg')}}" width="85%" data-rjs="2" alt="">
                        </div>
                        <!-- Image End -->

                        <!-- Content Begin -->
                        <div class="content">
                            <h3>Event</h3>
                            <p>Kegiatan pelatihan yang meliputi materi fundamental serta vokasi (barista & kapster)
                            </p>
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
                            <img src="{{asset('assets/front/img/flag.svg')}}" width="85%" data-rjs="2" alt="">
                        </div>
                        <!-- Image End -->

                        <!-- Content Begin -->
                        <div class="content">
                            <h3>Output & Outcome</h3>
                            <p>Peserta memiliki keterampilan dan kemampuan sebagai wirausaha dan menjadi agen
                                perubahan</p>
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
<section class="pb-20">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section Title Begin -->
                <div class="section-title text-center">
                    <h3>Rumah Creativepreneur Indonesia</h3>
                    <h2  style="font-size: 35px;">Manfaat dan Tujuan Program
                    </h2>
                    <p>Kegiatan ini akan memberikan manfaat dan memberikan dampak untuk <br>Teman Difabel sebagai
                        berikut</p>
                </div>
                <!-- Section Title End -->
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <!-- Single Service Begin -->
                <div class="single-service style--two text-center">
                    <!-- Icon Begin -->
                    <div class="icon">
                        <img src="{{asset('assets')}}/front/img/tenagakerja.png" style="width: 35%" class="svg" alt="">
                    </div>
                    <!-- Icon End  -->

                    <!-- Content Begin -->
                    <div class="content">
                        <h4>Pertama</h4>
                        <p> Peningkatan Penyerapan Tenaga Kerja Difabel</p>

                    </div>
                    <!-- Content End -->
                </div>
                <!-- Single Service End -->
            </div>
            <div class="col-lg-3 col-sm-6">
                <!-- Single Service Begin -->
                <div class="single-service style--two text-center">
                    <!-- Icon Begin -->
                    <div class="icon">
                        <img src="{{asset('assets')}}/front/img/wira-usaha.png" style="width: 50%" class="svg" alt="">
                    </div>
                    <!-- Icon End  -->

                    <!-- Content Begin -->
                    <div class="content">
                        <h4>Kedua</h4>
                        <p> Peningkatan Wirausaha Difabel</p>
                    </div>
                    <!-- Content End -->
                </div>
                <!-- Single Service End -->
            </div>
            <div class="col-lg-3 col-sm-6">
                <!-- Single Service Begin -->
                <div class="single-service style--two text-center">
                    <!-- Icon Begin -->
                    <div class="icon">
                        <img src="{{asset('assets')}}/front/img/karya.png" style="width: 50%" class="svg" alt="">
                    </div>
                    <!-- Icon End  -->

                    <!-- Content Begin -->
                    <div class="content">
                        <h4>Ketiga</h4>
                        <p>Peningkatan Karya Difabel</p>

                    </div>
                    <!-- Content End -->
                </div>
                <!-- Single Service End -->
            </div>
            <div class="col-lg-3 col-sm-6">
                <!-- Single Service Begin -->
                <div class="single-service style--two text-center">
                    <!-- Icon Begin -->
                    <div class="icon">
                        <img src="{{asset('assets')}}/front/img/vokasi.png" style="width: 50%" class="svg" alt="">
                    </div>
                    <!-- Icon End  -->

                    <!-- Content Begin -->
                    <div class="content">
                        <h4>Keempat</h4>
                        <p>Pusat Vokasi Difabel <br></p>
                    </div>
                    <!-- Content End -->
                </div>
                <!-- Single Service End -->
            </div>
        </div>
    </div>
</section>
<!-- Service End -->

<!-- Pricing Plan Begin -->
<section class="pb-50 section-pattern" data-bg-img="{{asset('assets/front/img/section-pattern/price-pattern.png')}}">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section Title Begin -->
                <div class="section-title text-center">
                    <h3>Rumah Creativepreneur Indonesia</h3>
                    <h2  style="font-size: 35px;">Berkolaborasi dengan PT. Bisnis Cukur Nusantara <br> dan TDA Sumedang</h2>
                    
                </div>
                <!-- Section Title End -->
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <img src="{{asset('assets/front/img/logo/RCI.png')}}" style="width:100%;height:150px;object-fit:contain" alt="">
            </div>
            <div class="col-3">
                <img src="{{asset('assets/front/img/logo/PT BISNIS CUKUR.png')}}" style="width:100%;height:150px;object-fit:contain" alt="">
            </div>
            <div class="col-3">
                <img src="{{asset('assets/front/img/tda.png')}}" style="width:200px;height:100px;" alt="">
            </div>
            <div class="col-3">
                <img src="{{asset('assets/front/img/Logo_Sawala_Foundation_1000px.png')}}" style="width:100%;height:100px;object-fit:contain" alt="">
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-lg-6">
                <!-- Tab Pane Text Begin -->
                <div class="tab-pane-text">
                    <h3>Rumah Creativepreneur Indonesia</h3>
                    <ul class="list-unstyled list-check" style="margin-top:20px;">
                        <li><i class="fa fa-check" aria-hidden="true"></i> Rumah Creativepreneur Indonesia (RCI)
                            berawal dari sebuah gagasan untuk berkontribusi untuk membangun indonesia memalui
                            ekonomi kreatif</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> Kami percaya bahwa dengan mengedepankan
                            kolaborasi maka ekonomi kreatif akan menjadi bagian penting dalam mendongkrak ekonomi
                            kerayakyatan</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> Kami melimat bahwa pemberdayaan Usaha
                            Mikro, Keci, dan Menengah (UMKM) serta memamksimalkan potensi bonus demografi adalah
                            jalan memuwujudkan hal tersebut</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> Pada akhirnya, RCI memiliki tekad untuk
                            memiliki jaringan yang kuat di seluruh pelosok negeri. Dampak yang diharapkan adalah
                            membangun tumbuhan terbangunnya rasa kepedulian sesama untuk membangun Indonesia</li>
                    </ul>
                </div>
                <!-- Tab Pane Text End -->
            </div>
            <div class="col-lg-6">
                <!-- Tab Pane Text Begin -->
                <div class="tab-pane-text mt-50 mt-lg-0">
                    <h3>PT. Bisnis Cukur Nusantara</h3>
                    <ul class="list-unstyled list-check" style="margin-top:20px">

                        <li><i class="fa fa-check" aria-hidden="true"></i> Tren Barbershop di Indonesia mengalami
                            perkembangan yang
                            sangat pesat. Hal tersebut dapat dibuktikan dengan banyaknya
                            Brand Barbershop yang muncul di Tanah Air.</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i>
                            Sayangnya, pengelolaan Barbershop yang tidak konsisten tanpa
                            adanya pengalaman di lapangan seringkali mengakibatkan
                            kebangkrutan akibat sepi pelanggan, dan juga ketersediaan SDM
                            yang terbatas. Akibatnya, banyak Pengusaha Barbershop yang
                            gulung tikar karena minim pengetahuan tentang pengelolaan
                            yang terstruktur.</li>

                        <li><i class="fa fa-check" aria-hidden="true"></i>
                            Memiliki Sekolah Cukur pribadi untuk menunjang ketersediaan
                            capster/SDM.</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i>
                            Menjadi satu-satunya Perusahaan Barbershop yang bekerja
                            sama dengan DISNAKER (Dinas Tenaga Kerja)</li>


                    </ul>

                </div>
                <!-- Tab Pane Text End -->
            </div>
        </div> --}}
        
    </div>
</section>
<!-- Pricing Plan End -->


<section class="pt-50 section-pattern" data-bg-img="{{asset('assets/front/img/section-pattern/price-pattern.png')}}">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section Title Begin -->
                <div class="section-title text-center">
                    <h3>Testimoni</h3>
                    <h2  style="font-size: 35px;">Bupati Sumedang</h2>
                    <br>
                    <iframe src="https://drive.google.com/file/d/1AOO1GaDPvlIB2YaEDiaAQcv6n2oDrUkW/preview" width="800" height="450" allow="autoplay"></iframe>
                </div>
                <!-- Section Title End -->
            </div>
        </div>
    </div>
</section>

<!-- About Section End -->
<!-- Blog Begin -->
<section class="pt-50 pb-20">
    <div class="container">

        <div class="row">
            <div class="col-12">
                <!-- Section Title Begin -->
                <div class="section-title text-center">
                    <h3>Rumah Creativepreneur Indonesia</h3>
                    <h2  style="font-size: 35px;">Daftar Calon Penerima Bantuan</h2>
                    <p>Mari bersama saling membantu teman difabel mewujudkan impiannya <br>dengan cara berkolaborasi dan berdonasi </p>
                    <b>Untuk keterangan profil dan rincian RAB lebih lanjut silahkan klik gambar atau judul profile dibawah.</b>
                </div>
                <!-- Section Title End -->
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="row">
                    @foreach ($campaigns as $item)
                    <a href="{{url('campaign/'.$item->slug)}}">
                        <div class="col-md-10" style="float:none;margin:auto;">
                            <!-- Single Blog Item Begin -->
                            <div class="single-blog-style--two position-relative">
                            
                            
                                <!-- Blog Image Begin -->
                                <div class="blog-image">
                                    <img src="{{avatar($item->thumbnail)}}" data-rjs="2" alt=""
                                    style=" 
                                        width: 100%;
                                        height: 400px;
                                        object-fit: cover;
                                    ">
                                </div>
                                <!-- Blog Image End -->

                                <!-- Blog Content Begin -->
                            </a>
                                <div class="blog-content border border-hover">
                                    {{-- <p class="category"><a href="#">Barbershop</a></p> --}}

                                    <h3 class="blog-title"><a href="{{url('campaign/'.$item->slug)}}">{{$item->title}}</a></h3>

                                    <div class="patient-info">
                                        <div class="patient-headline">
                                            @php
                                                $terkumpul = $item->donatur->sum('amount');
                                                $target = $item->target;
                                                $persentase_terkumpul = ($terkumpul / $target) * 100;
                                                $kekurangan = $target - $terkumpul; 
                                            @endphp
                                            <small class="text-right">
                                                Persentase Terkumpul {{number_format($persentase_terkumpul, 2, '.', '')}} %
                                            </small>
                                        <div class="donation-progress progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="1231231" aria-valuemin="0" aria-valuemax="100" style="width: {{$persentase_terkumpul ?? 0}}%" title="{{$persentase_terkumpul ?? 0}}%">
                                                <span class="sr-only">100% terdanai </span>
                                            </div>
                                        </div>
                                        <div class="stat-current">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="amount-current">Rp. {{number_format($terkumpul)}} ,-</div>
                                                    <div class="d-flex justify-content-between">
                                                        <p>Terkumpul</p>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-6 text-md-right desktop">
                                                    <div class="amount-left">Rp. {{number_format($kekurangan)}} ,-</div>
                                                    <p>Kekurangan</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <!-- Blog Content End -->

                                </div>
                            </div>
                            <!-- Single Blog Item End -->
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection