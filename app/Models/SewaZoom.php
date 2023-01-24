<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SewaZoom extends Model
{
    use HasFactory;
    protected $table = 'sewa_zoom';
    protected $fillable = [
        'user_id',
        'nama',
        'departemen',
        'topik',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'status'
    ];

}
