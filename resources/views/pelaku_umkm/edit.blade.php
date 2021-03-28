@extends('layouts.app')
@section('title')
    UMKM - Tambah
@endsection

@section('breadcrumb')
    {{Breadcrumbs::render('umkm.create')}}
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
                    @isset($pelaku_umkm)
                    @method('PUT')
                    @endisset
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" class="form-control" name="nik" value="{{ $pelaku_umkm->nik ?? old('nik') }}"
                            required />
                        @error('nik')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" value="{{ $pelaku_umkm->nama ?? old('nama') }}"
                            required />
                        @error('nama')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" value="{{ $pelaku_umkm->tanggal_lahir ?? old('tanggal_lahir') }}"
                            required />
                        @error('tanggal_lahir')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <div class="form-check">
                            <input name="jenis_kelamin" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="l" {{ (($pelaku_umkm->jenis_kelamin ?? old('jenis_kelamin')) == 'l' ) ? 'checked' : null }}>
                            <label class="form-check-label" for="exampleRadios1">
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="jenis_kelamin" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="p" {{ (($pelaku_umkm->jenis_kelamin ?? old('jenis_kelamin')) == 'p' ) ? 'checked' : null }}>
                            <label class="form-check-label" for="exampleRadios2">
                                Perempuan
                            </label>
                        </div>
                        @error('jenis_kelamin')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Provinsi</label>
                        <select name="provinsi" class="form-control" id="province">
                            <option value="">Pilih Provinsi</option>
                            @foreach ($provinsi as $i)
                                <option value="{{$i->id}}" {{($i->id == $pelaku_umkm->provinsi) ? 'selected' : null}}>{{$i->name}}</option>
                            @endforeach
                        </select>
                        @error('provinsi')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Kabupaten / Kota</label>
                        <select name="kabupaten_kota" class="form-control" id="regencies">
                            <option value="">Pilih Kabupaten / Kota</option>
                            @foreach ($kabupaten_kota as $i)
                                <option value="{{$i->id}}" {{($i->id == $pelaku_umkm->kabupaten_kota) ? 'selected' : null}}>{{$i->name}}</option>
                            @endforeach
                        </select>
                        @error('kabupaten_kota')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Kecamatan</label>
                        <select name="kecamatan" class="form-control" id="districts">
                            <option value="">Pilih Kecamatan</option>
                            @foreach ($kecamatan as $i)
                                <option value="{{$i->id}}" {{($i->id == $pelaku_umkm->kecamatan) ? 'selected' : null}}>{{$i->name}}</option>
                            @endforeach
                        </select>
                        @error('kecamatan')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Desa / Kelurahan</label>
                        <select name="desa_kelurahan" class="form-control" id="villages">
                            <option value="">Pilih Desa / Kelurahan</option>
                            @foreach ($desa_kelurahan as $i)
                                <option value="{{$i->id}}" {{($i->id == $pelaku_umkm->desa_kelurahan) ? 'selected' : null}}>{{$i->name}}</option>
                            @endforeach
                        </select>
                        @error('desa_kelurahan')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Alamat Pelengkap</label>
                        <input type="text" class="form-control" name="alamat" value="{{ $pelaku_umkm->alamat ?? old('alamat') }}"
                            required />
                        @error('alamat')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Bidang Usaha</label>
                        <input type="text" class="form-control" name="bidang_usaha" value="{{ $pelaku_umkm->bidang_usaha ?? old('bidang_usaha') }}"
                            required />
                        @error('bidang_usaha')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>No HP / WA</label>
                        <input type="number" class="form-control" name="no_hp" value="{{ $pelaku_umkm->no_hp ?? old('no_hp') }}"
                            required />
                        @error('no_hp')
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
<script>
$(function () {
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

    // $('#regencies').hide();
    $('#province').on('change', function () {
        $.ajax({
            url: '{{ route("pelaku_umkm.kabupaten_kota") }}',
            method: 'POST',
            data: {
                _token : "{{csrf_token()}}",
                id: $(this).val()
                },
            success: function (response) {
                $('#regencies').empty();

                $.each(response, function (id, name) {
                    $('#regencies').show();
                    $('#regencies').append(new Option(name, id))
                })
            }
        })
    });
    // $('#districts').hide();
    $('#regencies').on('change', function () {
        $.ajax({
            url: '{{ route("pelaku_umkm.kecamatan") }}',
            method: 'POST',
            data: {
                _token : "{{csrf_token()}}",
                id: $(this).val()
                },
            success: function (response) {
                $('#districts').empty();

                $.each(response, function (id, name) {
                    $('#districts').show();
                    $('#districts').append(new Option(name, id))
                })
            }
        })
    });
    // $('#villages').hide();
    $('#districts').on('change', function () {
        $.ajax({
            url: '{{ route("pelaku_umkm.desa_kelurahan") }}',
            method: 'POST',
            data: {
                _token : "{{csrf_token()}}",
                id: $(this).val()
                },
            success: function (response) {
                $('#villages').empty();

                $.each(response, function (id, name) {
                    $('#villages').show();
                    $('#villages').append(new Option(name, id))
                })
            }
        })
    });
});
</script>
@endsection
