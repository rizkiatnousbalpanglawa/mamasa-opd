<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'tanggal' => 'date'
    ];
    public function kategori()
    {
        return $this->belongsTo(InformasiKategori::class, 'kategori_id');
    }
}
