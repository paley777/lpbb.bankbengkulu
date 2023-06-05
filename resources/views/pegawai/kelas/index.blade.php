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
                    <div class="card shadow-sm bg-light bg-gradient mb-3">
                        <div class="card-body">
                            <div class="d-flex">
                                <h4 class="card-title fw-semibold responsive-p1 me-auto">Sedang Berlangsung</h4>
                            </div>
                            <hr>
                            <div class="row g-2">
                                @foreach ($kelases as $kelas)
                                    <div class="col-md-4 col-12">
                                        @if ($dt > $kelas->date_start && $dt < $kelas->date_end)
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
                                                        <h6><span class="badge rounded-pill text-bg-warning"><svg
                                                                    width="16px" height="16px" viewBox="0 0 24 24"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                        stroke-linejoin="round"></g>
                                                                    <g id="SVGRepo_iconCarrier">
                                                                        <g id="Edit / List_Unordered">
                                                                            <path id="Vector"
                                                                                d="M9 17H19M9 12H19M9 7H19M5.00195 17V17.002L5 17.002V17H5.00195ZM5.00195 12V12.002L5 12.002V12H5.00195ZM5.00195 7V7.002L5 7.00195V7H5.00195Z"
                                                                                stroke="#000000" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"></path>
                                                                        </g>
                                                                    </g>
                                                                </svg> {{ $materi_lists->count() }}
                                                                Materi</span>
                                                    @endif
                                                    <span class="badge rounded-pill text-bg-warning"><svg width="16px"
                                                            height="16px" viewBox="0 0 24 24" version="1.1"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                stroke-linejoin="round"></g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                                                                <title>ic_fluent_live_24_filled</title>
                                                                <desc>Created with Sketch.</desc>
                                                                <g id="🔍-Product-Icons" stroke="none" stroke-width="1"
                                                                    fill="none" fill-rule="evenodd">
                                                                    <g id="ic_fluent_live_24_filled" fill="#212121"
                                                                        fill-rule="nonzero">
                                                                        <path
                                                                            d="M6.34277267,4.93867691 C6.73329697,5.3292012 6.73329697,5.96236618 6.34277267,6.35289047 C3.21757171,9.47809143 3.21757171,14.5450433 6.34277267,17.6702443 C6.73329697,18.0607686 6.73329697,18.6939336 6.34277267,19.0844579 C5.95224838,19.4749821 5.3190834,19.4749821 4.92855911,19.0844579 C1.02230957,15.1782083 1.02230957,8.84492646 4.92855911,4.93867691 C5.3190834,4.54815262 5.95224838,4.54815262 6.34277267,4.93867691 Z M19.0743401,4.93867691 C22.9805896,8.84492646 22.9805896,15.1782083 19.0743401,19.0844579 C18.6838158,19.4749821 18.0506508,19.4749821 17.6601265,19.0844579 C17.2696022,18.6939336 17.2696022,18.0607686 17.6601265,17.6702443 C20.7853275,14.5450433 20.7853275,9.47809143 17.6601265,6.35289047 C17.2696022,5.96236618 17.2696022,5.3292012 17.6601265,4.93867691 C18.0506508,4.54815262 18.6838158,4.54815262 19.0743401,4.93867691 Z M9.3094225,7.81205295 C9.69994679,8.20257725 9.69994679,8.83574222 9.3094225,9.22626652 C7.77845993,10.7572291 7.77845993,13.2394099 9.3094225,14.7703724 C9.69994679,15.1608967 9.69994679,15.7940617 9.3094225,16.184586 C8.91889821,16.5751103 8.28573323,16.5751103 7.89520894,16.184586 C5.58319778,13.8725748 5.58319778,10.1240641 7.89520894,7.81205295 C8.28573323,7.42152866 8.91889821,7.42152866 9.3094225,7.81205295 Z M16.267742,7.81205295 C18.5797531,10.1240641 18.5797531,13.8725748 16.267742,16.184586 C15.8772177,16.5751103 15.2440527,16.5751103 14.8535284,16.184586 C14.4630041,15.7940617 14.4630041,15.1608967 14.8535284,14.7703724 C16.384491,13.2394099 16.384491,10.7572291 14.8535284,9.22626652 C14.4630041,8.83574222 14.4630041,8.20257725 14.8535284,7.81205295 C15.2440527,7.42152866 15.8772177,7.42152866 16.267742,7.81205295 Z M12.0814755,10.5814755 C12.9099026,10.5814755 13.5814755,11.2530483 13.5814755,12.0814755 C13.5814755,12.9099026 12.9099026,13.5814755 12.0814755,13.5814755 C11.2530483,13.5814755 10.5814755,12.9099026 10.5814755,12.0814755 C10.5814755,11.2530483 11.2530483,10.5814755 12.0814755,10.5814755 Z"
                                                                            id="🎨-Color"> </path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </svg> Berlangsung</span>
                                                    </h6>
                                                </div>
                                            </a>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card shadow-sm bg-light bg-gradient mb-3">
                        <div class="card-body">
                            <div class="d-flex">
                                <h4 class="card-title fw-semibold responsive-p1 me-auto">Kelas Non AKtif</h4>
                            </div>
                            <hr>
                            <div class="row g-2">
                                @foreach ($kelases as $kelas)
                                    <div class="col-12">
                                        @if (!($dt > $kelas->date_start && $dt < $kelas->date_end))
                                            <a style="text-decoration: none;">
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
                                                        <h6><span class="badge rounded-pill text-bg-warning"><svg
                                                                    width="16px" height="16px" viewBox="0 0 24 24"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                        stroke-linejoin="round"></g>
                                                                    <g id="SVGRepo_iconCarrier">
                                                                        <g id="Edit / List_Unordered">
                                                                            <path id="Vector"
                                                                                d="M9 17H19M9 12H19M9 7H19M5.00195 17V17.002L5 17.002V17H5.00195ZM5.00195 12V12.002L5 12.002V12H5.00195ZM5.00195 7V7.002L5 7.00195V7H5.00195Z"
                                                                                stroke="#000000" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round">
                                                                            </path>
                                                                        </g>
                                                                    </g>
                                                                </svg> {{ $materi_lists->count() }}
                                                                Materi</span>
                                                    @endif
                                                    <span class="badge rounded-pill text-bg-warning">Bukan Masa
                                                        Pembelajaran</span>
                                                    </h6>
                                                </div>
                                            </a>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        </script>
    @endsection
