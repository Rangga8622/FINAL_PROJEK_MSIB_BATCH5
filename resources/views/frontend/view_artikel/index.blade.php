@extends('frontend.index')

@section('content')
    <div class="page-section pt-5">
        <div class="container">
            <nav aria-label="Breadcrumb">
                <ul class="breadcrumb p-0 mb-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('blog') }}">Blog</a></li>
                    <li class="breadcrumb-item active">{{ $rs->judul }}</li>
                </ul>
            </nav>

            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="blog-single-wrap">
                        <div class="header">

                            <div class="post-thumb">
                                @if ($rs->foto_header)
                                    <img src="{{ asset('backend/artikel/foto_header') }}/{{ $rs->foto_header }}">
                                @else
                                    <img src="{{ asset('backend/artikel/foto_header/noimage.png') }}">
                                @endif
                            </div>
                            <div class="meta-header">
                                <div class="post-author">
                                    <div class="avatar">
                                        @if ($rs->foto_profile)
                                            <img src="{{ asset('backend/artikel/foto_profile') }}/{{ $rs->foto_profile }}">
                                        @else
                                            <img src="{{ asset('backend/mhs/foto/noimage.png') }}">
                                        @endif
                                    </div>
                                    by <a href="#">{{ $rs->nama }}</a>
                                </div>


                            </div>
                        </div>
                        <h1 class="post-title">{{ $rs->judul }}</h1>
                        <div class="post-meta">
                            <div class="post-date">
                                <span class="icon">
                                    <span class="mai-time-outline"></span>
                                </span> <a href="#">{{ date('F d, Y', strtotime($rs->tanggal)) }}</a>
                            </div>

                        </div>
                        <div class="post-content">
                            <p>{!! $rs->isi_artikel !!}</p>

                        </div>
                    </div>



                </div>
               
            </div>

        </div>
    </div>
@endsection
