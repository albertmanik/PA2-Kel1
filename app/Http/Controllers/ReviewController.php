<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('web')->except('logout');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('pages.web.papanbunga.detail', compact('product'));
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
     * @param  \App\Http\Requests\StoreReviewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function storePapanbunga(Request $request, $papanbunga)
    {
        $product = Product::findOrFail($papanbunga);
        $user = User::findOrFail(auth()->user()->id);
        if (!$user->orders()->where('product_id', $papanbunga)->exists()) {
            return back()->with('error', 'Anda belum pernah memesan produk ini.');
        }
        // check if already reviewed
        if ($user->reviews()->where('product_id', $user->orders()->where('product_id', $product->id)->first()->id)->exists()) {
            return back()->with('error', 'Anda sudah pernah melakukan review');
        } else {
            $user->reviews()->create([
                'rating' => $request->rating,
                'review' => $request->review,
                'product_id' => $user->orders()->where('product_id', $product->id)->first()->id,
                'user_id' => auth()->user()->id,
                // dd($user),
            ]);
            $total_rating = Review::where('product_id', $papanbunga)->avg('rating');
            Product::where('id', $papanbunga)->update(['total_rating' => $total_rating]);
            return back()->with('success', 'Berhasil memberi review');
        }
        // $review = new Review();
        // $review->user_id = Auth::user()->id;
        // $review->product_id = $papanbunga;
        // $review->review = $request->review;
        // $review->rating = $request->rating;
        // $review->save();
        // $total_rating = Review::where('product_id', $papanbunga)->avg('rating');
        // Product::where('id', $papanbunga)->update(['total_rating' => $total_rating]);
        // return back()->with('success', 'Berhasil');
    }

    public function storeBouquet(Request $request, $bouquet)
    {
        $product = Product::findOrFail($bouquet);
        $user = User::findOrFail(auth()->user()->id);
        if (!$user->orders()->where('product_id', $bouquet)->exists()) {
            return back()->with('error', 'Anda belum pernah memesan produk ini.');
        }
        // check if already reviewed
        if ($user->reviews()->where('product_id', $user->orders()->where('product_id', $product->id)->first()->id)->exists()) {
            return back()->with('error', 'Anda sudah pernah melakukan review');
        } else {
            $user->reviews()->create([
                'rating' => $request->rating,
                'review' => $request->review,
                'product_id' => $user->orders()->where('product_id', $product->id)->first()->id,
                'user_id' => auth()->user()->id
            ]);
            $total_rating = Review::where('product_id', $bouquet)->avg('rating');
            Product::where('id', $bouquet)->update(['total_rating' => $total_rating]);
            return back()->with('success', 'Berhasil memberi review');
        }
        // $review = new Review();
        // $review->user_id = Auth::user()->id;
        // $review->product_id = $bouquet;
        // $review->review = $request->review;
        // $review->rating = $request->rating;
        // $review->created_at = Carbon::now(); // Menggunakan fungsi now() untuk mendapatkan waktu saat ini
        // $review->save();
        // $total_rating = Review::where('product_id', $bouquet)->avg('rating');
        // Product::where('id', $bouquet)->update(['total_rating' => $total_rating]);
        // return back()->with('success', 'Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReviewRequest  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
