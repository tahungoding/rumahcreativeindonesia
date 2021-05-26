<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campaign;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class DonasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Donasi';
        $data['campaigns'] = Campaign::all();
        return view('donasi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']      = 'Tambah Donasi';
        $data['actionUrl']  = route('donasi.store');

        return view('donasi.form', $data);
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
            'title'         => "required|unique:campaigns,title",
            'thumbnail'     => "required|mimes:png,jpg,jpeg|max:2048",
            'description'   => "required",
            'target'        => "required",
            'start_date'    => "required",
            'end_date'      => "required",
            'rab'           => "nullable|mimes:pdf,xlsx,docx|max:3090",
            'status'        => [
                'required',
                Rule:: in(['open', 'close']),
            ],
        ]);
        
        $rab = null;
        if (!empty($request->rab)) {
            $rab = $request->file('rab')->store("/public/doc/campaigns");
        }

        $donasiData = [
            'title'               => $request->title,
            'slug'                => Str::slug($request->title),
            'thumbnail'           => $request->file('thumbnail')->store("/public/images/campaigns"),
            'description'         => $request->description,
            'target'              => $request->target,
            'start_date'          => $request->start_date,
            'end_date'            => $request->end_date,
            'rab'                 => $rab,
            'id_user'             => Auth::id(),
            'status'              => $request->status,
        ];

        if (Campaign::create($donasiData)) {
            return redirect(route('donasi.index'))->with('success', 'Data telah ditambahkan.');
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
        $data['title']      = 'Edit Donasi';
        $data['actionUrl']  = route('donasi.update', $id);
        $data['campaign']    = Campaign::findOrFail($id);

        return view('donasi.form', $data);
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
            'title'         => "required|unique:campaigns,title,$id",
            'thumbnail'     => "nullable|mimes:png,jpg|max:2048",
            'description'   => "required",
            'target'        => "required",
            'start_date'    => "required",
            'end_date'      => "required",
            'rab'           => "nullable|mimes:pdf,docx,xlsx|max:3090",
            'status'        => [
                'required',
                Rule:: in(['open', 'close']),
            ],
        ]);

        $campaign = Campaign::findOrFail($id);

        $path = ($request->thumbnail)
            ? $request->file('thumbnail')->store("/public/images/campaigns")
            : $campaign->thumbnail;

        if ($request->thumbnail) {
            Storage::delete($campaign->thumbnail);
        }

        $rab = ($request->rab)
            ? $request->file('rab')->store("/public/doc/campaigns")
            : $campaign->rab;

        if ($request->rab) {
            Storage::delete($campaign->rab);
        }

        $donasiData = [
            'title'               => $request->title,
            'slug'                => Str::slug($request->title),
            'thumbnail'           => $path,
            'description'         => $request->description,
            'target'              => $request->target,
            'start_date'          => $request->start_date,
            'end_date'            => $request->end_date,
            'rab'                 => $rab,
            'id_user'             => Auth::id(),
            'status'              => $request->status,
        ];

        if ($campaign->update($donasiData)) {
            return redirect(route('donasi.index'))->with('success', 'Data telah diperbaharui.');
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
        $campaign = Campaign::findOrFail($id);

        Storage::delete($campaign->thumbnail);

        if ($campaign->delete()) {
            return redirect(route('donasi.index'))->with('success', 'Data telah dihapus.');
        } else {
            return back()->with('failed', 'Data gagal dihapus.');
        }
    }
}
