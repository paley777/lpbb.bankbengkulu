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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
    <div class="bg-success bg-gradient bg-opacity-10">
        <div class="container py-5 py-xl-5 mx-5 justify-content-center mx-auto" style="font-family: Raleway;">
            <div class="row mx-4">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb responsive-small">
                            <li class="breadcrumb-item"><a href="/dashboard">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="/dashboard/reports">Manajemen Laporan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Rekapitulasi Data Petugas</li>
                        </ol>
                    </nav>
                    <div class="card text-bg-success bg-gradient mb-3 bg-opacity-100">
                        <div class="card-header fw-semibold">Dashboard Learning Program Bank Bengkulu</div>
                        <div class="card-body">
                            <h4 class=" responsive-p1 fw-semibold mb-3">Rekapitulasi Data Petugas</h4>
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
                            </div>
                            <hr>

                            <div class="table-responsive">
                                <table id="example" class="table table-hover responsive-small">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">NRPP</th>
                                            <th scope="col">Jabatan</th>
                                            <th scope="col">Unit Kerja</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    @if ($users->count() == 0)
                                        <h4 class="fw-semibold responsive-p1 me-3">No Data</h4>
                                    @else
                                        <tbody>
                                            @foreach ($users as $key => $user)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        @if ($user->role == 'Super Administrator')
                                                            <span class="badge rounded-pill text-bg-success"><svg
                                                                    width="24px" height="24px" viewBox="0 0 24 24"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                        stroke-linejoin="round">
                                                                    </g>
                                                                    <g id="SVGRepo_iconCarrier">
                                                                        <path
                                                                            d="M6.07194 6.26794L6.57194 5.40192L6.07194 6.26794ZM4.70592 6.63397L3.83989 6.13397L3.83989 6.13397L4.70592 6.63397ZM3.70592 8.36602L2.83989 7.86602H2.83989L3.70592 8.36602ZM4.07194 9.73205L3.57194 10.5981H3.57194L4.07194 9.73205ZM4.07194 14.2679L3.57194 13.4019H3.57194L4.07194 14.2679ZM3.70592 15.634L4.57194 15.134H4.57194L3.70592 15.634ZM4.70592 17.366L3.83989 17.866H3.83989L4.70592 17.366ZM6.07194 17.732L6.57194 18.5981L6.07194 17.732ZM17.9284 17.732L17.4283 18.5981L17.4284 18.5981L17.9284 17.732ZM19.2944 17.366L18.4284 16.866L19.2944 17.366ZM20.2944 15.634L21.1604 16.134L20.2944 15.634ZM19.9284 14.2679L19.4284 15.134V15.134L19.9284 14.2679ZM19.9284 9.73205L20.4284 10.5981V10.5981L19.9284 9.73205ZM20.2944 8.36602L19.4284 8.86602L19.4284 8.86602L20.2944 8.36602ZM19.2944 6.63397L18.4284 7.13397L19.2944 6.63397ZM17.9284 6.26794L18.4284 7.13397L17.9284 6.26794ZM14.6514 6.61604L14.2089 7.51283L14.6514 6.61604ZM16.5119 7.08573L17.0119 7.95175L16.5119 7.08573ZM15.336 7.01204L14.7793 7.84277L15.336 7.01204ZM17.9873 11.6035L16.9894 11.6686L17.9873 11.6035ZM18.5118 10.5499L18.0118 9.68388L18.5118 10.5499ZM15.336 16.988L14.7793 16.1572L15.336 16.988ZM16.5119 16.9143L16.0119 17.7803L16.5119 16.9143ZM18.5118 13.4501L18.0118 14.3161L18.5118 13.4501ZM9.34892 17.384L9.79137 16.4872L9.34892 17.384ZM7.48838 16.9143L6.98838 16.0482L7.48838 16.9143ZM8.6643 16.988L8.10763 17.8187L8.6643 16.988ZM14.6514 17.384L15.0938 18.2808L14.6514 17.384ZM5.48852 10.5499L4.98852 11.4159L5.48852 10.5499ZM6.01304 11.6035L5.01516 11.5385L6.01304 11.6035ZM7.48839 7.08573L6.98839 7.95176L7.48839 7.08573ZM11.0001 4V4V2C9.89558 2 9.00015 2.89543 9.00015 4H11.0001ZM11.0001 5.63424V4H9.00015V5.63424H11.0001ZM9.22099 7.84277C9.40312 7.72073 9.59361 7.6104 9.79137 7.51283L8.90647 5.71924C8.62922 5.85603 8.36245 6.01056 8.10764 6.18131L9.22099 7.84277ZM5.57194 7.13397L6.98839 7.95176L7.98839 6.2197L6.57194 5.40192L5.57194 7.13397ZM5.57194 7.13397L6.57194 5.40192C5.61536 4.84963 4.39218 5.17738 3.83989 6.13397L5.57194 7.13397ZM4.57194 8.86602L5.57194 7.13397L3.83989 6.13397L2.83989 7.86602L4.57194 8.86602ZM4.57194 8.86602L4.57194 8.86602L2.83989 7.86602C2.28761 8.82261 2.61536 10.0458 3.57194 10.5981L4.57194 8.86602ZM5.98852 9.68388L4.57194 8.86602L3.57194 10.5981L4.98852 11.4159L5.98852 9.68388ZM7.00015 12C7.00015 11.8885 7.00378 11.778 7.01092 11.6686L5.01516 11.5385C5.0052 11.6912 5.00015 11.8451 5.00015 12H7.00015ZM7.01092 12.3314C7.00378 12.222 7.00015 12.1115 7.00015 12H5.00015C5.00015 12.1549 5.0052 12.3088 5.01516 12.4615L7.01092 12.3314ZM4.57194 15.134L5.98852 14.3161L4.98852 12.5841L3.57194 13.4019L4.57194 15.134ZM4.57194 15.134L4.57194 15.134L3.57194 13.4019C2.61536 13.9542 2.28761 15.1774 2.83989 16.134L4.57194 15.134ZM5.57194 16.866L4.57194 15.134L2.83989 16.134L3.83989 17.866L5.57194 16.866ZM5.57194 16.866L5.57194 16.866L3.83989 17.866C4.39218 18.8226 5.61536 19.1504 6.57194 18.5981L5.57194 16.866ZM6.98838 16.0482L5.57194 16.866L6.57194 18.5981L7.98838 17.7803L6.98838 16.0482ZM9.79137 16.4872C9.59361 16.3896 9.40312 16.2793 9.22098 16.1572L8.10763 17.8187C8.36245 17.9894 8.62922 18.144 8.90647 18.2808L9.79137 16.4872ZM11.0001 20V18.3658H9.00015V20H11.0001ZM11.0001 20H9.00015C9.00015 21.1046 9.89558 22 11.0001 22V20ZM13.0001 20H11.0001V22H13.0001V20ZM13.0001 20V22C14.1047 22 15.0001 21.1046 15.0001 20H13.0001ZM13.0001 18.3658V20H15.0001V18.3658H13.0001ZM14.7793 16.1572C14.5972 16.2793 14.4067 16.3896 14.2089 16.4872L15.0938 18.2808C15.3711 18.144 15.6378 17.9894 15.8927 17.8187L14.7793 16.1572ZM18.4284 16.866L17.0119 16.0482L16.0119 17.7803L17.4283 18.5981L18.4284 16.866ZM18.4284 16.866H18.4283L17.4284 18.5981C18.3849 19.1504 19.6081 18.8226 20.1604 17.866L18.4284 16.866ZM19.4284 15.134L18.4284 16.866L20.1604 17.866L21.1604 16.134L19.4284 15.134ZM19.4284 15.134V15.134L21.1604 16.134C21.7127 15.1774 21.3849 13.9542 20.4284 13.4019L19.4284 15.134ZM18.0118 14.3161L19.4284 15.134L20.4284 13.4019L19.0118 12.5841L18.0118 14.3161ZM17.0001 12C17.0001 12.1115 16.9965 12.222 16.9894 12.3314L18.9851 12.4615C18.9951 12.3088 19.0001 12.1549 19.0001 12H17.0001ZM16.9894 11.6686C16.9965 11.778 17.0001 11.8885 17.0001 12H19.0001C19.0001 11.8451 18.9951 11.6912 18.9851 11.5385L16.9894 11.6686ZM19.4284 8.86602L18.0118 9.68388L19.0118 11.4159L20.4284 10.5981L19.4284 8.86602ZM19.4284 8.86602L19.4284 8.86602L20.4284 10.5981C21.3849 10.0458 21.7127 8.82261 21.1604 7.86602L19.4284 8.86602ZM18.4284 7.13397L19.4284 8.86602L21.1604 7.86602L20.1604 6.13397L18.4284 7.13397ZM18.4284 7.13397V7.13397L20.1604 6.13397C19.6081 5.17738 18.3849 4.84963 17.4284 5.40192L18.4284 7.13397ZM17.0119 7.95175L18.4284 7.13397L17.4284 5.40192L16.0119 6.2197L17.0119 7.95175ZM14.2089 7.51283C14.4067 7.6104 14.5972 7.72072 14.7793 7.84277L15.8927 6.18131C15.6378 6.01056 15.3711 5.85603 15.0938 5.71924L14.2089 7.51283ZM13.0001 4V5.63423H15.0001V4H13.0001ZM13.0001 4H15.0001C15.0001 2.89543 14.1047 2 13.0001 2V4ZM11.0001 4H13.0001V2H11.0001V4ZM15.0938 5.71924C15.0511 5.69815 15.0232 5.67053 15.0094 5.65025C14.9972 5.63248 15.0001 5.62788 15.0001 5.63423H13.0001C13.0001 6.50299 13.5491 7.18731 14.2089 7.51283L15.0938 5.71924ZM16.0119 6.2197C16.0174 6.21655 16.0149 6.22132 15.9937 6.21972C15.9694 6.21789 15.9319 6.20762 15.8927 6.18131L14.7793 7.84277C15.3915 8.25303 16.2594 8.38623 17.0119 7.95175L16.0119 6.2197ZM18.9851 11.5385C18.9821 11.4913 18.992 11.4537 19.0025 11.4318C19.0118 11.4126 19.0172 11.4128 19.0118 11.4159L18.0118 9.68388C17.2604 10.1177 16.9415 10.9342 16.9894 11.6686L18.9851 11.5385ZM15.8927 17.8187C15.9319 17.7924 15.9694 17.7821 15.9937 17.7803C16.0149 17.7787 16.0174 17.7834 16.0119 17.7803L17.0119 16.0482C16.2594 15.6138 15.3915 15.747 14.7793 16.1572L15.8927 17.8187ZM19.0118 12.5841C19.0172 12.5872 19.0118 12.5874 19.0025 12.5682C18.992 12.5462 18.9821 12.5087 18.9851 12.4615L16.9894 12.3314C16.9415 13.0658 17.2604 13.8823 18.0118 14.3161L19.0118 12.5841ZM8.90647 18.2808C8.94923 18.3019 8.97711 18.3295 8.99094 18.3497C9.00306 18.3675 9.00015 18.3721 9.00015 18.3658H11.0001C11.0001 17.497 10.4512 16.8127 9.79137 16.4872L8.90647 18.2808ZM7.98838 17.7803C7.98292 17.7834 7.98539 17.7787 8.00661 17.7803C8.03085 17.7821 8.06836 17.7924 8.10763 17.8187L9.22098 16.1572C8.60875 15.747 7.74092 15.6138 6.98838 16.0482L7.98838 17.7803ZM15.0001 18.3658C15.0001 18.3721 14.9972 18.3675 15.0094 18.3497C15.0232 18.3295 15.0511 18.3019 15.0938 18.2808L14.2089 16.4872C13.5491 16.8127 13.0001 17.497 13.0001 18.3658H15.0001ZM5.01516 12.4615C5.01823 12.5086 5.00833 12.5462 4.99777 12.5682C4.98851 12.5874 4.9831 12.5872 4.98852 12.5841L5.98852 14.3161C6.73991 13.8823 7.05882 13.0658 7.01092 12.3314L5.01516 12.4615ZM4.98852 11.4159C4.9831 11.4128 4.98851 11.4126 4.99777 11.4318C5.00833 11.4537 5.01823 11.4913 5.01516 11.5385L7.01092 11.6686C7.05882 10.9342 6.73991 10.1177 5.98852 9.68388L4.98852 11.4159ZM8.10764 6.18131C8.06837 6.20763 8.03085 6.21789 8.00662 6.21972C7.9854 6.22133 7.98293 6.21655 7.98839 6.2197L6.98839 7.95176C7.74092 8.38623 8.60876 8.25303 9.22099 7.84277L8.10764 6.18131ZM9.00015 5.63424C9.00015 5.62788 9.00306 5.63248 8.99094 5.65025C8.97711 5.67053 8.94923 5.69815 8.90647 5.71924L9.79137 7.51283C10.4512 7.18731 11.0001 6.50299 11.0001 5.63424H9.00015Z"
                                                                            fill="#ffffff"></path>
                                                                        <circle cx="12" cy="12" r="3"
                                                                            stroke="#ffffff" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round">
                                                                        </circle>
                                                                    </g>
                                                                </svg> {{ $user->role }}</span>
                                                        @else
                                                            <span class="badge rounded-pill text-bg-warning"><svg
                                                                    width="24px" height="24px" viewBox="0 0 24 24"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                        stroke-linejoin="round">
                                                                    </g>
                                                                    <g id="SVGRepo_iconCarrier">
                                                                        <path
                                                                            d="M6.07194 6.26794L6.57194 5.40192L6.07194 6.26794ZM4.70592 6.63397L3.83989 6.13397L3.83989 6.13397L4.70592 6.63397ZM3.70592 8.36602L2.83989 7.86602H2.83989L3.70592 8.36602ZM4.07194 9.73205L3.57194 10.5981H3.57194L4.07194 9.73205ZM4.07194 14.2679L3.57194 13.4019H3.57194L4.07194 14.2679ZM3.70592 15.634L4.57194 15.134H4.57194L3.70592 15.634ZM4.70592 17.366L3.83989 17.866H3.83989L4.70592 17.366ZM6.07194 17.732L6.57194 18.5981L6.07194 17.732ZM17.9284 17.732L17.4283 18.5981L17.4284 18.5981L17.9284 17.732ZM19.2944 17.366L18.4284 16.866L19.2944 17.366ZM20.2944 15.634L21.1604 16.134L20.2944 15.634ZM19.9284 14.2679L19.4284 15.134V15.134L19.9284 14.2679ZM19.9284 9.73205L20.4284 10.5981V10.5981L19.9284 9.73205ZM20.2944 8.36602L19.4284 8.86602L19.4284 8.86602L20.2944 8.36602ZM19.2944 6.63397L18.4284 7.13397L19.2944 6.63397ZM17.9284 6.26794L18.4284 7.13397L17.9284 6.26794ZM14.6514 6.61604L14.2089 7.51283L14.6514 6.61604ZM16.5119 7.08573L17.0119 7.95175L16.5119 7.08573ZM15.336 7.01204L14.7793 7.84277L15.336 7.01204ZM17.9873 11.6035L16.9894 11.6686L17.9873 11.6035ZM18.5118 10.5499L18.0118 9.68388L18.5118 10.5499ZM15.336 16.988L14.7793 16.1572L15.336 16.988ZM16.5119 16.9143L16.0119 17.7803L16.5119 16.9143ZM18.5118 13.4501L18.0118 14.3161L18.5118 13.4501ZM9.34892 17.384L9.79137 16.4872L9.34892 17.384ZM7.48838 16.9143L6.98838 16.0482L7.48838 16.9143ZM8.6643 16.988L8.10763 17.8187L8.6643 16.988ZM14.6514 17.384L15.0938 18.2808L14.6514 17.384ZM5.48852 10.5499L4.98852 11.4159L5.48852 10.5499ZM6.01304 11.6035L5.01516 11.5385L6.01304 11.6035ZM7.48839 7.08573L6.98839 7.95176L7.48839 7.08573ZM11.0001 4V4V2C9.89558 2 9.00015 2.89543 9.00015 4H11.0001ZM11.0001 5.63424V4H9.00015V5.63424H11.0001ZM9.22099 7.84277C9.40312 7.72073 9.59361 7.6104 9.79137 7.51283L8.90647 5.71924C8.62922 5.85603 8.36245 6.01056 8.10764 6.18131L9.22099 7.84277ZM5.57194 7.13397L6.98839 7.95176L7.98839 6.2197L6.57194 5.40192L5.57194 7.13397ZM5.57194 7.13397L6.57194 5.40192C5.61536 4.84963 4.39218 5.17738 3.83989 6.13397L5.57194 7.13397ZM4.57194 8.86602L5.57194 7.13397L3.83989 6.13397L2.83989 7.86602L4.57194 8.86602ZM4.57194 8.86602L4.57194 8.86602L2.83989 7.86602C2.28761 8.82261 2.61536 10.0458 3.57194 10.5981L4.57194 8.86602ZM5.98852 9.68388L4.57194 8.86602L3.57194 10.5981L4.98852 11.4159L5.98852 9.68388ZM7.00015 12C7.00015 11.8885 7.00378 11.778 7.01092 11.6686L5.01516 11.5385C5.0052 11.6912 5.00015 11.8451 5.00015 12H7.00015ZM7.01092 12.3314C7.00378 12.222 7.00015 12.1115 7.00015 12H5.00015C5.00015 12.1549 5.0052 12.3088 5.01516 12.4615L7.01092 12.3314ZM4.57194 15.134L5.98852 14.3161L4.98852 12.5841L3.57194 13.4019L4.57194 15.134ZM4.57194 15.134L4.57194 15.134L3.57194 13.4019C2.61536 13.9542 2.28761 15.1774 2.83989 16.134L4.57194 15.134ZM5.57194 16.866L4.57194 15.134L2.83989 16.134L3.83989 17.866L5.57194 16.866ZM5.57194 16.866L5.57194 16.866L3.83989 17.866C4.39218 18.8226 5.61536 19.1504 6.57194 18.5981L5.57194 16.866ZM6.98838 16.0482L5.57194 16.866L6.57194 18.5981L7.98838 17.7803L6.98838 16.0482ZM9.79137 16.4872C9.59361 16.3896 9.40312 16.2793 9.22098 16.1572L8.10763 17.8187C8.36245 17.9894 8.62922 18.144 8.90647 18.2808L9.79137 16.4872ZM11.0001 20V18.3658H9.00015V20H11.0001ZM11.0001 20H9.00015C9.00015 21.1046 9.89558 22 11.0001 22V20ZM13.0001 20H11.0001V22H13.0001V20ZM13.0001 20V22C14.1047 22 15.0001 21.1046 15.0001 20H13.0001ZM13.0001 18.3658V20H15.0001V18.3658H13.0001ZM14.7793 16.1572C14.5972 16.2793 14.4067 16.3896 14.2089 16.4872L15.0938 18.2808C15.3711 18.144 15.6378 17.9894 15.8927 17.8187L14.7793 16.1572ZM18.4284 16.866L17.0119 16.0482L16.0119 17.7803L17.4283 18.5981L18.4284 16.866ZM18.4284 16.866H18.4283L17.4284 18.5981C18.3849 19.1504 19.6081 18.8226 20.1604 17.866L18.4284 16.866ZM19.4284 15.134L18.4284 16.866L20.1604 17.866L21.1604 16.134L19.4284 15.134ZM19.4284 15.134V15.134L21.1604 16.134C21.7127 15.1774 21.3849 13.9542 20.4284 13.4019L19.4284 15.134ZM18.0118 14.3161L19.4284 15.134L20.4284 13.4019L19.0118 12.5841L18.0118 14.3161ZM17.0001 12C17.0001 12.1115 16.9965 12.222 16.9894 12.3314L18.9851 12.4615C18.9951 12.3088 19.0001 12.1549 19.0001 12H17.0001ZM16.9894 11.6686C16.9965 11.778 17.0001 11.8885 17.0001 12H19.0001C19.0001 11.8451 18.9951 11.6912 18.9851 11.5385L16.9894 11.6686ZM19.4284 8.86602L18.0118 9.68388L19.0118 11.4159L20.4284 10.5981L19.4284 8.86602ZM19.4284 8.86602L19.4284 8.86602L20.4284 10.5981C21.3849 10.0458 21.7127 8.82261 21.1604 7.86602L19.4284 8.86602ZM18.4284 7.13397L19.4284 8.86602L21.1604 7.86602L20.1604 6.13397L18.4284 7.13397ZM18.4284 7.13397V7.13397L20.1604 6.13397C19.6081 5.17738 18.3849 4.84963 17.4284 5.40192L18.4284 7.13397ZM17.0119 7.95175L18.4284 7.13397L17.4284 5.40192L16.0119 6.2197L17.0119 7.95175ZM14.2089 7.51283C14.4067 7.6104 14.5972 7.72072 14.7793 7.84277L15.8927 6.18131C15.6378 6.01056 15.3711 5.85603 15.0938 5.71924L14.2089 7.51283ZM13.0001 4V5.63423H15.0001V4H13.0001ZM13.0001 4H15.0001C15.0001 2.89543 14.1047 2 13.0001 2V4ZM11.0001 4H13.0001V2H11.0001V4ZM15.0938 5.71924C15.0511 5.69815 15.0232 5.67053 15.0094 5.65025C14.9972 5.63248 15.0001 5.62788 15.0001 5.63423H13.0001C13.0001 6.50299 13.5491 7.18731 14.2089 7.51283L15.0938 5.71924ZM16.0119 6.2197C16.0174 6.21655 16.0149 6.22132 15.9937 6.21972C15.9694 6.21789 15.9319 6.20762 15.8927 6.18131L14.7793 7.84277C15.3915 8.25303 16.2594 8.38623 17.0119 7.95175L16.0119 6.2197ZM18.9851 11.5385C18.9821 11.4913 18.992 11.4537 19.0025 11.4318C19.0118 11.4126 19.0172 11.4128 19.0118 11.4159L18.0118 9.68388C17.2604 10.1177 16.9415 10.9342 16.9894 11.6686L18.9851 11.5385ZM15.8927 17.8187C15.9319 17.7924 15.9694 17.7821 15.9937 17.7803C16.0149 17.7787 16.0174 17.7834 16.0119 17.7803L17.0119 16.0482C16.2594 15.6138 15.3915 15.747 14.7793 16.1572L15.8927 17.8187ZM19.0118 12.5841C19.0172 12.5872 19.0118 12.5874 19.0025 12.5682C18.992 12.5462 18.9821 12.5087 18.9851 12.4615L16.9894 12.3314C16.9415 13.0658 17.2604 13.8823 18.0118 14.3161L19.0118 12.5841ZM8.90647 18.2808C8.94923 18.3019 8.97711 18.3295 8.99094 18.3497C9.00306 18.3675 9.00015 18.3721 9.00015 18.3658H11.0001C11.0001 17.497 10.4512 16.8127 9.79137 16.4872L8.90647 18.2808ZM7.98838 17.7803C7.98292 17.7834 7.98539 17.7787 8.00661 17.7803C8.03085 17.7821 8.06836 17.7924 8.10763 17.8187L9.22098 16.1572C8.60875 15.747 7.74092 15.6138 6.98838 16.0482L7.98838 17.7803ZM15.0001 18.3658C15.0001 18.3721 14.9972 18.3675 15.0094 18.3497C15.0232 18.3295 15.0511 18.3019 15.0938 18.2808L14.2089 16.4872C13.5491 16.8127 13.0001 17.497 13.0001 18.3658H15.0001ZM5.01516 12.4615C5.01823 12.5086 5.00833 12.5462 4.99777 12.5682C4.98851 12.5874 4.9831 12.5872 4.98852 12.5841L5.98852 14.3161C6.73991 13.8823 7.05882 13.0658 7.01092 12.3314L5.01516 12.4615ZM4.98852 11.4159C4.9831 11.4128 4.98851 11.4126 4.99777 11.4318C5.00833 11.4537 5.01823 11.4913 5.01516 11.5385L7.01092 11.6686C7.05882 10.9342 6.73991 10.1177 5.98852 9.68388L4.98852 11.4159ZM8.10764 6.18131C8.06837 6.20763 8.03085 6.21789 8.00662 6.21972C7.9854 6.22133 7.98293 6.21655 7.98839 6.2197L6.98839 7.95176C7.74092 8.38623 8.60876 8.25303 9.22099 7.84277L8.10764 6.18131ZM9.00015 5.63424C9.00015 5.62788 9.00306 5.63248 8.99094 5.65025C8.97711 5.67053 8.94923 5.69815 8.90647 5.71924L9.79137 7.51283C10.4512 7.18731 11.0001 6.50299 11.0001 5.63424H9.00015Z"
                                                                            fill="#000000"></path>
                                                                        <circle cx="12" cy="12" r="3"
                                                                            stroke="#000000" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round">
                                                                        </circle>
                                                                    </g>
                                                                </svg> {{ $user->role }}</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->nrpp }}</td>
                                                    <td>{{ $user->jabatan }}</td>
                                                    <td>{{ $user->unit_kerja }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        @if ($user->status == 1)
                                                            <span class="badge rounded-pill text-bg-success">Active</span>
                                                        @else
                                                            <span class="badge rounded-pill text-bg-danger">Suspended</span>
                                                        @endif
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    @endif
                                </table>
                                {{-- <div class="row">
                                <div class="col">
                                    <div class="d-flex justify-content-center">
                                        {{ $users->links() }}
                                    </div>
                                </div>
                            </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>
        <script language="javascript">
            $("#checkAll").click(function() {
                $('input:checkbox').not(this).prop('checked', this.checked);
            });
        </script>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
            data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Impor Data dari Excel</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="responsive-small">Pilih file excel yang akan diimpor.</p>
                        <p class="responsive-small fw-semibold">Format .xls dan .xlsx</p>
                        <img src="{{ asset('storage/images/tatacara.jpg') }}" alt="Logo" width="720"
                            height="384" class="">
                        <hr>
                        <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-4">
                                <div class="custom-file text-left">
                                    <input type="file" name="file" class="custom-file-input responsive-small"
                                        id="customFile"
                                        accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                                    <label class="custom-file-label" for="customFile">Pilih File</label>
                                </div>
                            </div>
                            <button class="btn btn-warning fw-semibold">Import data <svg width="25px" height="25px"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <title></title>
                                        <g id="Complete">
                                            <g id="download">
                                                <g>
                                                    <path d="M3,12.3v7a2,2,0,0,0,2,2H19a2,2,0,0,0,2-2v-7" fill="none"
                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"></path>
                                                    <g>
                                                        <polyline data-name="Right" fill="none" id="Right-2"
                                                            points="7.9 12.3 12 16.3 16.1 12.3" stroke="#000000"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2">
                                                        </polyline>
                                                        <line fill="none" stroke="#000000" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2" x1="12"
                                                            x2="12" y1="2.7" y2="14.2"></line>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </button>
                            <a href="{{ asset('storage/template/userimport.xlsx') }}"
                                class="btn btn-success fw-semibold">Unduh
                                Template Excel <svg width="25px" height="25px" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <title></title>
                                        <g id="Complete">
                                            <g id="download">
                                                <g>
                                                    <path d="M3,12.3v7a2,2,0,0,0,2,2H19a2,2,0,0,0,2-2v-7" fill="none"
                                                        stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"></path>
                                                    <g>
                                                        <polyline data-name="Right" fill="none" id="Right-2"
                                                            points="7.9 12.3 12 16.3 16.1 12.3" stroke="#ffffff"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2">
                                                        </polyline>
                                                        <line fill="none" stroke="#ffffff" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2" x1="12"
                                                            x2="12" y1="2.7" y2="14.2"></line>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
            data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Data dari Excel</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="responsive-small">Pilih file excel yang akan diimpor.</p>
                        <p class="responsive-small fw-semibold">Format .xls dan .xlsx</p>
                        <img src="{{ asset('storage/images/tatacara.jpg') }}" alt="Logo" width="720"
                            height="384" class="">
                        <hr>
                        <form action="{{ route('file-edit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-4">
                                <div class="custom-file text-left">
                                    <input type="file" name="file" class="custom-file-input responsive-small"
                                        id="customFile"
                                        accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                                    <label class="custom-file-label" for="customFile">Pilih File</label>
                                </div>
                            </div>
                            <button class="btn btn-warning fw-semibold">Update data <svg width="25px" height="25px"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <title></title>
                                        <g id="Complete">
                                            <g id="download">
                                                <g>
                                                    <path d="M3,12.3v7a2,2,0,0,0,2,2H19a2,2,0,0,0,2-2v-7" fill="none"
                                                        stroke="#000000" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"></path>
                                                    <g>
                                                        <polyline data-name="Right" fill="none" id="Right-2"
                                                            points="7.9 12.3 12 16.3 16.1 12.3" stroke="#000000"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2">
                                                        </polyline>
                                                        <line fill="none" stroke="#000000" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2" x1="12"
                                                            x2="12" y1="2.7" y2="14.2"></line>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </button>
                            <a href="{{ asset('storage/template/userimport.xlsx') }}"
                                class="btn btn-success fw-semibold">Unduh
                                Template Excel <svg width="25px" height="25px" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <title></title>
                                        <g id="Complete">
                                            <g id="download">
                                                <g>
                                                    <path d="M3,12.3v7a2,2,0,0,0,2,2H19a2,2,0,0,0,2-2v-7" fill="none"
                                                        stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"></path>
                                                    <g>
                                                        <polyline data-name="Right" fill="none" id="Right-2"
                                                            points="7.9 12.3 12 16.3 16.1 12.3" stroke="#ffffff"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2">
                                                        </polyline>
                                                        <line fill="none" stroke="#ffffff" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2" x1="12"
                                                            x2="12" y1="2.7" y2="14.2"></line>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('#example').DataTable({
                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'copyHtml5',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            exportOptions: {
                                columns: ':visible'
                            }
                        }, 'colvis'
                    ]

                });
            });
        </script>
    @endsection
