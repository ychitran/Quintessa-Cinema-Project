<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    public function screening() {
        return $this->hasMany('App\Models\Screening');
    }

    public function format_film() {
        return $this->belongsTo('App\Models\FormatFilm');
    }
}
