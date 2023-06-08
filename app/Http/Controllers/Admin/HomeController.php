<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $customer = DB::table('model_has_roles')->where('role_id', '=', 2)->count();
        $penjual = DB::table('model_has_roles')->where('role_id', '=', 3)->count();
        $products = Product::count();
        return view('pages.admin.home.home', compact('customer', 'penjual', 'products'));
    }
}
