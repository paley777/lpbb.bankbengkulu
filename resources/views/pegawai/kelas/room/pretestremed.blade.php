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
                            <li class="breadcrumb-item active" aria-current="page">{{ $kelas->nama_modul }}</li>
                            <li class="breadcrumb-item active" aria-current="page">Ujian (Remedial)</li>
                        </ol>
                    </nav>
                    <div class="card text-bg-success bg-gradient mb-3 bg-opacity-100">
                        <div class="card-header fw-semibold">Dashboard Learning Program Bank Bengkulu</div>
                        <div class="card-body">
                            <h4 class=" responsive-p1 fw-semibold mb-3">{{ $kelas->nama_modul }}
                            </h4>
                            <button type="button" class="btn btn-lg btn-warning fw-semibold">
                                Waktu Tersisa: <span id="timer" class="badge badge-lg fs-4 text-bg-danger">0.00</span>
                            </button>
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
                                <h4 class="card-title fw-semibold responsive-p1 me-3">Pre Test</h4>
                            </div>
                            <hr>
                            <table class="table table-hover responsive-small">
                                <tbody>
                                    <tr>
                                        <th scope="row">1
                                        </th>
                                        <td>Nama Ujian</td>
                                        <td>:</td>
                                        <td>{{ $pretest_info->nama_pretest }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2
                                        </th>
                                        <td>Jumlah Soal</td>
                                        <td>:</td>
                                        <td>{{ $pretest_info->jumlah_soal }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3
                                        </th>
                                        <td>Durasi Ujian</td>
                                        <td>:</td>
                                        <td>{{ $pretest_info->durasi }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <h6 class="card-title fw-normal responsive-small me-3">Jawablah pertanyaan di bawah ini dengan
                                tepat!</h6>
                            <hr>
                            <form name="quiz" class="row g-2 responsive-small fw-semibold" method="post"
                                action="/kelas/{{ $kelas->id }}/room/{{ $materi->id }}/pretest-remedial">
                                @csrf
                                @foreach ($data_soals as $data_soal)
                                    <div class="card shadow-sm bg-light bg-gradient mb-3">
                                        <div class="card-body">
                                            <h6 class="card-title fw-semibold responsive-small me-3">
                                                {{ $data_soal->soal }}<span class="text-danger">*</span></h6>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-check">
                                                        <input type="text" id="validationCustom01"
                                                            class="form-control responsive-small" name="id[]"
                                                            value="{{ $data_soal->id }}" required hidden>
                                                        <input class="form-check-input responsive-small" type="radio"
                                                            name="ans_{{ $data_soal->id }}[]" value="A"
                                                            id="flexRadioDefault1" required>
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            A
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input responsive-small" type="radio"
                                                            name="ans_{{ $data_soal->id }}[]" value="B"
                                                            id="flexRadioDefault2">
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                            B
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-check">
                                                        <input class="form-check-input responsive-small" type="radio"
                                                            name="ans_{{ $data_soal->id }}[]" value="C"
                                                            id="flexRadioDefault3">
                                                        <label class="form-check-label" for="flexRadioDefault3">
                                                            C
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input responsive-small" type="radio"
                                                            name="ans_{{ $data_soal->id }}[]" value="D"
                                                            id="flexRadioDefault4">
                                                        <label class="form-check-label" for="flexRadioDefault4">
                                                            D
                                                        </label>
                                                    </div>
                                                    <div class="form-check" hidden>
                                                        <input class="form-check-input responsive-small" type="radio"
                                                            name="ans_{{ $data_soal->id }}[]" value="E"
                                                            id="flexRadioDefault4" checked>
                                                        <label class="form-check-label" for="flexRadioDefault4">
                                                            E
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <button class="btn btn-outline-primary responsive-small fw-semibold" type="submit"
                                    onclick="return confirm('Kumpulkan Jawaban?')">
                                    Selesai
                                </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- script for time limitation of exam -->
    <script type="text/javascript">
        var timeoutHandle;

        function countdown(time) {
            if (time > 60) {
                var minutes = Math.floor(time / 60);
                var second = time - (minutes * 60);
                if (second == 0) {
                    var seconds = second + 60;
                    var mins = minutes;
                } else {
                    var seconds = second;
                    var mins = minutes;
                }
            } else {
                var minutes = 1;
                var second = time;

                var seconds = second;
                var mins = minutes;
            }

            function tick() {
                var counter = document.getElementById("timer");
                var current_minutes = mins - 1
                seconds--;
                counter.innerHTML =
                    current_minutes.toString() + ":" + (seconds < 10 ? "0" : "") + String(seconds);
                if (seconds > 0) {
                    timeoutHandle = setTimeout(tick, 1000);
                } else {
                    if (mins > 1) {
                        // countdown(mins-1);   never reach “00″ issue solved:Contributed by Victor Streithorst
                        setTimeout(function() {
                            countdown(mins - 1);
                            countdown(seconds = 60)
                        }, 1000);
                    }
                }
            }
            tick();
        }
        countdown('<?php echo $durasi; ?>');
    </script>

    <!-- script for disable url -->
    <script type="text/javascript">
        var time = '<?php echo $durasi; ?>';
        var realtime = time * 1000;
        setTimeout(function() {
                alert('Waktu Habis! Ujian anda akan langsung dikumpulkan.');
                document.quiz.submit();
            },
            realtime);
    </script>
@endsection
