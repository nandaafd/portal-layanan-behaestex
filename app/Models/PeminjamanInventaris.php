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
        'tanggal_pinjam',
        'tanggal_dikembalikan',
        'ttd_kabag_ybs',
        'ttd_edp',
        'ttd_pengembalian',
        'status'
    ];
   
    public function detailStatus(){
        return $this->hasOne(Status::class, 'id','status');
    }
    public function itemPeminjaman(){
        return $this->hasMany(itemPeminjaman::class, 'master_inventaris_id','item_peminjaman');
    }
}
