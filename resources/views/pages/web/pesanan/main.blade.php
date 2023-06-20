<x-app-layout title="Daftar Pesanan">
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
                                <li><a href="{{ route('papanbunga.index') }}">Pesanan</li></a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- PRODUCT TAB AREA START -->
    <div class="ltn__product-tab-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-5">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="liton_tab_1_1">
                            <div class="ltn__myaccount-tab-content-inner">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Kode Pesanan</th>
                                                <th>Total</th>
                                                <th>Bukti Pembayaran</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pesanan as $p)
                                                @if (Auth::user()->id == $p->user_id)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $p->name }}</td>
                                                        <td>{{ $p->order_number }}</td>
                                                        <td>{{ $p->total }}</td>
                                                        <td>
                                                            <img src="{{ asset('payments/' . $p->image) }}"
                                                                style="width: 8rem">
                                                        </td>
                                                        <td>
                                                            @if ($p->status == 'menunggu')
                                                                <span>Menunggu</span>
                                                            @elseif ($p->status == 'terima' && $p->pembayaran == 'DP')
                                                                <span>Diterima, silahkan lunasi pembayaran</span>
                                                            @elseif ($p->status == 'terima' && $p->pembayaran == 'Full')
                                                                <span>Diterima</span>
                                                            @elseif ($p->status == 'tolak')
                                                                <span>Ditolak</span>
                                                            @endif
                                                        </td>
                                                        @if ($p->status == 'menunggu' && $p->pembayaran == 'Full')
                                                            <td><a href="{{ route('checkout.edit', $p->id) }}">Edit</a>
                                                            </td>
                                                        @elseif ($p->status == 'menunggu' && $p->pembayaran == 'DP')
                                                            <td><a href="{{ route('checkout.edit', $p->id) }}">Edit</a>
                                                            </td>
                                                        @elseif ($p->status == 'terima' && $p->pembayaran == 'DP')
                                                            <td><a href="{{ route('checkout.edit', $p->id) }}">Edit</a>
                                                            </td>
                                                        @elseif ($p->status == 'terima' && $p->pembayaran == 'Full')
                                                            <td><a href="{{ route('pdf', $p->id) }}">Download
                                                                    Invoice</a></td>
                                                        @endif
                                                    </tr>
                                                @endif
                                            @endforeach
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
    <!-- PRODUCT TAB AREA END -->
</x-app-layout>
