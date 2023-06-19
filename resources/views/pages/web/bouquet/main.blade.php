<x-app-layout title="Bouquet">
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
                                <li><a href="{{ url('/bouquet') }}">Bouquet</li></a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->
    <!-- MODAL AREA START (Quick View Modal) -->
    @foreach ($bouquet as $item)
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
                                                    <img src="{{ asset('bouquets/' . $item->gambar) }}" alt="#">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-12">
                                                <div class="modal-product-info shop-details-info pl-0">
                                                    <h3>{{ $item->name }}</h3>
                                                    <div class="product-price-ratting mb-20">
                                                        <ul>
                                                            <li>
                                                                <div class="product-price">
                                                                    <span>Rp.
                                                                        {{ number_format($item->harga, 2, ',', '.') }}</span>
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
                                                        {{-- <p>{{ $item->kota }}</p>   --}}
                                                    </div>
                                                    {{-- <div class="modal-product-meta ltn__product-details-menu-1 mb-20">
                                                    <ul>
                                                        <li>
                                                            <div class="ltn__color-widget clearfix">
                                                                <strong class="dy-meta-title">Color</strong>
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
                                                            {{-- <li>
                                                            <div class="cart-plus-minus">
                                                                <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                                            </div>
                                                        </li> --}}
                                                            @role('customer')
                                                                <li>
                                                                    <a href="{{ route('cart.store', $item->id) }}"
                                                                        class="theme-btn-1 btn btn-effect-1 d-add-to-cart">
                                                                        <span>ADD TO CART</span>
                                                                    </a>
                                                                </li>
                                                            @endrole
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
    <!-- MODAL AREA END -->

    <!-- PRODUCT DETAILS AREA START -->
    <div class="ltn__product-area ">
        <div class="container">
            <div class="row">
                <div class="col-lg-13">
                    <div class="ltn__shop-options">
                        @role('penjual')
                            <div class="btn-wrapper">
                                <a href="{{ route('bouquet.create') }}"
                                    class="btn theme-btn-1 btn-effect-1 text-uppercase mb-4">Tambah
                                    Product</a>
                            </div>
                        @endrole
                        <ul>
                            <li>
                                <div>
                                    <!-- Search Widget -->
                                    <div class="widget ltn__search-widget">
                                        <form action="#">
                                            <input type="text" name="search" value="{{ request()->search }}"
                                                placeholder="Search your keyword..." autocomplete="off">
                                            <button type="submit"><i class="icon-magnifier"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <form name="sorting" id="sorting">
                                    <div class="short-by text-center">
                                        <select class="nice-select" name="sort" id="sort">
                                            <option value="sort">Urutkan</option>
                                            {{-- <option>Sort by popularity</option>
                                            <option>Sort by new arrivals</option> --}}
                                            <option value="LTH">Harga Terendah</option>
                                            <option value="HTL">Harga Tertinggi</option>
                                        </select>
                                        {{-- <button type="submit">Search</button> --}}
                                    </div>
                                </form>
                                <form name="sorting" id="sorting">
                                    <div class="short-by text-center">
                                        <select class="nice-select" name="sorts" id="sorts">
                                            <option value="">Pilih Kota</option>
                                            <option value="AJB">Ajibata</option>
                                            <option value="BLG">Balige</option>
                                            <option value="BNL">Bonatua Lunasi</option>
                                            <option value="BBR">Borbor</option>
                                            <option value="HBS">Habinsaran</option>
                                            <option value="LGB">Laguboti</option>
                                            <option value="LMJ">Lumban Julu</option>
                                            <option value="NS">Nasau</option>
                                            <option value="PRM">Parmaksian</option>
                                            <option value="PPM">Pintu Pohan Meranti</option>
                                            <option value="PRS">Porsea</option>
                                            <option value="SAN">Siantar Narumonda</option>
                                            <option value="SGM">Sigumpar</option>
                                            <option value="SLN">Silaen</option>
                                            <option value="TMP">Tampahan</option>
                                        </select>
                                    </div>
                                </form>
                                {{-- <div class="ltn__grid-list-tab-menu ">
                                    <div class="nav">
                                        <a class="active show" data-bs-toggle="tab" href="#liton_product_grid"><i class="icon-grid"></i></a>
                                        <a data-bs-toggle="tab" href="#liton_product_list"><i class="icon-menu"></i></a>
                                    </div>
                                </div>  --}}
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">

                        <div class="tab-pane fade active show" id="liton_product_grid">
                            <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                                <div class="row">
                                    <!-- ltn__product-item -->
                                    @foreach ($bouquet as $item)
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
                                                    <div class="product-hover-action product-hover-action-3">
                                                        <ul>
                                                            <li>
                                                                <a href="#" title="Quick View"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#quick_view_modal{{ $item->id }}">
                                                                    <i class="icon-magnifier"></i>
                                                                </a>
                                                            </li>
                                                            {{-- <li class="add-to-cart">
                                                                    <a href="{{ route('cart.store', $item->id) }}"
                                                                        title="Add to Cart">
                                                                        <span class="cart-text d-none d-xl-block">Add
                                                                            to
                                                                            Cart</span>
                                                                        <span class="d-block d-xl-none"><i
                                                                            class="icon-handbag"></i></span>
                                                                    </a>
                                                                </li> --}}
                                                            @role('customert')
                                                                <li>
                                                                    <a href="{{ route('cart.store', $item->id) }}"
                                                                        title="Add to Cart">
                                                                        <i class="icon-handbag"></i>
                                                                    </a>
                                                                </li>
                                                            @endrole
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product-info">
                                                    <h2 class="product-title"><a
                                                            href="{{ route('bouquet.show', $item->id) }}">{{ $item->kota }}
                                                            {{ $item->name }}</a></h2>
                                                    <div class="product-price">
                                                        <span>Rp.
                                                            {{ number_format($item->harga, 2, ',', '.') }}</span>
                                                        @role('penjual')
                                                            @if (Auth::user()->id == $item->user_id)
                                                                <div class="d-flex justify-content-center">
                                                                    <a class="submit-button-1 mx-2"
                                                                        href="{{ route('bouquet.edit', $item->id) }}">Edit</a>
                                                                    {{-- <a>Hapus</a> --}}
                                                                    <a href="javascript:;"
                                                                        onclick="confirmDelete('{{ route('bouquet.destroy', $item->id) }}');"
                                                                        class="text-danger d-inline-block remove-item-btn">
                                                                        <button class="submit-button-1">Hapus</button>
                                                                    </a>
                                                                </div>
                                                            @endif
                                                        @endrole
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="showing-product-number text-right">
                        <span>Showing {{ $bouquet->firstItem() }} to {{ $bouquet->lastItem() }} of
                            {{ $bouquet->total() }} results</span>
                    </div>
                    <div class="ltn__pagination-area text-center">
                        {{ $bouquet->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- PRODUCT DETAILS AREA END -->
</x-app-layout>
