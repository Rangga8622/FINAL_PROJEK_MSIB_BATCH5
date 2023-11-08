@extends('backend.index')
@section('content')
    @php
        $ar_judul = ['No','kode','Nama'];
        $no = 1;
    @endphp
    <h3>Daftar Jurusan</h3>
    <a href="" class="btn btn-primary btn-sm" title="Tambah Data">
        <i class="bi bi-clipboard-plus"></i> Tambah
    </a>
    <br /><br />
    <table class="table datatable">
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
@endsection
