<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perizinan extends Model
{
    use HasFactory;
    protected $table = 'perizinan';
    public $timestamps = false;
    protected $fillable = [
        'no_izin',
        'id_user',
        'KJPP',
        'tanggal_izin',
        'klasifikasi_izin',
        'no_register_penilai',
        'no_induk'
    ];
}
