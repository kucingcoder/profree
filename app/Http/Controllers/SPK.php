<?php

namespace App\Http\Controllers;

use App\Models\BahasaPemograman;
use App\Models\JenisProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Double;

class SPK extends Controller
{
    function Index()
    {
        $produk = JenisProduk::all();
        $bahasa = BahasaPemograman::all();

        $data = [
            "produk" => $produk,
            "bahasa" => $bahasa
        ];

        return view("Dashboard", $data);
    }

    function Hitung(Request $request)
    {
        $dproduk = JenisProduk::all();
        $dbahasa = BahasaPemograman::all();

        $produk = $request->produk;
        $bahasa = $request->bahasa;

        $alternatif = DB::table('pengguna as u')
            ->select(
                'u.id',
                'u.nama',
                'u.projek',
                DB::raw('COUNT(DISTINCT c.bahasa_manusia_id) AS bahasa_komunikasi'),
                DB::raw('(SELECT COUNT(k2.bahasa_pemograman_id) FROM kemampuan k2 WHERE k2.pengguna_id = u.id) AS bahasa_pemograman'),
                'u.pengalaman'
            )
            ->join('kemampuan as k', 'u.id', '=', 'k.pengguna_id')
            ->join('komunikasi as c', 'u.id', '=', 'c.pengguna_id')
            ->where('k.jenis_produk_id', $produk)
            ->where('k.bahasa_pemograman_id', $bahasa)
            ->where('u.jenis_akun_id', 1)
            ->where('u.status_akun_id', 2)
            ->groupBy('u.id', 'u.nama', 'u.projek', 'u.pengalaman')
            ->orderBy('u.nama')
            ->get();

        $perbandingan = array();

        $perbandingan[] = array(1.00, 5.00, 3.00, 5.00);
        $perbandingan[] = array(0.20, 1.00, 1.00, 3.00);
        $perbandingan[] = array(0.33, 1.00, 1.00, 5.00);
        $perbandingan[] = array(0.20, 0.33, 0.20, 1.00);

        $sum_c1 = 0;
        $sum_c2 = 0;
        $sum_c3 = 0;
        $sum_c4 = 0;

        foreach ($perbandingan as $daftar_nilai) {
            $sum_c1 += $daftar_nilai[0];
            $sum_c2 += $daftar_nilai[1];
            $sum_c3 += $daftar_nilai[2];
            $sum_c4 += $daftar_nilai[3];
        }

        $normalisasi = [];

        foreach ($perbandingan as $nilai) {
            $projek = $nilai[0] / $sum_c1;
            $komunikasi = $nilai[1] / $sum_c2;
            $pemograman = $nilai[2] / $sum_c3;
            $pengalaman = $nilai[3] / $sum_c4;

            $isi = [$projek, $komunikasi, $pemograman, $pengalaman];
            $normalisasi[] = $isi;
        }

        $bobot = array();

        foreach ($normalisasi as $daftar_nilai) {
            $nilai = ($daftar_nilai[0] + $daftar_nilai[1] + $daftar_nilai[2] + $daftar_nilai[3]) / 4;
            $bobot[] = $nilai;
        }

        $eigen_value = array();

        for ($i = 0; $i < count($perbandingan); $i++) {
            $nilai = $perbandingan[$i];

            $perb_C1 = $nilai[0];
            $perb_C2 = $nilai[1];
            $perb_C3 = $nilai[2];
            $perb_C4 = $nilai[3];

            $bobot_C1 = $bobot[0];
            $bobot_C2 = $bobot[1];
            $bobot_C3 = $bobot[2];
            $bobot_C4 = $bobot[3];

            $nilai_eigen = ($perb_C1 * $bobot_C1) + ($perb_C2 * $bobot_C2) + ($perb_C3 * $bobot_C3) + ($perb_C4 * $bobot_C4);
            $eigen_value[] = $nilai_eigen;
        }

        $hasil_C1 = $eigen_value[0] / $bobot[0];
        $hasil_C2 = $eigen_value[1] / $bobot[1];
        $hasil_C3 = $eigen_value[2] / $bobot[2];
        $hasil_C4 = $eigen_value[3] / $bobot[3];

        $t = ($hasil_C1 + $hasil_C2 + $hasil_C3 + $hasil_C4) / 4;
        $ci = ($t - 4) / (4 - 1);
        $ri = 0.90;
        $konsistensi = $ci / $ri;

        $perb_alt_C1 = 0;

        foreach ($alternatif as $orang) {
            $perb_alt_C1 += $orang->projek;
        }

        $C1 = array();

        foreach ($alternatif as $orang) {
            $nilai = $orang->projek / $perb_alt_C1;
            $C1[] = $nilai;
        }

        $perb_alt_C2 = 0;

        foreach ($alternatif as $orang) {
            $perb_alt_C2 += $orang->bahasa_komunikasi;
        }

        $C2 = array();

        foreach ($alternatif as $orang) {
            $nilai = $orang->bahasa_komunikasi / $perb_alt_C2;
            $C2[] = $nilai;
        }

        $perb_alt_C3 = 0;

        foreach ($alternatif as $orang) {
            $perb_alt_C3 += $orang->bahasa_pemograman;
        }

        $C3 = array();

        foreach ($alternatif as $orang) {
            $nilai = $orang->bahasa_pemograman / $perb_alt_C3;
            $C3[] = $nilai;
        }

        $perb_alt_C4 = 0;

        foreach ($alternatif as $orang) {
            $perb_alt_C4 += $orang->pengalaman;
        }

        $C4 = array();

        foreach ($alternatif as $orang) {
            $nilai = $orang->pengalaman / $perb_alt_C4;
            $C4[] = $nilai;
        }

        $nilai_rangking = [];
        $perangkingan = array();

        for ($i = 0; $i < count($alternatif); $i++) {
            $nilai_akhir = ($C1[$i] * $bobot[0]) + ($C2[$i] * $bobot[1]) + ($C3[$i] * $bobot[2]) + ($C4[$i] * $bobot[3]);
            $nilai_rangking[] = $nilai_akhir;
            $perangkingan[] = $alternatif[$i]->nama . "|" . $nilai_akhir;
        }

        $values = [];
        foreach ($perangkingan as $string) {
            $parts = explode('|', $string);
            $values[] = floatval($parts[1]);
        }

        rsort($values);

        $sorted_data = [];
        foreach ($values as $value) {
            foreach ($perangkingan as $string) {
                $parts = explode('|', $string);
                if (floatval($parts[1]) === $value) {
                    $sorted_data[] = $string;
                    break;
                }
            }
        }

        $data = [
            "alternatif" => $alternatif,
            "perbandingan" => $perbandingan,
            "normalisasi" => $normalisasi,
            "jpc1" => $sum_c1,
            "jpc2" => $sum_c2,
            "jpc3" => $sum_c3,
            "jpc4" => $sum_c4,
            "bobot" => $bobot,
            "eigen" => $eigen_value,
            "t" => $t,
            "ci" => $ci,
            "ri" => $ri,
            "konsisten" => $konsistensi,
            "c1" => $C1,
            "c2" => $C2,
            "c3" => $C3,
            "c4" => $C4,
            "perangkingan" => $perangkingan,
            "pengurutan" => $sorted_data,
            "produk" => $dproduk,
            "bahasa" => $dbahasa
        ];

        return view("Dashboard", $data);
    }
}
