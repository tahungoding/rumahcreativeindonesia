<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Campaign;
use App\CampaignDonor;
use App\CampaignAccount;
use Illuminate\Support\Facades\DB;

class CampaignController extends Controller
{
    public function index()
    {
        $data['title'] = 'Donasi';
        $data['campaigns'] = Campaign::with('donatur')->where('status', '=', 'Open')->get();
        
        return view('guest.campaign.index', $data);
    }
    
    public function show($slug, Request $request)
    {
        $data['detail'] = Campaign::where('slug', '=', $slug)->first(); 
        $data['title'] = $data['detail']->title;
        if (!empty($request->all())) {
            $request->validate([
                'name'                      => "required",
                'amount'                    => "required",
                'proof'                     => "nullable|mimes:png,jpg|max:2048",
                'id_campaign_account'       => "required",
            ]);
    
            $path = ($request->proof)
                ? $request->file('proof')->store("/public/images/campaign_donors")
                : null;
    
            $data = [
                'name'                          => $request->name,
                'proof'                         => $path,
                'amount'                        => $request->amount,
                'id_campaign'                   => $data['detail']->id,
                'id_campaign_account'           => $request->id_campaign_account,
                'message'                       => $request->message,
                'status'                        => 'no verif'
            ];
    
            if (CampaignDonor::create($data)) {
                return redirect(route('campaign.show', $slug))->with('success', 'Terimakasih orang baik !, donasi kamu akan segera kami verifikasi terlebih dahulu.');die;
            } else {
                return back()->withInput()->with('failed', 'Data gagal disimpan.');die;
            }
        }
        $data['donatur'] = CampaignDonor::where([['id_campaign', '=', $data['detail']->id],['status', '=', 'verif']])->get();
        $data['campaign_accounts'] = CampaignAccount::get();

        return view('guest.campaign.detail', $data);
    }
}
