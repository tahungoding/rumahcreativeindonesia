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

                <form class="custom-validation" action="{{ $actionUrl }}" method="POST">
                    @csrf
                    @isset($profile)
                    @method('put')
                    @endisset

                    @foreach ($profile as $profil)
                    <div class="form-group">
                        <label>Latar Belakang</label>
                        <div>
                            <textarea required class="form-control" rows="5" name="latar_belakang">{{ $profil->latar_belakang ?? old('latar_belakang') }}</textarea>
                            @error('latar_belakang')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Visi</label>
                        <div>
                            <textarea required class="form-control" rows="5" name="visi">{{ $profil->visi ?? old('visi') }}</textarea>
                            @error('visi')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Misi</label>
                        <div>
                            <textarea required class="form-control" rows="5" name="misi">{{ $profil->misi ?? old('misi') }}</textarea>
                            @error('misi')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Model Konsep</label>
                        <div>
                            <textarea required class="form-control" rows="5" name="model_konsep">{{ $profil->model_konsep ?? old('model_konsep') }}</textarea>
                            @error('model_konsep')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Kekuatan</label>
                        <div>
                            <textarea required class="form-control" rows="5" name="kekuatan">{{ $profil->kekuatan ?? old('kekuatan') }}</textarea>
                            @error('kekuatan')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Fokus Wilayah</label>
                        <div>
                            <input type="text" class="form-control" name="fokus_wilayah" value="{{ $profil->fokus_wilayah ?? old('fokus_wilayah') }}" required />
                            @error('fokus_wilayah')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <div>
                            <input type="text" class="form-control" name="alamat" value="{{ $profil->alamat ?? old('alamat') }}" required />
                            @error('alamat')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <div>
                            <input type="number" class="form-control" name="telepon" value="{{ $profil->telepon ?? old('telepon') }}" required data-parsley-type="number" />
                            @error('telepon')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>E-Mail</label>
                        <div>
                            <input type="email" class="form-control" name="email" value="{{ $profil->email ?? old('email') }}" required parsley-type="email" />
                            @error('email')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Instagram</label>
                        <div>
                            <input type="text" class="form-control" name="instagram" value="{{ $profil->instagram ?? old('instagram') }}" required />
                            @error('instagram')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Facebook</label>
                        <div>
                            <input type="text" class="form-control" name="facebook" value="{{ $profil->facebook ?? old('facebook') }}" />
                            @error('facebook')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Youtube</label>
                        <div>
                            <input type="text" class="form-control" name="youtube" value="{{ $profil->youtube ?? old('youtube') }}" />
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
                    @endforeach
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