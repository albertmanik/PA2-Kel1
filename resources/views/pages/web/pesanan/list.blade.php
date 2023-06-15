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
                                <li><a href="{{ route('list-pesanan') }}">Pesanan</li></a>
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
                    <form action="{{ route('pesanan.filter') }}" method="GET">
                        <div class="form-group">
                            <label for="start_date">Tanggal Mulai:</label>
                            <input type="date" id="start_date" name="start_date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="end_date">Tanggal Akhir:</label>
                            <input type="date" id="end_date" name="end_date" class="form-control">
                        </div>
                        <button type="submit" class="btn theme-btn-1 btn-effect-1 mt-2 mb-3">Filter</button>
                        <a href="{{ route('penjual.pdf') }}"
                            class="btn theme-btn-1 btn-effect-1 text-uppercase mt-2 mb-3">Export PDF</a>
                        {{-- <a href="{{ route('list-pesanan') }}" class="btn btn-secondary">Reset</a> --}}
                    </form>
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
                                                <th>Tanggal Pesanan</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($list as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->order_number }}</td>
                                                    <td>{{ $item->total }}</td>
                                                    <td>
                                                        <img src="{{ asset('payments/' . $item->image) }}"
                                                            style="width: 8rem">
                                                    </td>
                                                    <td>{{ $item->created_at }}</td>
                                                    <td>
                                                        @if ($item->status == 'menunggu')
                                                            <span>Menunggu</span>
                                                        @elseif ($item->status == 'terima')
                                                            <span>Diterima</span>
                                                        @elseif ($item->status == 'tolak')
                                                            <span>Ditolak</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item->status == 'menunggu')
                                                            {{-- <a href="javascript:;"
                                                                onclick="handle_confirm('Yakin?','Ya','Tidak','PATCH','{{ route('pesan.accept', $item->id) }}');">Terima</a> --}}
                                                            <a href="{{ route('pesan.accept', $item->id) }}"
                                                                onclick="event.preventDefault(); document.getElementById('accept-form-{{ $item->id }}').submit();">
                                                                Terima
                                                            </a>
                                                            <form id="accept-form-{{ $item->id }}"
                                                                action="{{ route('pesan.accept', $item->id) }}"
                                                                method="POST" style="display: none;">
                                                                @csrf
                                                                @method('PATCH')
                                                            </form>
                                                            {{-- <form id="accept-form-{{ $item->id }}"
                                                                action="{{ route('pesan.accept', $item->id) }}"
                                                                method="POST" style="display: none;">
                                                                @csrf
                                                                @method('PATCH')
                                                            </form> --}}
                                                            {{-- <button type="submit" class="theme-btn-1 btn btn-block"
                                                                onclick="event.preventDefault(); document.getElementById('accept-form-{{ $item->id }}').submit();">Kirim</button> --}}
                                                            <a href="{{ route('pesan.reject', $item->id) }}"
                                                                onclick="event.preventDefault(); document.getElementById('reject-form-{{ $item->id }}').submit();">
                                                                Tolak
                                                            </a>
                                                            <form id="reject-form-{{ $item->id }}"
                                                                action="{{ route('pesan.reject', $item->id) }}"
                                                                method="POST" style="display: none;">
                                                                @csrf
                                                                @method('PATCH')
                                                            </form>
                                                        @endif
                                                    </td>
                                                </tr>
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
