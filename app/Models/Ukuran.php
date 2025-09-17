<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ukuran extends Model
{
    //
    protected $table = "ukuran";

    protected $fillable = [
        "id_brand_kos",
        "nama",
        "panjang",
        "lebar",
        "tinggi",
        "kapasitas_penghuni",
        "keterangan"
    ];

    public function rentBoardings() {
        return $this->belongsTo(BrandRentBoardings::class, "id_brand_kos");
    }

    public function kamar() {
        return $this->hasMany(Kamar::class, "id_ukuran");
    }

    public function tarifKategori() {
        return $this->hasMany(TarifKategori::class, "id_cabang");
    }
}
