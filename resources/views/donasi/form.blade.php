@extends('layouts.app')

@section('title')
{{ $title }}
@endsection

@section('breadcrumb')
    @if (Request::segment(2) == 'create')
        {{Breadcrumbs::render('donasi.create')}}
    @else
        {{Breadcrumbs::render('donasi.edit', $campaign->id)}}
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
                    @isset($campaign)
                    @method('put')
                    @endisset

                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" name="title"
                            value="{{ $campaign->title ?? old('title') }}" required />
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Gambar</label><br>
                        <img class="rounded img-preview mr-2 mo-mb-2" alt="200x200" width="200" src="{{ isset($campaign) ? avatar($campaign->thumbnail) : avatar() }}" data-holder-rendered="true">
                    </div>
                    <div class="form-group">
                        <input type="file" class="filestyle" data-buttonname="btn-secondary" name="thumbnail"
                            value="{{ $campaign->thumbnail ?? old('thumbnail') }}" @empty($campaign) required @endempty onchange="filePreview(this)">
                            <small>Format file yang didukung : jpg,jpeg,png | max size 2Mb</small>
                        @error('thumbnail')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Target</label>
                        <input type="number" class="form-control" name="target"
                            value="{{ $campaign->target ?? old('target') }}" required />
                        @error('target')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                   
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" id="my-ckeditor" rows="10" name="description">{{ $campaign->description ?? old('description') }}</textarea>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Tanggal Awal</label>
                        <input type="date" class="form-control" name="start_date"
                            value="{{ $campaign->start_date ?? old('start_date') }}" required />
                        @error('start_date')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Tanggal Akhir</label>
                        <input type="date" class="form-control" name="end_date"
                            value="{{ $campaign->end_date ?? old('end_date') }}" required />
                        @error('end_date')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>RAB</label><br>
                        <p class="doc-preview">{{ $campaign->rab ?? old('rab') }}</p>
                    </div>
                    <div class="form-group">
                        <input type="file" class="filestyle" data-buttonname="btn-secondary" name="rab"
                            value="{{ $campaign->rab ?? old('rab') }}" @empty($campaign) required @endempty onchange="filePreview(this)">
                            <small>Format file yang didukung : pdf,xlsx,docx | max size 3Mb</small>
                        @error('rab')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="custom-select" name="status" required>
                            @php
                            $selectedStatus = (isset($campaign)) ? $campaign->status : old('status') ;
                            @endphp

                            <option disabled selected>-- Pilih status --</option>
                            @foreach (['open', 'close'] as $status)
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
                            <a href="{{ route('donasi.index') }}" class="btn btn-secondary waves-effect">
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
