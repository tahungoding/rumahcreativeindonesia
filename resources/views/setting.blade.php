@extends('layouts.app')

@section('title')
{{ $title }}
@endsection

@section('breadcrumb')
    {{Breadcrumbs::render('setting.index', $user->id)}}
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

                <form class="custom-validation" action="{{route('setting.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @isset($user)
                    @method('patch')
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
                    @if (Auth::user()->userLevel->nama == 'Admin')
                    <div class="form-group">
                        <label>Hak Akses</label>
                        <select class="custom-select" name="user_level" required>
                            @php
                            $selectedLevel = (isset($user)) ? $user->id_level : old('user_level') ;
                            @endphp
                            @foreach ($userLevels as $userLevel)
                            <option value="{{ $userLevel->id }}" @if ($selectedLevel===$userLevel->id) selected
                                @endif>{{ $userLevel->nama }}</option>
                            @endforeach
                        </select>
                        @error('user_level')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    @endif

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

                    {{-- <div class="form-group">
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
                    </div> --}}
                    @if (Auth::user()->userLevel->nama == 'Admin')
                    @isset($user)
                    <div class="form-group">
                        <label>Status</label>
                        <select class="custom-select" name="status" required>
                            @php
                            $selectedStatus = (isset($user)) ? $user->status : old('status') ;
                            @endphp

                            <option disabled selected>-- Pilih status --</option>
                            @foreach (['aktif', 'tidak aktif'] as $status)
                            <option value="{{ $status }}" @if ($selectedStatus===$status) selected @endif>{{ $status }}
                            </option>
                            @endforeach
                        </select>
                        @error('status')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    @endisset
                    @endif

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
                <br>
                <label for="ubah_password_btn" style="cursor: pointer;color:grey">Ubah Password ?</label>
                <button type="button" id="ubah_password_btn" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#ubah_password_mdl" style="display: none"></button>
                <div id="ubah_password_mdl" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0" id="myModalLabel">Ubah Password</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                @if ($msg = Session::get('success_pw'))
                                    <div class="alert alert-success">
                                        {{ $msg }}
                                    </div>
                                    @endif
                                @if ($msg = Session::get('error_pw'))
                                    <div class="alert alert-danger">
                                        {{ $msg }}
                                    </div>
                                    @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                             <form action="{{route('setting.password')}}" method="POST">
                                 @csrf
                                 @method('PUT')
                                <label for="">Password Lama</label>
                                <input type="password" name="old_password" class="form-control" placeholder="Masukan password lama">
                                <label for="">Password Baru</label>
                                <input type="password" name="new_password" class="form-control" placeholder="Masukan password baru">
                                <label for="">Konfirmasi Password Baru</label>
                                <input type="password" name="confirm_password" class="form-control" placeholder="Konfirmasi password baru">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                            </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
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

@if ($msg = Session::get('success_pw'))
    <script>
        $('#ubah_password_mdl').modal('show');
    </script>
@endif
@if ($msg = Session::get('error_pw'))
    <script>
        $('#ubah_password_mdl').modal('show');
    </script>
@endif
@if ($errors->any())
    <script>
        $('#ubah_password_mdl').modal('show');
    </script>
@endif

@endsection