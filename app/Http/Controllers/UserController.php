<?php

namespace App\Http\Controllers;

use App\User;
use App\UserLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Data Pengguna';
        $data['users'] = User::all();

        return view('pengguna.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']      = 'Tambah Pengguna';
        $data['actionUrl']  = route('user.store');
        $data['userLevels'] = UserLevel::all();

        return view('pengguna.form', $data);
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
            'foto'             => "nullable|mimes:png,jpg|max:2048",
            'name'             => "required",
            'username'         => "required|alpha_num|unique:users,username",
            'user_level'       => "required|exists:user_level,id",
            'email'            => "required|email|unique:users,email",
            'password'         => "required|min:6",
            'confirm_password' => "required|same:password",
        ]);

        $path = ($request->foto)
            ? $request->file('foto')->store("/public/images/users")
            : null;

        $userData = $request->except('user_level', 'confirm_password');
        $userData['id_level'] = $request->user_level;
        $userData['password'] = bcrypt($request->password);
        $userData['foto']     = $path;

        User::create($userData);

        return redirect(route('user.index'));
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
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $data['title']      = 'Edit Pengguna';
        $data['actionUrl']  = route('user.update', $user);
        $data['userLevels'] = UserLevel::all();
        $data['user']       = $user;

        return view('pengguna.form', $data);
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
            'foto'             => "nullable|mimes:png,jpg|max:2048",
            'name'             => "required",
            'username'         => "required|alpha_num|unique:users,username,$id",
            'user_level'       => "required|exists:user_level,id",
            'email'            => "required|email|unique:users,email,$id",
            'password'         => "nullable|min:6",
            'confirm_password' => "required_if:password,*|same:password",
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

        if ($request->password) {
            $userData['password'] = bcrypt($request->password);
        }

        $user->update($userData);

        return redirect(route('user.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Storage::delete($user->foto);

        $user->delete();

        return  redirect(route('user.index'));
    }
}
