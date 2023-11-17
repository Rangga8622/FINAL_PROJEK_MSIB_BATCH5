<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/dashboard') }}">
                <i class="ti-shield menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="ti-view-list-alt menu-icon"></i>
                <span class="menu-title">Master Data</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('/kategori') }}">Kategori</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('/jurusan') }}">Jurusan</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/organisasi') }}">
                <i class="ti-view-list-alt menu-icon"></i>
                <span class="menu-title">Organisasi</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/mahasiswa') }}">
                <i class="ti-view-list-alt menu-icon"></i>
                <span class="menu-title">Mahasiswa</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/pendaftaran') }}">
                <i class="ti-view-list-alt menu-icon"></i>
                <span class="menu-title">Pendaftaran</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/form') }}">
                <i class="ti-layout-list-post menu-icon"></i>
                <span class="menu-title">Form elements</span>
            </a>
        </li>

    </ul>
</nav>
