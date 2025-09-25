<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatistikHarian extends Model
{
    protected $fillable = ['tanggal', 'pengunjung', 'hits'];
}
