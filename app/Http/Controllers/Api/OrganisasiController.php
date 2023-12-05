<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organisasi; //panggil model
use App\Http\Resources\OrganisasiResource; //panggil resource
use Illuminate\Support\Facades\DB; // jika pakai query builder
use Illuminate\Database\Eloquent\Model; //jika pakai eloquent
use Illuminate\Support\Facades\Validator;

class OrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $organisasi = Organisasi::all();
        return new OrganisasiResource(true, 'Data Organisasi', $organisasi);
    }



    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode' => 'required|max:5',
            'nama' => 'required|max:45',
            'deskripsi' => 'required',
            'email' => 'required|email',
            'hp' => 'required|max:45',
            'idkategori' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $organisasi = Organisasi::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'email' => $request->email,
            'hp' => $request->hp,
            'idkategori' => $request->idkategori,
        ]);

        return new OrganisasiResource(true, 'Data Organisasi Berhasil diinput', $organisasi);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $organisasi = Organisasi::find($id);
        if ($organisasi) {
            return new OrganisasiResource(true, 'Detail Organisasi', $organisasi);
        } else {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Data Organisasi Tidak Ditemukan',
                ],
                404
            );
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {


        $validator = Validator::make($request->all(), [
            'kode' => 'required|max:5',
            'nama' => 'required|max:45',
            'deskripsi' => 'required',
            'email' => 'required|email',
            'hp' => 'required|max:45',
            'idkategori' => 'required|integer'
        ]);


        //cek error atau tidak inputan data
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        //proses mengedit data lama

        $organisasi = Organisasi::whereId($id)->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'email' => $request->email,
            'hp' => $request->hp,
            'idkategori' => $request->idkategori,
        ]);

        return new OrganisasiResource(true, 'Data Organisasi Berhasil diubah', $organisasi);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $organisasi = Organisasi::whereId($id)->first();
        $organisasi->delete();
        return new OrganisasiResource(true, 'Data Organisasi Berhasil dihapus', $organisasi);
    }
}
