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
                            </div>
                            <hr>
                            @foreach ($my_progreses as $progress)
                                <div class="col-md-12 col-12">
                                    <div class="card bg-success text-white bg-gradient border border-0 p-4 h-100"
                                        data-bss-hover-animate="pulse"
                                        style="color: rgb(0,0,0);background: var(--bs-yellow);">
                                        <div class="d-flex">
                                            <h3 class="fw-bold">{{ $progress[0]->nama_modul }}</h3>
                                            <a href="/dashboard/kelas/create" class="btn btn-warning fw-semibold ms-auto"
                                                type="button" data-bss-hover-animate="tada">Cek Sertifikat
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
                                                    <td><span
                                                            class="badge rounded-pill text-bg-success">{{ $item->jenis }}</span>
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
