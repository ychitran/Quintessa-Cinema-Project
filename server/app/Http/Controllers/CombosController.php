<?php

namespace App\Http\Controllers;

use App\Models\Combo;
use Illuminate\Http\Request;

class CombosController extends Controller
{
    public function manageCombo()
	{
		$combos = Combo::paginate(10);
		return response()->json($combos);
	}

    // public function createCombo()
	// {
	// 	return view('admin.combo.addcombo');
	// }
	public function storeCombo(Request $request)
	{
		$combos = new Combo();
		$combos->product_name = $request->product_name;
		$combos->product_detail = $request->product_detail;
        $combos->product_image = $request->product_image;
        $combos->product_value = $request->product_value;
		$combos->save();

		return ;
	}
    public function editCombo($id) {
        $combo = Combo::findOrFail($id);
		return response()->json($combo);
    }

    public function updateCombo(Request $request, $id ) {
        $combo =  Combo::findOrFail($id);
        $combo->product_name = $request->product_name;
        $combo->product_detail = $request->product_detail;
        // if ($request->hasFile('image')) {
        //     $path = base64_encode(file_get_contents($request->file('image')));
        //     $combo->product_image = 'data:image/jpg;base64,'.$path;
        // }
        $combo->product_image = $request->product_image;
        $combo->product_value = $request->product_value;
        $combo->save();
        return ;
    }

    public function deleteCombo($id) {
        Combo::where('id',$id)->delete();
        return ;
    }
}
