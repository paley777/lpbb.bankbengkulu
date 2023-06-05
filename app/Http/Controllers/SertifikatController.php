<?php

namespace App\Http\Controllers;

use App\Models\Sertifikat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Models\User;
use App\Http\Requests\StoreSertifikatRequest;
use App\Http\Requests\UpdateSertifikatRequest;
use PDF;
use App\Models\Kemajuan_Pegawai;

class SertifikatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pegawai.sertifikat.index', [
            'active' => 'users',
            'certificates' => Sertifikat::where('nrpp', Auth::user()->nrpp)
                ->orderBy('no_sertifikat', 'desc')
                ->filter(request(['search']))
                ->filter(request(['search1']))
                ->paginate(20)
                ->withQueryString(),
            'users' => User::where('role', 'Pegawai')->get(),
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index_superadmin()
    {
        return view('dashboard.sertifikat.index', [
            'active' => 'users',
            'certificates' => Sertifikat::orderBy('nrpp', 'desc')
                ->filter(request(['search']))
                ->filter(request(['search1']))
                ->paginate(20)
                ->withQueryString(),
            'users' => User::get(),
        ]);
    }
    public function generateCertificate($certificate)
    {
        $sertifikat = Sertifikat::where('id', $certificate)->first();
        $user = User::where('nrpp', $sertifikat->nrpp)->first();
        $mypretest = Kemajuan_Pegawai::where('nrpp', $user->nrpp)
            ->where('nama_modul', $sertifikat->nama_modul)
            ->where('jenis', 'Pre Test')
            ->first();
        $myposttest = Kemajuan_Pegawai::where('nrpp', $user->nrpp)
            ->where('nama_modul', $sertifikat->nama_modul)
            ->where('jenis', 'Post Test')
            ->first();
        // Get the template image file
        $templateImagePath = public_path('template.png');
        // Load the template image using Intervention Image package
        $templateImage = \Image::make($templateImagePath);
        // Add the text to the template image
        $templateImage->text($sertifikat->nama_modul, 1000, 720, function ($font) {
            $font->file(public_path('Arialn.ttf'));
            $font->size(50);
            $font->color('#000000');
            $font->align('center');
            $font->valign('center');
        });
        $templateImage->text('No. ' . $sertifikat->no_sertifikat, 960, 360, function ($font) {
            $font->file(public_path('Arialn.ttf'));
            $font->size(40);
            $font->color('#000000');
            $font->align('center');
            $font->valign('center');
        });
        $templateImage->text($user->name, 960, 550, function ($font) {
            $font->file(public_path('Arialn.ttf'));
            $font->size(72);
            $font->color('#000000');
            $font->align('center');
            $font->valign('center');
        });
        $templateImage->text($sertifikat->created_at->format('d-m-Y'), 1080, 780, function ($font) {
            $font->file(public_path('Arialn.ttf'));
            $font->size(40);
            $font->color('#000000');
            $font->align('center');
            $font->valign('center');
        });
        $templateImage->text($sertifikat->created_at->format('d-m-Y'), 1040, 1094, function ($font) {
            $font->file(public_path('Arialn.ttf'));
            $font->size(40);
            $font->color('#000000');
            $font->align('center');
            $font->valign('center');
        });
        $templateImage->text($mypretest->skor, 970, 940, function ($font) {
            $font->file(public_path('Arialn.ttf'));
            $font->size(60);
            $font->color('#000000');
            $font->align('center');
            $font->valign('center');
        });
        $templateImage->text($myposttest->skor, 1450, 940, function ($font) {
            $font->file(public_path('Arialn.ttf'));
            $font->size(60);
            $font->color('#000000');
            $font->align('center');
            $font->valign('center');
        });
        $templateImage->text(Str::of($myposttest->status)->upper(), 1000, 1015, function ($font) {
            $font->file(public_path('Arialn.ttf'));
            $font->size(60);
            $font->color('#000000');
            $font->align('center');
            $font->valign('center');
        });
        // Save the modified template image
        $templateImage->save(public_path('my-certificate.png'));
        // Download the PDF
        return response()
            ->download(public_path('my-certificate.png'))
            ->deleteFileAfterSend(true);
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
    public function store(StoreSertifikatRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Sertifikat $sertifikat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sertifikat $sertifikat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSertifikatRequest $request, Sertifikat $sertifikat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sertifikat $sertifikat)
    {
        //
    }
}
