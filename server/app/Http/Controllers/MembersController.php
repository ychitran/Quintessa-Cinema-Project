<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MembersController extends Controller
{
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
