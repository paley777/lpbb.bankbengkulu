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
                            <li class="breadcrumb-item active" aria-current="page">Preview</li>
                        </ol>
                    </nav>
                    <div class="card text-bg-success bg-gradient mb-3 bg-opacity-100">
                        <div class="card-header fw-semibold">Dashboard Learning Program Bank Bengkulu</div>
                        <div class="card-body">
                            <h4 class=" responsive-p1 fw-semibold mb-3">{{ $kelas->nama_modul }}</h4>
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
                                <h4 class="card-title fw-semibold responsive-p1 me-3">Informasi Kelas</h4>
                                <h4 class="card-title fw-normal fst-italic me-3">Anda belum mendaftar kelas, silakan daftar.
                                </h4>
                                <a class="btn btn-warning fw-semibold  ms-auto" type="button"
                                    data-bss-hover-animate="tada">Mendaftar ke Kelas
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
                            <div class="row g-2" style="display:flex;">
                                <div class="col-md-8 col-12">
                                    <div class="card bg-success text-white bg-gradient border border-0 p-4 h-100"
                                        style="color: rgb(0,0,0);background: var(--bs-yellow);"
                                        data-bss-hover-animate="pulse">
                                        <svg fill="#ffffff" width="64px" height="64px" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M22.838,1.455A1,1,0,0,0,22,1H16a1,1,0,0,0-.895.553L12,7.764,8.9,1.553A1,1,0,0,0,8,1H2a1,1,0,0,0-.914,1.406L5.739,12.889A6.937,6.937,0,0,0,5,16a7,7,0,0,0,14,0,6.937,6.937,0,0,0-.739-3.111L22.914,2.406A1,1,0,0,0,22.838,1.455ZM3.538,3H7.382l3.087,6.174A6.991,6.991,0,0,0,7.1,11.014ZM12,21a5,5,0,1,1,5-5A5.006,5.006,0,0,1,12,21Zm4.905-9.986a6.991,6.991,0,0,0-3.374-1.84L16.618,3h3.844ZM15,15.292l-1.667,1.375L13.854,19,12,17.667,10.146,19l.521-2.333L9,15.292,11,15l1-2,1,2Z">
                                                </path>
                                            </g>
                                        </svg>
                                        <span class="fw-bold mb-2 responsive-mini">Deskripsi</span>
                                        <h4 class="fw-semibold">{{ $kelas->deskripsi }}</h4>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="card bg-success text-white bg-gradient border border-0 p-4 h-100"
                                        data-bss-hover-animate="pulse">
                                        <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM11.8284 6.75736C12.3807 6.75736 12.8284 7.20507 12.8284 7.75736V12.7245L16.3553 14.0653C16.8716 14.2615 17.131 14.8391 16.9347 15.3553C16.7385 15.8716 16.1609 16.131 15.6447 15.9347L11.4731 14.349C11.085 14.2014 10.8284 13.8294 10.8284 13.4142V7.75736C10.8284 7.20507 11.2761 6.75736 11.8284 6.75736Z"
                                                    fill="#ffffff"></path>
                                            </g>
                                        </svg>
                                        <span class="fw-bold mb-2 responsive-mini">Jangka Waktu</span>
                                        <h3 class="fw-semibold responsive-small"><span
                                                class="badge rounded-pill text-bg-warning">{{ $kelas->date_start }}</span>
                                            hingga
                                            <span class="badge rounded-pill text-bg-warning">{{ $kelas->date_end }}</span>

                                    </div>
                                </div>
                                <hr>
                                <div class="col-md-2 col-12">
                                    <div class="card bg-success text-white bg-gradient border border-0 p-4 h-100"
                                        data-bss-hover-animate="pulse">
                                        <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
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
                                        <span class="fw-bold mb-2 responsive-mini">Pre Test</span>
                                        <h3 class="fw-semibold responsive-small"><span
                                                class="badge rounded-pill text-bg-warning">{{ $jumlahsoal_pretest->jumlah_soal }}
                                                Soal</span>
                                            <span
                                                class="badge rounded-pill text-bg-warning">{{ $durasi_pretest->durasi }}</span>
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-md-2 col-12">
                                    <div class="card bg-success text-white bg-gradient border border-0 p-4 h-100"
                                        style="color: rgb(0,0,0);background: var(--bs-yellow);"
                                        data-bss-hover-animate="pulse">
                                        <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
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
                                        <span class="fw-bold mb-2 responsive-mini">Post Test</span>
                                        <h3 class="fw-semibold responsive-small"><span
                                                class="badge rounded-pill text-bg-warning">{{ $jumlahsoal_posttest->jumlah_soal }}
                                                Soal</span>
                                            <span
                                                class="badge rounded-pill text-bg-warning">{{ $durasi_posttest->durasi }}</span>
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-md-2 col-12">
                                    <div class="card bg-success text-white bg-gradient border border-0 p-4 h-100"
                                        data-bss-hover-animate="pulse">
                                        <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M15.7583 0.750097C16.4689 0.745795 17.1729 0.884287 17.8293 1.15715C18.4858 1.42999 19.0812 1.83157 19.5815 2.33783C20.0817 2.84407 20.4769 3.44493 20.7449 4.10519C21.0129 4.76543 21.1485 5.47241 21.1443 6.1853C21.1401 6.89819 20.9961 7.60349 20.7203 8.26045C20.4455 8.9151 20.045 9.50922 19.5412 10.0082L11.4822 18.1524L11.4754 18.159C10.8671 18.7555 10.0857 19.2189 9.15886 19.2373C8.21636 19.2561 7.39193 18.8102 6.72174 18.1381C5.91136 17.3254 5.68571 16.3423 5.80354 15.4664C5.91409 14.6445 6.31945 13.93 6.76671 13.4628L6.77354 13.4557L13.2747 6.87675C13.5658 6.58212 14.0407 6.5793 14.3353 6.87044L15.0466 7.57333C15.3413 7.86448 15.3441 8.33934 15.0529 8.63397L8.56738 15.1971C8.44404 15.3286 8.3128 15.5649 8.28123 15.7997C8.26687 15.9064 8.27488 15.9977 8.29992 16.0775C8.32376 16.1535 8.37372 16.2542 8.49207 16.3729C8.83879 16.7206 9.04311 16.7391 9.10912 16.7378C9.19021 16.7362 9.39502 16.6956 9.71903 16.3799L17.7739 8.23989L17.779 8.23486C18.0499 7.96733 18.2664 7.64724 18.4152 7.29271C18.5641 6.93816 18.6421 6.55669 18.6444 6.17052C18.6467 5.78436 18.5731 5.40188 18.4285 5.0454C18.2838 4.68895 18.071 4.36605 17.8032 4.09506C17.5355 3.8241 17.2181 3.61043 16.8698 3.46567C16.5216 3.32093 16.149 3.24778 15.7735 3.25005C15.398 3.25232 15.0263 3.32999 14.6798 3.47893C14.3334 3.62789 14.0186 3.84538 13.7542 4.11955L13.7489 4.12501L5.63139 12.3396L5.62494 12.346C5.19479 12.7689 4.8512 13.2749 4.61488 13.835C4.37855 14.3952 4.25443 14.9979 4.25012 15.608C4.24581 16.2181 4.3614 16.8226 4.58984 17.3864C4.7994 17.9036 5.31873 18.6255 5.78425 19.0965C6.26632 19.5844 7.0868 20.2047 7.57895 20.409C8.13199 20.6385 8.72402 20.7542 9.32077 20.7499C9.91752 20.7456 10.5078 20.6213 11.0575 20.3838C11.6072 20.1463 12.1057 19.8002 12.5237 19.3648L12.5299 19.3583L20.4623 11.331C20.7535 11.0363 21.2283 11.0335 21.523 11.3247L22.2343 12.0276C22.5289 12.3187 22.5317 12.7936 22.2406 13.0882L14.3206 21.103C13.6745 21.7742 12.9026 22.31 12.049 22.6788C11.1924 23.0488 10.2712 23.2431 9.33887 23.2498C8.40657 23.2566 7.48259 23.0757 6.62078 22.7181C5.69809 22.3352 4.60526 21.4602 4.00601 20.8538C3.39021 20.2306 2.64342 19.2398 2.27283 18.3252C1.9211 17.4572 1.74356 16.5276 1.75018 15.5903C1.7568 14.6531 1.94746 13.7261 2.31147 12.8633C2.67425 12.0034 3.20221 11.2237 3.86555 10.5699L11.9603 2.37823C12.4533 1.86865 13.0418 1.46191 13.6924 1.1822C14.3455 0.901404 15.0478 0.754399 15.7583 0.750097Z"
                                                    fill="#ffffff"></path>
                                            </g>
                                        </svg>
                                        <span class="fw-bold mb-2 responsive-mini">Materi</span>
                                        <h3 class="fw-semibold responsive-small"> <span
                                                class="badge rounded-pill text-bg-warning">{{ $jumlah_materi }}
                                                Berkas</span></h3>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="card bg-success text-white bg-gradient border border-0 p-4 h-100"
                                        data-bss-hover-animate="pulse">
                                        <svg width="64px" height="64px" viewBox="0 0 16 16"
                                            xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path fill="#ffffff"
                                                    d="M14.9547098,7.98576084 L15.0711,7.99552 C15.6179,8.07328 15.9981,8.57957 15.9204,9.12636 C15.6826,10.7983 14.9218,12.3522 13.747,13.5654 C12.5721,14.7785 11.0435,15.5888 9.37999,15.8801 C7.7165,16.1714 6.00349,15.9288 4.48631,15.187 C3.77335,14.8385 3.12082,14.3881 2.5472,13.8537 L1.70711,14.6938 C1.07714,15.3238 3.55271368e-15,14.8776 3.55271368e-15,13.9867 L3.55271368e-15,9.99998 L3.98673,9.99998 C4.87763,9.99998 5.3238,11.0771 4.69383,11.7071 L3.9626,12.4383 C4.38006,12.8181 4.85153,13.1394 5.36475,13.3903 C6.50264,13.9466 7.78739,14.1285 9.03501,13.9101 C10.2826,13.6916 11.4291,13.0839 12.3102,12.174 C13.1914,11.2641 13.762,10.0988 13.9403,8.84476 C14.0181,8.29798 14.5244,7.91776 15.0711,7.99552 L14.9547098,7.98576084 Z M11.5137,0.812976 C12.2279,1.16215 12.8814,1.61349 13.4558,2.14905 L14.2929,1.31193 C14.9229,0.681961 16,1.12813 16,2.01904 L16,6.00001 L12.019,6.00001 C11.1281,6.00001 10.6819,4.92287 11.3119,4.29291 L12.0404,3.56441 C11.6222,3.18346 11.1497,2.86125 10.6353,2.60973 C9.49736,2.05342 8.21261,1.87146 6.96499,2.08994 C5.71737,2.30841 4.57089,2.91611 3.68976,3.82599 C2.80862,4.73586 2.23802,5.90125 2.05969,7.15524 C1.98193,7.70202 1.47564,8.08224 0.928858,8.00448 C0.382075,7.92672 0.00185585,7.42043 0.0796146,6.87364 C0.31739,5.20166 1.07818,3.64782 2.25303,2.43465 C3.42788,1.22148 4.95652,0.411217 6.62001,0.119916 C8.2835,-0.171384 9.99651,0.0712178 11.5137,0.812976 Z">
                                                </path>
                                            </g>
                                        </svg>
                                        <span class="fw-semibold mb-2 responsive-mini">Kesempatan Remedial</span>
                                        <h3 class="fw-bold responsive-small"> <span
                                                class="badge rounded-pill text-bg-warning">Maksimal 1 kali (Bagi di bawah
                                                70)</span></h3>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="card bg-success text-white bg-gradient border border-0 p-4 h-100"
                                        data-bss-hover-animate="pulse">
                                        <svg width="64px" height="64px" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <g id="Interface / Check_Big">
                                                    <path id="Vector" d="M4 12L8.94975 16.9497L19.5572 6.34326"
                                                        stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </g>
                                            </g>
                                        </svg>
                                        <span class="fw-semibold mb-2 responsive-mini">Syarat Kelulusan Ujian</span>
                                        <h3 class="fw-bold responsive-small"> <span
                                                class="badge rounded-pill text-bg-warning">Skor 70 (Post Test)</span></h3>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            {{-- <table class="table table-hover responsive-small">
                                <tbody>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Deskripsi</td>
                                        <td>:</td>
                                        <td style="text-align: justify;">{{ $kelas->deskripsi }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Pre Test</td>
                                        <td>:</td>
                                        <td style="text-align: justify;">Ada, 10 Soal dengan durasi 00.10.00</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>Materi</td>
                                        <td>:</td>
                                        <td style="text-align: justify;">Ada, 2 Berkas</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">5</th>
                                        <td>Post Test</td>
                                        <td>:</td>
                                        <td style="text-align: justify;">Ada, 10 Soal dengan durasi 00.10.00</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">6</th>
                                        <td>Syarat Kelulusan Ujian</td>
                                        <td>:</td>
                                        <td style="text-align: justify;">Skor 70 (Post Test)</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">7</th>
                                        <td>Kesempatan Remedial</td>
                                        <td>:</td>
                                        <td style="text-align: justify;">Maksimal 1 kali (Bagi di bawah 70)</td>
                                    </tr>
                                </tbody>
                            </table> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        </script>
    @endsection
