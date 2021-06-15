<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function screening() {
        return $this->belongsTo('App\Models\Screening');
    }

    public function seat() {
        return $this->belongsTo('App\Models\Seat');
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
