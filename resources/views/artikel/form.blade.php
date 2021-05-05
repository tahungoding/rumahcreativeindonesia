@extends('layouts.app')

@section('title')
{{ $title }}
@endsection

@section('breadcrumb')
    @if (Request::segment(2) == 'create')
        {{Breadcrumbs::render('artikel.create')}}
    @else
        {{Breadcrumbs::render('artikel.edit', $article->id)}}
    @endif
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $title }}</h4>
                <p class="card-title-desc">
                    @if (session('failed'))
                    <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Error!</strong> {{ session('failed') }}
                    </div>
                    @endif
                </p>

                <form class="custom-validation" action="{{ $actionUrl }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @isset($article)
                    @method('put')
                    @endisset

                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" name="title"
                            value="{{ $article->judul ?? old('title') }}" required />
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Gambar</label><br>
                        <img class="rounded img-preview mr-2 mo-mb-2" alt="200x200" width="200" src="{{ isset($article) ? avatar($article->gambar) : avatar() }}" data-holder-rendered="true">
                    </div>
                    <div class="form-group">
                        <input type="file" class="filestyle" data-buttonname="btn-secondary" name="image"
                            value="{{ $article->gambar ?? old('image') }}" @empty($article) required @endempty onchange="filePreview(this)">
                        @error('image')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                   
                    <div class="form-group">
                        <label>Konten</label>
                        <textarea class="form-control" id="my-ckeditor" rows="10" name="content">{{ $article->konten ?? old('content') }}</textarea>
                        @error('content')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="custom-select" name="category" required>
                            @php
                            $selectedcategory = (isset($article)) ? $article->id_kategori_artikel : old('category') ;
                            @endphp

                            <option disabled selected>-- Pilih kategori --</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if ($selectedcategory===$category->id) selected @endif>
                                {{ $category->nama }}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="custom-select" name="status" required>
                            @php
                            $selectedStatus = (isset($article)) ? $article->status : old('status') ;
                            @endphp

                            <option disabled selected>-- Pilih status --</option>
                            @foreach (['aktif', 'tidak aktif'] as $status)
                            <option value="{{ $status }}" @if ($selectedStatus===$status) selected @endif>
                                {{ Str::ucfirst($status) }}</option>
                            @endforeach
                        </select>
                        @error('status')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-0">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                Simpan
                            </button>
                            <a href="{{ route('artikel.index') }}" class="btn btn-secondary waves-effect">
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

@section('css')
    <script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js')}}"></script>
@endsection

@section('js')
<script src="{{ asset('assets/back/libs/parsleyjs/parsley.min.js') }}"></script>
<script src="{{ asset('assets/back/js/pages/form-validation.init.js') }}"></script>
<script src="{{ asset('assets/back/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js') }}"></script>

<script>CKEDITOR.replace( 'my-ckeditor', {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
});</script>
<script>
        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#thumbnail-preview').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#thumbnail").change(function(){
        readURL(this);
    });
</script>
<!-- init js -->
<script src="{{ asset('assets/back/js/pages/form-editor.init.js') }}"></script>
@endsection
