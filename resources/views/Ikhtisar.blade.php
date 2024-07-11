@extends('layouts.LandingPage')

@section('judul')
Profree - Ikhtisar
@endsection

@section('konten')
<div class="vh-100" style="background-image: url('assets/img/illustrations/landing.jpg'); background-size: cover; background-position: center;">
    <div class="position-absolute p-4" style="z-index: 1;">
        <a href="/" class="d-flex align-items-start gap-3">
            <img src="assets/img/icons/brands/profree.svg" style="width: 32px;" alt="Logo">
            <p class="display-5 fw-bold text-white">Profree</p>
        </a>
    </div>

    <div class="position-absolute top-0 end-0 mt-4 me-4 d-flex gap-3" style="z-index: 1;">
        <?php
        if (empty(session()->get("id"))) {
            echo '<a href="masuk" class="btn btn-info">masuk</a>';
            echo '<a href="daftar" class="btn btn-outline-info">daftar</a>';
        } else {
            echo '<a href="dashboard" class="btn btn-info">Dashboard</a>';
        }
        ?>
    </div>
    <div class="overlay position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.8);"></div>
    <div class="vh-100 position-relative d-flex flex-column justify-content-center align-items-center text-center text-white">
        <p class="display-3 fw-bold">TEMUKAN PROGRAMER KHUSUS TERBAIK</p>
        <p class="display-4">Profil Lengkap Berserta Kontak</p>
    </div>
</div>

<div class="vh-100 d-flex justify-content-around align-items-center">
    <div>
        <img src="assets/img/illustrations/programer.svg" style="width: 35vw;" alt="Ilustrasi">
    </div>
    <div class="d-flex flex-column gap-2" style="width: 50vw;">
        <h1 class="display-4 fw-bold">Kesulitan Mencari Programer?</h1>
        <p class="display-6" style="text-align: justify;">kami menghadirkan solusi pencarian programer lintas platform freelance populer. Dengan informasi penting seperti sudah berapa tahun bekerja dan jumlah projek yang telah dikerjakan, tak hanya itu kemampuan komunikasi dan juga penguasaan bahasa pemograman-nya juga. Menggunakan Metode Sistem Pendukung Keputusan AHP menjadikan pemilihan dan disesuaikan dengan kebutuhan yang menitik beratkan suatu nilai tertentu dari programer.</p>
        <a href="cari-programer" class="btn btn-info w-25">Cari Programer</a>
    </div>
</div>
@endsection