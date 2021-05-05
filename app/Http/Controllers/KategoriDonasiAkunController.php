<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DirectoryAccount;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class KategoriDonasiAkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Kategori Donasi Akun';
        $data['directory_accounts'] = DirectoryAccount::all();
        return view('kategori_donasi_akun.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']      = 'Tambah Kategori Donasi Akun';
        $data['actionUrl']  = route('kategori_donasi_akun.store');

        return view('kategori_donasi_akun.form', $data);
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
            'name'          => "required|unique:directory_accounts,name",
            'logo'          => "required|mimes:png,jpg|max:2048",
            'number_code'   => "required",
        ]);

        $data = [
            'name'                => $request->name,
            'logo'                => $request->file('logo')->store("/public/images/directory_accounts"),
            'number_code'         => $request->number_code,
        ];

        if (DirectoryAccount::create($data)) {
            return redirect(route('kategori_donasi_akun.index'))->with('success', 'Data telah ditambahkan.');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title']      = 'Edit Kategori Donasi Akun';
        $data['actionUrl']  = route('kategori_donasi_akun.update', $id);
        $data['directory_account']    = DirectoryAccount::findOrFail($id);

        return view('kategori_donasi_akun.form', $data);
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
            'name'          => "required|unique:directory_accounts,name,$id",
            'logo'          => "nullable|mimes:png,jpg|max:2048",
            'number_code'   => "required",
        ]);

        $directory_account = DirectoryAccount::findOrFail($id);

        $path = ($request->logo)
            ? $request->file('logo')->store("/public/images/direcotry_accounts")
            : $directory_account->logo;

        if ($request->logo) {
            Storage::delete($directory_account->logo);
        }

        $data = [
            'name'                => $request->name,
            'logo'                => $path,
            'number_code'         => $request->number_code
        ];

        if ($directory_account->update($data)) {
            return redirect(route('kategori_donasi_akun.index'))->with('success', 'Data telah diperbaharui.');
        } else {
            return back()->withInput()->with('failed', 'Data gagal disimpan.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $directory_account = DirectoryAccount::findOrFail($id);

        Storage::delete($directory_account->thumbnail);

        if ($directory_account->delete()) {
            return redirect(route('kategori_donasi_akun.index'))->with('success', 'Data telah dihapus.');
        } else {
            return back()->with('failed', 'Data gagal dihapus.');
        }
    }
}
