<?php

namespace App\Http\Controllers\Admin;

use App\Models\Toko;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subdistrict;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PapanBungaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::where('category_id', 1)
            ->whereHas('toko', function ($query) {
                $query->where('status', 'aktif');
            });
        $papanbunga = $data->paginate(8);
        return view('pages.admin.papanbunga.main', compact('papanbunga'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $toko = Toko::get();
        $category = Category::get();
        $subdistricts = Subdistrict::get();
        return view('pages.admin.papanbunga.create', ['papanbunga' => new Product, 'toko' => $toko, 'category' => $category, 'subdistricts' => $subdistricts]);
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
            'name' => 'required',
            'category_id' => 'required',
            'toko_id' => 'required',
            'harga' => 'required',
            'kota' => 'required',
            'deskripsi' => 'required',
            'no_hp' => 'required',
            'gambar' => 'required||mimes:jpg,jpeg,png',
        ]);

        $file = $request->file('gambar');
        $namaFile = $file->getClientOriginalName();
        $tujuanFile = public_path('/bungapapan');
        $file->move($tujuanFile, $namaFile);


        $pabung = new Product;
        $pabung->user_id = Auth::user()->id;
        $pabung->category_id = $request->category_id;
        // check if user has toko
        $user = User::find(Auth::user()->id)->load('toko');
        $pabung->toko_id = $user->toko->id;
        $pabung->name = $request->name;
        $pabung->harga = $request->harga;
        $pabung->kota = $request->kota;
        $pabung->deskripsi = $request->deskripsi;
        $pabung->no_hp = $request->no_hp;
        $pabung->gambar = $namaFile;
        // dd($request);

        $pabung->save();
        return redirect()->route('admin.papanbunga')->with('success', 'Product Berhasil Ditambah');
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
    public function edit(Product $papanbunga)
    {
        $toko = Toko::get();
        $category = Category::get();
        $subdistricts = Subdistrict::get();
        return view('pages.admin.papanbunga.create', ['papanbunga' => $papanbunga, 'toko' => $toko, 'category' => $category, 'subdistricts' => $subdistricts]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $papanbunga)
    {
        $request->validate([
            'name' => 'required',
            'harga' => 'required',
            'kota' => 'required',
            'deskripsi' => 'required',
            'no_hp' => 'required',
            'gambar' => 'nullable|mimes:jpg,jpeg,png',
        ]);
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = $file->getClientOriginalName();
            $tujuanFile = public_path('/bungapapan');
            $file->move($tujuanFile, $namaFile);
            $papanbunga->gambar = $namaFile;
        }
        $papanbunga->category_id = $request->category_id;
        $user = User::find(Auth::user()->id)->load('toko');
        $papanbunga->toko_id = $user->toko->id;
        $papanbunga->name = $request->name;
        $papanbunga->harga = $request->harga;
        $papanbunga->kota = $request->kota;
        $papanbunga->deskripsi = $request->deskripsi;
        $papanbunga->no_hp = $request->no_hp;
        // dd($papanbunga);
        $papanbunga->save();

        return redirect()->route('admin.papanbunga')->with('info', 'Product Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $papanbunga)
    {
        $file_path = public_path('bungapapan/' . $papanbunga->gambar);
        unlink($file_path);
        $papanbunga->delete();
        return redirect()->route('admin.papanbunga')->with('success', 'Berhasil Di hapus');
    }
}
