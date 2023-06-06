<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use DB;
use Illuminate\Support\Arr;
use App\Http\Requests\UpdateUserRequest;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pegawai.index', [
            'active' => 'users',
            'users' => User::where('role', 'Pegawai')
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
        return view('dashboard.pegawai.create', [
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

        return redirect('/dashboard/pegawai')->with('success', 'Pegawai telah ditambahkan!');
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
    public function edit(User $pegawai)
    {
        return view('dashboard.pegawai.edit', [
            'user' => $pegawai,
            'active' => 'users',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $pegawai)
    {
        $validated = $request->validated();
        User::where('id', $pegawai['id'])->update($validated);

        return redirect('/dashboard/pegawai')->with('success', 'Pegawai telah diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $pegawai)
    {
        User::destroy($pegawai->id);
        return redirect('/dashboard/pegawai')->with('success', 'Pegawai telah dihapus!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $product
     * @return \Illuminate\Http\Response
     */
    public function suspend(User $user)
    {
        $suspend = 0;

        User::where('id', $user->id)->update(['status' => $suspend]);

        return redirect('/dashboard/pegawai')->with('success', 'Akun pegawai telah ditangguhkan!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $product
     * @return \Illuminate\Http\Response
     */
    public function activate(User $user)
    {
        $suspend = 1;

        User::where('id', $user->id)->update(['status' => $suspend]);

        return redirect('/dashboard/pegawai')->with('success', 'Akun pegawai telah diaktifkan!');
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function fileImport(Request $request)
    {
        Excel::import(new UsersImport(), $request->file('file')->store('temp'));
        return back()->with('success', 'Data telah diimpor!');
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function fileEdit(Request $request)
    {
        $data = Excel::toArray(new UsersImport(), request()->file('file'));

        collect(head($data))->each(function ($row, $key) {
            DB::table('users')
                ->where('nrpp', $row[0])
                ->update([
                    'email' => $row[1],
                    'name' => $row[2],
                    'jabatan' => $row[3],
                    'unit_kerja' => $row[4],
                    'password' => Hash::make($row[5]),
                    'status' => $row[6],
                ]);
        });
        return back()->with('success', 'Data telah diupdate!');
    }

    public function multipleusersdelete(Request $request)
    {
        $id = $request->id;
        foreach ($id as $user) {
            User::where('id', $user)->delete();
        }
        return redirect('/dashboard/pegawai')->with('success', 'Pegawai telah dihapus!');
    }
}
