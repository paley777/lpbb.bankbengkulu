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
                <div class="col-md-8">
                    <div class="card text-bg-success bg-gradient mb-3 bg-opacity-100">
                        <div class="card-header fw-semibold">Dashboard Learning Program Bank Bengkulu</div>
                        <div class="card-body">
                            <h4 class=" responsive-p1 fw-semibold mb-3">Welcome back {{ Auth()->user()->name }}!</h4>
                            <h5 class="fw-semibold">
                                <span class="badge badge-lg rounded-pill text-bg-warning">{{ Auth()->user()->role }}</span>
                            </h5>
                        </div>
                    </div>
                    <div class="card shadow-sm bg-light bg-gradient mb-3">
                        <div class="card-body">
                            <div class="d-flex">
                                <h4 class="card-title fw-semibold responsive-p1 me-auto">Sedang Berlangsung</h4>
                                <a href="/materi" class="btn btn-warning fw-semibold" type="button"
                                    data-bss-hover-animate="tada">Manajemen Materi
                                    <?xml version="1.0" ?>
                                    <svg width="20px" height="20px" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <title />
                                        <g id="Complete">
                                            <g id="arrow-up-right">
                                                <g>
                                                    <polyline data-name="Right" fill="none" id="Right-2"
                                                        points="18.7 12.4 18.7 5.3 11.6 5.3" stroke="#000000"
                                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                    <line fill="none" stroke="#000000" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" x1="5.3"
                                                        x2="17.1" y1="18.7" y2="6.9" />
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                            </div>
                            <hr>
                            <div class="row g-2">
                                <div class="col-md-3 col-6">
                                    <a href="/materi/detail" style="text-decoration: none;">
                                        <div class="card bg-success text-white bg-gradient border border-0 p-4 h-100"
                                            data-bss-hover-animate="pulse"
                                            style="color: rgb(0,0,0);background: var(--bs-yellow);"><span
                                                class="fw-semibold mb-2">Dibuka
                                                mulai
                                                27 Maret 2023 - 20 April 2023</span>
                                            <h3 class="fw-bold">Manajemen Resiko I</h3>
                                            <h6><span class="badge rounded-pill text-bg-warning">10 Modul</span> <span
                                                    class="badge rounded-pill text-bg-warning">Berlangsung</span></h6>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="card bg-success text-white bg-gradient border border-0 p-4 h-100"
                                        style="color: rgb(0,0,0);background: var(--bs-yellow);"
                                        data-bss-hover-animate="pulse"><span class="fw-semibold mb-2">Dibuka mulai
                                            27 Maret 2023 - 20 April 2023</span>
                                        <h3 class="fw-bold">Manajemen Resiko II</h3>
                                        <h6><span class="badge rounded-pill text-bg-warning">10 Modul</span> <span
                                                class="badge rounded-pill text-bg-warning">Berlangsung</span></h6>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="card bg-success text-white bg-gradient border border-0 p-4 h-100"
                                        style="color: rgb(0,0,0);background: var(--bs-yellow);"
                                        data-bss-hover-animate="pulse"><span class="fw-semibold mb-2">Dibuka mulai
                                            27 Maret 2023 - 20 April 2023</span>
                                        <h3 class="fw-bold">Manajemen Resiko III</h3>
                                        <h6><span class="badge rounded-pill text-bg-warning">10 Modul</span> <span
                                                class="badge rounded-pill text-bg-warning">Berlangsung</span></h6>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="card bg-success text-white bg-gradient border border-0 p-4 h-100"
                                        style="color: rgb(0,0,0);background: var(--bs-yellow);"
                                        data-bss-hover-animate="pulse"><span class="fw-semibold mb-2">Dibuka mulai
                                            27 Maret 2023 - 20 April 2023</span>
                                        <h3 class="fw-bold">Anti-Fraud</h3>
                                        <h6><span class="badge rounded-pill text-bg-warning">10 Modul</span> <span
                                                class="badge rounded-pill text-bg-warning">Berlangsung</span></h6>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="card bg-success text-white bg-gradient border border-0 p-4 h-100"
                                        style="color: rgb(0,0,0);background: var(--bs-yellow);"
                                        data-bss-hover-animate="pulse"><span class="fw-semibold mb-2">Dibuka
                                            mulai
                                            27 Maret 2023 - 20 April 2023</span>
                                        <h3 class="fw-bold">Marketing</h3>
                                        <h6><span class="badge rounded-pill text-bg-warning">10 Modul</span> <span
                                                class="badge rounded-pill text-bg-warning">Berlangsung</span></h6>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="card bg-success text-white bg-gradient border border-0 p-4 h-100"
                                        style="color: rgb(0,0,0);background: var(--bs-yellow);"
                                        data-bss-hover-animate="pulse"><span class="fw-semibold mb-2">Dibuka
                                            mulai 27 Maret 2023 - 20 April 2023</span>
                                        <h3 class="fw-bold">Microblog I</h3>
                                        <h6><span class="badge rounded-pill text-bg-warning">10 Modul</span> <span
                                                class="badge rounded-pill text-bg-warning">Berlangsung</span></h6>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="card bg-success text-white bg-gradient border border-0 p-4 h-100"
                                        style="color: rgb(0,0,0);background: var(--bs-yellow);"
                                        data-bss-hover-animate="pulse"><span class="fw-semibold mb-2">Dibuka
                                            mulai 27 Maret 2023 - 20 April 2023</span>
                                        <h3 class="fw-bold">Microblog II</h3>
                                        <h6><span class="badge rounded-pill text-bg-warning">10 Modul</span> <span
                                                class="badge rounded-pill text-bg-warning">Berlangsung</span></h6>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="card bg-success text-white bg-gradient border border-0 p-4 h-100"
                                        style="color: rgb(0,0,0);background: var(--bs-yellow);"
                                        data-bss-hover-animate="pulse"><span class="fw-semibold mb-2">Dibuka
                                            mulai 27 Maret 2023 - 20 April 2023</span>
                                        <h3 class="fw-bold">Etika Profesi</h3>
                                        <h6><span class="badge rounded-pill text-bg-warning">10 Modul</span> <span
                                                class="badge rounded-pill text-bg-warning">Berlangsung</span></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow-sm bg-light bg-gradient mb-3">
                        <div class="card-body">
                            <div class="d-flex">
                                <h4 class="card-title fw-semibold responsive-p1 me-auto">Today's Overview</h4>
                                <a href="/report" class="btn btn-warning fw-semibold" type="button"
                                    data-bss-hover-animate="tada">Manajemen Laporan
                                    <?xml version="1.0" ?>
                                    <svg width="20px" height="20px" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <title />
                                        <g id="Complete">
                                            <g id="arrow-up-right">
                                                <g>
                                                    <polyline data-name="Right" fill="none" id="Right-2"
                                                        points="18.7 12.4 18.7 5.3 11.6 5.3" stroke="#000000"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" />
                                                    <line fill="none" stroke="#000000" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" x1="5.3"
                                                        x2="17.1" y1="18.7" y2="6.9" />
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                            </div>
                            <hr>
                            <div class="row g-2 mb-3">
                                <div class="col-md-3 col-6">
                                    <div class="card text-white bg-success bg-gradient h-100">
                                        <div class="card-body">
                                            <h4 class="card-title">Pegawai Terdaftar</h4>
                                            <h1 class="fw-bold mb-0" id="counter1">{{ $countpegawai }}</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="card text-white bg-success bg-gradient h-100">
                                        <div class="card-body">
                                            <h4 class="card-title">Kelas Materi</h4>
                                            <h1 class="fw-bold mb-0" id="counter2">26</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="card text-white bg-success bg-gradient h-100">
                                        <div class="card-body">
                                            <h4 class="card-title ">Topik Materi</h4>
                                            <h1 class="fw-bold mb-0" id="counter3">55</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="card text-white bg-success bg-gradient h-100">
                                        <div class="card-body">
                                            <h4 class="card-title">Sertifikat Dikeluarkan</h4>
                                            <h1 class="fw-bold mb-0" id="counter4">1003</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md-3 col-6">
                                    <div class="card text-white bg-success bg-gradient h-100">
                                        <div class="card-body">
                                            <h4 class="card-title">Petugas Terdaftar</h4>
                                            <h1 class="fw-bold mb-0" id="counter5">4</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="card text-white bg-success bg-gradient h-100">
                                        <div class="card-body">
                                            <h4 class="card-title">Bank Soal</h4>
                                            <h1 class="fw-bold mb-0" id="counter6">{{ $countbank }}</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="card text-white bg-success bg-gradient h-100">
                                        <div class="card-body">
                                            <h4 class="card-title ">Pre-Test</h4>
                                            <h1 class="fw-bold mb-0" id="counter7">34</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="card text-white bg-success bg-gradient h-100">
                                        <div class="card-body">
                                            <h4 class="card-title">Post-Test</h4>
                                            <h1 class="fw-bold mb-0" id="counter4">55</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow-sm bg-light bg-gradient mb-3">
                        <div class="card-body">
                            <div class="d-flex">
                                <h4 class="card-title fw-semibold responsive-p1 me-auto">Quick Navigation</h4>
                            </div>
                            <hr>
                            <div class="row mb-3 g-2">
                                <div class="col">
                                    <div class="card text-white bg-success bg-gradient h-100"
                                        data-bss-hover-animate="pulse">
                                        <div class="d-flex justify-content-center align-items-center d-inline-block">
                                            <!DOCTYPE svg
                                                PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">

                                            <!-- Uploaded to: SVG Repo, www.svgrepo.com, Transformed by: SVG Repo Mixer Tools -->
                                            <svg width="70px" height="70px" viewBox="0 0 24 24" fill="none"
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
                                        <a href="/dashboard/pegawai" class="stretched-link"></a>
                                        <h4 class="fw-bold text-center">Manajemen Data Pegawai</h4>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-white bg-success bg-gradient h-100"
                                        data-bss-hover-animate="pulse">
                                        <div class="d-flex justify-content-center align-items-center d-inline-block">
                                            <!DOCTYPE svg
                                                PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                                            <div class="p-2 mt-1 mb-1">
                                                <!-- Uploaded to: SVG Repo, www.svgrepo.com, Transformed by: SVG Repo Mixer Tools -->
                                                <svg fill="#ffffff" version="1.1" id="Capa_1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 403.48 403.48"
                                                    xml:space="preserve" width="50px" height="50px" stroke="#ffffff">

                                                    <g id="SVGRepo_bgCarrier" stroke-width="0" />

                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round" />

                                                    <g id="SVGRepo_iconCarrier">
                                                        <g>
                                                            <path
                                                                d="M277.271,0H46.176v403.48h311.129V80.035L277.271,0z M281.664,25.607l50.033,50.034h-50.033V25.607z M61.176,388.48V15 h205.489v75.641h75.641v297.84H61.176z" />
                                                            <path
                                                                d="M101.439,117.58h55.18V62.4h-55.18V117.58z M116.439,77.4h25.18v25.18h-25.18V77.4z" />
                                                            <path
                                                                d="M101.439,192.08h55.18V136.9h-55.18V192.08z M116.439,151.9h25.18v25.18h-25.18V151.9z" />
                                                            <path
                                                                d="M101.439,266.581h55.18V211.4h-55.18V266.581z M116.439,226.4h25.18v25.181h-25.18V226.4z" />
                                                            <path
                                                                d="M101.439,341.081h55.18v-55.18h-55.18V341.081z M116.439,300.901h25.18v25.18h-25.18V300.901z" />
                                                            <rect x="177.835" y="326.081" width="114.688"
                                                                height="15" />
                                                            <rect x="177.835" y="251.581" width="114.688"
                                                                height="15" />
                                                            <rect x="177.835" y="177.08" width="114.688"
                                                                height="15" />
                                                            <rect x="177.835" y="102.58" width="114.688"
                                                                height="15" />
                                                        </g>
                                                    </g>

                                                </svg>
                                            </div>
                                        </div>
                                        <a href="/dashboard/uji-kompetensi" class="stretched-link"></a>
                                        <h4 class="fw-bold text-center">Manajemen Uji Kompetensi</h4>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-white bg-success bg-gradient h-100"
                                        data-bss-hover-animate="pulse">
                                        <div class="d-flex justify-content-center align-items-center d-inline-block">
                                            <svg fill="#ffffff" width="70px" height="70px" viewBox="0 0 32 32"
                                                version="1.1" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <title>book</title>
                                                    <path
                                                        d="M30.728 18.612l-2.112-0.697 0.050 0.052-11.683 4.24-11.184-11.823-2.745-0.906c-1.386 0.981-1.541 3.774-0.61 4.746l13.805 14.19 14.602-5.228c-1.33-0.727-2.409-2.796-0.123-4.573zM15.474 22.441l-11.504-11.928h0.344l11.453 11.693-0.294 0.235zM16.353 27.987c0 0-1.592-1.86 0.471-4.334l12.501-4.527c0 0-1.438 2.469 0.245 3.927l-13.217 4.935zM5.799 10.384l-0.382-0.404 11.654-4.138 11.544 12.073 2.112 0.697c-0.010 0.008-0.020 0.016-0.030 0.024l0.246-0.088-13.623-14.125-14.212 5.072 2.69 0.888z">
                                                    </path>
                                                </g>
                                            </svg>
                                        </div>
                                        <h4 class="fw-bold text-center">Manajemen Materi</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col">
                                    <div class="card text-white bg-success bg-gradient h-100"
                                        data-bss-hover-animate="pulse">
                                        <div class="d-flex justify-content-center align-items-center d-inline-block">
                                            <svg width="70px" height="70px" viewBox="0 0 512 512" version="1.1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" fill="#ffffff"
                                                stroke="#ffffff">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <title>report-text</title>
                                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <g id="add" fill="#ffffff"
                                                            transform="translate(42.666667, 85.333333)">
                                                            <path
                                                                d="M341.333333,1.42108547e-14 L426.666667,85.3333333 L426.666667,341.333333 L3.55271368e-14,341.333333 L3.55271368e-14,1.42108547e-14 L341.333333,1.42108547e-14 Z M330.666667,42.6666667 L42.6666667,42.6666667 L42.6666667,298.666667 L384,298.666667 L384,96 L330.666667,42.6666667 Z M149.333333,234.666667 L149.333333,266.666667 L85.3333333,266.666667 L85.3333333,234.666667 L149.333333,234.666667 Z M341.333333,234.666667 L341.333333,266.666667 L192,266.666667 L192,234.666667 L341.333333,234.666667 Z M149.333333,170.666667 L149.333333,202.666667 L85.3333333,202.666667 L85.3333333,170.666667 L149.333333,170.666667 Z M341.333333,170.666667 L341.333333,202.666667 L192,202.666667 L192,170.666667 L341.333333,170.666667 Z M149.333333,106.666667 L149.333333,138.666667 L85.3333333,138.666667 L85.3333333,106.666667 L149.333333,106.666667 Z M341.333333,106.666667 L341.333333,138.666667 L192,138.666667 L192,106.666667 L341.333333,106.666667 Z"
                                                                id="Combined-Shape"> </path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                        <h4 class="fw-bold text-center">Manajemen Laporan</h4>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-white bg-success bg-gradient h-100"
                                        data-bss-hover-animate="pulse">
                                        <div class="d-flex justify-content-center align-items-center d-inline-block">
                                            <!DOCTYPE svg
                                                PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">

                                            <!-- Uploaded to: SVG Repo, www.svgrepo.com, Transformed by: SVG Repo Mixer Tools -->
                                            <svg width="70px" height="70px" viewBox="0 0 24 24" fill="none"
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
                                        <h4 class="fw-bold text-center">Manajemen Data Petugas</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-light bg-gradient shadow-sm sticky-top">
                        <div class="card-body">
                            <div class="container align-items-center justify-content-center d-flex">
                                <?xml version="1.0" encoding="utf-8"?>
                                <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                                <svg width="100px" height="100px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4"
                                        d="M12 22.01C17.5228 22.01 22 17.5329 22 12.01C22 6.48716 17.5228 2.01001 12 2.01001C6.47715 2.01001 2 6.48716 2 12.01C2 17.5329 6.47715 22.01 12 22.01Z"
                                        fill="#292D32" />
                                    <path
                                        d="M12 6.93994C9.93 6.93994 8.25 8.61994 8.25 10.6899C8.25 12.7199 9.84 14.3699 11.95 14.4299C11.98 14.4299 12.02 14.4299 12.04 14.4299C12.06 14.4299 12.09 14.4299 12.11 14.4299C12.12 14.4299 12.13 14.4299 12.13 14.4299C14.15 14.3599 15.74 12.7199 15.75 10.6899C15.75 8.61994 14.07 6.93994 12 6.93994Z"
                                        fill="#292D32" />
                                    <path
                                        d="M18.7807 19.36C17.0007 21 14.6207 22.01 12.0007 22.01C9.3807 22.01 7.0007 21 5.2207 19.36C5.4607 18.45 6.1107 17.62 7.0607 16.98C9.7907 15.16 14.2307 15.16 16.9407 16.98C17.9007 17.62 18.5407 18.45 18.7807 19.36Z"
                                        fill="#292D32" />
                                </svg>
                            </div>
                            <h4 class="card-title fw-semibold text-center">{{ Auth()->user()->name }}</h4>
                            <h6 class="text-muted card-subtitle fw-semibold text-center mb-2"><span
                                    class="badge badge-lg rounded-pill text-bg-warning">{{ Auth()->user()->role }}</span>
                            </h6>
                            <br>
                            <table class="table table-hover responsive-small">
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td>{{ Auth()->user()->name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>NRPP</td>
                                        <td>:</td>
                                        <td>{{ Auth()->user()->nrpp }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Jabatan</td>
                                        <td>:</td>
                                        <td>{{ Auth()->user()->jabatan }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>Unit Kerja</td>
                                        <td>:</td>
                                        <td>{{ Auth()->user()->unit_kerja }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">5</th>
                                        <td>Username</td>
                                        <td>:</td>
                                        <td>{{ Auth()->user()->email }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="align-items-center justify-content-center d-flex">
                                <a href="/dashboard/profile" class="btn btn-success" type="button"
                                    data-bss-hover-animate="tada">Profil Anda</a>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button class="btn btn-danger mx-2" type="submit"
                                        data-bss-hover-animate="tada">Keluar
                                        Akun</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let counts4 = setInterval(updated4);
        let upto4 = 0;

        function updated4() {
            var count4 = document.getElementById("counter4");
            count4.innerHTML = ++upto4;
            if (upto4 === 1000) {
                clearInterval(counts4);
            }
        }
    </script>
    <script>
        let counts3 = setInterval(updated3);
        let upto3 = 0;

        function updated3() {
            var count3 = document.getElementById("counter3");
            count3.innerHTML = ++upto3;
            if (upto3 === 560) {
                clearInterval(counts3);
            }
        }
    </script>
    <script>
        let counts2 = setInterval(updated2);
        let upto2 = 0;

        function updated2() {
            var count2 = document.getElementById("counter2");
            count2.innerHTML = ++upto2;
            if (upto2 === 124) {
                clearInterval(counts2);
            }
        }
    </script>
    <script>
        let counts1 = setInterval(updated1);
        let upto1 = 0;
        let limit = {!! json_encode($countpegawai) !!};

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
        let counts7 = setInterval(updated7);
        let upto7 = 0;
        let limit = {!! json_encode($countbank) !!};

        function updated7() {
            if (limit == 0) {
                count7.innerHTML = 0;
            } else {
                var count7 = document.getElementById("counter7");
                count7.innerHTML = ++upto7;
                if (upto7 === limit) {
                    clearInterval(counts7);
                }
            }
        }
    </script>
@endsection
