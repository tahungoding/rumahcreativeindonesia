@extends('layouts.app')

@section('title')
{{ $title }}
@endsection

@section('breadcrumb')
    {{Breadcrumbs::render('program.create')}}
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
                        <label>Nama Program</label>
                        <input type="text" class="form-control" value="{{old('nama_program')}}" name="nama_program" required />
                        @error('nama_program')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Icon</label>
                        <input type="file" class="filestyle" data-buttonname="btn-secondary" name="icon">
                        @error('icon')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" class="filestyle" data-buttonname="btn-secondary" name="gambar">
                        @error('gambar')
                        <span class="text-danger">{{ $message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Tanda</label>
                        <div>
                            <input type="text" required value="{{old('tanda')}}" class="form-control" name="tanda">
                            @error('tanda')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <div>
                            <textarea required class="form-control tiny" {{old('deskripsi')}} rows="5" name="deskripsi"></textarea>
                            @error('deskripsi')
                            <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="custom-select" name="status" required>
                            <option disabled selected>-- Pilih Status --</option>
                            <option value="aktif" {{(old('status') == 'aktif') ? 'selected' : null}}>Aktif</option>
                            <option value="tidak aktif" {{(old('status') == 'tidak aktif') ? 'selected' : null}}>Tidak aktif</option>
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
                            <a href="{{ route('program.index') }}" class="btn btn-secondary waves-effect">
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

<!--tinymce js-->
<script src="{{asset('assets/back/libs/tinymce/tinymce.min.js')}}"></script>

<!-- init js -->
<script src="{{asset('assets/back/js/pages/form-editor.init.js')}}"></script>
@endsection