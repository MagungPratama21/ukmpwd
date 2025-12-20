<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalUkm = DB::table('ukm')->count();

        // Asumsi tabel pendaftaran ada: pendaftaran
        // status biasanya: pending, diterima, ditolak
        $totalPendaftar = DB::table('pendaftaran')->count();
        $totalDiterima  = DB::table('pendaftaran')->where('status', 'diterima')->count();
        $totalDitolak   = DB::table('pendaftaran')->where('status', 'ditolak')->count();

        // ringkasan per UKM
        $ringkasan = DB::table('ukm')
            ->leftJoin('pendaftaran', 'pendaftaran.ukm_id', '=', 'ukm.id')
            ->select(
                'ukm.Nama_UKM as nama_ukm',
                DB::raw('COUNT(pendaftaran.id) as pendaftar'),
                DB::raw("SUM(CASE WHEN pendaftaran.status = 'diterima' THEN 1 ELSE 0 END) as diterima"),
                DB::raw("SUM(CASE WHEN pendaftaran.status = 'ditolak' THEN 1 ELSE 0 END) as ditolak"),
                DB::raw("SUM(CASE WHEN pendaftaran.status = 'pending' THEN 1 ELSE 0 END) as sisa_kuota"),
                'ukm.Jumlah_Anggota as jumlah_anggota'
            )
            ->groupBy('ukm.id', 'ukm.Nama_UKM', 'ukm.Jumlah_Anggota')
            ->orderBy('ukm.Nama_UKM')
            ->get();

        return view('admin.dashboard', compact(
            'totalUkm',
            'totalPendaftar',
            'totalDiterima',
            'totalDitolak',
            'ringkasan'
        ));
    }
}
