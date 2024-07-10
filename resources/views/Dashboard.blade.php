@extends('layouts.User')

@section('judul')
Profree - Programer Terbaik
@endsection

@section('konten')
<div class="card">
    <h5 class="card-header">Pencarian</h5>
    <div class="card-body">
        <form class="d-flex gap-5 align-items-center" action="/dashboard" method="post">
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
            <button type="submit" class="btn btn-primary" style="height: 38px; margin-top: 10px;">Cari</button>
        </form>
    </div>
</div>

<div class="card mt-4">
    <h5 class="card-header">Daftar Programer Dari Yang Terbaik</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php
                if (!empty($pengurutan)) {
                    foreach ($pengurutan as $item) {
                        $parts = explode('|', $item);
                        echo "<tr>";
                        echo "<td>" . $parts[0] . "</td>";
                        echo "<td>" . $parts[1] . "</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<div class="col-lg-4 col-md-3 mt-2">
    <div class="modal fade" id="modalScrollable" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalScrollableTitle">AHP</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card mt-4">
                        <h5 class="card-header">Alternatif</h5>
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Projek</th>
                                        <th>Komunikasi</th>
                                        <th>Bahasa Pemograman</th>
                                        <th>Pengalaman</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @if($alternatif->isNotEmpty())
                                    @foreach($alternatif as $item)
                                    <tr>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->projek }}</td>
                                        <td>{{ $item->bahasa_komunikasi }}</td>
                                        <td>{{ $item->bahasa_pemograman }}</td>
                                        <td>{{ $item->pengalaman }}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <h5 class="card-header">Perbandingan Antar Kriteria</h5>
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>C1</th>
                                        <th>C2</th>
                                        <th>C3</th>
                                        <th>C4</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <?php
                                    if (count($perbandingan) > 0) {
                                        $index = 1;
                                        foreach ($perbandingan as $item) {
                                            echo "<tr>";
                                            echo "<td>C" . $index . "</td>";
                                            echo "<td>" . $item[0] . "</td>";
                                            echo "<td>" . $item[1] . "</td>";
                                            echo "<td>" . $item[2] . "</td>";
                                            echo "<td>" . $item[3] . "</td>";
                                            echo "</tr>";

                                            $index++;
                                        }

                                        echo "<tr>";
                                        echo "<td>Jumlah</td>";
                                        echo "<td>" . $jpc1 . "</td>";
                                        echo "<td>" . $jpc2 . "</td>";
                                        echo "<td>" . $jpc3 . "</td>";
                                        echo "<td>" . $jpc4 . "</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <h5 class="card-header">Normalisasi Perbandingan Antar Kriteria</h5>
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>C1</th>
                                        <th>C2</th>
                                        <th>C3</th>
                                        <th>C4</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <?php
                                    if (count($normalisasi) > 0) {
                                        $index = 1;
                                        foreach ($normalisasi as $item) {
                                            echo "<tr>";
                                            echo "<td>C" . $index . "</td>";
                                            echo "<td>" . $item[0] . "</td>";
                                            echo "<td>" . $item[1] . "</td>";
                                            echo "<td>" . $item[2] . "</td>";
                                            echo "<td>" . $item[3] . "</td>";
                                            echo "</tr>";

                                            $index++;
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <h5 class="card-header">Bobot & Eigen Value</h5>
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Bobot</th>
                                        <th>Eigen Value</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <?php
                                    if (count($bobot) > 0) {
                                        $combined = array_map(null, $bobot, $eigen);
                                        foreach ($combined as $values) {
                                            list($value1, $value2) = $values;
                                            echo "<tr>";
                                            echo "<td>" . $value1 . "</td>";
                                            echo "<td>" . $value2 . "</td>";
                                            echo "</tr>";
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <div class="card-body">
                            <h4>T : <?= $t ?></h4>
                            <h4>CI : <?= $ci ?></h4>
                            <h4>RI : <?= $ri ?></h4>
                            <h4>konsistensi : <?= $konsisten ?></h4>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <h5 class="card-header">Hasil Perbandingan C1 Antar Alternatif</h5>
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @if(count($c1) > 0)
                                    @foreach($c1 as $item)
                                    <tr>
                                        <td>{{ $item }}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <h5 class="card-header">Hasil Perbandingan C2 Antar Alternatif</h5>
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @if(count($c2) > 0)
                                    @foreach($c2 as $item)
                                    <tr>
                                        <td>{{ $item }}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <h5 class="card-header">Hasil Perbandingan C3 Antar Alternatif</h5>
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @if(count($c3) > 0)
                                    @foreach($c3 as $item)
                                    <tr>
                                        <td>{{ $item }}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <h5 class="card-header">Hasil Perbandingan C4 Antar Alternatif</h5>
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @if(count($c4) > 0)
                                    @foreach($c4 as $item)
                                    <tr>
                                        <td>{{ $item }}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <h5 class="card-header">Perangkingan</h5>
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <?php
                                    if (count($perangkingan) > 0) {
                                        foreach ($perangkingan as $item) {
                                            echo "<tr>";
                                            $parts = explode('|', $item);
                                            echo "<td>" . $parts[0] . "</td>";
                                            echo "<td>" . $parts[1] . "</td>";
                                            echo "</tr>";
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card mt-4">
                        <h5 class="card-header">Pengurutan</h5>
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <?php
                                    if (count($pengurutan) > 0) {
                                        foreach ($pengurutan as $item) {
                                            echo "<tr>";
                                            $parts = explode('|', $item);
                                            echo "<td>" . $parts[0] . "</td>";
                                            echo "<td>" . $parts[1] . "</td>";
                                            echo "</tr>";
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    <div class="demo-inline-spacing">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalScrollable">Lihat Perhitungan</button>
    </div>
</div>
@endsection