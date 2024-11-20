<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tahun_ajarans extends Model
{
    use HasFactory;
    protected $primaryKey = 'kode_tahunajaran';
    public $incrementing = false;
}
