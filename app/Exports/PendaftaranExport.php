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
        ->join('organisasi as o', 'm.idorganisasi', '=', 'o.id')
        ->join('jurusan as j', 'm.idjurusan', '=', 'j.id')
        ->select('m.nama as nama_mahasiswa', 'j.nama', 'o.nama as nama_organisasi','m.tanggal_pendaftaran as tgl', 'p.status_pendaftaran', 'p.keterangan')
        ->get();
            return $ar_pendaftaran;
    }
    public function headings(): array
    {
        return ["Nama", "Organisasi","Jurusan", "Tanggal Pendaftaran", "Status Pendaftaran",
                "Keterangan"];
    }
}