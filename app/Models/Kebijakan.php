<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kebijakan extends Model
{
    use HasFactory;
    protected $table = 'kebijakan';
    public $timestamps = false;
    protected $fillable = [
        'nomor_peraturan',
        'nama_peraturan',
        'isi_peraturan',
        'tempat_di_tempatkan',
        'tanggal_di_tetapkan',
        'nama_penandatanganan',
        'tanda_tangan',
    ];

}
