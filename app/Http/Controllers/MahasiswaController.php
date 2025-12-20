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
        $password = $req->password;

        // 1) ADMIN LOGIN (domain admin)
        if (str_ends_with($email, '@admin.uad.ac.id')) {

            $admin = AdminUkm::where('email', $email)->first();

            if (!$admin) {
                return back()->withErrors([
                    'email' => 'Akun admin tidak ditemukan. Pastikan email admin sudah ada di tabel admin_ukm.'
                ])->withInput();
            }

            if (!password_verify($password, $admin->password)) {
                return back()->withErrors([
                    'email' => 'Password admin salah.'
                ])->withInput();
            }

            session([
                'admin_id' => $admin->id,
                'admin_email' => $admin->email,
                'role' => 'admin',
            ]);

            return redirect()->route('admin.dashboard')->with('success', 'Login admin berhasil.');
        }

        // 2) MAHASISWA LOGIN (domain webmail)
        if (str_ends_with($email, '@webmail.uad.ac.id')) {

            $mahasiswa = Mahasiswa::where('email_mahasiswa', $email)->first();

            if (!$mahasiswa) {
                return back()->withErrors([
                    'email' => 'Akun mahasiswa tidak ditemukan. Pastikan email sudah terdaftar.'
                ])->withInput();
            }

            if (!password_verify($password, $mahasiswa->password_mahasiswa)) {
                return back()->withErrors([
                    'email' => 'Password mahasiswa salah.'
                ])->withInput();
            }

            session([
                'id_mahasiswa' => $mahasiswa->id_mahasiswa,
                'email_mahasiswa' => $mahasiswa->email_mahasiswa,
                'role' => 'mahasiswa',
            ]);

            return redirect()->route('status.index')->with('success', 'Login mahasiswa berhasil.');
        }

        // 3) DOMAIN TIDAK VALID
        return back()->withErrors([
            'email' => 'Email harus @webmail.uad.ac.id (mahasiswa) atau @admin.uad.ac.id (admin).'
        ])->withInput();
    }

    public function logout()
    {
        session()->forget('id_mahasiswa');
        session()->forget('email_mahasiswa');

        session()->forget('admin_id');
        session()->forget('admin_email');

        session()->forget('role');

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
