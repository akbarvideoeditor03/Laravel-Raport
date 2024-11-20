<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sekolahs extends Model
{
    protected $fillable = [
        'npsn',
        'nama_sekolah',
        'nip_kepalasekolah',
        'alamat_sekolah',
        'kontak_telepon',
        'gambar_sekolah'
    ];

    use HasFactory;
    public function kepala_sekolah()
    {
        return $this->belongsTo(kepala_sekolahs::class, 'nip_kepalasekolah', 'nip_kepalasekolah');
    }
    protected $primaryKey = 'npsn';
    public $incrementing = false;
}

