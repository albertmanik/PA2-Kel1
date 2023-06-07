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
                                                    <td>
                                                        @if ($item->status == 'pending')
                                                            <span>Pending</span>
                                                        @elseif ($item->status == 'terima')
                                                            <span>Diterima</span>
                                                        @elseif ($item->status == 'tolak')
                                                            <span>Ditolak</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item->status == 'pending')
                                                            {{-- <a href="javascript:;"
                                                                onclick="handle_confirm('Yakin?','Ya','Tidak','PATCH','{{ route('pesan.accept', $item->id) }}');">Terima</a> --}}
                                                            <a href="{{ route('pesan.accept', $item->id) }}"
                                                                onclick="event.preventDefault(); document.getElementById('accept-form-{{ $item->id }}').submit();">
                                                                Terima
                                                            </a>

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
                        <div class="tab-pane fade" id="liton_tab_1_3">
                            <div class="ltn__myaccount-tab-content-inner">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Date</th>
                                                <th>Expire</th>
                                                <th>Download</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Carsafe - Car Service PSD Template</td>
                                                <td>Nov 22, 2020</td>
                                                <td>Yes</td>
                                                <td><a href="#"><i class="far fa-arrow-to-bottom mr-1"></i>
                                                        Download File</a></td>
                                            </tr>
                                            <tr>
                                                <td>Carsafe - Car Service HTML Template</td>
                                                <td>Nov 10, 2020</td>
                                                <td>Yes</td>
                                                <td><a href="#"><i class="far fa-arrow-to-bottom mr-1"></i>
                                                        Download File</a></td>
                                            </tr>
                                            <tr>
                                                <td>Carsafe - Car Service WordPress Theme</td>
                                                <td>Nov 12, 2020</td>
                                                <td>Yes</td>
                                                <td><a href="#"><i class="far fa-arrow-to-bottom mr-1"></i>
                                                        Download File</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="liton_tab_1_4">
                            <div class="ltn__myaccount-tab-content-inner">
                                <p>The following addresses will be used on the checkout page by default.</p>
                                <div class="row">
                                    <div class="col-md-6 col-12 learts-mb-30">
                                        <h4>Billing Address <small><a href="#">edit</a></small></h4>
                                        <address>
                                            <p><strong>Alex Tuntuni</strong></p>
                                            <p>1355 Market St, Suite 900 <br>
                                                San Francisco, CA 94103</p>
                                            <p>Mobile: (123) 456-7890</p>
                                        </address>
                                    </div>
                                    <div class="col-md-6 col-12 learts-mb-30">
                                        <h4>Shipping Address <small><a href="#">edit</a></small></h4>
                                        <address>
                                            <p><strong>Alex Tuntuni</strong></p>
                                            <p>1355 Market St, Suite 900 <br>
                                                San Francisco, CA 94103</p>
                                            <p>Mobile: (123) 456-7890</p>
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="liton_tab_1_5">
                            <div class="ltn__myaccount-tab-content-inner mb-50">
                                <p>The following addresses will be used on the checkout page by default.</p>
                                <div class="ltn__form-box">
                                    <form action="#">
                                        <div class="row mb-50">
                                            <div class="col-md-6">
                                                <label>First name:</label>
                                                <input type="text" name="ltn__name">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Last name:</label>
                                                <input type="text" name="ltn__lastname">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Display Name:</label>
                                                <input type="text" name="ltn__lastname" placeholder="Ethan">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Display Email:</label>
                                                <input type="email" name="ltn__lastname"
                                                    placeholder="example@example.com">
                                            </div>
                                        </div>
                                        <fieldset>
                                            <legend>Password change</legend>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Current password (leave blank to leave unchanged):</label>
                                                    <input type="password" name="ltn__name">
                                                    <label>New password (leave blank to leave unchanged):</label>
                                                    <input type="password" name="ltn__lastname">
                                                    <label>Confirm new password:</label>
                                                    <input type="password" name="ltn__lastname">
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="btn-wrapper">
                                            <button type="submit"
                                                class="btn theme-btn-1 btn-effect-1 text-uppercase">Save
                                                Changes</button>
                                        </div>
                                    </form>
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
