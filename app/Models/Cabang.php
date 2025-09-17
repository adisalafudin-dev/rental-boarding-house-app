<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cabang extends Model
{
    //
    use HasFactory;

    protected $table = "cabang";

    protected $fillable = [
        "id_kota",
        "id_kos",
        "nama",
        "alamat",
        "latitude",
        "longtitude",
        "jumlah_kamar",
        "deskripsi",
        "status",
        "tanggal_verifikasi"
    ];

    public function rentBoardings() {
        return $this->belongsTo(BrandRentBoardings::class, "id_kos");
    }

    public function kota() {
        return $this->belongsTo(Kota::class, "id_kota");
    }

    public function kamar() : HasMany {
        return $this->hasMany(Kamar::class, "id_cabang");
    }

    public function tarifKategori() {
        return $this->hasMany(TarifKategori::class, "id_cabang");
    }
}
