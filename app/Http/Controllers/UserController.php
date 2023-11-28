<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; //panggil model
use Illuminate\Support\Facades\DB; // jika pakai query builder
use Illuminate\Database\Eloquent\Model; //jika pakai eloquent
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar_user = User::orderBy('id', 'desc')->get();
        return view('backend.user.index', compact('ar_user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $rs=User::find($id);
        $ar_role = ['admin', 'staff', 'mahasiswa'];
        $ar_isactive = ['yes', 'no','banned'];

        return view('backend.user.form_edit', compact('rs', 'ar_role', 'ar_isactive'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'role' => 'required',
                'isactive' => 'required',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|min:2|max:9000',

            ],
            [
                'nama.required' => 'Nama Wajib Diisi',
                'email.required' => 'Email Wajib Diisi',
                'role.required' => 'Role Wajib Dipilih',
                'isactive.required' => 'Isactive Wajib Dipilih',
                'foto.image' => 'Foto Harus Berupa Gambar',
                'foto.mimes' => 'Foto Harus Format JPG, JPEG, PNG, GIF, SVG'
            ]

            );
            $foto = DB::table('users')->select('foto')->where('id', $id)->get();
            foreach ($foto as $f) {
                $namaFileFotoLama = $f->foto;
            }
            if (!empty($request->foto)) {
                if (!empty($namaFileFotoLama)) unlink('backend/img/dashboard/user/' . $namaFileFotoLama);
                $fileName = 'user_' . date("Ymd_h-i-s") . '.' . $request->foto->extension();
                $request->foto->move(public_path('backend/img/dashboard/user/'), $fileName);
            } else {
                $fileName = $namaFileFotoLama;
            }

            DB::table('users')->where('id', $id)->update(
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'role' => $request->role,
                    'isactive' => $request->isactive,
                    'foto' => $fileName,
                    'updated_at' => $request->updated_at,
                ]
                );
                return redirect('/user' . '/')
            ->with('success', 'Data User Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = User::find($id);
        if (!empty($post->foto)) unlink('backend/img/dashboard/user/' . $post->foto);
        User::where('id', $id)->delete();
        return redirect()->route('user.index')
            ->with('success', 'User Berhasil Dihapus');
    }
}