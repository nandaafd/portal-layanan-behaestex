<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AksesInternet extends Model
{
    use HasFactory;
    protected $fillable = ['nama','departemen','jabatan','keperluan_email','keperluan_browsing'];
}
