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
        'ttd_ka_dept',
        'ttd_dir_terkait',
        'ttd_mgr_akunting',
        'ttd_mgr_ti',
        'ttd_asisten_dirut',
        'status'
    ];

}
