@extends('layout')

@section('title', 'Notifikasi')

@section('content')

<section class="section">
    <div class="container">

        <div class="section-header">
            <h2 class="section-title"><span class="gradient-text">Notifikasi</span></h2>
            <p class="section-description">Informasi terbaru terkait pendaftaran UKM Anda</p>
        </div>

        <div class="cards-grid">

            @forelse($notifikasi as $n)
            <div class="ukm-card">

                <div class="ukm-card-header">
                    <div class="ukm-card-icon">
                        <i class="fas fa-bell"></i>
                    </div>
                </div>

                <div class="ukm-card-body">

                    <h3 class="ukm-card-title">{{ $n->judul }}</h3>

                    <p class="ukm-card-description">
                        {{ $n->pesan }}
                    </p>

                    <p style="font-size:0.875rem; color:#9ca3af;">
                        <i class="fas fa-clock"></i> {{ $n->created_at->diffForHumans() }}
                    </p>

                </div>

            </div>

            @empty

            <p style="text-align:center;width:100%;color:#6b7280;">Tidak ada notifikasi.</p>

            @endforelse

        </div>

    </div>
</section>

@endsection
