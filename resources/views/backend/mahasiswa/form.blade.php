@extends('backend.index')
@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
          <h4 class="card-title">Form Mahasiswa</h4>
          <form class="forms-sample" method="POST" action="{{ route('mahasiswa.store')}}"
          enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="exampleInputName1">Name</label>
              <input type="text" name="nama" class="form-control" id="exampleInputName1" placeholder="Name">
            </div>
            <div class="form-group">
              <select name="idjurusan" class="form-select">
                <option>-- Pilih Jurusan --</option>
                @foreach($ar_jurusan as $j)
                    <option value="{{ $j->id }}">{{ $j->nama }}</option>
                @endforeach
            </select>
            </div>
            <div class="form-group">
              <label for="exampleInputSmt">Semester</label>
              <input type="number" name="semester" class="form-control" id="exampleInputSmt" placeholder="Name">
            </div>
            <div class="form-group">
              <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                <div class="col-sm-10">
                    @foreach($ar_gender as $g )
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" value="{{ $g }}">
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
              <input type="text" name="nohp" class="form-control" id="exampleInputHP" placeholder="Name">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail3">Email</label>
              <input type="email" class="form-control" name="email" id="exampleInputEmail3" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="basic-url" class="form-label">CV</label>
                <input type="file" class="form-control" name="cv" />
            </div>
            <div class="form-group">
              <label for="basic-url" class="form-label">Foto</label>
                <input type="file" class="form-control" name="foto" />
            </div>
            <button type="submit" class="btn btn-primary me-2">Submit</button>
            <a href="{{ url('/mahasiswa') }}" class="btn btn-light">Cancel</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection