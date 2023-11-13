@extends('backend.index')
@section('content')
    @php
        $ar_judul = ['No', 'Nama'];
        $no = 1;
    @endphp
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tabel Kategori</h4>


                <div class="d-flex justify-content-between mb-2">

                    <div>
                        <button type="button" class="btn btn-primary btn-xs" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            <i class="bi bi-clipboard-plus"></i> Tambah
                        </button>
                    </div>

                    <div>
                        <form action="{{ url('kategori') }}" method="get" class="d-flex">

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
                            @php $no = $ar_kategori->firstItem() - 0 ; @endphp
                            @foreach ($ar_kategori as $k)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $k->nama }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end mt-5">

                        {{ $ar_kategori->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('backend/kategori.form')
@endsection
