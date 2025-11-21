<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'tanggal' => 'datetime'
    ];

    public function penulis()
    {
        return $this->belongsTo(Penulis::class, 'penulis_id');
    }
}
