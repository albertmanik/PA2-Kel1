<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;
use function Psy\Test\Command\ListCommand\Fixtures\bar;

class CartController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('pages.web.cart.main', compact('product'));
    }

    // public function store(Request $request, $productId)
    // {
    //     // get the product from the database
    //     $product = Product::find($productId);

    //     // get the current cart data from session or create a new empty array
    //     $cart = session()->get('cart', []);

    //     // check if the product is already in the cart, increment the quantity
    //     if (isset($cart[$product->id])) {
    //         $cart[$product->id]['quantity']++;
    //     }
    //     // if the product is not in the cart, add it with quantity of 1
    //     else {
    //         $cart[$product->id] = [
    //             "name" => $product->name,
    //             "category_id" => $product->category_id,
    //             "quantity" => 1,
    //             "harga" => $product->harga,
    //             "gambar" => $product->gambar
    //         ];
    //     }

    //     // update the cart in session
    //     session()->put('cart', $cart);

    //     // redirect back to the product page with success message
    //     return back()->with('success', 'Product added to cart successfully!');
    // }

    public function store(Request $request, $productId)
    {
        $userId = Auth::id();

        $product = Product::find($productId);

        $cart = session()->get('cart.' . $userId, []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'category_id' => $product->category_id,
                'harga' => $product->harga,
                'quantity' => 1,
                'gambar' => $product->gambar,
                'user_id' => $userId,
            ];
        }

        session()->put('cart.' . $userId, $cart);

        // Menghitung total jumlah produk dalam keranjang
        $totalCartItems = count(array_values($cart));

        // Menyimpan total jumlah produk dalam keranjang ke session
        session()->put('totalCartItems.' . $userId, $totalCartItems);

        return back()->with('success', 'Product berhasil ditambahkan');
    }

    public function loadCart()
    {
        $userId = Auth::id();
        $cart = Session::get('cart.' . $userId, []);
        $total = 0;

        $cartDetails = view('pages.web.home.carts')->with(compact('cart'))->render();

        foreach ($cart as $item) {
            $total += $item['harga'] * $item['quantity'];
        }
        $cartSubtotal = "Rp. " . number_format($total, 2, ',', '.');
        $response = [
            'cart_details' => $cartDetails,
            'cart_subtotal' => $cartSubtotal
        ];
        return back($response);
    }

    public function destroy(Cart $productId)
    {
    }

    // public function remove(Request $request, $productId)
    // {
    //     $product = Product::find($productId);
    //     // get the current cart data from session or create a new empty array
    //     $cart = session()->get('cart', []);

    //     // check if the product exists in the cart
    //     if (isset($cart[$product])) {
    //         // remove the product from the cart
    //         unset($cart[$product]);
    //     }

    //     // update the cart in session
    //     session()->put('cart', $cart);

    //     // redirect back to the product page with success message
    //     return back()->with('success', 'Product removed from cart successfully!');
    // }

    //     public function remove($productId)
    // {
    //     // Get the current cart data from session
    //     $cart = session()->get('cart', []);

    //     // Check if the product is in the cart
    //     if (isset($cart[$productId])) {
    //         // Remove the product from the cart
    //         unset($cart[$productId]);

    //         // Update the cart in session
    //         session()->put('cart', $cart);

    //         // Redirect back to the product page with success message
    //         return back()->with('success', 'Product removed from cart successfully!');
    //     }

    //     // Redirect back to the product page with error message
    //     return back()->with('error', 'Product not found in cart!');
    // }

    public function remove($id)
    {
        // $productId = $request->input('product_id');
        $userId = Auth::id();

        $cart = session()->get('cart.' . $userId, []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart.' . $userId, $cart);

            // Menghitung total jumlah produk dalam keranjang
            $totalCartItems = count(array_values($cart));

            // Menyimpan total jumlah produk dalam keranjang ke session
            session()->put('totalCartItems.' . $userId, $totalCartItems);

            return back()->with('success', 'Berhasil Menghapus dari Keranjang');
        }

        return back()->with('success', 'berhasil');
    }
}
