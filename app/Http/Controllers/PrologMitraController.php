<?php

namespace App\Http\Controllers;

use App\PrologMitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrologMitraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Prolog Mitra";
        $data['prolog_mitra'] = PrologMitra::all();

        return view('prolog_mitra.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Tambah Prolog Mitra";
        $data['actionUrl'] = route('prolog_mitra.store');

        return view('prolog_mitra.create', $data);
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
            ? $request->file('gambar')->store("/public/images/prolog_mitra")
            : null;

        $data['judul'] = $request->judul;
        $data['gambar'] = $path_gambar;
        $data['notice'] = $request->notice;
        $data['deskripsi'] = $request->deskripsi;

        if (PrologMitra::create($data)) {
            return redirect(route('prolog_mitra.index'))->with('success', 'Data program berhasil ditambahkan!');
        } else {
            return redirect(route('prolog_mitra.index'))->with('error', 'Data program gagal ditambahkan!');
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
    public function edit(PrologMitra $prolog_mitra)
    {
        $data['title'] = "Edit Prolog Mitra";
        $data['actionUrl'] = route('prolog_mitra.update', $prolog_mitra);
        $data['prolog_mitra'] = $prolog_mitra;

        return view('prolog_mitra.edit', $data);
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

        $prolog_mitra = PrologMitra::findOrFail($id);

        $path_gambar = ($request->gambar)
            ? $request->file('gambar')->store("/public/images/prolog_mitra")
            : $prolog_mitra->gambar;

        if ($request->gambar) {
            Storage::delete($prolog_mitra->gambar);
        }

        $data['judul'] = $request->judul;
        $data['gambar'] = $path_gambar;
        $data['deskripsi'] = $request->deskripsi;
        $data['notice'] = $request->notice;

        if ($prolog_mitra->update($data)) {
            return redirect(route('prolog_mitra.index'))->with('success', 'Data program berhasil diubah!');
        } else {
            return redirect(route('prolog_mitra.index'))->with('error', 'Data program gagal diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrologMitra $prolog_mitra)
    {
        if ($prolog_mitra->delete()) {
            Storage::delete($prolog_mitra->gambar);
            Storage::delete($prolog_mitra->icon);
            return redirect(route('prolog_mitra.index'))->with('success', 'Data berhasil dihapus!');
        } else {
            return redirect(route('prolog_mitra.index'))->with('error', 'Data gagal dihapus!');
        }
    }
}
