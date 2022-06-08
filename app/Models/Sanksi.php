<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanksi extends Model
{
    use HasFactory;
    protected $table = 'sanksi';
    public $timestamps = false;
    protected $fillable = [
        'nomor_sanksi',
        'nama_sanksi',
        'nama_penandatangan',
        'tanda_tangan',
        'isi_sanksi',
        'tempat_ditetapkan',
        'tanggal_ditetapkan',
        'tentang'
    ];
}
