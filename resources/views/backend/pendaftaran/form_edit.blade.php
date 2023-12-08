@extends('backend.index')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-3 rounded">
            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}" class="text-primary">Dashboard</a></li>
            <li class="breadcrumb-item">
                <a href="{{ url('/pendaftaran') }}" class="text-primary">Daftar Pendaftaran</a>
            </li>
            <li class="breadcrumb-item active">Form Edit</a></li>
        </ol>
    </nav>
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
                                <input type="text" class="form-control" value="{{ $rs->mahasiswa->nama }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputOrg">Organisasi</label>
                                <input type="text" class="form-control" value="{{ $rs->mahasiswa->organisasi->nama }}"
                                    readonly>
                            </div>


                            <div class="form-group">
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                                    <div class="col-sm-10">
                                        @foreach ($ar_status as $s)
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status_pendaftaran"
                                                    value="{{ $s }}"
                                                    @if ($s == old('status_pendaftaran', $rs->status_pendaftaran)) checked @endif>
                                                <label class="form-check-label">
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
                                <textarea class="form-control" name="keterangan" id="keterangan" rows="5" placeholder="Keterangan">{{ $rs->keterangan }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Update</button>
                            <a href="{{ url('/pendaftaran') }}" class="btn btn-light">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
