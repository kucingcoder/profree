@extends('layouts.User')

@section('judul')
Profree - Profil
@endsection

<?php
$L = "";
$P = "";

switch ($jenis_kelamin_id) {
    case 1:
        $L = "selected";
        break;
    default:
        $P = "selected";
        break;
}

$FL = "";
$PM = "";

switch ($jenis_akun_id) {
    case 1:
        $FL = "selected";
        break;
    default:
        $PM = "selected";
        break;
}
?>

@section('konten')

@if(session('berhasil-update-profil'))
<div class="alert alert-success" role="alert">{{ session('berhasil-update-profil') }}</div>
@endif

@if(session('berhasil-update-riwayat'))
<div class="alert alert-success" role="alert">{{ session('berhasil-update-riwayat') }}</div>
@endif

@if(session('berhasil-update-sandi'))
<div class="alert alert-success" role="alert">{{ session('berhasil-update-sandi') }}</div>
@endif

@if ($errors->has('gagal-ubah-sandi'))
<div class="alert alert-danger" role="alert">{{ $errors->first('gagal-ubah-sandi') }}</div>
@endif

<div class="col-xl">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Data Diri</h5>
        </div>
        <div class="card-body">
            <form action="/profil/update-data-diri" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="nama">Nama</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bx-user"></i></span>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="nama" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" value="<?= $nama ?>" required />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bx-male-sign"></i></span>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                            <option value="1" <?= $L ?>>Laki - Laki</option>
                            <option value="2" <?= $P ?>>perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="jenis_akun">Jenis Akun</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bxs-backpack"></i></span>
                        <select name="jenis_akun" id="jenis_akun" class="form-control" required>
                            <option value="1" <?= $FL ?>>Freelancer</option>
                            <option value="2" <?= $PM ?>>Projek Manager</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="domisili">Domisili</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bx-buildings"></i></span>
                        <input type="text" id="domisili" name="domisili" class="form-control" placeholder="domisili" aria-label="ACME Inc." aria-describedby="basic-icon-default-company2" value="<?= $domisili ?>" required />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="email">Email</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                        <input type="text" id="email" name="email" class="form-control" placeholder="email" aria-label="john.doe" aria-describedby="basic-icon-default-email2" value="<?= $email ?>" required />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

<div class="col-xl">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Riwayat</h5>
        </div>
        <div class="card-body">
            <form action="/profil/update-riwayat" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="projek">Jumlah Projek</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bx-bug-alt"></i></span>
                        <input type="text" class="form-control" id="projek" name="projek" placeholder="0" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" value="<?= $jumlah_projek ?>" required />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="pengalaman">pengalaman</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bxs-hourglass-top"></i></span>
                        <input type="text" id="pengalaman" name="pengalaman" class="form-control" placeholder="0" aria-label="john.doe" aria-describedby="basic-icon-default-email2" value="<?= $pengalaman ?>" required />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

<div class="col-xl">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Ganti Sandi</h5>
        </div>
        <div class="card-body">
            <form action="/profil/update-sandi" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="sandi_lama">Sandi Lama</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bx-lock-open-alt"></i></span>
                        <input type="password" class="form-control" id="sandi_lama" name="sandi_lama" placeholder="********" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2" required />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="sandi_baru">Sandi Baru</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bx-lock-alt"></i></span>
                        <input type="password" id="sandi_baru" name="sandi_baru" class="form-control" placeholder="********" aria-label="john.doe" aria-describedby="basic-icon-default-email2" required />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection