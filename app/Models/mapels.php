<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mapels extends Model
{
    use HasFactory;
    protected $primaryKey = 'kode_mapel';
    public $incrementing = false;
}
