<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Toko;
use App\Models\User;
use App\Models\Product;
use App\Models\Checkout;
use App\Models\OrderDetail;
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

        // $menunggu = Checkout::where('status', 'menunggu')->count();
        // $terima = Checkout::where('status', 'terima')->count();
        // $tolak = Checkout::where('status', 'tolak')->count();
        // return view('pages.admin.home.home', compact('customer', 'penjual', 'products', 'menunggu', 'tolak', 'terima'));
        // $data = Checkout::select('tokos.id as toko_id', DB::raw('COUNT(*) as jumlah'))
        //     ->join('tokos', 'orders.toko_id', '=', 'tokos.id')
        //     ->groupBy('orders.toko_id')
        //     ->get();

        // // Mendapatkan daftar toko
        // $tokos = Toko::pluck('nama_toko', 'id')->toArray();

        // // Membuat data series
        // $seriesData = [];
        // foreach ($data as $item) {
        //     $tokoId = $item->toko_id;
        //     $jumlah = $item->jumlah;

        //     $seriesData[] = [
        //         'name' => $tokos[$tokoId],
        //         'data' => [$jumlah],
        //     ];
        // }

        $data = DB::table('orders')
            ->select(DB::raw("MONTH(created_at) as month, status, COUNT(*) as total"))
            ->groupBy('month', 'status')
            ->get();

        $chartData = [];
        $months = [];

        foreach ($data as $item) {
            $month = Carbon::createFromFormat('m', $item->month)->monthName;
            $status = $item->status;
            $total = $item->total;

            if (!isset($chartData[$month])) {
                $chartData[$month] = [
                    'name' => $month,
                    'data' => []
                ];
                $months[] = $month;
            }

            $chartData[$month]['data'][] = [
                'name' => $status,
                'y' => $total
            ];
        }


        $data = Checkout::select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month"), DB::raw('SUM(total) as total'))
            ->groupBy('month')
            ->get()
            ->pluck('total', 'month');

        return view('pages.admin.home.home', compact('customer', 'penjual', 'products', 'chartData', 'months', 'data'));
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
