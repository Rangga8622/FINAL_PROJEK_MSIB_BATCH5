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
        return view(
            'backend.dashboard',
            compact(
                'ar_organisasi',
                'ar_pendaftaran'
            )
        );
    }
}
