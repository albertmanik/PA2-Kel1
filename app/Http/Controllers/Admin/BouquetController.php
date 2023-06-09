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

class BouquetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::where('category_id', 2)
            ->whereHas('toko', function ($query) {
                $query->where('status', 'aktif');
            });
        $bouquet = $data->paginate(8);
        return view('pages.admin.bouquet.main', compact('bouquet'));
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
        return view('pages.admin.bouquet.create', ['bouquet' => new Product, 'toko' => $toko, 'category' => $category, 'subdistricts' => $subdistricts]);
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
        $tujuanFile = public_path('/bouquets');
        $file->move($tujuanFile, $namaFile);

        $bouquet = new Product;
        $bouquet->user_id = Auth::user()->id;
        $bouquet->category_id = $request->category_id;
        // check if user has toko
        $user = User::find(Auth::user()->id)->load('toko');
        $bouquet->toko_id = $user->toko->id;
        $bouquet->name = $request->name;
        $bouquet->harga = $request->harga;
        $bouquet->kota = $request->kota;
        $bouquet->deskripsi = $request->deskripsi;
        $bouquet->no_hp = $request->no_hp;
        $bouquet->gambar = $namaFile;

        $bouquet->save();
        return redirect()->route('admin.bouquet')->with('success', 'Product Berhasil Ditambah');
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
    public function edit(Product $bouquet)
    {
        $toko = Toko::get();
        $category = Category::get();
        $subdistricts = Subdistrict::get();
        return view('pages.admin.bouquet.create', ['bouquet' => $bouquet, 'toko' => $toko, 'subdistricts' => $subdistricts, 'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $bouquet)
    {
        $request->validate([
            'name' => 'required',
            'harga' => 'required',
            'kota' => 'required',
            'deskripsi' => 'required',
            'no_hp' => 'required',
            'gambar' => 'nullable||mimes:jpg,jpeg,png',
        ]);
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $namaFile = $file->getClientOriginalName();
            $tujuanFile = public_path('/bouquets');
            $file->move($tujuanFile, $namaFile);
            $bouquet->gambar = $namaFile;
        }
        $bouquet->category_id = $request->category_id;
        $user = User::find(Auth::user()->id)->load('toko');
        $bouquet->toko_id = $user->toko->id;;
        $bouquet->name = $request->name;
        $bouquet->harga = $request->harga;
        $bouquet->kota = $request->kota;
        $bouquet->deskripsi = $request->deskripsi;
        $bouquet->no_hp = $request->no_hp;
        $bouquet->save();

        return redirect()->route('admin.bouquet')->with('info', 'Product Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $bouquet)
    {
        $file_path = public_path('bouquets/' . $bouquet->gambar);
        unlink($file_path);
        $bouquet->delete();
        return redirect()->route('admin.bouquet')->with('success', 'Berhasil Di hapus');
    }
}
