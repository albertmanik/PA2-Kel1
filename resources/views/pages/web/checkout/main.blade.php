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
                            <h4 class="title-2">Detail Pembayaran</h4>
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
                                        <div id="select" class="col-md-12 input-item">
                                            <select id="select"
                                                class="form-control @error('kota') is-invalid @enderror" name="kota">
                                                <option id="select" selected disabled>Pilih Kecamatan Anda</option>
                                                @foreach ($subdistricts as $subdistrict)
                                                    <option value="{{ $subdistrict->name }}">
                                                        {{ $subdistrict->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('kota')
                                                <div class="invalid-feedback mb-4" style="margin-top: -2%">
                                                    {{ $message }}
                                                </div>
                                            @enderror
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
                                                <h4 class="title-2">Metode Pembayaran</h4>
                                                <div id="checkout_accordion_1">
                                                    <!-- card -->
                                                    <div class="card">
                                                        <div data-bs-toggle="collapse" data-bs-target="#faq-item-2-1"
                                                            aria-expanded="true">
                                                            <input id="shippingMethod01" name="pembayaran"
                                                                type="radio" value="DP" class="form-check-input">
                                                            Bayar Setengah
                                                        </div>
                                                        @php
                                                            $userId = Auth::id();
                                                            $cart = session()->get('cart.' . $userId, []);
                                                            $total = 0;
                                                        @endphp
                                                        @if (!empty(session('cart')))
                                                            @foreach ($cart as $productId => $item)
                                                                @php
                                                                    $subtotal = $item['harga'] * $item['quantity'];
                                                                    $hargaBaru = $subtotal * 0.1; // Menghitung harga baru (90% dari harga asli)
                                                                @endphp
                                                                @php $total+=$hargaBaru;@endphp
                                                            @endforeach
                                                        @endif
                                                        <div id="faq-item-2-1" class="collapse show"
                                                            data-bs-parent="#checkout_accordion_1">
                                                            <div class="card-body">
                                                                <p>Silahkan Bayar DP Sebesar Rp.
                                                                    {{ number_format($total, 2, ',', '.') }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- card -->
                                                    <div class="card">
                                                        <div data-bs-toggle="collapse" data-bs-target="#faq-item-2-2"
                                                            aria-expanded="false">
                                                            <input id="shippingMethod01" name="pembayaran"
                                                                type="radio" value="Full" class="form-check-input">
                                                            Bayar Full
                                                        </div>
                                                        <div id="faq-item-2-2" class="collapse"
                                                            data-bs-parent="#checkout_accordion_1">
                                                            <div class="card-body">
                                                                <p>Silahkan bayar sesuai dengan total harga</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- card -->
                                                </div>
                                            </div>
                                        </div>
                                        <br>
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
                                                    @foreach ($toko as $data)
                                                        @if (Auth::user()->id == $data->user_id)
                                                        @endif
                                                    @endforeach
                                                    <p>Transfer Ke Nomor Rekening berikut
                                                        {{ $data->no_rekening }} dan
                                                        Upload Bukti Pembayaran</p>
                                                    <h6>
                                                        <strong>Estimasi Pengiriman 3 Hari</strong>
                                                    </h6>
                                                </div>
                                                <button onclick="payment()"
                                                    class="btn theme-btn-1 btn-effect-1 text-uppercase"
                                                    type="submit">Place
                                                    order</button>
                                                {{-- <a href="javascript:;" onclick="payment()"
                                                    class="btn theme-btn-1 btn-effect-1 text-uppercase"
                                                    data-nexttab="pills-payment-tab">Complete
                                                    Order</a> --}}
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
                                        @php
                                            $subtotal = $item['harga'] * $item['quantity'];
                                            $hargaBaru = $subtotal * 0.1; // Menghitung harga baru (90% dari harga asli)
                                        @endphp
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
    @section('custom_js')
        <script>
            function payment() {
                var payment = $('input[name="pembayaran"]:checked').val();
                console.log(payment);
            }
        </script>
    @endsection
</x-app-layout>
