@extends('layout')

@section('page-css')
<link rel="stylesheet" href="{{ asset('detailukm.css') }}?v=999">
@endsection

@section('content')
<div class="detail-page">

<!-- HERO -->
<section class="hero">
    <div class="hero-content">
        <span class="badge">
            <i class="fas fa-tag"></i> {{ $ukm->kategori }}
        </span>

        <h1>{{ $ukm->nama }}</h1>

        <p>{{ $ukm->deskripsi }}</p>
    </div>
</section>

<!-- STATS -->
<section class="stats-wrap">
    <div class="container">
        <div class="stats stats-4">

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-layer-group"></i>
                </div>
                <div class="stat-value">{{ $ukm->total_ukm }}</div>
                <div class="stat-label">Total UKM</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon stat-green">
                    <i class="fas fa-user-check"></i>
                </div>
                <div class="stat-value stat-green-text">{{ $ukm->jumlah_anggota }}+</div>
                <div class="stat-label">Anggota Aktif</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon stat-orange">
                    <i class="fas fa-trophy"></i>
                </div>
                <div class="stat-value stat-orange-text">50+</div>
                <div class="stat-label">Prestasi</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon stat-blue">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div class="stat-value stat-blue-text">100+</div>
                <div class="stat-label">Event / Tahun</div>
            </div>

        </div>
    </div>
</section>

<!-- ABOUT -->
<section class="about-section">
    <div class="container">
        <h2 class="section-title">Profil {{ $ukm->nama }}</h2>

        <div class="about-grid">
            <div class="about-image">
                <img src="{{ $ukm->foto_cover ?? 'https://images.unsplash.com/photo-1542038784456-1ea8e935640e' }}">
            </div>

            <div class="about-content">
                <h3>Mengembangkan Potensi Mahasiswa</h3>
                <p>{{ $ukm->deskripsi }}</p>
            </div>
        </div>
    </div>
</section>

<!-- GALERI -->
<section class="gallery-section">
    <div class="container">
        <h2 class="section-title">Kegiatan & Dokumentasi</h2>

        <p class="empty-text">Belum ada dokumentasi kegiatan.</p>

        <a href="{{ route('ukm.index') }}" class="back-link">
            ← Kembali ke Daftar UKM
        </a>
    </div>
</section>

</div>
@endsection
