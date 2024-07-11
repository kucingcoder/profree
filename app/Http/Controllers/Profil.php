<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class Profil extends Controller
{
    function Index(Request $request)
    {
        $pengguna = Pengguna::where("id", "=", $request->session()->get("id"))->first();

        $data = [
            "nama" => $pengguna->nama,
            "jenis_kelamin_id" => $pengguna->jenis_kelamin_id,
            "jenis_akun_id" => $pengguna->jenis_akun_id,
            "domisili" => $pengguna->domisili,
            "email" => $pengguna->email,
            "jumlah_projek" => $pengguna->projek,
            "pengalaman" => $pengguna->pengalaman
        ];

        return view("Profil", $data);
    }

    function UpdateDataDiri(Request $request)
    {
        $pengguna = Pengguna::where("id", "=", $request->session()->get("id"))->first();

        $pengguna->nama = $request->nama;
        $pengguna->jenis_kelamin_id = $request->jenis_kelamin;
        $pengguna->jenis_akun_id = $request->jenis_akun;
        $pengguna->domisili = $request->domisili;
        $pengguna->email = $request->email;

        $pengguna->update();

        return redirect()->back()->with("berhasil-update-profil", "Perubahan profil disimpan");
    }

    function UpdateRiwayat(Request $request)
    {
        $pengguna = Pengguna::where("id", "=", $request->session()->get("id"))->first();

        $pengguna->projek = $request->projek;
        $pengguna->pengalaman = $request->pengalaman;

        $pengguna->update();

        return redirect()->back()->with("berhasil-update-riwayat", "Perubahan riwayat disimpan");
    }

    function UpdateSandi(Request $request)
    {
        $pengguna = Pengguna::where("id", "=", $request->session()->get("id"))->where("sandi", md5($request->sandi_lama))->first();

        if (empty($pengguna)) {
            return redirect()->back()->withInput()->withErrors(["gagal-ubah-sandi" => "Kata sandi lama salah",]);
        }

        $pengguna->sandi = md5($request->sandi_baru);

        $pengguna->update();

        return redirect()->back()->with("berhasil-update-sandi", "sandi berhasil diubah");
    }
}
