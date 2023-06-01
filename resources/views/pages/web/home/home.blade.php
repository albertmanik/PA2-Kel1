<x-app-layout title="Home">
    <!-- SLIDER AREA START (slider-6) -->
    <div class="ltn__slider-area ltn__slider-3 ltn__slider-6 plr--5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__slide-two-active slick-slide-arrow-1 slick-slide-dots-1 arrow-white--">
                        <!-- ltn__slide-item  -->
                        <div class="ltn__slide-item ltn__slide-item-8 ltn__slide-item-9 text-color-white---- bg-image bg-overlay-theme-black-80---"
                            data-bs-bg="{{ asset('assets/img/slider/3.jpg') }}">
                            <div class="ltn__slide-item-inner">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12 align-self-center">
                                            <div class="slide-item-info">
                                                <div class="slide-item-info-inner ltn__slide-animation">
                                                    <div class="slide-item-info">
                                                        <div class="slide-item-info-inner ltn__slide-animation">
                                                            <h6
                                                                class="slide-sub-title ltn__secondary-color slide-title-line-2 animated">
                                                                Flower & Gift</h6>
                                                            <h1 class="slide-title animated ">Get Up To 75%</h1>
                                                            <div class="slide-brief animated">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing
                                                                    elit, sed do eiusmod tempor incididunt ut labore.
                                                                </p>
                                                            </div>
                                                            <div class="btn-wrapper animated">
                                                                <a href="{{ route('papanbunga.index') }}"
                                                                    class="theme-btn-1 btn btn-round">Shop Now</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="slide-item-img">
                                                <img src="img/slider/41-1.png" alt="#">
                                                <span class="call-to-circle-1"></span>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ltn__slide-item  -->
                        <div class="ltn__slide-item ltn__slide-item-8 ltn__slide-item-9 text-color-white---- bg-image bg-overlay-theme-black-80---"
                            data-bs-bg="{{ asset('assets/img/slider/1.jpg') }}">
                            <div class="ltn__slide-item-inner">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12 align-self-center">
                                            <div class="slide-item-info">
                                                <div class="slide-item-info-inner ltn__slide-animation">
                                                    <div class="slide-item-info">
                                                        <div class="slide-item-info-inner ltn__slide-animation">
                                                            <h6
                                                                class="slide-sub-title ltn__secondary-color slide-title-line-2 animated">
                                                                Flower & Gift</h6>
                                                            <h1 class="slide-title animated ">Get Up To 75%</h1>
                                                            <div class="slide-brief animated">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing
                                                                    elit, sed do eiusmod tempor incididunt ut labore.
                                                                </p>
                                                            </div>
                                                            <div class="btn-wrapper animated">
                                                                <a href="service.html"
                                                                    class="theme-btn-1 btn btn-round">Shop Now</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="slide-item-img">
                                                <img src="img/slider/41-1.png" alt="#">
                                                <span class="call-to-circle-1"></span>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SLIDER AREA END -->

    <!-- BANNER AREA START -->
    <div class="ltn__banner-area  plr--5 mt-40">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="ltn__banner-item">
                        <div class="ltn__banner-img">
                            <a href="shop.html"><img src="{{ asset('assets/img/banner/4.jpg') }}"
                                    alt="Banner Image"></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="ltn__banner-item">
                        <div class="ltn__banner-img">
                            <a href="shop.html"><img src="{{ asset('assets/img/banner/2.jpg') }}"
                                    alt="Banner Image"></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="ltn__banner-item">
                        <div class="ltn__banner-img">
                            <a href="shop.html"><img src="{{ asset('assets/img/banner/5.jpg') }}"
                                    alt="Banner Image"></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="ltn__banner-item">
                        <div class="ltn__banner-img">
                            <a href="shop.html"><img src="{{ asset('assets/img/banner/3.jpg') }}"
                                    alt="Banner Image"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BANNER AREA END -->

    {{-- Modal QuickView --}}
    @foreach ($product as $item)
        @if ($item->category_id == 2)
            <div class="ltn__modal-area ltn__quick-view-modal-area">
                <div class="modal fade" id="quick_view_modal{{ $item->id }}" tabindex="-1">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <!-- <i class="fas fa-times"></i> -->
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="ltn__quick-view-modal-inner">
                                    <div class="modal-product-item">
                                        <div class="row">
                                            <div class="col-lg-6 col-12">
                                                <div class="modal-product-img">
                                                    <img src="products/{{ $item->gambar }}" alt="#">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-12">
                                                <div class="modal-product-info shop-details-info pl-0">
                                                    <h3>{{ $item->name }}</h3>
                                                    <div class="product-price-ratting mb-20">
                                                        <ul>
                                                            <li>
                                                                <div class="product-price">
                                                                    <span>Rp. {{ number_format($item->harga, 2, ',', '.') }}</span>
                                                                    {{-- <del>$65.00</del> --}}
                                                                </div>
                                                            </li>
                                                            {{-- <li>
                                                            <div class="product-ratting">
                                                                <ul>
                                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                                    <li class="review-total"> <a href="#"> ( 95 Reviews )</a></li>
                                                                </ul>
                                                            </div>
                                                        </li> --}}
                                                        </ul>
                                                    </div>
                                                    <div class="modal-product-brief">
                                                        <p>{{ $item->deskripsi }}</p>
                                                        <p>{{ $item->no_hp }}</p>
                                                    </div>
                                                    {{-- <div class="modal-product-meta ltn__product-details-menu-1 mb-20">
                                                    <ul>
                                                        <li>
                                                            <div class="ltn__color-widget clearfix">
                                                                <strong class="d-meta-title">Color</strong>
                                                                <ul>
                                                                    <li class="theme"><a href="#"></a></li>
                                                                    <li class="green-2"><a href="#"></a></li>
                                                                    <li class="blue-2"><a href="#"></a></li>
                                                                    <li class="white"><a href="#"></a></li>
                                                                    <li class="red"><a href="#"></a></li>
                                                                    <li class="yellow"><a href="#"></a></li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="ltn__size-widget clearfix mt-25">
                                                                <strong class="d-meta-title">Size</strong>
                                                                <ul>
                                                                    <li><a href="#">S</a></li>
                                                                    <li><a href="#">M</a></li>
                                                                    <li><a href="#">L</a></li>
                                                                    <li><a href="#">XL</a></li>
                                                                    <li><a href="#">XXL</a></li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div> --}}
                                                    <div
                                                        class="ltn__product-details-menu-2 product-cart-wishlist-btn mb-30">
                                                        <ul>
                                                            <li>
                                                                <div class="cart-plus-minus">
                                                                    <input type="text" value="01"
                                                                        name="qtybutton" class="cart-plus-minus-box">
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <a href="#"
                                                                    class="theme-btn-1 btn btn-effect-1 d-add-to-cart"
                                                                    title="Add to Cart" data-bs-toggle="modal"
                                                                    data-bs-target="#add_to_cart_modal">
                                                                    <span>ADD TO CART</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#"
                                                                    class="btn btn-effect-1 d-add-to-wishlist"
                                                                    title="Add to Cart" data-bs-toggle="modal"
                                                                    data-bs-target="#liton_wishlist_modal">
                                                                    <i class="icon-heart"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="ltn__social-media mb-30">
                                                        <ul>
                                                            <li class="review-total"> <a href="#"> ( 95 Reviews
                                                                    )</a></li>
                                                        </ul>
                                                    </div>
                                                    <div
                                                        class="modal-product-meta ltn__product-details-menu-1 mb-30 d-none">
                                                        <ul>
                                                            <li><strong>SKU:</strong> <span>12345</span></li>
                                                            <li>
                                                                <strong>Categories:</strong>
                                                                <span>
                                                                    <a href="#">Flower</a>
                                                                </span>
                                                            </li>
                                                            <li>
                                                                <strong>Tags:</strong>
                                                                <span>
                                                                    <a href="#">Love</a>
                                                                    <a href="#">Flower</a>
                                                                    <a href="#">Heart</a>
                                                                </span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="ltn__safe-checkout d-none">
                                                        <h5>Guaranteed Safe Checkout</h5>
                                                        <img src="{{ asset('assets/img/icons/payment-2.png') }}"
                                                            alt="Payment Image">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="ltn__modal-area ltn__quick-view-modal-area">
                <div class="modal fade" id="quick_view_modal{{ $item->id }}" tabindex="-1">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <!-- <i class="fas fa-times"></i> -->
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="ltn__quick-view-modal-inner">
                                    <div class="modal-product-item">
                                        <div class="row">
                                            <div class="col-lg-6 col-12">
                                                <div class="modal-product-img">
                                                    <img src="{{ asset('bungapapan/' . $item->gambar) }}"
                                                        alt="#">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-12">
                                                <div class="modal-product-info shop-details-info pl-0">
                                                    <h3>{{ $item->name }}</h3>
                                                    <div class="product-price-ratting mb-20">
                                                        <ul>
                                                            <li>
                                                                <div class="product-price">
                                                                    <span>Rp. {{ number_format($item->harga, 2, ',', '.') }}</span>
                                                                    {{-- <del>$65.00</del> --}}
                                                                </div>
                                                            </li>
                                                            {{-- <li>
                                                        <div class="product-ratting">
                                                            <ul>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li><a href="#"><i class="icon-star"></i></a></li>
                                                                <li class="review-total"> <a href="#"> ( 95 Reviews )</a></li>
                                                            </ul>
                                                        </div>
                                                    </li> --}}
                                                        </ul>
                                                    </div>
                                                    <div class="modal-product-brief">
                                                        <p>{{ $item->deskripsi }}</p>
                                                        <p>{{ $item->kota }}</p>
                                                    </div>
                                                    {{-- <div class="modal-product-meta ltn__product-details-menu-1 mb-20">
                                                <ul>
                                                    <li>
                                                        <div class="ltn__color-widget clearfix">
                                                            <strong class="d-meta-title">Color</strong>
                                                            <ul>
                                                                <li class="theme"><a href="#"></a></li>
                                                                <li class="green-2"><a href="#"></a></li>
                                                                <li class="blue-2"><a href="#"></a></li>
                                                                <li class="white"><a href="#"></a></li>
                                                                <li class="red"><a href="#"></a></li>
                                                                <li class="yellow"><a href="#"></a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="ltn__size-widget clearfix mt-25">
                                                            <strong class="d-meta-title">Size</strong>
                                                            <ul>
                                                                <li><a href="#">S</a></li>
                                                                <li><a href="#">M</a></li>
                                                                <li><a href="#">L</a></li>
                                                                <li><a href="#">XL</a></li>
                                                                <li><a href="#">XXL</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div> --}}
                                                    <div
                                                        class="ltn__product-details-menu-2 product-cart-wishlist-btn mb-30">
                                                        <ul>
                                                            <li>
                                                                <div class="cart-plus-minus">
                                                                    <input type="text" value="02"
                                                                        name="qtybutton" class="cart-plus-minus-box">
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <a href="#"
                                                                    class="theme-btn-1 btn btn-effect-1 d-add-to-cart"
                                                                    title="Add to Cart" data-bs-toggle="modal"
                                                                    data-bs-target="#add_to_cart_modal">
                                                                    <span>ADD TO CART</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#"
                                                                    class="btn btn-effect-1 d-add-to-wishlist"
                                                                    title="Add to Cart" data-bs-toggle="modal"
                                                                    data-bs-target="#liton_wishlist_modal">
                                                                    <i class="icon-heart"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="ltn__social-media mb-30">
                                                        <ul>
                                                            <li><a href="#"><i class="icon-star"></i></a></li>
                                                            <li class="review-total"> <a href="#"> ( 95 Reviews
                                                                    )</a></li>
                                                        </ul>
                                                    </div>
                                                    <div
                                                        class="modal-product-meta ltn__product-details-menu-1 mb-30 d-none">
                                                        <ul>
                                                            <li><strong>SKU:</strong> <span>12345</span></li>
                                                            <li>
                                                                <strong>Categories:</strong>
                                                                <span>
                                                                    <a href="#">Flower</a>
                                                                </span>
                                                            </li>
                                                            <li>
                                                                <strong>Tags:</strong>
                                                                <span>
                                                                    <a href="#">Love</a>
                                                                    <a href="#">Flower</a>
                                                                    <a href="#">Heart</a>
                                                                </span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="ltn__safe-checkout d-none">
                                                        <h5>Guaranteed Safe Checkout</h5>
                                                        <img src="{{ asset('assets/img/icons/payment-2.png') }}"
                                                            alt="Payment Image">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach

    <!-- PRODUCT TAB AREA START (product-item-3) -->
    <div class="ltn__product-tab-area ltn__product-gutter  pt-65 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__tab-menu ltn__tab-menu-3 ltn__tab-menu-top-right-- text-uppercase text-center">
                        <div class="nav">
                            <a class="active show" data-bs-toggle="tab" href="#liton_tab_3_1">new arrival</a>
                            {{-- <div class="ltn__breadcrumb-color-white--- text-center">
                                <div class="ltn__breadcrumb-list">
                                    <ul>
                                        <li><a href="{{ url('/papanbunga') }}">Papan Bunga</li></a>
                                    </ul>
                                </div>
                            </div> --}}
                            {{-- <div class="ltn__breadcrumb-area ltn__breadcrumb-area-4 ltn__breadcrumb-color-white---">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="ltn__breadcrumb-inner text-center">
                                                <h1 class="ltn__page-title">Shop</h1>
                                                <div class="ltn__breadcrumb-list">
                                                    <ul>
                                                        <li><a href="{{ url('/') }}">Home</a></li>
                                                        <li><a href="{{ url('/papanbunga') }}">Papan Bunga</li></a>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <a data-bs-toggle="tab" href="#liton_tab_3_2" class="">bouquet</a>
                            <a data-bs-toggle="tab" href="#liton_tab_3_3" class="">papan bunga</a> --}}
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="liton_product_grid">
                            <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                                <div class="row">
                                    <!-- ltn__product-item -->
                                    @foreach ($product as $item)
                                        @if ($item->category_id == 1)
                                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                                <div class="ltn__product-item text-center">
                                                    <div class="product-img">
                                                        <a href="{{ route('papanbunga.show', $item->id) }}"><img
                                                                src="{{ asset('bungapapan/' . $item->gambar) }}"
                                                                alt="#"></a>
                                                        <div class="product-badge">
                                                            <ul>
                                                                <li class="badge-1">Hot</li>
                                                            </ul>
                                                        </div>
                                                        <div class="product-hover-action product-hover-action-2">
                                                            <ul>
                                                                <li>
                                                                    <a href="#" title="Quick View"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#quick_view_modal{{ $item->id }}">
                                                                        <i class="icon-magnifier"></i>
                                                                    </a>
                                                                </li>
                                                                <li class="add-to-cart">
                                                                    <a href="#" title="Add to Cart"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#add_to_cart_modal">
                                                                        <span class="cart-text d-none d-xl-block">Add
                                                                            to Cart</span>
                                                                        <span class="d-block d-xl-none"><i
                                                                                class="icon-handbag"></i></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" title="Quick View"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#quick_view_modal">
                                                                        <i class="icon-shuffle"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">
                                                        <h2 class="product-title"><a
                                                                href="product-details.html">{{ $item->kota }}
                                                                {{ $item->name }}</a></h2>
                                                        <div class="product-price">
                                                            <span>Rp. {{ number_format($item->harga, 2, ',', '.') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                                <div class="ltn__product-item text-center">
                                                    <div class="product-img">
                                                        <a href="{{ route('bouquet.show', $item->id) }}"><img
                                                                src="{{ asset('bouquets/' . $item->gambar) }}"
                                                                alt="#"></a>
                                                        <div class="product-badge">
                                                            <ul>
                                                                <li class="badge-1">Hot</li>
                                                            </ul>
                                                        </div>
                                                        <div class="product-hover-action product-hover-action-2">
                                                            <ul>
                                                                <li>
                                                                    <a href="#" title="Quick View"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#quick_view_modal{{ $item->id }}">
                                                                        <i class="icon-magnifier"></i>
                                                                    </a>
                                                                </li>
                                                                <li class="add-to-cart">
                                                                    <a href="#" title="Add to Cart"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#add_to_cart_modal">
                                                                        <span class="cart-text d-none d-xl-block">Add
                                                                            to Cart</span>
                                                                        <span class="d-block d-xl-none"><i
                                                                                class="icon-handbag"></i></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" title="Quick View"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#quick_view_modal">
                                                                        <i class="icon-shuffle"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">
                                                        <h2 class="product-title"><a
                                                                href="product-details.html">{{ $item->kota }}
                                                                {{ $item->name }}</a></h2>
                                                        <div class="product-price">
                                                            <span>Rp. {{ number_format($item->harga, 2, ',', '.') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn-wrapper text-center">
                        <a href="{{ url('/bouquet') }}" class="btn btn-transparent btn-effect-3 btn-border">LOAD MORE
                            +</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT TAB AREA END -->

    <!-- FEATURE AREA START ( Feature - 3) -->
    <div class="ltn__feature-area mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__feature-item-box-wrap ltn__feature-item-box-wrap-2  ltn__border section-bg-6">
                        <div class="ltn__feature-item ltn__feature-item-8">
                            <div class="ltn__feature-icon">
                                <img src="{{ asset('assets/img/icons/svg/8-trolley.svg') }}" alt="#">
                            </div>
                            <div class="ltn__feature-info">
                                <h4>Free shipping</h4>
                                <p>On all orders over $49.00</p>
                            </div>
                        </div>
                        <div class="ltn__feature-item ltn__feature-item-8">
                            <div class="ltn__feature-icon">
                                <img src="{{ asset('assets/img/icons/svg/9-money.svg') }}" alt="#">
                            </div>
                            <div class="ltn__feature-info">
                                <h4>15 days returns</h4>
                                <p>Moneyback guarantee</p>
                            </div>
                        </div>
                        <div class="ltn__feature-item ltn__feature-item-8">
                            <div class="ltn__feature-icon">
                                <img src="{{ asset('assets/img/icons/svg/10-credit-card.svg') }}" alt="#">
                            </div>
                            <div class="ltn__feature-info">
                                <h4>Secure checkout</h4>
                                <p>Protected by Paypal</p>
                            </div>
                        </div>
                        <div class="ltn__feature-item ltn__feature-item-8">
                            <div class="ltn__feature-icon">
                                <img src="{{ asset('assets/img/icons/svg/11-gift-card.svg') }}" alt="#">
                            </div>
                            <div class="ltn__feature-info">
                                <h4>Offer & gift here</h4>
                                <p>On all orders over</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FEATURE AREA END -->
    {{-- @section('custom_js')
    <script>
        @if (session()->has('success'))
        toastr.options = {
            "progressBar": true,
            "closeButton": true
        }
        toastr.success("{{ session()->get('success') }}");
        @endif
    </script>
@endsection --}}
</x-app-layout>
