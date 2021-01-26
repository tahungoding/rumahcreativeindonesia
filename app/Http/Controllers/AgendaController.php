<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Agenda;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Agenda";
        $data['agenda'] = Agenda::all();

        return view('agenda.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Tambah Agenda";
        $data['actionUrl'] = route('agenda.store');

        return view('agenda.create', $data);
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
            'nama_agenda'   => 'required',
            'tanggal_awal'  => 'required',
            'tanggal_akhir' => 'required',
            'tempat'        => 'required',
            'deskripsi'     => 'required',
            'penyelenggara' => 'required',
            'gambar'        => 'nullable|mimes:png,jpg|max:2048',
            'status'        => 'required',
        ]);

        $path = ($request->gambar)
            ? $request->file('gambar')->store("/public/images/agendas") : Null;

        $data['nama_agenda'] = $request->nama_agenda;
        $data['tanggal_awal'] = $request->tanggal_awal;
        $data['tanggal_akhir'] = $request->tanggal_akhir;
        $data['tempat'] = $request->tempat;
        $data['deskripsi'] = $request->deskripsi;
        $data['penyelenggara'] = $request->penyelenggara;
        $data['gambar'] = $path;
        $data['status'] = $request->status;

        if (Agenda::create($data)) {
            return redirect(route('agenda.index'))->with('success', 'Data agenda berhasil ditambahkan!');
        } else {
            return redirect(route('agenda.index'))->with('error', 'Data agenda gagal ditambahkan!');
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
    public function edit(Agenda $agenda)
    {
        $data['title'] = "Edit Agenda";
        $data['actionUrl'] = route('agenda.update', $agenda);
        $data['agenda'] = $agenda;

        return view('agenda.edit', $data);
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
            'nama_agenda'   => 'required',
            'tanggal_awal'  => 'required',
            'tanggal_akhir' => 'required',
            'tempat'        => 'required',
            'deskripsi'     => 'required',
            'penyelenggara' => 'required',
            'gambar'        => 'nullable|mimes:png,jpg|max:2048',
            'status'        => 'required',
        ]);

        $agenda = Agenda::findOrFail($id);

        $path = ($request->gambar)
            ? $request->file('gambar')->store("/public/images/agendas") : $agenda->gambar;

        if ($request->gambar) {
            Storage::delete($agenda->gambar);
        }

        $data['nama_agenda'] = $request->nama_agenda;
        $data['tanggal_awal'] = $request->tanggal_awal;
        $data['tanggal_akhir'] = $request->tanggal_akhir;
        $data['tempat'] = $request->tempat;
        $data['deskripsi'] = $request->deskripsi;
        $data['penyelenggara'] = $request->penyelenggara;
        $data['gambar'] = $path;
        $data['status'] = $request->status;

        if ($agenda->update($data)) {
            return redirect(route('agenda.index'))->with('success', 'Data agenda berhasil diubah!');
        } else {
            return redirect(route('agenda.index'))->with('error', 'Data agenda gagal diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agenda $agenda)
    {
        if ($agenda->delete()) {
            Storage::delete($agenda->gambar);
            return redirect(route('agenda.index'))->with('success', 'Data berhasil dihapus!');
        } else {
            return redirect(route('agenda.index'))->with('error', 'Data gagal dihapus!');
        }
    }
}
