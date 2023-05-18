<?php

namespace App\Http\Controllers;

use App\Models\Materi_List;
use App\Models\Materi;
use App\Models\Kelas;
use App\Models\PreTest;
use App\Models\PostTest;
use Illuminate\Support\Arr;
use App\Http\Requests\StoreMateri_ListRequest;
use App\Http\Requests\UpdateMateri_ListRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MateriListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($kelas)
    {
        $nama_modul = Kelas::where('id', $kelas)->first()->nama_modul;
        return view('dashboard.kelas.materilist.index', [
            'materi_lists' => Materi_List::where('nama_modul', $nama_modul)
                ->orderBy('created_at', 'asc')
                ->paginate(50)
                ->withQueryString(),
            'nama_modul' => $nama_modul,
            'kelas' => $kelas,
            'active' => 'users',
            'posttests' => PostTest::get(),
            'pretests' => PreTest::get(),
            'materis' => Materi::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_pretest($kelas)
    {
        $nama_modul = Kelas::where('id', $kelas)->first()->nama_modul;
        return view('dashboard.kelas.materilist.pretest.create', [
            'active' => 'users',
            'pretests' => PreTest::get(),
            'kelas' => $kelas,
            'nama_modul' => $nama_modul,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_pretest(Request $request)
    {
        $validatedData = $request->validate([
            'nama_materi' => 'required|unique:materi__lists',
            'nama_modul' => 'required',
            'jenis' => 'required',
        ]);
        Materi_List::create($validatedData);
        $kelas = $request->kelas;
        return view('dashboard.kelas.materilist.index', [
            'materi_lists' => Materi_List::where('nama_modul', $request->nama_modul)
                ->orderBy('created_at', 'desc')
                ->paginate(20)
                ->withQueryString(),
            'nama_modul' => $request->nama_modul,
            'kelas' => $kelas,
            'active' => 'users',
            'pretests' => PreTest::get(),
            'posttests' => PostTest::get(),
            'materis' => Materi::get(),
            'pesan' => 'Pre Test berhasil ditambahkan!',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Materi_List $materi_List)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit_pretest(Materi_List $kelas)
    {
        $id_kelas = Kelas::where('nama_modul', $kelas->nama_modul)->first()->id;
        return view('dashboard.kelas.materilist.pretest.edit', [
            'materi_list' => $kelas,
            'kelas' => $id_kelas,
            'active' => 'users',
            'pretests' => PreTest::get(),
            'nama_modul' => $kelas->nama_modul,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_pretest(Request $request, Materi_List $kelas)
    {
        $validatedData = $request->validate([
            'nama_materi' => 'required|unique:materi__lists,nama_materi,' . $kelas->id . ',id',
            'nama_modul' => 'required',
            'jenis' => 'required',
        ]);
        Materi_List::where('id', $kelas->id)->update($validatedData);
        $kelas = $request->kelas;
        return view('dashboard.kelas.materilist.index', [
            'materi_lists' => Materi_List::where('nama_modul', $request->nama_modul)
                ->orderBy('created_at', 'desc')
                ->paginate(20)
                ->withQueryString(),
            'nama_modul' => $request->nama_modul,
            'kelas' => $kelas,
            'active' => 'users',
            'pretests' => PreTest::get(),
            'posttests' => PostTest::get(),
            'materis' => Materi::get(),
            'pesan' => 'Pre Test berhasil diubah!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materi_List $kelas)
    {
        Materi_List::destroy($kelas->id);
        $id_kelas = Kelas::where('nama_modul', $kelas->nama_modul)->first()->id;
        return view('dashboard.kelas.materilist.index', [
            'materi_lists' => Materi_List::where('nama_modul', $kelas->nama_modul)
                ->orderBy('created_at', 'desc')
                ->paginate(20)
                ->withQueryString(),
            'nama_modul' => $kelas->nama_modul,
            'kelas' => $id_kelas,
            'active' => 'users',
            'pretests' => PreTest::get(),
            'posttests' => PostTest::get(),
            'materis' => Materi::get(),
            'pesan' => 'Berhasil dihapus!',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_posttest($kelas)
    {
        $nama_modul = Kelas::where('id', $kelas)->first()->nama_modul;
        return view('dashboard.kelas.materilist.posttest.create', [
            'active' => 'users',
            'posttests' => PostTest::get(),
            'kelas' => $kelas,
            'nama_modul' => $nama_modul,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store_posttest(Request $request)
    {
        $validatedData = $request->validate([
            'nama_materi' => 'required|unique:materi__lists',
            'nama_modul' => 'required',
            'jenis' => 'required',
        ]);
        Materi_List::create($validatedData);
        $kelas = $request->kelas;
        return view('dashboard.kelas.materilist.index', [
            'materi_lists' => Materi_List::where('nama_modul', $request->nama_modul)
                ->orderBy('created_at', 'desc')
                ->paginate(20)
                ->withQueryString(),
            'nama_modul' => $request->nama_modul,
            'kelas' => $kelas,
            'active' => 'users',
            'pretests' => PreTest::get(),
            'posttests' => PostTest::get(),
            'materis' => Materi::get(),
            'pesan' => 'Post Test berhasil ditambahkan!',
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit_posttest(Materi_List $kelas)
    {
        $id_kelas = Kelas::where('nama_modul', $kelas->nama_modul)->first()->id;
        return view('dashboard.kelas.materilist.posttest.edit', [
            'materi_list' => $kelas,
            'kelas' => $id_kelas,
            'active' => 'users',
            'posttests' => PostTest::get(),
            'nama_modul' => $kelas->nama_modul,
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update_posttest(Request $request, Materi_List $kelas)
    {
        $validatedData = $request->validate([
            'nama_materi' => 'required|unique:materi__lists,nama_materi,' . $kelas->id . ',id',
            'nama_modul' => 'required',
            'jenis' => 'required',
        ]);
        Materi_List::where('id', $kelas->id)->update($validatedData);
        $kelas = $request->kelas;
        return view('dashboard.kelas.materilist.index', [
            'materi_lists' => Materi_List::where('nama_modul', $request->nama_modul)
                ->orderBy('created_at', 'desc')
                ->paginate(20)
                ->withQueryString(),
            'nama_modul' => $request->nama_modul,
            'kelas' => $kelas,
            'active' => 'users',
            'pretests' => PreTest::get(),
            'posttests' => PostTest::get(),
            'materis' => Materi::get(),
            'pesan' => 'Post Test berhasil diubah!',
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create_materi($kelas)
    {
        $nama_modul = Kelas::where('id', $kelas)->first()->nama_modul;
        return view('dashboard.kelas.materilist.materi.create', [
            'active' => 'users',
            'kelas' => $kelas,
            'nama_modul' => $nama_modul,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_materi(Request $request)
    {
        $validatedData1 = $request->validate([
            'nama_materi' => 'required|unique:materi__lists',
            'nama_modul' => 'required',
            'jenis' => 'required',
        ]);
        Materi_List::create($validatedData1);
        if ($request->jenis_materi == 'ppt') {
            $validatedData2 = $request->validate([
                'nama_materi' => 'required|unique:materis',
                'materi1' => 'file|required',
                'jenis_materi' => 'required',
            ]);

            $validatedData2['materi'] = $request->file('materi1')->store('materi');
            Materi::create($validatedData2);
        } elseif ($request->jenis_materi == 'video') {
            $validatedData2 = $request->validate([
                'nama_materi' => 'required|unique:materis',
                'materi2' => 'file|required',
                'jenis_materi' => 'required',
            ]);

            $validatedData2['materi'] = $request->file('materi2')->store('materi');
            Materi::create($validatedData2);
        } else {
            $validatedData2 = $request->validate([
                'nama_materi' => 'required|unique:materis',
                'materi3' => 'file|required',
                'jenis_materi' => 'required',
            ]);

            $validatedData2['materi'] = $request->file('materi3')->store('materi');
            Materi::create($validatedData2);
        }

        $kelas = $request->kelas;
        return view('dashboard.kelas.materilist.index', [
            'materi_lists' => Materi_List::where('nama_modul', $request->nama_modul)
                ->orderBy('created_at', 'desc')
                ->paginate(20)
                ->withQueryString(),
            'nama_modul' => $request->nama_modul,
            'kelas' => $kelas,
            'active' => 'users',
            'pretests' => PreTest::get(),
            'posttests' => PostTest::get(),
            'materis' => Materi::get(),
            'pesan' => 'Materi berhasil ditambahkan!',
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit_materi(Materi_List $kelas)
    {
        $id_kelas = Kelas::where('nama_modul', $kelas->nama_modul)->first()->id;
        return view('dashboard.kelas.materilist.materi.edit', [
            'materi_list' => $kelas,
            'kelas' => $id_kelas,
            'active' => 'users',
            'nama_modul' => $kelas->nama_modul,
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update_materi(Request $request, Materi_List $kelas)
    {
        $id_materi = Materi::where('nama_materi', $kelas->nama_materi)->first('id');

        $validatedData = $request->validate([
            'nama_materi' => 'required|unique:materi__lists,nama_materi,' . $kelas->id . ',id',
            'nama_modul' => 'required',
            'jenis' => 'required',
        ]);
        Materi_List::where('id', $kelas->id)->update($validatedData);

        if ($request->jenis_materi == 'ppt') {
            $validatedData2 = $request->validate([
                'nama_materi' => 'required',
                'jenis_materi' => 'required',
            ]);

            if ($request->file('materi1')) {
                $data = Materi::where('id', $id_materi->id)->first();
                if ($data->materi) {
                    Storage::delete($data['materi']);
                } else {
                }
                $validatedData2['materi'] = $request->file('materi1')->store('materi');
            }

            Materi::where('id', $id_materi->id)->update($validatedData2);
        } elseif ($request->jenis_materi == 'video') {
            $validatedData2 = $request->validate([
                'nama_materi' => 'required',
                'jenis_materi' => 'required',
            ]);

            if ($request->file('materi2')) {
                $data = Materi::where('id', $id_materi->id)->first();
                if ($data->materi) {
                    Storage::delete($data['materi']);
                } else {
                }
                $validatedData2['materi'] = $request->file('materi2')->store('materi');
            }

            Materi::where('id', $id_materi->id)->update($validatedData2);
        } else {
            $validatedData2 = $request->validate([
                'nama_materi' => 'required',
                'jenis_materi' => 'required',
            ]);

            if ($request->file('materi3')) {
                $data = Materi::where('id', $id_materi->id)->first();
                if ($data->materi) {
                    Storage::delete($data['materi']);
                } else {
                }
                $validatedData2['materi'] = $request->file('materi3')->store('materi');
            }

            Materi::where('id', $id_materi->id)->update($validatedData2);
        }
        $kelas = $request->kelas;
        return view('dashboard.kelas.materilist.index', [
            'materi_lists' => Materi_List::where('nama_modul', $request->nama_modul)
                ->orderBy('created_at', 'desc')
                ->paginate(20)
                ->withQueryString(),
            'nama_modul' => $request->nama_modul,
            'kelas' => $kelas,
            'active' => 'users',
            'pretests' => PreTest::get(),
            'posttests' => PostTest::get(),
            'materis' => Materi::get(),
            'pesan' => 'Materi berhasil diubah!',
        ]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy_materi(Materi_List $kelas)
    {
        $id_materi = Materi::where('nama_materi', $kelas->nama_materi)->first('id');
        Materi_List::destroy($kelas->id);
        Materi::destroy($id_materi->id);
        $id_kelas = Kelas::where('nama_modul', $kelas->nama_modul)->first()->id;
        return view('dashboard.kelas.materilist.index', [
            'materi_lists' => Materi_List::where('nama_modul', $kelas->nama_modul)
                ->orderBy('created_at', 'desc')
                ->paginate(20)
                ->withQueryString(),
            'nama_modul' => $kelas->nama_modul,
            'kelas' => $id_kelas,
            'active' => 'users',
            'pretests' => PreTest::get(),
            'posttests' => PostTest::get(),
            'materis' => Materi::get(),
            'pesan' => 'Berhasil dihapus!',
        ]);
    }
}
