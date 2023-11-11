@extends('backend.index')
@section('content')
<div class="content-wrapper">
    <div class="row">   
<div class="card" style="width: 18rem;">
            
            @empty($rs->foto)
				<br/><img src="{{ asset('backend/mhs/foto/noimage.png') }}" class="img-fluid rounded-start" />
			@else
				<img src="{{ asset('backend/mhs/foto') }}/{{ $rs->foto }}" />
			@endempty
        <div class="card-body">
            <h5 class="card-title">{{ $rs->nama }}</h5>
            <p class="card-text">
                Jurusan: {{ $rs->jurusan->nama}}
                <br />Semester: {{ $rs->semester }}
                <br />Gender: {{ $rs->gender }}
                <br />No HP: {{ $rs->nohp }}
                <br />Email: {{ $rs->email }}
                <br />CV: {{ $rs->cv }}
                <br />Barcode: {{ $rs->barcode }}
            </p>
            <a href="{{ url('/mahasiswa') }}" class="btn btn-primary">Go Back</a>
        </div>
    </div>
        </div>
    </div>
@endsection
