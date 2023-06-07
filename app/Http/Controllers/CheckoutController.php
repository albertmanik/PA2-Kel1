<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Checkout;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CheckoutDetail;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checkout = Checkout::all();
        return view('pages.web.checkout.main', compact('checkout'));
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
    public function checkout(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'image' => 'required',
            'name' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'ucapan' => 'required'
        ]);

        $userId = Auth::id();
        $cart = session()->get('cart.' . $userId);
        // ... Lakukan validasi, penghitungan total harga, dan operasi lain yang diperlukan sebelum checkout ...

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; // set karakter yang digunakan
        $order_number = 'QS' . substr(str_shuffle($characters), 0, 14);

        $checkout = new Checkout();
        $checkout->user_id = $userId;
        // $order->order_status = 'Pending';
        $checkout->total = 0;
        $checkout->order_number = $order_number;
        // $checkout->payment_method = $request->payment_method;

        // Contoh penghitungan total harga
        $totalPrice = 0;
        foreach ($cart as $item) {
            $product = Product::find($item['id']);

            if (!$product) {
                continue;
            }

            // Hitung total harga order
            $totalPrice += $product->harga * $item['quantity'];
        }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $namaFile = $file->getClientOriginalName();
            $tujuanFile = public_path('/payments');
            $file->move($tujuanFile, $namaFile);
            $checkout->image = $namaFile;
        }
        // Update total harga order
        // dd($request);
        $checkout->total = $totalPrice;
        $checkout->name = $request->name;
        $checkout->no_hp = $request->no_hp;
        $checkout->alamat = $request->alamat;
        $checkout->ucapan = $request->ucapan;
        $checkout->save();

        foreach ($cart as $item) {
            $product = Product::find($item['id']);

            if (!$product) {
                continue;
            }
            $order_detail = new OrderDetail();
            $order_detail->order_id = $checkout->id;
            $order_detail->category_id = $product->id;
            $order_detail->toko_id = $product->id;
            $order_detail->save();
        }

        // Hapus data cart setelah checkout
        session()->forget('cart.' . $userId);

        return back()->with('success', 'Checkout berhasil');
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
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function show(Checkout $checkout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkout $checkout)
    {
        return view('pages.web.checkout.edit', compact('checkout'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkout $checkout)
    {
        $request->validate([
            // 'image' => 'required',
            'name' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'ucapan' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $namaFile = $file->getClientOriginalName();
            $tujuanFile = public_path('/payments');
            $file->move($tujuanFile, $namaFile);
            $checkout->image = $namaFile;
        }
        // Update total harga order
        // dd($request);
        $checkout->name = $request->name;
        $checkout->no_hp = $request->no_hp;
        $checkout->alamat = $request->alamat;
        $checkout->ucapan = $request->ucapan;
        $checkout->save();
        return redirect()->route('pesanan.index')->with('info', 'Product Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkout $checkout)
    {
        //
    }
}
