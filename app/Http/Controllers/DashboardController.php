<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\SampleChart;
use Illuminate\Support\Facades\Auth;
use Session;
use ConsoleTVs\Charts\Facades\Charts;
use App\Models\User;
use App\Models\BankSoal;
use App\Models\PreTest;
use App\Models\PostTest;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\Materi_List;
use App\Models\Kemajuan_Pegawai;
use App\Models\Sertifikat;
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
            $lulus = Kemajuan_Pegawai::where('jenis', 'Post Test')
                ->where('skor', '>=', 70)
                ->count();
            $belumlulus = Kemajuan_Pegawai::where('jenis', 'Post Test')
                ->where('skor', '<', 70)
                ->count();
            $chart = new SampleChart();
            $chart->labels(['Lulus', 'Tidak Lulus']);
            $chart->dataset('My dataset', 'pie', [$lulus, $belumlulus])->options([
                'backgroundColor' => ['rgb(0, 128, 0)', 'rgb(255, 0, 0)'],
            ]);
            $lulus1 = Kemajuan_Pegawai::where('jenis', 'Pre Test')
                ->where('skor', '>=', 70)
                ->count();
            $belumlulus1 = Kemajuan_Pegawai::where('jenis', 'Pre Test')
                ->where('skor', '<', 70)
                ->count();
            $chart2 = new SampleChart();
            $chart2->labels(['Lulus', 'Tidak Lulus']);
            $chart2->dataset('My dataset', 'pie', [$lulus1, $belumlulus1])->options([
                'backgroundColor' => ['rgb(0, 128, 0)', 'rgb(255, 0, 0)'],
            ]);

            $data = User::where('role', 'Pegawai')->get();
            $groupedData = $data->groupBy('unit_kerja');
            // Prepare data for the pie chart
            $chartData = [];
            foreach ($groupedData as $category => $items) {
                $chartData[] = [$category, count($items)];
            }
            $colors = [];

            for ($i = 0; $i < 60; $i++) {
                $red = rand(0, 255);
                $green = rand(0, 255);
                $blue = rand(0, 255);

                $colors[] = "rgb($red, $green, $blue)";
            }
            // Create the pie chart
            $chart1 = new SampleChart();
            $chart1->labels(array_column($chartData, 0));
            $chart1->dataset('My dataset1', 'pie', array_column($chartData, 1))->options([
                'backgroundColor' => $colors,
            ]);

            return view('dashboard.index', [
                'active' => 'index',
                'countpegawai' => User::where('role', 'Pegawai')->count(),
                'countbank' => BankSoal::count(),
                'countpretest' => PreTest::count(),
                'countposttest' => PostTest::count(),
                'countkelas' => Kelas::count(),
                'countmateri' => Materi::count(),
                'countsertifikat' => Sertifikat::count(),
                'countpetugas' => User::where('role', 'Super Administrator')
                    ->orWhere('role', 'Operator')
                    ->count(),
                'chart' => $chart,
                'chart1' => $chart1,
                'chart2' => $chart2,
            ]);
        } elseif (Auth::user()->role == 'Pegawai') {
            $dt = Carbon::now()->format('Y-m-d');
            return view('pegawai.index', [
                'active' => 'index',
                'kelases' => Kelas::get(),
                'materi_lists' => Materi_List::where('jenis', 'materi')->get(),
                'dt' => $dt,
            ]);
        } elseif (Auth::user()->role == 'Operator') {
            $data = User::where('role', 'Pegawai')->get();
            $groupedData = $data->groupBy('unit_kerja');
            // Prepare data for the pie chart
            $chartData = [];
            foreach ($groupedData as $category => $items) {
                $chartData[] = [$category, count($items)];
            }
            $colors = [];

            for ($i = 0; $i < 60; $i++) {
                $red = rand(0, 255);
                $green = rand(0, 255);
                $blue = rand(0, 255);

                $colors[] = "rgb($red, $green, $blue)";
            }
            // Create the pie chart
            $chart1 = new SampleChart();
            $chart1->labels(array_column($chartData, 0));
            $chart1->dataset('My dataset1', 'pie', array_column($chartData, 1))->options([
                'backgroundColor' => $colors,
            ]);
            return view('operator.index', [
                'active' => 'index',
                'countpegawai' => User::where('role', 'Pegawai')
                    ->where('unit_kerja', Auth::user()->unit_kerja)
                    ->count(),
                'countbank' => BankSoal::count(),
                'countpretest' => PreTest::count(),
                'countposttest' => PostTest::count(),
                'countkelas' => Kelas::count(),
                'countmateri' => Materi::count(),
                'countsertifikat' => Sertifikat::count(),
                'countpetugas' => User::where('role', 'Super Administrator')
                    ->orWhere('role', 'Operator')
                    ->count(),
                'chart1' => $chart1,
            ]);
        }
    }
    //Reports
    public function index_reports()
    {
        if (Auth::user()->role == 'Super Administrator') {
            return view('dashboard.reports.index', [
                'active' => 'reports',
            ]);
        } elseif (Auth::user()->role == 'Operator') {
            return view('operator.reports.index', [
                'active' => 'reports',
            ]);
        }
    }
    //Reports
    public function export_pegawai()
    {
        if (Auth::user()->role == 'Super Administrator') {
            return view('dashboard.reports.pegawai.index', [
                'active' => 'reports',
                'users' => User::where('role', 'Pegawai')
                    ->orderBy('name', 'desc')
                    ->filter(request(['search']))
                    ->get(),
            ]);
        } elseif (Auth::user()->role == 'Operator') {
            return view('operator.reports.pegawai.index', [
                'active' => 'reports',
                'users' => User::where('role', 'Pegawai')
                    ->where('unit_kerja', Auth::user()->unit_kerja)
                    ->orderBy('name', 'desc')
                    ->filter(request(['search']))
                    ->get(),
            ]);
        }
    }
    //Reports
    public function export_petugas()
    {
        return view('dashboard.reports.petugas.index', [
            'active' => 'reports',
            'users' => User::where('role', 'Super Administrator')
                ->orWhere('role', 'Operator')
                ->orderBy('name', 'desc')
                ->filter(request(['search']))
                ->get(),
        ]);
    }
    //Reports
    public function export_progress()
    {
        if (Auth::user()->role == 'Super Administrator') {
            return view('dashboard.reports.progress.index', [
                'active' => 'reports',
                'progreses' => Kemajuan_Pegawai::orderBy('nrpp', 'desc')->get(),
                'users' => User::where('role', 'Pegawai')->get(),
            ]);
        } elseif (Auth::user()->role == 'Operator') {
            return view('operator.reports.progress.index', [
                'active' => 'reports',
                'progreses' => Kemajuan_Pegawai::orderBy('nrpp', 'desc')->get(),
                'users' => User::where('role', 'Pegawai')
                    ->where('unit_kerja', Auth::user()->unit_kerja)
                    ->get(),
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
