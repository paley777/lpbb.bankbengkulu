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
        form i {
            cursor: pointer;
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
                            <li class="breadcrumb-item active" aria-current="page">Edit Kelas</li>
                        </ol>
                    </nav>
                    <div class="card text-bg-success bg-gradient mb-3 bg-opacity-100">
                        <div class="card-header fw-semibold">Dashboard Learning Program Bank Bengkulu</div>
                        <div class="card-body">
                            <h4 class=" responsive-p1 fw-semibold mb-3">Manajemen Kelas</h4>
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
                                <h4 class="card-title fw-semibold responsive-p1 me-3">Edit Kelas</h4>
                            </div>
                            <hr>
                            <form class="row g-2 responsive-small fw-semibold" method="post"
                                action="/dashboard/kelas/{{ $kelas->id }}">
                                @method('put')
                                @csrf
                                <div class="col-md-8 position-relative">
                                    <label for="validationCustom01" class="form-label ">Nama Kelas<span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="validationCustom01" class="form-control responsive-small"
                                        name="nama_modul" value="{{ old('nama_modul', $kelas->nama_modul) }}"
                                        placeholder="Isi Nama Kelas" required>
                                </div>
                                <div class="col-md-2 position-relative">
                                    <label for="validationCustom01" class="form-label">Tanggal Mulai<span
                                            class="text-danger">*</span></label>
                                    <input type="date" id="validationCustom01" class="form-control responsive-small"
                                        name="date_start" value="{{ old('date_start', $kelas->date_start) }}"
                                        placeholder="Isi Tanggal Mulai" required>
                                </div>
                                <div class="col-md-2 position-relative">
                                    <label for="validationCustom01" class="form-label">Tanggal Selesai<span
                                            class="text-danger">*</span></label>
                                    <input type="date" id="validationCustom01" class="form-control responsive-small"
                                        name="date_end" value="{{ old('date_end', $kelas->date_end) }}"
                                        placeholder="Isi Tanggal Selesai" required>
                                </div>
                                <div class="col-md-12 position-relative">
                                    <label for="validationCustom01" class="form-label">Deskripsi<span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control responsive-small" id="floatingTextarea2" name="deskripsi"
                                        placeholder="Isi Deskripsi Kelas" required style="height: 100px">{{ old('deskripsi', $kelas->deskripsi) }}</textarea>
                                </div>
                                <p>
                                    (Wajib terisi untuk kolom dengan tanda "<span class="text-danger">*</span>").
                                </p>
                                <button class="btn btn-outline-primary responsive-small fw-semibold" type="submit">
                                    Ubah Data <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M20 4L3 9.31372L10.5 13.5M20 4L14.5 21L10.5 13.5M20 4L10.5 13.5"
                                            stroke="#0275d8" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
