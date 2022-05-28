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
        'nomor_kebijakan',
        'judul_kebijakan',
        'nama_penandatanganan',
        'tanda_tangan',
        'isi',
        'tempat_ditetapkan',
        'tanggal_ditetapkan',
        'tentang'
    ];
}
