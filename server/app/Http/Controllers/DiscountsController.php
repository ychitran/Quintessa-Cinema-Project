<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountsController extends Controller
{
    public function manageAds() {
        $discounts = Discount::all();
        return view('admin.manage.discount',compact('discounts'));
    }

    public function store(Request $request) {
        $discount = new Discount();
        $discount->infomation = $request->infomation;
        $discount->start_time = $request->start_time;
        $discount->end_time = $request->end_time;
        $discount->category_discount = $request->category_discount;
        $discount->discount_method = $request->discount_method;
        $discount->discount_value = $request->discount_value;
        $discount->save();
        return redirect('admin/discount');
    }

    public function create() {
        return view('admin.discount.create');
    }

	public function edit($id) {
		$discount = Discount::findOrFail($id);
		return view('admin.discount.edit',compact('discount'));
	}

	public function update($request, $id) {
		Discount::where('id',$id)->update([
		'infomation' => $request->infomation,
        'start_time' => $request->start_time,
        'end_time' => $request->end_time,
        'category_discount' => $request->category_discount,
        'discount_method' => $request->discount_method,
        'discount_value' => $request->discount_value
		]);
		return redirect('admin/discount');
	}

    public function delete($id){
        Discount::where('id',$id)->delete();
		return redirect('admin/discount');
    }
}
