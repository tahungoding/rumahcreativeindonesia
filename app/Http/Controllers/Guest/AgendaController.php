<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Agenda;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = "Agenda";
        // print_r($request->status);die;
        $status = $request->status;
        $data['agenda'] = Agenda::when($status, function($q, $status) {
                                  return $q->where('status', $status);
                                 })
                                 ->paginate(4);

        if ($request->ajax()) {
            $view = view('guest.agenda.data_agenda',$data)->render();
            return response()->json(['html'=>$view]);
        }

        return view('guest.agenda.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['agenda'] = Agenda::where('slug', $id)->first();
        $data['agendas'] = Agenda::whereDate('tanggal_awal', '<', date('Y-m-d H:i:s', strtotime(($data['agenda']->tanggal_awal))))->where('status', '=', 'aktif')->limit(5)->get();
        $data['title'] = $data['agenda']->nama_agenda;
        $data['count_view'] = views($data['agenda'])->unique()->count();

        views($data['agenda'])->record();

        return view('guest.agenda.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
    }
}
