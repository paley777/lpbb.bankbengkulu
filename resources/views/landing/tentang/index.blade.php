@extends('landing.layouts.main')

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
    <style>
        .background {

            background:
                /* top, transparent black, faked with gradient */
                linear-gradient(rgba(0, 0, 0, 0.09),
                    rgba(0, 0, 0, 0.7)), url("download.webp");
            background-size: cover;
            height: 800px;
        }
    </style>
    <style>
        .text-justify {
            text-align: justify;
        }
    </style>
    <section class="shadow">
        <div>
            <div class="border-0 d-flex flex-column justify-content-center align-items-center p-4 py-5 background">
                <div class="row">
                    <div
                        class="col-md-12 col-xl-12 text-center d-flex d-sm-flex d-md-flex justify-content-center align-items-center mx-auto justify-content-md-start align-items-md-center justify-content-xl-center">
                        <div>
                            <h1 class="text-white fw-bold mb-3">Tentang</h1>
                            <h2 class="text-white fw-normal mb-3">Learning Program Bank Bengkulu</h2>
                            <a href="#scrollspyHeading2"
                                class="btn btn-warning btn-sm fs-5 fw-semibold rounded-pill shadow-sm me-2 py-2 px-4"
                                style="width: 166.475px;height: 40px;" data-bss-hover-animate="tada">
                                Mulai
                                <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12 3C12.5523 3 13 3.44772 13 4V17.5858L18.2929 12.2929C18.6834 11.9024 19.3166 11.9024 19.7071 12.2929C20.0976 12.6834 20.0976 13.3166 19.7071 13.7071L12.7071 20.7071C12.3166 21.0976 11.6834 21.0976 11.2929 20.7071L4.29289 13.7071C3.90237 13.3166 3.90237 12.6834 4.29289 12.2929C4.68342 11.9024 5.31658 11.9024 5.70711 12.2929L11 17.5858V4C11 3.44772 11.4477 3 12 3Z"
                                            fill="#000000"></path>
                                    </g>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="bg-secondary-subtle" id="scrollspyHeading2">
        <div class="container py-5">
            <div class="card rounded shadow">
                <div class="py-4 py-xl-5">
                    <div class="row gy-4 gy-md-0 m-5">
                        <div class="col-md-6">
                            <div class=""><img class="rounded img-fluid w-100 fit-cover"
                                    style="min-height: 200px;object-fit: contain;"
                                    src="{{ asset('storage/images/logo_lpbb1.png') }}" /></div>
                        </div>
                        <div
                            class="col-md-6 text-center text-md-start d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-md-start align-items-md-center justify-content-xl-center">
                            <div style="max-width: 580px;">
                                <h2 class="fw-bold fs-1">Profil</h2>
                                <p class="my-3 fs-4">
                                <p class="fw-bold fs-4">Learning Program Bank Bengkulu (LPBB)</p>
                                <p class="fs-4 text-justify">adalah sistem pembelajaran (E-Learning)
                                    satu atap milik Bank Bengkulu
                                    dengan fitur pembelajaran online, ujian dan sertifikasi.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="container">
                    <div class="row  m-5">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col">
                                    <img class="rounded img-fluid w-100 fit-cover"
                                        style="height: 220px;object-fit: contain;"
                                        src="{{ asset('storage/images/logounite.png') }}" />
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-md-12text-md-start d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-md-start align-items-md-center justify-content-xl-center">
                            <div class="text-justify">
                                <h2 class="fw-bold fs-1 text-center">Pengembang</h2>
                                <br>
                                <p class="fs-4">Sistem pembelajaran Learning Program Bank Bengkulu ini dibangun dengan
                                    kerjasama oleh Program Studi Informatika Fakultas Teknik Universitas Bengkulu tahun
                                    ajaran 2022/2023 melalui kegiatan Kerja Praktik mahasiswa Informatika Universitas
                                    Bengkulu dengan Dosen Pembimbing <strong>Mochammad Yusa, S.Kom., M.Kom.</strong> dan
                                    Pembimbing Lapangan <strong>Dian Wundari Gustini</strong>.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <section style="background-color: #e8e8e8;">
                    <div class="container py-5 h-100">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col col-md-9 col-lg-7 col-xl-6">
                                <div class="card" style="border-radius: 15px;">
                                    <div class="card-body p-4">
                                        <div class="d-flex text-black">
                                            <div class="flex-grow-1 ms-3">
                                                <h5 class="mb-1">Valleryan Virgil Zuliuskandar</h5>
                                                <p class="mb-2 pb-1" style="color: #2b2a2a;">Pengembang Sistem</p>
                                                <div class="d-flex justify-content-start rounded-3 p-2 mb-2"
                                                    style="background-color: #efefef;">
                                                    <div class="pe-3">
                                                        <p class="small text-muted mb-1">NPM</p>
                                                        <p class="mb-0">G1A020021</p>
                                                    </div>
                                                    <div>
                                                        <p class="small text-muted mb-1">Program Studi</p>
                                                        <p class="mb-0">Informatika</p>
                                                    </div>
                                                    <div class="px-3">
                                                        <p class="small text-muted mb-1">Fakultas</p>
                                                        <p class="mb-0">Teknik</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-start rounded-3 p-2 mb-2"
                                                    style="background-color: #efefef;">
                                                    <div class="pe-3">
                                                        <p class="small text-muted mb-1">E-mail</p>
                                                        <p class="mb-0">valleryan1212@gmail.com</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex pt-1">
                                                    <a href="https://www.linkedin.com/in/valleryan-virgil-zuliuskandar-50366a242/"
                                                        class="btn btn-outline-primary me-1 flex-grow-1">LinkedIn</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
