<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Program;
use App\Umkm;
use App\Mitra;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['user_count'] = User::count();
        $data['user_last_month'] = User::whereYear('created_at', '=', Carbon::now()->format('Y'))
                                        ->whereMonth('created_at', '=', Carbon::now()->format('m'))->count();
        $data['program_count'] = Program::count();
        $data['program_last_month'] = Program::whereYear('created_at', '=', Carbon::now()->format('Y'))
                                        ->whereMonth('created_at', '=', Carbon::now()->format('m'))->count();
        $data['umkm_count'] = Umkm::count();
        $data['umkm_last_month'] = Umkm::whereYear('created_at', '=', Carbon::now()->format('Y'))
                                        ->whereMonth('created_at', '=', Carbon::now()->format('m'))->count();
        $data['mitra_count'] = Mitra::count();
        $data['mitra_last_month'] = Mitra::whereYear('created_at', '=', Carbon::now()->format('Y'))
                                        ->whereMonth('created_at', '=', Carbon::now()->format('m'))->count();
        return view('home', $data);
    }
}
