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
</head>

<body class="page-section bg-light">


        <div class="container">
            <div class="row align-items-center flex-wrap-reverse h-100">
                <div class="col-md-6 py-5 wow fadeInLeft">
                    <h1 class="mb-4">Registrasi Telah Berhasil</h1>
                    <p class="text-lg text-grey mb-5">Selamat! Registrasi Akun Telah Berhasil. Harap Tunggu
                        Konfirmasi dari Admin Kami.</p>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="btn btn-primary btn-split">
                        Terima Kasih
                        <div class="fab">
                            <span class="bi bi-emoji-laughing-fill"></span>
                        </div>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    


    <script src="{{ asset('frontend/assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/google-maps.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/theme.js') }}"></script>
</body>

</html>
