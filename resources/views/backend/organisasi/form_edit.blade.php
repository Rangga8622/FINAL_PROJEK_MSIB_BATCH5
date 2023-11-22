@extends('backend.index')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Form Edit Organisasi</h4>

                        <form class="forms-sample" method="POST" action="{{ route('organisasi.update', $rs->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="kode">Kode Organisasi <i class="mdi mdi-help-circle" data-toggle="tooltip"
                                        title="Kode unik organisasi maksimal 5 karakter"></i></label>
                                <input type="text" name="kode"
                                    class="form-control @error('kode') is-invalid @else is-valid @enderror" id="kode"
                                    placeholder="Masukkan kode organisasi" value="{{ $rs->kode }}" autofocus>
                                @error('kode')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nama">Nama Organisasi <i class="mdi mdi-help-circle" data-toggle="tooltip"
                                        title="Nama lengkap organisasi maksimal 100 karakter"></i></label>
                                <input type="text" name="nama"
                                    class="form-control @error('nama') is-invalid @else is-valid @enderror" id="nama"
                                    placeholder="Masukkan nama organisasi" value="{{ $rs->nama }}">
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi Organisasi</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @else is-valid @enderror" name="deskripsi" id="deskripsi"
                                    rows="5" placeholder="Deskripsi organisasi">{{ $rs->deskripsi }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email Organisasi</label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @else is-valid @enderror" id="email"
                                    placeholder="Masukkan email organisasi" value="{{ $rs->email }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="hp">No HP Organisasi</label>
                                <input type="text" name="hp"
                                    class="form-control @error('hp') is-invalid @else is-valid @enderror" id="hp"
                                    placeholder="Masukkan no HP organisasi" value="{{ $rs->hp }}">
                                @error('hp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="kategori">Kategori Organisasi</label>
                                <select class="form-control @error('idkategori') is-invalid @else is-valid @enderror"
                                    name="idkategori" id="kategori">
                                    <option>-- Pilih Kategori --</option>
                                    @foreach ($ar_kategori as $data)
                                        <option value="{{ $data->id }}"
                                            @if ($data->id == $rs->idkategori) selected @endif>
                                            {{ $data->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('idkategori')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-warning mr-2">Update</button>
                            <a href="{{ route('organisasi.index') }}" class="btn btn-light">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
