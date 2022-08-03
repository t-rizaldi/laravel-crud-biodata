<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    {{-- Bootstrap Style --}}
    <link rel="stylesheet" href="{{ asset('libraries/bootstrap/css/bootstrap.css') }}">
    {{-- Font awesome --}}
    <link rel="stylesheet" href="{{ asset('libraries/fontawesome/css/all.css') }}">
    {{-- Custom Style --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    
    @include('partials.navbar')
    @yield('content')


    <footer class="bg-primary">
        <div class="container">
            <div class="copyright text-center">
                <p>Copyright &copy <strong>Ihsan Dev.</strong> All rights reserved</p>
            </div>
        </div>
    </footer>

    <script src="{{ asset('libraries/bootstrap/js/bootstrap.bundle.js') }}"></script>
</body>
</html>