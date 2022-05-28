<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratTugas extends Model
{
    use HasFactory;
    protected $table = 'surat_tugas';
    public $timestamps = false;
    protected $fillable = [
        'no_surat',
        'id_user',
        'nomor_izin',
        'lingkup_kegiatan',
        'alamat',
        'tanggal_kegiatan',
        'tanda_tangan',
        'tempat_id',
        'tanggal_ttd',
        'nama_penandatangan'
    ];
}
