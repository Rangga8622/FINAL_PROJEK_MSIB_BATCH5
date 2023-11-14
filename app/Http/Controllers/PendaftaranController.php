<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran; //panggil model
use App\Models\Mahasiswa; // Import the Jurusan model
use App\Models\Organisasi; // Import the Jurusan model
use Illuminate\Support\Facades\DB; // jika pakai query builder
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar_pendaftaran = Pendaftaran::query(); //eloquent

        $ar_pendaftaran = $ar_pendaftaran->paginate(10);
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
}
