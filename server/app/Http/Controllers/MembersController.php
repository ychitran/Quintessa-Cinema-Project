<?php

namespace App\Http\Controllers;

use App\Models\TicketDetail;
use App\Models\User;
use Illuminate\Http\Request;

class MembersController extends Controller
{
	public function profileMember($id) {
		$member = User::where('id',$id)->first();
		return response()->json($member);
	}

	public function orderTicketOfMember($id) {
		$tickets = TicketDetail::where('ticket_details.user_id',$id)
		->leftJoin('screenings','ticket_details.screening_id','=','screenings.id')
        ->leftJoin('films','ticket_details.film_id','=','films.id')
        ->select('ticket_details.*','films.global_name as global_name','screenings.date as date','screenings.start_time as start_time')
        ->get();
		return response()->json($tickets);
	}

    public function manageMember()
	{
       $members = User::where('role_id',null)->get();
		return view('admin.manage.member',compact('members'));
	}

    public function createMember()
	{
		return view('admin.member.addmember');
	}
	public function storeStaff(Request $request)
	{
		$user = new User();
		$user->full_name = $request->full_name;
		$user->email = $request->email;
        $user->password = bcrypt('123456');
		$user->phone_number = $request->phone_number;
		$user->save();

		return redirect('admin/member');
	}
    public function editStaff($id) {
        $member = User::findOrFail($id);
		return view('admin.member.editmember',compact('member'));
    }

    public function updateMember(Request $request, $id ) {
        $user =  User::where('id',$id)->update([
		'full_name' => $request->full_name,
        
		'email' => $request->email,
                
		'phone_number' => $request->phone_number
		]);
        return redirect('admin/member');
    }

	public function deleteMember($id) {
		User::where('id',$id)->delete();
		return redirect('admin/member');
	}
}
