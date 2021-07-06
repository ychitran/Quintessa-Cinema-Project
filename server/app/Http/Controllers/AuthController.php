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

    public function register(Request $request)
    {
        // $this->validate($request, [
        //     'password' => 'required|min:6',
        //     'repassword' => 'required|min:6|same:password'
        // ], [
        //     'repassword.same' => 'Bạn chưa nhập lại mật khẩu'
        // ]);
        $user = new User();
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone_number = $request->phone_number;
        $user->save();
        return ;
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $auth = Auth::user();
            return response()->json($auth) ;
        } else {
            $message = 'Tài khoản hoặc mật khẩu không đúng';
            return response()->json($message);
        }
    }

    public function checkUser() {
        if(Auth::check()) {
            $check = true;
        }else {
            $check = false;
        }
        
        return response()->json($check);
    }

    public function logout()
    {
        Auth::logout();
        $auth = 0;
        return response()->json($auth);
    }
}
