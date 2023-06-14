<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Toko;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('pages.admin.toko.main', compact('toko'));
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
        $request->validate([
            'nama_toko' => 'required|min:8',
            'alamat' => 'required|min:8',
            'no_rekening' => 'required|min:8',
        ]);

        $toko = new Toko;
        $toko->user_id = Auth::user()->id;
        $toko->nama_toko = $request->nama_toko;
        $toko->alamat = $request->alamat;
        $toko->no_rekening = $request->no_rekening;
        $toko->status = $request->status;
        $toko->save();
        return back()->with('success', 'Toko Berhasil Ditambahkan');
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
    public function edit(Toko $toko)
    {
        return view('pages.web.toko.create', ['data' => $toko]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Toko $store)
    {
        // dd($store);
        // $toko->user_id =  Auth::user()->id;
        $store->nama_toko = $request->nama_toko;
        $store->alamat = $request->alamat;
        $store->status = $request->status;
        $store->no_rekening = $request->no_rekening;
        // dd($toko);
        $store->update();
        return redirect()->route('store.index')->with('info', 'Toko Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Toko $store)
    {
        $store->delete();
        return back()->with('success', 'Berhasil Dihapus');
    }
}
