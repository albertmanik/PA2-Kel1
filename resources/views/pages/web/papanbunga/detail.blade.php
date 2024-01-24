<x-app-layout title="Detail Product">
    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area ltn__breadcrumb-area-4 ltn__breadcrumb-color-white---">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner text-center">
                        <h1 class="ltn__page-title">Shop</h1>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="{{ route('papanbunga.index') }}">Papan Bunga</li></a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->
    <!-- SHOP DETAILS AREA START -->
    <div class="ltn__shop-details-area pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="ltn__shop-details-inner">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="ltn__shop-details-img-gallery ltn__shop-details-img-gallery-2">
                                    <div class="ltn__shop-details-large-img">
                                        <div class="single-large-img">
                                            <a href="{{ asset('bungapapan/' . $product->gambar) }}"
                                                data-rel="lightcase:myCollection">
                                                <img src="{{ asset('bungapapan/' . $product->gambar) }}" alt="Image">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="modal-product-info shop-details-info pl-0">
                                    <h3>{{ $product->name }}</h3>
                                    <div class="product-price-ratting mb-20">
                                        <ul>
                                            <li>
                                                <div class="product-price">
                                                    <span>Rp.
                                                        {{ number_format($product->harga, 0, ',', '.') }}</span>
                                                </div>
                                            </li>
                                            @php
                                                $rating = \App\Models\Review::where('product_id', $product->id)->avg('rating');
                                            @endphp
                                            <li>
                                                <div class="product-ratting">
                                                    {{-- <ul>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li><a href="#"><i class="icon-star"></i></a></li>
                                                        <li class="review-total"> <a href="#"> ( 95 Reviews
                                                                )</a>
                                                        </li>
                                                    </ul> --}}
                                                    @if ($rating >= 0 && $rating <= 1)
                                                        <label>
                                                            <span class="icon"
                                                                style="color: rgb(221, 221, 79) !important;">★</span>
                                                            <span class="icon"
                                                                style="font-size: 17px">&nbsp;&nbsp;{{ number_format($rating, 1, ',', '.') }}</span>
                                                            <span class="review-total">({{ $reviewCount }}
                                                                Review)</span>
                                                        </label>
                                                    @elseif($rating < 2)
                                                        <label>
                                                            <span class="icon"
                                                                style="color: rgb(221, 221, 79) !important;">★</span>
                                                            <span class="icon"
                                                                style="font-size: 17px">&nbsp;&nbsp;{{ number_format($rating, 1, ',', '.') }}</span>
                                                            <span class="review-total">({{ $reviewCount }}
                                                                Review)</span>
                                                        </label>
                                                    @elseif($rating < 3)
                                                        <label>
                                                            <span class="icon"
                                                                style="color: rgb(221, 221, 79) !important;">★</span>
                                                            <span class="icon"
                                                                style="color: rgb(221, 221, 79) !important;">★</span>
                                                            <span class="icon"
                                                                style="font-size: 17px">&nbsp;&nbsp;{{ number_format($rating, 1, ',', '.') }}</span>
                                                            <span class="review-total">({{ $reviewCount }}
                                                                Review)</span>
                                                        </label>
                                                    @elseif($rating < 4)
                                                        <label>
                                                            <span class="icon"
                                                                style="color: rgb(221, 221, 79) !important;">★</span>
                                                            <span class="icon"
                                                                style="color: rgb(221, 221, 79) !important;">★</span>
                                                            <span class="icon"
                                                                style="color: rgb(221, 221, 79) !important;">★</span>
                                                            <span class="icon"
                                                                style="font-size: 17px">&nbsp;&nbsp;{{ number_format($rating, 1, ',', '.') }}</span>
                                                            <span class="review-total">({{ $reviewCount }}
                                                                Review)</span>
                                                        </label>
                                                    @elseif($rating < 5)
                                                        <label>
                                                            <span class="icon"
                                                                style="color: rgb(221, 221, 79) !important;">★</span>
                                                            <span class="icon"
                                                                style="color: rgb(221, 221, 79) !important;">★</span>
                                                            <span class="icon"
                                                                style="color: rgb(221, 221, 79) !important;">★</span>
                                                            <span class="icon"
                                                                style="color: rgb(221, 221, 79) !important;">★</span>
                                                            <span class="icon"
                                                                style="font-size: 17px">&nbsp;&nbsp;{{ number_format($rating, 1, ',', '.') }}</span>
                                                            <span class="review-total">({{ $reviewCount }}
                                                                Review)</span>
                                                        </label>
                                                    @elseif($rating >= 5)
                                                        <label>
                                                            <span class="icon"
                                                                style="color: rgb(221, 221, 79) !important;">★</span>
                                                            <span class="icon"
                                                                style="color: rgb(221, 221, 79) !important;">★</span>
                                                            <span class="icon"
                                                                style="color: rgb(221, 221, 79) !important;">★</span>
                                                            <span class="icon"
                                                                style="color: rgb(221, 221, 79) !important;">★</span>
                                                            <span class="icon"
                                                                style="color: rgb(221, 221, 79) !important;">★</span>
                                                            <span class="icon"
                                                                style="font-size: 17px">&nbsp;&nbsp;{{ number_format($rating, 1, ',', '.') }}</span>
                                                            <span class="review-total">({{ $reviewCount }}
                                                                Review)</span>
                                                        </label>
                                                    @endif
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="modal-product-brief">
                                        <p>{{ $product->deskripsi }}</p>
                                    </div>
                                    <div class="modal-product-meta ltn__product-details-menu-1 mb-30">
                                        <ul>
                                            <li>
                                                <strong>Nama Toko:</strong>
                                                <a href="{{ route('toko.detail', $product->toko->id) }}"><span>{{ $product->toko->nama_toko }}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="modal-product-meta ltn__product-details-menu-1 mb-20">
                                    </div>
                                    <div class="ltn__product-details-menu-2 product-cart-wishlist-btn mb-30">
                                        <ul>
                                            @role('customer')
                                                <li>
                                                    <a href="{{ route('cart.store', $product->id) }}"
                                                        class="theme-btn-1 btn btn-effect-1 d-add-to-cart">
                                                        <span>ADD TO CART</span>
                                                    </a>
                                                </li>
                                            @endrole
                                        </ul>
                                    </div>
                                    {{-- <div class="ltn__safe-checkout d-none">
                                        <h5>Guaranteed Safe Checkout</h5>
                                        <img src="{{ asset('papanbunga/' . $bungapapan->gambar) }}"
                                            alt="Payment Image">
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SHOP DETAILS AREA END -->

    <!-- SHOP DETAILS TAB AREA START -->
    <div class="ltn__shop-details-tab-area pb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__shop-details-tab-inner">
                        <div class="ltn__shop-details-tab-menu">
                            <div class="nav">
                                {{-- <a class="active show" data-bs-toggle="tab"
                                    href="#liton_tab_details_1_1">Description</a> --}}
                                <a class="active show" data-bs-toggle="tab" href="#liton_tab_details_1_1"
                                    class="">Reviews</a>
                                <!-- <a data-bs-toggle="tab" href="#liton_tab_details_1_3" class="">Comments</a> -->
                                <!-- <a data-bs-toggle="tab" href="#liton_tab_details_1_5" class="">Size Chart</a> -->
                            </div>
                        </div>
                        <div class="tab-content">
                            {{-- <div class="tab-pane fade active show" id="liton_tab_details_1_1">
                                <div class="ltn__shop-details-tab-content-inner text-center">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nost
                                        exercit ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                        pariatur Excepte sint occaecat cupidatat non proident, sunt in culpa qui officia
                                        deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus
                                        error sit volu accusantium doloremque laudantium, totam rem aperiam, eaque ipsa
                                        quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                                        explica Nemllo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut
                                        fugit,</p>
                                </div>
                            </div> --}}
                            <div class="tab-pane fade active show" id="liton_tab_details_1_1">
                                <div class="ltn__shop-details-tab-content-inner">
                                    <div class="customer-reviews-head text-center">
                                        <h4 class="title-2">Customer Reviews</h4>
                                        <div class="product-ratting">
                                            {{-- <ul>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                <li class="review-total"> <a href="#"> ( 95 Reviews
                                                        )</a>
                                                </li>
                                            </ul> --}}
                                            @if ($rating >= 0 && $rating <= 1)
                                                <label>
                                                    <span class="icon"
                                                        style="color: rgb(221, 221, 79) !important;">★</span>
                                                    <span class="icon"
                                                        style="font-size: 17px">&nbsp;&nbsp;{{ number_format($rating, 1, ',', '.') }}</span>
                                                    <span class="review-total">({{ $reviewCount }}
                                                        Review)</span>
                                                </label>
                                            @elseif($rating < 2)
                                                <label>
                                                    <span class="icon"
                                                        style="color: rgb(221, 221, 79) !important;">★</span>
                                                    <span class="icon"
                                                        style="font-size: 17px">&nbsp;&nbsp;{{ number_format($rating, 1, ',', '.') }}</span>
                                                    <span class="review-total">({{ $reviewCount }}
                                                        Review)</span>
                                                </label>
                                            @elseif($rating < 3)
                                                <label>
                                                    <span class="icon"
                                                        style="color: rgb(221, 221, 79) !important;">★</span>
                                                    <span class="icon"
                                                        style="color: rgb(221, 221, 79) !important;">★</span>
                                                    <span class="icon"
                                                        style="font-size: 17px">&nbsp;&nbsp;{{ number_format($rating, 1, ',', '.') }}</span>
                                                    <span class="review-total">({{ $reviewCount }}
                                                        Review)</span>
                                                </label>
                                            @elseif($rating < 4)
                                                <label>
                                                    <span class="icon"
                                                        style="color: rgb(221, 221, 79) !important;">★</span>
                                                    <span class="icon"
                                                        style="color: rgb(221, 221, 79) !important;">★</span>
                                                    <span class="icon"
                                                        style="color: rgb(221, 221, 79) !important;">★</span>
                                                    <span class="icon"
                                                        style="font-size: 17px">&nbsp;&nbsp;{{ number_format($rating, 1, ',', '.') }}</span>
                                                    <span class="review-total">({{ $reviewCount }}
                                                        Review)</span>
                                                </label>
                                            @elseif($rating < 5)
                                                <label>
                                                    <span class="icon"
                                                        style="color: rgb(221, 221, 79) !important;">★</span>
                                                    <span class="icon"
                                                        style="color: rgb(221, 221, 79) !important;">★</span>
                                                    <span class="icon"
                                                        style="color: rgb(221, 221, 79) !important;">★</span>
                                                    <span class="icon"
                                                        style="color: rgb(221, 221, 79) !important;">★</span>
                                                    <span class="icon"
                                                        style="font-size: 17px">&nbsp;&nbsp;{{ number_format($rating, 1, ',', '.') }}</span>
                                                    <span class="review-total">({{ $reviewCount }}
                                                        Review)</span>
                                                </label>
                                            @elseif($rating >= 5)
                                                <label>
                                                    <span class="icon"
                                                        style="color: rgb(221, 221, 79) !important;">★</span>
                                                    <span class="icon"
                                                        style="color: rgb(221, 221, 79) !important;">★</span>
                                                    <span class="icon"
                                                        style="color: rgb(221, 221, 79) !important;">★</span>
                                                    <span class="icon"
                                                        style="color: rgb(221, 221, 79) !important;">★</span>
                                                    <span class="icon"
                                                        style="color: rgb(221, 221, 79) !important;">★</span>
                                                    <span class="icon"
                                                        style="font-size: 17px">&nbsp;&nbsp;{{ number_format($rating, 1, ',', '.') }}</span>
                                                    <span class="review-total">({{ $reviewCount }}
                                                        Review)</span>
                                                </label>
                                            @endif
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <!-- comment-area -->
                                            <div class="ltn__comment-area mb-30">
                                                <div class="ltn__comment-inner">
                                                    <ul>
                                                        @foreach ($review as $item)
                                                            @if ($item->product_id == $product->id)
                                                                <li>
                                                                    <div class="ltn__comment-item clearfix">
                                                                        {{-- <div class="ltn__commenter-img">
                                                                            <img src="img/testimonial/1.jpg"
                                                                                alt="Image">
                                                                        </div> --}}
                                                                        <div class="ltn__commenter-comment">
                                                                            <h6><a
                                                                                    href="#">{{ Auth::guard('web')->user()->username }}</a>
                                                                            </h6>
                                                                            <div class="product-ratting">
                                                                                {{-- @if ($rating >= 0 && $rating <= 1)
                                                                                <label for="star1"
                                                                                    title="text">{{ number_format($rating, 1, ',', '.') }}</label>
                                                                            @elseif ($rating < 2)
                                                                                <label for="star1"
                                                                                    title="text">{{ number_format($rating, 1, ',', '.') }}</label>
                                                                                    @endif --}}
                                                                                @if ($item->rating == 1)
                                                                                    <label>
                                                                                        <span class="icon"
                                                                                            style="color: rgb(221, 221, 79) !important;">★</span>
                                                                                    </label>
                                                                                @elseif($item->rating == 2)
                                                                                    <label>
                                                                                        <span class="icon"
                                                                                            style="color: rgb(221, 221, 79) !important;">★</span>
                                                                                        <span class="icon"
                                                                                            style="color: rgb(221, 221, 79) !important;">★</span>
                                                                                    </label>
                                                                                @elseif($item->rating == 3)
                                                                                    <label>
                                                                                        <span class="icon"
                                                                                            style="color: rgb(221, 221, 79) !important;">★</span>
                                                                                        <span class="icon"
                                                                                            style="color: rgb(221, 221, 79) !important;">★</span>
                                                                                        <span class="icon"
                                                                                            style="color: rgb(221, 221, 79) !important;">★</span>
                                                                                    </label>
                                                                                @elseif($item->rating == 4)
                                                                                    <label>
                                                                                        <span class="icon"
                                                                                            style="color: rgb(221, 221, 79) !important;">★</span>
                                                                                        <span class="icon"
                                                                                            style="color: rgb(221, 221, 79) !important;">★</span>
                                                                                        <span class="icon"
                                                                                            style="color: rgb(221, 221, 79) !important;">★</span>
                                                                                        <span class="icon"
                                                                                            style="color: rgb(221, 221, 79) !important;">★</span>
                                                                                    </label>
                                                                                @elseif($item->rating == 5)
                                                                                    <label>
                                                                                        <span class="icon"
                                                                                            style="color: rgb(221, 221, 79) !important;">★</span>
                                                                                        <span class="icon"
                                                                                            style="color: rgb(221, 221, 79) !important;">★</span>
                                                                                        <span class="icon"
                                                                                            style="color: rgb(221, 221, 79) !important;">★</span>
                                                                                        <span class="icon"
                                                                                            style="color: rgb(221, 221, 79) !important;">★</span>
                                                                                        <span class="icon"
                                                                                            style="color: rgb(221, 221, 79) !important;">★</span>
                                                                                    </label>
                                                                                @endif
                                                                            </div>
                                                                            <p>{{ $item->review }}</p>
                                                                            <span
                                                                                class="ltn__comment-reply-btn">{{ \Carbon\Carbon::parse($item->created_at)->format('Y-m-d H:i') }}</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <!-- comment-reply -->
                                            <div class="ltn__comment-reply-area ltn__form-box mb-60">
                                                @auth
                                                    <!-- check if user already review this homestay -->
                                                    @if (auth()->user()->reviews->contains('product_id', $product->id))
                                                        <div class="box_style_4">
                                                            <h4 class="title-2">Add a Review</h4>
                                                            <p>
                                                                Anda sudah memberikan ulasan untuk Produk ini
                                                            </p>
                                                        </div>
                                                    @else
                                                        <form action="{{ route('papanbunga.rating', $product->id) }}"
                                                            method="post">
                                                            @csrf
                                                            <h4 class="title-2">Add a Review</h4>
                                                            <div class="mb-30">
                                                                <div class="add-a-review">
                                                                    <h6>Your Ratings:</h6>
                                                                    <div class="product-ratting">
                                                                        <div class="rate">
                                                                            <input type="radio" id="star5"
                                                                                name="rating" value="5" />
                                                                            <label for="star5" title="text">5
                                                                                stars</label>
                                                                            <input type="radio" id="star4"
                                                                                name="rating" value="4" />
                                                                            <label for="star4" title="text">4
                                                                                stars</label>
                                                                            <input type="radio" id="star3"
                                                                                name="rating" value="3" />
                                                                            <label for="star3" title="text">3
                                                                                stars</label>
                                                                            <input type="radio" id="star2"
                                                                                name="rating" value="2" />
                                                                            <label for="star2" title="text">2
                                                                                stars</label>
                                                                            <input type="radio" id="star1"
                                                                                name="rating" value="1" />
                                                                            <label for="star1" title="text">1
                                                                                star</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="input-item input-item-textarea ltn__custom-icon">
                                                                <textarea name="review" placeholder="Masukkan Review Anda...."></textarea>
                                                            </div>
                                                            <div class="btn-wrapper">
                                                                <button class="btn theme-btn-1 btn-effect-1 text-uppercase"
                                                                    type="submit">Submit</button>
                                                            </div>
                                                        </form>
                                                    @endif
                                                @endauth
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="liton_tab_details_1_3">
                                <div class="ltn__shop-details-tab-content-inner">
                                    <!-- comment-area -->
                                    <!-- comment-reply -->
                                </div>
                            </div>
                            <div class="tab-pane fade" id="liton_tab_details_1_5">
                                <div class="ltn__shop-details-tab-content-inner">
                                    <div class="table-1 mb-20">
                                        <table class="">
                                            <tbody>
                                                <tr>
                                                    <th>SIZE</th>
                                                    <th>XS</th>
                                                    <th>S</th>
                                                    <th>S/M</th>
                                                    <th>M</th>
                                                    <th>M/L</th>
                                                    <th>L</th>
                                                    <th>XL</th>
                                                </tr>
                                                <tr data-bs-region="uk">
                                                    <th>UK</th>
                                                    <td>4</td>
                                                    <td>6 - 8</td>
                                                    <td>6 - 10</td>
                                                    <td>10 - 12</td>
                                                    <td>12 - 16</td>
                                                    <td>14 - 16</td>
                                                    <td>18</td>
                                                </tr>
                                                <tr data-bs-region="eur">
                                                    <th>
                                                        <span class="mobile-show">EUR</span><span
                                                            class="mobile-none">EUROPE</span>
                                                    </th>
                                                    <td>32</td>
                                                    <td>34 - 36</td>
                                                    <td>34 - 38</td>
                                                    <td>38 - 40</td>
                                                    <td>40 - 44</td>
                                                    <td>42 - 44</td>
                                                    <td>46</td>
                                                </tr>
                                                <tr data-bs-region="usa">
                                                    <th>
                                                        <span>USA/</span><span class="mobile-none">CANADA</span><span
                                                            class="mobile-show"> CA</span>
                                                    </th>
                                                    <td>0</td>
                                                    <td>2 - 4</td>
                                                    <td>2 - 6</td>
                                                    <td>6 - 8</td>
                                                    <td>8 - 12</td>
                                                    <td>10 - 12</td>
                                                    <td>14</td>
                                                </tr>
                                                <tr data-bs-region="aus">
                                                    <th>AUS / NZ</th>
                                                    <td>4</td>
                                                    <td>6 - 8</td>
                                                    <td>6 - 10</td>
                                                    <td>10 - 12</td>
                                                    <td>12 - 16</td>
                                                    <td>14 - 16</td>
                                                    <td>18</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SHOP DETAILS TAB AREA END -->
</x-app-layout>
