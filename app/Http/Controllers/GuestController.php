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
use App\User;
use Illuminate\Support\Facades\Auth;
use App\UserLevel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class GuestController extends Controller
{
    public function landing_page(Request $request){
        $data['title'] = 'Home';
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

    public function setting()
    {
        $data['title'] = 'Pengaturan Akun';
        $data['userLevels'] = UserLevel::all();
        $data['user'] = User::findOrFail(Auth::user()->id);

        return view('setting', $data);
    }

    public function setting_update(Request $request)
    {
        $id = Auth::user()->id;
        $request->validate([
            'foto'             => "nullable|mimes:png,jpg|max:2048",
            'name'             => "required",
            'username'         => "required|alpha_num|unique:users,username,$id",
            'email'            => "required|email|unique:users,email,$id"
        ]);

        $user = User::findOrFail($id);

        $path = ($request->foto)
            ? $request->file('foto')->store("/public/images/users")
            : $user->foto;

        if ($request->foto) {
            Storage::delete($user->foto);
        }

        $userData = $request->except('user_level', 'password', 'confirm_password');
        $userData['id_level'] = $request->user_level;
        $userData['foto']     = $path;

        if ($user->update($userData)) {
            return redirect(route('setting.index'))->with('success', 'Data telah diubah.');
        } else {
            return back()->withInput()->with('error', 'Data gagal diubah.');
        }
    }
    
    public function setting_password(Request $request)
    {
        $id = Auth::user()->id;
        $request->validate([
            'old_password'     => "required",
            'new_password'     => "required|min:6",
            'confirm_password' => "required_if:new_password,*|same:new_password"
        ]);
            
            $user = User::findOrFail($id);
            
            if (Hash::check($request->old_password, $user->password)) {
                $userData['password'] =  bcrypt($request->old_password);
                
                if ($user->update($userData)) {
                    return redirect(route('setting.index'))->with('success_pw', 'Password telah diubah.');
                } else {
                    return redirect(route('setting.index'))->with('error_pw', 'Password gagal diubah.');
                }
            }else{
                return redirect(route('setting.index'))->with('error_pw', 'Password lama anda salah.');
            }
    }
}
