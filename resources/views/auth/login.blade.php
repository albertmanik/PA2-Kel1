<x-auth-layout title="Login">
    <!-- BREADCRUMB AREA END -->
    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area ltn__breadcrumb-area-4 ltn__breadcrumb-color-white---">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner text-center">
                        <h1 class="ltn__page-title">Account</h1>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>Login</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->
    <!-- LOGIN AREA START -->
    <div class="ltn__login-area pb-85">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area text-center">
                        <h1>Sign In <br>To Your Account</h1>
                        <p>Silahkan Login ke Akun Anda</p>
                    </div>
                </div>
            </div>
            <form action="{{ route('login') }}" id="login-form" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="account-login-inner">
                            {{-- <form action="{{ url('login') }}" class="ltn__form-box contact-form-box" method="POST">
                        @csrf --}}
                            <input class="form-control @error('email') is-invalid @enderror" type="text"
                                name="email" placeholder="Email*" value="{{ old('email') }}" autofocus>
                            @error('email')
                                <div class="invalid-feedback mb-4" style="margin-top: -4%">
                                    {{ $message }}
                                </div>
                            @enderror
                            <input class="form-control @error('password') is-invalid @enderror" type="password"
                                name="password" placeholder="Password*">
                            @error('password')
                                <div class="invalid-feedback mb-4" style="margin-top: -4%">
                                    {{ $message }}
                                </div>
                            @enderror
                            {{-- <div class="col-lg-4 col-md-6">
                            <div class="input-item">
                                <select class="nice-select" >
                                    <option selected disabled name="roles">Select Role</option>
                                    <option value="customer">Customer</option>
                                    <option value="penjual">Penjual</option>
                                    <option value="agen">Agen</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div> --}}
                            <div class="btn-wrapper mt-0">
                                <button class="theme-btn-1 btn btn-block" type="submit">SIGN IN</button>
                            </div>
                            {{-- <div class="go-to-btn mt-20">
                            <a href="#"><small>FORGOTTEN YOUR PASSWORD?</small></a>
                        </div> --}}
            </form>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="account-create text-center pt-50">
            <p>Tidak punya akun?</p>
            <div class="btn-wrapper">
                <a href="{{ url('register') }}" class="theme-btn-1 btn black-btn">CREATE ACCOUNT</a>
            </div>
        </div>
    </div>
    </div>
    </form>
    </div>
    </div>
    <!-- LOGIN AREA END -->
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
</x-auth-layout>
