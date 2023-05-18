<?php

namespace App\Http\Controllers;

use App\Models\PreTest;
use App\Models\Materi_List;
use App\Models\BankSoal;
use App\Models\Soal;
use App\Http\Requests\StorePreTestRequest;
use App\Http\Requests\UpdatePreTestRequest;
use Illuminate\Http\Request;

class PreTestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.kompetensi.pretest.index', [
            'active' => 'pretest',
            'pretests' => PreTest::orderBy('nama_pretest', 'desc')
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
        return view('dashboard.kompetensi.pretest.create', [
            'active' => 'pretest',
            'banks' => BankSoal::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePreTestRequest $request)
    {
        $validated = $request->validated();
        $maksimum = Soal::select('nama_bank', $validated['nama_bank'])->count();
        if ($validated['jumlah_soal'] > $maksimum) {
            return redirect('/dashboard/pre-test')->withErrors(['msg' => 'Jumlah soal melebihi bank soal yang tersedia!']);
        } else {
            PreTest::create($validated);
            return redirect('/dashboard/pre-test')->with('success', 'Pre Test telah ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PreTest $preTest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PreTest $preTest)
    {
        return view('dashboard.kompetensi.pretest.edit', [
            'pretest' => $preTest,
            'active' => 'pretest',
            'banks' => BankSoal::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePreTestRequest $request, PreTest $preTest)
    {
        $validated = $request->validated();
        $maksimum = Soal::select('nama_bank', $validated['nama_bank'])->count();

        if ($validated['jumlah_soal'] > $maksimum) {
            return redirect('/dashboard/pre-test')->withErrors(['msg' => 'Jumlah soal melebihi bank soal yang tersedia!']);
        } else {
            PreTest::where('id', $preTest['id'])->update($validated);
            Materi_List::where('jenis', 'Pre Test')
                ->where('nama_materi', $preTest->nama_pretest)
                ->update([
                    'nama_materi' => $request->nama_pretest,
                ]);
            return redirect('/dashboard/pre-test')->with('success', 'Pre Test telah diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PreTest $preTest)
    {
        Materi_List::where('jenis', 'Pre Test')
            ->where('nama_materi', $preTest->nama_pretest)
            ->delete();
        PreTest::destroy($preTest->id);
        return redirect('/dashboard/pre-test')->with('success', 'Pre Test telah dihapus!');
    }

    public function multiplepretestsdelete(Request $request)
    {
        $id = $request->id;
        foreach ($id as $pretest) {
            $nama_pretest = PreTest::where('id', $pretest)->first('nama_pretest');
            Materi_List::where('jenis', 'Pre Test')
                ->where('nama_materi', $nama_pretest->nama_pretest)
                ->delete();
            PreTest::where('id', $pretest)->delete();
        }
        return redirect('/dashboard/pre-test')->with('success', 'Pre Test telah dihapus!');
    }
}
