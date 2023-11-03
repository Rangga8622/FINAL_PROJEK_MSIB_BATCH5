<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>Pendaftaran Organisasi Mahasiswa di Kampus</title>

    <link rel="stylesheet" href="{{ asset('frontend/css/maicons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/animate/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/theme.css') }}">


</head>

<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    @include('frontend.header')

    <main>
        @yield('content')
        <!-- Blog -->

            <script src="{{ asset('frontend/js/jquery-3.5.1.min.js') }}"></script>
            <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
            <script src="{{ asset('frontend/js/google-maps.js') }}"></script>
            <script src="{{ asset('frontend/vendor/wow/wow.min.js') }}"></script>
            <script src="{{ asset('frontend/js/theme.js') }}"></script>

</body>

</html>