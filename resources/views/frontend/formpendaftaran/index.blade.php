@extends('frontend.index')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <p>{{ $message }}</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <p>{{ $message }}</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h2>Pengumuman</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Mahasiswa</th>
                        <th>Status Pendaftaran</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendaftarans as $pendaftaran)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pendaftaran->mahasiswa->nama }}</td>
                            <td>{{ $pendaftaran->status_pendaftaran }}</td>
                            <td>{{ $pendaftaran->keterangan ?? 'Belum ada keterangan' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
