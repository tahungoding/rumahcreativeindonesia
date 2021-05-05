<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Program;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Program";
        $data['program'] = Program::all();

        return view('program.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Tambah Program";
        $data['actionUrl'] = route('program.store');

        return view('program.create', $data);
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
            'nama_program'  => 'required',
            'gambar'        => 'nullable|mimes:png,jpg|max:4048',
            'icon'          => 'nullable|mimes:png,jpg|max:2048',
            'tanda'         => 'nullable',
            'deskripsi'     => 'required',
            'status'        => 'required'
        ]);

        $path_gambar = ($request->gambar)
            ? $request->file('gambar')->store("/public/images/programs")
            : null;

        $path_icon = ($request->icon)
            ? $request->file('icon')->store("/public/images/programs/icon")
            : null;

        $data['nama_program'] = $request->nama_program;
        $data['gambar'] = $path_gambar;
        $data['icon'] = $path_icon;
        $data['tanda'] = $request->tanda;
        $data['deskripsi'] = $request->deskripsi;
        $data['status'] = $request->status;

        if (Program::create($data)) {
            return redirect(route('program.index'))->with('success', 'Data program berhasil ditambahkan!');
        } else {
            return redirect(route('program.index'))->with('error', 'Data program gagal ditambahkan!');
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
    public function edit(Program $program)
    {
        $data['title'] = "Edit Program";
        $data['actionUrl'] = route('program.update', $program);
        $data['program'] = $program;

        return view('program.edit', $data);
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
            'nama_program'  => 'required',
            'icon'          => 'nullable|mimes:png,jpg|max:2048',
            'gambar'        => 'nullable|mimes:png,jpg|max:4048',
            'tanda'         => 'nullable',
            'deskripsi'     => 'required',
            'status'        => 'required'
        ]);

        $program = Program::findOrFail($id);

        $path_icon = ($request->icon)
            ? $request->file('icon')->store("/public/images/programs/icon")
            : $program->icon;

        if ($request->icon) {
            Storage::delete($program->icon);
        }

        $path_gambar = ($request->gambar)
            ? $request->file('gambar')->store("/public/images/programs")
            : $program->gambar;

        if ($request->gambar) {
            Storage::delete($program->gambar);
        }

        $data['nama_program'] = $request->nama_program;
        $data['icon'] = $path_icon;
        $data['gambar'] = $path_gambar;
        $data['deskripsi'] = $request->deskripsi;
        $data['tanda'] = $request->tanda;
        $data['status'] = $request->status;

        if ($program->update($data)) {
            return redirect(route('program.index'))->with('success', 'Data program berhasil diubah!');
        } else {
            return redirect(route('program.index'))->with('error', 'Data program gagal diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        if ($program->delete()) {
            Storage::delete($program->gambar);
            Storage::delete($program->icon);
            return redirect(route('program.index'))->with('success', 'Data berhasil dihapus!');
        } else {
            return redirect(route('program.index'))->with('error', 'Data gagal dihapus!');
        }
    }
}
