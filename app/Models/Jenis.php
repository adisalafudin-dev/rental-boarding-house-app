<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    //
        use HasFactory;

    protected $table = "jenis";

    protected $fillable = [
        "nama",
        "id_brand_kos",
        "keterangan"
    ];

    public function rentBoardings() {
        $this->belongsTo(BrandRentBoardings::class, "id_brand_kos");
    }

    public function kamar() {
        $this->hasMany(Kamar::class, "id_jenis");
    }

    public function tarifKategori() {
        return $this->hasMany(TarifKategori::class, "id_cabang");
    }
}
