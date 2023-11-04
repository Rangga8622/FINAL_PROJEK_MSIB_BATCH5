@extends('frontend.index')

@section('content')
    <div class="container">
        <div class="page-banner">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-md-6">
                    <nav aria-label="Breadcrumb">
                        <ul class="breadcrumb justify-content-center py-0 bg-transparent">
                            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Services</li>
                        </ul>
                    </nav>
                    <h1 class="text-center">Our Services</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card-service wow fadeInUp">
                        <div class="header">
                            <img src="{{ asset('frontend/assets/img/services/service-1.svg') }}" alt="">
                        </div>
                        <div class="body">
                            <h5 class="text-secondary">SEO Consultancy</h5>
                            <p>We help you define your SEO objective & develop a realistic strategy with you</p>
                            <a href="{{ url('service') }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card-service wow fadeInUp">
                        <div class="header">
                            <img src="{{ asset('frontend/assets/img/services/service-2.svg') }}" alt="">
                        </div>
                        <div class="body">
                            <h5 class="text-secondary">Content Marketing</h5>
                            <p>We help you define your SEO objective & develop a realistic strategy with you</p>
                            <a href="{{ url('service') }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card-service wow fadeInUp">
                        <div class="header">
                            <img src="{{ asset('frontend/assets/img/services/service-3.svg') }}" alt="">
                        </div>
                        <div class="body">
                            <h5 class="text-secondary">Keyword Research</h5>
                            <p>We help you define your SEO objective & develop a realistic strategy with you</p>
                            <a href="{{ url('service') }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .container -->
    </div> <!-- .page-section -->
@endsection
