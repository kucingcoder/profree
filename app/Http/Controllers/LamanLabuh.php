<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class LamanLabuh extends Controller
{
    function Index(Request $request)
    {
        $pengguna = Pengguna::where("id", "=", $request->session()->get("id"))->first();

        $data = [
            "deskripsi" => $pengguna->deskripsi,
        ];

        return view("LamanLabuh", $data);
    }

    function UpdateDeskripsi(Request $request)
    {
        $pengguna = Pengguna::where("id", "=", $request->session()->get("id"))->first();

        $pengguna->deskripsi = $request->deskripsi;

        $pengguna->update();

        return redirect()->back();
    }
}
