<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg">
@include('theme.admin.head')
<body>
    <div id="layout-wrapper">
        @include('theme.admin.header')
        @include('theme.admin.navbar')
        <div>
            {{ $slot }}
        </div>
        @include('theme.admin.footer')
    </div>
    @include('theme.admin.js')
    @yield('custom_js')
</body>
</html>
