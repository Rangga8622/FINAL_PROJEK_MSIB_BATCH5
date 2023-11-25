@extends('backend.index')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header text-white d-flex align-items-center justify-content-center">
                    <h1 class="card-title text-center fw-bold fs-2 m-0">{{ $rs->nama }}</h1>
                </div>

                <div class="card-body">
                    <div class="text-center">

                        @if ($rs->foto)
                        <img src="{{ asset('backend/mhs/foto') }}/{{ $rs->foto }}"
                            class="img-fluid rounded-circle mx-auto d-block" alt="{{ $rs->nama }}'s Photo">
                        @else
                        <img src="{{ asset('backend/mhs/foto/noimage.png') }}"
                            class="img-fluid rounded-circle mx-auto d-block" alt="Default Image">
                        @endif
                    </div>


                    <ul class="list-group list-group-flush mt-4">
                        <li class="list-group-item">
                            <strong>Jurusan:</strong> {{ $rs->jurusan->nama }}
                        </li>
                        <li class="list-group-item">
                            <strong>Daftar Organisasi:</strong> {{ $rs->organisasi->nama }}
                        </li>
                        <li class="list-group-item">
                            <strong>Semester:</strong> {{ $rs->semester }}
                        </li>
                        <li class="list-group-item">
                            <strong>Jenis Kelamin:</strong> {{ $rs->gender }}
                        </li>
                        <li class="list-group-item">
                            <strong>No HP:</strong> {{ $rs->nohp }}
                        </li>
                        <li class="list-group-item">
                            <strong>Email:</strong> {{ $rs->email }}
                        </li>
                        <li class="list-group-item">
                            <strong>Tanggal Pendaftaran:</strong> {{ $rs->tanggal_pendaftaran }}
                        </li>

                        <li class="list-group-item">
                            <strong>CV:</strong>
                            @if ($rs->cv)
                            <a href="{{ asset('backend/mhs/cv') }}/{{ $rs->cv }}" target="_blank"
                                class="btn btn-primary btn-xs">
                                <i class="bi bi-file-earmark-pdf-fill"></i> Download CV
                            </a>

                            <embed src="{{ asset('backend/mhs/cv') }}/{{ $rs->cv }}" type="application/pdf"
                                style="display: none;" />
                            @else
                            <span class="text-muted">Tidak Ada CV</span>
                            @endif
                        </li>

                        <li class="list-group-item">
                            <strong>Barcode:</strong>
                            <div class="col-md-4">
                                <div class="card-body">
                                    <br />
                                    <?php
                                    $barcodeContent = $rs->id . '-' . date('Y') . '-' . $rs->nama . '-' . $rs->jurusan->nama . '-' . $rs->organisasi->nama;
                                    echo DNS2D::getBarcodeHTML($barcodeContent, 'QRCODE', 3, 3);
                                    ?>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                {{-- Card footer with a link to go back --}}
                <div class="card-footer bg-white border-top">
                    <a href="{{ url('/mahasiswa') }}" class="btn btn-secondary d-block mx-auto">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection