<?php

namespace App\Http\Controllers;

use App\Models\Ukm;
use Illuminate\Http\Request;

class UkmController extends Controller
{
    public function index()
    {
        $ukms = Ukm::all();
        return view('ukm.list', compact('ukms'));
    }

    public function show($id)
    {
        // Alias kolom DB biar cocok dengan blade kamu: nama, kategori, deskripsi, jumlah_anggota, dst
        $ukm = Ukm::query()
            ->select([
                'id',
                'Nama_UKM as nama',
                'Jenis_UKM as kategori',
                'Deskripsi_UKM as deskripsi',
                'Jumlah_Anggota as jumlah_anggota',
                'Jadwal as jadwal',
                'Tempat as tempat',
                'created_at',
                'updated_at',
            ])
            ->where('id', $id)
            ->firstOrFail();

            $ukm->total_ukm = \App\Models\Ukm::count();
            $ukm->prestasi = $ukm->prestasi ?? '50';         // sementara kalau kolom belum ada
            $ukm->kegiatan_tahunan = $ukm->kegiatan_tahunan ?? '100'; // sementara kalau kolom belum ada

        return view('ukm.detail', compact('ukm'));
    }

    public function search(Request $request)
    {
        $q = $request->get('q');

        // Disesuaikan dengan nama kolom tabel kamu
        $data = Ukm::query()
            ->where('Nama_UKM', 'LIKE', "%{$q}%")
            ->orWhere('Jenis_UKM', 'LIKE', "%{$q}%")
            ->get([
                'id',
                'Nama_UKM as nama',
                'Jenis_UKM as kategori',
                'Deskripsi_UKM as deskripsi',
                'Jumlah_Anggota as jumlah_anggota',
            ]);

        return response()->json($data);
    }

    public function store(Request $request)
    {
        // Disesuaikan dengan kolom tabel kamu
        $request->validate([
            'Nama_UKM' => 'required',
            'Jenis_UKM' => 'required',
        ]);

        return Ukm::create($request->all());
    }

    public function update(Request $request, $id)
    {
        // Tabel kamu pakai PK = id, bukan id_ukm
        $ukm = Ukm::where('id', $id)->firstOrFail();
        $ukm->update($request->all());

        return response()->json(['status' => 'updated']);
    }

    public function destroy($id)
    {
        // Tabel kamu pakai PK = id, bukan id_ukm
        Ukm::where('id', $id)->delete();

        return response()->json(['status' => 'deleted']);
    }
}
