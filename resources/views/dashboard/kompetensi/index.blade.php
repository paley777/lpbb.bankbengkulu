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
                            <li class="breadcrumb-item active" aria-current="page">Manajemen Uji Kompetensi</li>
                        </ol>
                    </nav>
                    <div class="card text-bg-success bg-gradient mb-3 bg-opacity-100">
                        <div class="card-header fw-semibold">Dashboard Learning Program Bank Bengkulu</div>
                        <div class="card-body">
                            <h4 class=" responsive-p1 fw-semibold mb-3">Manajemen Uji Kompetensi</h4>
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
                                <h4 class="card-title fw-semibold responsive-p1 me-3">Quick Navigation</h4>
                            </div>
                            <hr>
                            <div class="row mb-3 g-2">
                                <div class="col">
                                    <div class="card bg-success text-white bg-gradient border border-0 p-4 h-100"
                                        style="color: rgb(0,0,0);background: var(--bs-yellow);"
                                        data-bss-hover-animate="pulse">
                                        <div class="d-flex">
                                            <!DOCTYPE svg
                                                PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                                            <!-- Uploaded to: SVG Repo, www.svgrepo.com, Transformed by: SVG Repo Mixer Tools -->
                                            <svg width="100px" height="100px" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">

                                                <g id="SVGRepo_bgCarrier" stroke-width="0" />

                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <g id="SVGRepo_iconCarrier">
                                                    <g id="System / Data">
                                                        <path id="Vector"
                                                            d="M18 12V17C18 18.6569 15.3137 20 12 20C8.68629 20 6 18.6569 6 17V12M18 12V7M18 12C18 13.6569 15.3137 15 12 15C8.68629 15 6 13.6569 6 12M18 7C18 5.34315 15.3137 4 12 4C8.68629 4 6 5.34315 6 7M18 7C18 8.65685 15.3137 10 12 10C8.68629 10 6 8.65685 6 7M6 12V7"
                                                            stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </g>
                                                </g>
                                            </svg>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex flex-column">
                                                    <a href="/dashboard/bank-soal" class="stretched-link"></a>
                                                    <h2 class="fw-bold m-0">Manajemen Bank Soal</h2>
                                                    <h4><span id="counter1">{{ $countbank }}</span> Bank Soal Tersedia
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card bg-success text-white bg-gradient border border-0 p-4 h-100"
                                        style="color: rgb(0,0,0);background: var(--bs-yellow);"
                                        data-bss-hover-animate="pulse">
                                        <div class="d-flex">
                                            <div class="">
                                                <!DOCTYPE svg
                                                    PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                                                <!-- Uploaded to: SVG Repo, www.svgrepo.com, Transformed by: SVG Repo Mixer Tools -->
                                                <svg width="100px" height="100px" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">

                                                    <g id="SVGRepo_bgCarrier" stroke-width="0" />

                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round" />

                                                    <g id="SVGRepo_iconCarrier">
                                                        <g id="System / Data">
                                                            <path id="Vector"
                                                                d="M18 12V17C18 18.6569 15.3137 20 12 20C8.68629 20 6 18.6569 6 17V12M18 12V7M18 12C18 13.6569 15.3137 15 12 15C8.68629 15 6 13.6569 6 12M18 7C18 5.34315 15.3137 4 12 4C8.68629 4 6 5.34315 6 7M18 7C18 8.65685 15.3137 10 12 10C8.68629 10 6 8.65685 6 7M6 12V7"
                                                                stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex flex-column">
                                                    <a href="/dashboard/pre-test" class="stretched-link"></a>
                                                    <h2 class="fw-bold m-0">Manajemen Pre-Test</h2>
                                                    <h4><span id="counter2">{{ $countpretest }}</span> Pre Test Tersedia
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card bg-success text-white bg-gradient border border-0 p-4 h-100"
                                        style="color: rgb(0,0,0);background: var(--bs-yellow);"
                                        data-bss-hover-animate="pulse">
                                        <div class="d-flex">
                                            <div class="">
                                                <!DOCTYPE svg
                                                    PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                                                <!-- Uploaded to: SVG Repo, www.svgrepo.com, Transformed by: SVG Repo Mixer Tools -->
                                                <svg width="100px" height="100px" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">

                                                    <g id="SVGRepo_bgCarrier" stroke-width="0" />

                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round" />

                                                    <g id="SVGRepo_iconCarrier">
                                                        <g id="System / Data">
                                                            <path id="Vector"
                                                                d="M18 12V17C18 18.6569 15.3137 20 12 20C8.68629 20 6 18.6569 6 17V12M18 12V7M18 12C18 13.6569 15.3137 15 12 15C8.68629 15 6 13.6569 6 12M18 7C18 5.34315 15.3137 4 12 4C8.68629 4 6 5.34315 6 7M18 7C18 8.65685 15.3137 10 12 10C8.68629 10 6 8.65685 6 7M6 12V7"
                                                                stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex flex-column">
                                                    <a href="/dashboard/pegawai" class="stretched-link"></a>
                                                    <h2 class="fw-bold m-0">Manajemen Post Test</h2>
                                                    <h4 class="">50 Ujian Tersedia</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            let counts1 = setInterval(updated1);
            let upto1 = 0;
            let limit = {!! json_encode($countbank) !!};

            function updated1() {
                if (limit == 0) {
                    count1.innerHTML = 0;
                } else {
                    var count1 = document.getElementById("counter1");
                    count1.innerHTML = ++upto1;
                    if (upto1 === limit) {
                        clearInterval(counts1);
                    }
                }
            }
        </script>
        <script>
            let counts2 = setInterval(updated2);
            let upto2 = 0;
            let limit1 = {!! json_encode($countpretest) !!};

            function updated2() {
                if (limit1 == 0) {
                    count2.innerHTML = 0;
                } else {
                    var count2 = document.getElementById("counter2");
                    count2.innerHTML = ++upto2;
                    if (upto2 === limit1) {
                        clearInterval(counts2);
                    }
                }
            }
        </script>
    @endsection
