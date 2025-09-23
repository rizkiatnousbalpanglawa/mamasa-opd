<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformasiKategori extends Model
{
    protected $guarded = ['id'];

    public function informasi()
    {
        return $this->hasMany(Informasi::class, 'kategori_id');
    }
}
