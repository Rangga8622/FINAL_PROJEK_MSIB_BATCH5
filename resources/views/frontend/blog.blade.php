@extends('frontend.index')
@section('content')

<div class="page-section">
    <div class="container">
        <div class="text-center wow fadeInUp">
            <div class="subhead">Our Blog</div>
            <h2 class="title-section">Read Latest News</h2>
            <div class="divider mx-auto"></div>
        </div>

        <div class="row mt-5">
            <div class="col-lg-4 py-3 wow fadeInUp">
                <div class="card-blog">
                    <div class="header">
                        <div class="post-thumb">
                            <img src="../assets/img/blog/blog-1.jpg" alt="">
                        </div>
                    </div>
                    <div class="body">
                        <h5 class="post-title"><a href="#">Source of Content Inspiration</a></h5>
                        <div class="post-date">Posted on <a href="#">27 Jan 2020</a></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 py-3 wow fadeInUp">
                <div class="card-blog">
                    <div class="header">
                        <div class="post-thumb">
                            <img src="../assets/img/blog/blog-2.jpg" alt="">
                        </div>
                    </div>
                    <div class="body">
                        <h5 class="post-title"><a href="#">Source of Content Inspiration</a></h5>
                        <div class="post-date">Posted on <a href="#">27 Jan 2020</a></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 py-3 wow fadeInUp">
                <div class="card-blog">
                    <div class="header">
                        <div class="post-thumb">
                            <img src="../assets/img/blog/blog-3.jpg" alt="">
                        </div>
                    </div>
                    <div class="body">
                        <h5 class="post-title"><a href="#">Source of Content Inspiration</a></h5>
                        <div class="post-date">Posted on <a href="#">27 Jan 2020</a></div>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-4 text-center wow fadeInUp">
                <a href="blog.html" class="btn btn-primary">View More</a>
            </div>
        </div>
    </div>
</div>

@endsection
