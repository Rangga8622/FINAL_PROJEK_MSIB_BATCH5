<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\Mahasiswa;
use App\Models\Organisasi;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use App\Exports\PendaftaranExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Pagination\LengthAwarePaginator;
use PDF;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Inisialisasi query builder
        $ar_pendaftaran = Pendaftaran::query();

        // Filter data berdasarkan pencarian
        if (!empty($search)) {
            $ar_pendaftaran->where(function (Builder $query) use ($search) {
                $query->whereHas('mahasiswa', function (Builder $subQuery) use ($search) {
                    $subQuery->where('nama', 'like', '%' . $search . '%');
                })
                    ->orWhereHas('mahasiswa.organisasi', function (Builder $subQuery) use ($search) {
                        $subQuery->where('nama', 'like', '%' . $search . '%');
                    })
                    ->orWhere('status_pendaftaran', 'like', '%' . $search . '%');
            });
        }

        // Gunakan paginate untuk mendapatkan objek LengthAwarePaginator
        $ar_pendaftaran = $ar_pendaftaran->paginate(10); // Sesuaikan jumlah item per halaman

        // Lanjutkan dengan pengaturan dan penampilan data seperti biasa
        return view('backend.pendaftaran.index', compact('ar_pendaftaran'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ar_mahasiswa = Mahasiswa::all();
        $ar_organisasi = Organisasi::all();
        $ar_status = ['diproses', 'diterima', 'ditolak'];
        return view('backend.pendaftaran.form', compact('ar_mahasiswa', 'ar_organisasi', 'ar_status'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            [
                'idmahasiswa' => 'required|integer',
                'status_pendaftaran' => 'required',
                'keterangan' => 'nullable',
            ],
            [
                'idmahasiswa.required' => 'Nama Wajib Diisi',
                'idmahasiswa.integer' => 'Nama Wajib Diisi',
                'status_pendaftaran.required' => 'Status Wajib Diisi',
            ]
        );

        try {
            Pendaftaran::create([
                'idmahasiswa' => $request->idmahasiswa,
                'status_pendaftaran' => $request->status_pendaftaran,
                'keterangan' => $request->keterangan,
            ]);

            return redirect()->route('pendaftaran.index')->with('success', 'Data Pendaftaran Baru Berhasil Disimpan');
        } catch (\Exception $e) {
            return redirect()->route('pendaftaran.index')->with('error', 'Terjadi Kesalahan Saat Input Data!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rs = Pendaftaran::find($id);
        return view('backend.pendaftaran.detail', compact('rs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rs = Pendaftaran::find($id);
        $ar_mahasiswa = Mahasiswa::all();
        $ar_organisasi = Organisasi::all();
        $ar_status = ['diproses', 'diterima', 'ditolak'];
        return view('backend.pendaftaran.form_edit', compact('rs', 'ar_mahasiswa', 'ar_organisasi', 'ar_status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate(
            [
                'idmahasiswa' => 'required|integer',
                'status_pendaftaran' => 'required',
                'keterangan' => 'nullable',
            ],
            [
                'idmahasiswa.required' => 'Nama Wajib Diisi',
                'idmahasiswa.integer' => 'Nama Wajib Diisi',
                'status_pendaftaran.required' => 'Status Wajib Diisi',
            ]
        );

        try {
            $pendaftaran = Pendaftaran::find($id);
            $pendaftaran->update([
                'idmahasiswa' => $request->idmahasiswa,
                'status_pendaftaran' => $request->status_pendaftaran,
                'keterangan' => $request->keterangan,
            ]);

            return redirect()->route('pendaftaran.index')->with('success', 'Data Pendaftaran Berhasil Diupdate');
        } catch (\Exception $e) {
            return redirect()->route('pendaftaran.index')->with('error', 'Terjadi Kesalahan Saat Input Data!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pendaftaran::where('id', $id)->delete();
        return redirect()->route('pendaftaran.index')->with('success', 'Data Pendaftaran Berhasil Dihapus');
    }

    public function pendaftaranExcel()
    {
        return Excel::download(new PendaftaranExport, 'data_pendaftaran_' . date('d-m-Y_H:i:s') . '.xlsx');
    }

    public function pendaftaranPDF(Request $request)
    {
        $search = $request->input('search');

        $ar_pendaftaran_pdf = Pendaftaran::query();

        if (!empty($search)) {
            $ar_pendaftaran_pdf->where(function (Builder $query) use ($search) {
                $query->whereHas('mahasiswa', function (Builder $subQuery) use ($search) {
                    $subQuery->where('nama', 'like', '%' . $search . '%');
                })
                    ->orWhereHas('mahasiswa.organisasi', function (Builder $subQuery) use ($search) {
                        $subQuery->where('nama', 'like', '%' . $search . '%');
                    });

            });
        }

        $ar_pendaftaran_pdf = $ar_pendaftaran_pdf->get();


        $pdf = PDF::loadView('backend.pendaftaran.PDF', ['ar_pendaftaran_pdf' => $ar_pendaftaran_pdf, 'search' => $search]);

        return $pdf->download('data_pendaftaran_' . date('d-m-Y_H:i:s') . '.pdf');
    }
}
