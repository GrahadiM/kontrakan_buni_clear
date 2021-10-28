<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Laporan extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'laporans';

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
            ->translatedFormat('l, d F Y');
    }

    public function sewa()
    {
        return $this->belongsTo('App\Models\Sewa');
    }
    public function user()
    {   
        return $this->belongsTo('App\Models\User');
    }
    public function room()
    {
        return $this->belongsTo('App\Models\PostKontrakan');
    }
}
