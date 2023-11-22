@extends('backend.index')
@section('content')
    <div class="content-wrapper">
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
                                <label for="nama">Name <i class="mdi mdi-help-circle" data-toggle="tooltip"
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
                                            @if ($j->id == $rs->idjurusan) selected @endif>
                                            {{ $j->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('idjurusan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputOrg">Organisasi</label>
                                <select name="idorganisasi"
                                    class="form-select @error('idorganisasi') is-invalid @else is-valid @enderror">
                                    <option>-- Pilih Organisasi --</option>
                                    @foreach ($ar_jurusan as $j)
                                        @php $sel = (old('idorganisasi') == $j->id) ? 'selected' : ''; @endphp
                                        <option value="{{ $j->id }}" {{ $sel }}>{{ $j->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('idorganisasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputSmt">Semester</label>
                                <input type="number" name="semester"
                                    class="form-control @error('semester') is-invalid @else is-valid @enderror"
                                    id="exampleInputSmt" id="exampleInputSmt" placeholder="Semester"
                                    value="{{ $rs->semester }}">
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
                                                    value="{{ $g }}"
                                                    @if ($g == $rs->gender) checked @endif>
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
                                <label for="exampleInputHP">No. Hp</label>
                                <input type="text" name="nohp"
                                    class="form-control  @error('nohp') is-invalid @else is-valid @enderror"
                                    id="exampleInputHP" placeholder="No HP" id="exampleInputHP" placeholder="Name"
                                    value="{{ $rs->nohp }}">
                                @error('nohp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Email</label>
                                <input type="email"
                                    class="form-control @error('email') is-invalid @else is-valid @enderror" name="email"
                                    id="exampleInputEmail3" placeholder="Email" name="email" id="exampleInputEmail3"
                                    placeholder="Email" value="{{ $rs->email }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputSmt">Tanggal Pendaftaran</label>
                                <input type="date" name="tanggal_pendaftaran"
                                    class="form-control @error('tanggal_pendaftaran') is-invalid @else is-valid @enderror"
                                    id="exampleInputSmt" value="{{ $rs->tanggal_pendaftaran }}"
                                    placeholder="Tanggal Pendaftaran">
                                @error('tanggal_pendaftaran')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="basic-url" class="form-label @error('cv') is-invalid @else is-valid @enderror"
                                    name="cv">CV</label>
                                <input type="file" class="form-control" name="cv" />
                                @error('cv')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="basic-url" class="form-label @error('foto') is-invalid @else is-valid @enderror"
                                    name="foto">Foto</label>
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
