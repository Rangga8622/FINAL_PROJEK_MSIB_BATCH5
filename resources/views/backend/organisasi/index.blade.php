@extends('backend.index')
@section('content')
    @php
        $ar_judul = ['No', 'Kode', 'Kategori', 'Nama', 'Action'];
        $no = 1;
    @endphp
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-3 rounded">
            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"
                class="text-primary">Dashboard</a></li>
            <li class="breadcrumb-item active">Daftar Organisasi</li>
        </ol>
    </nav>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tabel Organisasi</h4>

                <div class="d-flex justify-content-between mb-2">
                    <div>
                        <a href="{{ route('organisasi.create') }}" class="btn btn-primary btn-xs"
                            title="Tambah Data Mahasiswa">
                            <i class="bi bi-clipboard-plus"></i> Tambah
                        </a>
                    </div>

                    <div>
                        <form action="{{ url('organisasi') }}" method="get" class="d-flex">

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
                            @php $no = $ar_organisasi->firstItem() - 0 ; @endphp
                            @foreach ($ar_organisasi as $o)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $o->kode }}</td>
                                    <td>{{ $o->kategori->nama }}</td>
                                    <td>{{ $o->nama }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('organisasi.destroy', $o->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('organisasi.show', $o->id) }}" title="Detail Organisasi"
                                                class="btn btn-info btn-xs ">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('organisasi.edit', $o->id) }}" title="Ubah Organisasi"
                                                class="btn btn-warning btn-xs">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <button type="submit" title="Hapus Organisasi" class="btn btn-danger btn-xs"
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

                        {{ $ar_organisasi->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
