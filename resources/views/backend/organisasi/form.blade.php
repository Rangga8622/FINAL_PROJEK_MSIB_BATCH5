@extends('backend.index')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <h4 class="card-title">Form Input Organisasi</h4>

                        <form class="forms-sample" method="POST" action="{{ route('organisasi.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="kode">Kode Organisasi <i class="mdi mdi-help-circle" data-toggle="tooltip"
                                        title="Kode unik organisasi maksimal 5 karakter"></i></label>
                                <input type="text" name="kode" class="form-control" id="kode"
                                    placeholder="Masukkan kode organisasi" autofocus>
                            </div>

                            <div class="form-group">
                                <label for="nama">Nama Organisasi <i class="mdi mdi-help-circle" data-toggle="tooltip"
                                        title="Nama lengkap organisasi maksimal 100 karakter"></i></label>
                                <input type="text" name="nama" class="form-control" id="nama"
                                    placeholder="Masukkan nama organisasi">
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi Organisasi</label>
                                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="5" placeholder="Deskripsi organisasi"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="email">Email Organisasi</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    placeholder="Masukkan email organisasi">
                            </div>

                            <div class="form-group">
                                <label for="hp">No HP Organisasi</label>
                                <input type="text" name="hp" class="form-control" id="hp"
                                    placeholder="Masukkan no HP organisasi">
                            </div>

                            <div class="form-group">
                                <label for="kategori">Kategori Organisasi</label>
                                <select class="form-control" name="idkategori" id="kategori">
                                    <option>-- Pilih Kategori --</option>
                                    @foreach ($ar_kategori as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                            <button class="btn btn-light">Batal</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
