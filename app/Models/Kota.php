<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    //
    use HasFactory;
    protected $table = "kota";

    protected $fillable = [
        "nama",
        "id_provinsi"
    ];

    public function province() {
        return $this->belongsTo(Provinsi::class, "id_provinsi", "id");
    }

    public function cabangKos() {
        return $this->hasMany(Cabang::class, "id_kota");
    }
}
