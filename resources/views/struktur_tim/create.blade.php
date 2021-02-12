@extends('layouts.app')

@section('title')
{{ $title }}
@endsection

@section('breadcrumb')
    {{Breadcrumbs::render('struktur_tim.create')}}
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

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" value="{{ old('nama') }}" required />
                        @error('nama')
                            <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Foto</label><br>
                        <img class="rounded img-preview mr-2 mo-mb-2" alt="200x200" width="200" src="{{ avatar() }}" data-holder-rendered="true">
                    </div>
                    <div class="form-group">
                        <input type="file" class="filestyle" data-buttonname="btn-secondary" name="foto" id="" required onchange="filePreview(this)">
                        @error('foto')
                            <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Jabatan</label>
                        <input type="text" class="form-control" name="jabatan" value="{{ old('jabatan') }}" required />
                        @error('jabatan')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label><i class="fab fa-facebook"></i> Facebook</label>
                        <input type="text" class="form-control" name="facebook" placeholder="Masukan username facebook" value="{{ old('facebook') }}" required />
                        @error('facebook')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label><i class="fab fa-twitter"></i> Twitter</label>
                        <input type="text" class="form-control" name="twitter" placeholder="Masukan username twitter" value="{{ old('twitter') }}" required />
                        @error('twitter')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label><i class="fab fa-linkedin"></i> Linkedin</label>
                        <input type="text" class="form-control" name="linkedin" placeholder="Masukan username linkedin" value="{{ old('linkedin') }}" required />
                        @error('linkedin')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label><i class="fab fa-instagram"></i> Instagram</label>
                        <input type="text" class="form-control" name="instagram" placeholder="Masukan username instagram" value="{{ old('instagram') }}" required />
                        @error('instagram')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>

                    {{-- <div class="form-group">
                        <label for="">Urutan Tampil</label>
                        <select name="urutan" class="form-control" id="">
                            <option value="">-- Pilih Urutan Tampil --</option>
                            @for ($i = 1; $i < $urutan; $i++)
                                <option value="{{$i}}"> {{$i}}</option>
                            @endfor
                        </select>
                    </div> --}}

                    <div class="form-group">
                        <label>Status</label>
                        <select class="custom-select" name="status" required>
                            <option disabled selected>-- Pilih Status --</option>
                            <option value="aktif">Aktif</option>
                            <option value="tidak aktif">Tidak aktif</option>
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
                            <a href="{{ route('struktur_tim.index') }}" class="btn btn-secondary waves-effect">
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
