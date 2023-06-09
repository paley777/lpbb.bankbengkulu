<?php

namespace App\Http\Controllers;

use App\Models\Kemajuan_Pegawai;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreKemajuan_PegawaiRequest;
use App\Http\Requests\UpdateKemajuan_PegawaiRequest;

class KemajuanPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pegawai.progress.index', [
            'active' => 'users',
            'my_progreses' => Kemajuan_Pegawai::where('nrpp', Auth::user()->nrpp)
                ->get()
                ->groupBy('nama_modul'),
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index_admin()
    {
        if (Auth::user()->role == 'Super Administrator') {
            return view('dashboard.progress.index', [
                'active' => 'reports',
                'progreses' => Kemajuan_Pegawai::orderBy('nrpp', 'desc')->get(),
                'users' => User::where('role', 'Pegawai')->get(),
            ]);
        } elseif (Auth::user()->role == 'Operator') {
            return view('operator.progress.index', [
                'active' => 'reports',
                'progreses' => Kemajuan_Pegawai::orderBy('nrpp', 'desc')->get(),
                'users' => User::where('role', 'Pegawai')
                    ->where('unit_kerja', Auth::user()->unit_kerja)
                    ->get(),
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKemajuan_PegawaiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Kemajuan_Pegawai $kemajuan_Pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kemajuan_Pegawai $kemajuan_Pegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKemajuan_PegawaiRequest $request, Kemajuan_Pegawai $kemajuan_Pegawai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kemajuan_Pegawai $kemajuan_Pegawai)
    {
        //
    }
}
