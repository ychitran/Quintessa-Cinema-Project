<?php

namespace App\Http\Controllers;

use App\Models\Combo;
use App\Models\Discount;
use App\Models\FilmRevenue;
use App\Models\ProductRevenue;
use App\Models\Revenue;
use App\Models\Screening;
use App\Models\Seat;
use App\Models\TicketDetail;
use App\Models\TicketPrice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;

class OrderTicketController extends Controller
{
    public function getScreeningDate($id)
    {
        $screenings = Screening::where('film_id', $id)->get();
        return response()->json($screenings);
    }
    public function getScreeningTime($date)
    {
        $screenings = Screening::where('date', $date)->get();
        return response()->json($screenings);
    }
    public function getProviderOfOrderTicket()
    {
        $combos = Combo::all();
        $discounts = Discount::all();
        $prices = TicketPrice::all();
        return response()->json([
            'combos' => $combos,
            'discounts' => $discounts,
            'prices' => $prices
        ]);
    }


    public function getSeat($room_id, $screening_id)
    {
        $seats = Seat::select('row')
            ->where('room_id', $room_id)
            ->groupBy('row')
            ->distinct()
            ->get();

        for ($i = 0; $i < count($seats); $i++) {
            $seat = Seat::where([['room_id', $room_id], ['row', $seats[$i]->row]])
                ->leftJoin('orders', function ($join) use ($screening_id) {
                    $join->on('orders.seat_id', '=', 'seats.id')
                        ->where('orders.screening_id', '=', $screening_id);
                })
                ->select('seats.*', 'orders.screening_id as screening_id')
                ->get();

            $seats[$i]['number'] = $seat;
        }
        return response()->json($seats);
    }

    public function storeOrderTicket(Request $request)
    {

        


        $ticket = new TicketDetail();

        $ticket->seats        = $request->seats;
        $ticket->phone_number = $request->phone_number;
        $ticket->user_id      = $request->user_id;
        $ticket->screening_id = $request->screening_id;
        $ticket->combo_id     = $request->combo_id;
        $ticket->discount_id  = $request->discount_id;
        $ticket->status       = $request->status;
        $ticket->ticket_price = $request->ticket_price;
        $ticket->total_price  = $request->total_price;
        $ticket->film_id      = $request->film_id;
        $ticket->save();

        // $seats = explode(" ",$request->seats);
        for($i = 0; $i< count($request->seat_id);$i++) {
            DB::table('orders')->insert([
                "screening_id" => $request->screening_id,
                "seat_id" =>$request->seat_id[$i],
                "user_id" => $request->user_id
            ]);
        }

        $member = User::where('id', $request->user_id)->first();
        $point = $member->cinema_point;
        DB::table('users')->where('id', $request->user_id)->update([
            'cinema_point' => floatval($point + ($request->ticket_price / 10))
        ]);


        //revenue for month
        // $orderdate = strtotime($request->order_date);
        // $screening = Screening::where('id', $request->screening_id)->first();
        // $belong_to = $request->cinema_id;

        // $month = date('M', $orderdate);
        // $year = date('Y',$orderdate);

        // $reven = Revenue::where('month',$month)->where('year',$year)->where('cinema_id',$belong_to)->first();
        // $reven_id = $reven->id;
        // $total_revenue = floatval($reven->total_revenue + $request->total_price);
        // DB::table('revenues')->where('month',$month)->where('year',$year)->where('cinema_id',$belong_to)->update([
        //     "total_revenue" => $total_revenue
        // ]);

        // //revenue film
        // $film_reven = FilmRevenue::where('film_id',$request->film_id)->where('revenue_id',$reven_id)->first();
        // $film_revenue = floatval($film_reven->revenue + $request->ticket_price);
        // DB::table('film_revenues')->where('film_id',$request->film_id)->where('revenue_id',$reven_id)->update([
        //     "revenue" => $film_revenue
        // ]);

        //revenue combo
        // $combo_reven = ProductRevenue::where('combo_id',$request->combo_id)->where('revenue_id',$reven_id)->first();
        // $combo_revenue = floatval($combo_reven->revenue + ($request->total_price - $request->ticket_price));
        // DB::table('product_revenues')->where('combo_id',$request->film_id)->where('revenue_id',$reven_id)->update([
        //     "revenue" => $combo_revenue
        // ]);

        //revenue 
        return ;
    }
}
