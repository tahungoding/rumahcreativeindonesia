@extends('layouts.guest');

@section('content')
    <!-- Page Title Begin -->
        <section class="page-title-bg pt-250 pb-100" data-bg-img="{{asset('assets/front/img/section-pattern/page-title.png')}}">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title text-center">
                            <h2>Blog</h2>
                            <ul class="list-inline">
                                <li><a href="{{url('/')}}">Beranda</a></li>
                                <li>Blog</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Page Title End -->
        
        <!-- Blog Begin -->
        <section class="pt-120 pb-90">
            <div class="container">
                <div class="row">
                    @foreach ($artikels as $item)
                        <div class="col-lg-6">
                            <!-- Single Blog Item Begin -->
                            <div class="single-blog-item position-relative">
                                <!-- Blog Bg Shape -->
                                <div class="date-bg-shape position-absolute">
                                    <img src="{{asset('assets/front/img/shapes/blog-date-shape.svg')}}" class="svg" alt="">
                                </div>
                                <!-- End Blog Bg Shape -->
            
                                <!-- Blog Content Begin -->
                                <div class="blog-content">
                                    <p class="posted-on">{{$item->created_at->isoFormat('D MMM')}}</p>
                                    <p class="category">{{$item->category->nama}}</p>
            
                                    <h3 class="blog-title">{{$item->judul}}</h3>
            
                                    {{-- <div class="blog-excerpt" style="-webkit-line-clamp: 2;">{!! \Str::limit($item->konten, 10) !!}</div> --}}
                                </div>
                                <!-- Blog Content End -->
            
                                <!-- Blog Hover Begin -->
                                <div class="blog-hover text-center text-white position-absolute w-100 h-100 d-flex align-items-center justify-content-center bg-overlay"
                                    data-bg-img="{{avatar($item->gambar)}}">
                                    <h3 class="blog-title"><a href="{{url('articles/'.$item->slug)}}">{{$item->judul}}</a></h3>
                                </div>
                                <!-- Blog Hover End -->
            
                                <!-- Blog Button Begin -->
                                <div class="blog-button position-absolute w-100 d-flex align-items-center justify-content-center"
                                    data-bg-img="">
                                    <img src="{{asset('assets/front/img/shapes/blog-shape.svg')}}" class="svg" alt="">
                                    <a href="{{url('articles/'.$item->slug)}}" class="btn-inline">Read More</a>
                                </div>
                                <!-- Blog Button End -->
                            </div>
                            <!-- Single Blog Item End -->
                        </div>
                    @endforeach
                    <div class="col-12">
                        <!-- Blog Pagination Begin -->
                        <div class="pagination justify-content-center">
                            {{  $artikels->links()  }}
                        </div>
                        <!-- Blog Pagination End -->
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog End -->
@endsection