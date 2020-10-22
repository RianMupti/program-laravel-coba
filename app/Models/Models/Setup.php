<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setup extends Model
{
    use HasFactory;

    protected $table = 'setup_aplikasi';
    protected $fillable = ['jumlah_hari_kerja', 'nama_aplikasi'];
}