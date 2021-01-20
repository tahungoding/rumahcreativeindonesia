@extends('layouts.app')
@section('title')
    Dashboard
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
                    <h2 class="mb-4">1,587</h2>
                    <span class="badge badge-info"> +11% </span> <span class="ml-2">From previous period</span>
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
                    <h2 class="mb-4">46,782</h2>
                    <span class="badge badge-danger"> -29% </span> <span class="ml-2">From previous period</span>
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
                    <h2 class="mb-4">15.9</h2>
                    <span class="badge badge-warning"> 0% </span> <span class="ml-2">From previous period</span>
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
                    <h2 class="mb-4">1890</h2>
                    <span class="badge badge-info"> +89% </span> <span class="ml-2">From previous period</span>
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
