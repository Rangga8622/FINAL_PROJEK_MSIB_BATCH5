<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>Pendaftaran Organisasi Mahasiswa di Kampus</title>

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/maicons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/animate/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">


</head>

<body>


    @include('frontend.header')

    <main>
        @yield('content')
    </main>

    @include('frontend.footer')

    <script src="{{ asset('frontend/assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/google-maps.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/theme.js') }}"></script>

</body>

</html>
