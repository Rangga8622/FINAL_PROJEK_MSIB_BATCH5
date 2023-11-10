@extends('backend.index')
@section('content')
    @php
        $ar_judul = ['No',  'Nama','Jurusan', 'Semester', 'Gender', 'Action'];
        $no = 1;
    @endphp

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Mahasiswa</h4>
                <a href="" class="btn btn-primary btn-xs" title="Tambah Data Mahasiswa">
                    <i class="bi bi-clipboard-plus"></i> Tambah
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
                            @foreach ($ar_mahasiswa as $m)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $m->nama }}</td>
                                    <td>{{ $m->jurusan->nama }}</td>
                                    <td>{{ $m->semester }}</td>
                                    <td>{{ $m->gender }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('mahasiswa.destroy', $m->id) }}">
                                            @csrf
                                            @method('DELETE')	

                                            <a class="btn btn-info btn-xs" href="{{ route('mahasiswa.show', $m->id) }}"
                                                title="Detail Mahasiswa">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a class="btn btn-warning btn-xs" href="#" title="Ubah Mahasiswa">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>
                                            <button type="submit" title="Hapus Mahasiswa" class="btn btn-danger btn-xs"
                                                name="proses" value="hapus"
                                                onclick="return confirm('Anda Yakin diHapus?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
