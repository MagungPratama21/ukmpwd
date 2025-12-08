<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $primaryKey = 'id_mahasiswa';

    protected $fillable = [
        'nama_mahasiswa',
        'nim_mahasiswa',
        'prodi_mahasiswa',
        'angkatan_mahasiswa',
        'notelp_mahasiswa',
        'email_mahasiswa',
        'password_mahasiswa',
    ];

    protected $hidden = [
        'password_mahasiswa',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function setPasswordMahasiswaAttribute($value)
    {
        $this->attributes['password_mahasiswa'] = Hash::make($value);
    }

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'id_mahasiswa');
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'id_mahasiswa');
    }

    public function dokumen()
    {
        return $this->hasMany(Dokumen::class, 'id_mahasiswa');
    }

    public function notifikasi()
    {
        return $this->hasMany(Notifikasi::class, 'id_mahasiswa');
    }

    public function pengembalian()
    {
        return $this->hasMany(Pengembalian::class, 'id_mahasiswa');
    }
}
