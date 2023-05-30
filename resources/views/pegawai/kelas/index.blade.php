@extends('landing.layouts.main3')

@section('container')
    <style>
        /* If the screen size is 1200px wide or more, set the font-size to 80px */
        @media (min-width: 1200px) {
            .responsive-header {
                font-size: 64px;
            }

            .responsive-header1 {
                font-size: 50px;
            }

            .responsive-p {
                font-size: 24px;
            }

            .responsive-p1 {
                font-size: 22px;
            }

            .responsive-mini {
                font-size: 20px
            }

            .responsive-small {
                font-size: 16px
            }
        }

        /* If the screen size is smaller than 1200px, set the font-size to 80px */
        @media (max-width: 1199.98px) {
            .responsive-header {
                font-size: 40px;
            }

            .responsive-header1 {
                font-size: 30px;
            }

            .responsive-p {
                font-size: 16px;
            }

            .responsive-p1 {
                font-size: 14px;
            }

            .responsive-mini {
                font-size: 14px
            }

        }
    </style>
    <div class="bg-success bg-gradient bg-opacity-10">
        <div class="container py-5 py-xl-5 mx-5 justify-content-center mx-auto" style="font-family: Raleway;">
            <div class="row mx-4">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb responsive-small">
                            <li class="breadcrumb-item"><a href="/dashboard">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manajemen Kelas</li>
                        </ol>
                    </nav>
                    <div class="card text-bg-success bg-gradient mb-3 bg-opacity-100">
                        <div class="card-header fw-semibold">Dashboard Learning Program Bank Bengkulu</div>
                        <div class="card-body">
                            <h4 class=" responsive-p1 fw-semibold mb-3">Manajemen Kelas</h4>
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ session('success') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                    @foreach ($kelases as $kelas)
                        @if ($dt > $kelas->date_start && $dt < $kelas->date_end)
                            <div class="card shadow-sm bg-light bg-gradient mb-3">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <h4 class="card-title fw-semibold responsive-p1 me-auto">Sedang Berlangsung</h4>
                                    </div>
                                    <hr>
                                    <div class="row g-2">
                                        <div class="col-md-4 col-12">
                                            <a href="/kelas/{{ $kelas->id }}" style="text-decoration: none;">
                                                <div class="card bg-success text-white bg-gradient border border-0 p-4 h-100"
                                                    data-bss-hover-animate="pulse"
                                                    style="color: rgb(0,0,0);background: var(--bs-yellow);"><span
                                                        class="fw-semibold mb-2">Dibuka
                                                        mulai
                                                        {{ Carbon\Carbon::parse($kelas->date_start)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, j F Y ') }}
                                                        -
                                                        {{ Carbon\Carbon::parse($kelas->date_end)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, j F Y ') }}</span>
                                                    <h3 class="fw-bold">{{ $kelas->nama_modul }}</h3>
                                                    @if ($materi_lists->nama_modul = $kelas->nama_modul)
                                                        <h6><span
                                                                class="badge rounded-pill text-bg-warning">{{ $materi_lists->count() }}
                                                                Materi</span>
                                                    @endif
                                                    <span class="badge rounded-pill text-bg-warning">Berlangsung</span>
                                                    </h6>
                                                </div>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="card shadow-sm bg-light bg-gradient mb-3">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <h4 class="card-title fw-semibold responsive-p1 me-auto">Kelas Non Aktif</h4>
                                    </div>
                                    <hr>
                                    <div class="row g-2 ">
                                        <div class="col-md-4 col-12">
                                            <a  style="text-decoration: none;">
                                                <div class="card text-white bg-secondary border border-0 p-4 h-100"
                                                    data-bss-hover-animate="pulse"
                                                    style="color: rgb(0,0,0);background: var(--bs-yellow);"><span
                                                        class="fw-semibold mb-2">Dibuka
                                                        mulai
                                                        {{ Carbon\Carbon::parse($kelas->date_start)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, j F Y ') }}
                                                        -
                                                        {{ Carbon\Carbon::parse($kelas->date_end)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, j F Y ') }}</span>
                                                    <h3 class="fw-bold">{{ $kelas->nama_modul }}</h3>
                                                    @if ($materi_lists->nama_modul = $kelas->nama_modul)
                                                        <h6><span
                                                                class="badge rounded-pill text-bg-warning">{{ $materi_lists->count() }}
                                                                Materi</span>
                                                    @endif
                                                    <span class="badge rounded-pill text-bg-warning">Bukan Masa Pembelajaran</span>
                                                    </h6>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        </script>
    @endsection
