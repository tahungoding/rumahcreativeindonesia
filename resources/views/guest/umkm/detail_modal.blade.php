<div class="modal-header">
<h3 class="modal-title" id="exampleModalLongTitle">{{$umkm->nama}}</h3>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<h4 for="">Nama</h4>
<div>
    {{$umkm->nama}}
</div>
<h4 for="">Kategori</h4>
<div>
    {{$umkm->kategori_umkm['nama']}}
</div>
<h4 for="">Alamat</h4>
<div>
    {{$umkm->alamat}}
</div>
<h4 for="">Telepon</h4>
<div>
    {{$umkm->telepon}}
</div>
<h4 for="">Instagram</h4>
<div>
    {{$umkm->instagram}}
</div>
<h4 for="">Pemilik</h4>
<div>
    {{$umkm->pemilik}}
</div>
<h4 for="">Shopee</h4>
<div>
    {{$umkm->shopee}}
</div>
<h4 for="">Tokopedia</h4>
<div>
    {{$umkm->tokopedia}}
</div>
<h4 for="">Bukalapak</h4>
<div>
    {{$umkm->bukalapak}}
</div>
</div>
<div class="modal-footer">
<button type="button" data-dismiss="modal">Close</button>
</div>
