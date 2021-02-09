@extends('layouts.app')
@section('title')
    UMKM - Edit
@endsection

@section('breadcrumb')
    {{Breadcrumbs::render('umkm.edit', $umkm->id)}}
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

                <form class="custom-validation" action="{{ $actionUrl }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @isset($umkm)
                    @method('put')
                    @endisset

                    <div class="form-group">
                        <label>Kategori Mitra</label>
                        <select id="kategori_umkm" name="id_kategori_umkm" class="form-control">
                        <option value="">- Pilih Kategori Mitra -</option>
                            @foreach ($kategori_umkms as $kategori_umkm)
                            <option value="{{ $kategori_umkm->id }}" {{($kategori_umkm->id == $umkm->id_kategori_umkm) ? 'selected='.'"true"' : null}}>{{ $kategori_umkm->nama }}</option>
                            @endforeach
                        </select>
                        @error('kategori_umkm')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" value="{{ $umkm->nama ?? old('nama') }}"
                            required />
                        @error('nama')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Gambar</label><br>
                        <img class="rounded img-preview mr-2 mo-mb-2" alt="200x200" width="200" src="{{ isset($umkm) ? avatar($umkm->gambar) : avatar() }}" data-holder-rendered="true">
                    </div>
                    <div class="form-group">
                        <input type="file" class="filestyle" data-buttonname="btn-secondary" name="gambar" id=""  onchange="filePreview(this)">
                        @error('gambar')
                            <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="{{ $umkm->alamat ?? old('alamat') }}"
                            required />
                        @error('alamat')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="text" class="form-control" name="telepon" value="{{ $umkm->telepon ?? old('telepon') }}"
                            required />
                        @error('telepon')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Instagram</label>
                        <input type="text" class="form-control" name="instagram" value="{{ $umkm->instagram ?? old('instagram') }}"
                            required />
                        @error('instagram')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Pemilik</label>
                        <input type="text" class="form-control" name="pemilik" value="{{ $umkm->pemilik ?? old('pemilik') }}"
                            required />
                        @error('pemilik')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Shopee</label>
                        <input type="text" class="form-control" name="shopee" value="{{ $umkm->shopee ?? old('shopee') }}"
                            required />
                        @error('shopee')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Tokopedia</label>
                        <input type="text" class="form-control" name="tokopedia" value="{{ $umkm->tokopedia ?? old('tokopedia') }}"
                            required />
                        @error('tokopedia')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Bukalapak</label>
                        <input type="text" class="form-control" name="bukalapak" value="{{ $umkm->bukalapak ?? old('bukalapak') }}"
                            required />
                        @error('bukalapak')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-0">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                Simpan
                            </button>
                            <a href="{{ route('umkm.index') }}" class="btn btn-secondary waves-effect">
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
