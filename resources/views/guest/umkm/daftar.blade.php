@extends('layouts.guest')
@section('title')
    {{$title}}
@endsection
@section('content')
    <!-- Page Title Begin -->
    <section class="page-title-bg pt-250 pb-100" data-bg-img="{{asset('assets/front/img/section-pattern/page-title.png')}}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Daftar UMKM</h2>
                        <ul class="list-inline">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li>Daftar UMKM</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Title End -->

    <!-- Contact Info Begin -->
    <section class="pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if ($msg = Session::get('success'))
                        <div class="alert alert-success">
                        {{$msg}}
                    </div>
                    @endif
                    @if ($msg = Session::get('error'))
                    <div class="alert alert-danger">
                        {{$msg}}
                    </div>
                    @endif
                    <div>
                        <form method="POST" action="{{ route('daftar-umkm-post') }}" enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group">
                                <label>Kategori UMKM <sup class="text-danger" title="Wajib diisi">*</sup> </label>
                                <select id="kategori_umkm" name="id_kategori_umkm" class="form-control">
                                <option value="">- Pilih Kategori UMKM -</option>
                                    @foreach ($kategori_umkms as $kategori_umkm)
                                    <option value="{{ $kategori_umkm->id }}">{{ $kategori_umkm->nama }}</option>
                                    @endforeach
                                </select>
                                @error('kategori_umkm')
                                <span class="text-danger">{{ $message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nama Usaha <sup class="text-danger" title="Wajib diisi">*</sup></label>
                                <input type="text" class="form-control" name="nama" value="{{ old('nama') }}"
                                    placeholder="Masukan Nama Usaha / UMKM" />
                                @error('nama')
                                <span class="text-danger">{{ $message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nama Pemilik <sup class="text-danger" title="Wajib diisi">*</sup></label>
                                <input type="text" class="form-control" name="pemilik" value="{{ old('pemilik') }}"
                                    placeholder="Masukan Nama Pemilik / Owner" />
                                @error('pemilik')
                                <span class="text-danger">{{ $message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Gambar / Logo Usaha <sup class="text-danger" title="Wajib diisi">*</sup></label><br>
                                <img class="rounded img-preview mr-2 mo-mb-2" alt="200x200" width="200" src="{{ avatar() }}" data-holder-rendered="true">
                            </div>
                            <div class="form-group">
                                <input type="file" class="filestyle" name="gambar" id="" required onchange="filePreview(this)">
                                @error('gambar')
                                    <span class="text-danger">{{ $message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Alamat Pemilik<sup class="text-danger" title="Wajib diisi">*</sup></label>
                                <input type="text" class="form-control" name="alamat" value="{{ old('alamat') }}"
                                    placeholder="Masukan Alamat Lengkap" />
                                @error('alamat')
                                <span class="text-danger">{{ $message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Alamat Usaha<sup class="text-danger" title="Wajib diisi">*</sup></label>
                                <input type="text" class="form-control" name="alamat_usaha" value="{{ old('alamat_usaha') }}"
                                    placeholder="Masukan Alamat Usaha Lengkap" />
                                @error('alamat_usaha')
                                <span class="text-danger">{{ $message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Alasan dan Tujuan Bergabung <sup class="text-danger" title="Wajib diisi">*</sup></label>
                                <textarea name="alasan" class="form-control" id="" cols="30" rows="10">{{ old('alasan') }}</textarea>
                                @error('alasan')
                                <span class="text-danger">{{ $message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Telepon <sup class="text-danger" title="Wajib diisi">*</sup></label>
                                <input type="number" class="form-control" name="telepon" value="{{ old('telepon') }}"
                                    placeholder="Masukan no telepon aktif" />
                                @error('telepon')
                                <span class="text-danger">{{ $message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Instagram</label>
                                <input type="text" class="form-control" name="instagram" value="{{ old('instagram') }}"
                                    placeholder="Masukan username instagram akun UMKM (example: umkm.co.id)" />
                                    <small>*Isi <b>-</b> bila tidak ada</small>
                                    @error('instagram')
                                    <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label>Website</label>
                                    <input type="text" class="form-control" name="website" value="{{ old('website') }}"
                                    placeholder="Masukan alamat website anda (example: https://umkm.co.id/) " />
                                    <small>*Isi <b>-</b> bila tidak ada</small>
                                @error('website')
                                <span class="text-danger">{{ $message}}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-0">
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                        <span>Kirim</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Contact Form End -->
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Info End -->
@endsection
@section('js')
    <script>
        function filePreview(input, previewField = '.img-preview') {
            $('#img-preview').show();
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $(previewField).attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection