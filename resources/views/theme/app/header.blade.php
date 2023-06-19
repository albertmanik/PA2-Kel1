<!-- HEADER AREA START (header-4) -->
<header class="ltn__header-area ltn__header-8 section-bg-6">
    <!-- ltn__header-top-area start -->
    {{-- <div class="ltn__header-top-area top-area-color-white d-none">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="ltn__top-bar-menu">
                        <ul>
                            <li><a href="mailto:info@webmail.com?Subject=Flower%20greetings%20to%20you"><i class="icon-mail"></i> info@webmail.com</a></li>
                            <li><a href="locations.html"><i class="icon-placeholder"></i> 15/A, Nest Tower, NYC</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="top-bar-right text-right">
                        <div class="ltn__top-bar-menu">
                            <ul>
                                <li>
                                    <!-- ltn__language-menu -->
                                    <div class="ltn__drop-menu ltn__currency-menu ltn__language-menu">
                                        <ul>
                                            <li><a href="#" class="dropdown-toggle"><span class="active-currency">English</span></a>
                                                <ul>
                                                    <li><a href="#">Arabic</a></li>
                                                    <li><a href="#">Bengali</a></li>
                                                    <li><a href="#">Chinese</a></li>
                                                    <li><a href="#">English</a></li>
                                                    <li><a href="#">French</a></li>
                                                    <li><a href="#">Hindi</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <!-- ltn__social-media -->
                                    <div class="ltn__social-media">
                                        <ul>
                                            <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>

                                            <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                            <li><a href="#" title="Dribbble"><i class="fab fa-dribbble"></i></a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- ltn__header-top-area end -->

    <!-- ltn__header-middle-area start -->
    <div class="ltn__header-middle-area ltn__header-sticky ltn__sticky-bg-white plr--5">
        <div class="container-fluid">
            <div class="row">
                <div class="col logo-column">
                    <div class="site-logo">
                        @role('customer')
                            <a href="{{ url('/') }}"><img style="width: 12rem" src="{{ asset('assets/img/logoo.jpg') }}"
                                    alt="Logo"></a>
                            @elserole('penjual')
                            <a href="{{ url('/penjual/home') }}"><img style="width: 12rem"
                                    src="{{ asset('assets/img/logoo.jpg') }}" alt="Logo"></a>
                        @endrole
                    </div>
                </div>
                <div class="col header-menu-column">
                    <div class="header-menu d-none d-xl-block">
                        <nav>
                            <div class="ltn__main-menu">
                                <ul>
                                    @role('customer')
                                        <li class="menu-icon"><a href="{{ url('/') }}">Home</a>
                                        </li>
                                        @elserole('penjual')
                                        <li class="menu-icon"><a href="{{ url('/penjual/home') }}">Home</a>
                                        </li>
                                    @else
                                        <li class="menu-icon"><a href="{{ url('/penjual/home') }}">Home</a>
                                        </li>
                                    @endrole
                                    @role('customer')
                                        {{-- <li class="menu-icon"><a href="{{ url('checkout') }}">Checkout</a>
                                        </li> --}}
                                        @elserole('penjual')
                                        <li class="menu-icon"><a href="{{ route('toko.index') }}">Toko</a>
                                        </li>
                                    @endrole
                                    <li class="menu-icon"><a href="#">Products</a>
                                        <ul>
                                            <li><a href="{{ route('papanbunga.index') }}">Papan Bunga</a></li>
                                            <li><a href="{{ route('bouquet.index') }}">Bouquet</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('web.faq') }}">FAQ</a>
                                    </li>
                                    {{-- <li class="menu-icon"><a href="#">Shop</a>
                                        <ul>
                                            <li><a href="{{ url('/papanbunga') }}">Papan Bunga</a></li>
                                            <li><a href="{{ url('/bouquet') }}">Bouquet</a></li>
                                        </ul>
                                    </li> --}}
                                    {{-- <li class="menu-icon"><a href="{{ url('/testimoni') }}">Testimoni</a></li>
                                    <li class="menu-icon"><a href="{{ url('/galeri') }}">Galeri</a></li> --}}
                                    {{-- <li><a href="contact.html">Contact</a></li> --}}
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col">
                    <div class="ltn__header-options">
                        <ul>
                            <li>
                                <!-- header-search-1 -->
                                <div class="header-search-wrap">
                                    <div class="header-search-1">
                                        <div class="search-icon">
                                            <i class="icon-magnifier  for-search-show"></i>
                                            <i class="icon-magnifier-remove  for-search-close"></i>
                                        </div>
                                    </div>
                                    <div class="header-search-1-form">
                                        <form action="#">
                                            <input type="text" name="search" value="{{ request()->search }}"
                                                placeholder="Search your keyword..." autocomplete="off">
                                            <button type="submit"><i class="icon-magnifier"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <!-- user-menu -->
                                <div class="ltn__drop-menu user-menu">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="icon-user"></i></a>
                                            <ul>
                                                @auth
                                                    @role('customer')
                                                        <li><a href="{{ route('pesanan.index') }}">Daftar Pesanan</a></li>
                                                        @elserole('penjual')
                                                        <li><a href="{{ route('list-pesanan') }}">List Pesanan </a></li>
                                                    @endrole
                                                    <li><a href="{{ url('logout') }}">Logout</a></li>
                                                @else
                                                    <li><a href="{{ route('index.login') }}">Sign in</a></li>
                                                @endauth
                                                @auth
                                                @else
                                                    <li><a href="{{ route('index.register') }}">Register</a></li>
                                                @endauth
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            {{-- <li>
                                <!-- header-wishlist -->
                                <div class="header-wishlist">
                                    <a href="wishlist.html"><i class="icon-heart"></i></a>
                                </div>
                            </li> --}}
                            @role('customer')
                                <li>
                                    <!-- mini-cart 2 -->
                                    <div class="mini-cart-icon mini-cart-icon-2">
                                        <a href="#ltn__utilize-cart-menu" class="ltn__utilize-toggle">
                                            {{-- <a href="{{ route('cart.index') }}" class=""> --}}
                                            <span class="mini-cart-icon">
                                                <i class="icon-handbag"></i>
                                                <sup>{{ session('totalCartItems.' . Auth::id(), 0) }}</sup>
                                            </span>
                                            <h6><span>Your Cart</span></h6>
                                        </a>
                                    </div>
                                </li>
                                @elserole('agen')
                                <li>
                                    <!-- mini-cart 2 -->
                                    <div class="mini-cart-icon mini-cart-icon-2">
                                        <a href="#ltn__utilize-cart-menu" class="ltn__utilize-toggle">
                                            {{-- <a href="{{ route('cart.index') }}" class=""> --}}
                                            <span class="mini-cart-icon">
                                                <i class="icon-handbag"></i>
                                                <sup>2</sup>
                                            </span>
                                            <h6><span>Your Cart</span></h6>
                                        </a>
                                    </div>
                                </li>
                            @endrole
                            <li>
                                <!-- Mobile Menu Button -->
                                <div class="mobile-menu-toggle d-xl-none">
                                    <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                                        <svg viewBox="0 0 800 600">
                                            <path
                                                d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200"
                                                id="top"></path>
                                            <path d="M300,320 L540,320" id="middle"></path>
                                            <path
                                                d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190"
                                                id="bottom"
                                                transform="translate(480, 320) scale(1, -1) translate(-480, -318) ">
                                            </path>
                                        </svg>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ltn__header-middle-area end -->
</header>
<!-- HEADER AREA END -->
<!-- Utilize Cart Menu Start -->
<div id="ltn__utilize-cart-menu" class="ltn__utilize ltn__utilize-cart-menu">
    <div class="ltn__utilize-menu-inner ltn__scrollbar">
        <div class="ltn__utilize-menu-head">
            <span class="ltn__utilize-menu-title">Cart</span>
            <button class="ltn__utilize-close">×</button>
        </div>
        <div class="mini-cart-product-area ltn__scrollbar">
            @php
                $userId = Auth::id();
                $cart = session()->get('cart.' . $userId, []);
                $total = 0;
            @endphp
            @if (!empty(session('cart')))
                @foreach ($cart as $productId => $item)
                    @php $subtotal = $item['harga'] * $item['quantity'];@endphp
                    <div class="mini-cart-item clearfix">
                        <div class="mini-cart-img">
                            @if ($item['category_id'] == 1)
                                <a href="#"><img src="{{ asset('bungapapan/' . $item['gambar']) }}"
                                        alt="Image"></a>
                                <a href="javascript:;" onclick="removeCart('{{ $item['id'] }}')">
                                    <span class="mini-cart-item-delete"><i class="icon-trash"></i></span></a>
                                <form id="remove-form-{{ $item['id'] }}"
                                    action="{{ route('cart.remove', $item['id']) }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            @else
                                <a href="#"><img src="{{ asset('bouquets/' . $item['gambar']) }}"
                                        alt="Image"></a>
                                <a href="javascript:;" onclick="removeCart('{{ $item['id'] }}')">
                                    <span class="mini-cart-item-delete"><i class="icon-trash"></i></span></a>
                                <form id="remove-form-{{ $item['id'] }}"
                                    action="{{ route('cart.remove', $item['id']) }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            @endif
                        </div>
                        <div class="mini-cart-info">
                            <h6><a href="#">{{ $item['name'] }}</a></h6>
                            <span class="mini-cart-quantity">{{ $item['quantity'] }} x Rp.
                                {{ number_format($item['harga'], 2, ',', '.') }}</span>
                        </div>
                    </div>
                    @php $total+=$subtotal;@endphp
                @endforeach
            @endif
        </div>
        <div class="mini-cart-footer">
            <div class="mini-cart-sub-total">
                <h5>Subtotal: <span>Rp. {{ number_format($total, 2, ',', '.') }}</td></span></h5>
            </div>
            <div class="btn-wrapper">
                <a href="{{ route('cart.index') }}" class="theme-btn-1 btn btn-effect-1">View Cart</a>
                <a href="{{ route('checkout') }}" class="theme-btn-2 btn btn-effect-2">Checkout</a>
            </div>
        </div>

    </div>
</div>
<!-- Utilize Cart Menu End -->

<!-- Utilize Mobile Menu Start -->
<div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
    <div class="ltn__utilize-menu-inner ltn__scrollbar">
        <div class="ltn__utilize-menu-head">
            <div class="site-logo">
                <a href="index.html"><img src="{{ asset('assets/img/logoo.jpg') }}" alt="Logo"></a>
            </div>
            <button class="ltn__utilize-close">×</button>
        </div>
        <div class="ltn__utilize-menu">
            <ul>
                <li><a href="{{ url('/') }}">Home</a>
                </li>
                @role('penjual')
                    <li><a href="{{ route('toko.index') }}">Toko</a>
                    </li>
                @endrole
                <li><a href="#">Products</a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('papanbunga.index') }}">Papan Bunga</a></li>
                        <li><a href="{{ route('bouquet.index') }}">Bouquets</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="ltn__utilize-buttons ltn__utilize-buttons-2">
            <ul>
                @auth
                    <li><a href="{{ url('logout') }}">Logout</a></li>
                @else
                    <li><a href="{{ route('index.login') }}">Sign in</a></li>
                    <li><a href="{{ route('index.register') }}">Register</a></li>
                @endauth
            </ul>
        </div>
    </div>
</div>
<!-- Utilize Mobile Menu End -->
<div class="ltn__utilize-overlay"></div>
{{-- @section('custom_js') --}}
<script>
    function removeCart(id) {

        document.getElementById('remove-form-' + id).submit();
    }
</script>
{{-- @endsection --}}
