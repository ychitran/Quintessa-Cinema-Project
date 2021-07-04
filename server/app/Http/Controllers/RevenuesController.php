<?php

namespace App\Http\Controllers;

use App\Models\FilmRevenue;
use App\Models\ProductRevenue;
use App\Models\Revenue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RevenuesController extends Controller
{
    public function revenues(){
        // if(auth()->user()->role_id == 1) {
        //     $revenue = Revenue::all();
        // } else {
        //     $revenue = Revenue::where('cinema_id', auth()->user()->cinema_id)->get();
        // }
        $revenue = DB::table('revenues')
        ->leftJoin('cinemas','revenues.cinema_id','=','cinemas.id')
        ->select('revenues.*','cinemas.cinema_name as cinema_name')
        ->get();
        return response()->json($revenue);
    }

    public function filmRevenues($id) {
        $film_revenue = FilmRevenue::where('film_revenues.revenue_id',$id)
        ->leftJoin('films','film_revenues.film_id','=','films.id')
        ->leftJoin('revenues','film_revenues.revenue_id','=','revenues.id')
        ->select('film_revenues.*','films.global_name as global_name','revenues.month as month','revenues.year as year')
        ->get();
        return response()->json($film_revenue);

    }

    public function productRevenues($id) {
        $product_revenue = ProductRevenue::where('product_revenues.revenue_id',$id)
        ->leftJoin('combos','product_revenues.combo_id','=','combos.id')
        ->leftJoin('revenues','product_revenues.revenue_id','=','revenues.id')
        ->select('product_revenues.*','combos.product_name as combo_name','revenues.month as month','revenues.year as year')
        ->get();
        return response()->json($product_revenue);

    }
}
