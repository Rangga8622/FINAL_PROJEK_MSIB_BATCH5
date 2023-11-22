<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

use App\Models\Organisasi;
use App\Models\Mahasiswa;

class DashboardController extends Controller
{
    public function index(): View
    {
        $ar_organisasi = Organisasi::count();
        $ar_mahasiswa = Mahasiswa::count();

        $ar_graph_organisasi = DB::table('organisasi as o')
            ->select('o.nama as nama_organisasi', DB::raw('COUNT(p.id) as total_pendaftaran_mahasiswa'))
            ->join('mahasiswa as m', 'm.idorganisasi', '=', 'o.id')
            ->leftJoin('pendaftaran as p', 'p.idmahasiswa', '=', 'm.id')
            ->groupBy('o.id', 'o.nama')
            ->get();

        return view('backend.dashboard', compact(
            'ar_organisasi',
            'ar_mahasiswa',
            'ar_graph_organisasi'
        ));
    }
}
