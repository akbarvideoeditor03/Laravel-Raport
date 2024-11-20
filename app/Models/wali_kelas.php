<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wali_kelas extends Model
{
    protected $fillable = [
        'nip_walikelas',
        'nama_walikelas',
        'gmbr_ttd_wali_kelas'
    ];
    use HasFactory;
    protected $primaryKey = 'nip_walikelas';
    public $incrementing = false;
}
