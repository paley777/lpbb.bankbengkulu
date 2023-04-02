<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Gate;
use Session;

class LandingController extends Controller
{
    //Homepage
    public function index()
    {
        return view('landing.index', [
            'active' => 'index',
        ]);
    }
    //Tentang Kami
    public function about()
    {
        return view('landing.tentang.index', [
            'active' => 'index',
        ]);
    }
    //Masuk
    public function login()
    {
        return view('landing.login', [
            'active' => 'login',
        ]);
    }
    //Gate
    public function gate()
    {
        return view('landing.gate', [
            'active' => 'login',
            'gate' => Gate::inRandomOrder()->first(),
        ]);
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/gate');
        }
        return back()->with('loginError', 'E-mail/Password Anda Salah, Coba Lagi!');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function check(Request $request)
    {
        $answer = $request->validate([
            'answer' => ['required'],
        ]);

        $answerdb = Gate::where('id', $request->id)->first('answer');
        if (strtolower($request->answer) == strtolower($answerdb->answer)) {
            Session::put('active', 'dashboard');
            return redirect('/dashboard')->with('success', 'Selamat Datang di Dashboard LPBB!');
        } else {
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/login')->with('loginError', 'Yah! Sepertinya Anda salah menjawab pertanyaan yang diberikan :( Jangan lupa untuk memperhatikan jawaban Anda untuk menghindari salah ketik!');
        }
    }
}
