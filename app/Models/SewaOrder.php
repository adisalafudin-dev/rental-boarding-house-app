<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SewaOrder extends Model
{
    use HasFactory;

    protected $table = 'sewa_order';

    protected $fillable = [
        'id_kamar',
        'user_id',
        'tanggal_pesan',
        'tanggal_masuk',
        'tanggal_selesai',
        'total_bayar',
        'jaminan',
        'status',
    ];

    /**
     * Relasi ke User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relasi ke Kamar
     */
    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'id_kamar');
    }

    public function reviews(){
        return $this->hasMany(Reviews::class,  'id_sewa',);
    }
}
