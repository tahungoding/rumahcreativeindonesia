@extends('layouts.app')

@section('title')
    UMKM
@endsection

@section('breadcrumb')
    {{Breadcrumbs::render('umkm.index')}}
@endsection

@section('css')
    <!-- Isi Library CSS -->
    <!-- DataTables -->
    <link href="{{ asset('assets/back/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css" />
    <link href="{{ asset('assets/back/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/back/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
    rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">{{ $title }}</h4>
                <p class="card-title-desc">
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
                    <a href="{{ route('pelaku_umkm.create') }}" class="btn btn-primary waves-effect waves-light">
                        <i class="ti-plus"></i> Tambah</a>
                        {{-- <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
                            IMPORT EXCEL
                        </button> --}}
                        <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form method="post" action="{{route('pelaku_umkm.import_excel')}}" enctype="multipart/form-data">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                                        </div>
                                        <div class="modal-body">
                
                                            {{ csrf_field() }}
                
                                            <label>Pilih file excel</label>
                                            <div class="form-group">
                                                <input type="file" name="file" required="required">
                                            </div>
                
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Import</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                </p>

                <table  class="table table-striped table-bordered dt-responsive nowrap data-table"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat Lengkap</th>
                            <th>Bidang Usaha</th>
                            <th>No HP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
@endsection

@section('js')
    <!-- Isi Library Javascript -->
     <!-- Required datatable js -->
    <script src="{{ asset('assets/back/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/back/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('assets/back/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/back/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/back/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/back/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/back/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/back/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/back/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/back/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('assets/back/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/back/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ asset('assets/back/js/pages/datatables.init.js') }}"></script>

    <script type="text/javascript">
        $(function () {
          var table = $('.data-table').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('pelaku_umkm.index') }}",
              columns: [
                  {data: 'nik', name: 'nik'},
                  {data: 'nama', name: 'nama'},
                  {
                      data: 'tanggal_lahir', 
                      name: 'tanggal_lahir',
                      render: function (data) {
                          if (data !== null) {
                            var date = new Date(data);
                            var tahun = date.getFullYear();
                            var bulan = date.getMonth();
                            var tanggal = date.getDate();
                            var hari = date.getDay();

                            switch(hari) {
                                case 0: hari = "Minggu"; break;
                                case 1: hari = "Senin"; break;
                                case 2: hari = "Selasa"; break;
                                case 3: hari = "Rabu"; break;
                                case 4: hari = "Kamis"; break;
                                case 5: hari = "Jum'at"; break;
                                case 6: hari = "Sabtu"; break;
                            }switch(bulan) {
                                case 0: bulan = "Januari"; break;
                                case 1: bulan = "Februari"; break;
                                case 2: bulan = "Maret"; break;
                                case 3: bulan = "April"; break;
                                case 4: bulan = "Mei"; break;
                                case 5: bulan = "Juni"; break;
                                case 6: bulan = "Juli"; break;
                                case 7: bulan = "Agustus"; break;
                                case 8: bulan = "September"; break;
                                case 9: bulan = "Oktober"; break;
                                case 10: bulan = "November"; break;
                                case 11: bulan = "Desember"; break;
                            }
                            var tampilTanggal = hari + ", " + tanggal + " " + bulan + " " + tahun;
                            return tampilTanggal;
                          }else{
                              return "Belum terdaftar";
                          }
                      },
                    },
                  {
                      data: 'jenis_kelamin', 
                      name: 'jenis_kelamin',
                      render: function (data) {
                          if (data !== null) {
                              if (data === "p") {
                                  return "Perempuan";
                              } else {
                                  return "Laki-laki";
                              }
                          } else {
                            return "Belum terdaftar";
                          }
                      }
                    },
                  {data: 'alamat', name: 'alamat'},
                  {data: 'bidang_usaha', name: 'bidang_usaha'},
                  {data: 'no_hp', name: 'no_hp'},
                  {data: 'action', name: 'action', orderable: true, searchable: true},
              ]
          });
        });
      </script>
@endsection