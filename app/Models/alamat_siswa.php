<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alamat_siswa extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_alamatsiswa';

    protected $fillable = 
    [
        'nisn',
    ];

    public function siswa()
    {
        return $this->belongsTo(siswas::class, 'nisn', 'nisn');
    }
}
