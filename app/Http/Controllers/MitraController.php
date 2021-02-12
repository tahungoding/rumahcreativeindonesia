<?php

namespace App\Http\Controllers;

use App\Mitra;
use App\KategoriMitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Data Mitra';
        $data['mitras'] = Mitra::all();

        return view('mitra.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']      = 'Tambah Data Mitra';
        $data['actionUrl']  = route('mitra.store');
        $data['kategori_mitras']     = KategoriMitra::all();

        return view('mitra.create', $data);
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
            'nama'             => "required|unique:mitra,nama",
            'logo'             => "nullable|mimes:png,jpg|max:2048",
            'id_kategori_mitra'   => "required",
            'link'          => "required",
        ]);

        $path = ($request->logo)
            ? $request->file('logo')->store("/public/mitra")
            : null;
            
        $mitraData['nama']           = $request->nama;
        $mitraData['logo']           = $path;
        $mitraData['id_kategori_mitra'] = $request->id_kategori_mitra;
        $mitraData['link'] = $request->link;

        if (Mitra::create($mitraData)) {
            return redirect('mitra')->with('success', 'Data Mitra berhasil ditambahkan!');
        } else {
            return redirect('mitra/create')->with('error', 'Data Mitra gagal ditambahkan!');
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
    public function edit(Mitra $mitra)
    {
        $data['title']              = 'Edit Mitra';
        $data['actionUrl']          = route('mitra.update', $mitra);
        $data['kategori_mitras']    = KategoriMitra::all();
        $data['mitra']              = $mitra;

        return view('mitra.edit', $data);
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

        if (isset($request->id_kategori_mitra) == '') {
            $request->id_kategori_mitra = null;
        }
        // print_r($request->all());die;
        $request->validate([
            'nama'             => "required",
            'logo'             => "nullable|mimes:png,jpg|max:2048",
            'id_kategori_mitra'=> "required",
            'link'=> "required",
            'status'=> "required",
        ]);

        $mitra = Mitra::findOrFail($id);

        $path = ($request->logo)
            ? $request->file('logo')->store("/public/mitra")
            : $mitra->logo;
        
        if ($request->logo) {
            Storage::delete($mitra->logo);
        }
            
        $mitraData['nama']           = $request->nama;
        $mitraData['logo']           = $path;
        $mitraData['id_kategori_mitra'] = $request->id_kategori_mitra;
        $mitraData['link'] = $request->link;
        $mitraData['status'] = $request->status;


        if ($mitra->update($mitraData)) {
            return redirect('mitra')->with('success', 'Data Mitra berhasil diubah!');
        } else {
            return redirect('mitra/create')->with('error', 'Data Mitra gagal diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mitra $mitra)
    {
        Storage::delete($mitra->logo);


        if ($mitra->delete()) {
            return redirect('mitra')->with('success', 'Data Mitra berhasil dihapus!');
        } else {
            return redirect('mitra/create')->with('error', 'Data Mitra gagal dihapus!');
        }
    }
}
