<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Models\User;
use App\Models\Review;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subdistrict;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BouquetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $data = Product::where('category_id', 2)
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
                $data->where('category_id', '2')->orderByRaw("CAST(harga AS DECIMAL(10, 2)) ASC")
                    ->get();
            } elseif ($_GET['sort'] == "HTL") {
                $data->where('category_id', '2')->orderByRaw("CAST(harga AS DECIMAL(10, 2)) DESC")
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
        $bouquet = $data->paginate(8);
        $bouquet->appends($request->all());
        return view('pages.web.bouquet.main', compact('bouquet'));
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
        return view('pages.web.bouquet.create', ['bouquet' => new Product, 'toko' => $toko, 'category' => $category, 'subdistricts' => $subdistricts]);
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
        $tujuanFile = public_path('/bouquets');
        $file->move($tujuanFile, $namaFile);

        // Resize the image
        $gambarPath = $tujuanFile . '/' . $namaFile;
        $lebarBaru = 1512; // Lebar baru yang diinginkan
        $tinggiBaru = 1512; // Tinggi baru yang diinginkan

        Image::make($gambarPath)
            ->resize($lebarBaru, $tinggiBaru)
            ->save($gambarPath);
        // dd($lebarBaru, $tinggiBaru);


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
        return redirect()->route('bouquet.index')->with('success', 'Product Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $bouquet)
    {
        $toko = Toko::get();
        $category = Category::get();
        $review = Review::paginate(7);
        $bouquet->load('toko');
        $reviewCount = Review::where('product_id', $bouquet->id)->count();
        return view('pages.web.bouquet.detail', ['bouquet' => $bouquet, 'toko' => $toko, 'category' => $category, 'review' => $review, 'reviewCount' => $reviewCount]);
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
        return view('pages.web.bouquet.create', ['bouquet' => $bouquet, 'toko' => $toko, 'subdistricts' => $subdistricts, 'category' => $category]);
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
        // dd($bouquet);
        $bouquet->save();

        return redirect()->route('bouquet.index')->with('info', 'Product Berhasil Diubah');
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
        // return redirect()->route('bouquet.index')->with('success', 'Berhasil Di hapus');
        return response()->json([
            'alert' => 'reload',
            'message' => 'Berhasil menghapus Produk',
        ]);
    }
}
