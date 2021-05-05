@extends('layouts.guest')

@section('content')
    <section class="page-title-bg pt-250 pb-100" data-bg-img="{{asset('assets/front/img/section-pattern/page-title.png')}}">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title text-center">
                            <h2>Daftar Komunitas Umkm</h2>
                            <ul class="list-inline">
                                <li><a href="{{url('/')}}">Beranda</a></li>
                                <li><a href="{{url('/umkms')}}">Umkm</a></li>
                                <li>Daftar Komunitas Umkm</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Page Title End -->

        <!-- About Section Begin -->
        <section class="">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="about-text mt-5">
                            <table class="table table-borderless" id="umkm-table" style="border: 0px">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nama</th>
                                        <th>Logo</th>
                                        <th>Alamat</th>
                                        <th>Telepon</th>
                                        <th>Pemilik</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br>
        <!-- About Section End -->

@endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ asset('assets/back/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('js')
<!-- Required datatable js -->
<script src="{{ asset('assets/back/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/back/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<!-- Buttons examples -->
    <script>
        $(function() {
            $('#umkm-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: 'http://rumahcreativeindonesia.test/list-umkms-data',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'nama', name: 'nama' },
                    { data: 'gambar', name: 'gambar' },
                    { data: 'alamat', name: 'alamat' },
                    { data: 'telepon', name: 'telepon' },
                    { data: 'pemilik', name: 'pemilik' },
                ],
                columnDefs: [
                    { targets: 2,
                        render: function(data) {
                            var res = data.replace('public/', 'storage/');
                            return '<img src="' + res + '" style="width:150px;height:150px;object-fit:cover;" />';
                        }
                    }   
                ],
            });
        });
    </script>
@endsection
