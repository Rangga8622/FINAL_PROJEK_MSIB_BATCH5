<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ADMIN - ORGENROLL</title>
    <link href="{{ asset('backend/img/logo.png') }}" rel="icon">
    
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('backend/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/vendors/base/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('backend/img/logo1.jpg') }}"  />

</head>

<body>
    @include('sweetalert::alert')

    @include('backend.navbar')

    <div class="container-fluid page-body-wrapper">
        @include('backend.sidebar')

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <!-- <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-light p-3 rounded">
                                <li class="breadcrumb-item"><a href="{{ url('/admin') }}"
                                        class="text-primary">Dasboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Library</li>
                            </ol>
                        </nav> -->
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <p>{{ $message }}</p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <p>{{ $message }}</p>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        @yield('content')
                    </div>
                </div>

                @include('backend.footer')
            </div>
        </div>
    </div>



    <!-- plugins:js -->
    <script src="{{ asset('backend/vendors/base/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="{{ asset('backend/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('backend/js/off-canvas.js') }}') }}"></script>
    <script src="{{ asset('backend/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('backend/js/template.js') }}"></script>
    <script src="{{ asset('backend/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('backend/js/dashboard.js') }}"></script>
    <!-- End custom js for this page-->
    <!-- Custom js for this page-->
    <script src="{{ asset('backend/js/chart.js') }}"></script>
    <!-- End custom js for this page-->
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }

        // Kode JavaScript toggle sidebar
        const toggle = document.querySelector('.navbar-toggler');
        const sidebar = document.querySelector('.sidebar');

        toggle.addEventListener('click', function() {
            sidebar.classList.toggle('active');
        });
    </script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
    


</body>

</html>
