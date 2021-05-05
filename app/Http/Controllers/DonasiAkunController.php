<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DirectoryAccount;
use App\CampaignAccount;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class DonasiAkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Donasi Akun';
        $data['campaign_accounts'] = CampaignAccount::all();
        return view('donasi_akun.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']      = 'Tambah Donasi Akun';
        $data['actionUrl']  = route('donasi_akun.store');
        $data['directory_accounts'] = DirectoryAccount::all();

        return view('donasi_akun.form', $data);
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
            'name'                      => "required",
            'qrcode'                    => "nullable|mimes:png,jpg|max:2048",
            'number'                    => "required",
            'id_directory_account'      => "required",
        ]);

        $path = ($request->qrcode)
            ? $request->file('qrcode')->store("/public/images/campaign_accounts")
            : null;

        $data = [
            'name'                          => $request->name,
            'qrcode'                        => $path,
            'number'                        => $request->number,
            'id_directory_account'          => $request->id_directory_account,
        ];

        if (CampaignAccount::create($data)) {
            return redirect(route('donasi_akun.index'))->with('success', 'Data telah ditambahkan.');
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
        $data['title']      = 'Edit Donasi Akun';
        $data['actionUrl']  = route('donasi_akun.update', $id);
        $data['campaign_account']    = CampaignAccount::findOrFail($id);
        $data['directory_accounts'] = DirectoryAccount::all();

        return view('donasi_akun.form', $data);
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
            'name'                          => "required|unique:campaign_accounts,name,$id",
            'qrcode'                        => "nullable|mimes:png,jpg|max:2048",
            'number'                        => "required",
            'id_directory_account'          => "required",
        ]);

        $campaign_account = CampaignAccount::findOrFail($id);

        $path = ($request->qrcode)
            ? $request->file('qrcode')->store("/public/images/direcotry_accounts")
            : $campaign_account->qrcode;

        if ($request->qrcode) {
            Storage::delete($campaign_account->qrcode);
        }

        $data = [
            'name'                  => $request->name,
            'qrcode'                => $path,
            'number'                => $request->number,
            'id_directory_account'  => $request->id_directory_account
        ];

        if ($campaign_account->update($data)) {
            return redirect(route('donasi_akun.index'))->with('success', 'Data telah diperbaharui.');
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
        $campaign_account = CampaignAccount::findOrFail($id);

        Storage::delete($campaign_account->qrcode);

        if ($campaign_account->delete()) {
            return redirect(route('donasi_akun.index'))->with('success', 'Data telah dihapus.');
        } else {
            return back()->with('failed', 'Data gagal dihapus.');
        }
    }
}
