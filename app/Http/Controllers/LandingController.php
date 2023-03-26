<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LandingController extends Controller
{
    //Homepage
    public function index()
    {
        return view('landing.index', [
            'active' => 'index',
        ]);
    }
    //Materi
    public function materi()
    {
        return view('landing.materi', [
            'active' => 'materi',
        ]);
    }
}
