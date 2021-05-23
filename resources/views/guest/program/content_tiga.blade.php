<section class="pt-120 pb-120 ov-hidden">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <!-- Section Title Begin -->
                <div class="section-title mb-4">

                    <h2>{{$item->nama_program}}<br>
                    </h2>
                    {!! $item->deskripsi !!}

            </div>
            <!-- Video Area -->
            <div class="col-lg-5 video-area mt-50 mt-lg-0">
               <a><img class="roundedrci" src="{{avatar($item->gambar)}}" data-rjs="2" alt="" style="max-height: 500px;"></a> 
            </div>
            <!-- End Video Area -->
        </div>
    </div>
</section>