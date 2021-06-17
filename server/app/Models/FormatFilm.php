<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormatFilm extends Model
{
    protected $table = 'format_films';
    use HasFactory;
    public function film() {
        return $this->hasMany('App\Models\Film');
    }

    public function price() {
        return $this->hasMany('App\Models\TicketPrice');
    }
}
