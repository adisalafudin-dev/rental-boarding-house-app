<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
