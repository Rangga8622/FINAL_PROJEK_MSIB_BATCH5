@extends('backend.index')
@section('content')
    @php
        $ar_judul = ['No', 'Nama', 'Judul', 'Tanggal', 'Action'];
        $no = 1;
    @endphp
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-3 rounded">
            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"
                class="text-primary">Dashboard</a></li>
            <li class="breadcrumb-item active">Daftar Artikel</li>
        </ol>
    </nav>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Artikel</h4>
                <div class="d-flex justify-content-between mb-2">
                    <div>
                        <a href="{{ route('artikel.create') }}" class="btn btn-primary btn-xs" title="Tambah Data Mahasiswa">
                            <i class="bi bi-clipboard-plus"></i> Tambah
                        </a>
                    </div>
                    <div>
                        <form action="{{ url('artikel') }}" method="get" class="d-flex">

                            <input type="text" name="search" class="form-control form-control-xs" />

                            <button type="submit" class="btn btn-primary ">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-search"></i>
                                    <span class="ms-1">Cari</span>
                                </div>

                            </button>

                        </form>
                    </div>
                </div>
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
                            @php $no = $ar_artikel->firstItem() - 0 ; @endphp
                            @foreach ($ar_artikel as $artikel)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $artikel->nama }}</td>
                                    <td>{{ $artikel->judul }}</td>
                                    <td>{{ $artikel->tanggal }}</td>

                                    <td>
                                        <form method="POST" action="{{ route('artikel.destroy', $artikel->id) }}">
                                            @csrf
                                            @method('DELETE')

                                            <a class="btn btn-info btn-xs" href="{{ route('artikel.show', $artikel->id) }}"
                                                title="Detail Mahasiswa">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a class="btn btn-warning btn-xs"
                                                href="{{ route('artikel.edit', $artikel->id) }}" title="Ubah Mahasiswa">
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
                    <div class="d-flex justify-content-end mt-5">

                        {{ $ar_artikel->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
