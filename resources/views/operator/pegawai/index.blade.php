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
    <div class="bg-success bg-gradient bg-opacity-10">
        <div class="container py-5 py-xl-5 mx-5 justify-content-center mx-auto" style="font-family: Raleway;">
            <div class="row mx-4">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb responsive-small">
                            <li class="breadcrumb-item"><a href="/dashboard">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manajemen Data Pegawai</li>
                        </ol>
                    </nav>
                    <div class="card text-bg-success bg-gradient mb-3 bg-opacity-100">
                        <div class="card-header fw-semibold">Dashboard Learning Program Bank Bengkulu</div>
                        <div class="card-body">
                            <h4 class=" responsive-p1 fw-semibold mb-3">Manajemen Data Pegawai</h4>
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
                                {{-- <div class="col-lg-5 col-md-4 me-3">
                                    <form action="/dashboard/pegawai">
                                        <div class="input-group">
                                            <input type="text" class="form-control responsive-small"
                                                placeholder="Cari Berdasarkan Nama Pegawai" name="search"
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
                                </div> --}}
                            </div>
                            <hr>
                            <div class="table-responsive">
                                <table id="example" class="table table-hover responsive-small">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
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
                                                    </td>
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
        </script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            });
        </script>
    @endsection
