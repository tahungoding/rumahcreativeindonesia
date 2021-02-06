@extends('layouts.guest')

@section('content')
    <!-- Page Title Begin -->
        <section class="page-title-bg pt-250 pb-100" data-bg-img="{{asset('assets/front/img/section-pattern/page-title.png')}}">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title text-center">
                            <h2>Program</h2>
                            <ul class="list-inline">
                                <li><a href="index.html">beranda</a></li>
                                <li>Program</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Page Title End -->
        
        <section class="pt-120 pb-90 section-pattern bg-img"
            style="background-image: url(&quot;{{asset('')}}assets/front/img/section-pattern/feature-pattern.png&quot;);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="section-title text-center">
                        <h3>Rumah CreativePreneur Indonesia</h3>
                        <h2> Program Kami</h2>
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
        @php
            $no = 1;
        @endphp
        @foreach ($program as $item)
            @if ($no == 1)
                @include('guest.program.content_satu')
            @endif
            @if ($no == 2)
                @include('guest.program.content_dua')
            @endif
            @if ($no == 3)
                @include('guest.program.content_tiga')
            @endif
            @if ($no == 4)
                @include('guest.program.content_empat')
            @endif
        @php
            $no++;
        @endphp
        @endforeach

@endsection