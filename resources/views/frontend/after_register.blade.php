@extends('frontend.index')

@section('content')
    <header>
        <div class="page-section bg-light">
            <div class="container">
                <div class="row align-items-center flex-wrap-reverse h-100">
                    <div class="col-md-6 py-5 wow fadeInLeft">
                        <h1 class="mb-4">Registrasi Telah Berhasil</h1>
                        <p class="text-lg text-grey mb-5">Selamat Registrasi Akun Telah Berhasil,Harap Tunggu Konfirmasi dari
                            Admin Kami </p>
                        <a href="{{ url('home') }}" class="btn btn-primary btn-split">Terima Kasih<div class="fab"><span
                                    class="bi bi-caret-right-fill"></span></div></a>
                    </div>

                </div>

            </div>
        </div>
    </header>
@endsection
