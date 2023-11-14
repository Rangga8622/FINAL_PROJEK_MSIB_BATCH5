<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // jika pakai query builder
use Illuminate\Database\Eloquent\Model; // jika pakai eloquent
use Illuminate\Http\RedirectResponse;
use App\Models\Organisasi;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $jumlah_organisasi = Organisasi::count();

        return view(
            'backend.dashboard',
            compact('jumlah_organisasi')
        );
    }
}
