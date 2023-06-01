<!-- All JS Plugins -->
<script src="{{ asset('assets/js/plugins.js') }}"></script>
<!-- Main JS -->
<script src="{{ asset('assets/js/main.js') }}"></script>
{{-- Toastr --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{ asset('js/sweetalert.js') }}"></script>
<script src="{{ asset('js/FormControls.js') }}"></script>
{{-- @yield('custom_js') --}}
<script>
    @if (session()->has('success'))
        toastr.options = {
            "progressBar": true,
            "timeOut": 2000,
            "closeButton": true
        }
        toastr.success("{{ session()->get('success') }}");
    @endif
    @if (session()->has('LoginError'))
        toastr.options = {
            "progressBar": true,
            "timeOut": 2000,
            "closeButton": true
        }
        toastr.error("{{ session()->get('LoginError') }}");
    @endif
</script>
{{-- @if (session()->has('LoginError'))
    <script>
        toastr.error("{!! session('LoginError') !!}");
    </script>
@endif --}}
