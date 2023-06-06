<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\BankSoal;
use App\Http\Requests\StoreSoalRequest;
use App\Http\Requests\UpdateSoalRequest;
use Illuminate\Http\Request;
use App\Imports\SoalsImport;
use DB;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Facades\Excel;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BankSoal  $product
     * @return \Illuminate\Http\Response
     */
    public function index(BankSoal $soal)
    {
        return view('dashboard.kompetensi.bank.soal.index', [
            'active' => 'bank',
            'nama_bank' => BankSoal::where('id', $soal->id)->first()->nama_bank,
            'bankid' => $soal->id,
            'soals' => Soal::where('nama_bank', $soal->nama_bank)
                ->orderBy('soal', 'desc')
                ->get(),
        ]);
    }
    //SEARCH
    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;
        $soal_id = $request->soal_id;
        $nama_bank = BankSoal::where('id', $soal_id)->first()->nama_bank;

        return view('dashboard.kompetensi.bank.soal.index', [
            'active' => 'bank',
            'nama_bank' => $nama_bank,
            'bankid' => $soal_id,
            'soals' => Soal::where('nama_bank', $nama_bank)
                ->where('soal', 'like', '%' . $cari . '%')
                ->orderBy('soal', 'desc')
                ->get(),
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BankSoal  $product
     * @return \Illuminate\Http\Response
     */
    public function create($soal)
    {
        return view('dashboard.kompetensi.bank.soal.create', [
            'active' => 'bank',
            'nama_bank' => BankSoal::where('id', $soal)->first()->nama_bank,
            'bankid' => $soal,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSoalRequest $request)
    {
        $validated = $request->validated();
        Soal::create($validated);

        return view('dashboard.kompetensi.bank.soal.index', [
            'active' => 'bank',
            'nama_bank' => $request->nama_bank,
            'bankid' => $request->bankid,
            'soals' => Soal::where('nama_bank', $request->nama_bank)
                ->orderBy('soal', 'desc')
                ->get(),
            'pesan' => 'Soal berhasil ditambahkan!',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Soal $soal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Soal $soal)
    {
        return view('dashboard.kompetensi.bank.soal.edit', [
            'soal' => $soal,
            'active' => 'bank',
            'bankid' => BankSoal::where('nama_bank', $soal->nama_bank)->first()->id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSoalRequest $request, Soal $soal)
    {
        $validated = $request->validated();
        Soal::where('id', $soal['id'])->update($validated);

        return view('dashboard.kompetensi.bank.soal.index', [
            'active' => 'bank',
            'nama_bank' => $request->nama_bank,
            'bankid' => $request->bankid,
            'soals' => Soal::where('nama_bank', $request->nama_bank)
                ->orderBy('soal', 'desc')
                ->get(),
            'pesan' => 'Soal berhasil diubah!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Soal $soal)
    {
        Soal::destroy($soal->id);
        return view('dashboard.kompetensi.bank.soal.index', [
            'active' => 'bank',
            'nama_bank' => $soal->nama_bank,
            'bankid' => BankSoal::where('nama_bank', $soal->nama_bank)->first()->id,
            'soals' => Soal::where('nama_bank', $soal->nama_bank)
                ->orderBy('soal', 'desc')
                ->get(),
            'pesan' => 'Soal berhasil dihapus!',
        ]);
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function soalImport(Request $request)
    {
        Excel::import(new SoalsImport(), $request->file('file')->store('temp'));
        return back()->with('success', 'Data telah diimpor!');
    }
    //
    //

    public function multiplesoalsdelete(Request $request)
    {
        $id = $request->id;
        $nama_bank = Soal::where('id', $id[0])->first()->nama_bank;
        $bankid = BankSoal::where('nama_bank', $nama_bank)->first()->id;
        foreach ($id as $soal) {
            Soal::where('id', $soal)->delete();
        }
        return view('dashboard.kompetensi.bank.soal.index', [
            'active' => 'bank',
            'nama_bank' => $nama_bank,
            'bankid' => $bankid,
            'soals' => Soal::where('nama_bank', $nama_bank)
                ->orderBy('soal', 'desc')
                ->get(),
            'pesan' => 'Soal berhasil dihapus!',
        ]);
    }
}
