<?php

namespace App\Http\Controllers;

use App\PrologUmkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrologUmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Prolog UMKM";
        $data['prolog_umkm'] = PrologUmkm::all();

        return view('prolog_umkm.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Tambah Prolog UMKM";
        $data['actionUrl'] = route('prolog_umkm.store');

        return view('prolog_umkm.create', $data);
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
            'judul'  => 'required',
            'gambar'        => 'nullable|mimes:png,jpg|max:4048',
            'notice'         => 'nullable',
            'deskripsi'     => 'required'
        ]);

        $path_gambar = ($request->gambar)
            ? $request->file('gambar')->store("/public/images/prolog_umkm")
            : null;

        $data['judul'] = $request->judul;
        $data['gambar'] = $path_gambar;
        $data['notice'] = $request->notice;
        $data['deskripsi'] = $request->deskripsi;

        if (PrologUmkm::create($data)) {
            return redirect(route('prolog_umkm.index'))->with('success', 'Data program berhasil ditambahkan!');
        } else {
            return redirect(route('prolog_umkm.index'))->with('error', 'Data program gagal ditambahkan!');
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
    public function edit(PrologUmkm $prolog_umkm)
    {
        $data['title'] = "Edit Prolog UMKM";
        $data['actionUrl'] = route('prolog_umkm.update', $prolog_umkm);
        $data['prolog_umkm'] = $prolog_umkm;

        return view('prolog_umkm.edit', $data);
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
            'judul'  => 'required',
            'gambar'        => 'nullable|mimes:png,jpg|max:4048',
            'notice'         => 'nullable',
            'deskripsi'     => 'required'
        ]);

        $prolog_umkm = PrologUmkm::findOrFail($id);

        $path_gambar = ($request->gambar)
            ? $request->file('gambar')->store("/public/images/prolog_umkm")
            : $prolog_umkm->gambar;

        if ($request->gambar) {
            Storage::delete($prolog_umkm->gambar);
        }

        $data['judul'] = $request->judul;
        $data['gambar'] = $path_gambar;
        $data['deskripsi'] = $request->deskripsi;
        $data['notice'] = $request->notice;

        if ($prolog_umkm->update($data)) {
            return redirect(route('prolog_umkm.index'))->with('success', 'Data program berhasil diubah!');
        } else {
            return redirect(route('prolog_umkm.index'))->with('error', 'Data program gagal diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrologUmkm $prolog_umkm)
    {
        if ($prolog_umkm->delete()) {
            Storage::delete($prolog_umkm->gambar);
            Storage::delete($prolog_umkm->icon);
            return redirect(route('prolog_umkm.index'))->with('success', 'Data berhasil dihapus!');
        } else {
            return redirect(route('prolog_umkm.index'))->with('error', 'Data gagal dihapus!');
        }
    }
}
