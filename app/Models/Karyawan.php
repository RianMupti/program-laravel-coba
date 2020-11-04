<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawan';

    public function jabatan()
    {
        return $this->belongsTo('App\Models\Jabatan');
    }

    public function karyawan_details()
    {
        return $this->hasOne('App\Models\Karyawan_Details', 'karyawan_id');
    }

    public function karyawan_keluarga()
    {
        return $this->hasMany('App\Models\Karyawan_Keluarga');
    }
}
