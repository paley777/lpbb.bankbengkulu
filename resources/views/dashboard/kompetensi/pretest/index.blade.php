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
                            <li class="breadcrumb-item active" aria-current="page">Manajemen Pre Test</li>
                        </ol>
                    </nav>
                    <div class="card text-bg-success bg-gradient mb-3 bg-opacity-100">
                        <div class="card-header fw-semibold">Dashboard Learning Program Bank Bengkulu</div>
                        <div class="card-body">
                            <h4 class=" responsive-p1 fw-semibold mb-3">Manajemen Pre Test</h4>
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
                                    <form action="/dashboard/pre-test">
                                        <div class="input-group">
                                            <input type="text" class="form-control responsive-small"
                                                placeholder="Cari Berdasarkan Nama Pre Test" name="search"
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
                                <a href="/dashboard/pre-test/create" class="btn btn-warning fw-semibold ms-3 ms-auto"
                                    type="button" data-bss-hover-animate="tada">Tambah Pre Test
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
                            <form method="post" action="{{ url('multiplepretestsdelete') }}">
                                @csrf
                                <button class="btn btn-danger" type="submit" name="submit">Delete Selected <svg
                                        width="16px" height="16px" viewBox="0 0 1024 1024"
                                        xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path fill="#ffffff"
                                                d="M195.2 195.2a64 64 0 0 1 90.496 0L512 421.504 738.304 195.2a64 64 0 0 1 90.496 90.496L602.496 512 828.8 738.304a64 64 0 0 1-90.496 90.496L512 602.496 285.696 828.8a64 64 0 0 1-90.496-90.496L421.504 512 195.2 285.696a64 64 0 0 1 0-90.496z">
                                            </path>
                                        </g>
                                    </svg>
                                </button>
                                <div class="table-responsive">
                                    <table class="table table-hover responsive-small">
                                        <thead>
                                            <tr>
                                                <th class="text-center"> <input type="checkbox" id="checkAll"></th>
                                                <th scope="col">No.</th>
                                                <th scope="col">Nama Pre Test</th>
                                                <th scope="col">Nama Bank Soal</th>
                                                <th scope="col">Jumlah Soal</th>
                                                <th scope="col">Durasi</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        @if ($pretests->count() == 0)
                                            <h4 class="fw-semibold responsive-p1 me-3">No Data</h4>
                                        @else
                                            <tbody>
                                                @foreach ($pretests as $key => $pretest)
                                                    <tr>
                                                        <td>
                                                            <input name='id[]' type="checkbox" id="checkItem"
                                                                value="<?php echo $pretests[$key]->id; ?>">
                                                        </td>
                            </form>
                            <td>{{ $pretests->firstItem() + $key }}</td>
                            <td>{{ $pretest->nama_pretest }}</td>
                            <td><span class="badge rounded-pill text-bg-success"><svg width="16px" height="16px"
                                        viewBox="0 0 1024 1024" class="icon" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <path
                                                d="M924.086857 282.843429l-362.057143 210.724571v415.378286s227.108571-137.728 238.738286-144.384c11.190857-6.436571 26.331429 0.731429 28.891429 17.554285 0.146286 0.731429 1.462857 4.973714 1.462857 5.705143 1.536 18.212571-0.731429 26.770286-12.580572 33.718857l-273.993143 162.742858c-6.948571 3.510857-16.091429 5.485714-30.72-1.755429-7.168-3.218286-424.301714-255.268571-424.301714-255.268571a24.649143 24.649143 0 0 1-11.702857-20.772572V251.611429c0-2.486857-2.413714-25.526857 13.385143-35.913143L517.558857 2.633143a24.137143 24.137143 0 0 1 21.796572 0l426.276571 213.138286c9.508571 4.827429 17.481143 14.628571 16.749714 23.844571a29.622857 29.622857 0 0 1 0.512 5.412571v437.028572c0 16.164571-13.165714 29.257143-29.330285 29.257143h-0.073143a29.403429 29.403429 0 0 1-29.403429-29.330286V282.843429zM495.908571 903.972571V493.714286L141.604571 290.230857v397.677714L495.908571 904.045714zM191.195429 236.251429l337.188571 191.122285 337.042286-191.122285L528.310857 67.876571 191.195429 236.251429z"
                                                fill="#ffffff"></path>
                                        </g>
                                    </svg> {{ $pretest->nama_bank }}</span>
                            </td>
                            <td><span class="badge rounded-pill text-bg-success">{{ $pretest->jumlah_soal }}</span></td>
                            <td><span class="badge rounded-pill text-bg-success"><svg width="16px" height="16px"
                                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <g id="Calendar / Timer">
                                                <path id="Vector"
                                                    d="M12 13V9M21 6L19 4M10 2H14M12 21C7.58172 21 4 17.4183 4 13C4 8.58172 7.58172 5 12 5C16.4183 5 20 8.58172 20 13C20 17.4183 16.4183 21 12 21Z"
                                                    stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </g>
                                        </g>
                                    </svg> {{ $pretest->durasi }}</span></td>
                            <td>
                                <a href="/dashboard/pre-test/{{ $pretest->id }}/edit"
                                    class="badge bg-warning border-0 text-black">Edit <svg width="16px" height="16px"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                        <g id="SVGRepo_iconCarrier">
                                            <title></title>
                                            <g id="Complete">
                                                <g id="edit">
                                                    <g>
                                                        <path d="M20,16v4a2,2,0,0,1-2,2H4a2,2,0,0,1-2-2V6A2,2,0,0,1,4,4H8"
                                                            fill="none" stroke="#000000" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"></path>
                                                        <polygon fill="none"
                                                            points="12.5 15.8 22 6.2 17.8 2 8.3 11.5 8 16 12.5 15.8"
                                                            stroke="#000000" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"></polygon>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg></a>
                                <form action="/dashboard/pre-test/{{ $pretest->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0"
                                        onclick="return confirm('Anda yakin untuk menghapus data ini?')">Hapus <svg
                                            width="16px" height="16px" viewBox="0 0 1024 1024"
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
                            </td>
                            </tr>
                            @endforeach
                            </tbody>
                            @endif
                            </table>
                            <div class="row">
                                <div class="col">
                                    <div class="d-flex justify-content-center">
                                        {{ $pretests->links() }}
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
@endsection
