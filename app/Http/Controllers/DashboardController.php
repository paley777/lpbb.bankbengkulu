<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use App\Models\BankSoal;
use App\Models\PreTest;
use App\Models\PostTest;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\Materi_List;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

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
        if (Auth::user()->role == 'Super Administrator') {
            return view('dashboard.index', [
                'active' => 'index',
                'countpegawai' => User::where('role', 'Pegawai')->count(),
                'countbank' => BankSoal::count(),
                'countpretest' => PreTest::count(),
                'countposttest' => PostTest::count(),
                'countkelas' => Kelas::count(),
                'countmateri' => Materi::count(),
                'countpetugas' => User::where('role', 'Super Administrator')
                    ->orWhere('role', 'Operator')
                    ->count(),
            ]);
        } elseif (Auth::user()->role == 'Pegawai') {
            $dt = Carbon::now()->format('Y-m-d');
            return view('pegawai.index', [
                'active' => 'index',
                'kelases' => Kelas::get(),
                'materi_lists' => Materi_List::where('jenis', 'materi')->get(),
                'dt' => $dt,
            ]);
        }
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
