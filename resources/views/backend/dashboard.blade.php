@extends('backend.index')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0">Dashboard</h4>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-md-center text-xl-left">Organisasi</p>
                        <div
                            class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{ $ar_organisasi }}</h3>
                            <i class="bi bi-diagram-3-fill icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                        </div>
                        <p class="mb-0 mt-2 text-danger">Jumlah organisasi
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-md-center text-xl-left">Pendaftaran</p>
                        <div
                            class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{ $ar_pendaftaran }}</h3>
                            <i class="bi bi-people-fill icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                        </div>
                        <p class="mb-0 mt-2 text-danger">Jumlah Pendaftaran
                        </p>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin grid-margin-lg-0 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Kategori Organisasi</h4>
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
