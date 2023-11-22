<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Pendaftaran</title>

    <!-- Add any additional styling here -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
            color: #333;
        }

        img {
            max-width: 100px;
            max-height: 100px;
        }
    </style>
</head>

<body>
    <h2>Data Pendaftaran</h2>

    @if (!empty($search))
        <h3>Hasil Pencarian untuk: {{ $search }}</h3>
    @else
        <h3>Seluruh Data Pendaftaran</h3>
    @endif

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama Mahasiswa</th>
                <th>Organisasi</th>
                <th>Tanggal Pendaftaran</th>
                <th>Status Pendaftaran</th>

            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($ar_pendaftaran_pdf as $p)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>
                        @if (optional($p->mahasiswa)->foto)
                            <img src="{{ asset('backend/mhs/foto') }}/{{ optional($p->mahasiswa)->foto }}"
                                class="img-fluid rounded-circle mx-auto d-block"
                                alt="{{ optional($p->mahasiswa)->nama }}'s Photo">
                        @else
                            <img src="{{ asset('backend/mhs/foto/noimage.png') }}"
                                class="img-fluid rounded-circle mx-auto d-block" alt="Default Image">
                        @endif
                    </td>
                    <td>{{ optional($p->mahasiswa)->nama }}</td>
                    <td>{{ optional($p->mahasiswa->organisasi)->nama }}</td>
                    <td>{{ $p->tanggal_pendaftaran }}</td>
                    <td>{{ $p->status_pendaftaran }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
