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
                        <h4 class="card-title">Form Edit Pendaftaran</h4>
                        <form class="forms-sample" method="POST" action="{{ route('pendaftaran.update', $rs->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <select name="idmahasiswa" class="form-select">
                                    <option>-- Pilih Nama --</option>
                                    @foreach ($ar_mahasiswa as $m)
                                        <option value="{{ $m->id }}"
                                            @if ($m->id == $rs->idmahasiswa) selected @endif>
                                            {{ $m->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputOrg">Organisasi</label>
                                <select name="idorganisasi" class="form-select">
                                    <option>-- Pilih Organisasi --</option>
                                    @foreach ($ar_organisasi as $o)
                                        <option value="{{ $o->id }}"
                                            @if ($o->id == $rs->idorganisasi) selected @endif>
                                            {{ $o->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputSmt">Tanggal Pendaftaran</label>
                                <input type="date" name="tanggal_pendaftaran" class="form-control" id="exampleInputSmt"
                                    placeholder="Name" value="{{ $rs->tanggal_pendaftaran }}">
                            </div>
                            <div class="form-group">
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                                    <div class="col-sm-10">
                                        @foreach ($ar_status as $s)
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status_pendaftaran"
                                                    value="{{ $s }}"
                                                    @if ($s == $rs->status_pendaftaran) checked @endif>
                                                <label class="form-check-label">
                                                    {{ $s }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </fieldset>
                            </div>

                            <div class="form-group">
                                <label for="ket">Keterangan</label>
                                <textarea class="form-control" name="keterangan" id="keterangan" rows="5" placeholder="Keterangan"
                                    value="{{ $rs->keterangan }}"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Update</button>
                            <a href="{{ url('/pendaftaran') }}" class="btn btn-light">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
