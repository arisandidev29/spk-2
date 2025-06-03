<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bobot extends Model
{
    protected $fillable = [
        'nilai',
        'keterangan'
    ];


    public function kriteria() :HasMany {
        return $this->hasMany(Kriteria::class);
    }
}
