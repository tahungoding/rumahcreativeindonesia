<?php

namespace App\Http\Controllers;

use App\KategoriMitra;
use Illuminate\Http\Request;

class KategoriMitraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Kategori Mitra';
        $data['kategori_mitras'] = KategoriMitra::all();

        return view('kategori_mitra.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']              = 'Tambah Kategori Mitra';
        $data['actionUrl']          = route('kategori_mitra.store');
        $data['kategori_mitras']    = KategoriMitra::all();

        return view('kategori_mitra.create', $data);
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
            'nama'             => "required|unique:kategori_mitra,nama",
        ]);

        $kategori_mitraData['nama'] = $request->nama;

        if (KategoriMitra::create($kategori_mitraData)) {
            return redirect('kategori_mitra')->with('success', 'Data Kategori Mitra berhasil ditambahkan!');
        } else {
            return redirect('kategori_mitra/create')->with('error', 'Data Kategori Mitra gagal ditambahkan!');
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
    public function edit(KategoriMitra $kategori_mitra)
    {
        $data['title']              = 'Edit kategori Mitra';
        $data['actionUrl']          = route('kategori_mitra.update', $kategori_mitra);
        $data['kategori_mitras']    = KategoriMitra::all();
        $data['kategori_mitra']     = $kategori_mitra;

        return view('kategori_mitra.edit', $data);
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

        $kategori_mitra = KategoriMitra::findOrFail($id);

        $kategori_mitraData['nama'] = $request->nama;

        if ($kategori_mitra->update($kategori_mitraData)) {
            return redirect('kategori_mitra')->with('success', 'Data Mitra berhasil diubah!');
        } else {
            return redirect('kategori_mitra/create')->with('error', 'Data Mitra gagal diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriMitra $kategori_mitra)
    {

        if ( $kategori_mitra->delete()) {
            return redirect('kategori_mitra')->with('success', 'Data Kategori Mitra berhasil dihapus!');
        } else {
            return redirect('kategori_mitra/create')->with('error', 'Data Katgeori Mitra gagal dihapus!');
        }
    }
}
