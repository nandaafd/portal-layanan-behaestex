<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AksesProgram extends Model
{
    use HasFactory;
    protected $fillable = [
        'departemen',
        'nama_program',
        'latar_belakang',
        'proses_bisnis',
        'sop',
        'benefit',
        'konsekuensi',
        'fitur',
        'prosedur_dan_dokumen',
        'status'
    ];
}
