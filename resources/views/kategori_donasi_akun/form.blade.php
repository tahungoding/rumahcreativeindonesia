@extends('layouts.app')

@section('title')
{{ $title }}
@endsection

@section('breadcrumb')
    @if (Request::segment(2) == 'create')
        {{Breadcrumbs::render('kategori_donasi_akun.create')}}
    @else
        {{Breadcrumbs::render('kategori_donasi_akun.edit', $directory_account->id)}}
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
                    @isset($directory_account)
                    @method('put')
                    @endisset

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="name"
                            value="{{ $directory_account->name ?? old('name') }}" required />
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Logo</label><br>
                        <img class="rounded img-preview mr-2 mo-mb-2" alt="200x200" width="200" src="{{ isset($directory_account) ? avatar($directory_account->logo) : avatar() }}" data-holder-rendered="true">
                    </div>
                    <div class="form-group">
                        <input type="file" class="filestyle" data-buttonname="btn-secondary" name="logo"
                            value="{{ $directory_account->logo ?? old('logo') }}" @empty($directory_account) required @endempty onchange="filePreview(this)">
                        @error('logo')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Kode Number</label>
                        <input type="text" class="form-control" name="number_code"
                            value="{{ $directory_account->number_code ?? old('number_code') }}" required />
                        @error('number_code')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-0">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                Simpan
                            </button>
                            <a href="{{ route('kategori_donasi_akun.index') }}" class="btn btn-secondary waves-effect">
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
