<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\KategoriArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']    = 'Data Artikel';
        $data['articles'] = Artikel::all();

        return view('artikel.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']      = 'Tambah Artikel';
        $data['actionUrl']  = route('artikel.store');
        $data['categories'] = KategoriArtikel::all();

        return view('artikel.form', $data);
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
            'title'        => "required|unique:artikel,judul",
            'image'        => "required|mimes:png,jpg|max:2048",
            'content'      => "required",
            'category'     => "required|exists:kategori_artikel,id",
            'publish_date' => "required|date",
            'status'       => [
                'required',
                Rule:: in(['aktif', 'tidak aktif']),
            ],
        ]);

        $articleData = [
            'judul'               => $request->title,
            'gambar'              => $request->file('image')->store("/public/images/articles"),
            'konten'              => $request->content,
            'id_kategori_artikel' => $request->category,
            'slug'                => Str::slug($request->title),
            'id_user'             => Auth::id(),
            'tanggal_publish'     => $request->publish_date,
            'status'              => $request->status,
        ];

        Artikel::create($articleData);

        return redirect(route('artikel.index'));
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
    public function edit($id)
    {
        $data['title']      = 'Edit Artikel';
        $data['actionUrl']  = route('artikel.update', $id);
        $data['categories'] = KategoriArtikel::all();
        $data['article']    = Artikel::findOrFail($id);

        return view('artikel.form', $data);
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
            'title'        => "required|unique:artikel,judul,$id",
            'image'        => "nullable|mimes:png,jpg|max:2048",
            'content'      => "required",
            'category'     => "required|exists:kategori_artikel,id",
            'publish_date' => "nullable|date",
            'status'       => [
                'required',
                Rule::in(['aktif', 'tidak aktif']),
            ],
        ]);

        $article = Artikel::findOrFail($id);

        $path = ($request->image)
            ? $request->file('image')->store("/public/images/articles")
            : $article->gambar;

        if ($request->image) {
            Storage::delete($article->gambar);
        }

        $publishDate = ($request->publish_date)
            ? $request->publish_date
            : $article->tanggal_publish ;

        $articleData = [
            'judul'               => $request->title,
            'gambar'              => $path,
            'konten'              => $request->content,
            'id_kategori_artikel' => $request->category,
            'slug'                => Str::slug($request->title),
            'id_user'             => Auth::id(),
            'tanggal_publish'     => $publishDate,
            'status'              => $request->status,
        ];

        $article->update($articleData);

        return redirect(route('artikel.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Artikel::findOrFail($id);

        Storage::delete($article->gambar);

        $article->delete();

        return  redirect(route('artikel.index'));
    }
}
