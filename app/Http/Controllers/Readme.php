<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Parsedown;

class Readme extends Controller
{
    public function Index($nama)
    {
        $pengguna = Pengguna::where("nama", "=", $nama)->first();

        if ($pengguna) {
            $parsedown = new Parsedown();
            $html = $parsedown->text($pengguna->deskripsi);
            $data = [
                "nama" => $nama,
                "deskripsi" => $html
            ];
            return view("Readme", $data);
        } else {
            abort(404);
        }
    }
}
