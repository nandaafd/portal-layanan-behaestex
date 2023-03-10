<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AksesProgram extends Model
{
    use HasFactory;
    protected $table = 'akses_program';
    protected $fillable = [
        'user_id',
        'departemen',
        'nama_program',
        'latar_belakang',
        'proses_bisnis',
        'sop',
        'benefit',
        'konsekuensi',
        'fitur',
        'prosedur_dan_dokumen',
        'ttd_dir',
        'ttd_manager',
        'ttd_asisten_dirut',
        'status'
    ];
    public function detailStatus(){
        return $this->hasOne(Status::class, 'id','status');
    }

}
