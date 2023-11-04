@extends('frontend.index')
@section('content')
    <div class="container">
        <div class="page-banner">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-md-6">
                    <nav aria-label="Breadcrumb">
                        <ul class="breadcrumb justify-content-center py-0 bg-transparent">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Pendaftaran</li>
                        </ul>
                    </nav>
                    <h1 class="text-center">Formulir Pendaftaran</h1>
                </div>
            </div>
        </div>
    </div>  
    <div class="page-section">
        <div class="container"> 
            <h2 class="alert alert-primary text-center mt-3">Formulir Pendaftaran Organisasi</h2>
            <form>
                <div class="form-group">
                    <label>Id Mahasiswa</label>
                    <input type="id" name="" class="form-control" placeholder="Masukan Id">
                </div>
                <div class="form-group">
                    <label>Jurusan</label>
                    <input type="text" name="" class="form-control" placeholder="Masukan Jurusan">
                </div>
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="" class="form-control" placeholder="Masukan Nama Lengkap">
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1"> Perempuan </label>
                    </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2"> Laki-Laki </label>
                    </div>          
                </div>
                <div class="form-group">
                    <label>No Telepon</label>
                    <input type="number" name="" class="form-control" placeholder="Masukan No Telp">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="" class="form-control" placeholder="Masukan Email">
                </div>
                <div class="form-group">
                    <label>Pengalaman</label>
                    <input type="text" name="" class="form-control" placeholder="Masukan Pengalaman">
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection