<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Ukm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PendaftaranController extends Controller
{
    public function create($id)
    {
        $ukm = Ukm::findOrFail($id);
        return view('form', compact('ukm'));
    }

    public function submit(Request $req)
    {
        $req->validate([
            'id_mahasiswa' => 'required',
            'id_ukm' => 'required',
            'alasan_daftar' => 'required|min:20',
            'cv_daftar' => 'nullable|mimes:pdf|max:2048'
        ]);

        $path = null;

        if ($req->hasFile('cv_daftar')) {
            $path = $req->file('cv_daftar')->store('cv', 'public');
        }

        $pendaftaran = Pendaftaran::create([
            'id_mahasiswa' => $req->id_mahasiswa,
            'id_ukm' => $req->id_ukm,
            'alasan_daftar' => $req->alasan_daftar,
            'cv_daftar' => $path,
            'tanggal_daftar' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pendaftaran berhasil dikirim!',
            'data' => $pendaftaran
        ]);
    }
}
