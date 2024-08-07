@extends('layouts.User')

@section('judul')
Profree - Platform
@endsection

@section('konten')
<div class="card">
    <h5 class="card-header">Platform freelance anda</h5>
    <div class="table-responsive text-nowrap">
        <table id="platform" class="table table-striped">
            <thead>
                <tr>
                    <th>Website</th>
                    <th>Link Profil</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($kantor as $item)
                <tr>
                    <td style="vertical-align: middle;"><strong>{{ $item->nama }}</strong></td>
                    <td style="vertical-align: middle;"><a href="{{ $item->profil }}" target="_blank">{{ $item->profil }}</a></td>
                    <td style="vertical-align: middle;">
                        <button class="btn btn-danger" onclick="Hapus('{{ $item->id }}')"><i class="bx bx-trash">Hapus</i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="col-xl mt-4">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Tambah platform freelance</h5>
        </div>
        <div class="card-body">
            <form action="/platform/tambah" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="website">Website</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bx-home-alt"></i></span>
                        <select name="website" id="website" class="form-control" required>
                            <?php $index = 1; ?>
                            @foreach($website as $item)
                            <option value="<?= $index ?>">{{ $item->nama }}</option>
                            <?php $index++; ?>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="profil">Link Profil</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bx-globe"></i></span>
                        <input type="text" id="profil" name="profil" class="form-control" placeholder="https://..." aria-label="john.doe" aria-describedby="basic-icon-default-email2" required />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</div>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const table = new simpleDatatables.DataTable("#platform");
    });

    function Hapus(id) {
        var result = confirm("Apakah anda yakin ingin menghapus ini?");
        if (result) {
            window.location.href = '<?= url("/platform/hapus") ?>/' + id;
        }
    }
</script>