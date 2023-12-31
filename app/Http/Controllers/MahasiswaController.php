<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Jurusan;
use App\Models\Organisasi;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');


        $ar_mahasiswa = Mahasiswa::query()
            ->with('jurusan')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery->whereHas('jurusan', function ($subSubQuery) use ($search) {
                        $subSubQuery->where('nama', 'LIKE', '%' . $search . '%');
                    });
                })->orWhere('nama', 'LIKE', '%' . $search . '%')->orWhere('semester', 'LIKE', '%' . $search . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('backend.mahasiswa.index', ['ar_mahasiswa' =>  $ar_mahasiswa]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //ambil master data kategori u/ dilooping di select option form
        $ar_organisasi = Organisasi::all();

        // Ambil master data kategori untuk di-looping di select option form
        $ar_jurusan = Jurusan::all();
        $ar_gender = ['L', 'P'];

        return view('backend.mahasiswa.form', compact('ar_jurusan', 'ar_gender', 'ar_organisasi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            [
                'nama' => 'required|max:45',
                'idjurusan' => 'required|integer',
                'idorganisasi' => 'required|integer',
                'semester' => 'required|max:45',
                'gender' => 'required',
                'nohp' => 'required|max:45',
                'email' => 'required|max:45',
                'tanggal_pendaftaran' => 'required',
                'cv' => 'nullable|mimes:pdf,doc|min:2|max:10000',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|min:2|max:9000',

            ],
            [
                'nama.required' => 'Nama Wajib Diisi',
                'nama.max' => 'Nama Maksimal 45 Karakter',
                'idjurusan.required' => 'Jurusan Wajib Diisi',
                'idjurusan.integer' => 'Jurusan Wajib Dipilih',
                'idorganisasi.required' => 'Organisasi Wajib Diisi',
                'idorganisasi.integer' => 'Organisasi Wajib Diisi',
                'semester.required' => 'Semester Wajib Diisi',
                'semester.max' => 'Semester Wajib Diisi',
                'gender.required' => 'Gender Wajib Dipilih',
                'nohp.required' => 'No HP Wajib Diisi',
                'nohp.max' => 'No HP Maksimal 45 Karakter',
                'email.required' => 'Email Wajib Diisi',
                'email.max' => 'Email Maksimal 45 Karakter',
                'tanggal_pendaftaran.required' => 'Tanggal Wajib Diisi',
                'cv.mimes' => 'Format CV Wajib PDF/DOC',
                'cv.min' => 'Ukuran Minimum CV 2 KB',
                'cv.max' => 'Ukuran Maximum CV 10 MB',
                'foto.image' => 'Foto Harus Berupa Gambar',
                'foto.mimes' => 'Foto Harus Format JPG, JPEG, PNG, GIF, SVG',
            ]

        );
        if (!empty($request->cv)) {
            $fileNamee = 'mhscv_' . date("Ymd_h-i-s") . '.' . $request->cv->extension();
            $request->cv->move(public_path('backend/mhs/cv'), $fileNamee);
        } else {
            $fileNamee = '';
        }
        if (!empty($request->foto)) {
            $fileName = 'mhs_' . date("Ymd_h-i-s") . '.' . $request->foto->extension();
            $request->foto->move(public_path('backend/mhs/foto'), $fileName);
        } else {
            $fileName = '';
        }

        try {
            DB::table('mahasiswa')->insert(
                [
                    'nama' => $request->nama,
                    'idjurusan' => $request->idjurusan,
                    'idorganisasi' => $request->idorganisasi,
                    'semester' => $request->semester,
                    'gender' => $request->gender,
                    'nohp' => $request->nohp,
                    'email' => $request->email,
                    'tanggal_pendaftaran' => $request->tanggal_pendaftaran,
                    'cv' => $fileNamee,
                    'foto' => $fileName,
                ]
            );
            return redirect()->route('mahasiswa.index')
                ->with('success', 'Data Asset Baru Berhasil Di Simpan');
        } catch (\Exception $e) {
            //return redirect()->back()
            return redirect()->route('mahasiswa.index')
                ->with('error', 'Terjadi Kesalahan Saat Input Data!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rs = Mahasiswa::find($id);

        return view('backend.mahasiswa.detail', compact('rs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rs = Mahasiswa::find($id);
        $ar_organisasi = Organisasi::all();
        $ar_jurusan = Jurusan::all();
        $ar_gender = ['L', 'P'];

        return view('backend.mahasiswa.form_edit', compact('rs', 'ar_jurusan', 'ar_gender', 'ar_organisasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate(
            [
                'nama' => 'required|max:45',
                'idjurusan' => 'required|integer',
                'idorganisasi' => 'required|integer',
                'semester' => 'required|max:45',
                'gender' => 'required',
                'nohp' => 'required|max:45',
                'email' => 'required|max:45',
                'tanggal_pendaftaran' => 'required',
                'cv' => 'nullable|mimes:pdf,doc|min:2|max:10000',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|min:2|max:9000',

            ],
            [
                'nama.required' => 'Nama Wajib Diisi',
                'nama.max' => 'Nama Maksimal 45 Karakter',
                'idjurusan.required' => 'Jurusan Wajib Diisi',
                'idjurusan.integer' => 'Jurusan Wajib Dipilih',
                'idorganisasi.required' => 'Organisasi Wajib Diisi',
                'idorganisasi.integer' => 'Organisasi Wajib Diisi',
                'semester.required' => 'Semester Wajib Diisi',
                'semester.max' => 'Semester Wajib Diisi',
                'gender.required' => 'Gender Wajib Dipilih',
                'nohp.required' => 'No HP Wajib Diisi',
                'nohp.max' => 'No HP Maksimal 45 Karakter',
                'email.required' => 'Email Wajib Diisi',
                'email.max' => 'Email Maksimal 45 Karakter',
                'tanggal_pendaftaran.required' => 'Tanggal Wajib Diisi',
                'cv.mimes' => 'Format CV Wajib PDF/DOC',
                'cv.min' => 'Ukuran Minimum CV 2 KB',
                'cv.max' => 'Ukuran Maximum CV 10 MB',
                'foto.image' => 'Foto Harus Berupa Gambar',
                'foto.mimes' => 'Foto Harus Format JPG, JPEG, PNG, GIF, SVG',
            ]
        );
        $cv = DB::table('mahasiswa')->select('cv')->where('id', $id)->get();
        foreach ($cv as $c) {
            $namaFileCvLama = $c->cv;
        }
        if (!empty($request->cv)) {
            if (!empty($namaFileCvLama)) unlink('backend/mhs/cv/' . $namaFileCvLama);
            $fileNamee = 'mhscv_' . date("Ymd_h-i-s") . '.' . $request->cv->extension();
            $request->cv->move(public_path('backend/mhs/cv/'), $fileNamee);
        } else {
            $fileNamee = $namaFileCvLama;
        }
        $foto = DB::table('mahasiswa')->select('foto')->where('id', $id)->get();
        foreach ($foto as $f) {
            $namaFileFotoLama = $f->foto;
        }
        if (!empty($request->foto)) {
            if (!empty($namaFileFotoLama)) unlink('backend/mhs/foto/' . $namaFileFotoLama);
            $fileName = 'mhs_' . date("Ymd_h-i-s") . '.' . $request->foto->extension();
            $request->foto->move(public_path('backend/mhs/foto/'), $fileName);
        } else {
            $fileName = $namaFileFotoLama;
        }




        DB::table('mahasiswa')->where('id', $id)->update(

            [
                'nama' => $request->nama,
                'idjurusan' => $request->idjurusan,
                'idorganisasi' => $request->idorganisasi,
                'semester' => $request->semester,
                'gender' => $request->gender,
                'nohp' => $request->nohp,
                'email' => $request->email,
                'tanggal_pendaftaran' => $request->tanggal_pendaftaran,
                'cv' => $fileNamee,
                'foto' => $fileName,
            ]
        );

        return redirect('/mahasiswa' . '/' . $id)
            ->with('success', 'Data Mahasiswa Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Mahasiswa::find($id);
        if (!empty($post->foto)) unlink('backend/mhs/foto/' . $post->foto);
        if (!empty($post->cv)) unlink('backend/mhs/cv/' . $post->cv);
        Mahasiswa::where('id', $id)->delete();
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data Mahasiswa Berhasil Dihapus');
    }
}
