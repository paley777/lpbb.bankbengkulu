<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\PreTest;
use App\Models\PostTest;
use App\Models\Materi_List;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Http\Requests\StoreKelasRequest;
use App\Http\Requests\UpdateKelasRequest;
use Carbon\Carbon;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.kelas.index', [
            'active' => 'users',
            'kelases' => Kelas::orderBy('nama_modul', 'desc')
                ->filter(request(['search']))
                ->paginate(20)
                ->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.kelas.create', [
            'active' => 'users',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKelasRequest $request)
    {
        $validated = $request->validated();
        if ($validated['date_start'] > $validated['date_end']) {
            return redirect('/dashboard/kelas')->withErrors(['msg' => 'Tanggal Selesai lebih awal dari Tanggal Mulai. Harap perhatikan bahwa Tanggal Mulai harus mendahului Tanggal Selesai.']);
        } else {
            Kelas::create($validated);
            return redirect('/dashboard/kelas')->with('success', 'Kelas telah ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kela)
    {
        $nama_pretest = Materi_List::where('nama_modul', $kela->nama_modul)
            ->where('jenis', 'Pre Test')
            ->first('nama_materi');
        $jumlahsoal_pretest = PreTest::where('nama_pretest', $nama_pretest->nama_materi)->first('jumlah_soal');
        $durasi_pretest = PreTest::where('nama_pretest', $nama_pretest->nama_materi)->first('durasi');

        $nama_posttest = Materi_List::where('nama_modul', $kela->nama_modul)
            ->where('jenis', 'Post Test')
            ->first('nama_materi');
        $jumlahsoal_posttest = PostTest::where('nama_posttest', $nama_posttest->nama_materi)->first('jumlah_soal');
        $durasi_posttest = PostTest::where('nama_posttest', $nama_posttest->nama_materi)->first('durasi');

        $jumlah_materi = Materi_List::where('nama_modul', $kela->nama_modul)
            ->where('jenis', 'Materi')
            ->count();

        $kela['date_start'] = Carbon::parse($kela->date_start)
            ->locale('id')
            ->settings(['formatFunction' => 'translatedFormat'])
            ->format('l, j F Y ');
        $kela['date_end'] = Carbon::parse($kela->date_end)
            ->locale('id')
            ->settings(['formatFunction' => 'translatedFormat'])
            ->format('l, j F Y ');
        return view('dashboard.kelas.detail', [
            'kelas' => $kela,
            'jumlahsoal_pretest' => $jumlahsoal_pretest,
            'durasi_pretest' => $durasi_pretest,
            'jumlahsoal_posttest' => $jumlahsoal_posttest,
            'durasi_posttest' => $durasi_posttest,
            'jumlah_materi' => $jumlah_materi,
            'active' => 'users',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kela)
    {
        return view('dashboard.kelas.edit', [
            'kelas' => $kela,
            'active' => 'users',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKelasRequest $request, Kelas $kela)
    {
        $validated = $request->validated();
        Kelas::where('id', $kela['id'])->update($validated);

        return redirect('/dashboard/kelas')->with('success', 'Kelas telah diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kela)
    {
        Kelas::destroy($kela->id);
        return redirect('/dashboard/kelas')->with('success', 'Kelas telah dihapus!');
    }
}
