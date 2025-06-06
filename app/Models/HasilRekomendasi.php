<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilRekomendasi extends Model
{
    protected $fillable = [
        'user_id',
        'alternative_id',
        'vektor_s',
        'vektor_v',
        'ranking',
        'status'
    ];


    public function user() {
        return $this->belongsTo(User::class);
    }

    public function alternative() {
        return $this->belongsTo(Alternative::class);
    }
}
