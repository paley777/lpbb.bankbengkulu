<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\PreTest;
use App\Models\PostTest;
use App\Models\Materi_List;
use App\Models\Materi;
use App\Models\Kemajuan_Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Http\Requests\StoreKelasRequest;
use App\Http\Requests\UpdateKelasRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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
     * Display the specified resource.
     */
    public function detail(Kelas $kelas)
    {
        $find_modul = Kemajuan_Pegawai::where('nrpp', Auth::user()->nrpp)
            ->where('nama_modul', $kelas->nama_modul)
            ->first();
        if (is_null($find_modul)) {
            $nama_pretest = Materi_List::where('nama_modul', $kelas->nama_modul)
                ->where('jenis', 'Pre Test')
                ->first('nama_materi');
            $jumlahsoal_pretest = PreTest::where('nama_pretest', $nama_pretest->nama_materi)->first('jumlah_soal');
            $durasi_pretest = PreTest::where('nama_pretest', $nama_pretest->nama_materi)->first('durasi');
            $nama_posttest = Materi_List::where('nama_modul', $kelas->nama_modul)
                ->where('jenis', 'Post Test')
                ->first('nama_materi');
            $jumlahsoal_posttest = PostTest::where('nama_posttest', $nama_posttest->nama_materi)->first('jumlah_soal');
            $durasi_posttest = PostTest::where('nama_posttest', $nama_posttest->nama_materi)->first('durasi');
            $jumlah_materi = Materi_List::where('nama_modul', $kelas->nama_modul)
                ->where('jenis', 'Materi')
                ->count();
            $kelas['date_start'] = Carbon::parse($kelas->date_start)
                ->locale('id')
                ->settings(['formatFunction' => 'translatedFormat'])
                ->format('l, j F Y ');
            $kelas['date_end'] = Carbon::parse($kelas->date_end)
                ->locale('id')
                ->settings(['formatFunction' => 'translatedFormat'])
                ->format('l, j F Y ');
            return view('pegawai.kelas.detail', [
                'kelas' => $kelas,
                'jumlahsoal_pretest' => $jumlahsoal_pretest,
                'durasi_pretest' => $durasi_pretest,
                'jumlahsoal_posttest' => $jumlahsoal_posttest,
                'durasi_posttest' => $durasi_posttest,
                'jumlah_materi' => $jumlah_materi,
                'active' => 'unregist',
            ]);
        } else {
            $nama_pretest = Materi_List::where('nama_modul', $kelas->nama_modul)
                ->where('jenis', 'Pre Test')
                ->first('nama_materi');
            $jumlahsoal_pretest = PreTest::where('nama_pretest', $nama_pretest->nama_materi)->first('jumlah_soal');
            $durasi_pretest = PreTest::where('nama_pretest', $nama_pretest->nama_materi)->first('durasi');
            $nama_posttest = Materi_List::where('nama_modul', $kelas->nama_modul)
                ->where('jenis', 'Post Test')
                ->first('nama_materi');
            $jumlahsoal_posttest = PostTest::where('nama_posttest', $nama_posttest->nama_materi)->first('jumlah_soal');
            $durasi_posttest = PostTest::where('nama_posttest', $nama_posttest->nama_materi)->first('durasi');
            $jumlah_materi = Materi_List::where('nama_modul', $kelas->nama_modul)
                ->where('jenis', 'Materi')
                ->count();
            $kelas['date_start'] = Carbon::parse($kelas->date_start)
                ->locale('id')
                ->settings(['formatFunction' => 'translatedFormat'])
                ->format('l, j F Y ');
            $kelas['date_end'] = Carbon::parse($kelas->date_end)
                ->locale('id')
                ->settings(['formatFunction' => 'translatedFormat'])
                ->format('l, j F Y ');
            return view('pegawai.kelas.detail', [
                'kelas' => $kelas,
                'jumlahsoal_pretest' => $jumlahsoal_pretest,
                'durasi_pretest' => $durasi_pretest,
                'jumlahsoal_posttest' => $jumlahsoal_posttest,
                'durasi_posttest' => $durasi_posttest,
                'jumlah_materi' => $jumlah_materi,
                'active' => 'regist',
            ]);
        }
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
        Materi_List::where('nama_modul', $kela->nama_modul)->update([
            'nama_modul' => $request->nama_modul,
        ]);

        return redirect('/dashboard/kelas')->with('success', 'Kelas telah diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kela)
    {
        $nama_list = Materi_List::where('nama_modul', $kela->nama_modul)->get();
        foreach ($nama_list as $nama_list) {
            Materi::where('nama_materi', $nama_list->nama_materi)->delete();
        }
        Materi_List::where('nama_modul', $kela->nama_modul)->delete();
        Kelas::destroy($kela->id);
        return redirect('/dashboard/kelas')->with('success', 'Kelas telah dihapus!');
    }
}
