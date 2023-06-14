<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->hasRole('admin')) {
                return redirect()->intended('/admin/home')->with('success', 'Login Berhasil');
            } elseif (Auth::user()->hasRole('penjual')) {
                return redirect()->intended('/penjual/home')->with('success', 'Login Berhasil');
            } else {
                return redirect()->intended('/')->with('success', 'Login Berhasil');
            }
        }

        $user = User::where('email', $request->email)->first();
        $user1 = User::where('email', '!=', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password, [])) {
                $request->session()->regenerate();
                return redirect()->intended('/login');
            } else {
                return back()->with('LoginError', 'Password yang anda masukkan salah!');
            }
        } else if ($user1) {
            if (Hash::check($request->password, $user1->password, [])) {
                return back()->with('LoginError', 'Email yang anda masukkan salah!');
            } else {
                return back()->with('LoginError', 'Email dan Password anda salah!');
            }
        }

        // $user = User::where('email', $request->email)->first();

        // if ($user) {
        //     if (Hash::check($request->password, $user->password)) {
        //         $request->session()->regenerate();
        //         return redirect()->intended('/login');
        //     } else {
        //         return back()->with('LoginError', 'Password yang Anda masukkan salah!');
        //     }
        // } else {
        //     return back()->with('LoginError', 'Email yang Anda masukkan salah!');
        // }



        // if ($validator->fails()) {
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => $validator->errors()->first(),
        //     ]);
        // }

        // if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        //     return response()->json([
        //         'status' => 'success',
        //         'message' => 'Welcome Back ' . Auth::guard('web')->user()->username,
        //         'redirect' => 'reload',
        //     ]);
        // } else {
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'Wrong Password',
        //         'redirect' => 'reload',
        //     ]);
        // }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Berhasil Logout');
    }
}
