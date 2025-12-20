<?php

namespace App\Http\Controllers;

use App\Models\AdminUkm;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // wajib email admin khusus
        if ($request->email !== 'adminwildan@gmail.ukm.uad.ac.id') {
            return back()->withErrors(['email' => 'Email bukan admin.'])->withInput();
        }

        $admin = AdminUkm::where('email', $request->email)->first();

        if (!$admin || !password_verify($request->password, $admin->password)) {
            return back()->withErrors(['email' => 'Email atau password admin salah.'])->withInput();
        }

        session([
            'admin_id' => $admin->id,
            'admin_email' => $admin->email,
        ]);

        return redirect()->route('admin.dashboard');
    }

    public function logout()
    {
        session()->forget(['admin_id', 'admin_email']);
        return redirect()->route('admin.login');
    }
}
