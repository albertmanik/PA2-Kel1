<x-app-layout title="Create Toko">
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
    <div class="ltn__login-area pb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area text-center">
                        <h1>Tambah Toko Anda</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="account-login-inner">
                        @if ($toko->id)
                            <form action="{{ route('toko.update', $toko->id) }}" method="POST"
                                class="ltn__form-box contact-form-box" id="toko-form">
                                @method('PATCH')
                            @else
                                <form id="login-form" action="{{ route('toko.store') }}" method="POST"
                                    class="ltn__form-box contact-form-box" id="toko-form">
                        @endif
                        @csrf
                        <input type="text" name="nama_toko" placeholder="Masukkan Nama Toko Anda"
                            value="{{ $toko->nama_toko }}" class="form-control @error('nama_toko') is-invalid @enderror"
                            autofocus>
                        @error('nama_toko')
                            <div class="invalid-feedback mb-4" style="margin-top: -4%">
                                {{ $message }}
                            </div>
                        @enderror
                        <input type="text" name="no_rekening" placeholder="Masukkan No Rekening Anda"
                            value="{{ $toko->no_rekening }}" class="form-control @error('alamat') is-invalid @enderror">
                        @error('no_rekening')
                            <div class="invalid-feedback mb-4" style="margin-top: -4%">
                                {{ $message }}
                            </div>
                        @enderror
                        <input type="text" name="alamat" placeholder="Masukkan Alamat Toko Anda"
                            value="{{ $toko->alamat }}" class="form-control @error('alamat') is-invalid @enderror">
                        @error('alamat')
                            <div class="invalid-feedback mb-4" style="margin-top: -4%">
                                {{ $message }}
                            </div>
                        @enderror
                        {{-- <input type="status" name="email" placeholder="Email*"> --}}
                        {{-- <div>
                            <div class="input-item">
                                <select class="nice-select" name="status">
                                    <option selected disabled>Pilih Status</option>
                                    <option value="Aktif" {{ $data->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="Inactive" {{ $data->status == 'Inactive' ? 'selected' : '' }}>Tidak
                                        Aktif</option>
                                </select>
                            </div>
                        </div> --}}
                        <div class="btn-wrapper">
                            <button class="theme-btn-1 btn reverse-color btn-block" type="submit">Save</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @section('custom_js')
        <script>
            "use strict";
            const formEl = $('#login-form');
            formEl.on('submit', function(e) {
                e.preventDefault();
                KTFormControls.onSubmitForm(formEl);
            });
        </script>
    @endsection --}}
</x-app-layout>
