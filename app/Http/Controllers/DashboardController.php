<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    //Index
    public function index()
    {
        // $session = session()->get('active');
        // if ($session == 'dashboard') {
        //     return view('dashboard.index', [
        //         'active' => 'index',
        //     ]);
        // } else {
        //     Auth::logout();
        //     return redirect('/login');
        // }
        return view('dashboard.index', [
            'active' => 'index',
            'countpegawai' => User::where('role', 'Pegawai')->count(),
        ]);
    }
    //Profile
    public function profile()
    {
        return view('dashboard.profile.index', [
            'active' => 'profile',
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function edit()
    {
        return view('dashboard.profile.edit', [
            'active' => 'profile',
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        User::where('id', auth()->user()->id)->update($validated);

        return redirect('/dashboard/profile')->with('success', 'Profil telah diubah!');
    }
    //logout
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
