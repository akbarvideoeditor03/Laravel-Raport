<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kepala_sekolahs extends Model
{
    protected $fillable = [
        'nip_kepalasekolah',
        'nama_kepalasekolah',
        'gambar_ttd_tangan'
    ];
    use HasFactory;
    protected $primaryKey = 'nip_kepalasekolah';
    public $incrementing = false;
}
