<!doctype html>
<html lang="en">
<head>
    @include('client.layout.header')
</head>
<body>
@include('client.layout.navbar')
    @yield('content')
@include('client.layout.footer')
@include('client.layout.js')
</body>
</html>
