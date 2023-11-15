<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Organisasi;
use App\Models\Pendaftaran;

class DashboardController extends Controller
{
    public function index(): View
    {
        //query u/ mendapatkan jml kategori organisasi
        $ar_organisasi = Organisasi::count();
        $ar_pendaftaran = Pendaftaran::count();

        $ar_graph_organisasi = DB::table('organisasi as o')
            ->select('o.nama as nama_organisasi', DB::raw('COUNT(p.id) as total_pendaftaran'))
            ->join('pendaftaran as p', 'o.id', '=', 'p.idorganisasi')
            ->groupBy('o.id', 'o.nama')
            ->get();

        return view(
            'backend.dashboard',
            compact(
                'ar_organisasi',
                'ar_pendaftaran',
                'ar_graph_organisasi'
            )
        );
    }
}
