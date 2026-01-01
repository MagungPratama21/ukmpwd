<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Pendaftaran;
use App\Models\AdminUkm;
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

        $email = strtolower(trim($req->email));

        // LOGIN ADMIN
        if (str_ends_with($email, '@admin.uad.ac.id')) {

            $admin = \App\Models\AdminUkm::where('email', $email)->first();

            if (!$admin || !password_verify($req->password, $admin->password)) {
                return back()->withErrors([
                    'email' => 'Email atau password admin salah'
                ])->withInput();
            }

            session([
                'admin_id' => $admin->id,
                'admin_email' => $admin->email,
                'admin_id_ukm' => $admin->id_ukm,
            ]);

            return redirect()->route('admin.dashboard');
        }


        // 2) MAHASISWA
        if (str_ends_with($email, '@webmail.uad.ac.id')) {

            $mahasiswa = Mahasiswa::where('email_mahasiswa', $email)->first();

            if (!$mahasiswa || !password_verify($req->password, $mahasiswa->password_mahasiswa)) {
                return back()->withErrors(['email' => 'Email atau password mahasiswa salah'])->withInput();
            }

            session([
                'id_mahasiswa' => $mahasiswa->id_mahasiswa,
                'email_mahasiswa' => $mahasiswa->email_mahasiswa,
            ]);

            return redirect()->route('status.index')->with('success', 'Login mahasiswa berhasil.');
        }

        return back()->withErrors([
            'email' => 'Email harus @webmail.uad.ac.id (mahasiswa) atau @admin.uad.ac.id (admin)'
        ])->withInput();
    }

    public function logout()
    {
        session()->forget('id_mahasiswa');
        session()->forget('email_mahasiswa');

        session()->forget('admin_id');
        session()->forget('admin_email');
        session()->forget('admin_ukm_id');

        return redirect('/login');
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
