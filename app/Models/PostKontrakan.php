<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostKontrakan extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'post_kontrakans';

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function sewa()
    {
        return $this->belongsTo('App\Models\Sewa');
    }
    public function transaksi()
    {
        return $this->hasMany('App\Models\Transaksi');
    }
    public function laporan()
    {
        return $this->hasMany('App\Models\Laporan');
    }
}
