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
                            <li class="breadcrumb-item active" aria-current="page">Kemajuan Pribadi</li>
                        </ol>
                    </nav>
                    <div class="card text-bg-success bg-gradient mb-3 bg-opacity-100">
                        <div class="card-header fw-semibold">Dashboard Learning Program Bank Bengkulu</div>
                        <div class="card-body">
                            <h4 class=" responsive-p1 fw-semibold mb-3">Kemajuan Pribadi</h4>
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
                                <h4 class="card-title fw-semibold responsive-p1 me-auto">Kelas yang Diambil</h4>
                                <a href="/my-certificate" class="btn btn-warning fw-semibold ms-auto" type="button"
                                    data-bss-hover-animate="tada">Cek Sertifikat
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
                            @foreach ($my_progreses as $progress)
                                <div class="col-md-12 col-12">
                                    <div class="card bg-success text-white bg-gradient border border-0 p-4 h-100"
                                        data-bss-hover-animate="pulse"
                                        style="color: rgb(0,0,0);background: var(--bs-yellow);">
                                        <div class="d-flex">
                                            <h3 class="fw-bold"><svg version="1.1" id="Uploaded to svgrepo.com"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="32px" height="32px"
                                                    viewBox="0 0 32 32" xml:space="preserve" fill="#000000">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <style type="text/css">
                                                            .puchipuchi_een {
                                                                fill: #ffffff;
                                                            }
                                                        </style>
                                                        <path class="puchipuchi_een"
                                                            d="M25.977,27.829c0.204,0.511-0.064,0.815-0.596,0.676l-3.153-0.823 c-0.532-0.139-1.229,0.114-1.548,0.562l-2.099,2.943c-0.319,0.448-0.699,0.38-0.844-0.151L16,24.667l-1.737,6.369 c-0.145,0.531-0.524,0.598-0.844,0.151l-2.099-2.943c-0.319-0.448-1.016-0.7-1.548-0.562l-3.153,0.823 c-0.532,0.139-0.8-0.165-0.596-0.676l2.562-6.406C10.627,23.032,13.198,24,16,24s5.373-0.968,7.415-2.577L25.977,27.829z M5,12 C5,5.935,9.935,1,16,1s11,4.935,11,11s-4.935,11-11,11S5,18.065,5,12z M9.986,11.105l1.567,1.867 c0.354,0.421,0.611,1.215,0.573,1.764l-0.17,2.432c-0.038,0.549,0.347,0.829,0.857,0.623l2.26-0.914c0.51-0.206,1.344-0.206,1.854,0 l2.26,0.914c0.51,0.206,0.896-0.074,0.857-0.623l-0.17-2.432c-0.038-0.549,0.219-1.342,0.573-1.764l1.567-1.867 c0.354-0.421,0.206-0.875-0.327-1.008l-2.366-0.589c-0.534-0.133-1.209-0.623-1.5-1.09L16.53,6.35c-0.291-0.466-0.768-0.466-1.06,0 l-1.292,2.068c-0.291,0.466-0.966,0.957-1.5,1.09l-2.366,0.589C9.779,10.23,9.632,10.683,9.986,11.105z">
                                                        </path>
                                                    </g>
                                                </svg> {{ $progress[0]->nama_modul }}</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover responsive-small">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nama Materi</th>
                                                <th scope="col">Jenis</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Skor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($progress as $item)
                                                <tr>
                                                    <td>{{ $item->nama_materi }}</td>
                                                    <td><span class="badge rounded-pill text-bg-success"><svg width="16px"
                                                                height="16px" viewBox="0 0 48 48"
                                                                xmlns="http://www.w3.org/2000/svg" fill="#ffffff"
                                                                stroke="#ffffff">
                                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                    stroke-linejoin="round"></g>
                                                                <g id="SVGRepo_iconCarrier">
                                                                    <title>category-solid</title>
                                                                    <g id="Layer_2" data-name="Layer 2">
                                                                        <g id="invisible_box" data-name="invisible box">
                                                                            <rect width="48" height="48"
                                                                                fill="none"></rect>
                                                                        </g>
                                                                        <g id="icons_Q2" data-name="icons Q2">
                                                                            <path
                                                                                d="M24,2a2.1,2.1,0,0,0-1.7,1L13.2,17a2.3,2.3,0,0,0,0,2,1.9,1.9,0,0,0,1.7,1H33a2.1,2.1,0,0,0,1.7-1,1.8,1.8,0,0,0,0-2l-9-14A1.9,1.9,0,0,0,24,2Z">
                                                                            </path>
                                                                            <path
                                                                                d="M43,43H29a2,2,0,0,1-2-2V27a2,2,0,0,1,2-2H43a2,2,0,0,1,2,2V41A2,2,0,0,1,43,43Z">
                                                                            </path>
                                                                            <path
                                                                                d="M13,24A10,10,0,1,0,23,34,10,10,0,0,0,13,24Z">
                                                                            </path>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </svg> {{ $item->jenis }}</span>
                                                    </td>
                                                    <td>
                                                        @if ($item->status == 'Ongoing' or $item->status == 'Tidak Lulus' or $item->status == 'Belum Lulus')
                                                            <span
                                                                class="badge rounded-pill text-bg-warning">{{ $item->status }}</span>
                                                        @else
                                                            <span
                                                                class="badge rounded-pill text-bg-success">{{ $item->status }}</span>
                                                        @endif

                                                    </td>
                                                    <td>{{ $item->skor }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        </script>
    @endsection
