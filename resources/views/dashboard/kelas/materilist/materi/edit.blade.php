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
                            <li class="breadcrumb-item"><a href="/dashboard/materi-list/{{ $kelas }}">Daftar
                                    Materi</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Materi</li>
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
                                <h4 class="card-title fw-semibold responsive-p1 me-3">Edit Materi</h4>
                            </div>
                            <hr>
                            <form class="row g-2 responsive-small fw-semibold" method="post"
                                action="/dashboard/materi-list/{{ $materi_list->id }}/edit-materi"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="col-md-12 position-relative">
                                    <label for="validationCustom01" class="form-label ">Nama Materi<span
                                            class="text-danger">*</span></label>
                                    <div class="form-check">
                                        <input type="text" id="validationCustom01" class="form-control responsive-small"
                                            name="nama_materi" value="{{ old('nama_materi', $materi_list->nama_materi) }}"
                                            placeholder="Isi Nama Materi" required>
                                    </div>
                                    <label for="validationCustom01" class="form-label ">Jenis Materi<span
                                            class="text-danger">*</span></label>
                                    <div class="form-check">
                                        <input class="form-check-input" name="jenis_materi" value="ppt" type="radio"
                                            name="flexRadioDefault" id="flexRadioDefault1" checked>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Powerpoint File (.ppt)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="jenis_materi" value="video" type="radio"
                                            name="flexRadioDefault" id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Video File (.mp4)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="jenis_materi" value="pdf" type="radio"
                                            name="flexRadioDefault" id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Portable Document File (.pdf)
                                        </label>
                                    </div>
                                    <input type="text" id="validationCustom01" class="form-control responsive-small"
                                        name="nama_modul" value="{{ $nama_modul }}" required hidden>
                                    <input type="text" id="validationCustom01" class="form-control responsive-small"
                                        name="jenis" value="Materi" required hidden>
                                    <input type="text" id="validationCustom01" class="form-control responsive-small"
                                        name="kelas" value="{{ $kelas }}" required hidden>
                                </div>
                                <div class="col-md-12 position-relative desc" id="ppt">
                                    <label for="validationCustom01" class="form-label ">Upload File Powerpoint (.ppt)<span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="file" accept=".ppt, .pptx" name="materi1">
                                </div>
                                <div class="col-md-12 position-relative desc" id="video">
                                    <label for="validationCustom01" class="form-label ">Upload File Video (.mp4)<span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="file" accept="video/mp4" name="materi2">
                                </div>
                                <div class="col-md-12 position-relative desc" id="pdf">
                                    <label for="validationCustom01" class="form-label ">Upload File PDF (.pdf)<span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="file" accept=".pdf" name="materi3">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("div.desc").hide();
            $("input[name$='jenis_materi']").click(function() {
                var test = $(this).val();
                $("div.desc").hide();
                $("#" + test).show();
            });
        });
    </script>
@endsection
