@extends('backend.index')


@section('content')     
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light p-3 rounded">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"
                    class="text-primary">Dashboard</a></li>
                <li class="breadcrumb-item">
                <a href="{{ url('/organisasi') }}"
                    class="text-primary">Daftar Organisasi</a></li>
                <li class="breadcrumb-item active">Detail</a></li>
            </ol>
        </nav>
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card mb-3">

                    <div class="card-body">

                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                            <h2 class="mb-0">
                                {{ $rs->nama }}
                            </h2>

                            <div class="mt-3 mt-md-0">
                                <a href="{{ url('/organisasi') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Back
                                </a>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="card">

                    <div class="card-body">

                        <h3>Detail</h3>

                        <table class="table table-borderless table-striped">

                            <tr>
                                <td style="width: 150px"><strong>Kode</strong></td>
                                <td>{{ $rs->kode }}</td>
                            </tr>

                            <tr>
                                <td><strong>Deskripsi</strong></td>
                                <td>{{ $rs->deskripsi }}</td>
                            </tr>

                            <tr>
                                <td><strong>Email</strong></td>
                                <td>{{ $rs->email }}</td>
                            </tr>

                            <tr>
                                <td><strong>No HP</strong></td>
                                <td>{{ $rs->hp }}</td>
                            </tr>

                            <tr>
                                <td><strong>Category</strong></td>
                                <td>{{ $rs->kategori->nama }}</td>
                            </tr>

                        </table>

                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection
