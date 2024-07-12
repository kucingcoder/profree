@extends('layouts.LandingPage')

@section('judul')
Profree - Lupa Sandi
@endsection

@section('konten')
<div class="vh-100 d-flex justify-content-center align-items-center p-4">
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

                    <h4 class="mb-2">Lupa Kata Sandi? 🔒</h4>
                    <p class="mb-4">Masukan email-mu kami akan mengirimkan link untuk mengatur ulang sandi</p>
                    <form id="formAuthentication" class="mb-3" action="/lupa-sandi" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="aku@gmail.com" autofocus required />
                        </div>
                        <button class="btn btn-primary d-grid w-100">Kirim Link Reset Sandi</button>
                    </form>

                    @if(session('berhasil-email'))
                    <div class="alert alert-success" role="alert">{{ session('berhasil-email') }}</div>
                    @endif

                    @if ($errors->has('gagal-email'))
                    <div class="alert alert-danger" role="alert">{{ $errors->first('gagal-email') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection