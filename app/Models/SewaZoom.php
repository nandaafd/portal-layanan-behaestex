<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
    /**
     * Get the user associated with the SewaZoom
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function detailStatus()
    {
        return $this->hasOne(Status::class, 'id', 'status');
    }
}
