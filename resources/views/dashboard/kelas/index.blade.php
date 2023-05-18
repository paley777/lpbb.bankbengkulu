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
                                <h4 class="card-title fw-semibold responsive-p1 me-3">Tabel Data</h4>
                                <div class="col-lg-5 col-md-4 me-3">
                                    <form action="/dashboard/kelas">
                                        <div class="input-group">
                                            <input type="text" class="form-control responsive-small"
                                                placeholder="Cari Berdasarkan Nama Kelas" name="search"
                                                value="{{ request('search') }}">
                                            <button class="btn btn-warning" type="submit"><svg width="20px"
                                                    height="20px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path fill="#000000" fill-rule="evenodd"
                                                            d="M4 9a5 5 0 1110 0A5 5 0 014 9zm5-7a7 7 0 104.2 12.6.999.999 0 00.093.107l3 3a1 1 0 001.414-1.414l-3-3a.999.999 0 00-.107-.093A7 7 0 009 2z">
                                                        </path>
                                                    </g>
                                                </svg></button>
                                        </div>
                                    </form>
                                </div>
                                <a href="/dashboard/kelas/create" class="btn btn-warning fw-semibold ms-auto" type="button"
                                    data-bss-hover-animate="tada">Tambah Kelas
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
                            <div class="table-responsive">
                                <table class="table table-hover responsive-small">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Nama Kelas</th>
                                            <th scope="col">Tanggal Mulai</th>
                                            <th scope="col">Tanggal Selesai</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    @if ($kelases->count() == 0)
                                        <h4 class="fw-semibold responsive-p1 me-3">No Data</h4>
                                    @else
                                        <tbody>
                                            @foreach ($kelases as $key => $kelas)
                                                <tr>
                                                    <td>{{ $kelases->firstItem() + $key }}</td>
                                                    <td>{{ $kelas->nama_modul }}</td>
                                                    <td><span
                                                            class="badge rounded-pill text-bg-success">{{ $kelas->date_start }}</span>
                                                    </td>
                                                    <td><span
                                                            class="badge rounded-pill text-bg-success">{{ $kelas->date_end }}</span>
                                                    </td>
                                                    <td>
                                                        <a href="/dashboard/kelas/{{ $kelas->id }}"
                                                            class="badge bg-primary border-0">Preview</a>
                                                        <a href="/dashboard/kelas/{{ $kelas->id }}/edit"
                                                            class="badge bg-warning border-0 text-black">Edit</a>
                                                        <form action="/dashboard/kelas/{{ $kelas->id }}" method="post"
                                                            class="d-inline">
                                                            @method('delete')
                                                            @csrf
                                                            <button class="badge bg-danger border-0"
                                                                onclick="return confirm('Anda yakin untuk menghapus data ini?')">Hapus</button>
                                                        </form>
                                                        <a href="/dashboard/materi-list/{{ $kelas->id }}"
                                                            class="badge bg-success border-0">Daftar Materi</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    @endif
                                </table>
                                <div class="row">
                                    <div class="col">
                                        <div class="d-flex justify-content-center">
                                            {{ $kelases->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        </script>
    @endsection
