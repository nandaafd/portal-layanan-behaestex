<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $table = 'status';
    protected $fillable = ['nama_status'];
    /**
     * Get the user that owns the status
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sewazoom()
    {
        return $this->belongsTo(Sewazoom::class, 'status','id');
    }
}
