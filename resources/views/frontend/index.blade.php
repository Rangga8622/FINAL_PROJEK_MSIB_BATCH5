<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>Pendaftaran Organisasi Mahasiswa di Kampus</title>

    <link href="{{ asset('frontend/assets/img/logo.png') }}" rel="icon">


    <link rel="stylesheet" href="{{ asset('frontend/assets/css/maicons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendor/animate/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('library/animate.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link href="https://fonts.googleapis.com/css?family=Maven+Pro:400,900" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ asset('acces_denied/acces_denied.css') }}" />

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
