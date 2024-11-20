<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nilai_mapels extends Model
{
    use HasFactory;

    public function mapel()
    {
        return $this->belongsTo(tabel_matapelajarans::class, 'kode_mapel', 'kode_mapel');
    }

    public function siswa()
    {
        return $this->belongsTo(siswas::class, 'nisn', 'nisn');
    }
    
    protected $primaryKey = 'kode_nilai_mapel';
    public $incrementing = false;
}
