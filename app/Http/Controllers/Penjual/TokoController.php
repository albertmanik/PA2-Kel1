<?php

namespace App\Http\Controllers\Penjual;

use App\Models\Toko;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toko = Toko::paginate(10);
        return view('pages.web.toko.main', compact('toko'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.web.toko.create', ['toko' => new Toko]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validators = Validator::make($request->all(), [
        //     // 'status' => 'required',
        //     // 'total_produk' => 'required'
        // ]);
        $request->validate([
            'nama_toko' => 'required|min:8',
            'alamat' => 'required|min:8',
            'no_rekening' => 'required|min:8',
        ]);

        // if ($validators->fails()) {
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => $validators->errors()->first(),
        //     ]);
        // }

        // if ($validators->fails()) {
        //     $errors = $validators->errors();
        //     if ($errors->has('nama_toko')) {
        //         return response()->json([
        //             'status' => 'error',
        //             'message' => $errors->first('nama_toko'),
        //         ]);
        //     } elseif ($errors->has('alamat')) {
        //         return response()->json([
        //             'status' => 'error',
        //             'message' => $errors->first('alamat'),
        //         ]);
        //     }
        // }

        $toko = new Toko;
        $toko->user_id = Auth::user()->id;
        $toko->nama_toko = $request->nama_toko;
        $toko->alamat = $request->alamat;
        $toko->no_rekening = $request->no_rekening;
        // $toko->status =$request->status;
        $toko->save();
        return redirect()->route('toko.index')->with('success', 'Toko Berhasil Ditambahkan');
        // return response()->json([
        //     'alert' => 'success',
        //     'message' => 'Berhasil Menambahkan Toko',
        //     'redirect' => '/penjual/toko'
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Toko $toko)
    {
        $toko->load('products');
        // dd($toko);
        return view('pages.web.toko.detail', ['toko' => $toko]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Toko $toko)
    {
        return view('pages.web.toko.create', ['toko' => $toko]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Toko $toko)
    {
        // $validators = Validator::make($request->all(), [
        //     'nama_toko' => 'required',
        //     'alamat' => 'required',
        // ]);
        $request->validate([
            'nama_toko' => 'required',
            'alamat' => 'required',
            'no_rekening' => 'required',
            // 'status' => 'required',
        ]);

        // if ($validators->fails()) {
        //     $errors = $validators->errors();
        //     if ($errors->has('nama_toko')) {
        //         return response()->json([
        //             'status' => 'error',
        //             'message' => $errors->first('nama_toko'),
        //         ]);
        //     } elseif ($errors->has('alamat')) {
        //         return response()->json([
        //             'status' => 'error',
        //             'message' => $errors->first('alamat'),
        //         ]);
        //     }
        // }

        $toko->nama_toko = $request->nama_toko;
        $toko->alamat = $request->alamat;
        $toko->no_rekening = $request->no_rekening;
        // dd($toko);
        // $toko->status = $request->status;
        $toko->save();
        return redirect()->route('toko.index')->with('info', 'Toko Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Toko $toko)
    {
        $toko->delete();
        return redirect()->route('toko.index')->with('success', 'Berhasil Di hapus');
    }
}
