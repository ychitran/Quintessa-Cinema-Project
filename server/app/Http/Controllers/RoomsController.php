<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    public function manageRoom()
	{	
		$rooms = Room::all();
		return response()->json($rooms);
	}

    public function createRoom()
	{
		$cinemas = Cinema::all();
		return view('admin.room.addroom', compact('cinemas'));
	}
	public function storeRoom(Request $request)
	{
		$rooms = new Room();
		$rooms->room_name = $request->room_name;
		$rooms->cinema_id = $request->cinema_id;
		$rooms->save();
		return redirect('admin/room');
	}

    public function editRoom($id)
	{
		$room = Room::findOrFail($id);
		return view('admin.room.edit', compact('room'));
	}
	public function updateRoom(Request $request,$id)
	{
		$rooms = Room::where('id' , $id)->update([
            'room_name' => $request->room_name,
		    'cinema_id' => $request->cinema_id,
        ]);
		return redirect('admin/room');
	}


	public function deleteRoom($id)
	{
		Room::where('id',$id)->delete();
		return redirect('admin/room');
	}
}
