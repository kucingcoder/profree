@extends('layouts.LandingPage')

@section('judul')
Profree - Belum Aktif
@endsection

@section('konten')
<div class="vh-100 d-flex justify-content-center align-items-center p-4">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="container-xxl">
            <div class="authentication-wrapper authentication-basic container-p-y">
                <div class="authentication-inner py-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="app-brand justify-content-center">
                                <a href="index.html" class="app-brand-link gap-2">
                                    <span class="app-brand-logo demo">
                                        <img src='<?= url("assets/img/icons/brands/profree.svg") ?>' style="width: 64px;" alt="Logo">
                                    </span>
                                    <span class="app-brand-text demo text-body fw-bolder">Profree</span>
                                </a>
                            </div>
                            <h4 class="mb-2">Akun-mu Belum Aktif</h4>
                            <p class="mb-4">cek inbox email, jika tidak ada periksa spam atau klik link dibawah</p>
                            <button id="tombol" class="btn btn-secondary" disabled onclick='window.location.href = "<?= url("/aktivasi/kirim-ulang/" . $email) ?>";'>Kirim Ulang Link Aktivasi</button>
                            <p id="countdown" class="mt-2">anda dapat mengirim ulang dalam 60 detik</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const countdownElement = document.getElementById("countdown");
        const button = document.getElementById("tombol");
        let secondsLeft = 60;

        const countdownInterval = setInterval(function() {
            secondsLeft--;
            countdownElement.textContent = `anda dapat mengirim ulang dalam ${secondsLeft} detik`;

            if (secondsLeft <= 0) {
                clearInterval(countdownInterval);
                countdownElement.remove();
                button.classList.remove("btn-secondary")
                button.removeAttribute("disabled");
                button.classList.add("btn-primary");
            }
        }, 1000);
    });
</script>
@endsection