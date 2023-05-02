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
                            <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Manajemen Soal</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Soal</li>
                        </ol>
                    </nav>
                    <div class="card text-bg-success bg-gradient mb-3 bg-opacity-100">
                        <div class="card-header fw-semibold">Dashboard Learning Program Bank Bengkulu</div>
                        <div class="card-body">
                            <h4 class=" responsive-p1 fw-semibold mb-3">Manajemen Soal</h4>
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
                                <h4 class="card-title fw-semibold responsive-p1 me-3">Tambah Soal</h4>
                            </div>
                            <hr>
                            <form class="row g-2 responsive-small fw-semibold" method="post" action="/dashboard/soal">
                                @csrf
                                <div class="col-md-12 position-relative">
                                    <label for="validationCustom01" class="form-label ">Soal<span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="validationCustom01" class="form-control responsive-small"
                                        name="nama_bank" value="{{ $nama_bank }}" placeholder="Isi Nama Bank" required
                                        readonly hidden>
                                    <input type="text" id="validationCustom01" class="form-control responsive-small"
                                        name="bankid" value="{{ $bankid }}" placeholder="Isi Nama Bank" required
                                        readonly hidden>
                                    <textarea class="form-control responsive-small" id="floatingTextarea2" name="soal" placeholder="Isi Soal" required
                                        style="height: 100px"></textarea>
                                </div>
                                @csrf
                                <div class="col-md-12 position-relative">
                                    <label for="validationCustom01" class="form-label ">Jawaban<span
                                            class="text-danger">*</span></label>
                                    <div class="table-responsive">
                                        <table class="table table-hover responsive-small">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Kunci Jawaban</th>
                                                    <th scope="col">Option A</th>
                                                    <th scope="col">Option B</th>
                                                    <th scope="col">Option C</th>
                                                    <th scope="col">Option D</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="correct_ans" value="A" id="flexRadioDefault1">
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                A
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="correct_ans" value="B" id="flexRadioDefault2" checked>
                                                            <label class="form-check-label" for="flexRadioDefault2">
                                                                B
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="correct_ans" value="C" id="flexRadioDefault3" checked>
                                                            <label class="form-check-label" for="flexRadioDefault3">
                                                                C
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="correct_ans" value="D" id="flexRadioDefault4" checked>
                                                            <label class="form-check-label" for="flexRadioDefault4">
                                                                D
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <textarea class="form-control responsive-small" id="floatingTextarea2" name="ans_a" placeholder="Isi Opsi A" required
                                                            style="height: 100px"></textarea>
                                                    </td>
                                                    <td>
                                                        <textarea class="form-control responsive-small" id="floatingTextarea2" name="ans_b" placeholder="Isi Opsi B" required
                                                            style="height: 100px"></textarea>
                                                    </td>
                                                    <td>
                                                        <textarea class="form-control responsive-small" id="floatingTextarea2" name="ans_c" placeholder="Isi Opsi C" required
                                                            style="height: 100px"></textarea>
                                                    </td>
                                                    <td>
                                                        <textarea class="form-control responsive-small" id="floatingTextarea2" name="ans_d" placeholder="Isi Opsi D" required
                                                            style="height: 100px"></textarea>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <p>
                                        (Wajib terisi untuk kolom dengan tanda "<span class="text-danger">*</span>").
                                    </p>
                                    <button class="btn btn-outline-primary responsive-small fw-semibold" type="submit">
                                        Simpan Data
                                    </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
