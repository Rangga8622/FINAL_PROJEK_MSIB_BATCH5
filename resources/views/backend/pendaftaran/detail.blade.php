@extends('backend.index')
@section('content')
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ $rs->nama }}</h5>
            <p class="card-text">
                Mahasiswa: {{ $rs->idmahasiswa }}
                Organisasi: {{ $rs->id }}
                <br />Tanggal Pendaftaran: {{ $rs->tanggal_pendaftaran}}
                <br />Status Pendaftaran: {{ $rs->status_pendaftaran }}
                <br />Keterangan: {{ $rs->keterangan }}
            </p>
            <a href="{{ url('/pendaftaran') }}" class="btn btn-primary">Go Back</a>
        </div>
    </div>
@endsection
