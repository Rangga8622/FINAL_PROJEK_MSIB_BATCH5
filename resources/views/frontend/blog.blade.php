@extends('frontend.index')

@section('content')
    <div class="container">
        <div class="page-banner">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-md-6">
                    <nav aria-label="Breadcrumb">
                        <ul class="breadcrumb justify-content-center py-0 bg-transparent">
                            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Blog</li>
                        </ul>
                    </nav>
                    <h1 class="text-center">Blog</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section">
        <div class="container">
            <div class="text-center wow fadeInUp">
                <div class="subhead">Our Blog</div>
                <h2 class="title-section">Read Latest News</h2>
                <div class="divider mx-auto"></div>
            </div>

            <div class="row mt-5">
                @foreach ($ar_artikel as $artikel)
                    <div class="col-lg-4 py-3 wow fadeInUp">
                        <div class="card-blog">
                            <div class="header">
                                <div class="post-thumb">
                                    {{-- <img src="{{ asset('frontend/assets/img/blog/blog-1.jpg') }}" alt=""> --}}
                                    @if ($artikel->foto_header)
                                        <img src="{{ asset('backend/artikel/foto_header') }}/{{ $artikel->foto_header }}"
                                            alt="{{ $artikel->nama }}">
                                    @else
                                        <img src="{{ asset('backend/artikel/foto_header/noimage.png') }}"
                                            alt="Default Image">
                                    @endif
                                </div>
                            </div>
                            <div class="body">
                                <h5 class="post-title"><a href="{{ route('artikel.show', $artikel->id) }}">{{ $artikel->judul }}</a></h5>
                                <div class="post-date">Posted on <a href="#">{{ $artikel->tanggal }}</a></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-12 mt-4 text-center wow fadeInUp">
                <a href="{{ url('blog') }}" class="btn btn-primary">View More</a>
            </div>
        </div>
    </div>
    </div>
@endsection
