<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alamat_walikelas extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_alamatwalas';

    protected $fillable = 
    [
        'nip_walikelas',
    ];

    public function walas()
    {
        return $this->belongsTo(wali_kelas::class, 'nip_walikelas', 'nip_walikelas');
    }
}
