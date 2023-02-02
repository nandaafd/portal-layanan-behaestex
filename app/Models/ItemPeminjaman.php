<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPeminjaman extends Model
{
    use HasFactory;
    protected $table = 'item_peminjaman';
    protected $fillable = ['peminjaman_id','master_inventaris_id'];
}
