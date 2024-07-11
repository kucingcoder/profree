<?php

namespace App\Http\Controllers;

class Aktivasi extends Controller
{
    function Index($email)
    {
        return view("AkunTidakAktif" . ["email" => $email]);
    }
}
