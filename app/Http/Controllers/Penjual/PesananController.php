<?php

namespace App\Http\Controllers\Penjual;

use App\Models\Checkout;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $list = DB::table('order_details')->paginate(10);
        // $list = Checkout::paginate(10);
        $user = Auth::user();
        // $list = Checkout::whereHas('orderDetails', function ($query) use ($user) {
        //     $query->whereHas('toko', function ($query) use ($user) {
        //         $query->where('user_id', $user->id);
        //     });
        // })->get();
        // $list = Checkout::all();
        $list = Checkout::whereHas('orderDetails.toko', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();
        // $list = Checkout::hydrate($list->toArray());

        return view('pages.web.pesanan.list', compact('list'));
    }

    public function accept(Checkout $checkout)
    {
        $checkout->status = 'terima';
        $checkout->save();
        return back()->with('success', 'Pesanan Berhasil Diterima');
    }
    public function reject(Checkout $checkout)
    {
        $checkout->status = 'tolak';
        $checkout->save();
        return back()->with('success', 'Pesanan Berhasil Ditolak');
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
