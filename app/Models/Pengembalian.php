<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

    protected $table = 'pengembalian';
    protected $primaryKey = 'id_pengembalian';

    protected $fillable = [
        'id_pembayaran',
        'id_mahasiswa',
        'id_pendaftaran',
        'jumlah_pengembalian',
        'jumlah_diterima',
        'alasan_pengembalian',
        'status_pengembalian',
        'metode_pengembalian',
        'nomor_rekening_tujuan',
        'nama_rekening_pemilik',
        'bank_tujuan',
        'bukti_pengembalian',
        'tanggal_pengembalian',
    ];

    protected $casts = [
        'tanggal_pengembalian' => 'date',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'id_pembayaran');
    }

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'id_pendaftaran');
    }
}
