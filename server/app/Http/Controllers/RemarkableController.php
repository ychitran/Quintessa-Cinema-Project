<?php

namespace App\Http\Controllers;

use App\Models\Combo;
use App\Models\Discount;
use App\Models\Film;
use App\Models\Remarkable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RemarkableController extends Controller
{
    public function enableRemarkable($id,$status) {
        if($status == 0) {
            DB::table('remarkables')->where('id',$id)->update([
                'status' => 1,  
            ]);
            $res = true;
        } else {
            DB::table('remarkables')->where('id',$id)->update([
                'status' => 0,
            ]);
            $res = false;
        };
        
        return response()->json($res);
    }

    public function getRemarkable() {
        $remarkable = Remarkable::where('remarkables.status',1)
        ->leftJoin('films','remarkables.film_id','=','films.id')
        ->select('remarkables.*','films.global_name as film_name')
        ->get();
        return response()->json($remarkable);
    }

    public function listRemarkable(){
        $remarkable = DB::table('remarkables')
        ->leftJoin('films','remarkables.film_id','=','films.id')
        ->leftJoin('combos','remarkables.combo_id','=','combos.id')
        ->leftJoin('discounts','remarkables.discount_id','=','discounts.id')
        ->select('remarkables.*','films.global_name as film_name','combos.product_name as combo_name','discounts.information as information')
        ->get()
        ;
        return response()->json($remarkable);
    }

    public function createRemarkable() {
        $list_of_category = Film::all();
        // if($category == 'film') {
        //     $list_of_category = Film::all();
        // }elseif($category == 'combo') {
        //     $list_of_category = Combo::all();
        // } else {
        //     $list_of_category = Discount::all();
        // };
        return response()->json($list_of_category);
    }

    public function storeRemarkable(Request $request) {
        $remarkable = new Remarkable();
        $remarkable->film_id = $request->film_id;
        $remarkable->banner->$request->banner;
        $remarkable->status = $request->status;

        // $remarkable->poster->$request->poster;
        // $remarkable->combo_id = $request->combo_id;
        // $remarkable->discount_id = $request->discount_id;
        // $remarkable->categories = $request->categories;
        $remarkable->save();
        
        return;

    }

    public function editRemarkable($id) {
        $remarkable = Remarkable::findOrFail($id);
        return response()->json($remarkable);
    }

    public function updateRemarkable($id,$status) {
        if($status = 0) {
            DB::table('remarkables')->where('id',$id)->update([
                'status'=> 1
            ]);
        } else{
            DB::table('remarkables')->where('id',$id)->update([
                'status'=> 0
            ]);
        }
    }

    public function deleteRemarkable($id){
        Remarkable::where('id',$id)->delete();
        return;
    }
}
