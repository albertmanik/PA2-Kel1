<x-app-layout title="Cart">
    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area ltn__breadcrumb-area-4 ltn__breadcrumb-color-white---">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner text-center">
                        <h1 class="ltn__page-title">Cart</h1>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li>Cart</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->
    <!-- SHOPING CART AREA START -->
    <div class="liton__shoping-cart-area mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping-cart-inner">
                        <div class="shoping-cart-table table-responsive">
                            <table class="table">
                                <!-- <thead>
                                    <th class="cart-product-remove">Remove</th>
                                    <th class="cart-product-image">Image</th>
                                    <th class="cart-product-info">Product</th>
                                    <th class="cart-product-price">Price</th>
                                    <th class="cart-product-quantity">Quantity</th>
                                    <th class="cart-product-subtotal">Subtotal</th>
                                </thead> -->
                                <tbody>
                                    @php
                                        $userId = Auth::id();
                                        $cart = session()->get('cart.' . $userId, []);
                                        $total = 0;
                                    @endphp
                                    @if (!empty(session('cart')))
                                        @foreach ($cart as $productId => $item)
                                            @php $subtotal = $item['harga'] * $item['quantity'];@endphp
                                            <tr>
                                                <td class="cart-product-remove">
                                                    {{-- <a href="{{ url('/cart/remove') }}">x</a> --}}
                                                    {{-- <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ url('/cart/remove') }}" method="POST">
                                                        @csrf
                                                        <button type="submit"
                                                            class="cart-product-remove">Hapus</button>
                                                    </form> --}}
                                                    <a href="javascript:;"
                                                        onclick="removeCart('{{ $item['id'] }}')">x</a>
                                                    <form id="remove-form-{{ $item['id'] }}"
                                                        action="{{ route('cart.remove', $item['id']) }}" method="POST"
                                                        style="display: none;">
                                                        @csrf
                                                    </form>
                                                </td>
                                                <td class="cart-product-image">
                                                    @if ($item['category_id'] == 1)
                                                        <a href="product-details.html"><img
                                                                src="{{ asset('bungapapan/' . $item['gambar']) }}"
                                                                alt="#"></a>
                                                    @else
                                                        <a href="product-details.html"><img
                                                                src="{{ asset('bouquets/' . $item['gambar']) }}"
                                                                alt="#"></a>
                                                    @endif
                                                </td>
                                                <td class="cart-product-info">
                                                    <h4><a href="product-details.html">{{ $item['name'] }}</a></h4>
                                                </td>
                                                <td class="cart-product-price">Rp.
                                                    {{ number_format($item['harga'], 2, ',', '.') }}</td>
                                                <td class="cart-product-quantity">
                                                    {{-- <div class="cart-plus-minus"> --}}
                                                    <div>
                                                        <input type="text" value="{{ $item['quantity'] }}"
                                                            name="qtybutton" class="cart-plus-minus-box">
                                                    </div>
                                                </td>
                                                <td class="cart-product-subtotal">Rp.
                                                    {{ number_format($subtotal, 2, ',', '.') }}</td>
                                            </tr>
                                            @php $total+=$subtotal;@endphp
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="shoping-cart-total mt-50">
                            <h4>Cart Totals</h4>
                            <table class="table">
                                <tbody>
                                    {{-- <tr>
                                        <td>Cart Subtotal</td>
                                        <td>Rp. {{ number_format($grandtotal, 2, ',', '.') }}</td>
                                    </tr> --}}
                                    <tr>
                                        <td><strong>Order Total</strong></td>
                                        <td><strong>Rp. {{ number_format($total, 2, ',', '.') }}</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <a href="{{ route('checkout') }}" class="theme-btn-1 btn btn-effect-1">Proceed to
                                checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SHOPING CART AREA END -->
    @section('custom_js')
        <script>
            function removeCart(id) {

                document.getElementById('remove-form-' + id).submit();
            }
        </script>
    @endsection
</x-app-layout>
