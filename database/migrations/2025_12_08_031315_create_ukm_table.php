<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ukm', function (Blueprint $table) {
            $table->id();
            $table->string('Nama_UKM');
            $table->string('Jenis_UKM');
            $table->text('Deskripsi_UKM')->nullable();
            $table->string('Jadwal')->nullable();
            $table->string('Tempat')->nullable();
            $table->integer('Jumlah_Anggota')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ukm');
    }
};
