@extends('backend.index')
@section('content')
@php
$ar_judul = ['No', 'Jurusan', 'Nama', 'Semester', 'Gender', 'Action'];
$no = 1;
@endphp
<h3>Daftar Mahasiswa</h3>
<a href="#" class="btn btn-primary btn-sm" title="Tambah Data">
    <i class="bi bi-clipboard-plus"></i> Tambah
</a>
<br /><br />
<table class="table datatable">
    <thead>
        <tr>
            @foreach($ar_judul as $jdl)
                <th>{{ $jdl }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($ar_mahasiswa as $m)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $m->jurusan->nama }}</td> 
                <td>{{ $m->nama }}</td>
                <td>{{ $m->semester }}</td>
                <td>{{ $m->gender }}</td>
                <td>
                    <form method="POST" action="#">
                        <a class="btn btn-info btn-sm" href="{{ route('asset.show', $m->id) }}" title="Detail Mahasiswa">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a class="btn btn-warning btn-sm" href="#" title="Ubah Mahasiswa">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                        <button type="submit" title="Hapus Mahasiswa" class="btn btn-danger btn-sm"
                            name="proses" value="hapus" onclick="return confirm('Anda Yakin diHapus?')">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
