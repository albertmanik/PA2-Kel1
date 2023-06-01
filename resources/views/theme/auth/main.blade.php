<!DOCTYPE html>
<html lang="en">
    @include('theme.auth.head')
<body>
    <div class="body-wrapper">
        {{ $slot }}
        @include('theme.auth.footer')
    </div>
    @include('theme.auth.js')
</body>
</html>