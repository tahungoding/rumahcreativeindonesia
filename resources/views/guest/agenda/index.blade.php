@extends('layouts.guest');

@section('content')
    <!-- Page Title Begin -->
        <section class="page-title-bg pt-250 pb-100" data-bg-img="{{asset('assets/front/img/section-pattern/page-title.png')}}">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title text-center">
                            <h2>Agenda</h2>
                            <ul class="list-inline">
                                <li><a href="{{url('/')}}">Beranda</a></li>
                                <li>Agenda</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Page Title End -->
        
        <section class="pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h3>Rumah CreativePreneur Indonesia</h3>
                            <h2>Daftar Agenda Kami</h2>
                            <p>Mutual has cannot beauty indeed now sussex merely you. It possible no husbands jennings ye
                                offended packages pleasant he. Remainder recommend who applauded departure joy.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="project-nav text-center mb-30">
                            <div class="nav justify-content-center align-items-center">
                                <ul class="project_filter list-inline">
                                    <li class="{{(!isset($_GET['status'])) ? 'active' : null }}"><a href="/agendas" style="all: unset"><span class="filter-btn">Semua</span></a></li>
                                    <li class="{{(isset($_GET['status'])) ? (($_GET['status'] == 'aktif') ? 'active' : null) : null }}"><a href="?status=aktif" style="all: unset"><span class="filter-btn">Yang Akan datang</span></a></li>
                                    <li class="{{(isset($_GET['status'])) ? (($_GET['status'] == 'tidak aktif') ? 'active' : null) : null }}"><a href="?status=tidak aktif" style="all: unset"><span class="filter-btn">Selesai </span></a></li>
        
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="load-data">

                  @include('guest.agenda.data_agenda')  
        
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="project-load-more text-center mt-20">
                            <button type="submit" class="btn" id="btn-more"><span>Selengkapnya</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection

@section('js')
<script>
 $(document).ready(function(){
    var id = 1;
   $(document).on('click','#btn-more',function(){
       id++;
       var url_string = window.location;
       var url = new URL(url_string);
       var status = url.searchParams.get("status");
       $("#btn-more").html("<span>Loading...</span>");
       $.ajax({
           url : '{{ url("agendas")}}',
           method : "GET",
           data: {page:id, status:status},
           datatype : "html",
           success : function (data)
           {
              if(data.html != '') 
              {
                  $('#load-data').append(data.html);
                  $('#btn-more').html("<span>Selengkapnya</span>");
              }
              else
              {
                  $('#btn-more').html("<span>Tidak ada data lagi</span>");
              }
           }
       });
   });  
}); 
</script>
@endsection