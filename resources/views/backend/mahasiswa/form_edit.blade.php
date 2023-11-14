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
                                <input type="text" name="nama" class="form-control" id="nama"
                                    placeholder="Masukkan nama lengkap" value="{{ $rs->nama }}">
                            </div>
                            <div class="form-group">
                                <label for="jurusan">Jurusan</label>
                                <select class="form-control" name="idjurusan" id="jurusan">
                                    <option>-- Pilih Jurusan --</option>
                                    @foreach ($ar_jurusan as $j)
                                        <option value="{{ $j->id }}"
                                            @if ($j->id == $rs->idjurusan) selected @endif>
                                            {{ $j->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputSmt">Semester</label>
                                <input type="number" name="semester" class="form-control" id="exampleInputSmt"
                                    placeholder="Name" value="{{ $rs->semester }}">
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
                            </div>

                            <div class="form-group">
                                <label for="exampleInputHP">No. Hp</label>
                                <input type="text" name="nohp" class="form-control" id="exampleInputHP"
                                    placeholder="Name" value="{{ $rs->nohp }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Email</label>
                                <input type="email" class="form-control" name="email" id="exampleInputEmail3"
                                    placeholder="Email" value="{{ $rs->email }}">
                            </div>
                            <div class="form-group">
                                <label for="basic-url" class="form-label">CV</label>
                                <input type="file" class="form-control" name="cv" />
                            </div>
                            <div class="form-group">
                                <label for="basic-url" class="form-label">Foto</label>
                                <input type="file" class="form-control" name="foto" />
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


