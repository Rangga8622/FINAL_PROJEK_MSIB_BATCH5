@extends('frontend.index')
@section('content')
    <div id="notfound">
        <div class="notfound">
            <div class="notfound-404">
                <h1>Acces Denied</h1>
            </div>
            <h2>Mohon Maaf Akun Anda tidak memiliki Akses ke Halaman ini</h2>

            <a href="{{ url('/home') }}">Kembali</a>
        </div>
    </div>
@endsection
