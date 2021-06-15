<?php

namespace App\Http\Controllers;

use App\Models\Combo;
use Illuminate\Http\Request;

class CombosController extends Controller
{
    public function manageCombo()
	{
		$combos = Combo::paginate(10);
		return view('admin.manage.combo',compact('combos'));
	}

    public function createCombo()
	{
		return view('admin.combo.addcombo');
	}
	public function storeCombo(Request $request)
	{
		$combos = new Combo();
		$combos->product_nanme = $request->product_nanme;
		$combos->product_detail = $request->product_detail;
        if ($request->hasFile('image')) {
            $path = base64_encode(file_get_contents($request->file('image')));
            $combos->product_image = 'data:image/jpg;base64,'.$path;
        }
        $combos->product_value = $request->product_value;
		$combos->save();

		return redirect("admin/combo");
	}
    public function editCombo($id) {
        $combo = Combo::findOrFail($id);
		return view('admin.combo.editcombo',compact('combo'));
    }

    public function updateCombo(Request $request, $id ) {
        $combo =  Combo::findOrFail($id);
        $combo->product_nanme = $request->product_nanme;
        $combo->product_detail = $request->product_detail;
        if ($request->hasFile('image')) {
            $path = base64_encode(file_get_contents($request->file('image')));
            $combo->product_image = 'data:image/jpg;base64,'.$path;
        }
        $combo->product_value = $request->product_value;
        $combo->save();
        return redirect("admin/combo");
    }

    public function deleteCombo($id) {
        Combo::where('id',$id)->delete();
        return redirect('admin/combo');
    }
}
