<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subdistrict;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\User;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PapanBungaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $data = Product::where('category_id', 1)
            ->whereHas('toko', function ($query) {
                $query->where('status', 'aktif');
            })
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('harga', 'like', '%' . $search . '%')
                    ->orWhere('kota', 'like', '%' . $search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $search . '%');
            });
        if (isset($_GET['sort']) && !empty($_GET['sort'])) {
            if ($_GET['sort'] == "LTH") {
                $data->where('category_id', '1')->orderByRaw("CAST(harga AS DECIMAL(10, 2)) ASC")
                    ->get();
            } elseif ($_GET['sort'] == "HTL") {
                $data->where('category_id', '1')->orderByRaw("CAST(harga AS DECIMAL(10, 2)) DESC")
                    ->get();
            }
        } elseif (isset($_GET['sorts']) && !empty($_GET['sorts'])) {
            if ($_GET['sorts'] == "AJB") {
                $data->where('kota', 'Ajibata');
            } elseif ($_GET['sorts'] == "BLG") {
                $data->where('kota', 'Balige');
            } elseif ($_GET['sorts'] == "BNL") {
                $data->where('kota', 'Bonatua Lunasi');
            } elseif ($_GET['sorts'] == "BBR") {
                $data->where('kota', 'Borbor');
            } elseif ($_GET['sorts'] == "HBS") {
                $data->where('kota', 'Habinsaran');
            } elseif ($_GET['sorts'] == "LGB") {
                $data->where('kota', 'Laguboti');
            } elseif ($_GET['sorts'] == "LMJ") {
                $data->where('kota', 'Lumban Julu');
            } elseif ($_GET['sorts'] == "NS") {
                $data->where('kota', 'Nasau');
            } elseif ($_GET['sorts'] == "PRM") {
                $data->where('kota', 'Parmaksian');
            } elseif ($_GET['sorts'] == "PPM") {
                $data->where('kota', 'Pintu Pohan Meranti');
            } elseif ($_GET['sorts'] == "PRS") {
                $data->where('kota', 'Porsea');
            } elseif ($_GET['sorts'] == "SAN") {
                $data->where('kota', 'Siantar Narumonda');
            } elseif ($_GET['sorts'] == "SGM") {
                $data->where('kota', 'Sigumpar');
            } elseif ($_GET['sorts'] == "SLN") {
                $data->where('kota', 'Silaen');
            } elseif ($_GET['sorts'] == "TMP") {
                $data->where('kota', 'Tampahan');
            }
        }
        $pabung = $data->paginate(8);
        $pabung->appends($request->all());
        return view('pages.web.papanbunga.main', compact('pabung'));
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
        return view('pages.web.papanbunga.create', ['papanbunga' => new Product, 'toko' => $toko, 'category' => $category, 'subdistricts' => $subdistricts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        // ]);
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


        // Resize the image
        $gambarPath = $tujuanFile . '/' . $namaFile;
        $lebarBaru = 1512; // Lebar baru yang diinginkan
        $tinggiBaru = 1512; // Tinggi baru yang diinginkan

        Image::make($gambarPath)
            ->resize($lebarBaru, $tinggiBaru)
            ->save($gambarPath);

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
        return redirect()->route('papanbunga.index')->with('success', 'Product Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $papanbunga)
    {
        $category = Category::get();
        $review = Review::get();
        $papanbunga->load('toko');
        $reviewCount = Review::where('product_id', $papanbunga->id)->count();
        return view('pages.web.papanbunga.detail', ['product' => $papanbunga, 'category' => $category, 'review' => $review, 'reviewCount' => $reviewCount]);
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
        return view('pages.web.papanbunga.create', ['papanbunga' => $papanbunga, 'toko' => $toko, 'category' => $category, 'subdistricts' => $subdistricts]);
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
        // dd($bungapapan);
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

        return redirect()->route('papanbunga.index')->with('info', 'Product Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $papanbunga)
    {
        // $pabung = Product::find($id);
        $file_path = public_path('bungapapan/' . $papanbunga->gambar);
        unlink($file_path);
        $papanbunga->delete();
        // return redirect()->route('papanbunga.index')->with('success', 'Berhasil Di hapus');
        return response()->json([
            'alert' => 'reload',
            'message' => 'Berhasil menghapus Produk',
        ]);
    }
}
