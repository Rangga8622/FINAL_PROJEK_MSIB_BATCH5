<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran; //panggil model
use App\Models\Mahasiswa; // Import the Jurusan model
use App\Models\Organisasi; // Import the Jurusan model
use Illuminate\Support\Facades\DB; // jika pakai query builder
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use App\Exports\AssetExport;
use App\Exports\PendaftaranExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $search = $request->input('search');

        $ar_pendaftaran = Pendaftaran::query()
            ->with('mahasiswa', 'organisasi')
            ->when($search, function ($query) use ($search) {
                $query->whereHas('mahasiswa', function ($subQuery) use ($search) {
                    $subQuery->where('nama', 'LIKE', '%' . $search . '%');
                })->orWhereHas('organisasi', function ($subQuery) use ($search) {
                    $subQuery->where('nama', 'LIKE', '%' . $search . '%');
                })->orWhere('status_pendaftaran', 'LIKE', '%' . $search . '%');
            })
            ->paginate(10);

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
                'idorganisasi' => 'required|integer',
                'tanggal_pendaftaran' => 'required',
                'status_pendaftaran' => 'required',
                'ket' => 'nullable',

            ],
            [
                'idmahasiswa.required' => 'Nama Wajib Diisi',
                'idmahasiswa.integer' => 'Nama Wajib Diisi',
                'idorganisasi.required' => 'Organisasi Wajib Diisi',
                'idorganisasi.integer' => 'Organisasi Wajib Diisi',
                'tanggal_pendaftaran.required' => 'Tanggal Wajib Diisi',
                'status_pendaftaran.required' => 'Status Wajib Diisi',

            ]
        );
        try {
            DB::table('pendaftaran')->insert(
                [
                    'idmahasiswa' => $request->idmahasiswa,
                    'idorganisasi' => $request->idorganisasi,
                    'tanggal_pendaftaran' => $request->tanggal_pendaftaran,
                    'status_pendaftaran' => $request->status_pendaftaran,
                    'keterangan' => $request->keterangan
                ]
            );
            return redirect()->route('pendaftaran.index')
                ->with('success', 'Data Asset Baru Berhasil Di Simpan');
        } catch (\Exception $e) {
            //return redirect()->back()
            return redirect()->route('pendaftaran.index')
                ->with('error', 'Terjadi Kesalahan Saat Input Data!');
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
                'idorganisasi' => 'required|integer',
                'tanggal_pendaftaran' => 'required',
                'status_pendaftaran' => 'required',
                'ket' => 'nullable',
            ],
            [
                'idmahasiswa.required' => 'Nama Wajib Diisi',
                'idmahasiswa.integer' => 'Nama Wajib Diisi',
                'idorganisasi.required' => 'Organisasi Wajib Diisi',
                'idorganisasi.integer' => 'Organisasi Wajib Diisi',
                'tanggal_pendaftaran.required' => 'Tanggal Wajib Diisi',
                'status_pendaftaran.required' => 'Status Wajib Diisi',
            ]
        );

        try {
            // Find the record by its ID
            $pendaftaran = Pendaftaran::find($id);

            // Update the record using Eloquent's update method
            $pendaftaran->update([
                'idmahasiswa' => $request->idmahasiswa,
                'idorganisasi' => $request->idorganisasi,
                'tanggal_pendaftaran' => $request->tanggal_pendaftaran,
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
        return redirect()->route('pendaftaran.index')
            ->with('success', 'Data Pendaftaran Berhasil Dihapus');
    }
    public function pendaftaranExcel()
    {
        return Excel::download(new PendaftaranExport, 'data_pendaftaran_' . date('d-m-Y_H:i:s') . '.xlsx');
    }
    public function pendaftaranPDF()
    {
        $ar_pendaftaran_pdf = Pendaftaran::all();
        $pdf = PDF::loadView(
            'backend.pendaftaran.PDF',
            ['ar_pendaftaran_pdf' => $ar_pendaftaran_pdf]
        );
        return $pdf->download('data_pendaftaran_' . date('d-m-Y_H:i:s') . '.pdf');
    }
}
