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
                            <h4 class=" responsive-p1 fw-semibold mb-3">Welcome back, {{ Auth()->user()->name }}!</h4>
                            <h5 class="fw-semibold">
                                <span class="badge badge-lg rounded-pill text-bg-warning">
                                    <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M6.07194 6.26794L6.57194 5.40192L6.07194 6.26794ZM4.70592 6.63397L3.83989 6.13397L3.83989 6.13397L4.70592 6.63397ZM3.70592 8.36602L2.83989 7.86602H2.83989L3.70592 8.36602ZM4.07194 9.73205L3.57194 10.5981H3.57194L4.07194 9.73205ZM4.07194 14.2679L3.57194 13.4019H3.57194L4.07194 14.2679ZM3.70592 15.634L4.57194 15.134H4.57194L3.70592 15.634ZM4.70592 17.366L3.83989 17.866H3.83989L4.70592 17.366ZM6.07194 17.732L6.57194 18.5981L6.07194 17.732ZM17.9284 17.732L17.4283 18.5981L17.4284 18.5981L17.9284 17.732ZM19.2944 17.366L18.4284 16.866L19.2944 17.366ZM20.2944 15.634L21.1604 16.134L20.2944 15.634ZM19.9284 14.2679L19.4284 15.134V15.134L19.9284 14.2679ZM19.9284 9.73205L20.4284 10.5981V10.5981L19.9284 9.73205ZM20.2944 8.36602L19.4284 8.86602L19.4284 8.86602L20.2944 8.36602ZM19.2944 6.63397L18.4284 7.13397L19.2944 6.63397ZM17.9284 6.26794L18.4284 7.13397L17.9284 6.26794ZM14.6514 6.61604L14.2089 7.51283L14.6514 6.61604ZM16.5119 7.08573L17.0119 7.95175L16.5119 7.08573ZM15.336 7.01204L14.7793 7.84277L15.336 7.01204ZM17.9873 11.6035L16.9894 11.6686L17.9873 11.6035ZM18.5118 10.5499L18.0118 9.68388L18.5118 10.5499ZM15.336 16.988L14.7793 16.1572L15.336 16.988ZM16.5119 16.9143L16.0119 17.7803L16.5119 16.9143ZM18.5118 13.4501L18.0118 14.3161L18.5118 13.4501ZM9.34892 17.384L9.79137 16.4872L9.34892 17.384ZM7.48838 16.9143L6.98838 16.0482L7.48838 16.9143ZM8.6643 16.988L8.10763 17.8187L8.6643 16.988ZM14.6514 17.384L15.0938 18.2808L14.6514 17.384ZM5.48852 10.5499L4.98852 11.4159L5.48852 10.5499ZM6.01304 11.6035L5.01516 11.5385L6.01304 11.6035ZM7.48839 7.08573L6.98839 7.95176L7.48839 7.08573ZM11.0001 4V4V2C9.89558 2 9.00015 2.89543 9.00015 4H11.0001ZM11.0001 5.63424V4H9.00015V5.63424H11.0001ZM9.22099 7.84277C9.40312 7.72073 9.59361 7.6104 9.79137 7.51283L8.90647 5.71924C8.62922 5.85603 8.36245 6.01056 8.10764 6.18131L9.22099 7.84277ZM5.57194 7.13397L6.98839 7.95176L7.98839 6.2197L6.57194 5.40192L5.57194 7.13397ZM5.57194 7.13397L6.57194 5.40192C5.61536 4.84963 4.39218 5.17738 3.83989 6.13397L5.57194 7.13397ZM4.57194 8.86602L5.57194 7.13397L3.83989 6.13397L2.83989 7.86602L4.57194 8.86602ZM4.57194 8.86602L4.57194 8.86602L2.83989 7.86602C2.28761 8.82261 2.61536 10.0458 3.57194 10.5981L4.57194 8.86602ZM5.98852 9.68388L4.57194 8.86602L3.57194 10.5981L4.98852 11.4159L5.98852 9.68388ZM7.00015 12C7.00015 11.8885 7.00378 11.778 7.01092 11.6686L5.01516 11.5385C5.0052 11.6912 5.00015 11.8451 5.00015 12H7.00015ZM7.01092 12.3314C7.00378 12.222 7.00015 12.1115 7.00015 12H5.00015C5.00015 12.1549 5.0052 12.3088 5.01516 12.4615L7.01092 12.3314ZM4.57194 15.134L5.98852 14.3161L4.98852 12.5841L3.57194 13.4019L4.57194 15.134ZM4.57194 15.134L4.57194 15.134L3.57194 13.4019C2.61536 13.9542 2.28761 15.1774 2.83989 16.134L4.57194 15.134ZM5.57194 16.866L4.57194 15.134L2.83989 16.134L3.83989 17.866L5.57194 16.866ZM5.57194 16.866L5.57194 16.866L3.83989 17.866C4.39218 18.8226 5.61536 19.1504 6.57194 18.5981L5.57194 16.866ZM6.98838 16.0482L5.57194 16.866L6.57194 18.5981L7.98838 17.7803L6.98838 16.0482ZM9.79137 16.4872C9.59361 16.3896 9.40312 16.2793 9.22098 16.1572L8.10763 17.8187C8.36245 17.9894 8.62922 18.144 8.90647 18.2808L9.79137 16.4872ZM11.0001 20V18.3658H9.00015V20H11.0001ZM11.0001 20H9.00015C9.00015 21.1046 9.89558 22 11.0001 22V20ZM13.0001 20H11.0001V22H13.0001V20ZM13.0001 20V22C14.1047 22 15.0001 21.1046 15.0001 20H13.0001ZM13.0001 18.3658V20H15.0001V18.3658H13.0001ZM14.7793 16.1572C14.5972 16.2793 14.4067 16.3896 14.2089 16.4872L15.0938 18.2808C15.3711 18.144 15.6378 17.9894 15.8927 17.8187L14.7793 16.1572ZM18.4284 16.866L17.0119 16.0482L16.0119 17.7803L17.4283 18.5981L18.4284 16.866ZM18.4284 16.866H18.4283L17.4284 18.5981C18.3849 19.1504 19.6081 18.8226 20.1604 17.866L18.4284 16.866ZM19.4284 15.134L18.4284 16.866L20.1604 17.866L21.1604 16.134L19.4284 15.134ZM19.4284 15.134V15.134L21.1604 16.134C21.7127 15.1774 21.3849 13.9542 20.4284 13.4019L19.4284 15.134ZM18.0118 14.3161L19.4284 15.134L20.4284 13.4019L19.0118 12.5841L18.0118 14.3161ZM17.0001 12C17.0001 12.1115 16.9965 12.222 16.9894 12.3314L18.9851 12.4615C18.9951 12.3088 19.0001 12.1549 19.0001 12H17.0001ZM16.9894 11.6686C16.9965 11.778 17.0001 11.8885 17.0001 12H19.0001C19.0001 11.8451 18.9951 11.6912 18.9851 11.5385L16.9894 11.6686ZM19.4284 8.86602L18.0118 9.68388L19.0118 11.4159L20.4284 10.5981L19.4284 8.86602ZM19.4284 8.86602L19.4284 8.86602L20.4284 10.5981C21.3849 10.0458 21.7127 8.82261 21.1604 7.86602L19.4284 8.86602ZM18.4284 7.13397L19.4284 8.86602L21.1604 7.86602L20.1604 6.13397L18.4284 7.13397ZM18.4284 7.13397V7.13397L20.1604 6.13397C19.6081 5.17738 18.3849 4.84963 17.4284 5.40192L18.4284 7.13397ZM17.0119 7.95175L18.4284 7.13397L17.4284 5.40192L16.0119 6.2197L17.0119 7.95175ZM14.2089 7.51283C14.4067 7.6104 14.5972 7.72072 14.7793 7.84277L15.8927 6.18131C15.6378 6.01056 15.3711 5.85603 15.0938 5.71924L14.2089 7.51283ZM13.0001 4V5.63423H15.0001V4H13.0001ZM13.0001 4H15.0001C15.0001 2.89543 14.1047 2 13.0001 2V4ZM11.0001 4H13.0001V2H11.0001V4ZM15.0938 5.71924C15.0511 5.69815 15.0232 5.67053 15.0094 5.65025C14.9972 5.63248 15.0001 5.62788 15.0001 5.63423H13.0001C13.0001 6.50299 13.5491 7.18731 14.2089 7.51283L15.0938 5.71924ZM16.0119 6.2197C16.0174 6.21655 16.0149 6.22132 15.9937 6.21972C15.9694 6.21789 15.9319 6.20762 15.8927 6.18131L14.7793 7.84277C15.3915 8.25303 16.2594 8.38623 17.0119 7.95175L16.0119 6.2197ZM18.9851 11.5385C18.9821 11.4913 18.992 11.4537 19.0025 11.4318C19.0118 11.4126 19.0172 11.4128 19.0118 11.4159L18.0118 9.68388C17.2604 10.1177 16.9415 10.9342 16.9894 11.6686L18.9851 11.5385ZM15.8927 17.8187C15.9319 17.7924 15.9694 17.7821 15.9937 17.7803C16.0149 17.7787 16.0174 17.7834 16.0119 17.7803L17.0119 16.0482C16.2594 15.6138 15.3915 15.747 14.7793 16.1572L15.8927 17.8187ZM19.0118 12.5841C19.0172 12.5872 19.0118 12.5874 19.0025 12.5682C18.992 12.5462 18.9821 12.5087 18.9851 12.4615L16.9894 12.3314C16.9415 13.0658 17.2604 13.8823 18.0118 14.3161L19.0118 12.5841ZM8.90647 18.2808C8.94923 18.3019 8.97711 18.3295 8.99094 18.3497C9.00306 18.3675 9.00015 18.3721 9.00015 18.3658H11.0001C11.0001 17.497 10.4512 16.8127 9.79137 16.4872L8.90647 18.2808ZM7.98838 17.7803C7.98292 17.7834 7.98539 17.7787 8.00661 17.7803C8.03085 17.7821 8.06836 17.7924 8.10763 17.8187L9.22098 16.1572C8.60875 15.747 7.74092 15.6138 6.98838 16.0482L7.98838 17.7803ZM15.0001 18.3658C15.0001 18.3721 14.9972 18.3675 15.0094 18.3497C15.0232 18.3295 15.0511 18.3019 15.0938 18.2808L14.2089 16.4872C13.5491 16.8127 13.0001 17.497 13.0001 18.3658H15.0001ZM5.01516 12.4615C5.01823 12.5086 5.00833 12.5462 4.99777 12.5682C4.98851 12.5874 4.9831 12.5872 4.98852 12.5841L5.98852 14.3161C6.73991 13.8823 7.05882 13.0658 7.01092 12.3314L5.01516 12.4615ZM4.98852 11.4159C4.9831 11.4128 4.98851 11.4126 4.99777 11.4318C5.00833 11.4537 5.01823 11.4913 5.01516 11.5385L7.01092 11.6686C7.05882 10.9342 6.73991 10.1177 5.98852 9.68388L4.98852 11.4159ZM8.10764 6.18131C8.06837 6.20763 8.03085 6.21789 8.00662 6.21972C7.9854 6.22133 7.98293 6.21655 7.98839 6.2197L6.98839 7.95176C7.74092 8.38623 8.60876 8.25303 9.22099 7.84277L8.10764 6.18131ZM9.00015 5.63424C9.00015 5.62788 9.00306 5.63248 8.99094 5.65025C8.97711 5.67053 8.94923 5.69815 8.90647 5.71924L9.79137 7.51283C10.4512 7.18731 11.0001 6.50299 11.0001 5.63424H9.00015Z"
                                                fill="#000000"></path>
                                            <circle cx="12" cy="12" r="3" stroke="#000000"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></circle>
                                        </g>
                                    </svg> {{ Auth()->user()->role }}
                                </span>
                            </h5>
                        </div>
                    </div>
                    <div class="card shadow-sm bg-light bg-gradient mb-3">
                        <div class="card-body">
                            <div class="d-flex">
                                <h4 class="card-title fw-semibold responsive-p1 me-auto">Today's Overview</h4>
                                <a href="/dashboard/reports" class="btn btn-warning fw-semibold" type="button"
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
                                            <h1 class="fw-bold mb-0" id="counter2">{{ $countkelas }}</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="card text-white bg-success bg-gradient h-100">
                                        <div class="card-body">
                                            <h4 class="card-title ">Topik Materi</h4>
                                            <h1 class="fw-bold mb-0" id="counter3">{{ $countmateri }}</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="card text-white bg-success bg-gradient h-100">
                                        <div class="card-body">
                                            <h4 class="card-title">Sertifikat Dikeluarkan</h4>
                                            <h1 class="fw-bold mb-0" id="counter4">{{ $countsertifikat }}</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md-3 col-6">
                                    <div class="card text-white bg-success bg-gradient h-100">
                                        <div class="card-body">
                                            <h4 class="card-title">Petugas Terdaftar</h4>
                                            <h1 class="fw-bold mb-0" id="counter5">{{ $countpetugas }}</h1>
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
                                            <h1 class="fw-bold mb-0" id="counter7">{{ $countpretest }}</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="card text-white bg-success bg-gradient h-100">
                                        <div class="card-body">
                                            <h4 class="card-title">Post-Test</h4>
                                            <h1 class="fw-bold mb-0" id="counter8">{{ $countposttest }}</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow-sm bg-light bg-gradient mb-3">
                        <div class="card-body">
                            <div class="d-flex">
                                <h4 class="card-title fw-semibold responsive-p1 me-auto">Kemajuan Pembelajaran Pegawai</h4>
                                <a href="/dashboard/kelas" class="btn btn-warning fw-semibold" type="button"
                                    data-bss-hover-animate="tada">Manajemen Kemajuan Pembelajaran
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
                                        <a href="/dashboard/petugas" class="stretched-link"></a>
                                        <h4 class="fw-bold text-center">Manajemen Data Petugas</h4>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-white bg-success bg-gradient h-100"
                                        data-bss-hover-animate="pulse">
                                        <div class="d-flex justify-content-center align-items-center d-inline-block">
                                            <!DOCTYPE svg
                                                PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                                            <div class="p-2 mt-1 mb-1">
                                                <svg width="50px" height="50px" viewBox="0 0 1024 1024"
                                                    xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path fill="#ffffff"
                                                            d="M512 64a448 448 0 1 1 0 896 448 448 0 0 1 0-896zm-55.808 536.384-99.52-99.584a38.4 38.4 0 1 0-54.336 54.336l126.72 126.72a38.272 38.272 0 0 0 54.336 0l262.4-262.464a38.4 38.4 0 1 0-54.272-54.336L456.192 600.384z">
                                                        </path>
                                                    </g>
                                                </svg>
                                            </div>
                                        </div>
                                        <a href="/dashboard/uji-kompetensi" class="stretched-link"></a>
                                        <h4 class="fw-bold text-center">Manajemen Uji Kompetensi</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
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
                                        <a href="/dashboard/kelas" class="stretched-link"></a>
                                        <h4 class="fw-bold text-center">Manajemen Kelas</h4>
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
                                        <h4 class="fw-bold text-center">Manajemen Kemajuan Pembelajaran</h4>
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
                                        <a href="/dashboard/reports" class="stretched-link"></a>
                                        <h4 class="fw-bold text-center">Manajemen Laporan</h4>
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
                                        <a href="/dashboard/certificate" class="stretched-link"></a>
                                        <h4 class="fw-bold text-center">Manajemen Sertifikat</h4>
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
                                    class="badge badge-lg rounded-pill text-bg-warning"> <svg width="24px"
                                        height="24px" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M6.07194 6.26794L6.57194 5.40192L6.07194 6.26794ZM4.70592 6.63397L3.83989 6.13397L3.83989 6.13397L4.70592 6.63397ZM3.70592 8.36602L2.83989 7.86602H2.83989L3.70592 8.36602ZM4.07194 9.73205L3.57194 10.5981H3.57194L4.07194 9.73205ZM4.07194 14.2679L3.57194 13.4019H3.57194L4.07194 14.2679ZM3.70592 15.634L4.57194 15.134H4.57194L3.70592 15.634ZM4.70592 17.366L3.83989 17.866H3.83989L4.70592 17.366ZM6.07194 17.732L6.57194 18.5981L6.07194 17.732ZM17.9284 17.732L17.4283 18.5981L17.4284 18.5981L17.9284 17.732ZM19.2944 17.366L18.4284 16.866L19.2944 17.366ZM20.2944 15.634L21.1604 16.134L20.2944 15.634ZM19.9284 14.2679L19.4284 15.134V15.134L19.9284 14.2679ZM19.9284 9.73205L20.4284 10.5981V10.5981L19.9284 9.73205ZM20.2944 8.36602L19.4284 8.86602L19.4284 8.86602L20.2944 8.36602ZM19.2944 6.63397L18.4284 7.13397L19.2944 6.63397ZM17.9284 6.26794L18.4284 7.13397L17.9284 6.26794ZM14.6514 6.61604L14.2089 7.51283L14.6514 6.61604ZM16.5119 7.08573L17.0119 7.95175L16.5119 7.08573ZM15.336 7.01204L14.7793 7.84277L15.336 7.01204ZM17.9873 11.6035L16.9894 11.6686L17.9873 11.6035ZM18.5118 10.5499L18.0118 9.68388L18.5118 10.5499ZM15.336 16.988L14.7793 16.1572L15.336 16.988ZM16.5119 16.9143L16.0119 17.7803L16.5119 16.9143ZM18.5118 13.4501L18.0118 14.3161L18.5118 13.4501ZM9.34892 17.384L9.79137 16.4872L9.34892 17.384ZM7.48838 16.9143L6.98838 16.0482L7.48838 16.9143ZM8.6643 16.988L8.10763 17.8187L8.6643 16.988ZM14.6514 17.384L15.0938 18.2808L14.6514 17.384ZM5.48852 10.5499L4.98852 11.4159L5.48852 10.5499ZM6.01304 11.6035L5.01516 11.5385L6.01304 11.6035ZM7.48839 7.08573L6.98839 7.95176L7.48839 7.08573ZM11.0001 4V4V2C9.89558 2 9.00015 2.89543 9.00015 4H11.0001ZM11.0001 5.63424V4H9.00015V5.63424H11.0001ZM9.22099 7.84277C9.40312 7.72073 9.59361 7.6104 9.79137 7.51283L8.90647 5.71924C8.62922 5.85603 8.36245 6.01056 8.10764 6.18131L9.22099 7.84277ZM5.57194 7.13397L6.98839 7.95176L7.98839 6.2197L6.57194 5.40192L5.57194 7.13397ZM5.57194 7.13397L6.57194 5.40192C5.61536 4.84963 4.39218 5.17738 3.83989 6.13397L5.57194 7.13397ZM4.57194 8.86602L5.57194 7.13397L3.83989 6.13397L2.83989 7.86602L4.57194 8.86602ZM4.57194 8.86602L4.57194 8.86602L2.83989 7.86602C2.28761 8.82261 2.61536 10.0458 3.57194 10.5981L4.57194 8.86602ZM5.98852 9.68388L4.57194 8.86602L3.57194 10.5981L4.98852 11.4159L5.98852 9.68388ZM7.00015 12C7.00015 11.8885 7.00378 11.778 7.01092 11.6686L5.01516 11.5385C5.0052 11.6912 5.00015 11.8451 5.00015 12H7.00015ZM7.01092 12.3314C7.00378 12.222 7.00015 12.1115 7.00015 12H5.00015C5.00015 12.1549 5.0052 12.3088 5.01516 12.4615L7.01092 12.3314ZM4.57194 15.134L5.98852 14.3161L4.98852 12.5841L3.57194 13.4019L4.57194 15.134ZM4.57194 15.134L4.57194 15.134L3.57194 13.4019C2.61536 13.9542 2.28761 15.1774 2.83989 16.134L4.57194 15.134ZM5.57194 16.866L4.57194 15.134L2.83989 16.134L3.83989 17.866L5.57194 16.866ZM5.57194 16.866L5.57194 16.866L3.83989 17.866C4.39218 18.8226 5.61536 19.1504 6.57194 18.5981L5.57194 16.866ZM6.98838 16.0482L5.57194 16.866L6.57194 18.5981L7.98838 17.7803L6.98838 16.0482ZM9.79137 16.4872C9.59361 16.3896 9.40312 16.2793 9.22098 16.1572L8.10763 17.8187C8.36245 17.9894 8.62922 18.144 8.90647 18.2808L9.79137 16.4872ZM11.0001 20V18.3658H9.00015V20H11.0001ZM11.0001 20H9.00015C9.00015 21.1046 9.89558 22 11.0001 22V20ZM13.0001 20H11.0001V22H13.0001V20ZM13.0001 20V22C14.1047 22 15.0001 21.1046 15.0001 20H13.0001ZM13.0001 18.3658V20H15.0001V18.3658H13.0001ZM14.7793 16.1572C14.5972 16.2793 14.4067 16.3896 14.2089 16.4872L15.0938 18.2808C15.3711 18.144 15.6378 17.9894 15.8927 17.8187L14.7793 16.1572ZM18.4284 16.866L17.0119 16.0482L16.0119 17.7803L17.4283 18.5981L18.4284 16.866ZM18.4284 16.866H18.4283L17.4284 18.5981C18.3849 19.1504 19.6081 18.8226 20.1604 17.866L18.4284 16.866ZM19.4284 15.134L18.4284 16.866L20.1604 17.866L21.1604 16.134L19.4284 15.134ZM19.4284 15.134V15.134L21.1604 16.134C21.7127 15.1774 21.3849 13.9542 20.4284 13.4019L19.4284 15.134ZM18.0118 14.3161L19.4284 15.134L20.4284 13.4019L19.0118 12.5841L18.0118 14.3161ZM17.0001 12C17.0001 12.1115 16.9965 12.222 16.9894 12.3314L18.9851 12.4615C18.9951 12.3088 19.0001 12.1549 19.0001 12H17.0001ZM16.9894 11.6686C16.9965 11.778 17.0001 11.8885 17.0001 12H19.0001C19.0001 11.8451 18.9951 11.6912 18.9851 11.5385L16.9894 11.6686ZM19.4284 8.86602L18.0118 9.68388L19.0118 11.4159L20.4284 10.5981L19.4284 8.86602ZM19.4284 8.86602L19.4284 8.86602L20.4284 10.5981C21.3849 10.0458 21.7127 8.82261 21.1604 7.86602L19.4284 8.86602ZM18.4284 7.13397L19.4284 8.86602L21.1604 7.86602L20.1604 6.13397L18.4284 7.13397ZM18.4284 7.13397V7.13397L20.1604 6.13397C19.6081 5.17738 18.3849 4.84963 17.4284 5.40192L18.4284 7.13397ZM17.0119 7.95175L18.4284 7.13397L17.4284 5.40192L16.0119 6.2197L17.0119 7.95175ZM14.2089 7.51283C14.4067 7.6104 14.5972 7.72072 14.7793 7.84277L15.8927 6.18131C15.6378 6.01056 15.3711 5.85603 15.0938 5.71924L14.2089 7.51283ZM13.0001 4V5.63423H15.0001V4H13.0001ZM13.0001 4H15.0001C15.0001 2.89543 14.1047 2 13.0001 2V4ZM11.0001 4H13.0001V2H11.0001V4ZM15.0938 5.71924C15.0511 5.69815 15.0232 5.67053 15.0094 5.65025C14.9972 5.63248 15.0001 5.62788 15.0001 5.63423H13.0001C13.0001 6.50299 13.5491 7.18731 14.2089 7.51283L15.0938 5.71924ZM16.0119 6.2197C16.0174 6.21655 16.0149 6.22132 15.9937 6.21972C15.9694 6.21789 15.9319 6.20762 15.8927 6.18131L14.7793 7.84277C15.3915 8.25303 16.2594 8.38623 17.0119 7.95175L16.0119 6.2197ZM18.9851 11.5385C18.9821 11.4913 18.992 11.4537 19.0025 11.4318C19.0118 11.4126 19.0172 11.4128 19.0118 11.4159L18.0118 9.68388C17.2604 10.1177 16.9415 10.9342 16.9894 11.6686L18.9851 11.5385ZM15.8927 17.8187C15.9319 17.7924 15.9694 17.7821 15.9937 17.7803C16.0149 17.7787 16.0174 17.7834 16.0119 17.7803L17.0119 16.0482C16.2594 15.6138 15.3915 15.747 14.7793 16.1572L15.8927 17.8187ZM19.0118 12.5841C19.0172 12.5872 19.0118 12.5874 19.0025 12.5682C18.992 12.5462 18.9821 12.5087 18.9851 12.4615L16.9894 12.3314C16.9415 13.0658 17.2604 13.8823 18.0118 14.3161L19.0118 12.5841ZM8.90647 18.2808C8.94923 18.3019 8.97711 18.3295 8.99094 18.3497C9.00306 18.3675 9.00015 18.3721 9.00015 18.3658H11.0001C11.0001 17.497 10.4512 16.8127 9.79137 16.4872L8.90647 18.2808ZM7.98838 17.7803C7.98292 17.7834 7.98539 17.7787 8.00661 17.7803C8.03085 17.7821 8.06836 17.7924 8.10763 17.8187L9.22098 16.1572C8.60875 15.747 7.74092 15.6138 6.98838 16.0482L7.98838 17.7803ZM15.0001 18.3658C15.0001 18.3721 14.9972 18.3675 15.0094 18.3497C15.0232 18.3295 15.0511 18.3019 15.0938 18.2808L14.2089 16.4872C13.5491 16.8127 13.0001 17.497 13.0001 18.3658H15.0001ZM5.01516 12.4615C5.01823 12.5086 5.00833 12.5462 4.99777 12.5682C4.98851 12.5874 4.9831 12.5872 4.98852 12.5841L5.98852 14.3161C6.73991 13.8823 7.05882 13.0658 7.01092 12.3314L5.01516 12.4615ZM4.98852 11.4159C4.9831 11.4128 4.98851 11.4126 4.99777 11.4318C5.00833 11.4537 5.01823 11.4913 5.01516 11.5385L7.01092 11.6686C7.05882 10.9342 6.73991 10.1177 5.98852 9.68388L4.98852 11.4159ZM8.10764 6.18131C8.06837 6.20763 8.03085 6.21789 8.00662 6.21972C7.9854 6.22133 7.98293 6.21655 7.98839 6.2197L6.98839 7.95176C7.74092 8.38623 8.60876 8.25303 9.22099 7.84277L8.10764 6.18131ZM9.00015 5.63424C9.00015 5.62788 9.00306 5.63248 8.99094 5.65025C8.97711 5.67053 8.94923 5.69815 8.90647 5.71924L9.79137 7.51283C10.4512 7.18731 11.0001 6.50299 11.0001 5.63424H9.00015Z"
                                                fill="#000000"></path>
                                            <circle cx="12" cy="12" r="3" stroke="#000000"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></circle>
                                        </g>
                                    </svg> {{ Auth()->user()->role }}</span>
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
                                    data-bss-hover-animate="tada">Profil Anda <svg width="16px" height="16px"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <title></title>
                                            <g id="Complete">
                                                <g id="edit">
                                                    <g>
                                                        <path d="M20,16v4a2,2,0,0,1-2,2H4a2,2,0,0,1-2-2V6A2,2,0,0,1,4,4H8"
                                                            fill="none" stroke="#ffffff" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"></path>
                                                        <polygon fill="none"
                                                            points="12.5 15.8 22 6.2 17.8 2 8.3 11.5 8 16 12.5 15.8"
                                                            stroke="#ffffff" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"></polygon>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg></a>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button class="btn btn-danger mx-2" type="submit"
                                        data-bss-hover-animate="tada">Keluar
                                        Akun <svg width="16px" height="16px" viewBox="0 0 1024 1024"
                                            xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path fill="#ffffff"
                                                    d="M195.2 195.2a64 64 0 0 1 90.496 0L512 421.504 738.304 195.2a64 64 0 0 1 90.496 90.496L602.496 512 828.8 738.304a64 64 0 0 1-90.496 90.496L512 602.496 285.696 828.8a64 64 0 0 1-90.496-90.496L421.504 512 195.2 285.696a64 64 0 0 1 0-90.496z">
                                                </path>
                                            </g>
                                        </svg></button>
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
        let limit4 = {!! json_encode($countsertifikat) !!};

        function updated4() {
            if (limit4 == 0) {
                count4.innerHTML = 0;
            } else {
                var count4 = document.getElementById("counter4");
                count4.innerHTML = ++upto4;
                if (upto4 === limit4) {
                    clearInterval(counts4);
                }
            }
        }
    </script>
    <script>
        let counts3 = setInterval(updated3);
        let upto3 = 0;
        let limit3 = {!! json_encode($countmateri) !!};

        function updated3() {
            if (limit3 == 0) {
                count3.innerHTML = 0;
            } else {
                var count3 = document.getElementById("counter3");
                count3.innerHTML = ++upto3;
                if (upto3 === limit3) {
                    clearInterval(counts3);
                }
            }
        }
    </script>
    <script>
        let counts2 = setInterval(updated2);
        let upto2 = 0;
        let limit2 = {!! json_encode($countkelas) !!};

        function updated2() {
            if (limit2 == 0) {
                count2.innerHTML = 0;
            } else {
                var count2 = document.getElementById("counter2");
                count2.innerHTML = ++upto2;
                if (upto2 === limit2) {
                    clearInterval(counts2);
                }
            }
        }
    </script>
    <script>
        let counts1 = setInterval(updated1);
        let upto1 = 0;
        let limit1 = {!! json_encode($countpegawai) !!};

        function updated1() {
            if (limit1 == 0) {
                count1.innerHTML = 0;
            } else {
                var count1 = document.getElementById("counter1");
                count1.innerHTML = ++upto1;
                if (upto1 === limit1) {
                    clearInterval(counts1);
                }
            }
        }
    </script>
    <script>
        let counts6 = setInterval(updated6);
        let upto6 = 0;
        let limit6 = {!! json_encode($countbank) !!};

        function updated7() {
            if (limit6 == 0) {
                count6.innerHTML = 0;
            } else {
                var count6 = document.getElementById("counter6");
                count6.innerHTML = ++upto6;
                if (upto6 === limit6) {
                    clearInterval(counts6);
                }
            }
        }
    </script>
    <script>
        let counts7 = setInterval(updated7);
        let upto7 = 0;
        let limit7 = {!! json_encode($countpretest) !!};

        function updated7() {
            if (limit7 == 0) {
                count7.innerHTML = 0;
            } else {
                var count7 = document.getElementById("counter7");
                count7.innerHTML = ++upto7;
                if (upto7 === limit7) {
                    clearInterval(counts7);
                }
            }
        }
    </script>
    <script>
        let counts8 = setInterval(updated8);
        let upto8 = 0;
        let limit8 = {!! json_encode($countposttest) !!};

        function updated7() {
            if (limit8 == 0) {
                count8.innerHTML = 0;
            } else {
                var count8 = document.getElementById("counter8");
                count8.innerHTML = ++upto8;
                if (upto8 === limit8) {
                    clearInterval(counts8);
                }
            }
        }
    </script>
    <script>
        let counts5 = setInterval(updated5);
        let upto5 = 0;
        let limit5 = {!! json_encode($countpetugas) !!};

        function updated7() {
            if (limit5 == 0) {
                count5.innerHTML = 0;
            } else {
                var count5 = document.getElementById("counter5");
                count5.innerHTML = ++upto5;
                if (upto5 === limit5) {
                    clearInterval(counts5);
                }
            }
        }
    </script>
@endsection
