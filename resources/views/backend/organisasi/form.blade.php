@extends('backend.index')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        {{-- @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}

                        <h4 class="card-title">Form Input Organisasi</h4>

                        <form class="forms-sample" method="POST" action="{{ route('organisasi.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="kode">Kode Organisasi</label>
                                <input type="text" name="kode" class="form-control  @error('kode') is-invalid @else is-valid @enderror"  value="{{old('kode')}}"  id="kode" placeholder="Masukkan kode organisasi">
                                @error('kode')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nama">Nama Organisasi </label>
                                <input type="text" name="nama" class="form-control  @error('nama') is-invalid @else is-valid @enderror"  value="{{old('nama')}}" id="nama" placeholder="Masukkan nama organisasi">
                                @error('nama')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi Organisasi</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @else is-valid @enderror" value="{{old('nama')}}" name="deskripsi" id="deskripsi" rows="5" placeholder="Deskripsi organisasi"></textarea>
                                @error('deskripsi')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email Organisasi</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @else is-valid @enderror" value="{{old('email')}}" id="email" placeholder="Masukkan email organisasi">
                                @error('email')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="hp">No HP Organisasi</label>
                                <input type="text" name="hp" class="form-control @error('hp') is-invalid @else is-valid @enderror" value="{{old('hp')}}" id="hp" placeholder="Masukkan no HP organisasi">
                                @error('hp')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="kategori">Kategori Organisasi</label>
                                <select name="idkategori" class="form-select @error('idkategori') is-invalid @else is-valid @enderror">
                                    <option>-- Pilih Kategori --</option>
                                    @foreach ($ar_kategori as $k)
                                    @php $sel = (old('idkategori') == $k->id) ? 'selected' : ''; @endphp
                                        <option value="{{ $k->id }}" {{ $sel }}>{{ $k->nama }}</option>
                                    @endforeach
                                </select>
                                @error('idkategori')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                            <a href="{{ url('/mahasiswa') }}" class="btn btn-light">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
