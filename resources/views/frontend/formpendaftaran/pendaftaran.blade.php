@extends('frontend.index')

@section('content')
    <div class="container">
        <div class="page-banner">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-md-6">
                    <nav aria-label="Breadcrumb">
                        <ul class="breadcrumb justify-content-center py-0 bg-transparent">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active">Pendaftaran</li>
                        </ul>
                    </nav>
                    <h1 class="text-center">Formulir Pendaftaran</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="animate__animated animate__fadeIn animate__delay-1s">
        <div class="page-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="card border-0">
                            <div class="card-header bg-primary text-center">
                                <h4 class="text-white">Isi Formulir Pendaftaran</h4>
                            </div>

                            <div class="card-body">
                                <form action="{{ route('form_mahasiswa.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <!-- Form input -->
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" name="nama"
                                            class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}"
                                            placeholder="Masukkan Nama Lengkap" value="{{ old('nama') }}">
                                        @error('nama')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Jurusan</label>
                                        <select name="idjurusan"
                                            class="form-control {{ $errors->has('idjurusan') ? 'is-invalid' : '' }}">
                                            <option value="">Pilih Jurusan</option>
                                            @foreach ($ar_jurusan as $jurusan)
                                                <option value="{{ $jurusan->id }}"
                                                    {{ old('idjurusan') == $jurusan->id ? 'selected' : '' }}>
                                                    {{ $jurusan->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('idjurusan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Daftar Organisasi</label>
                                        <select name="idorganisasi"
                                            class="form-control {{ $errors->has('idorganisasi') ? 'is-invalid' : '' }}">
                                            <option value="">Pilih Organisasi</option>
                                            @foreach ($ar_organisasi as $organisasi)
                                                <option value="{{ $organisasi->id }}"
                                                    {{ old('idorganisasi') == $organisasi->id ? 'selected' : '' }}>
                                                    {{ $organisasi->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('idorganisasi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Semester</label>
                                        <input type="text" name="semester"
                                            class="form-control {{ $errors->has('semester') ? 'is-invalid' : '' }}"
                                            placeholder="Masukkan Semester" value="{{ old('semester') }}">
                                        @error('semester')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <fieldset class="row mb-3">
                                            <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                                            <div class="col-sm-10">
                                                @foreach ($ar_gender as $g)
                                                    @php $cek = (old('gender') == $g) ? 'checked' : ''; @endphp
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender"
                                                            value="{{ $g }}" {{ $cek }}>
                                                        <label class="form-check-label">
                                                            {{ $g }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </fieldset>
                                        @error('gender')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>No Telepon</label>
                                        <input type="number" name="nohp"
                                            class="form-control {{ $errors->has('nohp') ? 'is-invalid' : '' }}"
                                            placeholder="Masukkan No Telp" value="{{ old('nohp') }}">
                                        @error('nohp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email"
                                            class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                            placeholder="Masukkan Email" value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Tanggal Pendaftaran</label>
                                        <input type="date" name="tanggal_pendaftaran"
                                            class="form-control {{ $errors->has('tanggal_pendaftaran') ? 'is-invalid' : '' }}"
                                            placeholder="Masukkan Tanggal Pendaftaran"
                                            value="{{ old('tanggal_pendaftaran') }}">
                                        @error('tanggal_pendaftaran')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>CV</label>
                                        <input type="file" name="cv"
                                            class="form-control {{ $errors->has('cv') ? 'is-invalid' : '' }}"
                                            accept=".pdf, .doc">
                                        @error('cv')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Foto</label>
                                        <input type="file" name="foto"
                                            class="form-control {{ $errors->has('foto') ? 'is-invalid' : '' }}"
                                            accept="image/*">
                                        @error('foto')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Form button -->
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Daftar Sekarang
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
