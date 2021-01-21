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

                <form class="custom-validation" action="{{ $actionUrl }}" method="POST">
                    @csrf
                    @isset($userLevel)
                    @method('put')
                    @endisset

                    <div class="form-group">
                        <label>Nama Level</label>
                        <input type="text" class="form-control" name="level_name"
                            value="{{ $userLevel->nama ?? old('level_name') }}" required />
                        @error('level_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="custom-select" name="status" required>
                            @php
                            $selectedStatus = (isset($userLevel)) ? $userLevel->status : old('status') ;
                            @endphp

                            <option disabled selected>-- Pilih status --</option>
                            @foreach (['aktif', 'tidak aktif'] as $status)
                            <option value="{{ $status }}" @if ($selectedStatus===$status) selected @endif>
                                {{ Str::ucfirst($status) }}</option>
                            @endforeach
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
                            <a href="{{ route('user_level.index') }}" class="btn btn-secondary waves-effect">
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
@endsection
