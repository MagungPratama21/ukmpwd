<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function registerPage()
    {
        return view('auth.register');
    }

    public function register(Request $req)
    {
        $data = $req->validate([
            'nama_mahasiswa'      => 'required',
            'nim_mahasiswa'       => 'required|unique:mahasiswa',
            'prodi_mahasiswa'     => 'required',
            'angkatan_mahasiswa'  => 'required',
            'notelp_mahasiswa'    => 'required',
            'email_mahasiswa'     => 'required|email|unique:mahasiswa',
            'password_mahasiswa'  => 'required|min:6',
        ]);

        $data['password_mahasiswa'] = bcrypt($data['password_mahasiswa']);

        Mahasiswa::create($data);

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat.');
    }

    public function loginPage()
    {
        return view('auth.login');
    }

    public function login(Request $req)
    {
        $req->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        $mahasiswa = Mahasiswa::where('email_mahasiswa', $req->email)->first();

        if (!$mahasiswa || !password_verify($req->password, $mahasiswa->password_mahasiswa)) {
            return back()->withErrors(['email' => 'Email atau password salah']);
        }

        session(['id_mahasiswa' => $mahasiswa->id_mahasiswa]);

        return redirect()->route('status.index')
            ->with('success', 'Login berhasil.');
    }

    public function logout()
    {
        session()->forget('id_mahasiswa');
        return redirect('/');
    }

    public function statusPage()
    {
        $id = session('id_mahasiswa');

        if (!$id) {
            return redirect()->route('login');
        }

        $pendaftaran = Pendaftaran::where('id_mahasiswa', $id)->get();

        return view('status', compact('pendaftaran'));
    }
}
