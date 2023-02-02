<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanInventaris extends Model
{
    use HasFactory;
    protected $table = 'peminjaman_inventaris';
    protected $fillable = [
        'user_id',
        'nama',
        'departemen',
        'tanggal',
        'ttd_kabag_ybs',
        'ttd_edp',
        'ttd_pengembalian',
        'status'
    ];
}
