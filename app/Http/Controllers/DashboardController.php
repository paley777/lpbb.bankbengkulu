<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

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
        ]);
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
