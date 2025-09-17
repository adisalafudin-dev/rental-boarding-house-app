<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    //
    use HasFactory;
    protected $table = "kamar";

    protected $fillable = [
        "id_cabang",
        "id_ukuran",
        "id_jenis",
        "keterangan",
        "status_keaktifan",
        "pax"
    ];

    public function cabang() {
        return $this->belongsTo(Cabang::class, "id_cabang");
    }

    public function jenis() {
        return $this->belongsTo(Jenis::class, "id_jenis");
    }

    public function ukuran() {
        return $this->belongsTo(Ukuran::class, "id_ukuran");
    }

    public function tarifKhusus() {
        return $this->hasMany(TarifKhusus::class, "id_kamar");
    }

    public function sewaOrder() {
        return $this->hasMany(SewaOrder::class, "id_kamar");
    }
}
