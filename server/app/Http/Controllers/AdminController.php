<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Ad;
use App\Models\Cinema;
use App\Models\Film;
use App\Models\FilmRevenue;
use App\Models\FormatFilm;
use App\Models\ProductRevenue;
use App\Models\Revenue;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Screening;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Formatter;

class AdminController extends Controller
{
    public function homeAdmin() {
        return view('admin.home');
    }

    public function list($id) {
        $screening = Screening::where('id',$id)->first();
        $cinema = Room::where('id',$screening->room_id)->first();
        $belong_to = $cinema->cinema_id;
        $reven = Revenue::where('month','July')->where('year','2021')->where('cinema_id',$belong_to)->first();
        $total_revenue = floatval($reven->total_revenue + 90000);
        $reven_id = $reven->id;


        $film_reven = FilmRevenue::where('film_id',11)->where('revenue_id',$reven_id)->first();
        $film_revenue = floatval($film_reven->revenue + 90000);
        $a = DB::table('film_revenues')->where('film_id',11)->where('revenue_id',$reven_id)->first();

        $combo_reven = ProductRevenue::where('combo_id',1)->where('revenue_id',$reven_id)->first();
        $combo_revenue = floatval($combo_reven->revenue + (150000 - 50000));

        return response()->json($combo_revenue);
    }

    
    

}
