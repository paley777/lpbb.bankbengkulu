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
                            <li class="breadcrumb-item"><a href="/dashboard/pegawai">Manajemen Data Pegawai</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Pegawai</li>
                        </ol>
                    </nav>
                    <div class="card text-bg-success bg-gradient mb-3 bg-opacity-100">
                        <div class="card-header fw-semibold">Dashboard Learning Program Bank Bengkulu</div>
                        <div class="card-body">
                            <h4 class=" responsive-p1 fw-semibold mb-3">Manajemen Data Pegawai</h4>
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
                                <h4 class="card-title fw-semibold responsive-p1 me-3">Edit Pegawai</h4>
                            </div>
                            <hr>
                            <form class="row g-2 responsive-small fw-semibold" method="post"
                                action="/dashboard/pegawai/{{ $user->id }}">
                                @method('put')
                                @csrf
                                <div class="col-md-4 position-relative">
                                    <label for="validationCustom01" class="form-label ">Nama Lengkap<span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="validationCustom01" class="form-control responsive-small"
                                        name="name" value="{{ old('name', $user->name) }}" placeholder="Isi Nama"
                                        required>
                                </div>
                                <div class="col-md-2 position-relative">
                                    <label for="validationCustom01" class="form-label">NRPP<span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="validationCustom01" class="form-control responsive-small"
                                        name="nrpp" value="{{ old('nrpp', $user->nrpp) }}" placeholder="Isi NRPP"
                                        required>
                                </div>
                                <div class="col-md-3">
                                    <label for="validationCustom01" class="form-label">Jabatan<span
                                            class="text-danger">*</span></label>
                                    <input type="text" value="{{ old('jabatan', $user->jabatan) }}"
                                        id="validationCustom01" class="form-control responsive-small" name="jabatan"
                                        placeholder="Isi Jabatan"required>
                                </div>
                                <div class="col-md-3">
                                    <label for="validationCustom01" class="form-label">Unit Kerja<span
                                            class="text-danger">*</span></label>
                                    <input type="text" value="{{ old('unit_kerja', $user->unit_kerja) }}"
                                        id="validationCustom01" class="form-control responsive-small" name="unit_kerja"
                                        placeholder="Isi Unit Kerja" required>
                                    {{-- <select class="form-select responsive-small" name="unit_kerja"
                                        aria-label="Default select example" required>
                                        <option selected>Pilih Unit Kerja</option>
                                        <option value="Divisi Perencanaan dan Pengembangan">Divisi Perencanaan dan
                                            Pengembangan</option>
                                        <option value="Divisi Pengawasan Internal">Divisi Pengawasan Internal</option>
                                        <option value="Divisi Treasury">Divisi Treasury</option>
                                        <option value="Divisi Kredit">Divisi Kredit</option>
                                        <option value="Divisi Teknologi Informasi">Divisi Teknologi Informasi</option>
                                        <option value="Divisi Corporate Secretary">Divisi Corporate Secretary</option>
                                        <option value="Divisi Sumber Daya Manusia">Divisi Sumber Daya Manusia</option>
                                        <option value="Divisi Umum">Divisi Umum</option>
                                        <option value="Divisi Kepatuhan">Divisi Kepatuhan</option>
                                        <option value="Divisi Keuangan dan Akuntansi">Divisi Keuangan dan Akuntansi</option>
                                        <option value="Divisi Manajemen Risiko">Divisi Manajemen Risiko</option>
                                        <option value="ivisi Pemasaran dan Pengembangan Produk">Divisi Pemasaran dan
                                            Pengembangan Produk</option>
                                    </select> --}}
                                </div>
                                <div class="col-md-6 position-relative">
                                    <label for="validationCustom01" class="form-label">Username<span
                                            class="text-danger">*</span></label>
                                    <input type="text" value="{{ old('email', $user->email) }}" id="validationCustom01"
                                        class="form-control responsive-small" name="email" placeholder="Isi Username"
                                        required>
                                    <input type="text" id="validationCustom01" class="form-control responsive-small"
                                        name="role" value="Pegawai" required hidden>
                                </div>
                                <div class="col-md-6 position-relative">
                                    <label for="inputCity" class="form-label">Password<span
                                        class="text-danger">*</span></label>
                                    <div class="row">
                                        <div class="col-10">
                                            <input type="password" class="form-control responsive-small" id="password"
                                                placeholder="Isi Password" name="password" required>
                                        </div>
                                        <div class="col-auto">
                                            <h3><i class="bi bi-eye-slash" id="togglePassword"></i></h3>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    (Wajib terisi untuk kolom dengan tanda "<span class="text-danger">*</span>").
                                </p>
                                <button class="btn btn-outline-primary responsive-small fw-semibold" type="submit">
                                    Ubah Data <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20 4L3 9.31372L10.5 13.5M20 4L14.5 21L10.5 13.5M20 4L10.5 13.5" stroke="#0275d8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const togglePassword = document
            .querySelector('#togglePassword');

        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', () => {

            // Toggle the type attribute using
            // getAttribure() method
            const type = password
                .getAttribute('type') === 'password' ?
                'text' : 'password';

            password.setAttribute('type', type);

            // Toggle the eye and bi-eye icon
            this.classList.toggle('bi-eye');
        });
    </script>
@endsection
