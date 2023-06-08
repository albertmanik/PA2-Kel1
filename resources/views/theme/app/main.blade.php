<!DOCTYPE html>
<html lang="en">
@include('theme.app.head')
@stack('style')

<body>
    <div class="body-wrapper">
        @include('theme.app.header')
        <div>
            {{ $slot }}
        </div>
        @include('theme.app.footer')
        @include('theme.app.modal')

    </div>
    @include('theme.app.js')
    @yield('custom_js')
</body>

</html>
