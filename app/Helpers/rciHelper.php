<?php

use Illuminate\Support\Facades\Storage;

function tgl_indo($datetime, $withTime = false, $withDay = false)
{
    $hari = ($withDay === true) ? config('constant.hari') : null;

    if ($hari !== null) {
        $day = date('D', strtotime($datetime));
        $stringDay = $hari[$day] . ', ';
    } else {
        $stringDay = null;
    }

    $bulan    = config('constant.bulan');
    $tanggal  = date('d m Y', strtotime($datetime));
    $pecahkan = explode(' ', $tanggal);

    $stringDate = $pecahkan[0] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[2];

    $time = ($withTime !== false) ? ' - ' . date('H:i', strtotime($datetime)) : null;

    return $stringDay . $stringDate . $time;
}

function avatar($path = null)
{
    return ($path) ? Storage::url($path) : asset('assets/noimage.png');
}
