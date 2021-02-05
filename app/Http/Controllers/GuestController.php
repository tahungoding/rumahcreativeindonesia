<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\KategoriArtikel;
use Illuminate\Http\Request;
use App\Profile;
use App\StrukturTim;
use App\Testimoni;
use App\Mitra;
use App\Umkm;
use App\Program;
use App\Slider;

class GuestController extends Controller
{
    public function landing_page(Request $request){
        $data['title'] = 'Home';
        $data['title'] = 'Profile';
        $data['profile'] = Profile::first();
        $data['struktur_tim'] = StrukturTim::where('status', '=', 'aktif')->orderBy('urutan', 'asc')->get();
        $data['testimoni'] = Testimoni::all();
        $data['mitra'] = Mitra::where('status', '=', 'aktif')->get();
        $data['umkm_c'] = Umkm::count();
        $data['program'] = Program::where('status', '=', 'aktif')->get();
        $data['program_c'] = Program::count();
        $data['slider'] = Slider::where('status', '=', 'aktif')->get();
        $data['kategoriArtikel'] = KategoriArtikel::all();

        $artikel = Artikel::latest()->limit(4)->get();

        if ($request->kategori) {
            $kategori = KategoriArtikel::where('nama', $request->kategori)->first();

            $artikel = $kategori->articles()->latest()->limit(4)->get();
        }

        $data['artikel'] = $artikel;

        return view('guest.landingpage', $data);
    }

    public function profiles(){

        $data['title'] = 'Profile';
        $data['profile'] = Profile::first();
        $data['struktur_tim'] = StrukturTim::where('status', '=', 'aktif')->orderBy('urutan', 'asc')->get();
        $data['testimoni'] = Testimoni::all();
        $data['mitra'] = Mitra::where('status', '=', 'aktif')->get();
        $data['umkm_c'] = Umkm::count();
        $data['program_c'] = Program::count();

        return view('guest.profile', $data);
    }
}
