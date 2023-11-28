@extends('backend.index')
@section('content')
<div class="content-wrapper">
  <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-light p-3 rounded">
          <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"
              class="text-primary">Dashboard</a></li>
          <li class="breadcrumb-item">
          <a href="{{ url('/user') }}"
              class="text-primary">Kelola User</a></li>
          <li class="breadcrumb-item active" aria-current="page">Form Edit</li>
      </ol>
  </nav>
  <div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Kelola User</h4>
                <form class="forms-sample" method="POST" action="{{ route('user.update', $rs->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="nama">Nama <i class="mdi mdi-help-circle" data-toggle="tooltip"
                                title="Nama lengkap maksimal 100 karakter"></i></label>
                        <input type="text" name="name"
                            class="form-control  @error('name') is-invalid @else is-valid @enderror" id="nama"
                            placeholder="Masukkan nama lengkap" value="{{ $rs->name }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email"
                              class="form-control @error('email') is-invalid @else is-valid @enderror" name="email"
                              id="email" placeholder="Email" value="{{ $rs->email }}">
                          @error('email')
                              <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>
                    <div class="form-group">
                      <label for="role">Role</label>
                      <select class="form-control @error('role') is-invalid @else is-valid @enderror"
                      name="role" id="role">
                      <option>-- Pilih Role --</option>
                      @foreach ($ar_role as $r)
                      <option value="{{ $r}}"
                      {{ $r == $rs->role ? 'selected' : '' }}>
                      {{ $r }}
                    </option>
                    @endforeach
                  </select>
                  @error('role')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Isactive</legend>
                        <div class="col-sm-10">
                            @foreach ($ar_isactive as $i)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="isactive"
                                        value="{{ $i }}" {{ $i == $rs->isactive ? 'checked' : '' }}>
                                    <label class="form-check-label">
                                        {{ $i }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                      </fieldset>
                      @error('isactive')
                      <font color="red">{{ $message }}</font>
                      @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto"
                            class="form-label @error('foto') is-invalid @else is-valid @enderror">Foto</label>
                        <input type="file" class="form-control" name="foto" />
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                

                    <input type="datetime-local" id="timestamp" name="updated_at" value="<?php echo date('Y-m-d\TH:i'); ?>" hidden>
                    <button type="submit" class="btn btn-primary me-2">Update</button>
                    <a href="{{ route('user.index') }}" class="btn btn-light">Cancel</a>
                </form>
              
            </div>
        </div>
    </div>
</div>
</div>

@endsection