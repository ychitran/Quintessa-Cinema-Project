<?php

namespace App\Http\Controllers;

use App\Models\TicketPrice;
use Illuminate\Http\Request;

class TicketPriceController extends Controller
{
    public function managePrice()
	{
        $prices = TicketPrice::all();
		return view('admin.manage.ticket-price',compact('prices'));
	}

    public function create()
	{

	}
	public function storeStaff(Request $request)
	{
	}
    public function edit($id) {
        $price = TicketPrice::findOrFail($id);
		return view('admin.ticket-price.edit',compact('price'));
    }

    public function update(Request $request, $id ) {
        $price =  TicketPrice::where('id',$id)->update([
		'normal_price' => $request->normal_price,
        
		'member_price' => $request->member_price,
                
		'weekend_price' => $request->weekend_price,
        
		'holiday_price' => $request->holiday_price,
		
		]);
        return redirect('admin/ticket-price');
    }

	public function deleteStaff($id) {
	}
}
