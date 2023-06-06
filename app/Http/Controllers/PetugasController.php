<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PetugasImport;
use App\Http\Requests\UpdatePetugasRequest;
use DB;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.petugas.index', [
            'active' => 'users',
            'users' => User::where('role', 'Super Administrator')
                ->orWhere('role', 'Operator')
                ->orderBy('name', 'desc')
                ->filter(request(['search']))
                ->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.petugas.create', [
            'active' => 'users',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'nrpp' => 'required|unique:users',
            'jabatan' => 'required',
            'unit_kerja' => 'required',
            'role' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);

        return redirect('/dashboard/petugas')->with('success', 'Petugas telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $petuga)
    {
        return view('dashboard.petugas.edit', [
            'user' => $petuga,
            'active' => 'users',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePetugasRequest $request, User $petuga)
    {
        $validated = $request->validated();
        User::where('id', $petuga['id'])->update($validated);

        return redirect('/dashboard/petugas')->with('success', 'Petugas telah diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $petuga)
    {
        User::destroy($petuga->id);
        return redirect('/dashboard/petugas')->with('success', 'Petugas telah dihapus!');
    }

    public function multiplepetugassdelete(Request $request)
    {
        $id = $request->id;
        foreach ($id as $user) {
            User::where('id', $user)->delete();
        }
        return redirect('/dashboard/petugas')->with('success', 'Petugas telah dihapus!');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function petugasImport(Request $request)
    {
        Excel::import(new PetugasImport(), $request->file('file')->store('temp'));
        return back()->with('success', 'Data telah diimpor!');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function petugasEdit(Request $request)
    {
        $data = Excel::toArray(new PetugasImport(), request()->file('file'));

        collect(head($data))->each(function ($row, $key) {
            DB::table('users')
                ->where('nrpp', $row[0])
                ->update([
                    'email' => $row[1],
                    'name' => $row[2],
                    'jabatan' => $row[3],
                    'unit_kerja' => $row[4],
                    'password' => Hash::make($row[5]),
                    'role' => $row[6],
                ]);
        });
        return back()->with('success', 'Data telah diupdate!');
    }
}
