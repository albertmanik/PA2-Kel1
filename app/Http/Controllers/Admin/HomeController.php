<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Product;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $customer = DB::table('model_has_roles')->where('role_id', '=', 2)->count();
        $penjual = DB::table('model_has_roles')->where('role_id', '=', 3)->count();
        $products = Product::count();

        $menunggu = Checkout::where('status', 'menunggu')->count();
        $terima = Checkout::where('status', 'terima')->count();
        $tolak = Checkout::where('status', 'tolak')->count();
        return view('pages.admin.home.home', compact('customer', 'penjual', 'products', 'menunggu', 'tolak', 'terima'));
    }

    // public function chartData()
    // {
    //     $statuses = Checkout::select('status', DB::raw('COUNT(*) as count'))
    //         ->groupBy('status')
    //         ->pluck('count', 'status')
    //         ->all();

    //     $chartData = [
    //         'statuses' => array_keys($statuses),
    //         'counts' => array_values($statuses)
    //     ];

    //     return response()->json($chartData);
    // }
}
