<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;

    protected $table = 'reviews_user_cabang';

    protected $fillable = [
        'id_sewa',
        'rating',
        'komentar',
    ];

    /**
     * Relasi ke tabel sewa_order
     */
    public function sewa()
    {
        return $this->belongsTo(SewaOrder::class, 'id_sewa');
    }
}
