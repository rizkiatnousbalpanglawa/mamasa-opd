<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatistikOnline extends Model
{
    public $timestamps = false;
    protected $fillable = ['ip_address', 'last_activity'];
    protected $casts = ['last_activity' => 'datetime'];
}
