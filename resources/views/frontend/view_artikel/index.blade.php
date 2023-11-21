@extends('frontend.index')

@section('content')
    <div class="page-section pt-5">
        <div class="container">
            <nav aria-label="Breadcrumb">
                <ul class="breadcrumb p-0 mb-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('blog') }}">Blog</a></li>
                    <li class="breadcrumb-item active">{{$rs->judul}}</li>
                </ul>
            </nav>

            <div class="row">
                <div class="col-lg-8">
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
                                    by <a href="#">{{$rs->nama}}</a>
                                </div>


                            </div>
                        </div>
                        <h1 class="post-title">{{$rs->judul}}</h1>
                        <div class="post-meta">
                            <div class="post-date">
                                <span class="icon">
                                    <span class="mai-time-outline"></span>
                                </span> <a href="#">{{date('F d, Y', strtotime($rs->tanggal))}}</a>
                            </div>

                        </div>
                        <div class="post-content">
                            <p>{{$rs->isi_artikel}}</p>
                            
                        </div>
                    </div>



                </div>
                <div class="col-lg-4">
                    <div class="widget">
                        <!-- Widget search -->
                        <div class="widget-box">
                            <form action="#" class="search-widget">
                                <input type="text" class="form-control" placeholder="Enter keyword..">
                                <button type="submit" class="btn btn-primary btn-block">Search</button>
                            </form>
                        </div>

                        <!-- Widget Categories -->
                        <div class="widget-box">
                            <h4 class="widget-title">Category</h4>
                            <div class="divider"></div>

                            <ul class="categories">
                                <li><a href="#">LifeStyle</a></li>
                                <li><a href="#">Food</a></li>
                                <li><a href="#">Healthy</a></li>
                                <li><a href="#">Sports</a></li>
                                <li><a href="#">Entertainment</a></li>
                            </ul>
                        </div>

                        <!-- Widget recent post -->
                        <div class="widget-box">
                            <h4 class="widget-title">Recent Post</h4>
                            <div class="divider"></div>

                            <div class="blog-item">
                                <a class="post-thumb" href="">
                                    <img src="../assets/img/blog/blog-1.jpg" alt="">
                                </a>
                                <div class="content">
                                    <h6 class="post-title"><a href="#">Even the all-powerful Pointing has no
                                            control</a></h6>
                                    <div class="meta">
                                        <a href="#"><span class="mai-calendar"></span> July 12, 2018</a>
                                        <a href="#"><span class="mai-person"></span> Admin</a>
                                        <a href="#"><span class="mai-chatbubbles"></span> 19</a>
                                    </div>
                                </div>
                            </div>

                            <div class="blog-item">
                                <a class="post-thumb" href="">
                                    <img src="../assets/img/blog/blog-2.jpg" alt="">
                                </a>
                                <div class="content">
                                    <h6 class="post-title"><a href="#">Even the all-powerful Pointing has no
                                            control</a></h6>
                                    <div class="meta">
                                        <a href="#"><span class="mai-calendar"></span> July 12, 2018</a>
                                        <a href="#"><span class="mai-person"></span> Admin</a>
                                        <a href="#"><span class="mai-chatbubbles"></span> 19</a>
                                    </div>
                                </div>
                            </div>

                            <div class="blog-item">
                                <a class="post-thumb" href="">
                                    <img src="../assets/img/blog/blog-3.jpg" alt="">
                                </a>
                                <div class="content">
                                    <h6 class="post-title"><a href="#">Even the all-powerful Pointing has no
                                            control</a></h6>
                                    <div class="meta">
                                        <a href="#"><span class="mai-calendar"></span> July 12, 2018</a>
                                        <a href="#"><span class="mai-person"></span> Admin</a>
                                        <a href="#"><span class="mai-chatbubbles"></span> 19</a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Widget Tag Cloud -->
                        <div class="widget-box">
                            <h4 class="widget-title">Tag Cloud</h4>
                            <div class="divider"></div>

                            <div class="tag-clouds">
                                <a href="#" class="tag-cloud-link">Projects</a>
                                <a href="#" class="tag-cloud-link">Design</a>
                                <a href="#" class="tag-cloud-link">Travel</a>
                                <a href="#" class="tag-cloud-link">Brand</a>
                                <a href="#" class="tag-cloud-link">Trending</a>
                                <a href="#" class="tag-cloud-link">Knowledge</a>
                                <a href="#" class="tag-cloud-link">Food</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
