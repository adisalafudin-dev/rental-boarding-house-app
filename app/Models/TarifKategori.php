<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarifKategori extends Model
{
    //
    use HasFactory;

    protected $table = "tarif_kategori";

  protected $fillable = [
        "id_cabang",
        "id_ukuran",
        "id_jenis",
        "tipe",
        "harga",
        "mulai_berlaku",
        "selesai_berlaku"
    ];

    /**
     * Relasi ke Cabang
     */
    public function cabang()
    {
        return $this->belongsTo(Cabang::class, "id_cabang");
    }

    /**
     * Relasi ke Ukuran
     */
    public function ukuran()
    {
        return $this->belongsTo(Ukuran::class, "id_ukuran");
    }

    /**
     * Relasi ke Jenis
     */
    public function jenis()
    {
        return $this->belongsTo(Jenis::class, "id_jenis");
    }
}
