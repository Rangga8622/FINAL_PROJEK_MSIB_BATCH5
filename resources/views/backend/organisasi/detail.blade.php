@extends('backend.index')
@section('content')
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ $rs->nama }}</h5>
            <p class="card-text">
                Kode Organisasi: {{ $rs->kode }}
                <br />Deskripsi: {{ $rs->deskripsi }}
                <br />Email: Rp. {{ $rs->email }}
                <br />No. HP: {{ $rs->hp }}
                <br />Kategori: {{ $rs->kategori->nama }}



            </p>
            <a href="{{ url('/organisasi') }}" class="btn btn-primary">Go Back</a>
        </div>
    </div>
@endsection
