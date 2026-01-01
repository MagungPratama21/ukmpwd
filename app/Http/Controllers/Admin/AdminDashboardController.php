<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $adminUkmId = session('admin_id_ukm'); // ini id_ukm milik admin

        // kalau belum login admin, lempar ke login
        if (!$adminUkmId) {
            return redirect()->route('login')->withErrors([
                'email' => 'Silakan login admin dulu.'
            ]);
        }

        // TOTAL UKM (kalau admin per-UKM, ini biasanya 1)
        $totalUkm = 1;

        // Ringkasan per UKM (karena admin cuma pegang 1 UKM, hasilnya 1 baris)
        $ringkasan = DB::table('ukm')
            ->leftJoin('pendaftaran', 'pendaftaran.id_ukm', '=', 'ukm.id')
            ->select(
                'ukm.Nama_UKM as nama_ukm',
                DB::raw('COUNT(pendaftaran.id) as pendaftar'),
                DB::raw("SUM(CASE WHEN pendaftaran.status = 'diterima' THEN 1 ELSE 0 END) as diterima"),
                DB::raw("SUM(CASE WHEN pendaftaran.status = 'ditolak' THEN 1 ELSE 0 END) as ditolak"),
                DB::raw("SUM(CASE WHEN pendaftaran.status = 'pending' THEN 1 ELSE 0 END) as pending"),
                'ukm.Jumlah_Anggota as jumlah_anggota'
            )
            ->where('ukm.id', $adminUkmId)
            ->groupBy('ukm.id', 'ukm.Nama_UKM', 'ukm.Jumlah_Anggota')
            ->orderBy('ukm.Nama_UKM')
            ->get();

        $totalPendaftar = (int) $ringkasan->sum('pendaftar');
        $totalDiterima  = (int) $ringkasan->sum('diterima');
        $totalDitolak   = (int) $ringkasan->sum('ditolak');

        return view('admin.dashboard', compact(
            'totalUkm',
            'totalPendaftar',
            'totalDiterima',
            'totalDitolak',
            'ringkasan'
        ));
    }
}
