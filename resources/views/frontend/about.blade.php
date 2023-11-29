@extends('frontend.index')
@section('content')
    <div class="container">
        <div class="page-banner">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-md-6">
                    <nav aria-label="Breadcrumb">
                        <ul class="breadcrumb justify-content-center py-0 bg-transparent">
                            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">About</li>
                        </ul>
                    </nav>
                    <h1 class="text-center">About Us</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 py-3 wow fadeInUp">
                    <span class="subhead">About us</span>
                    <h2 class="title-section">Organisation Enrollment System : Sistem Pendaftaran Organisasi</h2>
                    <div class="divider"></div>

                    <p>Sistem pendaftaran organisasi yang canggih dan efisien telah dirancang untuk menyederhanakan proses
                        pendaftaran dan pengelolaan anggota, memastikan kelancaran administrasi, dan memperkuat
                        keterhubungan antara anggota organisasi.</p>
                    <p>Dengan menggunakan teknologi terkini, sistem ini
                        memungkinkan calon anggota untuk mendaftar secara online melalui antarmuka yang ramah pengguna,
                        meminimalkan kerumitan dan waktu yang dibutuhkan dalam pengumpulan data dan dokumen.</p>

                </div>
                <div class="col-lg-6 py-3 wow fadeInRight">
                    <div class="img-fluid py-3 text-center">
                        <img src="{{ asset('frontend/assets/img/about.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div> <!-- .container -->
    </div> <!-- .page-section -->
@endsection
