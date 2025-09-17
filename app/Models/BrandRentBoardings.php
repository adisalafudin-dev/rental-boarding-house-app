<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BrandRentBoardings extends Model
{
    //
    use HasFactory;
    protected $table = "brand_kost";

    protected $fillable = [
        'name',
        'id_pemilik',
        'nama_brand',
        "logo",
        "alamat",
        "dokumen_izin",
        "dokumen_ktp",  
        "dokumen_npwp",
        "dokumen_lain",        
    ];

    public function owners() {
        return $this->belongsTo(User::class, "id_pemilik");
    }

    public function typeRoom() {
        return $this->hasMany(Jenis::class, "id_brand_kos");
    }

    public function sizeRoom() {
        return $this->hasMany(Ukuran::class, "id_brand_kos");
    }

    public function cabangKos() : HasMany {
        return $this->hasMany(Cabang::class, "id_kos");
    }
}
