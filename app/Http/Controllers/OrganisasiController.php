<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organisasi;
use App\Models\Kategori;
use App\Models\Jurusan;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class OrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        // query eloquent
        $ar_organisasi = Organisasi::query()
            ->with('kategori')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->whereHas('kategori', function ($subSubQuery) use ($search) {
                        $subSubQuery->where('nama', 'LIKE', '%' . $search . '%');
                    });
                })->orWhere('nama', 'LIKE', '%' . $search . '%');
            })
            ->paginate(10);
        return view('backend.organisasi.index', ['ar_organisasi' =>  $ar_organisasi]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ar_kategori = Kategori::all();

        return view('backend.organisasi.form', compact('ar_kategori'));
    }

    public function create_frontend()
    {
        //ambil master data kategori u/ dilooping di select option form
        $ar_organisasi = Organisasi::all();

        // Ambil master data kategori untuk di-looping di select option form
        $ar_jurusan = Jurusan::all();
        $ar_gender = ['L', 'P'];

        return view('frontend.pendaftaran', compact('ar_jurusan', 'ar_gender', 'ar_organisasi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            [
                'kode' => 'required|max:5',
                'nama' => 'required|max:45',
                'deskripsi' => 'required',
                'email' => 'required|email',
                'hp' => 'required|max:45',
                'idkategori' => 'required|integer'
            ],
            [
                'kode.required' => 'Kode Wajib Diisi',
                'kode.max' => 'Kode Maksimal 5 karakter',
                'nama.required' => 'Nama Wajib Diisi',
                'nama.max' => 'Nama Maksimal 45 Karakter',
                'deskripsi.required' => 'Deskripsi Wajib Diisi',
                'email.required' => 'Email Wajib Diisi',
                'email.max' => 'Email Maksimal 45 Karakter',
                'hp.required' => 'No HP Wajib Diisi',
                'hp.max' => 'No HP Maksimal 45 Karakter',
                'idkategori.required' => 'Kategori Wajib Diisi',
                'idkategori.integer' => 'Kategori Wajib Dipilih',
            ]
        );

        try {
            DB::table('organisasi')->insert([
                'kode' => $request->kode,
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'email' => $request->email,
                'hp' => $request->hp,
                'idkategori' => $request->idkategori,
            ]);

            return redirect()->route('organisasi.index')
                ->with('success', 'Data Organisasi Baru Berhasil Di Simpan');
        } catch (\Exception $e) {
            return redirect()->route('organisasi.index')
                ->with('error', 'Terjadi Kesalahan Saat Input Data!');
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rs = Organisasi::find($id);
        return view('backend.organisasi.detail', compact('rs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rs = Organisasi::find($id);
        $ar_kategori = Kategori::all();

        return view('backend.organisasi.form_edit', compact('rs', 'ar_kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate(
            [
                'kode' => 'required|max:5',
                'nama' => 'required|max:45',
                'deskripsi' => 'required',
                'email' => 'required|email',
                'hp' => 'required|max:45',
                'idkategori' => 'required|integer',
            ],
            [
                'kode.required' => 'Kode Wajib Diisi',
                'kode.max' => 'Kode Maksimal 5 karakter',
                'nama.required' => 'Nama Wajib Diisi',
                'nama.max' => 'Nama Maksimal 45 Karakter',
                'deskripsi.required' => 'Deskripsi Wajib Diisi',
                'email.required' => 'Email Wajib Diisi',
                'email.max' => 'Email Maksimal 45 Karakter',
                'hp.required' => 'No HP Wajib Diisi',
                'hp.max' => 'No HP Maksimal 45 Karakter',
                'idkategori.required' => 'Kategori Wajib Diisi',
                'idkategori.integer' => 'Kategori Wajib Dipilih',
            ]
        );

        try {
            Organisasi::where('id', $id)->update([
                'kode' => $request->kode,
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'email' => $request->email,
                'hp' => $request->hp,
                'idkategori' => $request->idkategori,
            ]);

            return redirect()->route('organisasi.index')
                ->with('success', 'Data Organisasi Berhasil Diupdate');
        } catch (\Exception $e) {
            return redirect()->route('organisasi.index')
                ->with('error', 'Terjadi Kesalahan Saat Update Data!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        Organisasi::where('id', $id)->delete();
        return redirect()->route('organisasi.index')
            ->with('success', 'Data organisasi Berhasil Dihapus');
    }
}
