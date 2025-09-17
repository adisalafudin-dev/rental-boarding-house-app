<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TarifKhusus extends Model
{
    use HasFactory;

    protected $table = "tarif_khusus";

    protected $fillable = [
        "id_kamar",
        "harga",
        "mulai_berlaku",
        "selesai_berlaku",
        "alasan",
        "tipe",
        "is_active"
    ];

    /**
     * Relasi ke Kamar
     */
    public function kamar()
    {
        return $this->belongsTo(Kamar::class, "id_kamar");
    }

    /**
     * Scope untuk hanya ambil tarif aktif
     */
    public function scopeActive($query)
    {
        return $query->where("is_active", 1);
    }

    /**
     * Cek apakah tarif sedang berlaku
     */
    public function isCurrentlyValid()
    {
        $now = now();
        return $this->mulai_berlaku <= $now && 
            ($this->selesai_berlaku === null || $this->selesai_berlaku >= $now);
    }
}
