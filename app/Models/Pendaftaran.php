<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran';
    protected $primaryKey = 'id_pendaftaran';

    protected $fillable = [
        'id_mahasiswa',
        'id_ukm',
        'status_daftar',
        'cv_daftar',
        'alasan_daftar',
        'tanggal_daftar',
    ];

    protected $casts = [
        'tanggal_daftar' => 'date',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }

    public function ukm()
    {
        return $this->belongsTo(Ukm::class, 'id_ukm');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'id_pendaftaran');
    }

    public function dokumen()
    {
        return $this->hasMany(Dokumen::class, 'id_pendaftaran');
    }

    public function notifikasi()
    {
        return $this->hasMany(Notifikasi::class, 'id_pendaftaran');
    }

    public function pengembalian()
    {
        return $this->hasOne(Pengembalian::class, 'id_pendaftaran');
    }
}
