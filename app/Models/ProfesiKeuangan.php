<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfesiKeuangan extends Model
{
    use HasFactory;
    protected $table = 'profesi_keuangan';
    public $timestamps = false;
}
