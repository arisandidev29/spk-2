<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserJawaban extends Model
{
    protected $fillable = ['user_id','kd_kriteria','alternative_id','jawaban'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function kriteria() {
        return $this->belongsTo(Kriteria::class,'kd_kriteria','kd_kriteria');
    }

    public function alternative() {
        return $this->belongsTo(Alternative::class);
    }
}
