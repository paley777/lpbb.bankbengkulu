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
                            <li class="breadcrumb-item"><a href="/dashboard/uji-kompetensi">Manajemen Uji Kompetensi</a></li>
                            <li class="breadcrumb-item"><a href="/dashboard/pre-test">Manajemen Pre Test</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
                        </ol>
                    </nav>
                    <div class="card text-bg-success bg-gradient mb-3 bg-opacity-100">
                        <div class="card-header fw-semibold">Dashboard Learning Program Bank Bengkulu</div>
                        <div class="card-body">
                            <h4 class=" responsive-p1 fw-semibold mb-3">Manajemen Data Pre Test</h4>
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
                                <h4 class="card-title fw-semibold responsive-p1 me-3">Edit Pre Test</h4>
                            </div>
                            <hr>
                            <form class="row g-2 responsive-small fw-semibold" method="post"
                                action="/dashboard/pre-test/{{ $pretest->id }}">
                                @method('put')
                                @csrf
                                <div class="col-md-6 position-relative">
                                    <label for="validationCustom01" class="form-label ">Nama Pre Test<span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="validationCustom01" class="form-control responsive-small"
                                        name="nama_pretest" value="{{ old('nama_pretest', $pretest->nama_pretest) }}"
                                        placeholder="Isi Nama Pre Test" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="validationCustom01" class="form-label">Bank Soal<span
                                            class="text-danger">*</span></label>
                                    <select class="form-select responsive-small" name="nama_bank"
                                        aria-label="Default select example" required>
                                        <option selected>Pilih Bank Soal</option>
                                        @foreach ($banks as $bank)
                                            <option value="{{ $bank->nama_bank }}">{{ $bank->nama_bank }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 position-relative">
                                    <label for="validationCustom01" class="form-label">Jumlah Soal<span
                                            class="text-danger">*</span></label>
                                    <input type="text"
                                        onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"x
                                        id="validationCustom01" class="form-control responsive-small" name="jumlah_soal"
                                        placeholder="Isi Jumlah Soal"
                                        value="{{ old('jumlah_soal', $pretest->jumlah_soal) }}" required>
                                </div>
                                <div class="col-md-6 position-relative">
                                    <label for="validationCustom01" class="form-label">Durasi<span
                                            class="text-danger">*</span></label>
                                    <input type="time" step="1" id="validationCustom01"
                                        class="form-control responsive-small" name="durasi" placeholder="Isi Durasi"
                                        value="{{ old('durasi', $pretest->durasi) }}" required>
                                </div>
                                <p>
                                    (Wajib terisi untuk kolom dengan tanda "<span class="text-danger">*</span>").
                                </p>
                                <button class="btn btn-outline-primary responsive-small fw-semibold" type="submit">
                                    Ubah Data
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
