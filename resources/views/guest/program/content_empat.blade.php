<section class="pt-120 pb-120">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
               <a ><img class="" src="{{avatar($item->gambar)}}" data-rjs="2" alt=""></a> 
            </div>

            <div class="col-lg-6">
                <div class="section-title mb-4 mt-50 mt-lg-0">

                    <h2>{{$item->nama_program}}</h2>
                    {!! $item->deskripsi !!}
                </div>
            </div>
        </div>
    </div>
</section>