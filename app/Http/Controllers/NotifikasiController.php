<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;

class NotifikasiController extends Controller
{
    public function index()
    {
        $id = session('id_mahasiswa');

        $notif = Notifikasi::where('ID_Mahasiswa', $id)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('notifikasi', compact('notif'));
    }

    public function read($id)
    {
        $n = Notifikasi::findOrFail($id);
        $n->update(['is_read' => true]);

        return back();
    }
}
