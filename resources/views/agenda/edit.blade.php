@extends('layouts.app')

@section('title')
{{ $title }}
@endsection

@section('breadcrumb')
    {{Breadcrumbs::render('agenda.edit', $agenda->id)}}
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
                    @isset($agenda)
                    @method('put')
                    @endisset

                    <div class="form-group">
                        <label>Nama Agenda</label>
                        <input type="text" class="form-control" name="nama_agenda" value="{{ $agenda->nama_agenda ?? old('nama_agenda') }}" required />
                        @error('nama_agenda')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Tanggal Awal</label>

                        <input class="form-control" type="date" name="tanggal_awal" value="{{ date('Y-m-d', strtotime($agenda->tanggal_awal)) ?? date('Y-m-d', strtotime(old('tanggal_awal')))  }}" id="example-date-input">
                        @error('tanggal_awal')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Tanggal Akhir</label>
                        <input class="form-control" type="date" name="tanggal_akhir" value="{{ date('Y-m-d', strtotime($agenda->tanggal_akhir)) ?? date('Y-m-d', strtotime(old('tanggal_akhir')))  }}" id="example-date-input">
                        @error('tanggal_akhir')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Tempat</label>
                        <input type="text" class="form-control" name="tempat" value="{{ $agenda->tempat ?? old('tempat') }}" required />
                        @error('tempat')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <div>
                            <textarea required class="form-control" rows="5" name="deskripsi">{{ $agenda->deskripsi ?? old('deskripsi') }}</textarea>
                            @error('deskripsi')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Penyelenggara</label>
                        <input type="text" class="form-control" name="penyelenggara" value="{{ $agenda->penyelenggara ?? old('penyelenggara') }}" required />
                        @error('penyelenggara')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Gambar</label><br>
                        <img class="rounded img-preview mr-2 mo-mb-2" alt="200x200" width="200" src="{{ isset($agenda) ? avatar($agenda->gambar) : avatar() }}" data-holder-rendered="true">
                    </div>
                    <div class="form-group">
                        <input type="file" class="filestyle" data-buttonname="btn-secondary" name="gambar" value="{{ $agenda->gambar ?? old('gambar') }}" onchange="filePreview(this)">
                        @error('gambar')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="custom-select" name="status" required>
                            @php
                            $selectedStatus = $agenda->status;
                            @endphp

                            <option disabled selected>-- Pilih Status --</option>
                            <option value="aktif" @if ($selectedStatus==="aktif" ) selected @endif>Aktif</option>
                            <option value="tidak aktif" @if ($selectedStatus==="tidak aktif" ) selected @endif>Tidak aktif</option>
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
                            <a href="{{ route('agenda.index') }}" class="btn btn-secondary waves-effect">
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

<script src="{{ asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
@endsection
