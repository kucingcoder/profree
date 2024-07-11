<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Aktivasi extends Controller
{
    function Index($email)
    {
        return view("AkunTidakAktif" . ["email" => $email]);
    }
}
