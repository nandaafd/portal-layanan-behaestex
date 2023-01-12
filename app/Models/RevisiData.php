<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RevisiData extends Model
{
    use HasFactory;
    protected $table = 'revisi_data';
    protected $fillable = [
        'jenis_revisi',
        'tanggal',
        'tanggal_data',
        'jenis_data',
        'nama_data',
        'detail_revisi',
        'alasan_revisi',
        'status'
    ];
}
