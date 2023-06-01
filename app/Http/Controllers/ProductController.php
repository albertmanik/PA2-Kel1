<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;;
use App\Http\Controllers\Controller;
use App\Models\Subdistrict;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bouquet(Request $request)
    {
        $search = $request->search;
        $subdistricts = Subdistrict::all();
        $data = Product::where('category_id', 2)
        ->where(function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%')
            ->orWhere('harga', 'like', '%' . $search . '%')
            ->orWhere('deskripsi', 'like', '%' . $search . '%');
        });
            // $bouquet = Product::where('category_id', '2');
            if(isset($_GET['sort']) && !empty($_GET['sort'])){
                if($_GET['sort']=="LTH"){
                    $data->where('category_id','2')->orderBy('harga', 'ASC');
                } elseif($_GET['sort']=="HTL"){
                    $data->where('category_id','2')->orderBy('harga', 'DESC');
                }
            }
            elseif(isset($_GET['sorts']) && !empty($_GET['sorts'])){
                if($_GET['sorts']=="BLG"){
                    $data->where('kota','BLG');
                } elseif($_GET['sorts']=="LGB"){
                    $data->where('kota','LGB');
                } elseif($_GET['sorts']=="PRS"){
                    $data->where('kota','PRS');
                }
            }
            $bouquet = $data->paginate(8);
            $bouquet->appends($request->all());
            // $bouquet->appends($request->query('name', 'Bouquet'));
        return view('pages.web.bouquet.main', compact('bouquet','search','subdistricts'));

        // $data = Product::where('category_id',1)
        //     ->where('name', 'like', '%' . $search . '%')
        //     ->orWhere('harga', 'like', '%' . $search . '%')
        //     ->where('category_id',1)
        //     ->orWhere('deskripsi', 'like', '%' . $search . '%')
        //     ->where('category_id',1);
    }

    // public function sort(Request $request){
    //     $properties = $request->properties;
    //     if($request->filled('sorting')) {
    //         $sort = $request->get('sorting');
    //         if($sort=='harga_terendah'){
    //             $properties->orderByRaw('CAST(harga as DECIMAL(8,2)) DESC');
    //         }elseif($sort=='harga_tertinggi'){
    //             $properties->orderByRaw('CAST(harga as DECIMAL(8,2))','ASC');
    //         }
    //     }
    // }

    public function papanbunga(Request $request)
    {
        $search = $request->search;
            $data = Product::where('category_id', 1)
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('harga', 'like', '%' . $search . '%')
                ->orWhere('deskripsi', 'like', '%' . $search . '%');
            });

            if(isset($_GET['sort']) && !empty($_GET['sort'])){
                if($_GET['sort']=="LTH"){
                    $data->where('category_id','1')->orderBy('harga', 'ASC');
                } elseif($_GET['sort']=="HTL"){
                    $data->where('category_id','1')->orderBy('harga', 'DESC');
                }
            }
            elseif(isset($_GET['sorts']) && !empty($_GET['sorts'])){
                if($_GET['sorts']=="BLG"){
                    $data->where('kota','BLG');
                } elseif($_GET['sorts']=="LGB"){
                    $data->where('kota','LGB');
                } elseif($_GET['sorts']=="PRS"){
                    $data->where('kota','PRS');
                }
            }
            $pabung = $data->paginate(8);
            $pabung->appends($request->all());
            // $bouquet->appends($request->query('name', 'Bouquet'));
        return view('pages.web.papanbunga.main', compact('pabung'));
    }

    // public function sort_by(Request $request){
    //     if($request->sort_by == 'harga_terendah'){
    //         $bouquet = Product::orderBy('harga', 'asc')->get();
    //     }
    //     if($request->sort_by == 'harga_tertinggi'){
    //         $bouquet = Product::orderBy('harga', 'desc')->get();
    //     }
    //     return view('pages.web.bouquet.main', compact('bouquet'))->render();
    // }

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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}

// public function uploadImage(Request $request)
// {
//     // Validasi request
//     $request->validate([
//         'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
//     ]);

//     // Upload gambar ke storage
//     $path = $request->file('image')->store('public/images');

//     // Ambil nama file dari path
//     $filename = basename($path);

//     // Buat image dengan ukuran 600x780 pixels
//     $img = Image::make(Storage::url($path))->fit(600, 780);

//     // Simpan image ke storage dengan ukuran baru
//     Storage::put('public/images/'.$filename, $img->stream());

//     // Kembalikan response
//     return response()->json(['success' => 'Image uploaded successfully.']);
// }
