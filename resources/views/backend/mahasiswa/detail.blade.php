@extends('backend.index')
@section('content')
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ $rs->nama }}</h5>
            <p class="card-text">
                Jurusan: {{ $rs->jurusan->nama}}
                <br />Semester: {{ $rs->semester }}
                <br />Gender: {{ $rs->gender }}
                <br />No HP: {{ $rs->nohp }}
                <br />Email: {{ $rs->email }}
                <br />CV: {{ $rs->cv }}
                <br />Foto: {{ $rs->foto }}
                <br />Barcode: {{ $rs->barcode }}
            </p>
            <a href="{{ url('/mahasiswa') }}" class="btn btn-primary">Go Back</a>
        </div>
    </div>
@endsection
