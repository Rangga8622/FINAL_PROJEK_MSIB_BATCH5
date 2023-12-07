@extends('frontend.index')

@section('content')
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
        }
    </style>

    <div class="container">
        <div class="page-banner">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-md-6">
                    <nav aria-label="Breadcrumb">
                        <ul class="breadcrumb justify-content-center py-0 bg-transparent">
                            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Pengumuman</li>
                        </ul>
                    </nav>
                    <h1 class="text-center">Pengumuman Proses Penerimaan</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="row">
                @foreach ($pendaftaransGrouped as $organisasi => $pendaftarans)
                    <div class="col-md-12">
                        <div class="card my-3 p-3">
                            <div class="card-header bg-primary px-3 pt-3 pb-2">
                                <h5 class="card-title mb-0 text-white" style="font-size: 1.2rem;">
                                    Pendaftaran :
                                    <strong>
                                        @foreach ($ar_mahasiswa as $mahasiswa)
                                            @if ($mahasiswa->organisasi->nama == $organisasi)
                                                {{ $mahasiswa->nama }}
                                            @endif
                                        @endforeach
                                    </strong>
                                </h5>
                            </div>
                            <div class="card-body pt-2 pb-3">
                                <h5 class="card-title font-weight-bold mb-3" style="font-size: 1.2rem;">
                                    {{ $organisasi }}
                                </h5>
                                @foreach ($pendaftarans as $pendaftaran)
                                    <p class="card-text mb-2">
                                        <span class="font-weight-bold">Berkas Anda: </span>
                                        {{ $pendaftaran->berkas }}
                                        <br>
                                        <span class="font-weight-bold">Status: </span>
                                        <span
                                            class="badge
                                            @if ($pendaftaran->status_pendaftaran == 'diproses') badge-secondary
                                            @elseif ($pendaftaran->status_pendaftaran == 'ditolak')
                                                badge-danger
                                            @elseif ($pendaftaran->status_pendaftaran == 'diterima')
                                                badge-success @endif
                                        ">
                                            {{ $pendaftaran->status_pendaftaran }}
                                        </span>
                                    </p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>




        </div>
    </div>
@endsection
