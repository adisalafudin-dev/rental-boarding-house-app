<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    //
    use HasFactory;
    protected $table = "province";
    protected $fillable = [
        "nama"
    ];

    public function cities() {
        return $this->hasMany(Kota::class, "id_provinsi", "id");
    }
}
