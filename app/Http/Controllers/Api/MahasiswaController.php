<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa; //panggil model
use App\Http\Resources\MahasiswaResource; //panggil resource
use Illuminate\Support\Facades\DB; // jika pakai query builder
use Illuminate\Database\Eloquent\Model; //jika pakai eloquent
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return new MahasiswaResource(true, 'Data Mahasiswa', $mahasiswa);
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        
        [
            'nama' => 'required|max:45',
            'idjurusan' => 'required|integer',
            'idorganisasi' => 'required|integer',
            'semester' => 'required|max:45',
            'gender' => 'required',
            'nohp' => 'required|max:45',
            'email' => 'required|max:45',
            'tanggal_pendaftaran'=> 'required|date',
            'cv' => 'nullable',
            'foto' => 'nullable',

        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $mahasiswa = Mahasiswa::create([
            'nama'=>$request->nama,
            'idjurusan'=>$request->idjurusan,
            'idorganisasi'=>$request->idorganisasi,
            'semester'=>$request->semester,
            'gender'=>$request->gender,
            'nohp'=>$request->nohp,
            'email'=>$request->email,
            'tanggal_pendaftaran'=>$request->tanggal_pendaftaran,
            'cv'=>$request->cv,
            'foto'=>$request->foto,
        ]);
        return new MahasiswaResource(true, 'Data Mahasiswa Berhasil diinput', $mahasiswa);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        if ($mahasiswa){
            return new MahasiswaResource(true, 'Detail Mahasiswa', $mahasiswa);
        } else {
            return response()->json(
                [
                    'succes' =>false,
                    'message'=>"Data Mahasiswa Tidak Ditemukan"
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
        $validator = Validator::make($request->all(),
        
        [
            'nama' => 'required|max:45',
            'idjurusan' => 'required|integer',
            'idorganisasi' => 'required|integer',
            'semester' => 'required|max:45',
            'gender' => 'required',
            'nohp' => 'required|max:45',
            'email' => 'required|max:45',
            'tanggal_pendaftaran'=> 'required|date',
            'cv' => 'nullable',
            'foto' => 'nullable',

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $mahasiswa = Mahasiswa::whereId($id)->update([
            'nama'=>$request->nama,
            'idjurusan'=>$request->idjurusan,
            'idorganisasi'=>$request->idorganisasi,
            'semester'=>$request->semester,
            'gender'=>$request->gender,
            'nohp'=>$request->nohp,
            'email'=>$request->email,
            'tanggal_pendaftaran'=>$request->tanggal_pendaftaran,
            'cv'=>$request->cv,
            'foto'=>$request->foto,
        ]);
        return new MahasiswaResource(true, 'Data Mahasiswa Berhasil Diubah', $mahasiswa);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::whereId($id)->first();
        $mahasiswa->delete();
        return new MahasiswaResource(true, 'Data Mahasiswa Berhasil dihapus', $mahasiswa);
    }
}