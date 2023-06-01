<x-app-layout title="Checkout">
    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area ltn__breadcrumb-area-4 ltn__breadcrumb-color-white---">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner text-center">
                        <h1 class="ltn__page-title">Checkout</h1>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>Checkout</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- WISHLIST AREA START -->
    <div class="ltn__checkout-area mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__checkout-inner">
                        <div class="ltn__checkout-single-content mt-50">
                            <h4 class="title-2">Billing Details</h4>
                            <div class="ltn__checkout-single-content-info">
                                <h6>Personal Information</h6>
                                <form action="{{ route('checkout.create') }}" method="POST"
                                    enctype="multipart/form-data" class="ltn__form-box contact-form-box">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-item input-item-name ltn__custom-icon">
                                                <input class="form-control @error('name') is-invalid @enderror"
                                                    type="text" name="name" placeholder="Masukkan Nama Anda"
                                                    autofocus>
                                                @error('name')
                                                    <div class="invalid-feedback mb-4" style="margin-top: -2%">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="input-item input-item-phone ltn__custom-icon">
                                                <input class="form-control @error('no_hp') is-invalid @enderror"
                                                    type="text" name="no_hp" placeholder="Masukkan No Hp Anda"
                                                    value="{{ Auth::guard('web')->user()->no_telp }}">
                                                @error('no_hp')
                                                    <div class="invalid-feedback mb-4" style="margin-top: -2%">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="input-item input-item-website ltn__custom-icon">
                                                <input type="text" name="alamat"
                                                    class="form-control @error('alamat') is-invalid @enderror"
                                                    placeholder="Masukkan Lokasi Kirim">
                                                @error('alamat')
                                                    <div class="invalid-feedback mb-4" style="margin-top: -2%">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <h6>Ucapan</h6>
                                    <div class="input-item input-item-textarea ltn__custom-icon">
                                        <textarea class="form-control @error('ucapan') is-invalid @enderror" name="ucapan" placeholder="Masukkan Ucapan"></textarea>
                                        @error('ucapan')
                                            <div class="invalid-feedback mb-4" style="margin-top: -2%">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <div class="col-lg-6">
                                            <div class="ltn__checkout-payment-method mt-50">
                                                <h4 class="title-2">Bukti Pembayaran</h4>
                                                {{-- <form action="{{ route('checkout.create') }}" method="POST" enctype="multipart/form-data"
                                                    class="ltn__form-box contact-form-box">
                                                    @csrf --}}
                                                <input type="file" name="image"
                                                    placeholder="Masukkan Gambar Produk Anda"
                                                    class="form-control @error('image') is-invalid @enderror">
                                                @error('image')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="ltn__payment-note mt-30 mb-30">
                                                    <p>Your personal data will be used to process your order, support
                                                        your experience
                                                        throughout
                                                        this website, and for other purposes described in our privacy
                                                        policy.</p>
                                                </div>
                                                <button class="btn theme-btn-1 btn-effect-1 text-uppercase"
                                                    type="submit">Place
                                                    order</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="shoping-cart-total mt-50">
                        <h4 class="title-2">Detail Keranjang</h4>
                        <table class="table">
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
                                            <td>{{ $item['name'] }} <strong>× {{ $item['quantity'] }}</strong></td>
                                            <td>Rp. {{ number_format($subtotal, 2, ',', '.') }}</td>
                                        </tr>
                                        @php $total+=$subtotal;@endphp
                                    @endforeach
                                @endif
                                <tr>
                                    <td><strong>Total Harga</strong></td>
                                    <td><strong>Rp. {{ number_format($total, 2, ',', '.') }}</strong></td>
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
    <!-- WISHLIST AREA START -->
</x-app-layout>
