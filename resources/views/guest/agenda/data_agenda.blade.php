@foreach ($agenda as $agend)
<div class="col-lg-6 sales {{($agend->status == 'aktif') ? 'comingsoon' : 'done'}}"
    >
    <div class="single-project-item">
        <div class="image"><a href="{{url('agendas/'.$agend->slug)}}">
            <img src="{{avatar($agend->gambar)}}" data-rjs="0" alt="" />
            </a></div>
        <div style="background-color: #20b7ba;
                    color: white;
                    width: 100%;
                    height: 60px;
                    /* position: absolute; */
                    z-index: 99;
                    top: 233px;
                    left: 40px;
                    padding: 15px;
                    text-align: center;
                    vertical-align: middle;">
            <div class="row container">
                    <h2 style="color: #fff;font-size: 25px;left: 26px;">{{tgl_indo($agend->tanggal_awal)}}</h2>
            </div>
        </div>
        <div class="project-body">
            <h3><a href="{{url('agendas/'.$agend->slug)}}">{{$agend->nama_agenda}}</a></h3>
            <div class="row">
                <div class="col-md-6">
                    <p class="project-meta">Penyelengara:<span>{{$agend->penyelenggara}}</span></p>
                </div>
                <div class="col-md-6">
                    <p class="project-meta">Status:<span>{{$agend->status}}</span></p>
                </div>
            </div>


        </div>
    </div>
</div>
@endforeach