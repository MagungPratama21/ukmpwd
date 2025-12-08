<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ukm extends Model
{
    use HasFactory;

    protected $table = 'ukm';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_ukm',
        'jenis_ukm',
        'deskripsi_ukm',
        'jadwal_ukm',
        'lokasi_ukm',
        'anggota_aktif_ukm',
        'logo_ukm',
    ];

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'id_ukm');
    }

    public function admin()
    {
        return $this->hasOne(AdminUkm::class, 'id_ukm');
    }
}
