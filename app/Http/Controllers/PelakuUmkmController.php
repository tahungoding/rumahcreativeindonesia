<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PelakuUmkm;
use App\Imports\PelakuUmkmImport;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

class PelakuUmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data['title'] = 'Pelaku UMKM';
        // $data['pelaku_umkm'] = PelakuUmkm::all();
        if ($request->ajax()) {
            $data = PelakuUmkm::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="button-items">
                           <a href="' . route("pelaku_umkm.edit", $row->id) . '"
                               class="btn btn-outline-warning waves-effect waves-light" data-toggle="tooltip"
                               data-placement="top" title="Edit">
                               <i class="ti-pencil"></i></a>

                           <form action="' . route("pelaku_umkm.destroy", $row->id) . '" method="post"
                               onsubmit="return confirm("Yakin hapus data ini?")">
                               ' . csrf_field() . '
                               <input type="hidden" name="_method" value="delete" />
                               <button type="submit" class="btn btn-outline-danger waves-effect waves-light"
                                   data-toggle="tooltip" data-placement="top" title="Hapus">
                                   <i class="ti-trash"></i></button>
                           </form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pelaku_umkm.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['title'] = 'Tambah Pelaku UMKM';
        $data['actionUrl']  = route('pelaku_umkm.store');
        $data['provinsi'] = Province::all();

        return view('pelaku_umkm.create', $data);
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
            'nik'               => "required",
            'nama'              => "required",
            'tanggal_lahir'     => "required",
            'jenis_kelamin'     => "required",
            'provinsi'          => "required",
            'kabupaten_kota'    => "required",
            'kecamatan'         => "required",
            'desa_kelurahan'    => "required",
            'alamat'            => "required",
            'bidang_usaha'      => 'required',
            'no_hp'             => 'required'
        ]);


        $pelakuUmkmData['nik'] = $request->nik;
        $pelakuUmkmData['nama'] = $request->nama;
        $pelakuUmkmData['tanggal_lahir'] = $request->tanggal_lahir;
        $pelakuUmkmData['jenis_kelamin'] = $request->jenis_kelamin;
        $pelakuUmkmData['provinsi'] = $request->provinsi;
        $pelakuUmkmData['kabupaten_kota'] = $request->kabupaten_kota;
        $pelakuUmkmData['kecamatan'] = $request->kecamatan;
        $pelakuUmkmData['desa_kelurahan'] = $request->desa_kelurahan;
        $pelakuUmkmData['alamat'] = $request->alamat;
        $pelakuUmkmData['bidang_usaha'] = $request->bidang_usaha;
        $pelakuUmkmData['no_hp'] = $request->no_hp;

        if (PelakuUmkm::create($pelakuUmkmData)) {
            return redirect('pelaku_umkm')->with('success', 'Data UMKM berhasil ditambahkan!');
        } else {
            return redirect('pelaku_umkm/create')->with('error', 'Data UMKM gagal ditambahkan!');
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
        $data['title'] = 'Ubah Pelaku UMKM';
        $data['actionUrl']  = route('pelaku_umkm.update', $id);
        $data['pelaku_umkm'] = PelakuUmkm::findOrFail($id);
        $data['provinsi'] = Province::all();
        $data['kabupaten_kota'] = Regency::where('province_id', $data['pelaku_umkm']->provinsi)->get();
        $data['kecamatan'] = District::where('regency_id', $data['pelaku_umkm']->kabupaten_kota)->get();
        $data['desa_kelurahan'] = Village::where('district_id', $data['pelaku_umkm']->kecamatan)->get();

        return view('pelaku_umkm.edit', $data);
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
            'nik'               => "required",
            'nama'              => "required",
            'tanggal_lahir'     => "required",
            'jenis_kelamin'     => "required",
            'provinsi'          => "required",
            'kabupaten_kota'    => "required",
            'kecamatan'         => "required",
            'desa_kelurahan'    => "required",
            'alamat'            => "required",
            'bidang_usaha'      => 'required',
            'no_hp'             => 'required'
        ]);
        
        $pelaku_umkm = PelakuUmkm::findOrFail($id);

        $pelakuUmkmData['nik'] = $request->nik;
        $pelakuUmkmData['nama'] = $request->nama;
        $pelakuUmkmData['tanggal_lahir'] = $request->tanggal_lahir;
        $pelakuUmkmData['jenis_kelamin'] = $request->jenis_kelamin;
        $pelakuUmkmData['provinsi'] = $request->provinsi;
        $pelakuUmkmData['kabupaten_kota'] = $request->kabupaten_kota;
        $pelakuUmkmData['kecamatan'] = $request->kecamatan;
        $pelakuUmkmData['desa_kelurahan'] = $request->desa_kelurahan;
        $pelakuUmkmData['alamat'] = $request->alamat;
        $pelakuUmkmData['bidang_usaha'] = $request->bidang_usaha;
        $pelakuUmkmData['no_hp'] = $request->no_hp;

        if ($pelaku_umkm->update($pelakuUmkmData)) {
            return redirect('pelaku_umkm')->with('success', 'Data UMKM berhasil diperbaharui!');
        } else {
            return redirect('pelaku_umkm/edit')->with('error', 'Data UMKM gagal diperbaharui!');
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
        $pelaku_umkm = PelakuUmkm::findOrFail($id);
        if ($pelaku_umkm->delete()) {
            return redirect('pelaku_umkm')->with('success', 'Data Pelaku UMKM berhasil dihapus!');
        } else {
            return redirect('pelaku_umkm/create')->with('error', 'Data Pelaku UMKM gagal dihapus!');
        }
    }

    public function import_excel(Request $request)
    {
        // print_r($request->file);die;
        // validasi
        $this->validate($request, [
            'file' => 'required|max:2048|mimes:csv,xls,xlsx'
        ]);


        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('file_pelaku_umkm', $nama_file);

        // import data
        Excel::import(new PelakuUmkmImport, public_path('/file_pelaku_umkm/' . $nama_file));

        // notifikasi dengan session
        return redirect('pelaku_umkm')->with('success', 'Data Pelaku UMKM berhasil ditambahkan!');
    }

    public function kabupaten_kota(Request $request)
    {
        $data = Regency::where('province_id', $request->get('id'))
            ->pluck('name', 'id');

        return response()->json($data);
    }

    public function kecamatan(Request $request)
    {
        $data = District::where('regency_id', $request->get('id'))
            ->pluck('name', 'id');

        return response()->json($data);
    }

    public function desa_kelurahan(Request $request)
    {
        $data = Village::where('district_id', $request->get('id'))
            ->pluck('name', 'id');

        return response()->json($data);
    }
}
