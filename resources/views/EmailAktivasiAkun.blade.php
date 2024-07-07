@extends('layouts.LandingPage')

@section('judul')
Profree - Aktivasi
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
                                        <img src="assets/img/icons/brands/profree.svg" style="width: 64px;" alt="Logo">
                                    </span>
                                    <span class="app-brand-text demo text-body fw-bolder">Profree</span>
                                </a>
                            </div>
                            <h4 class="mb-2">Akun-mu Belum Aktif</h4>
                            <p class="mb-4">klik tombol dibawah ini untuk mengaktifkan-nya</p>
                            <a href="http://localhost/konfirmasi-email/{{$kode}}" class="btn btn-primary d-grid w-100">Aktivasi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection