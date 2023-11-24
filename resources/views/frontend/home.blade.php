@extends('frontend.index')
@section('content')
    <header>
        <div class="page-section bg-light">
            <div class="container">
                <div class="row align-items-center flex-wrap-reverse h-100">
                    <div class="col-md-6 py-5 wow fadeInLeft">
                        <h1 class="mb-4">Selamat Datang di Website OrgEnroll</h1>
                        <p class="text-lg text-grey mb-5">OrgEnroll adalah platform online yang memungkinkan mahasiswa untuk
                            mendaftar ke berbagai organisasi yang ada di kampus</p>
                        <a href="{{ url('about') }}" class="btn btn-primary btn-split">Mulai<div class="fab"><span
                                    class="bi bi-caret-right-fill"></span></div></a>
                    </div>
                    <div class="col-md-6 py-5 wow zoomIn">
                        <div class="img-fluid text-center">
                            <img src="{{ asset('frontend/assets/img/home.png') }}" alt="">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </header>


    <div class="page-section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="text-center wow fadeInUp">
                    <h2 class="title-section">KELOMPOK 5 MENTOR 2</h2>

                </div>
            </div>
            <br><br>
            <div class="row justify-content-center no-gutters">

                <div class="col-2 wow zoomIn">
                    <div class="features">
                        <div class="text-center">
                            <img src="{{ asset('team/img/person_1.jpg') }}" alt="">
                        </div>
                        <h4>Ketua Kelompok</h4>
                        <h5>Rangga Ekklesia Gabriel Anugrahnu</h5>
                    </div>
                </div>

                <div class="col-2 wow zoomIn">
                    <div class="features">
                        <div class="text-center">
                            <img src="{{ asset('team/img/person_1.jpg') }}" alt="">
                        </div>

                        <h4>Anggota Kelompok</h4>
                        <h5>Rangga Ekklesia Gabriel Anugrahnu</h5>
                    </div>
                </div>

                <div class="col-2 wow zoomIn">
                    <div class="features">
                        <div class="text-center">
                            <img src="{{ asset('team/img/person_1.jpg') }}" alt="">
                        </div>
                        <h4>Ketua Kelompok</h4>
                        <h5>Rangga Ekklesia Gabriel Anugrahnu</h5>
                    </div>
                </div>

                <div class="col-2 wow zoomIn">
                    <div class="features">
                        <div class="text-center">
                            <img src="{{ asset('team/img/person_1.jpg') }}" alt="">
                        </div>
                        <h4>Ketua Kelompok</h4>
                        <h5>Rangga Ekklesia Gabriel Anugrahnu</h5>
                    </div>
                </div>

                <div class="col-2 wow zoomIn">
                    <div class="features">
                        <div class="text-center">
                            <img src="{{ asset('team/img/person_1.jpg') }}" alt="">
                        </div>
                        <h4>Ketua Kelompok</h4>
                        <h5>Rangga Ekklesia Gabriel Anugrahnu</h5>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
