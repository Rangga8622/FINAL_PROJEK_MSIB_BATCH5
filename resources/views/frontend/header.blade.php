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
                        <a class="nav-link" href="{{ url('contact') }}">Contact</a>
                    </li>

                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('blog') }}">Blog</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('form_mahasiswa.create') }}">Pendaftaran</a>
                        </li>
                        @if (Auth::user()->role == 'mahasiswa')
                            <li class="nav-item">
                                <a class="btn btn-primary ml-lg-2" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @elseif (Auth::user()->role == 'admin' || Auth::user()->role == 'staff')
                            <li class="nav-item">
                                <a class="btn btn-primary ml-lg-2" href="{{ url('dashboard') }}">Halaman Dasboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-primary ml-lg-2" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endif
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>
