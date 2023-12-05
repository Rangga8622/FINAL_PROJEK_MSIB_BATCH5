<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan; //panggil model
use Illuminate\Support\Facades\DB; // jika pakai query builder
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $search = $request->query('search');

        // query eloquent
        $ar_jurusan = Jurusan::query();

        // jika ada parameter search
        if ($search) {
            $ar_jurusan = $ar_jurusan->where('nama', 'like', '%' . $search . '%')
                ->orWhere('kode', 'like', '%' . $search . '%');
        }

        $ar_jurusan = $ar_jurusan->paginate(10);

        return view('backend.jurusan.index', [
            'ar_jurusan' => $ar_jurusan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate(
    //         [
    //             'kode' => 'required|integer',
    //             'nama' => 'required|max:45',
    //         ],
    //         [
    //             'kode.required' => 'Kode Wajib Diisi',
    //             'kode.integer' => 'Kode Maksimal 5 karakter',
    //             'nama.required' => 'Nama Wajib Diisi',
    //             'nama.max' => 'Nama Maksimal 45 Karakter',
    //         ]

    //     );

    //     try {
    //         DB::table('jurusan')->insert([
    //             'kode' => $request->kode,
    //             'nama' => $request->nama,
    //         ]);


    //         return redirect()->route('jurusan.index')
    //             ->with('success', 'Data Organisasi Berhasil Di Simpan');
    //     } catch (\Exception $e) {
    //         return redirect()->route('jurusan.index')
    //             ->with('error', 'Terjadi Kesalahan Saat Input Data!');
    //     }
    // }

    // di dalam controller

    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'kode' => 'required|max:5',
                'nama' => 'required|max:45',
            ],
            [
                'kode.required' => 'Kode Wajib Diisi',
                'kode.max' => 'Kode Maksimal 5 karakter',
                'nama.required' => 'Nama Wajib Diisi',
                'nama.max' => 'Nama Maksimal 45 Karakter',
            ]

        );

        try {
            DB::table('jurusan')->insert([
                'kode' => $request->kode,
                'nama' => $request->nama,
            ]);


            return redirect()->route('jurusan.index')
                ->with('success', 'Data Organisasi Berhasil Di Simpan');
        } catch (\Exception $e) {
            return redirect()->route('jurusan.index')
                ->with('error', 'Terjadi Kesalahan Saat Input Data!');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
