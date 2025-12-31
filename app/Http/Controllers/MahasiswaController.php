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

        // Password akan otomatis di-hash oleh mutator setPasswordMahasiswaAttribute di model
        Mahasiswa::create($data);

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat.');
    }

    public function loginPage()
    {
        return view('auth.login');
    }

    public function login(Request $req)
    {
        try {
            // Validasi input
            $validated = $req->validate([
                'email'    => 'required|email',
                'password' => 'required'
            ]);

            // Cari mahasiswa berdasarkan email
            $mahasiswa = Mahasiswa::where('email_mahasiswa', $validated['email'])->first();

            // Cek apakah mahasiswa ditemukan
            if (!$mahasiswa) {
                return back()
                    ->withInput($req->only('email'))
                    ->withErrors(['email' => 'Email tidak terdaftar.']);
            }

            // Verifikasi password
            if (!password_verify($validated['password'], $mahasiswa->password_mahasiswa)) {
                return back()
                    ->withInput($req->only('email'))
                    ->withErrors(['password' => 'Password yang Anda masukkan salah.']);
            }

            // Set session
            session(['id_mahasiswa' => $mahasiswa->id_mahasiswa]);

            // Redirect dengan pesan sukses
            return redirect()->route('home')
                ->with('success', 'Login berhasil! Selamat datang, ' . $mahasiswa->nama_mahasiswa . '.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Validation error sudah ditangani oleh Laravel
            throw $e;
        } catch (\Exception $e) {
            // Tangani error lainnya (database, dll)
            \Log::error('Login error: ' . $e->getMessage(), [
                'email' => $req->email,
                'trace' => $e->getTraceAsString()
            ]);

            return back()
                ->withInput($req->only('email'))
                ->withErrors(['error' => 'Terjadi kesalahan saat proses login. Silakan coba lagi beberapa saat.']);
        }
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

        return view('ukm.status', compact('pendaftaran'));
    }
}