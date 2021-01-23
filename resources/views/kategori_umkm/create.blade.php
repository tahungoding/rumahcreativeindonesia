@extends('layouts.app')
@section('title')
    Kategori UMKM - Tambah
@endsection
@section('css')
<!-- Isi Library CSS -->
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $title }}</h4>
                <p class="card-title-desc"></p>
                @if ($msg = Session::get('error'))
                <div class="alert alert-danger">
                    {{$msg}}
                </div>
                @endif
                <form class="custom-validation" action="{{ $actionUrl }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" value="{{ $kategori_umkm->nama ?? old('nama') }}"
                            required />
                        @error('nama')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-0">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                Simpan
                            </button>
                            <a href="{{ route('kategori_umkm.index') }}" class="btn btn-secondary waves-effect">
                                Batal
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
@endsection

@section('js')
<!-- Isi Library Javascript -->
<!--Morris Chart-->
<script src="{{asset('assets/back')}}/libs/morris.js/morris.min.js"></script>
<script src="{{asset('assets/back')}}/libs/raphael/raphael.min.js"></script>

<script src="{{asset('assets/back')}}/js/pages/dashboard.init.js"></script>
@endsection