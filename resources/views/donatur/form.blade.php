@extends('layouts.app')

@section('title')
{{ $title }}
@endsection

@section('breadcrumb')
    @if (Request::segment(2) == 'create')
        {{Breadcrumbs::render('donatur.create')}}
    @else
        {{Breadcrumbs::render('donatur.edit', $campaign_donor->id)}}
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
                    @isset($campaign_donor)
                    @method('put')
                    @endisset

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="name"
                            value="{{ $campaign_donor->name ?? old('name') }}" required />
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Donasi Ke</label>
                        <select name="id_campaign" class="form-control" id="">
                            @php
                            $selectedStatus = (isset($campaign_donor)) ? $campaign_donor->id_campaign : old('id_campaign') ;
                            @endphp
                            @foreach ($campaigns as $item)
                                <option value="{{$item->id}}" @if ($selectedStatus===$item->id) selected @endif>{{$item->title}}</option>
                            @endforeach
                        </select>
                        @error('id_campaign')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Pembayaran Ke</label>
                        <select name="id_campaign_account" class="form-control" id="">
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
                        <label>Total Bayar / Donasi</label>
                        <input type="number" class="form-control" name="amount"
                            value="{{ $campaign_donor->amount ?? old('amount') }}" required />
                        @error('amount')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Bukti Pembayaran</label><br>
                        <img class="rounded img-preview mr-2 mo-mb-2" alt="200x200" width="200" src="{{ isset($campaign_donor) ? avatar($campaign_donor->proof) : avatar() }}" data-holder-rendered="true">
                    </div>
                    <div class="form-group">
                        <input type="file" class="filestyle" data-buttonname="btn-secondary" name="proof"
                            value="{{ $campaign_donor->proof ?? old('proof') }}" @empty($campaign_donor) required @endempty onchange="filePreview(this)">
                        @error('proof')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Pesan</label>
                        <textarea name="message" class="form-control" id="" cols="30" rows="10">{{ $campaign_donor->message ?? old('message') }}</textarea>
                        @error('amount')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    @isset($campaign_donor)
                    <div class="form-group">
                        <label>Status Verifikasi</label>
                        <select name="status" class="form-control" id="">
                            <option value="verif" @if ($campaign_donor->status=='verif') selected @endif>Verifikasi</option>
                            <option value="no verif" @if ($campaign_donor->status=='no verif') selected @endif>Belum Terverifikasi</option>
                        </select>
                        @error('status')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    @endisset
                    

                    <div class="form-group mb-0">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                Simpan
                            </button>
                            <a href="{{ route('donatur.index') }}" class="btn btn-secondary waves-effect">
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
