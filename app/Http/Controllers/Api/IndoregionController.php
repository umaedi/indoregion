<?php

namespace App\Http\Controllers\Api;

use App\Models\Regency;
use App\Models\District;
use App\Models\Province;
use App\Http\Controllers\Controller;

class IndoregionController extends Controller
{
    public function provinsi()
    {
        $provinsi = Province::get();
        if ($provinsi) {
            return response()->json([
                'response'  => [
                    'success'   => true,
                    'message'   => 'Berhasil mendapatkan semua nama provinsi'
                ],
                'provinsi'  => $provinsi,
            ], 200);
        } else {
            return response()->json([
                'response'  => [
                    'success'   => true,
                    'message'   => 'Gagal mendapatkan semua nama provinsi'
                ],
                'provinsi'  => null
            ], 401);
        }
    }

    public function kabupaten($id)
    {
        $kabupaten = Regency::where('province_id', $id)->get();
        if ($kabupaten) {
            return response()->json([
                'response' => [
                    'success'   => true,
                    'message'   => 'Berhasil mendapatan semua nama kabupaten'
                ],
                'kabupaten' => $kabupaten,
            ], 200);
        } else {
            return response()->json([
                'response' => [
                    'success'   => false,
                    'message'   => 'Nama kabupaten tidak ditemukan'
                ],
                'kabupaten' => $kabupaten,
            ], 401);
        }
    }

    public function kecamatan($id)
    {
        $kecamatan = District::where('regency_id', $id)->get();
        if ($kecamatan) {
            return response()->json([
                'response'  => [
                    'success'   => true,
                    'message'   => "Berhasil mendapatkan semua nama kecamatan",
                ],
                'kecamatan' => $kecamatan
            ], 200);
        } else {
            return response()->json([
                'response'  => [
                    'success'   => true,
                    'message'   => "Gagal mendapatkan semua nama kecamatan",
                ],
                'kecamatan' => null
            ], 401);
        }
    }
}
