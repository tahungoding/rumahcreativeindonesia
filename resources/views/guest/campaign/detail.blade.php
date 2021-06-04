@extends('layouts.guest')
@section('css')
    <style>
        /***
    Bootstrap Line Tabs by @keenthemes
    A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
    Licensed under MIT
    ***/

        /* Tabs panel */
        .tabbable-panel {
            border: 1px solid #eee;
            padding: 10px;
        }

        /* Default mode */
        .tabbable-line>.nav-tabs {
            border: none;
            margin: 0px;
        }

        .tabbable-line>.nav-tabs>li {
            margin-right: 30px;
            padding: 10px;
        }

        .tabbable-line>.nav-tabs>li>a {
            border: 0;
            margin-right: 0;
            color: #737373;
        }

        .tabbable-line>.nav-tabs>li>a>i {
            color: #a6a6a6;
        }

        .tabbable-line>.nav-tabs>li.open,
        .tabbable-line>.nav-tabs>li:hover {
            border-bottom: 4px solid #90c6ff;
        }

        .tabbable-line>.nav-tabs>li.open>a,
        .tabbable-line>.nav-tabs>li:hover>a {
            border: 0;
            background: none !important;
            color: #0e095a;
        }

        .tabbable-line>.nav-tabs>li.open>a>i,
        .tabbable-line>.nav-tabs>li:hover>a>i {
            color: #a6a6a6;
        }

        .tabbable-line>.nav-tabs>li.open .dropdown-menu,
        .tabbable-line>.nav-tabs>li:hover .dropdown-menu {
            margin-top: 0px;
        }

        .tabbable-line>.nav-tabs>li.active {
            border-bottom: 4px solid #007bff;
            position: relative;
        }

        .tabbable-line>.nav-tabs>li.active>a {
            border: 0;
            color: #333333;
        }

        .tabbable-line>.nav-tabs>li.active>a>i {
            color: #404040;
        }

        .tabbable-line>.tab-content {
            margin-top: -3px;
            background-color: #fff;
            border: 0;
            border-top: 1px solid #eee;
            padding: 15px 0;
        }

        .portlet .tabbable-line>.tab-content {
            padding-bottom: 0;
        }

        /* Below tabs mode */

        .tabbable-line.tabs-below>.nav-tabs>li {
            border-top: 4px solid transparent;
        }

        .tabbable-line.tabs-below>.nav-tabs>li>a {
            margin-top: 0;
        }

        .tabbable-line.tabs-below>.nav-tabs>li:hover {
            border-bottom: 0;
            border-top: 4px solid #fbcdcf;
        }

        .tabbable-line.tabs-below>.nav-tabs>li.active {
            margin-bottom: -2px;
            border-bottom: 0;
            border-top: 4px solid #f3565d;
        }

        .tabbable-line.tabs-below>.tab-content {
            margin-top: -10px;
            border-top: 0;
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
        }

        .tab-pane {
            padding: 15px;
        }


    </style>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $(".tab").click(function () {
            $(".tab").removeClass("active");
            // $(".tab").addClass("active"); // instead of this do the below 
            $(this).addClass("active");   
        });
    });
    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();
        alert('Tautan tersalin');
    }
</script>
@endsection
@section('content')
    <section class="page-title-bg pt-250 pb-100"
        data-bg-img="{{ asset('assets/front/img/section-pattern/page-title.png') }}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Campaign</h2>
                        <ul class="list-inline">
                            <li><a href="{{ url('/') }}">Beranda</a></li>
                            <li>Campaign</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Title End -->

    <!-- About Section Begin -->
    <section class="pt-120 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-xs-12">

                    <img src="{{ avatar($detail->thumbnail) }}" data-rjs="2" alt="" style=" 
                                        width: 100%;
                                        height: 400px;
                                        object-fit: cover;
                                        border-top-left-radius: 20px;
                                        border-bottom-left-radius: 20px;
                            ">
                </div>
                <div class="col-lg-6 col-md-12 col-xs-12">

                    <div class="blog-content border border-hover" style="height: 400px;padding:30px;margin-left: -30px;border-top-right-radius: 20px;
                    border-bottom-right-radius: 20px;">

                        <h3 class="blog-title"><a href="{{url('campaign/'.$detail->slug)}}">{{ $detail->title }}</a></h3>
                        @if (session('success'))
                        <br>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>Data berhasil terkirim!</strong> {{ session('success') }}
                        </div>
                        @endif

                        @if (session('failed'))
                        <br>
                        <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>Data gagal terkirim!</strong> {{ session('failed') }}
                        </div>
                        @endif

                        <div class="patient-info" style="margin-top: 20px;">
                            <div class="patient-headline">

                                @php
                                    $terkumpul = $detail->donatur->sum('amount');
                                    $target = $detail->target;
                                    $persentase_terkumpul = ($terkumpul / $target) * 100;
                                    $kekurangan = $target - $terkumpul; 
                                @endphp
                                <small class="text-right">
                                    Persentase Terkumpul {{number_format($persentase_terkumpul, 2, '.', '')}} %
                                </small>
                                <div class="donation-progress progress">
                                    <div class="progress-bar" role="progressbar"
                                        aria-valuenow="0,03043478260869565217391304348" aria-valuemin="0"
                                        aria-valuemax="100" style="width: {{$persentase_terkumpul ?? 0}}%" title="{{$persentase_terkumpul ?? 0}}%">
                                        <span class="sr-only">100% terdanai</span>
                                    </div>
                                </div>
                                <div class="stat-current">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="amount-current">Rp. {{number_format($terkumpul)}} ,-</div>
                                            <div class="d-flex justify-content-between">
                                                <p>Terdanai</p>

                                            </div>
                                        </div>
                                        <div class="col-6 text-md-right desktop">
                                            <div class="amount-left">Rp. {{number_format($kekurangan)}} ,-</div>
                                            <p>Kekurangan</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <p id="url" style="display: none;">{{url()->current()}}</p>

                            <div class="row" style="margin-top: 20px;">
                                <div class="col-md-6">
                                    <button type="button" class="" data-toggle="modal" data-target="#exampleModal" style="background: #25CE9E;
                                color: #ffffff !important;
                                display: inline-block;
                                font-size: 15px;
                                font-weight: 500;
                                height: 50px;
                                line-height: 0.8;
                                padding: 18px 30px;
                                text-transform: capitalize;
                                border-radius: 1px;
                                letter-spacing: 0.5px;
                                border:0px !important;
                                cursor:pointer;
                                width: 100%;
                                border-radius:100px;">
                                        Donasi Sekarang
                                    </button>
                                </div>

                                <div class="col-md-6 text-right">
                                    Bagikan melalui :
                                    <div class="widget widget_social_icon mt-2">
                                        <ul class="social_icon_list list-inline">
                                            <li>
                                                <a href="https://www.facebook.com/sharer/sharer.php?u=&t=" title="Bagikan di facebook" target="_blank" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&t=' + encodeURIComponent(document.URL)); return false;"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            </li>
                                            <li>
                                                <a href="https://twitter.com/intent/tweet?" target="_blank" title="Bagikan di twitter" onclick="window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent(document.title) + ':%20 ' + encodeURIComponent(document.URL)); return false;"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            </li>
                                            <li>
                                                <a href="https://wa.me/?" target="_blank" title="Bagikan di whatsapp" onclick="window.open('https://wa.me/?text=' + encodeURIComponent(document.title) + ':%20 ' + encodeURIComponent(document.URL)); return false;" style="color:#25D366"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                                            </li>
                                            <li>
                                                <button style="all: unset;cursor: pointer;" title="Salin tautan" onclick="copyToClipboard('#url')"><i class="fa fa-link" aria-hidden="true"></i></button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Blog Content End -->

                    </div>

                </div>
            </div>
        </div>
    </section>



    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pilih Metode Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form class="custom-validation" action="{{route('campaign.show', $detail->slug)}}" method="POST" enctype="multipart/form-data">
                        @csrf
    
                        <div class="form-group">
                            <label>Nama</label><sup class="text-danger" title="required">*</sup>
                            <input type="text" class="form-control" name="name"
                                value="{{ $campaign_donor->name ?? old('name') }}" required />
                                <small>Anda tidak harus memasukan nama asli (nama bisa disamarkan)</small>
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label>Pembayaran Ke</label><sup class="text-danger" title="required">*</sup>
                            <select name="id_campaign_account" class="form-control" id="" required>
                                @php
                                $selectedStatus = (isset($campaign_donor)) ? $campaign_donor->id_campaign_account : old('id_campaign_account') ;
                                @endphp
                                @foreach ($campaign_accounts as $item)
                                    <option value="{{$item->id}}" @if ($selectedStatus===$item->id) selected @endif>{{$item->number}} a.n {{$item->name}} - {{$item->directory->name}}</option>
                                @endforeach
                            </select>
                            @error('id_campaign_account')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label>Total Bayar / Donasi</label><sup class="text-danger" title="required">*</sup>
                            <input type="number" class="form-control" name="amount"
                                value="{{ $campaign_donor->amount ?? old('amount') }}" required />
                            @error('amount')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label>Bukti Pembayaran</label> <sup>(Optional)</sup> <br>
                            <img class="rounded img-preview mr-2 mo-mb-2" alt="200x200" width="200" src="{{ isset($campaign_donor) ? avatar($campaign_donor->proof) : avatar() }}" data-holder-rendered="true">
                        </div>
                        <div class="form-group">
                            <input type="file" class="filestyle" data-buttonname="btn-secondary" name="proof"
                                onchange="filePreview(this)">
                                <br>
                                <small>Format file yang diizinkan: jpg,jpeg,png | Max size file 2 Mb</small>
                            @error('proof')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label>Pesan untuk kampanye ini</label><sup>(Optional)</sup>
                            <input name="message" type="text" class="form-control">{{ $campaign_donor->message ?? old('message') }}
                            @error('amount')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                        <span>Simpan</span>
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><span>Tutup</span> </button>
                </div>
            </form>
            </div>
        </div>
    </div>



    <!-- About Section End -->
    <!-- Blog Begin -->
    <section class="pb-120">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <!-- Section Title Begin -->
                    <div class="tabbable-panel" style="
                        padding: 20px;
                        border-top-left-radius: 20px;
                        border-bottom-left-radius: 20px;
                        border-top-right-radius: 20px;
                        border-bottom-right-radius: 20px;">
                        <div class="tabbable-line">
                            <ul class="nav nav-tabs" id="tab_default">
                                <li class="tab active">
                                    <a href="#tab_default_1" data-toggle="tab">
                                        Deskripsi</a>
                                </li>
                                <li class="tab">
                                    <a href="#tab_default_2" data-toggle="tab">
                                        RAB </a>
                                </li>
                                <li class="tab">
                                    <a href="#tab_default_3" data-toggle="tab">
                                        Donatur </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_default_1">
                                    {!! $detail->description !!}
                                </div>
                                <div class="tab-pane" id="tab_default_2">
                                    <div style="text-align:center">
                                        <h4>Rencana Anggaran Biaya</h4>
                                        <br>
                                        <embed src="{{Storage::url($detail->rab)}}" width="100%" height="1000px" />
                                            <br>
                                            <a href="{{Storage::url($detail->rab)}}" download>Silahkan Unduh disini <i class="fa fa-download"></i> </a>
                                    </div>

                                </div>
                                <div class="tab-pane" id="tab_default_3">
                                    <ul class="list-unstyled">
                                        @foreach ($donatur as $item)
                                        <li class="media">

                                            <img class="rounded-circle mr-3"
                                                src="https://a75f8eca1cb38315333c-678aa23ddc581c009f308cf5d4dc9c11.ssl.cf6.rackcdn.com/defaults/AVATAR_1.png"
                                                width="40" height="40">
                                            <div class="media-body">
                                                <h5 class="mt-0 mb-1">{{$item->name}}</h5>
                                                <small>Rp.{{number_format($item->amount)}},-</small> 
                                                <br>
                                                {{$item->message}}
                                            </div>
                                        </li>
                                        <br>
                                        @endforeach
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </section>
@endsection
