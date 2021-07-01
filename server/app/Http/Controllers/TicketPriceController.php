<?php

namespace App\Http\Controllers;

use App\Models\TicketPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketPriceController extends Controller
{
    public function managePrice()
	{
        $prices = DB::table('ticket_prices')
		->leftJoin('format_films','ticket_prices.format_id','=','format_films.id')
		->select('ticket_prices.*','format_films.format_name as format_name')
		->get();
		return response()->json($prices);
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
