<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky" data-offset="500">
        <div class="container">
            <a href="#" class="navbar-brand">Org<span class="text-primary">Enroll.</span></a>

            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse collapse" id="navbarContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ url('home') }}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('service') }}">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('blog') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('contact') }}">Contact</a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('pendaftaran_user') }}">Pendaftaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary ml-lg-2" href="{{ url('dashboard') }}">Log in</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>


</header>
