@extends('layouts.LandingPage')

@section('judul')
Profree - Masuk
@endsection

@section('konten')
<div class="vh-100 d-flex justify-content-center align-items-center p-4">
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

                    <p class="mb-3 mt-3 text-center">Selamat Datang Kembali</p>

                    @if ($errors->has('gagal-masuk'))
                    <div class="alert alert-danger" role="alert">{{ $errors->first('gagal-masuk') }}</div>
                    @endif

                    <form id="formAuthentication" class="mb-3" action="/masuk" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="aku@gmail.com" />
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="sandi">Sandi</label>
                                <a href="lupa-sandi">
                                    <small>Lupa Sandi?</small>
                                </a>
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" id="sandi" class="form-control" name="sandi" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">Masuk</button>
                        </div>

                        <div class="d-flex gap-3 justify-content-center">
                            <a href="oauth/google" class="btn btn-outline-danger d-flex align-items-center gap-2">
                                <img src="assets/img/icons/brands/google.png" alt="Google" style="width: 16px;">
                                <strong>Masuk dengan Google</strong>
                            </a>
                            <a href="oauth/github" class="btn btn-dark d-flex align-items-center gap-2">
                                <img src="assets/img/icons/brands/github.png" alt="Google" style="width: 16px;">
                                <strong>Masuk dengan Github</strong>
                            </a>
                        </div>
                    </form>

                    <p class="text-center">
                        <span>Belum punya akun?</span>
                        <a href="daftar">
                            <span>daftar</span>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection