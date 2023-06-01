<x-auth-layout title="Register">
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
                                <li>Register</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- LOGIN AREA START (Register) -->
    <div class="ltn__login-area pb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area text-center">
                        <h1>Register <br>Your Account</h1>
                        <p>Silahkan Registrasi Akun Anda</p>
                    </div>
                </div>
            </div>
            <form action="{{ route('register') }}" id="login-form" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="account-login-inner">
                            <form action="#" class="ltn__form-box contact-form-box"
                                style="text-align: center!important">
                                <input class="form-control @error('username') is-invalid @enderror" type="text"
                                    name="username" placeholder="Username*" value="{{ old('username') }}" autofocus>
                                @error('username')
                                    <div class="invalid-feedback mb-4" style="margin-top: -4%">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <input class="form-control @error('email') is-invalid @enderror" type="text"
                                    name="email" placeholder="Email*" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback mb-4" style="margin-top: -4%">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <input class="form-control @error('no_telp') is-invalid @enderror" type="text"
                                    name="no_telp" placeholder="Nomor Telepon*" value="{{ old('no_telp') }}">
                                @error('no_telp')
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
                                <div>
                                    <div class="input-item">
                                        <select class="form-control @error('role_id') is-invalid @enderror"
                                            name="role_id">
                                            <option selected disabled>Select Role</option>
                                            @foreach ($role as $roles)
                                                <option value="{{ $roles->id }}">{{ $roles->name }}</option>
                                            @endforeach
                                            {{-- <option value="customer">Customer</option>
                                            <option value="agen">Agen</option>
                                            <option value="penjual">Penjual</option>
                                            <option value="admin">Admin</option> --}}
                                        </select>
                                    </div>
                                </div>
                                @error('role_id')
                                    <div class="invalid-feedback mb-4" style="margin-top: -4%">
                                        {{ $message }}
                                    </div>
                                @enderror
                                {{-- <label class="checkbox-inline">
                                    <input type="checkbox" value="">
                                    I consent to Herboil processing my personal data in order to send personalized marketing material in accordance with the consent form and the privacy policy.
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="">
                                    By clicking "create account", I consent to the privacy policy.
                                </label> --}}
                                <div class="btn-wrapper">
                                    <button class="theme-btn-1 btn reverse-color btn-block" type="submit">CREATE
                                        ACCOUNT</button>
                                </div>
                            </form>
                            <div class="by-agree text-center">

                                {{-- <p>By creating an account, you agree to our:</p>
                                <p><a href="#">TERMS OF CONDITIONS  &nbsp; &nbsp; | &nbsp; &nbsp;  PRIVACY POLICY</a></p> --}}
                                <div class="go-to-btn mt-50">
                                    <a href="{{ url('login') }}">Login Disini</a>
                                </div>
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
