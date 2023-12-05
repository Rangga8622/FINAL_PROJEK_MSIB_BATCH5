<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jurusan; //panggil model
use App\Http\Resources\JurusanResource; //panggil resource
use Illuminate\Support\Facades\DB; // jika pakai query builder
use Illuminate\Database\Eloquent\Model; //jika pakai eloquent
use Illuminate\Support\Facades\Validator;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurusans = Jurusan::all();

        return new JurusanResource(true, 'Data Jurusan', $jurusans);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode' => 'required|max:5',
            'nama' => 'required|max:45',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $jurusan = Jurusan::create([
            'kode' => $request->kode,
            'nama' => $request->nama,

        ]);
        return new JurusanResource(true, 'Data User Berhasil diinput', $jurusan);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jurusan = Jurusan::find($id);


        if ($jurusan) {

            return new JurusanResource(true, 'Detail Jurusan', $jurusan);
        } else {

            return response()->json(
                [
                    'success' => false,
                    'message' => 'Data Jurusan Tidak Ditemukan',
                ],
                404
            );
        }
    }
}
