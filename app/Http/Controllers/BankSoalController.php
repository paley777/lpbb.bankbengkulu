<?php

namespace App\Http\Controllers;

use App\Models\BankSoal;
use App\Models\Soal;
use App\Http\Requests\StoreBankSoalRequest;
use App\Http\Requests\UpdateBankSoalRequest;
use Illuminate\Http\Request;

class BankSoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.kompetensi.bank.index', [
            'active' => 'bank',
            'banks' => BankSoal::orderBy('nama_bank', 'desc')
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
        return view('dashboard.kompetensi.bank.create', [
            'active' => 'bank',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_bank' => 'required|unique:bank_soals',
            'jenis' => 'required',
        ]);
        BankSoal::create($validatedData);

        return redirect('/dashboard/bank-soal')->with('success', 'Bank Soal telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(BankSoal $bankSoal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BankSoal $bank_soal)
    {
        return view('dashboard.kompetensi.bank.edit', [
            'bank' => $bank_soal,
            'active' => 'bank',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBankSoalRequest $request, BankSoal $bank_soal)
    {
        Soal::where('nama_bank', $bank_soal['nama_bank'])->update([
            'nama_bank' => $request['nama_bank'],
        ]);
        
        $validated = $request->validated();
        BankSoal::where('id', $bank_soal['id'])->update($validated);

        return redirect('/dashboard/bank-soal')->with('success', 'Bank Soal telah diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BankSoal $bank_soal)
    {
        Soal::where('nama_bank', $bank_soal->nama_bank)->delete();
        BankSoal::destroy($bank_soal->id);
        return redirect('/dashboard/bank-soal')->with('success', 'Bank Soal telah dihapus!');
    }

    public function multiplebanksdelete(Request $request)
    {
        $nama_bank = $request->nama_bank;
        foreach ($nama_bank as $nama_bank) {
            Soal::where('nama_bank', $nama_bank)->delete();
            BankSoal::where('nama_bank', $nama_bank)->delete();
        }
        return redirect('/dashboard/bank-soal')->with('success', 'Bank Soal telah dihapus!');
    }
}