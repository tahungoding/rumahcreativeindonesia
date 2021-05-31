<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Umkm;
use App\PrologUmkm;
use App\KategoriUmkm;

class UmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "UMKM";
        $data['umkm'] = Umkm::where('status', '=', 'Terverifikasi')->get();
        $data['prolog_umkm'] = PrologUmkm::all();

        return view('guest.umkm.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['umkm'] = Umkm::findOrFail($id);

        return view('guest.umkm.detail_modal', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function daftar(){
        $data['title'] = "Daftar UMKM";
        $data['actionUrl']  = route('daftar-umkm-post');
        $data['kategori_umkms']     = KategoriUmkm::all();

        return view('guest.umkm.daftar', $data);
    }

    public function store_daftar(Request $request){
        $request->validate([
            'id_kategori_umkm' => "required",
            'nama'             => "required",
            'alamat'           => "required",
            'telepon'          => "required",
            'instagram'        => "required",
            'pemilik'          => "required",
            'alasan'           => "required",
            'website'           => "required",
            'gambar'           => 'required|mimes:png,jpg|max:2048'
        ]);

        $path = ($request->gambar)
        ? $request->file('gambar')->store("/public/images/umkm") : Null;
            
        $umkmData['id_kategori_umkm'] = $request->id_kategori_umkm;
        $umkmData['nama']             = $request->nama;
        $umkmData['alamat']           = $request->alamat;
        $umkmData['telepon']          = $request->telepon;
        $umkmData['instagram']        = $request->instagram;
        $umkmData['pemilik']          = $request->pemilik;
        $umkmData['alasan']           = $request->alasan;
        $umkmData['website']        = $request->website;
        $umkmData['gambar']           = $path;
        $umkmData['status']           = 'Belum Diverifikasi';

        if (Umkm::create($umkmData)) {
            return redirect('daftar-umkms')->with('success', 'Terimakasih sudah mendaftarkan UMKM anda, kami akan segera memverifikasinya !');
        } else {
            return redirect('daftar-umkms/create')->with('error', 'Data UMKM gagal ditambahkan!');
        }
    }
}
