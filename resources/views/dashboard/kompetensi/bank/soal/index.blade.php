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
                            <li class="breadcrumb-item"><a href="/dashboard/uji-kompetensi">Manajemen Uji Kompetensi</a></li>
                            <li class="breadcrumb-item"><a href="/dashboard/bank-soal">Manajemen Bank Soal</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manajemen Soal</li>
                        </ol>
                    </nav>
                    <div class="card text-bg-success bg-gradient mb-3 bg-opacity-100">
                        <div class="card-header fw-semibold">Dashboard Learning Program Bank Bengkulu</div>
                        <div class="card-body">
                            <h4 class=" responsive-p1 fw-semibold mb-3">Manajemen Soal <span
                                    class="badge rounded-pill text-bg-warning">{{ $nama_bank }}</span>
                            </h4>
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
                                <h4 class="card-title fw-semibold responsive-p1 me-3">Tabel Data</h4>
                                <div class="col-lg-5 col-md-4 me-3">
                                    <form action="/dashboard/soal/cari" method="POST">
                                        @csrf
                                        <div class="input-group">
                                            <input type="text" class="form-control responsive-small"
                                                placeholder="Cari Berdasarkan Soal" name="cari"
                                                value="{{ request('cari') }}">
                                            <input type="text" class="form-control responsive-small" name="soal_id"
                                                value="{{ $bankid }}" hidden>
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
                                <button class="btn btn-warning fw-semibold ms-3" type="button"
                                    data-bss-hover-animate="tada" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Impor dari Excel
                                    <svg width="25px" height="25px" viewBox="0 0 192 192"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#ffffff">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M56 30c0-1.662 1.338-3 3-3h108c1.662 0 3 1.338 3 3v132c0 1.662-1.338 3-3 3H59c-1.662 0-3-1.338-3-3v-32m0-68V30"
                                                style="fill-opacity:.402658;stroke:#000000;stroke-width:12;stroke-linecap:round;paint-order:stroke fill markers">
                                            </path>
                                            <rect width="68" height="68" x="-58.1" y="40.3" rx="3"
                                                style="fill:none;fill-opacity:.402658;stroke:#000000;stroke-width:12;stroke-linecap:round;stroke-linejoin:miter;stroke-dasharray:none;stroke-opacity:1;paint-order:stroke fill markers"
                                                transform="translate(80.1 21.7)"></rect>
                                            <path
                                                d="M138.79 164.725V27.175M56.175 58.792H170M170 96H90.328M169 133.21H56.175M44.5 82l23 28m0-28-23 28"
                                                style="fill:none;stroke:#000000;stroke-width:12;stroke-linecap:round;stroke-linejoin:round;stroke-dasharray:none;stroke-opacity:1">
                                            </path>
                                        </g>
                                    </svg>
                                </button>
                                <a href="/dashboard/soal/{{ $bankid }}/create"
                                    class="btn btn-warning fw-semibold ms-3 ms-auto" type="button"
                                    data-bss-hover-animate="tada">Tambah Soal
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
                            @if ($soals->count() == 0)
                            @else
                                <form method="post" action="{{ url('multiplesoalsdelete') }}">
                                    @csrf
                                    <input class="btn btn-danger" type="submit" name="submit"
                                        value="Delete Selected" />
                            @endif
                            <div class="table-responsive">
                                <table class="table table-hover responsive-small">
                                    <thead>
                                        <tr>
                                            <th class="text-center"> <input type="checkbox" id="checkAll"></th>
                                            <th scope="col">No.</th>
                                            <th scope="col">Soal</th>
                                            <th scope="col">Ans A</th>
                                            <th scope="col">Ans B</th>
                                            <th scope="col">Ans C</th>
                                            <th scope="col">Ans D</th>
                                            <th scope="col">Correct Ans</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($soals as $key => $soal)
                                            <tr>
                                                <td>
                                                    <input name='id[]' type="checkbox" id="checkItem"
                                                        value="<?php echo $soals[$key]->id; ?>">
                                                </td>
                                                </form>
                                                <td>{{ $soals->firstItem() + $key }}</td>
                                                <td>{{ $soal->soal }}</td>
                                                <td>{{ $soal->ans_a }}</td>
                                                <td>{{ $soal->ans_b }}</td>
                                                <td>{{ $soal->ans_c }}</td>
                                                <td>{{ $soal->ans_d }}</td>
                                                <td> <span
                                                        class="badge rounded-pill text-bg-success">{{ $soal->correct_ans }}</span>
                                                </td>
                                                <td>
                                                    <a href="/dashboard/soal/{{ $soal->id }}/edit"
                                                        class="badge bg-warning border-0 text-black">Edit</a>
                                                    <form action="/dashboard/soal/{{ $soal->id }}" method="post"
                                                        class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="badge bg-danger border-0"
                                                            onclick="return confirm('Anda yakin untuk menghapus data ini?')">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col">
                                        <div class="d-flex justify-content-center">
                                            {{ $soals->links() }}
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
                        <img src="{{ asset('storage/images/tatacara1.jpg') }}" alt="Logo" width="720"
                            height="384" class="">
                        <hr>
                        <form action="{{ url('soal-import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-4">
                                <div class="custom-file text-left">
                                    <input type="file" name="file" class="custom-file-input responsive-small"
                                        id="customFile"
                                        accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                                    <label class="custom-file-label" for="customFile">Pilih File</label>
                                </div>
                                <input type="text" id="validationCustom01" class="form-control responsive-small"
                                    name="bankid" value="{{ $bankid }}" placeholder="Isi Nama Bank" required
                                    readonly hidden>
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
                                </svg></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
