<section class="pt-120 pb-120 ov-hidden">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="section-title mb-4">
        
                            <h2>{{$item->nama_program}}<br>
                            </h2>
                            {!! $item->deskripsi !!}
                        </div>
        
                    </div>
                    <!-- Video Area -->
                    <div class="col-lg-5 video-area mt-50 mt-lg-0">
                       <a><img class="" src="{{avatar($item->gambar)}}" data-rjs="2" alt="" style="max-height: 500px;"></a> 
                        {{-- <a href="#" class="vdo-btn popup-video"><img src="{{asset('assets/front/img/icons/play.svg')}}"
                                class="svg" alt=""> Watch
                            Video</a> --}}
                    </div>
                    <!-- End Video Area -->
                </div>
            </div>
        </section>