@extends('layout')

@section('content')

<section class="hero gradient-bg">
    <div class="hero-bg-blur">
        <div class="hero-blur-1"></div>
        <div class="hero-blur-2"></div>
    </div>

    <div class="container hero-content">
        <h1 class="hero-title">
            Bergabunglah dengan <span class="hero-title-highlight">UKM Kampus Kami!</span>
        </h1>

        <p class="hero-description">
            Temukan passion-mu dan kembangkan bakat bersama komunitas mahasiswa yang inspiratif
        </p>

        <div class="hero-buttons">
            <a href="{{ route('ukm.index') }}" class="btn btn-lg btn-white">
                <i class="fas fa-search"></i> Lihat Semua UKM
            </a>

            @guest('mahasiswa')
            <a href="{{ route('register') }}" class="btn btn-lg btn-yellow">
                <i class="fas fa-user-plus"></i> Daftar Sekarang
            </a>
            @endguest
        </div>
    </div>

    <div class="hero-wave">
        <svg viewBox="0 0 1440 120"><path d="M0 120L60 110C120..." fill="#F9FAFB"/></svg>
    </div>
</section>

<section class="stats-section">
    <div class="container stats-grid">

        <div class="stat-card">
            <div class="stat-icon gradient"><i class="fas fa-users"></i></div>
            <h3 class="stat-number gradient-text">{{ $ukms->count() }}</h3>
            <p class="stat-label">Total UKM</p>
        </div>

        <div class="stat-card">
            <div class="stat-icon green"><i class="fas fa-user-graduate"></i></div>
            <h3 class="stat-number" style="color:#10b981">500+</h3>
            <p class="stat-label">Anggota Aktif</p>
        </div>

        <div class="stat-card">
            <div class="stat-icon yellow"><i class="fas fa-trophy"></i></div>
            <h3 class="stat-number" style="color:#f59e0b">50+</h3>
            <p class="stat-label">Prestasi</p>
        </div>

        <div class="stat-card">
            <div class="stat-icon blue"><i class="fas fa-calendar"></i></div>
            <h3 class="stat-number" style="color:#3b82f6">100+</h3>
            <p class="stat-label">Event/Tahun</p>
        </div>

    </div>
</section>

<section class="section">
    <div class="section-header">
        <h2 class="section-title gradient-text">Unit Kegiatan Mahasiswa</h2>
        <p class="section-description">
            Temukan UKM yang sesuai dengan minat dan bakatmu
        </p>
    </div>

    <div class="container cards-grid">

        @if($ukms->count() == 0)
            <p class="text-center text-gray-500 text-lg">Belum ada UKM terdaftar.</p>
        @else
            @foreach ($ukms->take(6) as $ukm)
            <div class="ukm-card animate-fade-in">

                <div class="ukm-card-header">
                    <div class="ukm-card-icon">
                        <i class="fas fa-users"></i>
                    </div>
                </div>

                <div class="ukm-card-body"> 

                    <div class="ukm-card-title-row">
                        <h3 class="ukm-card-title">{{ $ukm->Nama_UKM }}</h3>
                        <span class="badge-type">{{ $ukm->Jenis_UKM }}</span>
                    </div>

                    <p class="ukm-card-description">{{ $ukm->Deskripsi_UKM }}</p>

                    <div class="ukm-card-members">
                        <i class="fas fa-user"></i> {{ $ukm->Jumlah_Anggota }} Anggota
                    </div>

                    <div class="ukm-card-actions">
                        <a href="{{ route('ukm.show', $ukm->id) }}" class="btn-card btn-purple">
                            <i class="fas fa-info-circle"></i> Detail
                        </a>

                        <a href="{{ route('pendaftaran.create', $ukm->id) }}" class="btn-card btn-green">
                            <i class="fas fa-check-circle"></i> Daftar
                        </a>
                    </div>

                </div>

            </div>
            @endforeach
        @endif

    </div>

    <div class="flex-center" style="margin-top: 2rem;">
        <a href="{{ route('ukm.index') }}" class="btn btn-lg btn-white">
            Lihat Semua UKM <i class="fas fa-arrow-right"></i>
        </a>
    </div>
</section>


<section class="section bg-gradient-light">
    <div class="section-header">
        <h2 class="section-title gradient-text">Cara Mendaftar</h2>
        <p class="section-description">
            Mudah dan cepat, hanya 3 langkah!
        </p>
    </div>

    <div class="container steps-grid">

        <div class="step-card">
            <div class="step-number"><span>1</span></div>
            <h3 class="step-title">Daftar Akun</h3>
            <p class="step-description">
                Buat akun dengan data diri yang valid untuk memulai pendaftaran
            </p>
        </div>

        <div class="step-card">
            <div class="step-number"><span>2</span></div>
            <h3 class="step-title">Pilih UKM</h3>
            <p class="step-description">
                Pilih UKM yang sesuai dengan minat dan bakat kamu
            </p>
        </div>

        <div class="step-card">
            <div class="step-number"><span>3</span></div>
            <h3 class="step-title">Kirim Pendaftaran</h3>
            <p class="step-description">
                Isi formulir pendaftaran dan tunggu konfirmasi dari admin UKM
            </p>
        </div>

    </div>
</section>

<section class="cta-section">
    <div class="container">
        <div class="cta-box">

            <div class="cta-bg-blur">
                <div class="cta-blur-1"></div>
                <div class="cta-blur-2"></div>
            </div>

            <div class="cta-content">
                <h2 class="cta-title">Siap Bergabung dengan Kami?</h2>
                <p class="cta-description">
                    Jangan lewatkan kesempatan untuk mengembangkan diri dan menambah pengalaman organisasi!
                </p>

                <a href="{{ route('register') }}" class="btn btn-lg btn-white">
                    <i class="fas fa-arrow-right"></i> Mulai Sekarang
                </a>
            </div>

        </div>
    </div>
</section>

@endsection
