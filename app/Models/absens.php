<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class absens extends Model
{
    use HasFactory;

    public function siswa()
    {
        return $this->belongsTo(siswas::class, 'nisn', 'nisn');
    }
    protected $primaryKey = 'id_absensi';

    //kalau nisn = id_anggota
}

