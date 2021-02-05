@extends('layouts.app')

@section('title')
{{ $title }}
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                @if ($msg = Session::get('success'))
                <div class="alert alert-success">
                    {{ $msg }}
                </div>
                @endif
                @if ($msg = Session::get('error'))
                <div class="alert alert-danger">
                    {{ $msg }}
                </div>
                @endif
                <h4 class="card-title">{{ $title }}</h4>
                <p class="card-title-desc"></p>

                <form class="custom-validation" action="{{ $actionUrl }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    @method('put')
                    

                    <div class="form-group">
                        <label>Latar Belakang</label>
                        <div>
                            <textarea required class="form-control tiny" rows="5" name="latar_belakang">{{ $profile->latar_belakang ?? old('latar_belakang') }}</textarea>
                            @error('latar_belakang')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Latar Belakang Gambar</label>
                        <input type="file" class="filestyle" data-buttonname="btn-secondary" name="latar_belakang_img"
                            value="{{ $profile->latar_belakang_img ?? old('latar_belakang_img') }}" @empty($profile) required @endempty>
                        @error('latar_belakang_img')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Visi</label>
                        <div>
                            <textarea required class="form-control tiny" rows="5" name="visi">{{ $profile->visi ?? old('visi') }}</textarea>
                            @error('visi')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Visi Gambar</label>
                        <input type="file" class="filestyle" data-buttonname="btn-secondary" name="visi_img"
                            value="{{ $profile->visi_img ?? old('visi_img') }}" @empty($profile) required @endempty>
                        @error('visi_img')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Misi</label>
                        <div>
                            <textarea required class="form-control tiny" rows="5" name="misi">{{ $profile->misi ?? old('misi') }}</textarea>
                            @error('misi')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Misi Gambar</label>
                        <input type="file" class="filestyle" data-buttonname="btn-secondary" name="misi_img"
                            value="{{ $profile->misi_img ?? old('misi_img') }}" @empty($profile) required @endempty>
                        @error('misi_img')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Model Konsep</label>
                        <div>
                            <textarea required class="form-control tiny" rows="5" name="model_konsep">{{ $profile->model_konsep ?? old('model_konsep') }}</textarea>
                            @error('model_konsep')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Model Konsep Gambar</label>
                        <input type="file" class="filestyle" data-buttonname="btn-secondary" name="model_konsep_img"
                            value="{{ $profile->model_konsep_img ?? old('model_konsep_img') }}" @empty($profile) required @endempty>
                        @error('model_konsep_img')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Kekuatan</label>
                        <div>
                            <textarea required class="form-control tiny" rows="5" name="kekuatan">{{ $profile->kekuatan ?? old('kekuatan') }}</textarea>
                            @error('kekuatan')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Fokus Wilayah</label>
                        <div>
                            <textarea type="text" class="form-control tiny" name="fokus_wilayah" >{{ $profile->fokus_wilayah ?? old('fokus_wilayah') }}</textarea>
                            @error('fokus_wilayah')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <div>
                            <input type="text" class="form-control" name="alamat" value="{{ $profile->alamat ?? old('alamat') }}" required />
                            @error('alamat')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Jam Kerja</label>
                        <textarea name="jam_kerja" id="" cols="30" rows="5" class="form-control">{{ $profile->jam_kerja ?? old('jam_kerja') }}</textarea>
                            @error('jam_kerja')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <div>
                            <input type="number" class="form-control" name="telepon" value="{{ $profile->telepon ?? old('telepon') }}" required />
                            @error('telepon')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>E-Mail</label>
                        <div>
                            <input type="email" class="form-control" name="email" value="{{ $profile->email ?? old('email') }}" required  />
                            @error('email')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label><i class="fab fa-instagram"></i> Instagram</label>
                        <div>
                            <input type="text" class="form-control" name="instagram" placeholder="Masukan username instagram" value="{{ $profile->instagram ?? old('instagram') }}" required />
                            @error('instagram')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label><i class="fab fa-facebook"></i> Facebook</label>
                        <div>
                            <input type="text" class="form-control" name="facebook" placeholder="Masukan username facebook" value="{{ $profile->facebook ?? old('facebook') }}" />
                            @error('facebook')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label><i class="fab fa-youtube"></i> Youtube</label>
                        <div>
                            <input type="text" class="form-control" name="youtube" placeholder="Masukan username youtube" value="{{ $profile->youtube ?? old('youtube') }}" />
                            @error('youtube')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-0">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                Simpan
                            </button>
                            <a href="{{ route('profile.index') }}" class="btn btn-secondary waves-effect">
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
<!--tinymce js-->
<script src="{{asset('assets/back/libs/tinymce/tinymce.min.js')}}"></script>

<!-- init js -->
<script src="{{asset('assets/back/js/pages/form-editor.init.js')}}"></script>
@endsection