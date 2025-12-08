@extends('layout')

@section('title', $ukm->Nama_UKM . ' - Detail UKM')

@section('content')

<section class="section">
    <div class="container" style="max-width: 800px">

        <div class="ukm-card" style="overflow:hidden;">
            
            <div class="ukm-card-header">
                <div class="ukm-card-icon">
                    <i class="fas fa-users"></i>
                </div>
            </div>

            <div class="ukm-card-body">

                <h2 class="ukm-card-title" style="font-size:2rem; margin-bottom:0.5rem;">
                    {{ $ukm->Nama_UKM }}
                </h2>

                <span class="badge-type" style="margin-bottom:1rem; display:inline-block;">
                    {{ $ukm->Jenis_UKM }}
                </span>

                <p style="font-size:1rem; color:#6b7280; margin-top:1rem; margin-bottom:2rem;">
                    {{ $ukm->Deskripsi_UKM }}
                </p>

                <div class="ukm-card-members" style="margin-bottom:2rem;">
                    <i class="fas fa-users"></i>
                    <span>{{ $ukm->Anggota_Aktif_UKM }} Anggota Aktif</span>
                </div>

                <div class="ukm-card-actions">
                    @auth('mahasiswa')
                    <a href="{{ route('pendaftaran.create', $ukm->ID_UKM) }}" class="btn-card btn-green">
                        <i class="fas fa-paper-plane"></i> Daftar Sekarang
                    </a>
                    @endauth
                    <a href="{{ route('ukm.index') }}" class="btn-card btn-purple">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>

            </div>
        </div>

    </div>
</section>

@endsection
