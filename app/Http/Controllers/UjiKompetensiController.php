<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BankSoal;
use App\Models\PreTest;

class UjiKompetensiController extends Controller
{
    //Index
    public function index()
    {
        return view('dashboard.kompetensi.index', [
            'active' => 'index',
            'countbank' => BankSoal::count(),
            'countpretest' => PreTest::count(),
        ]);
    }
}
