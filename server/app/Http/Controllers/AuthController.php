<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('auth.login');
    }

    public function registerPage()
    {
        return view('auth.register');
    }

    public function register(Request $request) {
        $this->validate($request,[
            'password'=>'required|min:6',
            'repassword'=>'required|min:6|same:password'
        ],[
            'repassword.same'=>'Bạn chưa nhập lại mật khẩu'
        ]);
        $user = new User();
        $user->full_name=$request->full_name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->phone_number=$request->phone_number;
        $user->save();
        return redirect()->route('cinema.loginpage');
    }

    public function login(Request $request)
    {
            $email =$request->email;
            $password=$request->password;
            if(Auth::attempt(['email'=>$email,'password'=>$password])){
            if(Auth::user()->role_id != null){
                return redirect('admin');
            }else {
            return redirect('/');
            }
        }else{
            return redirect()->route('cinema.loginpage');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
