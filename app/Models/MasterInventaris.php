<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterInventaris extends Model
{
    use HasFactory;
    protected $table = 'master_inventaris';
    protected $fillable = ['nama_barang'];
}
