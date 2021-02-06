<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\StrukturTim;
use Illuminate\Support\Facades\Storage;

class StrukturTimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Struktur Tim";
        $data['tim'] = StrukturTim::all();

        return view('struktur_tim.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']      = 'Tambah Tim';
        $data['actionUrl']  = route('struktur_tim.store');
        
        return view('struktur_tim.create', $data);
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
            'nama' => "required",
            'jabatan' => "required",
            'status' => "required",
            'foto' => 'nullable|mimes:png,jpg|max:2048'
        ]);

        $path = ($request->foto)
            ? $request->file('foto')->store("/public/images/struktur_tim") : Null;

        $data['nama'] = $request->nama;
        $data['jabatan'] = $request->jabatan;
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['linkedin'] = $request->linkedin;
        $data['instagram'] = $request->instagram;
        $data['status'] = $request->status;
        $data['foto'] = $path;

        if (StrukturTim::create($data)) {
            return redirect(route('struktur_tim.index'))->with('success', 'Data berhasil ditambahkan!');
        } else {
            return redirect(route('struktur_tim.index'))->with('error', 'Data gagal ditambahkan!');
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
    public function edit(StrukturTim $strukturTim)
    {
        $data['title']      = 'Edit Tim';
        $data['actionUrl']  = route('struktur_tim.update', $strukturTim);
        $data['tim']        = $strukturTim;
        $data['urutan']     = StrukturTim::where('status', '=', 'aktif')->count();

        return view('struktur_tim.edit', $data);
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
            'nama' => "required",
            'jabatan' => "required",
            'status' => "required",
            'foto' => 'nullable|mimes:png,jpg|max:2048'
        ]);

        $tim = StrukturTim::findOrFail($id);

        $path = ($request->foto)
            ? $request->file('foto')->store("/public/images/strutur_tim") : $tim->foto;

        if ($request->foto) {
            Storage::delete($tim->foto);
        }

        $data['nama'] = $request->nama;
        $data['jabatan'] = $request->jabatan;
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['linkedin'] = $request->linkedin;
        $data['instagram'] = $request->instagram;
        $data['urutan'] = $request->urutan;
        $data['status'] = $request->status;
        $data['foto'] = $path;

        if ($tim->update($data)) {
            return redirect(route('struktur_tim.index'))->with('success', 'Data berhasil diubah!');
        } else {
            return redirect(route('struktur_tim.index'))->with('error', 'Data gagal diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(StrukturTim $strukturTim)
    {
        Storage::delete($strukturTim->foto);
        if ($strukturTim->delete()) {
            return redirect(route('struktur_tim.index'))->with('success', 'Data berhasil dihapus!');
        } else {
            return redirect(route('struktur_tim.index'))->with('error', 'Data gagal dihapus!');
        }
    }
}
