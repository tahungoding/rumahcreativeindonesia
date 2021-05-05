@extends('layouts.app')

@section('title')
{{ $title }}
@endsection

@section('breadcrumb')
    {{Breadcrumbs::render('prolog_mitra.edit', $prolog_mitra->id)}}
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $title }}</h4>
                <p class="card-title-desc"></p>

                <form class="custom-validation" action="{{ $actionUrl }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @isset($prolog_mitra)
                    @method('put')
                    @endisset

                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" name="judul" value="{{ $prolog_mitra->judul ?? old('judul') }}" required />
                        @error('judul')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Notice</label>
                        <input type="text" class="form-control" name="notice" value="{{ $prolog_mitra->notice ?? old('notice') }}" required />
                        @error('notice')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Gambar</label><br>
                        <img class="rounded img-preview mr-2 mo-mb-2" alt="200x200" width="200" src="{{ isset($prolog_mitra) ? avatar($prolog_mitra->gambar) : avatar() }}" data-holder-rendered="true">
                    </div>
                    <div class="form-group">
                        <input type="file" class="filestyle" data-buttonname="btn-secondary" name="gambar" value="{{ $prolog_mitra->gambar ?? old('gambar') }}" onchange="filePreview(this)">
                        @error('gambar')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <div>
                            <textarea required class="form-control tiny" rows="5" name="deskripsi">{{ $prolog_mitra->deskripsi ?? old('deskripsi') }}</textarea>
                            @error('deskripsi')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-0">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                Simpan
                            </button>
                            <a href="{{ route('prolog_mitra.index') }}" class="btn btn-secondary waves-effect">
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
<script src="{{ asset('assets/back/libs/parsleyjs/parsley.min.js') }}"></script>
<script src="{{ asset('assets/back/js/pages/form-validation.init.js') }}"></script>
<script src="{{ asset('assets/back/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js') }}"></script>

<!--tinymce js-->
<script src="{{asset('assets/back/libs/tinymce/tinymce.min.js')}}"></script>

<!-- init js -->
<script src="{{asset('assets/back/js/pages/form-editor.init.js')}}"></script>
@endsection
