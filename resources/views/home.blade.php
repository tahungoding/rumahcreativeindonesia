@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('breadcrumb')
    {{Breadcrumbs::render('home')}}
@endsection
@section('content')
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary">
            <div class="card-body mini-stat-img">
                <div class="mini-stat-icon">
                    <i class="mdi mdi-cube-outline float-right"></i>
                </div>
                <div class="text-white">
                    <h6 class="text-uppercase mb-3 font-size-16">Pengguna</h6>
                    <h2 class="mb-4">{{$user_count}}</h2>
                    @if ($user_last_month)
                        <span class="badge badge-success"> + {{$user_last_month}} </span>
                    @else 
                        <span class="badge badge-secondary"> + 0 </span>
                    @endif
                     <span class="ml-2">Dalam satu bulan terakhir</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary">
            <div class="card-body mini-stat-img">
                <div class="mini-stat-icon">
                    <i class="mdi mdi-buffer float-right"></i>
                </div>
                <div class="text-white">
                    <h6 class="text-uppercase mb-3 font-size-16">Program</h6>
                    <h2 class="mb-4">{{$program_count}}</h2>
                    @if ($program_last_month)
                        <span class="badge badge-success"> + {{$program_last_month}} </span>
                    @else 
                        <span class="badge badge-secondary"> + 0 </span>
                    @endif
                     <span class="ml-2">Dalam satu bulan terakhir</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary">
            <div class="card-body mini-stat-img">
                <div class="mini-stat-icon">
                    <i class="mdi mdi-tag-text-outline float-right"></i>
                </div>
                <div class="text-white">
                    <h6 class="text-uppercase mb-3 font-size-16">UMKM</h6>
                    <h2 class="mb-4">{{$umkm_count}}</h2>
                    @if ($umkm_last_month)
                        <span class="badge badge-success"> + {{$umkm_last_month}} </span>
                    @else 
                        <span class="badge badge-secondary"> + 0 </span>
                    @endif
                     <span class="ml-2">Dalam satu bulan terakhir</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat bg-primary">
            <div class="card-body mini-stat-img">
                <div class="mini-stat-icon">
                    <i class="mdi mdi-briefcase-check float-right"></i>
                </div>
                <div class="text-white">
                    <h6 class="text-uppercase mb-3 font-size-16">MITRA</h6>
                    <h2 class="mb-4">{{$mitra_count}}</h2>
                    @if ($mitra_last_month)
                        <span class="badge badge-success"> + {{$mitra_last_month}} </span>
                    @else 
                        <span class="badge badge-secondary"> + 0 </span>
                    @endif
                     <span class="ml-2">Dalam satu bulan terakhir</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

@endsection
@section('js')
    <!--Morris Chart-->
    <script src="{{asset('assets/back')}}/libs/morris.js/morris.min.js"></script>
    <script src="{{asset('assets/back')}}/libs/raphael/raphael.min.js"></script>
    
    <script src="{{asset('assets/back')}}/js/pages/dashboard.init.js"></script>
@endsection
