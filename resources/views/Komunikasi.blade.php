@extends('layouts.User')

@section('judul')
Profree - Bahasa Komunikasi
@endsection

@section('konten')
<div class="card">
    <h5 class="card-header">Bahasa komunikasi anda</h5>
    <div class="table-responsive text-nowrap">
        <table id="komunikasi" class="table table-striped">
            <thead>
                <tr>
                    <th>Bahasa</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($bicara as $item)
                <tr>
                    <td style="vertical-align: middle;"><strong>{{ $item->bahasa }}</strong></td>
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
            <h5 class="mb-0">Tambah bahasa komunikasi</h5>
        </div>
        <div class="card-body">
            <form action="/bahasa-komunikasi/tambah" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="bahasa">Bahasa</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bx-flag"></i></span>
                        <select name="bahasa" id="bahasa" class="form-control" required>
                            <?php $index = 1; ?>
                            @foreach($bahasa as $item)
                            <option value="<?= $index ?>">{{ $item->bahasa }}</option>
                            <?php $index++; ?>
                            @endforeach
                        </select>
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
        const table = new simpleDatatables.DataTable("#komunikasi");
    });

    function Hapus(id) {
        var result = confirm("Apakah anda yakin ingin menghapus ini?");
        if (result) {
            window.location.href = '<?= url("/bahasa-komunikasi/hapus") ?>/' + id;
        }
    }
</script>