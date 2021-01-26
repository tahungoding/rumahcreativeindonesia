<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function landing_page(){
        return view('guest.landingpage');
    }

    public function profiles(){
        return view('guest.profile');
    }
}
