@extends('frontend.index')

@section('content')
    <div class="container">
        <div class="page-banner">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-md-6">
                    <nav aria-label="Breadcrumb">
                        <ul class="breadcrumb justify-content-center py-0 bg-transparent">
                            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Contact</li>
                        </ul>
                    </nav>
                    <h1 class="text-center">Contact Us</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section">
        <div class="container">
            <div class="row">
                <!-- Address Card -->
                <div class="col-lg-4 py-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="display-4 text-center text-primary"><span class="mai-pin"></span></div>
                            <h5 class="card-title mb-3 font-weight-medium text-lg">Address</h5>
                            <p class="card-text text-secondary">203 Fake St. Mountain View, San Francisco, California, USA</p>
                        </div>
                    </div>
                </div>

                <!-- Phone Card -->
                <div class="col-lg-4 py-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="display-4 text-center text-primary"><span class="mai-call"></span></div>
                            <h5 class="card-title mb-3 font-weight-medium text-lg">Phone</h5>
                            <p class="card-text text-secondary">Rangga Ekklesia Gabriel Anugrahnu: 083143508517</p>
                            <p class="card-text text-secondary">Dimas Andhika Firmansyah: 089630147925</p>
                            <p class="card-text text-secondary">Shafa Salsabila Febriani: 08957065103095</p>
                            <p class="card-text text-secondary">Milda Khusnul Khotimah: 087863533945</p>
                            <p class="card-text text-secondary">Jhofy Ricardo P. Sitindaon: 082218994202</p>
                            
                        </div>
                    </div>
                </div>

                <!-- Email Card -->
                <div class="col-lg-4 py-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="display-4 text-center text-primary"><span class="mai-mail"></span></div>
                            <h5 class="card-title mb-3 font-weight-medium text-lg">Email Address</h5>
                            <p class="card-text text-secondary">Rangga Ekklesia Gabriel Anugrahnu: ranggaekkle20020806@gmail.com</p>
                            <p class="card-text text-secondary">Dimas Andhika Firmansyah: dmsandhika87@students.unnes.ac.id</p>
                            <p class="card-text text-secondary">Shafa Salsabila Febriani: shafafebriani4@gmail.com</p>
                            <p class="card-text text-secondary">Milda Khusnul Khotimah: mildakhusnul999@gmail.com</p>
                            <p class="card-text text-secondary">Jhofy Ricardo P. Sitindaon: jhofyricardo@icloud.com  </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
