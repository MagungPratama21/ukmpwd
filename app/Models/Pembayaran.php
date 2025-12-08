<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';

    protected $fillable = [
        'id_mahasiswa',
        'id_pendaftaran',
        'jumlah_biaya',
        'metode_pembayaran',
        'bukti_pembayaran',
        'tanggal_pembayaran',
        'status_pembayaran',
        'kode_transaksi',
    ];

    protected $casts = [
        'tanggal_pembayaran' => 'date',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'id_pendaftaran');
    }

    public function pengembalian()
    {
        return $this->hasOne(Pengembalian::class, 'id_pembayaran');
    }
}
