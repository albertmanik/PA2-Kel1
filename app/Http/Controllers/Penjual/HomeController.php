<?php

namespace App\Http\Controllers\Penjual;

use Carbon\Carbon;
use App\Models\Checkout;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();

        // Menghitung tanggal mulai dan akhir minggu ini
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        $data = Checkout::select('tokos.id as toko_id', 'orders.status', DB::raw('COUNT(*) as jumlah'))
            ->join('tokos', 'orders.toko_id', '=', 'tokos.id')
            ->where('tokos.user_id', $user_id)
            ->whereBetween('orders.created_at', [$startOfWeek, $endOfWeek])
            ->groupBy('tokos.id', 'orders.status')
            ->get();

        // Membuat objek untuk menyimpan data per minggu untuk setiap toko
        $tokoData = [];

        // Mengelompokkan data berdasarkan minggu, toko_id, dan status
        foreach ($data as $item) {
            $toko_id = $item->toko_id;
            $status = $item->status;
            $jumlah = $item->jumlah;

            if (!isset($tokoData[$toko_id])) {
                $tokoData[$toko_id] = [];
            }

            if (!isset($tokoData[$toko_id][$status])) {
                $tokoData[$toko_id][$status] = [];
            }

            $tokoData[$toko_id][$status][] = $jumlah;
        }

        // Mendapatkan daftar toko
        $tokos = array_keys($tokoData);

        // Mendefinisikan daftar status
        $statuses = ['menunggu', 'terima', 'tolak'];

        // Membuat data series untuk setiap minggu dan status
        $seriesData = [];

        foreach ($statuses as $status) {
            $data = [];

            foreach ($tokos as $toko) {
                $jumlahs = $tokoData[$toko][$status] ?? [];
                $total = array_sum($jumlahs);
                $data[] = $total;
            }

            $seriesData[] = [
                'name' => ucfirst($status),
                'data' => $data,
            ];
        }

        // ...

        // Membuat data array untuk minggu-minggu pada sumbu x
        $weeks = [];

        $date = clone $startOfWeek;
        $endDate = clone $endOfWeek;

        while ($date <= $endDate) {
            $weekStart = $date->format('d M');
            $weekEnd = $date->copy()->endOfWeek()->format('d M');
            $weeks[] = $weekStart . ' - ' . $weekEnd;
            $date->addWeek();
        }

        return view('pages.penjual.home', compact('weeks', 'seriesData', 'tokos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
