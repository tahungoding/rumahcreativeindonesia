<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CampaignAccount;
use App\CampaignDonor;
use App\Campaign;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class DonaturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Donatur';
        $data['campaign_donors'] = CampaignDonor::all();
        return view('donatur.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']      = 'Tambah Donatur';
        $data['actionUrl']  = route('donatur.store');
        $data['campaigns'] = Campaign::all();
        $data['campaign_accounts'] = CampaignAccount::all();

        return view('donatur.form', $data);
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
            'amount'                    => "required",
            'proof'                     => "nullable|mimes:png,jpg|max:2048",
            'id_campaign'               => "required",
            'id_campaign_account'       => "required",
        ]);

        $path = ($request->proof)
            ? $request->file('proof')->store("/public/images/campaign_donors")
            : null;

        $data = [
            'name'                          => $request->name,
            'proof'                         => $path,
            'amount'                        => $request->amount,
            'id_campaign'                   => $request->id_campaign,
            'id_campaign_account'           => $request->id_campaign_account,
            'message'                       => $request->message,
            'status'                        => 'verif'
        ];

        if (CampaignDonor::create($data)) {
            return redirect(route('donatur.index'))->with('success', 'Data telah ditambahkan.');
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
        $data['title']      = 'Edit Donatur';
        $data['actionUrl']  = route('donatur.update', $id);
        $data['campaign_donor']    = CampaignDonor::findOrFail($id);
        $data['campaigns'] = Campaign::all();
        $data['campaign_accounts'] = CampaignAccount::withTrashed()->get();

        return view('donatur.form', $data);
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
            'name'                      => "required",
            'amount'                    => "required",
            'proof'                     => "nullable|mimes:png,jpg|max:2048",
            'id_campaign'               => "required",
            'id_campaign_account'       => "required",
            'status'                    => "required",
        ]);

        $campaign_donor = CampaignDonor::findOrFail($id);


        $path = ($request->proof)
            ? $request->file('proof')->store("/public/images/direcotry_accounts")
            : $campaign_donor->proof;

        if ($request->proof) {
            Storage::delete($campaign_donor->proof);
        }

        $data = [
            'name'                          => $request->name,
            'proof'                         => $path,
            'amount'                        => $request->amount,
            'status'                        => $request->status,
            'id_campaign'                   => $request->id_campaign,
            'id_campaign_account'           => $request->id_campaign_account,
            'message'                       => $request->message,
        ];


        if ($campaign_donor->update($data)) {
            return redirect(route('donatur.index'))->with('success', 'Data telah diperbaharui.');
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
        $campaign_donor = CampaignDonor::findOrFail($id);

        Storage::delete($campaign_donor->proof);

        if ($campaign_donor->delete()) {
            return redirect(route('donatur.index'))->with('success', 'Data telah dihapus.');
        } else {
            return back()->with('failed', 'Data gagal dihapus.');
        }
    }
}
