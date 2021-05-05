@extends('layouts.app')

@section('title')
{{ $title }}
@endsection

@section('breadcrumb')
    @if (Request::segment(2) == 'create')
        {{Breadcrumbs::render('donasi_akun.create')}}
    @else
        {{Breadcrumbs::render('donasi_akun.edit', $campaign_account->id)}}
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
                    @isset($campaign_account)
                    @method('put')
                    @endisset

                    <div class="form-group">
                        <label>Jenis Akun</label>
                        <select name="id_directory_account" class="form-control" id="">
                            @php
                            $selectedStatus = (isset($campaign_account)) ? $campaign_account->id_directory_account : old('id_directory_account') ;
                            @endphp
                            @foreach ($directory_accounts as $item)
                                <option value="{{$item->id}}" @if ($selectedStatus===$item->id) selected @endif>{{$item->name}}</option>
                            @endforeach
                        </select>
                        @error('id_directory_account')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="name"
                            value="{{ $campaign_account->name ?? old('name') }}" required />
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>No Rek / HP</label>
                        <input type="text" class="form-control" name="number"
                            value="{{ $campaign_account->number ?? old('number') }}" required />
                        @error('number')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>QRCode</label><br>
                        <img class="rounded img-preview mr-2 mo-mb-2" alt="200x200" width="200" src="{{ isset($campaign_account) ? avatar($campaign_account->qrcode) : avatar() }}" data-holder-rendered="true">
                    </div>
                    <div class="form-group">
                        <input type="file" class="filestyle" data-buttonname="btn-secondary" name="qrcode"
                            value="{{ $campaign_account->qrcode ?? old('qrcode') }}" @empty($campaign_account) required @endempty onchange="filePreview(this)">
                        @error('qrcode')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-0">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                Simpan
                            </button>
                            <a href="{{ route('donasi_akun.index') }}" class="btn btn-secondary waves-effect">
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
