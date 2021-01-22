<?php

namespace App\Http\Controllers;

use App\UserLevel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']      = 'Data Level Pengguna';
        $data['userLevels'] = UserLevel::all();

        return view('level_pengguna.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']     = 'Tambah Level Pengguna';
        $data['actionUrl'] = route('user_level.store');

        return view('level_pengguna.form', $data);
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
            'level_name' => "required|unique:user_level,nama",
            'status'     => [
                'required',
                Rule:: in(['aktif', 'tidak aktif']),
            ],
        ]);

        $levelData = $request->only('status');
        $levelData['nama'] = $request->level_name;

        UserLevel::create($levelData);

        return redirect(route('user_level.index'));
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
     * @param  UserLevel $userLevel
     * @return \Illuminate\Http\Response
     */
    public function edit(UserLevel $userLevel)
    {
        $data['title']     = 'Edit Level Pengguna';
        $data['actionUrl'] = route('user_level.update', $userLevel);
        $data['userLevel'] = $userLevel;

        return view('level_pengguna.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  UserLevel $userLevel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserLevel $userLevel)
    {
        $request->validate([
            'level_name' => "required|unique:user_level,nama,$userLevel->id",
            'status'     => [
                'required',
                Rule::in(['aktif', 'tidak aktif']),
            ],
        ]);

        $levelData = $request->only('status');
        $levelData['nama'] = $request->level_name;

        $userLevel->update($levelData);

        return redirect(route('user_level.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  UserLevel $userLevel
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserLevel $userLevel)
    {
        $userLevel->delete();

        return redirect(route('user_level.index'));
    }
}
