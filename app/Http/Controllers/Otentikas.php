<?php

namespace App\Http\Controllers;

use App\Mail\EmailAktivasi;
use App\Models\KonfirmasiEmail;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;

class Otentikas extends Controller
{
    public function Daftar(Request $request)
    {
        if ($request->sandi != $request->konfirmasi_sandi) {
            return redirect("/daftar")
                ->withInput()
                ->withErrors(["gagal-daftar" => "Sandi dengan konfirmasi sandi berbeda",]);
        }

        $email = Pengguna::where("email", "=", $request->email)->first();

        if ($email) {
            return redirect("/daftar")
                ->withInput()
                ->withErrors(["gagal-daftar" => "Email yang anda gunakan sudah terdaftar",]);
        }

        $pengguna = new Pengguna;
        $pengguna->nama = $request->nama;
        $pengguna->jenis_kelamin_id = $request->jenis_kelamin;
        $pengguna->jenis_akun_id = $request->jenis_akun;
        $pengguna->email = $request->email;
        $pengguna->sandi = md5($request->sandi);
        $pengguna->save();

        $konfirmasi = new KonfirmasiEmail;

        $kode = md5(date('Y-m-d H:i:s'));

        $konfirmasi->kode = $kode;
        $konfirmasi->pengguna_id = $pengguna->id;
        $konfirmasi->save();

        Mail::to($request->email)->send(new EmailAktivasi($kode));

        return redirect("/aktivasi/" . $request->email);
    }

    public function Masuk(Request $request)
    {
        $pengguna = Pengguna::where("email", "=", $request->email)->first();

        if ($pengguna) {
            if ($pengguna->status_akun_id == 1) {
                return view("AkunTidakAktif", ["email" => $request->email]);
            } else {
                $request->session()->put("id", $pengguna->id);
                $request->session()->put("nama", $pengguna->nama);
                return redirect("/dashboard");
            }
        } else {
            return redirect("/masuk")
                ->withInput()
                ->withErrors(["gagal-masuk" => "Email atau kata sandi salah",]);
        }
    }

    public function AksesGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function AkunGoogle(Request $request)
    {
        try {
            $google = Socialite::driver('google')->user();

            $email = Pengguna::where("email", "=", $google->getEmail())->first();

            if ($email) {
                if ($email->status_akun_id == 1) {
                    return view("AkunTidakAktif", ["email" => $google->getEmail()]);
                } else {
                    $request->session()->put("id", $email->id);
                    $request->session()->put("nama", $email->nama);
                    return redirect("/dashboard");
                }
            }

            $pengguna = new Pengguna;
            $pengguna->nama = $google->getName();
            $pengguna->jenis_kelamin_id = 1;
            $pengguna->jenis_akun_id = 1;
            $pengguna->email = $google->getEmail();
            $pengguna->sandi = md5(date('Y-m-d H:i:s'));
            $pengguna->save();

            $konfirmasi = new KonfirmasiEmail;

            $kode = md5(date('Y-m-d H:i:s'));
            $konfirmasi->kode = $kode;
            $konfirmasi->pengguna_id = $pengguna->id;
            $konfirmasi->save();

            Mail::to($google->getEmail())->send(new EmailAktivasi($kode));

            return redirect("/aktivasi/" . $google->getEmail());
        } catch (\Throwable $th) {
            log::info("Kesalahan : " . $th);

            return redirect("/daftar")
                ->withInput()
                ->withErrors(["gagal-daftar" => "Tidak dapat info dari google",]);
        }
    }

    public function KirimUlangKonfirmasi($email)
    {
        $pengguna = Pengguna::where("email", "=", $email)->first();

        $konfirmasi = new KonfirmasiEmail;

        $kode = md5(date('Y-m-d H:i:s'));
        $konfirmasi->kode = $kode;
        $konfirmasi->pengguna_id = $pengguna->id;
        $konfirmasi->save();

        Mail::to($email)->send(new EmailAktivasi($kode));

        return redirect("/aktivasi/" . $email);
    }

    public function KonfirmasiEmail($Kode, Request $request)
    {
        $konfirmasi = KonfirmasiEmail::where('kode', $Kode)->first();

        if ($konfirmasi) {
            KonfirmasiEmail::where('pengguna_id', $konfirmasi)->delete();

            $pengguna = Pengguna::where('id', $konfirmasi)->first();
            if ($pengguna) {
                $pengguna->status_akun_id = 2;
                $pengguna->save();
            }

            $request->session()->put("id", $pengguna->id);
            $request->session()->put("nama", $pengguna->nama);
            return redirect("/dashboard");
        } else {
            abort(404);
        }
    }

    public function Keluar(Request $request)
    {
        $request->session()->flush();
        return redirect("/masuk");
    }

    public function LupaSandi($Email)
    {
    }

    public function AturUlangSandi(Request $request)
    {
    }
}
