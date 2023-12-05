<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        // query eloquent
        $ar_artikel = Artikel::query()
            ->with('kategori') // ubah artikel menjadi kategori
            ->when($search, function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->whereHas('kategori', function ($subSubQuery) use ($search) { // ubah artikel menjadi kategori
                        $subSubQuery->where('nama', 'LIKE', '%' . $search . '%');
                    });
                })->orWhere('nama', 'LIKE', '%' . $search . '%')->orWhere('judul', 'LIKE', '%' . $search . '%')
                    ->orWhere('tanggal', 'LIKE', '%' . $search . '%')
                    ->orWhere('isi_artikel', 'LIKE', '%' . $search . '%');
            })
            ->paginate(10);

        return view('backend.artikel.index', ['ar_artikel' => $ar_artikel]);
    }

    public function index_artikel(Request $request)
    {


        // query eloquent
        $ar_artikel = Artikel::query();

        $ar_artikel = $ar_artikel->paginate(3);

        return view('frontend.blog', [
            'ar_artikel' => $ar_artikel
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ar_kategori = Kategori::all();

        return view('backend.artikel.form', compact('ar_kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {


        $validated = $request->validate([
            'nama' => 'required|max:45',
            'judul' => 'required|max:45',
            'tanggal' => 'required',
            'idkategori' => 'required|integer',
            'isi_artikel' => 'nullable',
            'foto_header' => 'nullable|image|mimes:jpg,jpeg,png|min:2|max:9000',
            'foto_profile' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|min:2|max:9000',
        ], [
            'nama.required' => 'Nama Wajib Diisi',
            'nama.max' => 'Nama Maksimal 45 Karakter',
            'judul.required' => 'Judul Wajib Diisi',
            'judul.max' => 'Judul Maksimal 45 Karakter',
            'tanggal.required' => 'Tanggal Wajib Diisi',
            'idkategori.required' => 'Kategori Wajib Diisi',
            'idkategori.integer' => 'Kategori Wajib Dipilih',
            'isi_artikel.nullable' => 'Isi Artikel Harus Berupa Teks',
            'foto_header.image' => 'Foto Header Harus Berupa Gambar',
            'foto_header.mimes' => 'Foto Header Harus Format JPG, JPEG, PNG',
            'foto_header.min' => 'Ukuran Minimum Foto Header 2 KB',
            'foto_header.max' => 'Ukuran Maximum Foto Header 9000 KB',
            'foto_profile.image' => 'Foto Profile Harus Berupa Gambar',
            'foto_profile.mimes' => 'Foto Profile Harus Format JPG, JPEG, PNG, GIF, SVG',
            'foto_profile.min' => 'Ukuran Minimum Foto Profile 2 KB',
            'foto_profile.max' => 'Ukuran Maximum Foto Profile 9000 KB',
        ]);

        if (!empty($request->foto_header)) {
            $fileNamee = 'header_' . date("Ymd_h-i-s") . '.' . $request->foto_header->extension();
            $request->foto_header->move(public_path('backend/artikel/foto_header'), $fileNamee);
        } else {
            $fileNamee = '';
        }
        if (!empty($request->foto_profile)) {
            $fileName = 'profile_' . date("Ymd_h-i-s") . '.' . $request->foto_profile->extension();
            $request->foto_profile->move(public_path('backend/artikel/foto_profile'), $fileName);
        } else {
            $fileName = '';
        }

        try {
            DB::table('artikel')->insert(
                [
                    'nama' => $request->nama,
                    'judul' => $request->judul,
                    'tanggal' => $request->tanggal,
                    'idkategori' => $request->idkategori,
                    'isi_artikel' => $request->isi_artikel,
                    'foto_header' => $fileNamee,
                    'foto_profile' => $fileName,

                ]
            );
            return redirect()->route('artikel.index')
                ->with('success', 'Data Asset Baru Berhasil Di Simpan');
        } catch (\Exception $e) {
            //return redirect()->back()
            return redirect()->route('artikel.index')
                ->with('error', 'Terjadi Kesalahan Saat Input Data!');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rs = Artikel::find($id);
        return view('frontend.view_artikel.index', compact('rs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rs = Artikel::find($id);
        $ar_kategori = Kategori::all();

        return view('backend.artikel.form_edit', compact('rs', 'ar_kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama' => 'required|max:45',
            'judul' => 'required|max:45',
            'tanggal' => 'required',
            'idkategori' => 'required|integer',
            'isi_artikel' => 'required',
            'foto_header' => 'nullable|image|mimes:jpg,jpeg,png|min:2|max:9000',
            'foto_profile' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|min:2|max:9000',
        ], [
            'nama.required' => 'Nama Wajib Diisi',
            'nama.max' => 'Nama Maksimal 45 Karakter',
            'judul.required' => 'Judul Wajib Diisi',
            'judul.max' => 'Judul Maksimal 45 Karakter',
            'tanggal.required' => 'Tanggal Wajib Diisi',
            'idkategori.required' => 'Kategori Wajib Diisi',
            'idkategori.integer' => 'Kategori Wajib Dipilih',
            'isi_artikel.required' => 'Isi Artikel Wajib diisi',
            'foto_header.image' => 'Foto Header Harus Berupa Gambar',
            'foto_header.mimes' => 'Foto Header Harus Format JPG, JPEG, PNG',
            'foto_header.min' => 'Ukuran Minimum Foto Header 2 KB',
            'foto_header.max' => 'Ukuran Maximum Foto Header 9000 KB',
            'foto_profile.image' => 'Foto Profile Harus Berupa Gambar',
            'foto_profile.mimes' => 'Foto Profile Harus Format JPG, JPEG, PNG, GIF, SVG',
            'foto_profile.min' => 'Ukuran Minimum Foto Profile 2 KB',
            'foto_profile.max' => 'Ukuran Maximum Foto Profile 9000 KB',
        ]);

        if (!empty($request->foto_header)) {
            $fileNamee = 'header_' . date("Ymd_h-i-s") . '.' . $request->foto_header->extension();
            $request->foto_header->move(public_path('backend/artikel/foto_header'), $fileNamee);
        } else {
            $fileNamee = '';
        }
        if (!empty($request->foto_profile)) {
            $fileName = 'profile_' . date("Ymd_h-i-s") . '.' . $request->foto_profile->extension();
            $request->foto_profile->move(public_path('backend/artikel/foto_profile'), $fileName);
        } else {
            $fileName = '';
        }

        $artikel = Artikel::find($id);

        if ($artikel) {
            $artikel->update([
                'nama' => $request->nama,
                'judul' => $request->judul,
                'tanggal' => $request->tanggal,
                'idkategori' => $request->idkategori,
                'isi_artikel' => $request->isi_artikel,
                'foto_header' => $fileNamee,
                'foto_profile' => $fileName,
            ]);

            return redirect()->route('artikel.index')
                ->with('success', 'Data Artikel Berhasil Diupdate');
        } else {
            return redirect()->route('artikel.index')
                ->with('error', 'Artikel tidak ditemukan');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Artikel::find($id);
        if (!empty($post->foto_header)) unlink('backend/artikel/foto_header/' . $post->foto_header);
        if (!empty($post->foto_profile)) unlink('backend/artikel/foto_profile/' . $post->foto_profile);
        if (!empty($post->isi_artikel)) {
            $isiArtikelPath = public_path('backend/artikel/isi_artikel/' . $post->isi_artikel);
            if (file_exists($isiArtikelPath)) {
                unlink($isiArtikelPath);
            }
        }

        Artikel::where('id', $id)->delete();
        return redirect()->route('artikel.index')
            ->with('success', 'Data Artikel Berhasil Dihapus');
    }

    public function upload(Request $request): JsonResponse
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('backend/artikel/isi_artikel'), $fileName);

            $url = asset('backend/artikel/isi_artikel/' . $fileName);

            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }
}
