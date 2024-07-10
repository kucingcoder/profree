<?php

namespace App\Http\Controllers;

use App\Models\BahasaManusia;
use App\Models\Komunikasi;
use Illuminate\Http\Request;

class Bicara extends Controller
{
    function Index(Request $request)
    {
        $komunikasi = Komunikasi::select("komunikasi.id", "bahasa_manusia.bahasa")
            ->where('komunikasi.pengguna_id', $request->session()->get("id"))
            ->join('bahasa_manusia', 'bahasa_manusia.id', '=', 'komunikasi.bahasa_manusia_id')
            ->get();

        $bahasa = BahasaManusia::all();

        $data = [
            "bicara" => $komunikasi,
            "bahasa" => $bahasa
        ];

        return view("Komunikasi", $data);
    }

    function Tambah(Request $request)
    {
        $bicara = new Komunikasi();
        $bicara->pengguna_id = $request->session()->get("id");
        $bicara->bahasa_manusia_id = $request->bahasa;
        $bicara->save();

        return redirect()->back();
    }

    function Hapus($id)
    {
        $bicara = Komunikasi::where("id", $id);
        $bicara->delete();
        return redirect()->back();
    }
}
