<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Toko;
use App\Models\User;
use App\Models\Product;
use App\Models\Checkout;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Models\CheckoutDetail;
use App\Http\Controllers\Controller;
use App\Models\Subdistrict;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    private $message;
    public function __construct()
    {
        $this->message = [
            'image.required' => 'Gambar tidak boleh kosong',
            'name.required' => 'Nama tidak boleh kosong',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'kota.required' => 'Kota tidak boleh kosong',
            'no_hp.required' => 'Nomor telepon tidak boleh kosong',
            'no_hp.numeric' => 'Nomor telepon harus berupa angka',
            'no_hp.digits_between' => 'Nomor telepon harus berupa angka dan minimal 10 digit',
            'ucapan.required' => 'Ucapan tidak boleh kosong',
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checkout = Checkout::all();
        $toko = Toko::get();
        $subdistricts = Subdistrict::get();
        // $user = User::find(Auth::user()->id)->load('toko');
        // $toko = Toko::where('user_id', Auth::id())->first();

        // if ($toko) {
        //     $noRekening = $toko->no_rekening;
        // } else {
        //     $noRekening = 'Belum ada informasi nomor rekening';
        // }
        // $noRekening = Toko::where('user_id', Auth::id())
        //     ->value('no_rekening');

        return view('pages.web.checkout.main', compact('checkout', 'toko', 'subdistricts'));
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
            'kota' => 'required',
            'no_hp' => 'required|numeric|digits_between:10,15',
            'ucapan' => 'required'
        ], $this->message);

        $userId = Auth::id();
        $cart = session()->get('cart.' . $userId);
        // ... Lakukan validasi, penghitungan total harga, dan operasi lain yang diperlukan sebelum checkout ...

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; // set karakter yang digunakan
        $order_number = 'PA' . substr(str_shuffle($characters), 0, 14);

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
        $checkout->toko_id = $product->toko_id;
        $checkout->product_id = $product->id;
        $checkout->name = $request->name;
        $checkout->no_hp = $request->no_hp;
        $checkout->kota = $request->kota;
        $checkout->pembayaran = $request->pembayaran;
        $checkout->alamat = $request->alamat;
        $checkout->ucapan = $request->ucapan;
        // dd($checkout);
        $checkout->save();

        foreach ($cart as $item) {
            $product = Product::find($item['id']);

            if (!$product) {
                continue;
            }
            $order_detail = new OrderDetail();
            $order_detail->order_id = $checkout->id;
            $order_detail->category_id = $product->category_id;
            $order_detail->toko_id = $product->toko_id;
            // dd($order_detail);
            $order_detail->save();
        }

        // Hapus data cart setelah checkout
        session()->forget('cart.' . $userId);

        // Menghitung total jumlah produk dalam keranjang
        $totalCartItems = count(array_values($cart));
        // Menyimpan total jumlah produk dalam keranjang ke session
        session()->put('totalCartItems.' . $userId, $totalCartItems);

        return redirect()->route('pesanan.index')->with('success', 'Checkout berhasil');
    }

    public function pdf($id)
    {
        $order = Checkout::findOrFail($id);
        $pdf = PDF::loadView('pages.web.pesanan.pdf', compact('order'));
        return $pdf->download('order.pdf');
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
        $subdistricts = Subdistrict::get();
        return view('pages.web.checkout.edit', compact('checkout', 'subdistricts'));
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
        $checkout->pembayaran = 'Full';
        $checkout->no_hp = $request->no_hp;
        $checkout->alamat = $request->alamat;
        $checkout->ucapan = $request->ucapan;
        // dd($checkout);
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
