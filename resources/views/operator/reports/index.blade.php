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
                            <li class="breadcrumb-item active" aria-current="page">Manajemen Laporan</li>
                        </ol>
                    </nav>
                    <div class="card text-bg-success bg-gradient mb-3 bg-opacity-100">
                        <div class="card-header fw-semibold">Dashboard Learning Program Bank Bengkulu</div>
                        <div class="card-body">
                            <h4 class=" responsive-p1 fw-semibold mb-3">Manajemen Laporan</h4>
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
                                            <div class="px-3">
                                                <svg fill="#ffffff" width="80px" height="100px" viewBox="0 0 16 16"
                                                    xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <title>export-16px</title>
                                                        <g id="Layer_2" data-name="Layer 2">
                                                            <g id="Layer_1-2" data-name="Layer 1">
                                                                <path
                                                                    d="M16,9.5v4A2.5,2.5,0,0,1,13.5,16H2.5A2.5,2.5,0,0,1,0,13.5V2.5A2.5,2.5,0,0,1,2.5,0h3A.5.5,0,0,1,6,.5a.5.5,0,0,1-.5.5h-3A1.5,1.5,0,0,0,1,2.5v11A1.5,1.5,0,0,0,2.5,15h11A1.5,1.5,0,0,0,15,13.5v-4a.5.5,0,0,1,1,0ZM5,9.5a.5.5,0,0,0,1,0v-2A3.5,3.5,0,0,1,9.5,4h4.79L12.15,6.15a.48.48,0,0,0,0,.7.48.48,0,0,0,.7,0l3-3A.36.36,0,0,0,16,3.69a.5.5,0,0,0,0-.38.36.36,0,0,0-.11-.16l-3-3a.48.48,0,0,0-.7,0,.48.48,0,0,0,0,.7L14.29,3H9.5A4.51,4.51,0,0,0,5,7.5Z">
                                                                </path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex flex-column">
                                                    <a href="/dashboard/reports/pegawai" class="stretched-link"></a>
                                                    <h2 class="fw-bold m-0">Rekapitulasi Data Pegawai</h2>
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
                                            <div class="px-3">
                                                <svg fill="#ffffff" width="80px" height="100px" viewBox="0 0 16 16"
                                                    xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <title>export-16px</title>
                                                        <g id="Layer_2" data-name="Layer 2">
                                                            <g id="Layer_1-2" data-name="Layer 1">
                                                                <path
                                                                    d="M16,9.5v4A2.5,2.5,0,0,1,13.5,16H2.5A2.5,2.5,0,0,1,0,13.5V2.5A2.5,2.5,0,0,1,2.5,0h3A.5.5,0,0,1,6,.5a.5.5,0,0,1-.5.5h-3A1.5,1.5,0,0,0,1,2.5v11A1.5,1.5,0,0,0,2.5,15h11A1.5,1.5,0,0,0,15,13.5v-4a.5.5,0,0,1,1,0ZM5,9.5a.5.5,0,0,0,1,0v-2A3.5,3.5,0,0,1,9.5,4h4.79L12.15,6.15a.48.48,0,0,0,0,.7.48.48,0,0,0,.7,0l3-3A.36.36,0,0,0,16,3.69a.5.5,0,0,0,0-.38.36.36,0,0,0-.11-.16l-3-3a.48.48,0,0,0-.7,0,.48.48,0,0,0,0,.7L14.29,3H9.5A4.51,4.51,0,0,0,5,7.5Z">
                                                                </path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex flex-column">
                                                    <a href="/dashboard/reports/progress" class="stretched-link"></a>
                                                    <h2 class="fw-bold m-0">Rekapitulasi Kemajuan Pembelajaran</h2>
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
    </div>
@endsection
