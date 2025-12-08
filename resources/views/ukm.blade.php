@extends('layout')

@section('title', 'Daftar UKM - UKM Kampus')

@section('content')

<section class="section">
    <div class="container">

        <div class="section-header">
            <h2 class="section-title">
                <span class="gradient-text">Daftar Semua UKM</span>
            </h2>
            <p class="section-description">
                Pilih UKM yang sesuai minatmu dan lihat informasi lengkapnya
            </p>
        </div>

        <div class="cards-grid">
            @foreach($ukms as $ukm)
            <div class="ukm-card">

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

                    <p class="ukm-card-description">
                        {{ $ukm->Deskripsi_UKM }}
                    </p>

                    <div class="ukm-card-members">
                        <i class="fas fa-users"></i>
                        <span>{{ $ukm->Anggota_Aktif_UKM }} Anggota</span>
                    </div>

                    <div class="ukm-card-actions">
                        <a href="{{ route('ukm.show', $ukm->ID_UKM) }}" class="btn-card btn-purple">
                            <i class="fas fa-info-circle"></i> Detail
                        </a>

                        @auth('mahasiswa')
                        <a href="{{ route('pendaftaran.create', $ukm->ID_UKM) }}" class="btn-card btn-green">
                            <i class="fas fa-paper-plane"></i> Daftar
                        </a>
                        @endauth
                    </div>

                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

@endsection
