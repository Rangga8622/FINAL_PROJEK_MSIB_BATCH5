<!-- partial:partials/_navbar.html -->
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo me-10"><img src="{{ asset('backend/img/logo1.png') }}" class="me-2"
                alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini"><img src="{{ asset('backend/img/logo.png') }}" alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="ti-view-list"></span>
        </button>

        <ul class="navbar-nav navbar-nav-right">

            <li class="nav-item nav-profile dropdown">

                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                    @if (empty(Auth::user()->foto))
                        <img src="{{ asset('backend/img/nophoto.jpg') }}" alt="Profile" class="rounded-circle">
                    @else
                        <img src="{{ asset('backend/img/dashboard/user/' . Auth::user()->foto) }}" alt="Profile"
                            class="rounded-circle">
                    @endif
                </a>


                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" style="font-size: 20px">
                        @if (empty(Auth::user()->name))
                            {{ '' }}
                        @else
                            {{ Auth::user()->name }}
                        @endif
                    </a>
                    <span class="dropdown-item">
                        @if (empty(Auth::user()->role))
                            {{ '' }}
                        @else
                            {{ Auth::user()->role }}
                        @endif
                    </span>
                    @if (Auth::user()->role == 'admin')
                        <a class="dropdown-item" href="{{ url('/user') }}">
                            <i class="ti-settings text-primary"></i>
                            Kelola User
                        </a>
                    @elseif(Auth::check() && Auth::user()->role == 'staff')
                        <a class="dropdown-item" href="{{ route('user.edit_profile', ['id' => Auth::user()->id]) }}">
                            <i class="ti-settings text-primary"></i>
                            Edit Profil
                        </a>
                    @endif
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">

                        <i class="ti-power-off text-primary"></i>
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            onclick="toggleSidebar()">
            <span class="ti-view-list"></span>
        </button>
    </div>
</nav>
