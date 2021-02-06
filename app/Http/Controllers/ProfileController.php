<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Profile;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']      = 'Profile Perusahaan';
        $data['actionUrl']  = route('profile.update', 1);
        $data['profile'] = Profile::findOrFail(1);

        return view('profil', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
            'latar_belakang'   => "required",
            'visi'             => "required",
            'misi'             => "required",
            'model_konsep'     => "required",
            'kekuatan'         => "required",
            'fokus_wilayah'    => "required",
            'alamat'           => "required",
            'telepon'          => "required",
            'email'            => "required|email",
            'instagram'        => "required",
            'facebook'         => "required",
            'youtube'          => "required",
            'jam_kerja'        => "required",
        ]);

        $profil = Profile::findOrFail($id);

        $path_latar_belakang_img = ($request->latar_belakang_img)
            ? $request->file('latar_belakang_img')->store("/public/images/profile")
            : $profil->latar_belakang_img;

        if ($request->latar_belakang_img) {
            Storage::delete($profil->latar_belakang_img);
        }

        $path_visi_img = ($request->visi_img)
            ? $request->file('visi_img')->store("/public/images/profile")
            :  $profil->visi_img;

        if ($request->visi_img) {
            Storage::delete($profil->visi_img);
        }

        $path_misi_img = ($request->misi_img)
            ? $request->file('misi_img')->store("/public/images/profile")
            :  $profil->misi_img;

        if ($request->misi_img) {
            Storage::delete($profil->misi_img);
        }

        $path_model_konsep_img = ($request->model_konsep_img)
            ? $request->file('model_konsep_img')->store("/public/images/profile")
            :  $profil->model_konsep_img;
        
        if ($request->model_konsep_img) {
            Storage::delete($profil->model_konsep_img);
        }

        $data['latar_belakang'] = $request->latar_belakang;
        $data['visi'] = $request->visi;
        $data['misi'] = $request->misi;
        $data['model_konsep'] = $request->model_konsep;
        $data['kekuatan'] = $request->kekuatan;
        $data['fokus_wilayah'] = $request->fokus_wilayah;
        $data['alamat'] = $request->alamat;
        $data['telepon'] = $request->telepon;
        $data['email'] = $request->email;
        $data['instagram'] = $request->instagram;
        $data['facebook'] = $request->facebook;
        $data['youtube'] = $request->youtube;
        $data['latar_belakang_img'] = $path_latar_belakang_img;
        $data['visi_img'] = $path_visi_img;
        $data['misi_img'] = $path_misi_img;
        $data['model_konsep_img'] = $path_model_konsep_img;
        $data['jam_kerja'] = $request->jam_kerja;

        if ($profil->update($data)) {
            return redirect(route('profile.index'))->with('success', 'Data profile berhasil diubah!');
        } else {
            return redirect(route('profile.index'))->with('error', 'Data profile gagal diubah!');
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
        //
    }
}
