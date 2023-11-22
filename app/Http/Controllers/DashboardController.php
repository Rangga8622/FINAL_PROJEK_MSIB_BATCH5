<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Organisasi;
use App\Models\Mahasiswa;

class DashboardController extends Controller
{
    public function index(): View
    {
        //query u/ mendapatkan jml kategori organisasi
        $ar_organisasi = Organisasi::count();
        $ar_mahasiswa = Mahasiswa::count();

        $ar_graph_organisasi = DB::table('organisasi as o')
            ->select('o.nama as nama_organisasi', DB::raw('COUNT(m.id) as total_pendaftaran_mahasiswa'))
            ->join('mahasiswa as m', 'o.id', '=', 'm.idorganisasi')
            ->groupBy('o.id', 'o.nama')
            ->get();

        return view(
            'backend.dashboard',
            compact(
                'ar_organisasi',
                'ar_mahasiswa',
                'ar_graph_organisasi'
            )
        );
    }
}
