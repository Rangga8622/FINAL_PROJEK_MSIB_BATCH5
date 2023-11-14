@extends('backend.index')
@section('content')
    @php
        $ar_judul = ['No', 'Mahasiswa', 'Organisasi', 'Tanggal Pendaftaran', 'Status Pendaftaran', 'Keterangan', 'Action'];
        $no = 1;
    @endphp

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tabel Pendaftaran</h4>
                <a href="{{ route('pendaftaran.create') }}" class="btn btn-primary btn-xs" title="Tambah Data Mahasiswa">
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
                            @php $no = $ar_pendaftaran->firstItem() - 0 ; @endphp
                            @foreach ($ar_pendaftaran as $p)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $p->mahasiswa->nama }}</td>
                                    <td>{{ $p->organisasi->nama }}</td>
                                    <td>{{ $p->tanggal_pendaftaran }}</td>
                                    <td>{{ $p->status_pendaftaran }}</td>
                                    <td>{{ $p->keterangan }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('pendaftaran.destroy', $p->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-info btn-xs" href="{{ route('pendaftaran.show', $p->id) }}"
                                                title="Detail Pendaftaran">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a class="btn btn-warning btn-xs"
                                                href="{{ route('pendaftaran.edit', $p->id) }}" title="Ubah Pendaftaran">
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

                        {{ $ar_pendaftaran->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
