@extends('backend.index')
@section('content')
    @php
        $ar_judul = ['No','Kode','Nama'];
        $no = 1;
    @endphp

    <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Daftar Jurusan</h4>
        <a href="" type="button" class="btn btn-primary btn-md" title="Tambah Data"> 
            <i class="ti-file btn-icon-prepend"></i>
            Tambah Data
        </a>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                @foreach ($ar_judul as $jdl)
                    <th>{{ $jdl }}</th>
                @endforeach
                </tr>
              </thead>
              <tbody>
              @foreach ($ar_jurusan as $j)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $j->kode }}</td>
                    <td>{{ $j->nama }}</td>
                </tr>
            @endforeach
              </tbody>
            </table>
          </div>
      </div>
    </div>
  </div>
@endsection
