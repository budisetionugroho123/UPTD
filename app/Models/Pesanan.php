<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanan';
    protected $guarded = ['id'];

    public function analisis()
    {
        return $this->hasMany(Analisis::class);
    }
    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }
}
