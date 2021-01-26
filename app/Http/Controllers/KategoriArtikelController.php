<?php

namespace App\Http\Controllers;

use App\KategoriArtikel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KategoriArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']      = 'Data Kategori Artikel';
        $data['categories'] = KategoriArtikel::all();

        return view('kategori_artikel.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']     = 'Tambah Kategori Artikel';
        $data['actionUrl'] = route('kategori_artikel.store');

        return view('kategori_artikel.form', $data);
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
            'category_name' => "required|unique:user_level,nama",
            'status'     => [
                'required',
                Rule::in(['aktif', 'tidak aktif']),
            ],
        ]);

        $categoryData = $request->only('status');
        $categoryData['nama'] = $request->category_name;

        if (KategoriArtikel::create($categoryData)) {
            return redirect(route('kategori_artikel.index'))->with('success', 'Data telah ditambahkan.');
        } else {
            return back()->withInput()->with('failed', 'Data gagal disimpan.');
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
     * @param  KategoriArtikel $kategoriArtikel
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriArtikel $kategoriArtikel)
    {
        $data['title']           = 'Edit Kategori Artikel';
        $data['actionUrl']       = route('kategori_artikel.update', $kategoriArtikel);
        $data['kategoriArtikel'] = $kategoriArtikel;

        return view('kategori_artikel.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  KategoriArtikel $kategoriArtikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KategoriArtikel $kategoriArtikel)
    {
        $request->validate([
            'category_name' => "required|unique:user_level,nama,$kategoriArtikel->id",
            'status'     => [
                'required',
                Rule::in(['aktif', 'tidak aktif']),
            ],
        ]);

        $categoryData = $request->only('status');
        $categoryData['nama'] = $request->category_name;

        if ($kategoriArtikel->update($categoryData)) {
            return redirect(route('kategori_artikel.index'))->with('success', 'Data telah diubah.');
        } else {
            return back()->withInput()->with('failed', 'Data gagal diubah.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  KategoriArtikel $kategoriArtikel
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriArtikel $kategoriArtikel)
    {
        if ($kategoriArtikel->delete()) {
            return redirect(route('kategori_artikel.index'))->with('success', 'Data telah dihapus.');
        } else {
            return back()->with('failed', 'Data gagal dihapus.');
        }
    }
}
