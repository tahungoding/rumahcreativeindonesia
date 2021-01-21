@extends('layouts.app')

@section('title')
{{ $title }}
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
                    @isset($user)
                    @method('put')
                    @endisset

                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" class="filestyle" data-buttonname="btn-secondary" name="foto"
                            value="{{ $user->foto ?? old('foto') }}">
                        @error('foto')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="name" value="{{ $user->name ?? old('name') }}"
                            required />
                        @error('name')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username"
                            value="{{ $user->username ?? old('username') }}" required />
                        @error('username')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Hak Akses</label>
                        <select class="custom-select" name="user_level" required>
                            @php
                            $selectedLevel = (isset($user)) ? $user->id_level : old('user_level') ;
                            @endphp

                            <option disabled selected>-- Pilih hak akses --</option>
                            @foreach ($userLevels as $userLevel)
                            <option value="{{ $userLevel->id }}" @if ($selectedLevel===$userLevel->id) selected
                                @endif>{{ $userLevel->nama }}</option>
                            @endforeach
                        </select>
                        @error('user_level')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>E-Mail</label>
                        <div>
                            <input type="email" class="form-control" name="email"
                                value="{{ $user->email ?? old('email') }}" required parsley-type="email" />
                        </div>
                        @error('email')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <div>
                            <input type="password" id="pass2" class="form-control" name="password"
                                data-parsley-minlength="6" @empty($user) required @endempty
                                placeholder="masukkan password @isset($user) baru @endisset" />
                            @error('password')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <input type="password" class="form-control" name="confirm_password" @empty($user) required
                                @endempty data-parsley-equalto="#pass2"
                                placeholder="ketik ulang password @isset($user) baru @endisset" />
                            @error('confirm_password')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-0">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                Simpan
                            </button>
                            <a href="{{ route('user.index') }}" class="btn btn-secondary waves-effect">
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
@endsection
