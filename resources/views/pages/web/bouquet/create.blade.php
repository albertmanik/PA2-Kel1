<x-app-layout title="Create Product">
    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area ltn__breadcrumb-area-4 ltn__breadcrumb-color-white---">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner text-center">
                        <h1 class="ltn__page-title">Bouquet</h1>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="{{ route('web.home') }}">Home</a></li>
                                <li>Bouquet</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->
    <div class="ltn__login-area pb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area text-center">
                        <h1>Tambah Product Anda</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="account-login-inner">
                        @if ($bouquet->id)
                            <form action="{{ route('bouquet.update', $bouquet->id) }}" method="POST"
                                enctype="multipart/form-data" class="ltn__form-box contact-form-box" id="toko-form">
                                @method('PATCH')
                            @else
                                <form action="{{ route('bouquet.store') }}" method="POST" enctype="multipart/form-data"
                                    class="ltn__form-box contact-form-box" id="toko-form">
                        @endif
                        @csrf
                        <input type="text" name="name" placeholder="Masukkan Nama Produk Anda"
                            value="{{ $bouquet->name }}" class="form-control @error('name') is-invalid @enderror"
                            autofocus>
                        @error('name')
                            <div class="invalid-feedback mb-4" style="margin-top: -4%">
                                {{ $message }}
                            </div>
                        @enderror
                        <div>
                            <div class="input-item">
                                <select class="form-control @error('category_id') is-invalid @enderror mt-3"
                                    name="category_id">
                                    <option selected disabled>Pilih Kategori Produk</option>
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $bouquet->category_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback mb-4" style="margin-top: -4%">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <input type="text" name="toko_id"
                            @foreach ($toko as $data)
                                    @if (Auth::user()->id == $data->user_id)
                                    value="{{ $data->nama_toko }} ">
                                    @endif @endforeach
                            <div>
                        <div class="input-item">
                            <select class="form-control @error('kota') is-invalid @enderror" name="kota">
                                <option selected disabled>Pilih Kecamatan Anda</option>
                                @foreach ($subdistricts as $subdistrict)
                                    <option value="{{ $subdistrict->name }}"
                                        {{ $bouquet->kota == $subdistrict->id ? 'selected' : '' }}>
                                        {{ $subdistrict->name }}</option>
                                @endforeach
                            </select>
                            @error('kota')
                                <div class="invalid-feedback mb-4" style="margin-top: -4%">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <input class="form-control @error('harga') is-invalid @enderror" type="text" name="harga"
                        placeholder="Masukkan Harga Produk Anda" value="{{ $bouquet->harga }}">
                    @error('harga')
                        <div class="invalid-feedback mb-4" style="margin-top: -4%">
                            {{ $message }}
                        </div>
                    @enderror
                    <input class="form-control @error('deskripsi') is-invalid @enderror" type="text" name="deskripsi"
                        placeholder="Masukkan Deskripsi Produk Anda" value="{{ $bouquet->deskripsi }}">
                    @error('deskripsi')
                        <div class="invalid-feedback mb-4" style="margin-top: -4%">
                            {{ $message }}
                        </div>
                    @enderror
                    <input class="form-control @error('no_hp') is-invalid @enderror" type="text" name="no_hp"
                        placeholder="Masukkan No Hp Anda" value="{{ Auth::guard('web')->user()->no_telp }}">
                    @error('no_hp')
                        <div class="invalid-feedback mb-4" style="margin-top: -4%">
                            {{ $message }}
                        </div>
                    @enderror
                    <input class="form-control @error('gambar') is-invalid @enderror" type="file" name="gambar"
                        placeholder="Masukkan Gambar Produk Anda">{{ $bouquet->gambar }}
                    <br>
                    @error('gambar')
                        <div class="invalid-feedback mb-4" style="margin-top: -4%">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="btn-wrapper">
                        <button class="theme-btn-1 btn reverse-color btn-block" type="submit">Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
