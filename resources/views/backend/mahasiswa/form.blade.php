@extends('backend.index')
@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          {{-- @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
          <h4 class="card-title">Form Mahasiswa</h4>
          <form class="forms-sample" method="POST" action="{{ route('mahasiswa.store')}}"
          enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="exampleInputName1">Name</label>
              <input type="text" name="nama" class="form-control @error('nama') is-invalid @else is-valid @enderror" id="exampleInputName1" placeholder="Name" value="{{ old('nama') }}">
              @error('nama')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <div class="form-group">
              <select name="idjurusan" class="form-select  @error('idjurusan') is-invalid @else is-valid @enderror">
                <option>-- Pilih Jurusan --</option>
                @foreach($ar_jurusan as $j)
                    @php $sel=(old('idjurusan')==$j->id)? 'selected': ''; @endphp
                    <option value="{{ $j->id }}" {{$sel}}>{{ $j->nama }}</option>
                @endforeach
            </select>
            @error('idjurusan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
              <label for="exampleInputSmt">Semester</label>
              <input type="number" name="semester" class="form-control  @error('semester') is-invalid @else is-valid @enderror" id="exampleInputSmt" value="{{old('semester')}}" placeholder="Name">
              @error('semester')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <div class="form-group">
              <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                <div class="col-sm-10">
                    @foreach($ar_gender as $g )
                    @php $cek = (old('gender') == $g)? 'checked' : ''; @endphp
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" value="{{ $g }}" {{$cek}}>
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
              <input type="text" name="nohp" class="form-control  @error('nohp') is-invalid @else is-valid @enderror" id="exampleInputHP" placeholder="No HP" value="{{old('nohp')}}">
              @error('nohp')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <div class="form-group">
              <label for="exampleInputEmail3">Email</label>
              <input type="email" class="form-control  @error('email') is-invalid @else is-valid @enderror" name="email" id="exampleInputEmail3" placeholder="Email" value="{{old('email')}}">
              @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <div class="form-group">
              <label for="basic-url" class="form-label">CV</label>
                <input type="file" class="form-control  @error('cv') is-invalid @else is-valid @enderror" name="cv" value="{{old('cv')}}" />
                @error('cv')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
              </div>
            <div class="form-group">
              <label for="basic-url" class="form-label">Foto</label>
                <input type="file" class="form-control  @error('foto') is-invalid @else is-valid @enderror" name="foto"  value="{{old('foto')}}"/>
                @error('foto')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
              </div>
            <button type="submit" class="btn btn-primary me-2">Simpan</button>
            <a href="{{ url('/mahasiswa') }}" class="btn btn-light">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
