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
    public function listRemarkable(){
        $remarkable = Remarkable::all();
        return response()->json($remarkable);
    }

    public function createRemarkable($category) {
        if($category == 'film') {
            $list_of_category = Film::all();
        }elseif($category == 'combo') {
            $list_of_category = Combo::all();
        } else {
            $list_of_category = Discount::all();
        };
        return response()->json($list_of_category);
    }

    public function storeRemarkable(Request $request) {
        $remarkable = new Remarkable();
        $remarkable->film_id = $request->film_id;

        if ($request->hasFile('poster')) {
            $path = base64_encode(file_get_contents($request->file('poster')));
            $remarkable->poster = 'data:image/jpg;base64,'.$path;
        }

		if ($request->hasFile('banner')) {
            $path = base64_encode(file_get_contents($request->file('banner')));
            $remarkable->banner = 'data:image/jpg;base64,'.$path;
        }
        $remarkable->combo_id = $request->combo_id;
        $remarkable->discount_id = $request->discount_id;
        $remarkable->categories = $request->categories;
        $remarkable->status = $request->status;
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
