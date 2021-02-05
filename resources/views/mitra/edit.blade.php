@extends('layouts.app')
@section('title')
    Mitra - Edit
@endsection
@section('css')
<!-- Isi Library CSS -->
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $title }}</h4>
                <p class="card-title-desc"></p>
                @if ($msg = Session::get('error'))
                <div class="alert alert-danger">
                    {{$msg}}
                </div>
                @endif
                <form class="custom-validation" action="{{ $actionUrl }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @isset($mitra)
                    @method('put')
                    @endisset
                    
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" value="{{ $mitra->nama ?? old('nama') }}"
                            required />
                        @error('nama')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Kategori Mitra</label>
                        <select id="kategori_mitra" name="id_kategori_mitra" class="form-control">
                        <option value="">- Pilih Kategori Mitra -</option>
                            @foreach ($kategori_mitras as $kategori_mitra)
                            <option value="{{ $kategori_mitra->id }}" {{($kategori_mitra->id == $mitra->id_kategori_mitra) ? 'selected='.'"true"' : null}}">{{ $kategori_mitra->nama }}</option>
                            @endforeach
                        </select>
                        @error('id_kategori_mitra')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Logo</label>
                        <input type="file" class="filestyle" data-buttonname="btn-secondary" name="logo"
                            value="{{ $mitra->logo ?? old('logo') }}">
                        @error('logo')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Link</label>
                        <input type="text" class="form-control" name="link" value="{{ $mitra->link ?? old('link') }}"
                            required />
                        @error('link')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select id="kategori_mitra" name="id_kategori_mitra" class="form-control">
                        <option value="">- Pilih Status -</option>
                            <option value="aktif" {{($mitra->status == 'aktif') ? 'selected' : null}}>Aktif</option>
                            <option value="tidak aktif" {{($mitra->status == 'tidak aktif') ? 'selected' : null}}>Tidak Aktif</option>
                        </select>
                        @error('id_kategori_mitra')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-0">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                Simpan
                            </button>
                            <a href="{{ route('mitra.index') }}" class="btn btn-secondary waves-effect">
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
@endsection

@section('js')
<!-- Isi Library Javascript -->
    <script src="{{ asset('assets/back/libs/parsleyjs/parsley.min.js') }}"></script>
    <script src="{{ asset('assets/back/js/pages/form-validation.init.js') }}"></script>
    <script src="{{ asset('assets/back/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js') }}"></script>
@endsection