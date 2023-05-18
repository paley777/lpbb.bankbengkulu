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
                            <li class="breadcrumb-item"><a href="/dashboard/kelas">Manajemen Kelas</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Daftar Materi</li>
                        </ol>
                    </nav>
                    <div class="card text-bg-success bg-gradient mb-3 bg-opacity-100">
                        <div class="card-header fw-semibold">Dashboard Learning Program Bank Bengkulu</div>
                        <div class="card-body">
                            <h4 class=" responsive-p1 fw-semibold mb-3">{{ $nama_modul }}</h4>
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ session('success') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @isset($pesan)
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ $pesan }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endisset
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
                                <h4 class="card-title fw-semibold responsive-p1 me-3">Manajemen Kelas</h4>
                            </div>
                            <hr>
                            <div class="row g-2 mb-2">
                                @if ($materi_lists->where('jenis', 'Pre Test')->count() === 0)
                                    <div class="col-md-4 col-12">
                                        <div class="d-flex  card bg-success text-white bg-gradient border border-0 p-4 h-100 justify-content-center align-items-center d-inline-block"
                                            data-bss-hover-animate="pulse">
                                            <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                </g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <g id="File / File_Edit">
                                                        <path id="Vector"
                                                            d="M6 11.0002V6.2002C6 5.08009 6 4.51962 6.21799 4.0918C6.40973 3.71547 6.71547 3.40973 7.0918 3.21799C7.51962 3 8.08009 3 9.2002 3H13.6747C13.7973 3 13.9045 3 14 3.00087M19.9991 9C20 9.09561 20 9.20296 20 9.32568V17.8036C20 18.9215 20 19.4805 19.7822 19.9079C19.5905 20.2842 19.2839 20.5905 18.9076 20.7822C18.4802 21 17.921 21 16.8031 21L13 21M19.9991 9C19.9963 8.71451 19.9857 8.53376 19.9443 8.36133C19.8953 8.15726 19.8142 7.96214 19.7046 7.7832C19.5809 7.58136 19.4089 7.40889 19.063 7.06298L15.9375 3.9375C15.5918 3.59182 15.4186 3.41857 15.2168 3.29492C15.0379 3.18526 14.8429 3.10425 14.6388 3.05526C14.4663 3.01385 14.2856 3.00347 14 3.00087M19.9991 9H20.0002M19.9991 9H17.1969C16.079 9 15.5192 9 15.0918 8.78223C14.7155 8.59048 14.4097 8.28392 14.218 7.90759C14 7.47977 14 6.9201 14 5.8V3.00087M9 14L11 16M4 21V18.5L11.5 11L14 13.5L6.5 21H4Z"
                                                            stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                            <span class="fw-bold mb-2 responsive-mini">Tambah Pre Test</span>
                                            <a href="/dashboard/materi-list/{{ $kelas }}/create-pretest"
                                                class="stretched-link"></a>
                                            <h3 class="fw-semibold responsive-small">
                                                << Pre Test Belum Ditambahkan>>
                                            </h3>
                                        </div>
                                    </div>
                                @endif
                                @if ($materi_lists->where('jenis', 'Post Test')->count() === 0)
                                    <div class="col-md-4 col-12">
                                        <div class="d-flex  card bg-success text-white bg-gradient border border-0 p-4 h-100 justify-content-center align-items-center d-inline-block"
                                            data-bss-hover-animate="pulse">
                                            <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                </g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <g id="File / File_Edit">
                                                        <path id="Vector"
                                                            d="M6 11.0002V6.2002C6 5.08009 6 4.51962 6.21799 4.0918C6.40973 3.71547 6.71547 3.40973 7.0918 3.21799C7.51962 3 8.08009 3 9.2002 3H13.6747C13.7973 3 13.9045 3 14 3.00087M19.9991 9C20 9.09561 20 9.20296 20 9.32568V17.8036C20 18.9215 20 19.4805 19.7822 19.9079C19.5905 20.2842 19.2839 20.5905 18.9076 20.7822C18.4802 21 17.921 21 16.8031 21L13 21M19.9991 9C19.9963 8.71451 19.9857 8.53376 19.9443 8.36133C19.8953 8.15726 19.8142 7.96214 19.7046 7.7832C19.5809 7.58136 19.4089 7.40889 19.063 7.06298L15.9375 3.9375C15.5918 3.59182 15.4186 3.41857 15.2168 3.29492C15.0379 3.18526 14.8429 3.10425 14.6388 3.05526C14.4663 3.01385 14.2856 3.00347 14 3.00087M19.9991 9H20.0002M19.9991 9H17.1969C16.079 9 15.5192 9 15.0918 8.78223C14.7155 8.59048 14.4097 8.28392 14.218 7.90759C14 7.47977 14 6.9201 14 5.8V3.00087M9 14L11 16M4 21V18.5L11.5 11L14 13.5L6.5 21H4Z"
                                                            stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                            <span class="fw-bold mb-2 responsive-mini">Tambah Post Test</span>
                                            <a href="/dashboard/materi-list/{{ $kelas }}/create-posttest"
                                                class="stretched-link"></a>
                                            <h3 class="fw-semibold responsive-small">
                                                << Post Test Belum Ditambahkan>>
                                            </h3>
                                        </div>
                                    </div>
                                @endif
                                @if ($materi_lists->where('jenis', 'Materi')->count() === 0)
                                    <div class="col-md-4 col-12">
                                        <div class="d-flex  card bg-success text-white bg-gradient border border-0 p-4 h-100 justify-content-center align-items-center d-inline-block"
                                            data-bss-hover-animate="pulse">
                                            <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                </g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <g id="File / File_Edit">
                                                        <path id="Vector"
                                                            d="M6 11.0002V6.2002C6 5.08009 6 4.51962 6.21799 4.0918C6.40973 3.71547 6.71547 3.40973 7.0918 3.21799C7.51962 3 8.08009 3 9.2002 3H13.6747C13.7973 3 13.9045 3 14 3.00087M19.9991 9C20 9.09561 20 9.20296 20 9.32568V17.8036C20 18.9215 20 19.4805 19.7822 19.9079C19.5905 20.2842 19.2839 20.5905 18.9076 20.7822C18.4802 21 17.921 21 16.8031 21L13 21M19.9991 9C19.9963 8.71451 19.9857 8.53376 19.9443 8.36133C19.8953 8.15726 19.8142 7.96214 19.7046 7.7832C19.5809 7.58136 19.4089 7.40889 19.063 7.06298L15.9375 3.9375C15.5918 3.59182 15.4186 3.41857 15.2168 3.29492C15.0379 3.18526 14.8429 3.10425 14.6388 3.05526C14.4663 3.01385 14.2856 3.00347 14 3.00087M19.9991 9H20.0002M19.9991 9H17.1969C16.079 9 15.5192 9 15.0918 8.78223C14.7155 8.59048 14.4097 8.28392 14.218 7.90759C14 7.47977 14 6.9201 14 5.8V3.00087M9 14L11 16M4 21V18.5L11.5 11L14 13.5L6.5 21H4Z"
                                                            stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                            <span class="fw-bold mb-2 responsive-mini">Tambah Materi</span>
                                            <a href="/dashboard/materi-list/{{ $kelas }}/create-materi"
                                                class="stretched-link"></a>
                                            <h3 class="fw-semibold responsive-small">
                                                << Materi Belum Ditambahkan>>
                                            </h3>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            @foreach ($materi_lists as $materi_list)
                                @if ($materi_list->jenis == 'Pre Test')
                                    @foreach ($pretests as $pretest)
                                        @if ($materi_list->nama_materi == $pretest->nama_pretest)
                                            <div class="row g-2">
                                                <div class="col-md-12 col-12">
                                                    <div class="card bg-success text-white bg-gradient border border-0 p-4 h-100 "
                                                        data-bss-hover-animate="pulse">
                                                        <div class="row">
                                                            <div class="col justify-content-center align-items-center">
                                                                <svg width="64px" height="64px" viewBox="0 0 24 24"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                        stroke-linejoin="round">
                                                                    </g>
                                                                    <g id="SVGRepo_iconCarrier">
                                                                        <g id="File / File_Edit">
                                                                            <path id="Vector"
                                                                                d="M6 11.0002V6.2002C6 5.08009 6 4.51962 6.21799 4.0918C6.40973 3.71547 6.71547 3.40973 7.0918 3.21799C7.51962 3 8.08009 3 9.2002 3H13.6747C13.7973 3 13.9045 3 14 3.00087M19.9991 9C20 9.09561 20 9.20296 20 9.32568V17.8036C20 18.9215 20 19.4805 19.7822 19.9079C19.5905 20.2842 19.2839 20.5905 18.9076 20.7822C18.4802 21 17.921 21 16.8031 21L13 21M19.9991 9C19.9963 8.71451 19.9857 8.53376 19.9443 8.36133C19.8953 8.15726 19.8142 7.96214 19.7046 7.7832C19.5809 7.58136 19.4089 7.40889 19.063 7.06298L15.9375 3.9375C15.5918 3.59182 15.4186 3.41857 15.2168 3.29492C15.0379 3.18526 14.8429 3.10425 14.6388 3.05526C14.4663 3.01385 14.2856 3.00347 14 3.00087M19.9991 9H20.0002M19.9991 9H17.1969C16.079 9 15.5192 9 15.0918 8.78223C14.7155 8.59048 14.4097 8.28392 14.218 7.90759C14 7.47977 14 6.9201 14 5.8V3.00087M9 14L11 16M4 21V18.5L11.5 11L14 13.5L6.5 21H4Z"
                                                                                stroke="#ffffff" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"></path>
                                                                        </g>
                                                                    </g>
                                                                </svg>
                                                                <span class="fw-bold mb-2 responsive-mini">
                                                                    << Pre Test>>{{ $materi_list->nama_materi }}
                                                                </span>

                                                                <a href="/dashboard/materi-list/{{ $materi_list->id }}/edit-pretest"
                                                                    class="btn bg-warning border-0 text-black">Edit</a>
                                                                <form
                                                                    action="/dashboard/materi-list/{{ $materi_list->id }}"
                                                                    method="post" class="d-inline">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <button class="btn bg-danger border-0 text-white"
                                                                        onclick="return confirm('Anda yakin untuk menghapus data ini?')">Hapus</button>
                                                                </form>
                                                            </div>
                                                            <div class="col">
                                                                <table
                                                                    class="table table-hover responsive-small  text-white">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th scope="row">1</th>
                                                                            <td>Nama Pre Test</td>
                                                                            <td>:</td>
                                                                            <td>{{ $pretest->nama_pretest }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">2</th>
                                                                            <td>Nama Bank Soal</td>
                                                                            <td>:</td>
                                                                            <td>{{ $pretest->nama_bank }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">3</th>
                                                                            <td>Jumlah Soal</td>
                                                                            <td>:</td>
                                                                            <td>{{ $pretest->jumlah_soal }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">4</th>
                                                                            <td>Durasi</td>
                                                                            <td>:</td>
                                                                            <td>{{ $pretest->durasi }}</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        @endif
                                    @endforeach
                                @elseif ($materi_list->jenis == 'Post Test')
                                    @foreach ($posttests as $posttest)
                                        @if ($materi_list->nama_materi == $posttest->nama_posttest)
                                            <div class="row g-2">
                                                <div class="col-md-12 col-12">
                                                    <div class="card bg-success text-white bg-gradient border border-0 p-4 h-100 "
                                                        data-bss-hover-animate="pulse">
                                                        <div class="row">
                                                            <div class="col justify-content-center align-items-center">
                                                                <svg width="64px" height="64px" viewBox="0 0 24 24"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                        stroke-linejoin="round">
                                                                    </g>
                                                                    <g id="SVGRepo_iconCarrier">
                                                                        <g id="File / File_Edit">
                                                                            <path id="Vector"
                                                                                d="M6 11.0002V6.2002C6 5.08009 6 4.51962 6.21799 4.0918C6.40973 3.71547 6.71547 3.40973 7.0918 3.21799C7.51962 3 8.08009 3 9.2002 3H13.6747C13.7973 3 13.9045 3 14 3.00087M19.9991 9C20 9.09561 20 9.20296 20 9.32568V17.8036C20 18.9215 20 19.4805 19.7822 19.9079C19.5905 20.2842 19.2839 20.5905 18.9076 20.7822C18.4802 21 17.921 21 16.8031 21L13 21M19.9991 9C19.9963 8.71451 19.9857 8.53376 19.9443 8.36133C19.8953 8.15726 19.8142 7.96214 19.7046 7.7832C19.5809 7.58136 19.4089 7.40889 19.063 7.06298L15.9375 3.9375C15.5918 3.59182 15.4186 3.41857 15.2168 3.29492C15.0379 3.18526 14.8429 3.10425 14.6388 3.05526C14.4663 3.01385 14.2856 3.00347 14 3.00087M19.9991 9H20.0002M19.9991 9H17.1969C16.079 9 15.5192 9 15.0918 8.78223C14.7155 8.59048 14.4097 8.28392 14.218 7.90759C14 7.47977 14 6.9201 14 5.8V3.00087M9 14L11 16M4 21V18.5L11.5 11L14 13.5L6.5 21H4Z"
                                                                                stroke="#ffffff" stroke-width="2"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round"></path>
                                                                        </g>
                                                                    </g>
                                                                </svg>
                                                                <span class="fw-bold mb-2 responsive-mini">
                                                                    << Post Test>> {{ $materi_list->nama_materi }}
                                                                </span>

                                                                <a href="/dashboard/materi-list/{{ $materi_list->id }}/edit-posttest"
                                                                    class="btn bg-warning border-0 text-black">Edit</a>
                                                                <form
                                                                    action="/dashboard/materi-list/{{ $materi_list->id }}"
                                                                    method="post" class="d-inline">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <button class="btn bg-danger border-0 text-white"
                                                                        onclick="return confirm('Anda yakin untuk menghapus data ini?')">Hapus</button>
                                                                </form>
                                                            </div>
                                                            <div class="col">
                                                                <table
                                                                    class="table table-hover responsive-small  text-white">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th scope="row">1</th>
                                                                            <td>Nama Post Test</td>
                                                                            <td>:</td>
                                                                            <td>{{ $posttest->nama_posttest }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">2</th>
                                                                            <td>Nama Bank Soal</td>
                                                                            <td>:</td>
                                                                            <td>{{ $posttest->nama_bank }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">3</th>
                                                                            <td>Jumlah Soal</td>
                                                                            <td>:</td>
                                                                            <td>{{ $posttest->jumlah_soal }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">4</th>
                                                                            <td>Durasi</td>
                                                                            <td>:</td>
                                                                            <td>{{ $posttest->durasi }}</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                            <hr>
                            <div class="d-flex">
                                <h4 class="card-title fw-semibold responsive-p1 me-3">Daftar Materi</h4>
                                <a href="/dashboard/materi-list/{{ $kelas }}/create-materi"
                                    class="btn btn-warning fw-semibold ms-auto" type="button"
                                    data-bss-hover-animate="tada">Tambah Materi
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
                            <div class="table-responsive">
                                <table class="table table-hover responsive-small">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nama Materi</th>
                                            <th scope="col">Jenis</th>
                                            <th scope="col">Lihat Materi</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($materi_lists as $key => $materi_list)
                                            @if ($materi_list->jenis == 'Materi')
                                                <tr>
                                                    <td>{{ $materi_list->nama_materi }}</td>
                                                    <td>{{ $materi_list->jenis }}</td>
                                                    <td>
                                                        @foreach ($materis as $materi)
                                                            @if ($materi->nama_materi == $materi_list->nama_materi)
                                                                <a href="{{ asset('storage/' . $materi->materi) }}">Download
                                                                </a>
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        <a href="/dashboard/materi-list/{{ $materi_list->id }}/edit-materi"
                                                            class="badge bg-warning border-0 text-black">Edit</a>
                                                        <form action="/dashboard/materi-list/{{ $materi_list->id }}/materi"
                                                            method="post" class="d-inline">
                                                            @method('delete')
                                                            @csrf
                                                            <button class="badge bg-danger border-0"
                                                                onclick="return confirm('Anda yakin untuk menghapus data ini?')">Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col">
                                        <div class="d-flex justify-content-center">
                                            {{ $materi_lists->links() }}
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
    </div>
@endsection
