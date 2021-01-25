<?php

namespace App\Http\Controllers;

use App\KategoriUmkm;
use Illuminate\Http\Request;

class KategoriUmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['title'] = 'Kategori UMKM';
        $data['kategori_umkms'] = KategoriUmkm::all();

        return view('kategori_umkm.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']              = 'Tambah Kategori UMKM';
        $data['actionUrl']          = route('kategori_umkm.store');
        $data['kategori_umkms']     = KategoriUmkm::all();

        return view('kategori_umkm.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'             => "required",
        ]);

        $kategori_umkmData['nama'] = $request->nama;

        if (KategoriUmkm::create($kategori_umkmData)) {
            return redirect('kategori_umkm')->with('success', 'Data Kategori UMKM berhasil ditambahkan!');
        } else {
            return redirect('kategori_umkm/create')->with('error', 'Data Kategori UMKM gagal ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriUmkm $kategori_umkm)
    {
        $data['title']              = 'Edit kategori UMKM';
        $data['actionUrl']          = route('kategori_umkm.update', $kategori_umkm);
        $data['kategori_umkms']     = KategoriUmkm::all();
        $data['kategori_umkm']      = $kategori_umkm;

        return view('kategori_umkm.edit', $data);
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
         $request->validate([
            'nama'             => "required",
        ]);

        $kategori_umkm = KategoriUmkm::findOrFail($id);

        $kategori_umkmData['nama'] = $request->nama;

        if ($kategori_umkm->update($kategori_umkmData)) {
            return redirect('kategori_umkm')->with('success', 'Data Kategori UMKM berhasil diubah!');
        } else {
            return redirect('kategori_umkm/create')->with('error', 'Data Kategori UMKM gagal diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriUmkm $kategori_umkm)
    {
        if ($kategori_umkm->delete()) {
            return redirect('kategori_umkm')->with('success', 'Data Kategori UMKM berhasil dihapus!');
        } else {
            return redirect('kategori_umkm/create')->with('error', 'Data Katgeori UMKM gagal dihapus!');
        }
    }
}
