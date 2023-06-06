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
                            <li class="breadcrumb-item active" aria-current="page">Rekapitulasi Data Pegawai</li>
                        </ol>
                    </nav>
                    <div class="card text-bg-success bg-gradient mb-3 bg-opacity-100">
                        <div class="card-header fw-semibold">Dashboard Learning Program Bank Bengkulu</div>
                        <div class="card-body">
                            <h4 class=" responsive-p1 fw-semibold mb-3">Rekapitulasi Data Pegawai</h4>
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
                        <img src="{{ asset('storage/images/tatacara.jpg') }}" alt="Logo" width="720" height="384"
                            class="">
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
