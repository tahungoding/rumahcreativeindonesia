@extends('layouts.app')
@section('title')
    Mitra - Tambah
@endsection

@section('breadcrumb')
    {{Breadcrumbs::render('mitra.create')}}
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
                        <input type="text" class="form-control" name="nama" value="{{ $mitra->nama ?? old('nama') }}"
                            required />
                        @error('nama')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Kategori Mitra</label>
                        <select id="kategori_mitra" name="id_kategori_mitra" class="form-control">
                        <option value="">- Pilih Kategori Mitra -</option>
                            @foreach ($kategori_mitras as $kategori_mitra)
                            <option value="{{ $kategori_mitra->id }}">{{ $kategori_mitra->nama }}</option>
                            @endforeach
                        </select>
                        @error('kategori_mitra')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Logo</label>
                        <input type="file" class="filestyle" data-buttonname="btn-secondary" name="logo"
                            value="{{ $mitra->logo ?? old('logo') }}">
                        @error('logo')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Alamat Website</label>
                        <input type="text" name="link" class="form-control" value="{{ $mitra->link ?? old('link') }}">
                        @error('link')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-0">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                Simpan
                            </button>
                            <a href="{{ route('mitra.index') }}" class="btn btn-secondary waves-effect">
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
<!-- end row -->
@endsection

@section('js')
<!-- Isi Library Javascript -->
<script src="{{ asset('assets/back/libs/parsleyjs/parsley.min.js') }}"></script>
<script src="{{ asset('assets/back/js/pages/form-validation.init.js') }}"></script>
<script src="{{ asset('assets/back/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js') }}"></script>
@endsection