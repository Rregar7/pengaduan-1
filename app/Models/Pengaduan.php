<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    public function masyarakat()
    {
        return $this->belongsTo(Masyarakat::class, 'nik_masyarakat', 'nik');
    }

    public function tanggapan()
    {
        return $this->hasOne(Tanggapan::class, 'id');
    }
}
