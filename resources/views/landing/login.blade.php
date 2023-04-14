@extends('landing.layouts.main2')

@section('container')
    <style>
        .background-radial-gradient {
            background-color: hsl(218, 41%, 15%);
            background-image: radial-gradient(650px circle at 0% 0%,
                    hsl(218, 41%, 35%) 15%,
                    hsl(218, 41%, 30%) 35%,
                    hsl(218, 41%, 20%) 75%,
                    hsl(218, 41%, 19%) 80%,
                    transparent 100%),
                radial-gradient(1250px circle at 100% 100%,
                    hsl(218, 41%, 45%) 15%,
                    hsl(218, 41%, 30%) 35%,
                    hsl(218, 41%, 20%) 75%,
                    hsl(218, 41%, 19%) 80%,
                    transparent 100%);
        }

        #radius-shape-1 {
            height: 220px;
            width: 220px;
            top: -60px;
            left: -130px;
            background: radial-gradient(#44006b, #ad1fff);
            overflow: hidden;
        }

        #radius-shape-2 {
            border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
            bottom: -60px;
            right: -110px;
            width: 300px;
            height: 300px;
            background: radial-gradient(#44006b, #ad1fff);
            overflow: hidden;
        }

        .bg-glass {
            background-color: hsla(0, 0%, 100%, 0.9) !important;
            backdrop-filter: saturate(200%) blur(25px);
        }
    </style>
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
    <section class="background-radial-gradient overflow-hidden">
        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5" style="font-family: Raleway;">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                    <h1 class="responsive-header fw-bold" style="color: hsl(218, 81%, 95%)">
                        Masuk
                    </h1>
                    <p class="mb-4 responsive-small opacity-70" style="color: hsl(218, 81%, 85%)">
                        Silakan isi email dan password di sini.
                        <br>
                        Apabila lupa password/email silakan klik
                        <!-- Button trigger modal -->
                        <button type="button" class="bg-transparent link-light" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Pulihkan Akun
                        </button>
                        untuk
                        mengajukan prosedur pemulihan akun ke
                        operator sistem.
                    </p>
                </div>
                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
                    <div class="card bg-glass">
                        <div class="card-body px-4 py-5 px-md-5">
                            @if (session()->has('loginError'))
                                <div class="container">
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('loginError') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                </div>
                            @endif
                            <form method="POST" action="/login">
                                @csrf
                                <div class="form-outline mb-4">
                                    <input type="text" name="email" class="form-control responsive-small" required />
                                    <label class="form-label responsive-small" for="form3Example3">Username Anda</label>
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="password" name="password" class="form-control responsive-small" required />
                                    <label class="form-label responsive-small" for="form3Example4">Password Anda</label>
                                </div>
                                <button type="submit"
                                    class="btn btn-warning btn-sm fs-5 fw-semibold rounded-pill shadow-sm me-2 py-2 px-4"
                                    style="width: 166.475px;height: 40px;" data-bss-hover-animate="tada">
                                    Masuk
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Pulihkan Akun</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="responsive-small">Untuk pengajuan pemulihan akun silakan hubungi Bagian Pendidikan dan
                        Pelatihan</p>
                    <p class="responsive-small">Divisi Sumber Daya Manusia Bank Bengkulu</p>
                    {{-- <a class="responsive-small"
                        href="mailto:diklat.bankbengkulu@gmail.com?subject=Pengajuan%20Pemulihan%20Akun%20LPBB%20a%2Fn%20%5BNAMA%20ANDA%5D%20%5BNRPP%5D&body=Isi%20pengajuan%20Anda%20di%20sini%20dengan%20format%20yang%20rapi."
                        class="link">Email ke diklat.bankbengkulu@gmail.com</a> --}}
                    <p class="responsive-small fw-semibold">
                        Email ke diklat.bankbengkulu@gmail.com
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
