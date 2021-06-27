<?php

namespace App\Http\Controllers;

use App\Models\FilmRevenue;
use App\Models\ProductRevenue;
use App\Models\Revenue;
use Illuminate\Http\Request;

class RevenuesController extends Controller
{
    public function revenues(){
        if(auth()->user()->role_id == 1) {
            $revenue = Revenue::all();
        } else {
            $revenue = Revenue::where('cinema_id', auth()->user()->cinema_id)->get();
        }
    }

    public function filmRevenues($id) {
        $film_revenue = FilmRevenue::where('revenue_id',$id)->get();
    }

    public function productRevenues($id) {
        $product_revenue = ProductRevenue:: where('revenue_id',$id)->get();
    }
}
