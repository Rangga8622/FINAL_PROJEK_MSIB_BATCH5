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
                        <h4 class="card-title">Form Mahasiswa</h4>
                        <form class="forms-sample" method="POST" action="{{ route('pendaftaran.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <select name="idmahasiswa" class="form-select @error('idmahasiswa') is-invalid @else is-valid @enderror">
                                    <option>-- Pilih Nama --</option>
                                    @foreach ($ar_mahasiswa as $m)
                                        @php $sel = (old('idmahasiswa') == $m->id) ? 'selected' : ''; @endphp
                                        <option value="{{ $m->id }}" {{ $sel }}>{{ $m->nama }}</option>
                                    @endforeach
                                </select>
                                @error('idmahasiswa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputOrg">Organisasi</label>
                                <select name="idorganisasi" class="form-select @error('idorganisasi') is-invalid @else is-valid @enderror">
                                    <option>-- Pilih Organisasi --</option>
                                    @foreach ($ar_organisasi as $o)
                                        @php $sel = (old('idorganisasi') == $o->id) ? 'selected' : ''; @endphp
                                        <option value="{{ $o->id }}" {{ $sel }}>{{ $o->nama }}</option>
                                    @endforeach
                                </select>
                                @error('idorganisasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputSmt">Tanggal Pendaftaran</label>
                                <input type="date" name="tanggal_pendaftaran" class="form-control @error('tanggal_pendaftaran') is-invalid @else is-valid @enderror" 
                                id="exampleInputSmt" value="{{ old('tanggal_pendaftaran') }}" placeholder="Tanggal Pendaftaran">
                                @error('tanggal_pendaftaran')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                                    <div class="col-sm-10">
                                        @foreach ($ar_status as $s)
                                            @php $cekStatus = (old('status_pendaftaran') == $s) ? 'checked' : ''; @endphp
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status_pendaftaran" 
                                                value="{{ $s }}" {{ $cekStatus }} id="{{ $s }}">
                                                <label class="form-check-label" for="{{ $s }}">
                                                    {{ $s }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </fieldset>

                                @error('status_pendaftaran')
                                    <font color="red">{{ $message }}</font>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="ket">Keterangan</label>
                                <textarea class="form-control" name="keterangan" id="keterangan" rows="5" placeholder="Keterangan"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
                            <a href="{{ url('/pendaftaran') }}" class="btn btn-light">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
