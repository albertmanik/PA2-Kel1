<x-app-layout title="Toko">
    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area ltn__breadcrumb-area-4 ltn__breadcrumb-color-white---">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner text-center">
                        <h1 class="ltn__page-title">Toko</h1>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="{{ route('web.home') }}">Home</a></li>
                                <li>Toko</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->
    @if (empty($user->toko))
        <div class="btn-wrapper col-10">
            <a href="{{ route('toko.create') }}" class="btn theme-btn-1 btn-effect-1 text-uppercase mb-4 mx-5">Tambah
                Toko</a>
        </div>
    @else
    @endif
    <div class="table-responsive col-lg-11 text-center mx-5 mb-3">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Toko</th>
                    <th>Status</th>
                    <th>Total Produk</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($toko as $index => $item)
                    @if (Auth::user()->id == $item->user_id)
                        <tr>
                            <td>{{ $index + $toko->firstItem() }}</td>
                            <td>{{ $item->nama_toko }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->total_produk }}</td>
                            {{-- <td><a href="cart.html">View</a></td> --}}
                            <td class="text-center">
                                @if (Auth::user()->id == $item->user_id)
                                    <div class="d-flex justify-content-center ">
                                        <a href="{{ route('toko.edit', $item->id) }}">Edit</a>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('toko.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="cart-product-remove">Hapus</button>
                                        </form>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
