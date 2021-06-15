<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class StaffsController extends Controller
{
    public function manageStaff()
	{
        $role = auth()->user()->role_id;
        if($role == 1) {
            $staffs = User::where('role_id','<>',1)->where('role_id','<>',null)->get(); 
        } elseif($role == 2) {
            $staffs = User::where('role_id',3)->first();
        }
		return view('admin.manage.staff',compact('staffs'));
	}

    public function createStaff()
	{
		$user_role = auth()->user()->role_id;
        if($user_role == 2) {
            $roles = Role::where('id',3)->get();
        }else {
			$roles = Role::all();
		}
		$cinemas = Cinema::all();

		return view('admin.staff.addstaff',compact('roles','cinemas'));
	}
	public function storeStaff(Request $request)
	{
		$user = new User();
		$user->full_name = $request->full_name;
		$user->email = $request->email;
        $user->password = bcrypt('123456');
		$user->phone_number = $request->phone_number;
		$user->role_id = $request->role_id;
		$user->cinema_id = $request->cinema_id;

		$user->save();

		return redirect('admin/staff');
	}
    public function editStaff($id) {
        $staff = User::findOrFail($id);
		$cinemas = Cinema::all();
		$user_role = auth()->user()->role_id;
        if($user_role == 2) {
            $roles = Role::where('id',3)->get();
        }else {
			$roles = Role::all();
		}
		return view('admin.staff.editstaff',compact('staff','cinemas','roles'));
    }

    public function updateStaff(Request $request, $id ) {
        $user =  User::where('id',$id)->update([
		'full_name' => $request->full_name,
        
		'email' => $request->email,
                
		'phone_number' => $request->phone_number,
        
		'role_id' => $request->role_id,
		
		'cinema_id' => $request->cinema_id,
		]);
        return redirect('admin/staff');
    }

	public function deleteStaff($id) {
		User::where('id',$id)->delete();
		return redirect('admin/staff');
	}
}
