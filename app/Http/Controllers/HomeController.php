<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $data = Product::with('toko')->whereHas('toko', function ($query) {
            $query->where('tokos.status', '=', 'Aktif');
        })
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('harga', 'like', '%' . $search . '%')
                    ->orWhere('kota', 'like', '%' . $search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $search . '%');
            });
        $product = $data->paginate(12);
        $product_populer = Product::with('toko')->orderBy('total_rating', 'desc')->paginate(4);
        // dd($product);
        // $product = $produk->paginate(8);
        // $reviewCount = Review::where('product_id', $product->id)->count();
        // $rating = Review::where('product_id', $product->id)->avg('rating');
        return view('pages.web.home.home', compact('product', 'product_populer'));
    }

    public function bouquet(Request $request)
    {
        $search = $request->search;
        $data = Product::where('category_id', 2)
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('harga', 'like', '%' . $search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $search . '%');
            });
        // $bouquet = Product::where('category_id', '2');
        if (isset($_GET['sort']) && !empty($_GET['sort'])) {
            if ($_GET['sort'] == "LTH") {
                $data->where('category_id', '2')->orderBy('harga', 'ASC');
            } elseif ($_GET['sort'] == "HTL") {
                $data->where('category_id', '2')->orderBy('harga', 'DESC');
            }
        } elseif (isset($_GET['sorts']) && !empty($_GET['sorts'])) {
            if ($_GET['sorts'] == "BLG") {
                $data->where('kota', 'BLG');
            } elseif ($_GET['sorts'] == "LGB") {
                $data->where('kota', 'LGB');
            } elseif ($_GET['sorts'] == "PRS") {
                $data->where('kota', 'PRS');
            }
        }
        $bouquet = $data->paginate(8);
        $bouquet->appends($request->all());
        // $bouquet->appends($request->query('name', 'Bouquet'));
        return view('pages.web.home.home', compact('bouquet', 'search'));

        // $data = Product::where('category_id',1)
        //     ->where('name', 'like', '%' . $search . '%')
        //     ->orWhere('harga', 'like', '%' . $search . '%')
        //     ->where('category_id',1)
        //     ->orWhere('deskripsi', 'like', '%' . $search . '%')
        //     ->where('category_id',1);
    }
}
