@extends('backend.index')

@section('content')
    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>

    <style>
        .ck-editor__editable_inline {
            height: 500px;
        }
    </style>

    <div class="content-wrapper">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light p-3 rounded">
                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}" class="text-primary">Dashboard</a></li>
                <li class="breadcrumb-item">
                    <a href="{{ url('/artikel') }}" class="text-primary">Daftar Artikel</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Form Edit</li>
            </ol>
        </nav>
        <div class="row">

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Form Edit Artikel</h4>

                        <form class="forms-sample" method="POST" action="{{ route('artikel.update', $rs->id) }}"
                            enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama"
                                    class="form-control  @error('nama') is-invalid @else is-valid @enderror"
                                    id="exampleInputSmt" id="exampleInputSmt" placeholder="Nama"
                                    value="{{ $rs->nama }}">
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Judul Artikel</label>
                                <input type="text" name="judul"
                                    class="form-control  @error('judul') is-invalid @else is-valid @enderror"
                                    id="exampleInputSmt" id="exampleInputSmt" placeholder="Judul Artikel"
                                    value="{{ $rs->judul }}">
                                @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal"
                                    class="form-control @error('tanggal') is-invalid @else is-valid @enderror"
                                    id="exampleInputTanggal" placeholder="Tanggal"
                                    value="{{ old('tanggal', $rs->tanggal) }}">
                                @error('tanggal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select
                                    class="form-control @error('idkategori') is-invalid @else is-valid @enderror"
                                    name="idkategori" id="kategori">
                                    <option>-- Pilih Kategori --</option>
                                    @foreach ($ar_kategori as $kategori)
                                        <option value="{{ $kategori->id }}"
                                            @if ($kategori->id == old('idkategori', $rs->idkategori)) selected @endif>
                                            {{ $kategori->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('idkategori')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>



                            <div class="form-group">
                                <label>Isi Artikel</label>
                                <textarea id="editor" name="isi_artikel" class="form-control  @error('isi_artikel') is-invalid @else is-valid @enderror"
                                    rows="5">{{ old('isi_artikel', $rs->isi_artikel) }}</textarea>
                                @error('isi_artikel')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Foto Header</label>
                                <input type="file" name="foto_header"
                                    class="form-control  @error('foto_header') is-invalid @else is-valid @enderror">
                                @error('foto_header')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Foto Profile</label>
                                <input type="file" name="foto_profile"
                                    class="form-control  @error('foto_profile') is-invalid @else is-valid @enderror">
                                @error('foto_profile')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Update</button>
                            <a href="{{ route('artikel.index') }}" class="btn btn-light">Kembali</a>

                        </form>

                    </div>
                </div>
            </div>

        </div>

    </div>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
