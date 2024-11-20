<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswas extends Model
{
    use HasFactory;
    protected $primaryKey = 'nisn';
    public $incrementing = false;

    public function alamatSiswa()
    {
        return $this->hasOne(alamat_siswa::class);
    }
}
