<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UKMSeeder extends Seeder
{
    public function run(): void
    {
        $ukmList = [
            ['Badminton', 'Olahraga'],
            ['Bola Basket', 'Olahraga'],
            ['Bola Voli', 'Olahraga'],
            ['Karate', 'Bela Diri'],
            ['Kopma', 'Kewirausahaan'],
            ['Lensa', 'Fotografi'],
            ['Madapala', 'Petualangan'],
            ['Deco', 'Design Communication'],
            ['Menwa', 'Pertahanan'],
            ['Musik', 'Seni'],
            ['PMI', 'Kemanusiaan'],
            ['Pramuka', 'Organisasi'],
            ['PSM', 'Seni Musik'],
            ['Poros', 'Pers Kampus'],
            ['Seni Tari', 'Seni'],
            ['Sepak Bola', 'Olahraga'],
            ['Tae Kwon Do', 'Bela Diri'],
        ];

        foreach ($ukmList as $item) {
            DB::table('ukm')->insert([
                'Nama_UKM'       => $item[0],
                'Jenis_UKM'      => $item[1],
                'Deskripsi_UKM'  => 'Deskripsi belum ditambahkan',
                'Jadwal'         => 'Belum Dijadwalkan',
                'Tempat'         => 'Belum Ditentukan',
                'Jumlah_Anggota' => rand(20, 80),
                'created_at'     => now(),
                'updated_at'     => now(),
            ]);
        }
    }
}
