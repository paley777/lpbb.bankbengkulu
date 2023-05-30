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
    <style>
        #form {
            position: relative;
            margin-top: 20px
        }

        #form fieldset {
            border: 0 none;
            border-radius: 0.5rem;
            box-sizing: border-box;
            width: 100%;
            margin: 0;
            padding-bottom: 20px;
            position: relative
        }

        .finish {
            text-align: center
        }

        #form fieldset:not(:first-of-type) {
            display: none
        }

        #form .previous-step,
        .next-step {
            width: 100px;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px 10px 0px;
            float: right
        }

        .form,
        .previous-step {
            background: #616161;
        }

        .form,
        .next-step {
            background: #2F8D46;
        }

        #form .previous-step:hover,
        #form .previous-step:focus {
            background-color: #000000
        }

        #form .next-step:hover,
        #form .next-step:focus {
            background-color: #2F8D46
        }

        .text {
            color: #2F8D46;
            font-weight: normal
        }

        #progressbar {
            text-align: center;
            margin-bottom: 30px;
            overflow: hidden;
            color: lightgrey
        }

        #progressbar .active {
            color: #2F8D46
        }

        #progressbar li {
            list-style-type: none;
            font-size: 15px;
            width: 25%;
            float: left;
            position: relative;
            font-weight: 400
        }

        #progressbar #step1:before {
            content: "1"
        }

        #progressbar #step2:before {
            content: "2"
        }

        #progressbar #step3:before {
            content: "3"
        }

        #progressbar #step4:before {
            content: "4"
        }

        #progressbar li:before {
            width: 50px;
            height: 50px;
            line-height: 45px;
            display: block;
            font-size: 20px;
            color: #ffffff;
            background: lightgray;
            border-radius: 50%;
            margin: 0 auto 10px auto;
            padding: 2px
        }

        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: lightgray;
            position: absolute;
            left: 0;
            top: 25px;
            z-index: -1
        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #2F8D46
        }

        .progress {
            height: 20px
        }

        .progress-bar {
            background-color: #2F8D46
        }
    </style>
    <div class="bg-success bg-gradient bg-opacity-10">
        <div class="container py-5 py-xl-5 mx-5 justify-content-center mx-auto" style="font-family: Raleway;">
            <div class="row mx-4">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb responsive-small">
                            <li class="breadcrumb-item"><a href="/dashboard">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $kelas->nama_modul }}</li>
                        </ol>
                    </nav>
                    <div class="card text-bg-success bg-gradient mb-3 bg-opacity-100">
                        <div class="card-header fw-semibold">Dashboard Learning Program Bank Bengkulu</div>
                        <div class="card-body">
                            <h4 class=" responsive-p1 fw-semibold mb-3">Selamat datang di kelas {{ $kelas->nama_modul }}
                            </h4>
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
                                <h4 class="card-title fw-semibold responsive-p1 me-3">Navigation</h4>
                            </div>
                            <hr>
                            @if ($status_pretest->status == 'Ongoing')
                                <div class="container">
                                    <div class="row">
                                        <div>
                                            <form id="form">
                                                <ul id="progressbar">
                                                    <li class="active" id="step1">
                                                        <strong>Pre Test</strong>
                                                    </li>
                                                    <li id="step2"><strong>Akses Materi</strong></li>
                                                    <li id="step3"><strong>Post Test</strong></li>
                                                    <li id="step4"><strong>Selesai</strong></li>
                                                </ul>
                                                <div class="progress">
                                                    <div class="progress-bar"></div>
                                                </div> <br>
                                                <fieldset>
                                                    @foreach ($materi as $materi1)
                                                        @if ($materi1->jenis == 'Pre Test')
                                                            <div class="row g-2">
                                                                <div class="col-md-12 col-12">
                                                                    <div class="card bg-success text-white bg-gradient border border-0 p-4 h-100 "
                                                                        data-bss-hover-animate="pulse">
                                                                        <div class="row">
                                                                            <div
                                                                                class="col justify-content-center align-items-center">
                                                                                <svg width="64px" height="64px"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <g id="SVGRepo_bgCarrier"
                                                                                        stroke-width="0"></g>
                                                                                    <g id="SVGRepo_tracerCarrier"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round">
                                                                                    </g>
                                                                                    <g id="SVGRepo_iconCarrier">
                                                                                        <g id="File / File_Edit">
                                                                                            <path id="Vector"
                                                                                                d="M6 11.0002V6.2002C6 5.08009 6 4.51962 6.21799 4.0918C6.40973 3.71547 6.71547 3.40973 7.0918 3.21799C7.51962 3 8.08009 3 9.2002 3H13.6747C13.7973 3 13.9045 3 14 3.00087M19.9991 9C20 9.09561 20 9.20296 20 9.32568V17.8036C20 18.9215 20 19.4805 19.7822 19.9079C19.5905 20.2842 19.2839 20.5905 18.9076 20.7822C18.4802 21 17.921 21 16.8031 21L13 21M19.9991 9C19.9963 8.71451 19.9857 8.53376 19.9443 8.36133C19.8953 8.15726 19.8142 7.96214 19.7046 7.7832C19.5809 7.58136 19.4089 7.40889 19.063 7.06298L15.9375 3.9375C15.5918 3.59182 15.4186 3.41857 15.2168 3.29492C15.0379 3.18526 14.8429 3.10425 14.6388 3.05526C14.4663 3.01385 14.2856 3.00347 14 3.00087M19.9991 9H20.0002M19.9991 9H17.1969C16.079 9 15.5192 9 15.0918 8.78223C14.7155 8.59048 14.4097 8.28392 14.218 7.90759C14 7.47977 14 6.9201 14 5.8V3.00087M9 14L11 16M4 21V18.5L11.5 11L14 13.5L6.5 21H4Z"
                                                                                                stroke="#ffffff"
                                                                                                stroke-width="2"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                            </path>
                                                                                        </g>
                                                                                    </g>
                                                                                </svg>
                                                                                <span class="fw-bold mb-2 responsive-mini">
                                                                                    << Pre Test>>{{ $materi1->nama_materi }}
                                                                                </span> <span
                                                                                    class="badge rounded-pill text-bg-warning">Belum
                                                                                    Selesai</span>
                                                                                <br>
                                                                                <br>
                                                                                <a href="/kelas/{{ $kelas->id }}/room/{{ $materi1->id }}/pretest"
                                                                                    class="btn fw-bold bg-warning border-0 text-black"
                                                                                    onclick="return confirm('Sebelum mulai ujian, pastikan perangkat Anda dalam kondisi optimal!')">Kerjakan
                                                                                    Ujian</a>
                                                                            </div>
                                                                            @foreach ($pretest as $pretest)
                                                                                @if ($pretest->nama_pretest == $materi1->nama_materi)
                                                                                    <div class="col">
                                                                                        <table
                                                                                            class="table table-hover responsive-small  text-white">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <th scope="row">1
                                                                                                    </th>
                                                                                                    <td>Nama Pre Test</td>
                                                                                                    <td>:</td>
                                                                                                    <td>{{ $pretest->nama_pretest }}
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th scope="row">2
                                                                                                    </th>
                                                                                                    <td>Nama Bank Soal</td>
                                                                                                    <td>:</td>
                                                                                                    <td>{{ $pretest->nama_bank }}
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th scope="row">3
                                                                                                    </th>
                                                                                                    <td>Jumlah Soal</td>
                                                                                                    <td>:</td>
                                                                                                    <td>{{ $pretest->jumlah_soal }}
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th scope="row">4
                                                                                                    </th>
                                                                                                    <td>Durasi</td>
                                                                                                    <td>:</td>
                                                                                                    <td>{{ $pretest->durasi }}
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th scope="row">4
                                                                                                    </th>
                                                                                                    <td>Skor</td>
                                                                                                    <td>:</td>
                                                                                                    <td>Belum Dikerjakan
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                @endif
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                    <input type="button" name="next-step" class="next-step"
                                                        value="Selanjutnya" />
                                                </fieldset>
                                                <fieldset>
                                                    <div class="d-flex justify-content-center">
                                                        <svg class="justify-content-center" width="64px" height="64px"
                                                            viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                stroke-linejoin="round"></g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <path
                                                                    d="M12 16.99V17M12 7V14M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"
                                                                    stroke="#000000" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                </path>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <h4 class="text-center">Maaf Anda belum menyelesaikan Pre Test</h4>
                                                    </div>
                                                    <input type="button" name="next-step" class="next-step"
                                                        value="Selanjutnya" />
                                                    <input type="button" name="previous-step" class="previous-step"
                                                        value="Sebelumnya" />
                                                </fieldset>
                                                <fieldset>
                                                    <div class="d-flex justify-content-center">
                                                        <svg class="justify-content-center" width="64px" height="64px"
                                                            viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                stroke-linejoin="round"></g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <path
                                                                    d="M12 16.99V17M12 7V14M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"
                                                                    stroke="#000000" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                </path>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <h4 class="text-center">Maaf Anda belum menyelesaikan Pre Test</h4>
                                                    </div>
                                                    <input type="button" name="next-step" class="next-step"
                                                        value="Selanjutnya" />
                                                    <input type="button" name="previous-step" class="previous-step"
                                                        value="Sebelumnya" />
                                                </fieldset>
                                                <fieldset>
                                                    <div class="d-flex justify-content-center">
                                                        <svg class="justify-content-center" width="64px" height="64px"
                                                            viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                stroke-linejoin="round"></g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <path
                                                                    d="M12 16.99V17M12 7V14M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"
                                                                    stroke="#000000" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                </path>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <h4 class="text-center">Maaf Anda belum menyelesaikan Pre Test</h4>
                                                    </div>
                                                    <input type="button" name="previous-step" class="previous-step"
                                                        value="Sebelumnya" />
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @elseif ($status_pretest->status == 'Belum Lulus')
                                <div class="container">
                                    <div class="row">
                                        <div>
                                            <form id="form">
                                                <ul id="progressbar">
                                                    <li class="active" id="step1">
                                                        <strong>Pre Test</strong>
                                                    </li>
                                                    <li id="step2"><strong>Akses Materi</strong></li>
                                                    <li id="step3"><strong>Post Test</strong></li>
                                                    <li id="step4"><strong>Selesai</strong></li>
                                                </ul>
                                                <div class="progress">
                                                    <div class="progress-bar"></div>
                                                </div> <br>
                                                <fieldset>
                                                    @foreach ($materi as $materi1)
                                                        @if ($materi1->jenis == 'Pre Test')
                                                            <div class="row g-2">
                                                                <div class="col-md-12 col-12">
                                                                    <div class="card bg-success text-white bg-gradient border border-0 p-4 h-100 "
                                                                        data-bss-hover-animate="pulse">
                                                                        <div class="row">
                                                                            <div
                                                                                class="col justify-content-center align-items-center">
                                                                                <svg width="64px" height="64px"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <g id="SVGRepo_bgCarrier"
                                                                                        stroke-width="0"></g>
                                                                                    <g id="SVGRepo_tracerCarrier"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round">
                                                                                    </g>
                                                                                    <g id="SVGRepo_iconCarrier">
                                                                                        <g id="File / File_Edit">
                                                                                            <path id="Vector"
                                                                                                d="M6 11.0002V6.2002C6 5.08009 6 4.51962 6.21799 4.0918C6.40973 3.71547 6.71547 3.40973 7.0918 3.21799C7.51962 3 8.08009 3 9.2002 3H13.6747C13.7973 3 13.9045 3 14 3.00087M19.9991 9C20 9.09561 20 9.20296 20 9.32568V17.8036C20 18.9215 20 19.4805 19.7822 19.9079C19.5905 20.2842 19.2839 20.5905 18.9076 20.7822C18.4802 21 17.921 21 16.8031 21L13 21M19.9991 9C19.9963 8.71451 19.9857 8.53376 19.9443 8.36133C19.8953 8.15726 19.8142 7.96214 19.7046 7.7832C19.5809 7.58136 19.4089 7.40889 19.063 7.06298L15.9375 3.9375C15.5918 3.59182 15.4186 3.41857 15.2168 3.29492C15.0379 3.18526 14.8429 3.10425 14.6388 3.05526C14.4663 3.01385 14.2856 3.00347 14 3.00087M19.9991 9H20.0002M19.9991 9H17.1969C16.079 9 15.5192 9 15.0918 8.78223C14.7155 8.59048 14.4097 8.28392 14.218 7.90759C14 7.47977 14 6.9201 14 5.8V3.00087M9 14L11 16M4 21V18.5L11.5 11L14 13.5L6.5 21H4Z"
                                                                                                stroke="#ffffff"
                                                                                                stroke-width="2"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                            </path>
                                                                                        </g>
                                                                                    </g>
                                                                                </svg>
                                                                                <span class="fw-bold mb-2 responsive-mini">
                                                                                    << Pre Test>
                                                                                        >{{ $materi1->nama_materi }}
                                                                                </span> <span
                                                                                    class="badge rounded-pill text-bg-warning">Belum
                                                                                    Lulus</span>
                                                                                <br>
                                                                                <br>
                                                                                <a href="/kelas/{{ $kelas->id }}/room/{{ $materi1->id }}/pretest-remedial"
                                                                                    class="btn fw-bold bg-warning border-0 text-black"
                                                                                    onclick="return confirm('Sebelum mulai ujian, pastikan perangkat Anda dalam kondisi optimal!')">Remedial
                                                                                    (1x Kesempatan)
                                                                                </a>
                                                                            </div>
                                                                            @foreach ($pretest as $pretest)
                                                                                @if ($pretest->nama_pretest == $materi1->nama_materi)
                                                                                    <div class="col">
                                                                                        <table
                                                                                            class="table table-hover responsive-small  text-white">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <th scope="row">1
                                                                                                    </th>
                                                                                                    <td>Nama Pre Test</td>
                                                                                                    <td>:</td>
                                                                                                    <td>{{ $pretest->nama_pretest }}
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th scope="row">2
                                                                                                    </th>
                                                                                                    <td>Nama Bank Soal</td>
                                                                                                    <td>:</td>
                                                                                                    <td>{{ $pretest->nama_bank }}
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th scope="row">3
                                                                                                    </th>
                                                                                                    <td>Jumlah Soal</td>
                                                                                                    <td>:</td>
                                                                                                    <td>{{ $pretest->jumlah_soal }}
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th scope="row">4
                                                                                                    </th>
                                                                                                    <td>Durasi</td>
                                                                                                    <td>:</td>
                                                                                                    <td>{{ $pretest->durasi }}
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th scope="row">4
                                                                                                    </th>
                                                                                                    <td>Skor</td>
                                                                                                    <td>:</td>
                                                                                                    <td>{{ $skor_pretest->skor }}
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                @endif
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                    <input type="button" name="next-step" class="next-step"
                                                        value="Selanjutnya" />
                                                </fieldset>
                                                <fieldset>
                                                    <div class="d-flex justify-content-center">
                                                        <svg class="justify-content-center" width="64px" height="64px"
                                                            viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                stroke-linejoin="round"></g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <path
                                                                    d="M12 16.99V17M12 7V14M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"
                                                                    stroke="#000000" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                </path>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <h4 class="text-center">Maaf Anda belum menyelesaikan Pre Test</h4>
                                                    </div>
                                                    <input type="button" name="next-step" class="next-step"
                                                        value="Selanjutnya" />
                                                    <input type="button" name="previous-step" class="previous-step"
                                                        value="Sebelumnya" />
                                                </fieldset>
                                                <fieldset>
                                                    <div class="d-flex justify-content-center">
                                                        <svg class="justify-content-center" width="64px" height="64px"
                                                            viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                stroke-linejoin="round"></g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <path
                                                                    d="M12 16.99V17M12 7V14M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"
                                                                    stroke="#000000" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                </path>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <h4 class="text-center">Maaf Anda belum menyelesaikan Pre Test</h4>
                                                    </div>
                                                    <input type="button" name="next-step" class="next-step"
                                                        value="Selanjutnya" />
                                                    <input type="button" name="previous-step" class="previous-step"
                                                        value="Sebelumnya" />
                                                </fieldset>
                                                <fieldset>
                                                    <div class="d-flex justify-content-center">
                                                        <svg class="justify-content-center" width="64px" height="64px"
                                                            viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                stroke-linejoin="round"></g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <path
                                                                    d="M12 16.99V17M12 7V14M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"
                                                                    stroke="#000000" stroke-width="1.5"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                </path>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <h4 class="text-center">Maaf Anda belum menyelesaikan Pre Test</h4>
                                                    </div>
                                                    <input type="button" name="previous-step" class="previous-step"
                                                        value="Sebelumnya" />
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @elseif ($status_pretest->status == 'Lulus' or $status_pretest->status == 'Tidak Lulus')
                                <div class="container">
                                    <div class="row">
                                        <div>
                                            <form id="form">
                                                <ul id="progressbar">
                                                    <li class="active" id="step1">
                                                        <strong>Pre Test</strong>
                                                    </li>
                                                    <li id="step2"><strong>Akses Materi</strong></li>
                                                    <li id="step3"><strong>Post Test</strong></li>
                                                    <li id="step4"><strong>Selesai</strong></li>
                                                </ul>
                                                <div class="progress">
                                                    <div class="progress-bar"></div>
                                                </div> <br>
                                                <fieldset>
                                                    @foreach ($materi as $materi1)
                                                        @if ($materi1->jenis == 'Pre Test')
                                                            <div class="row g-2">
                                                                <div class="col-md-12 col-12">
                                                                    <div class="card bg-success text-white bg-gradient border border-0 p-4 h-100 "
                                                                        data-bss-hover-animate="pulse">
                                                                        <div class="row">
                                                                            <div
                                                                                class="col justify-content-center align-items-center">
                                                                                <svg width="64px" height="64px"
                                                                                    viewBox="0 0 24 24" fill="none"
                                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                                    <g id="SVGRepo_bgCarrier"
                                                                                        stroke-width="0"></g>
                                                                                    <g id="SVGRepo_tracerCarrier"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round">
                                                                                    </g>
                                                                                    <g id="SVGRepo_iconCarrier">
                                                                                        <g id="File / File_Edit">
                                                                                            <path id="Vector"
                                                                                                d="M6 11.0002V6.2002C6 5.08009 6 4.51962 6.21799 4.0918C6.40973 3.71547 6.71547 3.40973 7.0918 3.21799C7.51962 3 8.08009 3 9.2002 3H13.6747C13.7973 3 13.9045 3 14 3.00087M19.9991 9C20 9.09561 20 9.20296 20 9.32568V17.8036C20 18.9215 20 19.4805 19.7822 19.9079C19.5905 20.2842 19.2839 20.5905 18.9076 20.7822C18.4802 21 17.921 21 16.8031 21L13 21M19.9991 9C19.9963 8.71451 19.9857 8.53376 19.9443 8.36133C19.8953 8.15726 19.8142 7.96214 19.7046 7.7832C19.5809 7.58136 19.4089 7.40889 19.063 7.06298L15.9375 3.9375C15.5918 3.59182 15.4186 3.41857 15.2168 3.29492C15.0379 3.18526 14.8429 3.10425 14.6388 3.05526C14.4663 3.01385 14.2856 3.00347 14 3.00087M19.9991 9H20.0002M19.9991 9H17.1969C16.079 9 15.5192 9 15.0918 8.78223C14.7155 8.59048 14.4097 8.28392 14.218 7.90759C14 7.47977 14 6.9201 14 5.8V3.00087M9 14L11 16M4 21V18.5L11.5 11L14 13.5L6.5 21H4Z"
                                                                                                stroke="#ffffff"
                                                                                                stroke-width="2"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                            </path>
                                                                                        </g>
                                                                                    </g>
                                                                                </svg>
                                                                                <span class="fw-bold mb-2 responsive-mini">
                                                                                    << Pre Test>
                                                                                        >{{ $materi1->nama_materi }}
                                                                                </span>
                                                                                @if ($status_pretest->status == 'Lulus')
                                                                                    <span
                                                                                        class="badge rounded-pill text-bg-warning">
                                                                                        Lulus</span>
                                                                                @else
                                                                                    <span
                                                                                        class="badge rounded-pill text-bg-warning">
                                                                                        Tidak Lulus</span>
                                                                                @endif

                                                                                <br>
                                                                                <br>
                                                                            </div>
                                                                            @foreach ($pretest as $pretest)
                                                                                @if ($pretest->nama_pretest == $materi1->nama_materi)
                                                                                    <div class="col">
                                                                                        <table
                                                                                            class="table table-hover responsive-small  text-white">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <th scope="row">1
                                                                                                    </th>
                                                                                                    <td>Nama Pre Test</td>
                                                                                                    <td>:</td>
                                                                                                    <td>{{ $pretest->nama_pretest }}
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th scope="row">2
                                                                                                    </th>
                                                                                                    <td>Nama Bank Soal</td>
                                                                                                    <td>:</td>
                                                                                                    <td>{{ $pretest->nama_bank }}
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th scope="row">3
                                                                                                    </th>
                                                                                                    <td>Jumlah Soal</td>
                                                                                                    <td>:</td>
                                                                                                    <td>{{ $pretest->jumlah_soal }}
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th scope="row">4
                                                                                                    </th>
                                                                                                    <td>Durasi</td>
                                                                                                    <td>:</td>
                                                                                                    <td>{{ $pretest->durasi }}
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th scope="row">4
                                                                                                    </th>
                                                                                                    <td>Skor</td>
                                                                                                    <td>:</td>
                                                                                                    <td>{{ $skor_pretest->skor }}
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                @endif
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                    <input type="button" name="next-step" class="next-step"
                                                        value="Selanjutnya" />
                                                </fieldset>
                                                <fieldset>
                                                    <div class="d-flex">
                                                        <h4 class="card-title fw-semibold responsive-p1 me-3">Daftar Materi
                                                        </h4>
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
                                                                @foreach ($materi as $materi2)
                                                                    @if ($materi2->jenis == 'Materi')
                                                                        <tr>
                                                                            <td>{{ $materi2->nama_materi }}</td>
                                                                            @foreach ($lists as $list)
                                                                                @if ($list->nama_materi == $materi2->nama_materi)
                                                                                    <td>{{ $list->jenis_materi }}</td>
                                                                                    <td>
                                                                                        <a
                                                                                            href="{{ asset('storage/' . $list->materi) }}">Download
                                                                                            Materi
                                                                                        </a>
                                                                                    </td>
                                                                                @endif
                                                                            @endforeach
                                                                            <td>
                                                                                @foreach ($kemajuan_materi as $kemajuan)
                                                                                    @if ($kemajuan->nama_materi == $materi2->nama_materi)
                                                                                        @if ($kemajuan->status == 'Ongoing')
                                                                                            <a href="/kelas/{{ $kelas->id }}/room/{{ $materi2->id }}/done-materi"
                                                                                                class="badge bg-warning border-0 text-black">Tandai
                                                                                                Telah Selesai</a>
                                                                                        @else
                                                                                            <a
                                                                                                class="badge bg-success border-0 text-white">Selesai</a>
                                                                                        @endif
                                                                                    @endif
                                                                                @endforeach
                                                                            </td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <input type="button" name="next-step" class="next-step"
                                                        value="Selanjutnya" />
                                                    <input type="button" name="previous-step" class="previous-step"
                                                        value="Sebelumnya" />
                                                </fieldset>
                                                <fieldset>
                                                    @if (is_null($status_materi))
                                                        @if ($status_posttest->status == 'Ongoing')
                                                            @foreach ($materi as $materi2)
                                                                @if ($materi2->jenis == 'Post Test')
                                                                    <div class="row g-2">
                                                                        <div class="col-md-12 col-12">
                                                                            <div class="card bg-success text-white bg-gradient border border-0 p-4 h-100 "
                                                                                data-bss-hover-animate="pulse">
                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col justify-content-center align-items-center">
                                                                                        <svg width="64px" height="64px"
                                                                                            viewBox="0 0 24 24"
                                                                                            fill="none"
                                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                                            <g id="SVGRepo_bgCarrier"
                                                                                                stroke-width="0"></g>
                                                                                            <g id="SVGRepo_tracerCarrier"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                            </g>
                                                                                            <g id="SVGRepo_iconCarrier">
                                                                                                <g id="File / File_Edit">
                                                                                                    <path id="Vector"
                                                                                                        d="M6 11.0002V6.2002C6 5.08009 6 4.51962 6.21799 4.0918C6.40973 3.71547 6.71547 3.40973 7.0918 3.21799C7.51962 3 8.08009 3 9.2002 3H13.6747C13.7973 3 13.9045 3 14 3.00087M19.9991 9C20 9.09561 20 9.20296 20 9.32568V17.8036C20 18.9215 20 19.4805 19.7822 19.9079C19.5905 20.2842 19.2839 20.5905 18.9076 20.7822C18.4802 21 17.921 21 16.8031 21L13 21M19.9991 9C19.9963 8.71451 19.9857 8.53376 19.9443 8.36133C19.8953 8.15726 19.8142 7.96214 19.7046 7.7832C19.5809 7.58136 19.4089 7.40889 19.063 7.06298L15.9375 3.9375C15.5918 3.59182 15.4186 3.41857 15.2168 3.29492C15.0379 3.18526 14.8429 3.10425 14.6388 3.05526C14.4663 3.01385 14.2856 3.00347 14 3.00087M19.9991 9H20.0002M19.9991 9H17.1969C16.079 9 15.5192 9 15.0918 8.78223C14.7155 8.59048 14.4097 8.28392 14.218 7.90759C14 7.47977 14 6.9201 14 5.8V3.00087M9 14L11 16M4 21V18.5L11.5 11L14 13.5L6.5 21H4Z"
                                                                                                        stroke="#ffffff"
                                                                                                        stroke-width="2"
                                                                                                        stroke-linecap="round"
                                                                                                        stroke-linejoin="round">
                                                                                                    </path>
                                                                                                </g>
                                                                                            </g>
                                                                                        </svg>
                                                                                        <span
                                                                                            class="fw-bold mb-2 responsive-mini">
                                                                                            << Post Test>
                                                                                                >{{ $materi2->nama_materi }}
                                                                                        </span> <span
                                                                                            class="badge rounded-pill text-bg-warning">Belum
                                                                                            Selesai</span>
                                                                                        <br>
                                                                                        <br>
                                                                                        <a href="/kelas/{{ $kelas->id }}/room/{{ $materi2->id }}/posttest"
                                                                                            class="btn fw-bold bg-warning border-0 text-black"
                                                                                            onclick="return confirm('Sebelum mulai ujian, pastikan perangkat Anda dalam kondisi optimal!')">Kerjakan
                                                                                            Ujian</a>
                                                                                    </div>
                                                                                    @foreach ($posttest as $posttest)
                                                                                        @if ($posttest->nama_posttest == $materi2->nama_materi)
                                                                                            <div class="col">
                                                                                                <table
                                                                                                    class="table table-hover responsive-small  text-white">
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <th
                                                                                                                scope="row">
                                                                                                                1
                                                                                                            </th>
                                                                                                            <td>Nama Pre
                                                                                                                Test</td>
                                                                                                            <td>:</td>
                                                                                                            <td>{{ $posttest->nama_posttest }}
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <th
                                                                                                                scope="row">
                                                                                                                2
                                                                                                            </th>
                                                                                                            <td>Nama Bank
                                                                                                                Soal</td>
                                                                                                            <td>:</td>
                                                                                                            <td>{{ $posttest->nama_bank }}
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <th
                                                                                                                scope="row">
                                                                                                                3
                                                                                                            </th>
                                                                                                            <td>Jumlah Soal
                                                                                                            </td>
                                                                                                            <td>:</td>
                                                                                                            <td>{{ $posttest->jumlah_soal }}
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <th
                                                                                                                scope="row">
                                                                                                                4
                                                                                                            </th>
                                                                                                            <td>Durasi</td>
                                                                                                            <td>:</td>
                                                                                                            <td>{{ $posttest->durasi }}
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <th
                                                                                                                scope="row">
                                                                                                                4
                                                                                                            </th>
                                                                                                            <td>Skor</td>
                                                                                                            <td>:</td>
                                                                                                            <td>Belum
                                                                                                                Dikerjakan
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </div>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        @elseif ($status_posttest->status == 'Lulus' or $status_posttest->status == 'Tidak Lulus')
                                                            @foreach ($materi as $materi2)
                                                                @if ($materi2->jenis == 'Post Test')
                                                                    <div class="row g-2">
                                                                        <div class="col-md-12 col-12">
                                                                            <div class="card bg-success text-white bg-gradient border border-0 p-4 h-100 "
                                                                                data-bss-hover-animate="pulse">
                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col justify-content-center align-items-center">
                                                                                        <svg width="64px" height="64px"
                                                                                            viewBox="0 0 24 24"
                                                                                            fill="none"
                                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                                            <g id="SVGRepo_bgCarrier"
                                                                                                stroke-width="0"></g>
                                                                                            <g id="SVGRepo_tracerCarrier"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                            </g>
                                                                                            <g id="SVGRepo_iconCarrier">
                                                                                                <g id="File / File_Edit">
                                                                                                    <path id="Vector"
                                                                                                        d="M6 11.0002V6.2002C6 5.08009 6 4.51962 6.21799 4.0918C6.40973 3.71547 6.71547 3.40973 7.0918 3.21799C7.51962 3 8.08009 3 9.2002 3H13.6747C13.7973 3 13.9045 3 14 3.00087M19.9991 9C20 9.09561 20 9.20296 20 9.32568V17.8036C20 18.9215 20 19.4805 19.7822 19.9079C19.5905 20.2842 19.2839 20.5905 18.9076 20.7822C18.4802 21 17.921 21 16.8031 21L13 21M19.9991 9C19.9963 8.71451 19.9857 8.53376 19.9443 8.36133C19.8953 8.15726 19.8142 7.96214 19.7046 7.7832C19.5809 7.58136 19.4089 7.40889 19.063 7.06298L15.9375 3.9375C15.5918 3.59182 15.4186 3.41857 15.2168 3.29492C15.0379 3.18526 14.8429 3.10425 14.6388 3.05526C14.4663 3.01385 14.2856 3.00347 14 3.00087M19.9991 9H20.0002M19.9991 9H17.1969C16.079 9 15.5192 9 15.0918 8.78223C14.7155 8.59048 14.4097 8.28392 14.218 7.90759C14 7.47977 14 6.9201 14 5.8V3.00087M9 14L11 16M4 21V18.5L11.5 11L14 13.5L6.5 21H4Z"
                                                                                                        stroke="#ffffff"
                                                                                                        stroke-width="2"
                                                                                                        stroke-linecap="round"
                                                                                                        stroke-linejoin="round">
                                                                                                    </path>
                                                                                                </g>
                                                                                            </g>
                                                                                        </svg>
                                                                                        <span
                                                                                            class="fw-bold mb-2 responsive-mini">
                                                                                            << Post Test>
                                                                                                >{{ $materi2->nama_materi }}
                                                                                        </span>
                                                                                        @if ($status_posttest->status == 'Lulus')
                                                                                            <span
                                                                                                class="badge rounded-pill text-bg-warning">
                                                                                                Lulus</span>
                                                                                        @else
                                                                                            <span
                                                                                                class="badge rounded-pill text-bg-warning">
                                                                                                Tidak Lulus</span>
                                                                                        @endif
                                                                                        <br>
                                                                                        <br>

                                                                                    </div>
                                                                                    @foreach ($posttest as $posttest)
                                                                                        @if ($posttest->nama_posttest == $materi2->nama_materi)
                                                                                            <div class="col">
                                                                                                <table
                                                                                                    class="table table-hover responsive-small  text-white">
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <th
                                                                                                                scope="row">
                                                                                                                1
                                                                                                            </th>
                                                                                                            <td>Nama Post
                                                                                                                Test</td>
                                                                                                            <td>:</td>
                                                                                                            <td>{{ $posttest->nama_posttest }}
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <th
                                                                                                                scope="row">
                                                                                                                2
                                                                                                            </th>
                                                                                                            <td>Nama Bank
                                                                                                                Soal</td>
                                                                                                            <td>:</td>
                                                                                                            <td>{{ $posttest->nama_bank }}
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <th
                                                                                                                scope="row">
                                                                                                                3
                                                                                                            </th>
                                                                                                            <td>Jumlah Soal
                                                                                                            </td>
                                                                                                            <td>:</td>
                                                                                                            <td>{{ $posttest->jumlah_soal }}
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <th
                                                                                                                scope="row">
                                                                                                                4
                                                                                                            </th>
                                                                                                            <td>Durasi</td>
                                                                                                            <td>:</td>
                                                                                                            <td>{{ $posttest->durasi }}
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <th
                                                                                                                scope="row">
                                                                                                                4
                                                                                                            </th>
                                                                                                            <td>Skor</td>
                                                                                                            <td>:</td>
                                                                                                            <td>{{ $skor_posttest->skor }}
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </div>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        @elseif ($status_posttest->status == 'Belum Lulus')
                                                            @foreach ($materi as $materi2)
                                                                @if ($materi2->jenis == 'Post Test')
                                                                    <div class="row g-2">
                                                                        <div class="col-md-12 col-12">
                                                                            <div class="card bg-success text-white bg-gradient border border-0 p-4 h-100 "
                                                                                data-bss-hover-animate="pulse">
                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col justify-content-center align-items-center">
                                                                                        <svg width="64px" height="64px"
                                                                                            viewBox="0 0 24 24"
                                                                                            fill="none"
                                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                                            <g id="SVGRepo_bgCarrier"
                                                                                                stroke-width="0"></g>
                                                                                            <g id="SVGRepo_tracerCarrier"
                                                                                                stroke-linecap="round"
                                                                                                stroke-linejoin="round">
                                                                                            </g>
                                                                                            <g id="SVGRepo_iconCarrier">
                                                                                                <g id="File / File_Edit">
                                                                                                    <path id="Vector"
                                                                                                        d="M6 11.0002V6.2002C6 5.08009 6 4.51962 6.21799 4.0918C6.40973 3.71547 6.71547 3.40973 7.0918 3.21799C7.51962 3 8.08009 3 9.2002 3H13.6747C13.7973 3 13.9045 3 14 3.00087M19.9991 9C20 9.09561 20 9.20296 20 9.32568V17.8036C20 18.9215 20 19.4805 19.7822 19.9079C19.5905 20.2842 19.2839 20.5905 18.9076 20.7822C18.4802 21 17.921 21 16.8031 21L13 21M19.9991 9C19.9963 8.71451 19.9857 8.53376 19.9443 8.36133C19.8953 8.15726 19.8142 7.96214 19.7046 7.7832C19.5809 7.58136 19.4089 7.40889 19.063 7.06298L15.9375 3.9375C15.5918 3.59182 15.4186 3.41857 15.2168 3.29492C15.0379 3.18526 14.8429 3.10425 14.6388 3.05526C14.4663 3.01385 14.2856 3.00347 14 3.00087M19.9991 9H20.0002M19.9991 9H17.1969C16.079 9 15.5192 9 15.0918 8.78223C14.7155 8.59048 14.4097 8.28392 14.218 7.90759C14 7.47977 14 6.9201 14 5.8V3.00087M9 14L11 16M4 21V18.5L11.5 11L14 13.5L6.5 21H4Z"
                                                                                                        stroke="#ffffff"
                                                                                                        stroke-width="2"
                                                                                                        stroke-linecap="round"
                                                                                                        stroke-linejoin="round">
                                                                                                    </path>
                                                                                                </g>
                                                                                            </g>
                                                                                        </svg>
                                                                                        <span
                                                                                            class="fw-bold mb-2 responsive-mini">
                                                                                            << Post Test>
                                                                                                >{{ $materi2->nama_materi }}
                                                                                        </span> <span
                                                                                            class="badge rounded-pill text-bg-warning">Belum
                                                                                            Lulus</span>
                                                                                        <br>
                                                                                        <br>
                                                                                        <a href="/kelas/{{ $kelas->id }}/room/{{ $materi2->id }}/posttest-remedial"
                                                                                            class="btn fw-bold bg-warning border-0 text-black"
                                                                                            onclick="return confirm('Sebelum mulai ujian, pastikan perangkat Anda dalam kondisi optimal!')">Remedial
                                                                                            (1x Kesempatan)
                                                                                        </a>
                                                                                    </div>
                                                                                    @foreach ($posttest as $posttest)
                                                                                        @if ($posttest->nama_posttest == $materi2->nama_materi)
                                                                                            <div class="col">
                                                                                                <table
                                                                                                    class="table table-hover responsive-small  text-white">
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <th
                                                                                                                scope="row">
                                                                                                                1
                                                                                                            </th>
                                                                                                            <td>Nama Post
                                                                                                                Test</td>
                                                                                                            <td>:</td>
                                                                                                            <td>{{ $posttest->nama_posttest }}
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <th
                                                                                                                scope="row">
                                                                                                                2
                                                                                                            </th>
                                                                                                            <td>Nama Bank
                                                                                                                Soal</td>
                                                                                                            <td>:</td>
                                                                                                            <td>{{ $posttest->nama_bank }}
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <th
                                                                                                                scope="row">
                                                                                                                3
                                                                                                            </th>
                                                                                                            <td>Jumlah Soal
                                                                                                            </td>
                                                                                                            <td>:</td>
                                                                                                            <td>{{ $posttest->jumlah_soal }}
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <th
                                                                                                                scope="row">
                                                                                                                4
                                                                                                            </th>
                                                                                                            <td>Durasi</td>
                                                                                                            <td>:</td>
                                                                                                            <td>{{ $posttest->durasi }}
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <th
                                                                                                                scope="row">
                                                                                                                4
                                                                                                            </th>
                                                                                                            <td>Skor</td>
                                                                                                            <td>:</td>
                                                                                                            <td>{{ $skor_posttest->skor }}
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </div>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @else
                                                        <div class="d-flex justify-content-center">
                                                            <svg class="justify-content-center" width="64px"
                                                                height="64px" viewBox="0 0 24 24" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                    stroke-linejoin="round"></g>
                                                                <g id="SVGRepo_iconCarrier">
                                                                    <path
                                                                        d="M12 16.99V17M12 7V14M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"
                                                                        stroke="#000000" stroke-width="1.5"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                    </path>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div>
                                                            <h4 class="text-center">Maaf Anda belum menyelesaikan Materi
                                                            </h4>
                                                        </div>
                                                    @endif
                                                    <input type="button" name="next-step" class="next-step"
                                                        value="Selanjutnya" />
                                                    <input type="button" name="previous-step" class="previous-step"
                                                        value="Sebelumnya" />
                                                </fieldset>
                                                <fieldset>
                                                    @if ($status_posttest->status == 'Ongoing' or $status_posttest->status == 'Belum Lulus')
                                                        <div class="d-flex justify-content-center">
                                                            <svg class="justify-content-center" width="64px"
                                                                height="64px" viewBox="0 0 24 24" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                    stroke-linejoin="round"></g>
                                                                <g id="SVGRepo_iconCarrier">
                                                                    <path
                                                                        d="M12 16.99V17M12 7V14M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"
                                                                        stroke="#000000" stroke-width="1.5"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                    </path>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div>
                                                            <h4 class="text-center">Maaf Anda belum menyelesaikan Post Test
                                                            </h4>
                                                        </div>
                                                    @else
                                                        <div class="d-flex justify-content-center">
                                                            <svg width="128px" height="128px" viewBox="0 0 48 48"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                    stroke-linejoin="round"></g>
                                                                <g id="SVGRepo_iconCarrier">
                                                                    <rect width="48" height="48" fill="white"
                                                                        fill-opacity="0.01"></rect>
                                                                    <path
                                                                        d="M24 4L29.2533 7.83204L35.7557 7.81966L37.7533 14.0077L43.0211 17.8197L41 24L43.0211 30.1803L37.7533 33.9923L35.7557 40.1803L29.2533 40.168L24 44L18.7467 40.168L12.2443 40.1803L10.2467 33.9923L4.97887 30.1803L7 24L4.97887 17.8197L10.2467 14.0077L12.2443 7.81966L18.7467 7.83204L24 4Z"
                                                                        fill="#2F88FF" stroke="#000000" stroke-width="4"
                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                    </path>
                                                                    <path d="M17 24L22 29L32 19" stroke="white"
                                                                        stroke-width="4" stroke-linecap="round"
                                                                        stroke-linejoin="round"></path>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div>
                                                            <h4 class="text-center">Selamat Anda telah menyelesaikan kelas
                                                                {{ $kelas->nama_modul }}
                                                            </h4>
                                                        </div>
                                                        <div class="d-flex justify-content-center"> <a
                                                                href="/kelas/{{ $kelas->id }}/room/{{ $materi1->id }}/pretest"
                                                                class="btn btn-lg fw-bold bg-warning border-0 text-black">Buat
                                                                Sertifikat Sekarang</a></div>
                                                    @endif
                                                    <input type="button" name="previous-step" class="previous-step"
                                                        value="Sebelumnya" />
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            var currentGfgStep, nextGfgStep, previousGfgStep;
            var opacity;
            var current = 1;
            var steps = $("fieldset").length;

            setProgressBar(current);

            $(".next-step").click(function() {

                currentGfgStep = $(this).parent();
                nextGfgStep = $(this).parent().next();

                $("#progressbar li").eq($("fieldset")
                    .index(nextGfgStep)).addClass("active");

                nextGfgStep.show();
                currentGfgStep.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        opacity = 1 - now;

                        currentGfgStep.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        nextGfgStep.css({
                            'opacity': opacity
                        });
                    },
                    duration: 500
                });
                setProgressBar(++current);
            });

            $(".previous-step").click(function() {

                currentGfgStep = $(this).parent();
                previousGfgStep = $(this).parent().prev();

                $("#progressbar li").eq($("fieldset")
                    .index(currentGfgStep)).removeClass("active");

                previousGfgStep.show();

                currentGfgStep.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        opacity = 1 - now;

                        currentGfgStep.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        previousGfgStep.css({
                            'opacity': opacity
                        });
                    },
                    duration: 500
                });
                setProgressBar(--current);
            });

            function setProgressBar(currentStep) {
                var percent = parseFloat(100 / steps) * current;
                percent = percent.toFixed();
                $(".progress-bar")
                    .css("width", percent + "%")
            }

            $(".submit").click(function() {
                return false;
            })
        });
    </script>
@endsection
