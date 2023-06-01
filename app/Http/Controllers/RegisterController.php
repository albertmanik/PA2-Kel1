<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        $role = Role::where('name', '!=', 'Admin')->get();
        return view('auth.register', compact('role'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|min:5',
            'email' => 'required|email:dns|unique:users',
            'no_telp' => 'required|min:5',
            'password' => 'required',
            'role_id' => 'required'
        ], [
            'role_id.required' => 'The role field is required.'

        ]);

        // if ($validator->fails()) {
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => $validator->errors()->first(),
        //         // 'redirect' => 'reload'
        //     ]);
        // }

        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->no_telp = $request->no_telp;
        $user->password = Hash::make($request->password);
        if ($request->role_id == 2) {
            $user->assignRole('customer');
        } else {
            $user->assignRole('penjual');
        }
        // dd($user);
        // return response()->json([
        //     'status' => 'success',
        //     'message' => 'Berhasil mendaftar, Silahkan Login',
        //     'redirect' => '/login',
        // ]);
        $user->save();
        return redirect('/login')->with('success', 'Registrasi Berhasil, Silahkan Login');
    }
}
