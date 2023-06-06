<?php

namespace App\Http\Controllers;

use App\Models\PostTest;
use App\Models\Materi_List;
use App\Models\BankSoal;
use App\Models\Soal;
use App\Http\Requests\StorePostTestRequest;
use App\Http\Requests\UpdatePostTestRequest;
use Illuminate\Http\Request;

class PostTestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.kompetensi.posttest.index', [
            'active' => 'posttest',
            'posttests' => PostTest::orderBy('nama_posttest', 'desc')
                ->filter(request(['search']))
                ->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.kompetensi.posttest.create', [
            'active' => 'posttest',
            'banks' => BankSoal::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostTestRequest $request)
    {
        $validated = $request->validated();
        $maksimum = Soal::select('nama_bank', $validated['nama_bank'])->count();
        if ($validated['jumlah_soal'] > $maksimum) {
            return redirect('/dashboard/post-test')->withErrors(['msg' => 'Jumlah soal melebihi bank soal yang tersedia!']);
        } else {
            PostTest::create($validated);
            return redirect('/dashboard/post-test')->with('success', 'Post Test telah ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PostTest $postTest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PostTest $postTest)
    {
        return view('dashboard.kompetensi.posttest.edit', [
            'posttest' => $postTest,
            'active' => 'posttest',
            'banks' => BankSoal::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostTestRequest $request, PostTest $postTest)
    {
        $validated = $request->validated();
        $maksimum = Soal::select('nama_bank', $validated['nama_bank'])->count();

        if ($validated['jumlah_soal'] > $maksimum) {
            return redirect('/dashboard/post-test')->withErrors(['msg' => 'Jumlah soal melebihi bank soal yang tersedia!']);
        } else {
            PostTest::where('id', $postTest['id'])->update($validated);
            Materi_List::where('jenis', 'Post Test')
                ->where('nama_materi', $postTest->nama_posttest)
                ->update([
                    'nama_materi' => $request->nama_posttest,
                ]);
            return redirect('/dashboard/post-test')->with('success', 'Post Test telah diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostTest $postTest)
    {
        Materi_List::where('jenis', 'Post Test')
            ->where('nama_materi', $postTest->nama_posttest)
            ->delete();
        PostTest::destroy($postTest->id);
        return redirect('/dashboard/post-test')->with('success', 'Post Test telah dihapus!');
    }

    public function multipleposttestsdelete(Request $request)
    {
        $id = $request->id;
        foreach ($id as $posttest) {
            $nama_posttest = PostTest::where('id', $posttest)->first('nama_posttest');
            Materi_List::where('jenis', 'Post Test')
                ->where('nama_materi', $nama_posttest->nama_posttest)
                ->delete();
            PostTest::where('id', $posttest)->delete();
        }
        return redirect('/dashboard/post-test')->with('success', 'Post Test telah dihapus!');
    }
}
