@extends('layouts.guest');

@section('content')
        <!-- Page Title Begin -->
        <section class="page-title-bg pt-250 pb-100" data-bg-img="{{asset('assets/front/img/section-pattern/page-title.png')}}">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title text-center">
                            <h2>Komunitas UMKM</h2>
                            <ul class="list-inline">
                                <li><a href="{{url('/')}}">Beranda</a></li>
                                <li>UMKM</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Page Title End -->
        <!-- About Section Begin -->
        <section class="pt-120 pb-120">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <img src="{{asset('assets/front/img/case-study-about.jpg')}}" class="rounded-circle" data-rjs="2" alt="">
                    </div>
                    <div class="col-lg-9">
                        <!-- Section Title Begin -->
                        <div class="section-title mb-50 mb-lg-0">
                            <h3>What We’ve Done</h3>
                            <h2>We Work All Over The <br>
                                World With Company</h2>
                            <p>Enjoyed minutes related on fanny dried as often me. Goodness as reserved raptures to mistaken steepest oh he. Gravity he
                            mr sixteen esteems. Mile home new way with high said. Finished horrible blessing landlord dwelling dissuade if. Rent
                            fond am he in on read. Anxious cordial demands settled entered in do to colonel landlord dwelling dissuade.</p>
                        </div>
                        <!-- Section Title End -->
                    </div>
                </div>
            </div>
        </section>
        <!-- About Section End -->
        <!-- About Section Begin -->
        <section class="pt-120 pb-120">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-9">
                        <!-- Section Title Begin -->
                        <div class="section-title mb-50 mb-lg-0 text-right">
                            <h3>What We’ve Done</h3>
                            <h2>We Work All Over The <br>
                                World With Company</h2>
                            <p>Enjoyed minutes related on fanny dried as often me. Goodness as reserved raptures to mistaken steepest oh he. Gravity he
                            mr sixteen esteems. Mile home new way with high said. Finished horrible blessing landlord dwelling dissuade if. Rent
                            fond am he in on read. Anxious cordial demands settled entered in do to colonel landlord dwelling dissuade.</p>
                        </div>
                        <!-- Section Title End -->
                    </div>

                    <div class="col-lg-3">
                        <img src="{{asset('assets/front/img/case-study-about.jpg')}}" class="rounded-circle" data-rjs="2" alt="">
                    </div>
                </div>
            </div>
        </section>
        <!-- About Section End -->
        <section class="pt-120 pb-70 section-pattern" data-bg-img="http://rumahcreativeindonesia.test/assets/front/img/section-pattern/testimonial-pattern.png">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Section Title Begin -->
                        <div class="section-title text-center">
                            <h3>List UMKM</h3>
                            <h2>Daftar UMKM Binaan</h2>
                            <p>Ferrars all spirits his imagine effects amongst neither. It bachelor cheerful of mistaken. Tore
                                has sons put upon wife
                                use bred seen. Its dissimilar invitation ten has discretion unreserved.</p>
                        </div>
                        <!-- Section Title End -->
                    </div>
                </div>
        
                <div class="row">
                    @foreach ($umkm as $item)
                        <div class="col-lg-3 col-sm-4 text-center mb-3">
                            <!-- Single Team Begin -->
                            <div class="single-team-member ">
                                <!-- Team Image Begin -->
                                <div class="image position-relative">
                        
                                    <img src="{{avatar($item->gambar)}} " data-rjs="2" alt="" style="width: 200px;height: 200px;object-fit: cover">
                                </div>
                                <!-- Team Image End -->
                                
                                <!-- Team Info Begin -->
                                <!-- Team Info End -->
                            </div>
                            
                                <button data-toggle="modal" id="detailUmkm" data-target="#modalUmkm" data-url="{{ url('umkms',['id'=>$item->id])}}">
                                    <h3>{{$item->nama}}</h3>
                                  </button>
                             
                            <!-- Single Team End -->
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Modal -->
        <div class="modal fade" id="modalUmkm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content detail-umkm">
            </div>
            </div>
        </div>
@endsection
@section('js')
    <script>
    $(document).on('click', '#detailUmkm', function(e){
        e.preventDefault();
        var url = $(this).data('url');
        $('.detail-umkm').html(''); 
        $('#modal-loader').show();     
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'html'
        })
        .done(function(data){
           // console.log(data);  
            $('.detail-umkm').html('');    
            $('.detail-umkm').html(data); // load response 
            $('#modal-loader').hide();        // hide ajax loader   
        })
        .fail(function(){
            $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
            $('#modal-loader').hide();
        });
    });
    </script>
@endsection