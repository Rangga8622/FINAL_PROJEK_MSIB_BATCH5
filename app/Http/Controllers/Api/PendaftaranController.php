<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendaftaran; //panggil model
use App\Http\Resources\PendaftaranResource; //panggil resource
use Illuminate\Support\Facades\DB; // jika pakai query builder
use Illuminate\Database\Eloquent\Model; //jika pakai eloquent
use Illuminate\Support\Facades\Validator;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendaftaran = Pendaftaran::all();
        return new PendaftaranResource(true, 'Data Pendaftaran', $pendaftaran);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'idmahasiswa' => 'required|integer',
                'status_pendaftaran' => 'required',
                'keterangan' => 'nullable',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $pendaftaran = Pendaftaran::create([
            'idmahasiswa' => $request->idmahasiswa,
            'status_pendaftaran' => $request->status_pendaftaran,
            'keterangan' => $request->keterangan,
        ]);
        return new PendaftaranResource(true, 'Data Pendaftaran Berhasil Diinput', $pendaftaran);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pendaftaran = Pendaftaran::find($id);
        if ($pendaftaran) {
            return new PendaftaranResource(true, 'Detail Data Pendaftaran', $pendaftaran);
        } else {
            return response()->json(
                [
                    'succes' => false,
                    'message' => "Data Mahasiswa Tidak Ditemukan"
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
        $validator = Validator::make(
            $request->all(),
            [
                'idmahasiswa' => 'required|integer',
                'status_pendaftaran' => 'required',
                'keterangan' => 'nullable',
            ]
        );
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $pendaftaran = Pendaftaran::whereId($id)->update([
            'idmahasiswa' => $request->idmahasiswa,
            'status_pendaftaran' => $request->status_pendaftaran,
            'keterangan' => $request->keterangan,
        ]);
        return new PendaftaranResource(true, 'Data Pendaftaran Berhasil Diubah', $pendaftaran);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pendaftaran = Pendaftaran::whereId($id)->first();
        $pendaftaran->delete();
        return new PendaftaranResource(true, 'Data Pendaftaran Berhasil Dihapus', $pendaftaran);
    }
}
