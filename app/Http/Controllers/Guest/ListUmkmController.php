<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Umkm;
use Illuminate\Http\Request;

class ListUmkmController extends Controller
{
    public function index(){
        $data['title'] = "Daftar Komunitas UMKM";
        return view('guest.list_umkm', $data);
    }

    public function data()
    {
        $umkm = Umkm::all();

        return Datatables::of($umkm)->make();
    }
}
