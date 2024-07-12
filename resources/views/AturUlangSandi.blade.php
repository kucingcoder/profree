@extends('layouts.LandingPage')

@section('judul')
Profree - Atur Ulang Sandi
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

                    <h4 class="mb-2">Buat Kata Sandi Baru 🔒</h4>
                    <form id="formAuthentication" class="mb-3" action="/ganti-sandi" method="POST">
                        @csrf
                        <input id="id" name="id" type="hidden" value="<?= $id ?>">
                        <div class="mb-3">
                            <label for="sandi" class="form-label">Sandi</label>
                            <input type="password" class="form-control" id="sandi" name="sandi" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" autofocus required />
                        </div>
                        <div class="mb-3">
                            <label for="konfirmasi_sandi" class="form-label">Konfirmasi Sandi</label>
                            <input type="password" class="form-control" id="konfirmasi_sandi" name="konfirmasi_sandi" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" autofocus required />
                        </div>
                        <button class="btn btn-primary d-grid w-100">Simpan</button>
                    </form>

                    @if(session('berhasil-sandi'))
                    <div class="alert alert-success" role="alert">{{ session('berhasil-sandi') }}. silahkan <a href="<?= url('masuk') ?>">Masuk</a></div>
                    @endif

                    @if ($errors->has('gagal-sandi'))
                    <div class="alert alert-danger" role="alert">{{ $errors->first('gagal-sandi') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection