<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan_Keluarga extends Model
{
    use HasFactory;

    protected $table = 'karyawan_keluarga';
    protected $primaryKey = 'karyawan_id';
}
