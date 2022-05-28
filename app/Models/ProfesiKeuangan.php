<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfesiKeuangan extends Model
{
    use HasFactory;
    protected $table = 'profesi_keuangan';
    public $timestamps = false;
    protected $fillable = [
        'id_user',
        'nik',
        'npw',
        'nama',
        'agama',
        'tanggal_lahir',
        'tempat_lahir',
        'alamat',
        'pangkat',
        'gelar',
        'jabatan',
        'umur',
    ];
}
