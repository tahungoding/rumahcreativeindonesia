@extends('layouts.guest')

@section('content')
        <!-- Page Title Begin -->
        <section class="page-title-bg pt-250 pb-100" data-bg-img="{{asset('assets/front/img/section-pattern/page-title.png')}}">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title text-center">
                            <h2>Mitra RCI</h2>
                            <ul class="list-inline">
                                <li><a href="{{url('/')}}">Beranda</a></li>
                                <li>RCI</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Page Title End -->
        <!-- About Section Begin -->
        <?php $count = 1; ?>
        @foreach ($prolog_mitra as $prol)
            <section class="pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">
                        @if ($count%2!=0)
                        <div class="col-lg-3">
                            <img src="{{avatar($prol->gambar)}}" style="width:540px;height:250px;object-fit:cover;" class="rounded-circle" data-rjs="2" alt="">
                        </div>
                        @endif
                        <div class="col-lg-9">
                            <!-- Section Title Begin -->
                            <div class="section-title mb-50 mb-lg-0 <?=($count%2==0)?'text-right':null;?> ">
                                <h3>{{$prol->notice}}</h3>
                                <h2>{{$prol->judul}}</h2>
                                {!! $prol->deskripsi !!}
                            </div>
                            <!-- Section Title End -->
                        </div>
                        @if ($count%2==0)
                        <div class="col-lg-3">
                            <img src="{{avatar($prol->gambar)}}" style="width:540px;height:250px;object-fit:cover;" class="rounded-circle" data-rjs="2" alt="">
                        </div>
                        @endif
                    </div>
                </div>
            </section>
            <?php $count++; ?>
        @endforeach
        <!-- About Section End -->
        <section class="pt-120 pb-70 section-pattern" data-bg-img="http://rumahcreativeindonesia.test/assets/front/img/section-pattern/testimonial-pattern.png">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Section Title Begin -->
                        <div class="section-title text-center">
                            <h3>Mitra</h3>
                            <h2>Daftar Mitra</h2>
                            <p>Dengan mengusung semangat kolaborasi dalam setiap langkah yang ditempuh, berikut adalah tim kolaborator yang telah menjadi mitra Rumah Creativepreneur Indonesia.</p>
                        </div>
                        <!-- Section Title End -->
                    </div>
                </div>
        
                <div class="row">
                    @foreach ($mitra as $item)
                        <div class="col-lg-2 col-sm-3 text-center mb-3">
                            <!-- Single Team Begin -->
                            <div class="single-team-member ">
                                <!-- Team Image Begin -->
                                <div class="image position-relative">
                        
                                    <button data-toggle="modal" id="detailUmkm" data-target="#modalUmkm" data-url="{{ url('mitras',['id'=>$item->id])}}">
                                        <img src="{{avatar($item->logo)}} " data-rjs="2" alt="" style="width: 200px;height: 200px;object-fit: contain">
                                      </button>
                                </div>
                                <!-- Team Image End -->
                                
                                <!-- Team Info Begin -->
                                <!-- Team Info End -->
                            </div>
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