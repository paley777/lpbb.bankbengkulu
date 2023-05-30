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
                                <a href="/kelas" class="btn btn-warning fw-semibold" type="button"
                                    data-bss-hover-animate="tada">Manajemen Kelas
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
                                @foreach ($kelases as $kelas)
                                    @if ($dt > $kelas->date_start && $dt < $kelas->date_end)
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
                                    @endif
                                @endforeach
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
                                        <a href="/kelas" class="stretched-link"></a>
                                        <h4 class="fw-bold text-center">Kelas</h4>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-white bg-success bg-gradient h-100"
                                        data-bss-hover-animate="pulse">
                                        <div class="d-flex justify-content-center align-items-center d-inline-block">
                                            <svg width="70px" height="70px" viewBox="0 0 512 512" version="1.1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" fill="#ffffff" stroke="#ffffff">
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
                                        <h4 class="fw-bold text-center">Kemajuan Pembelajaran</h4>
                                    </div>
                                </div>
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
                                        <a href="/dashboard/petugas" class="stretched-link"></a>
                                        <h4 class="fw-bold text-center">Sertifikat</h4>
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
@endsection
