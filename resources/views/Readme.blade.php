@extends('layouts.User')

@section('judul')
Profree
@endsection

@section('konten')
<div class="col-xl">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Profil <?= $nama ?></h5>
        </div>
        <div class="card-body">
            <?= $deskripsi ?>
        </div>
    </div>
</div>
@endsection