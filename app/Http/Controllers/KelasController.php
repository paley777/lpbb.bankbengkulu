<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\PreTest;
use App\Models\BankSoal;
use App\Models\Soal;
use App\Models\Sertifikat;
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
use sirajcse\UniqueIdGenerator\UniqueIdGenerator;

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
                ->get(),
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index_pegawai()
    {
        $dt = Carbon::now()->format('Y-m-d');
        return view('pegawai.kelas.index', [
            'active' => 'index',
            'kelases' => Kelas::get(),
            'materi_lists' => Materi_List::where('jenis', 'materi')->get(),
            'dt' => $dt,
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
     * Show the form for editing the specified resource.
     */
    public function regist(Kelas $kelas)
    {
        $materi = Materi_List::where('nama_modul', $kelas->nama_modul)->get();
        foreach ($materi as $materi) {
            Kemajuan_Pegawai::create([
                'nrpp' => Auth::user()->nrpp,
                'nama_modul' => $kelas->nama_modul,
                'nama_materi' => $materi->nama_materi,
                'jenis' => $materi->jenis,
                'status' => 'Ongoing',
                'skor' => 0,
            ]);
        }
        $materi = Materi_List::where('nama_modul', $kelas->nama_modul)->get();
        $status_pretest = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('jenis', 'Pre Test')
            ->where('nrpp', Auth::user()->nrpp)
            ->first();
        $status_posttest = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('jenis', 'Post Test')
            ->where('nrpp', Auth::user()->nrpp)
            ->first('status');
        $skor_pretest = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('jenis', 'Pre Test')
            ->where('nrpp', Auth::user()->nrpp)
            ->first('skor');
        $skor_posttest = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('jenis', 'Post Test')
            ->where('nrpp', Auth::user()->nrpp)
            ->first('skor');
        $status_materi = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('nrpp', Auth::user()->nrpp)
            ->where('jenis', 'Materi')
            ->where('status', 'Ongoing')
            ->first('skor');
        $kemajuan_materi = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('nrpp', Auth::user()->nrpp)
            ->where('jenis', 'Materi')
            ->get();

        return view('pegawai.kelas.room', [
            'materi' => $materi,
            'lists' => Materi::get(),
            'pretest' => PreTest::get(),
            'posttest' => PostTest::get(),
            'status_pretest' => $status_pretest,
            'status_posttest' => $status_posttest,
            'status_materi' => $status_materi,
            'kelas' => $kelas,
            'active' => 'users',
            'skor_pretest' => $skor_pretest,
            'skor_posttest' => $skor_posttest,
            'kemajuan_materi' => $kemajuan_materi,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function room(Kelas $kelas)
    {
        $materi = Materi_List::where('nama_modul', $kelas->nama_modul)->get();
        $status_pretest = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('jenis', 'Pre Test')
            ->where('nrpp', Auth::user()->nrpp)
            ->first();
        $status_posttest = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('jenis', 'Post Test')
            ->where('nrpp', Auth::user()->nrpp)
            ->first('status');
        $skor_pretest = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('jenis', 'Pre Test')
            ->where('nrpp', Auth::user()->nrpp)
            ->first('skor');
        $skor_posttest = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('jenis', 'Post Test')
            ->where('nrpp', Auth::user()->nrpp)
            ->first('skor');
        $status_materi = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('nrpp', Auth::user()->nrpp)
            ->where('jenis', 'Materi')
            ->where('status', 'Ongoing')
            ->first('skor');
        $kemajuan_materi = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('nrpp', Auth::user()->nrpp)
            ->where('jenis', 'Materi')
            ->get();

        return view('pegawai.kelas.room', [
            'materi' => $materi,
            'lists' => Materi::get(),
            'pretest' => PreTest::get(),
            'posttest' => PostTest::get(),
            'status_pretest' => $status_pretest,
            'status_posttest' => $status_posttest,
            'status_materi' => $status_materi,
            'kelas' => $kelas,
            'active' => 'users',
            'skor_pretest' => $skor_pretest,
            'skor_posttest' => $skor_posttest,
            'kemajuan_materi' => $kemajuan_materi,
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function done_materi(Kelas $kelas, $materi)
    {
        $check_materi = Materi_List::where('id', $materi)->first('nama_materi');
        Kemajuan_Pegawai::where('nrpp', Auth::user()->nrpp)
            ->where('jenis', 'Materi')
            ->where('nama_materi', $check_materi->nama_materi)
            ->update([
                'status' => 'Selesai',
                'skor' => '100',
            ]);
        $materi1 = Materi_List::where('nama_modul', $kelas->nama_modul)->get();
        $status_pretest = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('jenis', 'Pre Test')
            ->where('nrpp', Auth::user()->nrpp)
            ->first();
        $status_posttest = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('jenis', 'Post Test')
            ->where('nrpp', Auth::user()->nrpp)
            ->first('status');
        $skor_pretest = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('jenis', 'Pre Test')
            ->where('nrpp', Auth::user()->nrpp)
            ->first('skor');
        $skor_posttest = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('jenis', 'Post Test')
            ->where('nrpp', Auth::user()->nrpp)
            ->first('skor');
        $status_materi = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('nrpp', Auth::user()->nrpp)
            ->where('jenis', 'Materi')
            ->where('status', 'Ongoing')
            ->first('skor');
        $kemajuan_materi = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('nrpp', Auth::user()->nrpp)
            ->where('jenis', 'Materi')
            ->get();
        return view('pegawai.kelas.room', [
            'materi' => $materi1,
            'lists' => Materi::get(),
            'pretest' => PreTest::get(),
            'posttest' => PostTest::get(),
            'status_pretest' => $status_pretest,
            'status_posttest' => $status_posttest,
            'status_materi' => $status_materi,
            'kelas' => $kelas,
            'active' => 'users',
            'skor_pretest' => $skor_pretest,
            'skor_posttest' => $skor_posttest,
            'kemajuan_materi' => $kemajuan_materi,
            'pesan' => 'Selamat! Materi Telah Terselesaikan.',
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function start_pretest($kelas, $materi)
    {
        $nama_pretest = Materi_List::where('id', $materi)->first('nama_materi');
        $nama_bank = PreTest::where('nama_pretest', $nama_pretest->nama_materi)->first('nama_bank');

        //Yang diambil
        $pretest_info = PreTest::where('nama_pretest', $nama_pretest->nama_materi)->first();
        $data_soals = Soal::where('nama_bank', $nama_bank->nama_bank)
            ->inRandomOrder()
            ->limit($pretest_info->jumlah_soal)
            ->get();
        $kelas = Kelas::where('id', $kelas)->first();
        $materi = Materi_List::where('id', $materi)->first();
        $durasi = Carbon::parse($pretest_info->durasi)->secondsSinceMidnight();
        return view('pegawai.kelas.room.pretest', [
            'pretest_info' => $pretest_info,
            'data_soals' => $data_soals,
            'kelas' => $kelas,
            'materi' => $materi,
            'durasi' => $durasi,
            'active' => 'users',
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function start_posttest($kelas, $materi)
    {
        $nama_posttest = Materi_List::where('id', $materi)->first('nama_materi');
        $nama_bank = PostTest::where('nama_posttest', $nama_posttest->nama_materi)->first('nama_bank');

        //Yang diambil
        $posttest_info = PostTest::where('nama_posttest', $nama_posttest->nama_materi)->first();
        $data_soals = Soal::where('nama_bank', $nama_bank->nama_bank)
            ->inRandomOrder()
            ->limit($posttest_info->jumlah_soal)
            ->get();
        $kelas = Kelas::where('id', $kelas)->first();
        $materi = Materi_List::where('id', $materi)->first();
        $durasi = Carbon::parse($posttest_info->durasi)->secondsSinceMidnight();
        return view('pegawai.kelas.room.posttest', [
            'posttest_info' => $posttest_info,
            'data_soals' => $data_soals,
            'kelas' => $kelas,
            'materi' => $materi,
            'durasi' => $durasi,
            'active' => 'users',
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function start_posttest_remed($kelas, $materi)
    {
        $nama_posttest = Materi_List::where('id', $materi)->first('nama_materi');
        $nama_bank = PostTest::where('nama_posttest', $nama_posttest->nama_materi)->first('nama_bank');

        //Yang diambil
        $posttest_info = PostTest::where('nama_posttest', $nama_posttest->nama_materi)->first();
        $data_soals = Soal::where('nama_bank', $nama_bank->nama_bank)
            ->inRandomOrder()
            ->limit($posttest_info->jumlah_soal)
            ->get();
        $kelas = Kelas::where('id', $kelas)->first();
        $materi = Materi_List::where('id', $materi)->first();
        $durasi = Carbon::parse($posttest_info->durasi)->secondsSinceMidnight();
        return view('pegawai.kelas.room.posttestremed', [
            'posttest_info' => $posttest_info,
            'data_soals' => $data_soals,
            'kelas' => $kelas,
            'materi' => $materi,
            'durasi' => $durasi,
            'active' => 'users',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function start_pretest_remed($kelas, $materi)
    {
        $nama_pretest = Materi_List::where('id', $materi)->first('nama_materi');
        $nama_bank = PreTest::where('nama_pretest', $nama_pretest->nama_materi)->first('nama_bank');

        //Yang diambil
        $pretest_info = PreTest::where('nama_pretest', $nama_pretest->nama_materi)->first();
        $data_soals = Soal::where('nama_bank', $nama_bank->nama_bank)
            ->inRandomOrder()
            ->limit($pretest_info->jumlah_soal)
            ->get();
        $kelas = Kelas::where('id', $kelas)->first();
        $materi = Materi_List::where('id', $materi)->first();
        $durasi = Carbon::parse($pretest_info->durasi)->secondsSinceMidnight();
        return view('pegawai.kelas.room.pretestremed', [
            'pretest_info' => $pretest_info,
            'data_soals' => $data_soals,
            'kelas' => $kelas,
            'materi' => $materi,
            'durasi' => $durasi,
            'active' => 'users',
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function submit_pretest(Kelas $kelas, $materi, Request $request)
    {
        $benar = 0;
        $jumlah = count($request->id);
        foreach ($request->id as $id) {
            $correct_ans = Soal::where('id', $id)->first('correct_ans');
            $user_ans = $request->input('ans_' . $id);
            if ($correct_ans->correct_ans === $user_ans[0]) {
                $benar = $benar + 1;
            }
        }
        $skor = (100 / $jumlah) * $benar;
        if ($skor < 70) {
            Kemajuan_Pegawai::where('jenis', 'Pre Test')
                ->where('nrpp', Auth::user()->nrpp)
                ->update([
                    'status' => 'Belum Lulus',
                    'skor' => $skor,
                ]);
        } else {
            Kemajuan_Pegawai::where('jenis', 'Pre Test')
                ->where('nrpp', Auth::user()->nrpp)
                ->update([
                    'status' => 'Lulus',
                    'skor' => $skor,
                ]);
        }
        $materi = Materi_List::where('nama_modul', $kelas->nama_modul)->get();
        $status_pretest = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('jenis', 'Pre Test')
            ->where('nrpp', Auth::user()->nrpp)
            ->first();
        $status_posttest = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('jenis', 'Post Test')
            ->where('nrpp', Auth::user()->nrpp)
            ->first('status');
        $skor_pretest = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('jenis', 'Pre Test')
            ->where('nrpp', Auth::user()->nrpp)
            ->first('skor');
        $skor_posttest = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('jenis', 'Post Test')
            ->where('nrpp', Auth::user()->nrpp)
            ->first('skor');
        $status_materi = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('nrpp', Auth::user()->nrpp)
            ->where('jenis', 'Materi')
            ->where('status', 'Ongoing')
            ->first('skor');
        $kemajuan_materi = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('nrpp', Auth::user()->nrpp)
            ->where('jenis', 'Materi')
            ->get();
        return view('pegawai.kelas.room', [
            'materi' => $materi,
            'lists' => Materi::get(),
            'pretest' => PreTest::get(),
            'posttest' => PostTest::get(),
            'status_pretest' => $status_pretest,
            'status_posttest' => $status_posttest,
            'kelas' => $kelas,
            'active' => 'users',
            'skor_pretest' => $skor_pretest,
            'skor_posttest' => $skor_posttest,
            'status_materi' => $status_materi,
            'kemajuan_materi' => $kemajuan_materi,
            'pesan' => 'Selamat! Pre Test berhasil diselesaikan.',
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function submit_posttest(Kelas $kelas, $materi, Request $request)
    {
        $benar = 0;
        $jumlah = count($request->id);
        foreach ($request->id as $id) {
            $correct_ans = Soal::where('id', $id)->first('correct_ans');
            $user_ans = $request->input('ans_' . $id);
            if ($correct_ans->correct_ans === $user_ans[0]) {
                $benar = $benar + 1;
            }
        }
        $skor = (100 / $jumlah) * $benar;
        if ($skor < 70) {
            Kemajuan_Pegawai::where('jenis', 'Post Test')
                ->where('nrpp', Auth::user()->nrpp)
                ->update([
                    'status' => 'Belum Lulus',
                    'skor' => $skor,
                ]);
        } else {
            Kemajuan_Pegawai::where('jenis', 'Post Test')
                ->where('nrpp', Auth::user()->nrpp)
                ->update([
                    'status' => 'Lulus',
                    'skor' => $skor,
                ]);
            $id1 = UniqueIdGenerator::generate(['table' => 'sertifikats', 'field' => 'no_sertifikat', 'length' => 6, 'suffix' => date('/Y'), 'reset_on_change' => 'suffix']);
            Sertifikat::create([
                'nrpp' => Auth::user()->nrpp,
                'nama_modul' => $kelas->nama_modul,
                'no_sertifikat' => $id1,
            ]);
        }
        $materi = Materi_List::where('nama_modul', $kelas->nama_modul)->get();
        $status_pretest = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('jenis', 'Pre Test')
            ->where('nrpp', Auth::user()->nrpp)
            ->first();
        $status_posttest = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('jenis', 'Post Test')
            ->where('nrpp', Auth::user()->nrpp)
            ->first('status');
        $skor_pretest = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('jenis', 'Pre Test')
            ->where('nrpp', Auth::user()->nrpp)
            ->first('skor');
        $skor_posttest = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('jenis', 'Post Test')
            ->where('nrpp', Auth::user()->nrpp)
            ->first('skor');
        $status_materi = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('nrpp', Auth::user()->nrpp)
            ->where('jenis', 'Materi')
            ->where('status', 'Ongoing')
            ->first('skor');
        $kemajuan_materi = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('nrpp', Auth::user()->nrpp)
            ->where('jenis', 'Materi')
            ->get();
        return view('pegawai.kelas.room', [
            'materi' => $materi,
            'lists' => Materi::get(),
            'pretest' => PreTest::get(),
            'posttest' => PostTest::get(),
            'status_pretest' => $status_pretest,
            'status_posttest' => $status_posttest,
            'kelas' => $kelas,
            'active' => 'users',
            'skor_pretest' => $skor_pretest,
            'skor_posttest' => $skor_posttest,
            'status_materi' => $status_materi,
            'kemajuan_materi' => $kemajuan_materi,
            'pesan' => 'Selamat! Post Test berhasil diselesaikan.',
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function submit_posttest_remed(Kelas $kelas, $materi, Request $request)
    {
        $benar = 0;
        $jumlah = count($request->id);
        foreach ($request->id as $id) {
            $correct_ans = Soal::where('id', $id)->first('correct_ans');
            $user_ans = $request->input('ans_' . $id);
            if ($correct_ans->correct_ans === $user_ans[0]) {
                $benar = $benar + 1;
            }
        }
        $skor_awal = (100 / $jumlah) * $benar;
        $skor = 70 + ($skor_awal - 70) / ((100 - 70) / 10);
        if ($skor < 70) {
            Kemajuan_Pegawai::where('jenis', 'Post Test')
                ->where('nrpp', Auth::user()->nrpp)
                ->update([
                    'status' => 'Tidak Lulus',
                    'skor' => $skor,
                ]);
            $id1 = UniqueIdGenerator::generate(['table' => 'sertifikats', 'field' => 'no_sertifikat', 'length' => 6, 'suffix' => date('/Y'), 'reset_on_change' => 'suffix']);
            Sertifikat::create([
                'nrpp' => Auth::user()->nrpp,
                'nama_modul' => $kelas->nama_modul,
                'no_sertifikat' => $id1,
            ]);
        } else {
            Kemajuan_Pegawai::where('jenis', 'Post Test')
                ->where('nrpp', Auth::user()->nrpp)
                ->update([
                    'status' => 'Lulus',
                    'skor' => $skor,
                ]);
            $id1 = UniqueIdGenerator::generate(['table' => 'sertifikats', 'field' => 'no_sertifikat', 'length' => 6, 'suffix' => date('/Y'), 'reset_on_change' => 'suffix']);
            Sertifikat::create([
                'nrpp' => Auth::user()->nrpp,
                'nama_modul' => $kelas->nama_modul,
                'no_sertifikat' => $id1,
            ]);
        }
        $materi = Materi_List::where('nama_modul', $kelas->nama_modul)->get();
        $status_pretest = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('jenis', 'Pre Test')
            ->where('nrpp', Auth::user()->nrpp)
            ->first();
        $status_posttest = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('jenis', 'Post Test')
            ->where('nrpp', Auth::user()->nrpp)
            ->first('status');
        $skor_pretest = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('jenis', 'Pre Test')
            ->where('nrpp', Auth::user()->nrpp)
            ->first('skor');
        $skor_posttest = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('jenis', 'Post Test')
            ->where('nrpp', Auth::user()->nrpp)
            ->first('skor');
        $status_materi = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('nrpp', Auth::user()->nrpp)
            ->where('jenis', 'Materi')
            ->where('status', 'Ongoing')
            ->first('skor');
        $kemajuan_materi = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('nrpp', Auth::user()->nrpp)
            ->where('jenis', 'Materi')
            ->get();
        return view('pegawai.kelas.room', [
            'materi' => $materi,
            'lists' => Materi::get(),
            'pretest' => PreTest::get(),
            'posttest' => PostTest::get(),
            'status_pretest' => $status_pretest,
            'status_posttest' => $status_posttest,
            'kelas' => $kelas,
            'active' => 'users',
            'skor_pretest' => $skor_pretest,
            'skor_posttest' => $skor_posttest,
            'status_materi' => $status_materi,
            'kemajuan_materi' => $kemajuan_materi,
            'pesan' => 'Selamat! Post Test berhasil diselesaikan.',
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function submit_pretest_remed(Kelas $kelas, $materi, Request $request)
    {
        $benar = 0;
        $jumlah = count($request->id);
        foreach ($request->id as $id) {
            $correct_ans = Soal::where('id', $id)->first('correct_ans');
            $user_ans = $request->input('ans_' . $id);
            if ($correct_ans->correct_ans === $user_ans[0]) {
                $benar = $benar + 1;
            }
        }
        $skor_awal = (100 / $jumlah) * $benar;
        $skor = 70 + ($skor_awal - 70) / ((100 - 70) / 10);
        if ($skor < 70) {
            Kemajuan_Pegawai::where('jenis', 'Pre Test')
                ->where('nrpp', Auth::user()->nrpp)
                ->update([
                    'status' => 'Tidak Lulus',
                    'skor' => $skor,
                ]);
        } else {
            Kemajuan_Pegawai::where('jenis', 'Pre Test')
                ->where('nrpp', Auth::user()->nrpp)
                ->update([
                    'status' => 'Lulus',
                    'skor' => $skor,
                ]);
        }
        $materi = Materi_List::where('nama_modul', $kelas->nama_modul)->get();
        $status_pretest = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('jenis', 'Pre Test')
            ->where('nrpp', Auth::user()->nrpp)
            ->first();
        $status_posttest = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('jenis', 'Post Test')
            ->where('nrpp', Auth::user()->nrpp)
            ->first('status');
        $skor_pretest = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('jenis', 'Pre Test')
            ->where('nrpp', Auth::user()->nrpp)
            ->first('skor');
        $skor_posttest = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('jenis', 'Post Test')
            ->where('nrpp', Auth::user()->nrpp)
            ->first('skor');
        $status_materi = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('nrpp', Auth::user()->nrpp)
            ->where('jenis', 'Materi')
            ->where('status', 'Ongoing')
            ->first('skor');
        $kemajuan_materi = Kemajuan_Pegawai::where('nama_modul', $kelas->nama_modul)
            ->where('nrpp', Auth::user()->nrpp)
            ->where('jenis', 'Materi')
            ->get();
        return view('pegawai.kelas.room', [
            'materi' => $materi,
            'lists' => Materi::get(),
            'pretest' => PreTest::get(),
            'posttest' => PostTest::get(),
            'status_pretest' => $status_pretest,
            'status_posttest' => $status_posttest,
            'kelas' => $kelas,
            'active' => 'users',
            'skor_pretest' => $skor_pretest,
            'skor_posttest' => $skor_posttest,
            'status_materi' => $status_materi,
            'kemajuan_materi' => $kemajuan_materi,
            'pesan' => 'Selamat! Pre Test berhasil diselesaikan.',
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
