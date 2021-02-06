<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $data['title'] = "Slider";
        $data['slider'] = Slider::all();

        return view('slider.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']      = 'Tambah Slider';
        $data['actionUrl']  = route('slider.store');
        
        return view('slider.create', $data);
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
            'judul' => "required",
            'deskripsi' => "required",
            'link' => "required",
            'gambar' => 'required|mimes:png,jpg|max:2048'
        ]);

        $path = ($request->gambar)
            ? $request->file('gambar')->store("/public/images/slider") : Null;

        $data['judul'] = $request->judul;
        $data['deskripsi'] = $request->deskripsi;
        $data['link'] = $request->link;
        $data['gambar'] = $path;

        if (Slider::create($data)) {
            return redirect(route('slider.index'))->with('success', 'Data berhasil ditambahkan!');
        } else {
            return redirect(route('slider.index'))->with('error', 'Data gagal ditambahkan!');
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
    public function edit(Slider $slider)
    {
        $data['title']      = 'Edit Slider';
        $data['actionUrl']  = route('slider.update', $slider);
        $data['slider']     = $slider;
        $data['urutan']     = Slider::where('status', '=', 'aktif')->count();

        return view('slider.edit', $data);
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
        // print_r($request->status);die;
        $request->validate([
            'judul' => "required",
            'deskripsi' => "required",
            'link' => "required",
            'status' => "required",
            'gambar' => 'nullable|mimes:png,jpg|max:2048'
        ]);

        $slider = Slider::findOrFail($id);

        $path = ($request->gambar)
            ? $request->file('gambar')->store("/public/images/slider") : $slider->gambar;

        if ($request->gambar) {
            Storage::delete($slider->gambar);
        }

        $data['judul'] = $request->judul;
        $data['deskripsi'] = $request->deskripsi;
        $data['link'] = $request->link;
        $data['status'] = $request->status;
        $data['gambar'] = $path;

        // print_r($data);die;

        if ($slider->update($data)) {
            return redirect(route('slider.index'))->with('success', 'Data berhasil diubah!');
        } else {
            return redirect(route('slider.index'))->with('error', 'Data gagal diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        Storage::delete($slider->gambar);
        if ($slider->delete()) {
            return redirect(route('slider.index'))->with('success', 'Data berhasil dihapus!');
        } else {
            return redirect(route('slider.index'))->with('error', 'Data gagal dihapus!');
        }
    }
}
