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



    <div class="page-section">
        <div class="container">
            <div class="text-center wow fadeInUp">
                <h2 class="title-section">KELOMPOK 5 MENTOR 2</h2>
            </div>
            <div class="row justify-content-center">

                <hr>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card border-0 bg-light p-4 text-center wow fadeInUp" data-wow-duration="0.3s"
                        data-wow-delay="0.3s"
                        style="visibility: visible; animation-duration: 0.3s; animation-delay: 0.3s; animation-name: fadeInUp;">

                        <div class="card border-0 bg-light p-4"> <img src="{{ asset('team/img/rangga.png') }}"
                                alt="" class="img-fluid rounded-circle mb-3">
                            <h5>
                                <span data-toggle="tooltip" data-placement="top"
                                    title="Rangga Ekklesia Gabriel Anugrahnu">Rangga</span>
                            </h5>

                            <p class="mb-0">PM <i class="bi bi-briefcase"></i></p>
                            <p class="mb-0"> <i class="bi bi-bank" data-toggle="tooltip" data-placement="top"
                                    title="Universitas Palangkaraya"></i> </p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card border-0 bg-light p-4 text-center  wow fadeInUp" data-wow-duration="0.3s"
                        data-wow-delay="0.3s"
                        style="visibility: visible; animation-duration: 0.3s; animation-delay: 0.3s; animation-name: fadeInUp;">
                        <div class="card border-0 bg-light p-4"> <img src="{{ asset('team/img/dimas.png') }}" alt=""
                                class="img-fluid rounded-circle mb-3">
                            <h5>
                                <span data-toggle="tooltip" data-placement="top"
                                    title="Dimas Andhika Firmansyah">Dimas</span>
                            </h5>
                            <p class="mb-0">Backend <i class="bi bi-gear"></i></p>
                            <p class="mb-0"> <i class="bi bi-bank" data-toggle="tooltip" data-placement="top"
                                    title="Kampus C"></i> </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card border-0 bg-light p-4 text-center wow fadeInUp" data-wow-duration="0.3s"
                        data-wow-delay="0.3s"
                        style="visibility: visible; animation-duration: 0.3s; animation-delay: 0.3s; animation-name: fadeInUp;">
                        <div class="card border-0 bg-light p-4"> <img src="{{ asset('team/img/salsa.png') }}" alt=""
                                class="img-fluid rounded-circle mb-3">
                            <h5>
                                <span data-toggle="tooltip" data-placement="top"
                                    title="Shafa Salsabila Febriani">Salsa</span>
                            </h5>

                            <p class="mb-0">Frontend <i class="bi bi-display"></i></p>
                            <p class="mb-0"> <i class="bi bi-bank" data-toggle="tooltip" data-placement="top"
                                    title="Kampus B"></i> </p>
                        </div>
                    </div>
                </div> <!-- Lainnya -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card border-0 bg-light p-4 text-center wow fadeInUp" data-wow-duration="0.3s"
                        data-wow-delay="0.3s"
                        style="visibility: visible; animation-duration: 0.3s; animation-delay: 0.3s; animation-name: fadeInUp;">
                        <div class="card border-0 bg-light p-4"> <img src="{{ asset('team/img/jhofy.png') }}" alt=""
                                class="img-fluid rounded-circle mb-3">
                            <h5>
                                <span data-toggle="tooltip" data-placement="top"
                                    title="Jhofy Ricardo P.Sitindaon">Jhofy</span>
                            </h5>

                            <p class="mb-0">Documentasi<i class="bi bi-file-text"></i></p>
                            <p class="mb-0"> <i class="bi bi-bank" data-toggle="tooltip" data-placement="top"
                                    title="Kampus B"></i> </p>
                        </div>
                    </div>
                </div> <!-- Lainnya -->
                <div class="col-lg-4 col-md-6 mb-4">

                    <div class="card border-0 bg-light p-4 text-center wow fadeInUp" data-wow-duration="0.3s"
                        data-wow-delay="0.3s"
                        style="visibility: visible; animation-duration: 0.3s; animation-delay: 0.3s; animation-name: fadeInUp;">
                        <div class="card border-0 bg-light p-4"> <img src="{{ asset('team/img/milda.png') }}"
                                alt="" class="img-fluid rounded-circle mb-3">
                            <h5>
                                <span data-toggle="tooltip" data-placement="top"
                                    title="Milda Khusnul Khotimah">Milda</span>
                            </h5>

                            <p class="mb-0">Database<i class="bi bi-database"></i></p>
                            <p class="mb-0"> <i class="bi bi-bank" data-toggle="tooltip" data-placement="top"
                                    title="Kampus B"></i> </p>
                        </div>
                    </div>
                </div> <!-- Lainnya -->
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
        })
    </script>


    {{-- <div class="page-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="text-center wow fadeInUp">
                    <h2 class="title-section">KELOMPOK 5 MENTOR 2</h2>
                </div>
            </div>
            <hr>
            <div class="row text-center">
                <div class="col-md-2 text-center">
                    <div class="card border-0 bg-light p-4"> <img src="{{ asset('team/img/rangga.png') }}" alt=""
                            class="img-fluid rounded-circle mb-3">
                        <h5>
                            <span data-toggle="tooltip" data-placement="top"
                                title="Rangga Ekklesia Gabriel Anugrahnu">Rangga</span>
                        </h5>

                        <p class="mb-0">PM <i class="bi bi-briefcase"></i></p>
                        <p class="mb-0"> <i class="bi bi-bank" data-toggle="tooltip" data-placement="top"
                                title="Universitas Palangkaraya"></i> </p>
                    </div>
                </div>
                <div class="col-md-2 text-center">
                    <div class="card border-0 bg-light p-4"> <img src="{{ asset('team/img/dimas.png') }}" alt=""
                            class="img-fluid rounded-circle mb-3">
                        <h5>
                            <span data-toggle="tooltip" data-placement="top"
                                title="Dimas Andhika Firmansyah">Dimas</span>
                        </h5>
                        <p class="mb-0">Backend <i class="bi bi-gear"></i></p>
                        <p class="mb-0"> <i class="bi bi-bank" data-toggle="tooltip" data-placement="top"
                                title="Kampus C"></i> </p>
                    </div>
                </div>
                <div class="col-md-2 text-center">
                    <div class="card border-0 bg-light p-4"> <img src="{{ asset('team/img/salsa.png') }}" alt=""
                            class="img-fluid rounded-circle mb-3">
                        <h5>
                            <span data-toggle="tooltip" data-placement="top"
                                title="Shafa Salsabila Febriani">Salsa</span>
                        </h5>

                        <p class="mb-0">Frontend <i class="bi bi-display"></i></p>
                        <p class="mb-0"> <i class="bi bi-bank" data-toggle="tooltip" data-placement="top"
                                title="Kampus B"></i> </p>
                    </div>
                </div>

                <div class="col-md-2 text-center">
                    <div class="card border-0 bg-light p-4"> <img src="{{ asset('team/img/jhofy.png') }}" alt=""
                            class="img-fluid rounded-circle mb-3">
                        <h5>
                            <span data-toggle="tooltip" data-placement="top"
                                title="Jhofy Ricardo P.Sitindaon">Jhofy</span>
                        </h5>

                        <p class="mb-0">Documentasi<i class="bi bi-file-text"></i></p>
                        <p class="mb-0"> <i class="bi bi-bank" data-toggle="tooltip" data-placement="top"
                                title="Kampus B"></i> </p>
                    </div>
                </div>
                <div class="col-md-2 text-center">
                    <div class="card border-0 bg-light p-4"> <img src="{{ asset('team/img/milda.png') }}" alt=""
                            class="img-fluid rounded-circle mb-3">
                        <h5>
                            <span data-toggle="tooltip" data-placement="top" title="Milda Khusnul Khotimah">Milda</span>
                        </h5>

                        <p class="mb-0">Database<i class="bi bi-database"></i></p>
                        <p class="mb-0"> <i class="bi bi-bank" data-toggle="tooltip" data-placement="top"
                                title="Kampus B"></i> </p>
                    </div>
                </div>

            </div> <!-- Row -->
        </div> <!-- Container -->
    </div> <!-- Page Section -->
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
        })
    </script> --}}


    {{-- <div class="page-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="text-center wow fadeInUp">
                    <h2 class="title-section">KELOMPOK 5 MENTOR 2</h2>
                </div>
            </div>
            <hr>
            <div id="team" class="page-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s"
                                style="visibility: visible; animation-duration: 0.3s; animation-delay: 0.3s; animation-name: fadeInUp;">
                                <div class="hover-top-in text-center">
                                    <img class="rounded-circle border border-5 border-white shadow"
                                        src="{{ asset('team/img/rangga.png') }}" alt="">
                                    <div
                                        class="mx-2 mx-xl-3 shadow rounded-3 position-relative mt-n4 bg-white p-4 pt-6 mx-4 text-center hover-top--in">
                                        <h6 class="fw-700 dark-color mb-1">Rangga Ekklesia Gabriel Anugrahnu</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s"
                                style="visibility: visible; animation-duration: 0.3s; animation-delay: 0.3s; animation-name: fadeInUp;">
                                <div class="hover-top-in text-center">
                                    <img class="rounded-circle border border-5 border-white shadow"
                                        src="{{ asset('team/img/dimas.png') }}" alt="">
                                    <div
                                        class="mx-2 mx-xl-3 shadow rounded-3 position-relative mt-n4 bg-white p-4 pt-6 mx-4 text-center hover-top--in">
                                        <h6 class="fw-700 dark-color mb-1">Dimas Andhika Firmansyah</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s"
                                style="visibility: visible; animation-duration: 0.3s; animation-delay: 0.3s; animation-name: fadeInUp;">
                                <div class="hover-top-in text-center">
                                    <img class="rounded-circle border border-5 border-white shadow"
                                        src="{{ asset('team/img/salsa.png') }}" alt="">
                                    <div
                                        class="mx-2 mx-xl-3 shadow rounded-3 position-relative mt-n4 bg-white p-4 pt-6 mx-4 text-center hover-top--in">
                                        <h6 class="fw-700 dark-color mb-1">Shafa Salsabila Febriani</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s"
                                style="visibility: visible; animation-duration: 0.3s; animation-delay: 0.3s; animation-name: fadeInUp;">
                                <div class="hover-top-in text-center">
                                    <img class="rounded-circle border border-5 border-white shadow"
                                        src="{{ asset('team/img/jhofy.png') }}" alt="">
                                    <div
                                        class="mx-2 mx-xl-3 shadow rounded-3 position-relative mt-n4 bg-white p-4 pt-6 mx-4 text-center hover-top--in">
                                        <h6 class="fw-700 dark-color mb-1">Jhofy Ricardo P.Sitindaon</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s"
                                style="visibility: visible; animation-duration: 0.3s; animation-delay: 0.3s; animation-name: fadeInUp;">
                                <div class="hover-top-in text-center">
                                    <img class="rounded-circle border border-5 border-white shadow"
                                        src="{{ asset('team/img/milda.png') }}" alt="">
                                    <div
                                        class="mx-2 mx-xl-3 shadow rounded-3 position-relative mt-n4 bg-white p-4 pt-6 mx-4 text-center hover-top--in">
                                        <h6 class="fw-700 dark-color mb-1">Milda Khusnul Khotimah</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="row justify-content-center no-gutters">

                                                                                                                    <div class="col-2">
                                                                                                                        <div class="features">
                                                                                                                            <div class="text-center">
                                                                                                                                <img src="{{ asset('team/img/rangga.png') }}" alt="">
                                                                                                                            </div>
                                                                                                                            <h5>Rangga Ekklesia Gabriel Anugrahnu</h5>
                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                    <div class="col-2 wow zoomIn">
                                                                                                                        <div class="features">
                                                                                                                            <div class="text-center">
                                                                                                                                <img src="{{ asset('team/img/dimas.png') }}" alt="">
                                                                                                                            </div>
                                                                                                                            <h4></h4>
                                                                                                                            <h5>Dimas Andhika Firmansyah</h5>
                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                    <div class="col-2 wow zoomIn">
                                                                                                                        <div class="features">
                                                                                                                            <div class="text-center">
                                                                                                                                <img src="{{ asset('team/img/salsa.png') }}" alt="">
                                                                                                                            </div>
                                                                                                                            <h5>Shafa Salsabila Febriani</h5>
                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                    <div class="col-2 wow zoomIn">
                                                                                                                        <div class="features">
                                                                                                                            <div class="text-center">
                                                                                                                                <img src="{{ asset('team/img/milda.png') }}" alt="">
                                                                                                                            </div>
                                                                                                                            <h5>Milda Khusnul Khotimah</h5>
                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                    <div class="col-2 wow zoomIn">
                                                                                                                        <div class="features">
                                                                                                                            <div class="text-center">
                                                                                                                                <img src="{{ asset('team/img/person_1.jpg') }}" alt="">
                                                                                                                            </div>
                                                                                                                            <h5>Jhofy Ricardo p.sitindaon</h5>
                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                </div> -->

        </div>
    </div> --}}
@endsection
