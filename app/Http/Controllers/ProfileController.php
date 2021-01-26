<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Profile;

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
        $data['profile'] = Profile::all();

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
            'telepon'          => "required|numeric",
            'email'            => "required|email",
            'instagram'        => "required",
            'facebook'         => "required",
            'youtube'          => "required",
        ]);

        $profil = Profile::findOrFail($id);

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
