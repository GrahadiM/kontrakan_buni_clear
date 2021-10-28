<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Transaksi extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'transaksis';

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['rental_date'])
            ->translatedFormat('l, d F Y');
    }

    public function user()
    {   
        return $this->belongsTo('App\Models\User');
    }
    public function room()
    {
        return $this->belongsTo('App\Models\PostKontrakan');
    }
    public function sewa()
    {
        return $this->belongsTo('App\Models\Sewa');
    }
}
