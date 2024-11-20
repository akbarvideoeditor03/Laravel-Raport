<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class raports extends Model
{
    public function siswa()
    {
        return $this->belongsTo(siswas::class, 'nisn', 'nisn');
    }

    public function thn_ajaran()
    {
        return $this->belongsTo(tahun_ajarans::class, 'kode_tahunajaran', 'kode_tahunajaran');
    }

    public function sekolah()
    {
        return $this->belongsTo(sekolahs::class, 'npsn', 'npsn');
    }

    public function nilai()
    {
        return $this->belongsTo(nilai_mapels::class, 'kode_nilai_mapel', 'nilai');
    }

    public function absen()
    {
        return $this->belongsTo(absens::class, 'id_absensi', 'id_absensi');
    }

    public function walikelas()
    {
        return $this->belongsTo(wali_kelas::class, 'nip_walikelas', 'nip_walikelas');
    }

    public function kepalasekolah()
    {
        return $this->belongsTo(kepala_sekolahs::class, 'nip_kepalasekolah', 'nip_kepalasekolah');
    }

    use HasFactory;
    protected $primaryKey = 'nomor_raport';
}
