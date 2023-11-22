@extends('backend.index')
@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">



                <div class="card">

                    <div class="card-body">

                        <h3>Pendaftaran</h3>

                        <table class="table table-borderless table-striped">

                            <tr>
                                <td style="width: 150px"><strong>Mahasiswa</strong></td>
                                <td>{{ $rs->mahasiswa->nama }}</td>
                            </tr>



                            <tr>
                                <td><strong>Status Pendaftaran</strong></td>
                                <td>{{ $rs->status_pendaftaran }}</td>
                            </tr>

                            <tr>
                                <td><strong>Keterangan</strong></td>
                                <td>{{ $rs->keterangan }}</td>
                            </tr>

                        </table>

                    </div>

                </div>

                <div class="card mb-3">

                    <div class="card-body">

                        <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                            <h2 class="mb-0">

                            </h2>

                            <div class="mt-3 mt-md-0">
                                <a href="{{ url('/pendaftaran') }}" type="button" class="btn btn-outline-primary btn-fw">
                                    <i class="fas fa-arrow-left"></i> Back
                                </a>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection
