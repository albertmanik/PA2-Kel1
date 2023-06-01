<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $datas=$request->only('email', 'password');
        if(Auth::attempt(['roles' => 'admin','email' => $request->email,'password' => $request->password])) {
            
            $request->session()->regenerate();
            return redirect()->intended('/admin')->with('success', 'Login Berhasil');
        }

            $user = User::where('email',$request->email)->first();
            $user1 = User::where('email','!=',$request->email)->first();
            if($user){
                if (Hash::check($request->password, $user->password, [])) {
                    $request->session()->regenerate();
                    return redirect()->intended('/login');
                }else{
                    return back()->with('LoginError', 'Password yang anda masukkan salah!'); 
                }
            }else if($user1){
                if (Hash::check($request->password, $user1->password, [])) {
                    return back()->with('LoginError', 'Email yang anda masukkan salah!');
                }else{
                    return back()->with('LoginError', 'Email dan Password anda salah!');
                }
            }
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
