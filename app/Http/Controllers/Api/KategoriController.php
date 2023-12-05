<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori; //panggil model
use App\Http\Resources\KategoriResource; //panggil resource
use Illuminate\Support\Facades\DB; // jika pakai query builder
use Illuminate\Database\Eloquent\Model; //jika pakai eloquent
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::all();

        return new KategoriResource(true, 'Data Kategori', $kategori);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|max:45',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $kategori = Kategori::create([
            'nama' => $request->nama,

        ]);

        return new KategoriResource(true, 'Data User Berhasil diinput', $kategori);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kategori = Kategori::find($id);


        if ($kategori) {

            return new KategoriResource(true, 'Detail Kategori', $kategori);
        } else {

            return response()->json(
                [
                    'success' => false,
                    'message' => 'Data Kategori Tidak Ditemukan',
                ],
                404
            );
        }
    }
}
