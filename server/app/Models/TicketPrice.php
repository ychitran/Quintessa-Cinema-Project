<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketPrice extends Model
{
    use HasFactory;
    
    protected $fillable = ['format_id','normal_price','member_price',"weekend_price"];

    public function format() {
        return $this->belongsTo('App\Models\FormatFilm');
    }
}
