@extends('backend.index')
@section('content')
    @php
        $ar_judul = ['No', 'Kode', 'Kategori', 'Nama', 'Action'];
        $no = 1;
    @endphp

    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tabel Organisasi</h4>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        @foreach ($ar_judul as $jdl)
                                            <th>{{ $jdl }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        @foreach ($ar_judul as $jdl)
                                            <th>{{ $jdl }}</th>
                                        @endforeach
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($ar_organisasi as $o)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $o->kode }}</td>
                                            <td>{{ $o->kategori->nama }}</td>
                                            <td>{{ $o->nama }}</td>
                                            <td>
                                                <form method="POST" action="">

                                                    <a href="{{ route('organisasi.show', $o->id) }}"
                                                        title="Detail Organisasi" class="btn btn-info btn-xs ">
                                                        <i class="bi bi-eye"></i>
                                                    </a>

                                                    <a href="" title="Ubah Organisasi"
                                                        class="btn btn-warning btn-xs">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>

                                                    <button type="submit" title="Hapus Organisasi"
                                                        class="btn btn-danger btn-xs" name="proses" value="hapus"
                                                        onclick="return confirm('Anda Yakin diHapus?')">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
