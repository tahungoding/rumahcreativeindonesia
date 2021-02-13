@extends('layouts.guest')

@section('content')
<!-- Page Title Begin -->
<section class="page-title-bg pt-250 pb-100" data-bg-img="{{asset('assets/front/img/section-pattern/page-title.png')}}">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>{{$artikel->judul}}</h2>
                    <ul class="list-inline">
                        <li><a href="/">Home</a></li>
                        <li><a href="/articles">Artikel</a></li>
                        <li>{{$artikel->judul}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Page Title End -->

<!-- Blog Begin -->
<section class="pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Blog Details Begin -->
                <div class="blog-details">
                    <!-- Blog Details Image Begin -->
                    <div class="blog-details-image">
                        <img src="{{avatar($artikel->gambar)}}" data-rjs="2" alt="">
                    </div>
                    <!-- Blog Details Image End -->

                    <!-- Post Meta Begin -->
                    <div class="post-meta">
                        <ul class="list-inline">
                            <li>Penulis: <a href="#"> {{$artikel->writer->name}} </a></li>
                            <li>Kategori: <a href="#"> {{$artikel->category->nama}} </a></li>
                        </ul>
                    </div>
                    <!-- Post Meta End -->

                    <!-- Blog Details Content Begin -->
                    <div class="blog-details-content">
                        {!! $artikel->konten !!}
                    </div>
                    <!-- Blog Details Content End -->

                    <!-- Tag/Share Begin -->
                    <div class="row align-items-center mb-30">
                        <div class="col-md-6">
                            <!-- Post Tags Begins -->
                            <div class="post-tags mb-30">
                                <ul class="list-inline">
                                    <br>
                                    <li style="color: black">Pengunjung: </li>
                                    <li><a href="#">{{$count_view}} x dilihat</a></li>
                                </ul>
                            </div>
                            <!-- Post Tags End -->
                        </div>
                        <div class="col-md-6">
                            <!-- Post Share Begin -->
                            <div class="sharethis-inline-share-buttons"></div>
                            <!-- Post Share End -->
                        </div>
                        <div class="row" style="margin-left: 1.9%;">

                        </div>
                    </div>
                    <!-- Tag/Share End -->


                    <!-- Post Pagination Begin -->
                    {{-- <div
                        class="post-pagination d-flex align-items-center justify-content-between flex-column flex-md-row">
                        <!-- Single Post Pagination Begin -->
                        <div class="single-post-pagination media align-items-center mb-50 mb-md-0">
                            <div class="pagination-image">
                                <a href="#"><img src="{{asset('assets/front/img/blog/nav1.png')}}" data-rjs="2"
                    alt=""></a>
                </div>
                <div class="media-body">
                    <a href="#" class="d-inline-flex align-items-center"><img
                            src="{{asset('assets/front/img/icons/angle-left.svg')}}" data-rjs="2" class="svg"
                            alt="">previous</a>
                    <h6>How Can You Maximize Your Savings in the New Year</h6>
                </div>
            </div>
            <!-- Single Post Pagination End -->

            <!-- Single Post Pagination Begin -->
            <div class="single-post-pagination next media flex-row-reverse align-items-center">
                <div class="pagination-image">
                    <a href="#"><img src="{{asset('assets/front/img/blog/nav2.png')}}" data-rjs="2" alt=""></a>
                </div>
                <div class="media-body text-right">
                    <a href="#" class="d-inline-flex flex-row-reverse align-items-center"><img
                            src="{{asset('assets/front/img/icons/angle-right.svg')}}" alt="" class="svg">next</a>
                    <h6>How to Determine Your #1 Financial Goal For the Year</h6>
                </div>
            </div>
            <!-- Single Post Pagination End -->
        </div> --}}
        <!-- Post Pagination End -->
    </div>
    <!-- Blog Details End -->
    </div>
    <div class="col-lg-4">
        <!-- Sidebar Begin -->
        <aside class="sidebar mt-5 mt-lg-0">
            <!-- Widget Search Begin -->
            {{-- <div class="widget widget_search">
                        <form method="GET">
                            <div class="input-group">
                                <input placeholder="Search here...." class="theme-input-style">
                                <button type="submit" class="submit-btn">
                                    <img src="{{asset('assets/front/img/icons/search.svg')}}" class="svg" alt="">
            </button>
    </div>
    </form>
    </div> --}}
    <!-- Widget Search End -->

    <!-- Widget Ad Begin -->
    <div class="widget widget_ad">
        <img src="{{asset('assets/front/img/widget_ad.png')}}" data-rjs="2" alt="">
    </div>
    <!-- Widget Ad End -->

    <!-- Widget Related Post Begin -->
    <div class="widget widget_related_post">
        <!-- Widget Title Begin  -->
        <div class="widget-title">
            <h4>Postingan Terkait</h4>
        </div>
        <!-- Widget Title End  -->

        <!-- Single Related Post Begin -->
        @foreach ($artikels as $item)
        <div class="single-post">
            <div class="post-content">
                <span class="posted-on">{{tgl_indo($item->created_at)}}</span>
                <h5><a href="{{url('articles/'.$item->slug)}}">{{$item->judul}}</a></h5>
            </div>
        </div>
        @endforeach
        <!-- Single Related Post End -->
    </div>
    <!-- Widget Related Post End -->

    </aside>
    <!-- Sidebar End -->
    </div>
    </div>
    </div>
</section>
<!-- Blog End -->
@endsection