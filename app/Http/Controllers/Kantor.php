<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use App\Models\TempatKerja;
use Illuminate\Http\Request;

class Kantor extends Controller
{
    function Index(Request $request)
    {
        $kantor = TempatKerja::select("tempat_kerja.id", "platform.nama", "tempat_kerja.profil")
            ->where('tempat_kerja.pengguna_id', $request->session()->get("id"))
            ->join('platform', 'platform.id', '=', 'tempat_kerja.platform_id')
            ->get();

        $web = Platform::all();

        $data = [
            "kantor" => $kantor,
            "website" => $web
        ];

        return view("Platform", $data);
    }

    function Tambah(Request $request)
    {
        $kantor = new TempatKerja;
        $kantor->pengguna_id = $request->session()->get("id");
        $kantor->platform_id = $request->website;
        $kantor->profil = $request->profil;
        $kantor->save();

        return redirect()->back();
    }

    function Hapus($id)
    {
        $kantor = TempatKerja::where("id", $id);
        $kantor->delete();
        return redirect()->back();
    }
}
