<div class="modal-header">
<h3 class="modal-title" id="exampleModalLongTitle">{{$umkm->nama}}</h3>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<h4 for="">Nama Usaha</h4>
<div>
    {{$umkm->nama}}
</div>
<h4 for="">Kategori Usaha</h4>
<div>
    {{$umkm->kategori_umkm['nama']}}
</div>
<h4 for="">Alamat Usaha</h4>
<div>
    {{$umkm->alamat_usaha}}
</div>
@if (!empty($umkm->pemilik))
    <h4 for="">Nama Pemilik</h4>
    <div>
        {{$umkm->pemilik}}
    </div>
@endif
@if (!empty($umkm->alamat))
    <h4 for="">Alamat Pemilik</h4>
    <div>
        {{$umkm->alamat}}
    </div>
@endif
<h4 for="">Telepon</h4>
<div>
    {{$umkm->telepon}}
</div>
@if (!empty($umkm->instagram))
    <h4 for="">Instagram</h4>
    <div>
        {{$umkm->instagram}}
    </div>
@endif
@if (!empty($umkm->shopee))
    <h4 for="">Shopee</h4>
    <div>
        {{$umkm->shopee}}
    </div>
@endif
@if (!empty($umkm->tokopedia))
    <h4 for="">Tokopedia</h4>
    <div>
        {{$umkm->tokopedia}}
    </div>
@endif
@if (!empty($umkm->bukalapak))
    <h4 for="">Bukalapak</h4>
    <div>
        {{$umkm->bukalapak}}
    </div>
@endif
@if (!empty($umkm->website))
    <h4 for="">Wesbite</h4>
    <div>
        {{$umkm->website}}
    </div>
@endif
</div>
<div class="modal-footer">
<button type="button" data-dismiss="modal">Close</button>
</div>
