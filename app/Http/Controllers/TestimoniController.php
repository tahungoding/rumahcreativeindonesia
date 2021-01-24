<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Testimoni;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Testimoni";
        $data['testimoni'] = Testimoni::all();

        return view('testimoni.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Tambah Testimoni";
        $data['actionUrl'] = route('testimoni.store');

        return view('testimoni.create', $data);
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
            'responden' => 'required',
            'asal'      => 'required',
            'isi'       => 'required',
            'gambar'    => 'nullable|mimes:png,jpg|max:2048'
        ]);

        $path = ($request->gambar)
            ? $request->file('gambar')->store("/public/images/testimoni") : Null;

        $data['responden'] = $request->responden;
        $data['asal'] = $request->asal;
        $data['isi'] = $request->isi;
        $data['gambar'] = $path;

        if (Testimoni::create($data)) {
            return redirect(route('testimoni.index'))->with('success', 'Data testimoni berhasil ditambahkan!');
        } else {
            return redirect(route('testimoni.index'))->with('error', 'Data testimoni gagal ditambahkan!');
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
    public function edit(Testimoni $testimoni)
    {
        $data['title'] = "Edit Testimoni";
        $data['actionUrl'] = route('testimoni.update', $testimoni);
        $data['testimoni'] = $testimoni;

        return view('testimoni.edit', $data);
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
            'responden' => 'required',
            'asal'      => 'required',
            'isi'       => 'required',
            'gambar'    => 'nullable|mimes:png,jpg|max:2048'
        ]);

        $testimoni = Testimoni::findOrFail($id);

        $path = ($request->gambar)
            ? $request->file('gambar')->store("/public/images/testimoni") : $testimoni->gambar;

        if ($request->gambar) {
            Storage::delete($testimoni->gambar);
        }

        $data['responden'] = $request->responden;
        $data['asal'] = $request->asal;
        $data['isi'] = $request->isi;
        $data['gambar'] = $path;

        if ($testimoni->update($data)) {
            return redirect(route('testimoni.index'))->with('success', 'Data testimoni berhasil diubah!');
        } else {
            return redirect(route('testimoni.index'))->with('error', 'Data testimoni gagal diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimoni $testimoni)
    {
        if ($testimoni->delete()) {
            Storage::delete($testimoni->gambar);
            return redirect(route('testimoni.index'))->with('success', 'Data berhasil dihapus!');
        } else {
            return redirect(route('testimoni.index'))->with('error', 'Data gagal dihapus!');
        }
    }
}
