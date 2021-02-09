<div class="modal-header">
    <h3 class="modal-title" id="exampleModalLongTitle">{{$mitra->nama}}</h3>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
    <h4 for="">Nama</h4>
    <div>
        {{$mitra->nama}}
    </div>
    <h4 for="">Kategori</h4>
    <div>
        {{$mitra->kategori_mitra['nama']}}
    </div>
    </div>
    <div class="modal-footer">
    <button type="button" data-dismiss="modal">Close</button>
</div>
    