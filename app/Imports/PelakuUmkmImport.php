<?php

namespace App\Imports;

use App\PelakuUmkm;
use App\Models\District;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;

class PelakuUmkmImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $kecamatan = District::select('*')
                        ->where('regency_id', '=', 3211)
                        ->where('name', '=', $row[6])
                        ->limit(1)
                        ->get();
                        
        if (!empty($row[3])) {
            if ($row[3] == 'PEREMPUAN' || $row[3] == 'Perempuan') {
                $jk = 'l';
            }else{
                $jk = 'p';
            }
        }else{
            $jk = null;
        }

        if (!empty($row[2])) {
            // print_r($row);die;
            $tl = date('Y-m-d',strtotime($row[2]));
        }else{
            $tl = null;
        }
        // print_r($tl);die;

        if (!empty($row[0])) {
            $nik = $row[0];
        }else{
            $nik = 'Belum terdaftar';
        }

        if (!empty($row[8])) {
            $bu = $row[8];
        }else{
            $bu = 'Belum terdaftar';
        }

        if (!empty($row[7])) {
            $alamat = $row[7];
        }else{
            $alamat = 'Belum terdaftar';
        }

        if (!empty($row[7])) {
            $alamat = $row[7];
        }else{
            $alamat = 'Belum terdaftar';
        }

        if (!empty($kecamatan[0]['id'])) {
            $kec = $kecamatan[0]['id'];
        }else{
            $kec = null;
        }

        return new PelakuUmkm([
            'nik' => $nik,
            'nama' => $row[1],
            'tanggal_lahir' => $tl,
            'jenis_kelamin' => $jk,
            'provinsi' => '32',
            'kabupaten_kota' => '3211',
            'kecamatan' => $kec,
            'desa_kelurahan' => null,
            'alamat' => $alamat,
            'bidang_usaha' => $bu,
            'no_hp' => $row[9]
        ]);
    }
}
