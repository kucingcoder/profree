<?php

namespace App\Http\Controllers;

use App\Models\BahasaPemograman;
use App\Models\JenisProduk;
use App\Models\Kemampuan;
use Illuminate\Http\Request;

class Skills extends Controller
{
    function Index(Request $request)
    {
        $kemampuan = Kemampuan::select("kemampuan.id", "bahasa_pemograman.nama as bahasa", "jenis_produk.nama as produk")
            ->where('kemampuan.pengguna_id', $request->session()->get("id"))
            ->join('bahasa_pemograman', 'bahasa_pemograman.id', '=', 'kemampuan.bahasa_pemograman_id')
            ->join('jenis_produk', 'jenis_produk.id', '=', 'kemampuan.jenis_produk_id')
            ->get();

        $bahasa = BahasaPemograman::all();
        $produk = JenisProduk::all();

        $data = [
            "skill" => $kemampuan,
            "bahasa" => $bahasa,
            "produk" => $produk
        ];

        return view("Kemampuan", $data);
    }

    function Tambah(Request $request)
    {
        $skill = new Kemampuan;
        $skill->pengguna_id = $request->session()->get("id");
        $skill->jenis_produk_id = $request->produk;
        $skill->bahasa_pemograman_id = $request->bahasa;
        $skill->save();

        return redirect()->back();
    }

    function Hapus($id)
    {
        $skill = Kemampuan::where("id", $id);
        $skill->delete();
        return redirect()->back();
    }
}
