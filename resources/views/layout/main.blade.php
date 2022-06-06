<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>David</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

<meta name="csrf-token" content="{{ csrf_token()}}">
</head>
<body>
    @include('layout.partials.header')
    <main class="main">
        @yield('main')
    </main>
    @include('layout.partials.footer')
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
