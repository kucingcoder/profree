@extends('layouts.User')

@section('judul')
Profree - Kemampuan
@endsection

@section('konten')
<div class="card">
    <h5 class="card-header">Kemampuan anda</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Bahasa Pemograman</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($skill as $item)
                <tr>
                    <td><strong>{{ $item->produk }}</strong></td>
                    <td>{{ $item->bahasa }}</td>
                    <td>
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
            <h5 class="mb-0">Tambah Kemampuan</h5>
        </div>
        <div class="card-body">
            <form action="/kemampuan/tambah" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="produk">Produk</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bx-globe"></i></span>
                        <select name="produk" id="produk" class="form-control">
                            <option value="0" selected disabled>Pilih...</option>
                            <?php $index = 1; ?>
                            @foreach($produk as $item)
                            <option value="<?= $index ?>">{{ $item->nama }}</option>
                            <?php $index++; ?>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="bahasa">Bahasa</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bx-flag"></i></span>
                        <select name="bahasa" id="bahasa" class="form-control">
                            <option value="0" selected disabled>Pilih...</option>
                            <?php $index = 1; ?>
                            @foreach($bahasa as $item)
                            <option value="<?= $index ?>">{{ $item->nama }}</option>
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
    function Hapus(id) {
        var result = confirm("Apakah anda yakin ingin menghapus ini?");
        if (result) {
            window.location.href = '<?= url("/kemampuan/hapus") ?>/' + id;
        }
    }
</script>