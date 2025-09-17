<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    /**
     * Ambil semua provinsi
     */
    public function getProvinsi()
    {
        $provinsi = Provinsi::all();
        return response()->json($provinsi);
    }

    /**
     * Ambil semua kota berdasarkan id provinsi
     */
    public function getKotaByProvinsi($provinsiId)
    {
        $provinsi = Provinsi::with('cities')->findOrFail($provinsiId);

        return response()->json([
            'provinsi' => $provinsi->nama,
            'kota' => $provinsi->cities
        ], 200);
    }


}
