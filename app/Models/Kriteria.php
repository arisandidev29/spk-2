<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kriteria extends Model
{
    protected $primaryKey = 'kd_kriteria';
    public $incrementing = false;

    protected $keyType = 'string';
    protected $fillable = [
        'kd_kriteria',
        'nama',
        'bobot_id',
        'normalisasi',
        'kategori',
        'desc'
    ];


    public function bobot () :BelongsTo {
        return $this->belongsTo(Bobot::class);
    }
}
