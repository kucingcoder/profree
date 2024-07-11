@extends('layouts.LandingPage')

@section('judul')
Profree - Daftar
@endsection

@section('konten')
<div class="d-flex justify-content-center align-items-center p-4">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <div class="card">
                <div class="card-body">
                    <div class="app-brand justify-content-center">
                        <a href="/" class="app-brand-link gap-2">
                            <span class="app-brand-logo demo">
                                <img src="assets/img/icons/brands/profree.svg" style="width: 64px;" alt="Logo">
                            </span>
                            <span class="app-brand-text demo text-body fw-bolder">Profree</span>
                        </a>
                    </div>

                    <p class="mb-3 mt-3 text-center">Buat Akun Baru Untuk Menikmati</p>

                    @if ($errors->has('gagal-daftar'))
                    <div class="alert alert-danger" role="alert">{{ $errors->first('gagal-daftar') }}</div>
                    @endif

                    <form id="formAuthentication" class="mb-3" action="/daftar" method="POST">
                        @csrf
                        <div class="d-flex gap-3">
                            <div class="">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="aku" autofocus required />
                                </div>

                                <div class="mb-3 d-flex flex-column">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <select class="form-select" name="jenis_kelamin" id="jenis_kelamin" required>
                                        <option value="1">Laki - Laki</option>
                                        <option value="2">Perempuan</option>
                                    </select>
                                </div>

                                <div class="mb-3 d-flex flex-column">
                                    <label for="jenis_akun" class="form-label">Jenis Akun</label>
                                    <select class="form-select" name="jenis_akun" id="jenis_akun" required>
                                        <option value="1">Freelancer</option>
                                        <option value="2">Projek Manager</option>
                                    </select>
                                </div>
                            </div>

                            <div class="">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="aku@gmail.com" required />
                                </div>
                                <div class="mb-3 form-password-toggle">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="sandi">Sandi</label>
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="sandi" class="form-control" name="sandi" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" required />
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                </div>

                                <div class="mb-3 form-password-toggle">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="konfirmasi_sandi">Konfirmasi Sandi</label>
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="konfirmasi_sandi" class="form-control" name="konfirmasi_sandi" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" required />
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">Daftar</button>
                        </div>

                        <a href="oauth/google" class="btn btn-outline-danger d-flex justify-content-center align-items-center gap-2">
                            <img src="assets/img/icons/brands/google.png" alt="Google" style="width: 16px;">
                            <strong>Daftar dengan Google</strong>
                        </a>
                    </form>

                    <p class="text-center">
                        <span>Sudah punya akun?</span>
                        <a href="masuk">
                            <span>Masuk</span>
                        </a>
                    </p>

                    <div class="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection