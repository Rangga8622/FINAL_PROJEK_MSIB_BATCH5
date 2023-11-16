<?php

namespace App\Exports;

use App\Models\Pendaftaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class PendaftaranExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Pendaftaran::all();
        $ar_pendaftaran = DB::table('pendaftaran as p')
        ->join('mahasiswa as m', 'p.idmahasiswa', '=', 'm.id')
        ->join('organisasi as o', 'p.idorganisasi', '=', 'o.id')
        ->select('m.nama as nama_mahasiswa', 'o.nama as nama_organisasi', 'p.*')
        ->get();
            return $ar_pendaftaran;
    }
    public function headings(): array
    {
        return ["Nama", "Organisasi", "Taanggal Pendaftaran", "Status Pendaftaran",
                "Keterangan"];
    }
}