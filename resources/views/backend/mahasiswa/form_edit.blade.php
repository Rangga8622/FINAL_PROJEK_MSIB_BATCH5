@extends('backend.index')
@section('content')
    <div class="content-wrapper">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-3 rounded">
            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"
                class="text-primary">Dashboard</a></li>
            <li class="breadcrumb-item">
            <a href="{{ url('/mahasiswa') }}"
                class="text-primary">Daftar Mahasiswa</a></li>
            <li class="breadcrumb-item active" aria-current="page">Form Edit</li>
        </ol>
    </nav>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Form Edit Mahasiswa</h4>
                        <form class="forms-sample" method="POST" action="{{ route('mahasiswa.update', $rs->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nama">Nama <i class="mdi mdi-help-circle" data-toggle="tooltip"
                                        title="Nama lengkap maksimal 100 karakter"></i></label>
                                <input type="text" name="nama"
                                    class="form-control  @error('nama') is-invalid @else is-valid @enderror" id="nama"
                                    placeholder="Masukkan nama lengkap" value="{{ $rs->nama }}">
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jurusan">Jurusan</label>
                                <select class="form-control @error('idjurusan') is-invalid @else is-valid @enderror"
                                    name="idjurusan" id="jurusan">
                                    <option>-- Pilih Jurusan --</option>
                                    @foreach ($ar_jurusan as $j)
                                        <option value="{{ $j->id }}"
                                            {{ $j->id == $rs->idjurusan ? 'selected' : '' }}>
                                            {{ $j->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('idjurusan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="idorganisasi">Organisasi</label>
                                <select name="idorganisasi"
                                    class="form-select @error('idorganisasi') is-invalid @else is-valid @enderror">
                                    <option>-- Pilih Organisasi --</option>
                                    @foreach ($ar_organisasi as $j)
                                        <option value="{{ $j->id }}"
                                            {{ $j->id == $rs->idorganisasi ? 'selected' : '' }}>
                                            {{ $j->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('idorganisasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="semester">Semester</label>
                                <input type="number" name="semester"
                                    class="form-control @error('semester') is-invalid @else is-valid @enderror"
                                    id="semester" placeholder="Semester" value="{{ $rs->semester }}">
                                @error('semester')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                                    <div class="col-sm-10">
                                        @foreach ($ar_gender as $g)
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    value="{{ $g }}" {{ $g == $rs->gender ? 'checked' : '' }}>
                                                <label class="form-check-label">
                                                    {{ $g }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </fieldset>
                                @error('gender')
                                    <font color="red">{{ $message }}</font>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nohp">No. Hp</label>
                                <input type="text" name="nohp"
                                    class="form-control  @error('nohp') is-invalid @else is-valid @enderror" id="nohp"
                                    placeholder="No HP" value="{{ $rs->nohp }}">
                                @error('nohp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email"
                                    class="form-control @error('email') is-invalid @else is-valid @enderror" name="email"
                                    id="email" placeholder="Email" value="{{ $rs->email }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tanggal_pendaftaran">Tanggal Pendaftaran</label>
                                <input type="date" name="tanggal_pendaftaran"
                                    class="form-control @error('tanggal_pendaftaran') is-invalid @else is-valid @enderror"
                                    id="tanggal_pendaftaran" value="{{ $rs->tanggal_pendaftaran }}"
                                    placeholder="Tanggal Pendaftaran">
                                @error('tanggal_pendaftaran')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="cv"
                                    class="form-label @error('cv') is-invalid @else is-valid @enderror">CV</label>
                                <input type="file" class="form-control" name="cv" />
                                @error('cv')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="foto"
                                    class="form-label @error('foto') is-invalid @else is-valid @enderror">Foto</label>
                                <input type="file" class="form-control" name="foto" />
                                @error('foto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Update</button>
                            <a href="{{ route('mahasiswa.index') }}" class="btn btn-light">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
