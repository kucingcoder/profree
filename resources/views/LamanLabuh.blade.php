@extends('layouts.User')

@section('judul')
Profree - Laman Labuh
@endsection

@section('konten')
<div class="col-xl">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Laman Labuh / Readme Profile</h5>
            <span>gunakan format markdown</span>
        </div>
        <div class="card-body">
            <form action="/laman-labuh/update-deskripsi" method="post">
                @csrf
                <div class="mb-3">
                    <div class="input-group input-group-merge">
                        <textarea rows="13" type="password" class="form-control" id="deskripsi" name="deskripsi" placeholder="# Head1" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2"><?= $deskripsi ?></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection