@extends('layout')

@section('title', 'Status Pendaftaran')

@section('content')

<section class="section">
    <div class="container">

        <div class="section-header">
            <h2 class="section-title"><span class="gradient-text">Status Pendaftaran</span></h2>
            <p class="section-description">Lihat perkembangan pendaftaran UKM Anda</p>
        </div>

        <div class="cards-grid">

            @forelse($pendaftaran as $p)
            <div class="ukm-card">

                <div class="ukm-card-header">
                    <div class="ukm-card-icon"><i class="fas fa-file-alt"></i></div>
                </div>

                <div class="ukm-card-body">

                    <h3 class="ukm-card-title">{{ $p->ukm->Nama_UKM }}</h3>

                    <p class="ukm-card-description">
                        Status terbaru dari proses pendaftaran Anda.
                    </p>

                    <div>
                        @if($p->Status == 'Pending')
                            <span class="badge-type" style="background:#fff7c2; color:#a67c00;">Menunggu</span>
                        @elseif($p->Status == 'Diterima')
                            <span class="badge-type" style="background:#d1fae5; color:#065f46;">Diterima</span>
                        @else
                            <span class="badge-type" style="background:#fee2e2; color:#b91c1c;">Ditolak</span>
                        @endif
                    </div>

                </div>

            </div>

            @empty

            <p style="text-align:center; width:100%; margin-top:2rem; color:#6b7280;">Belum ada pendaftaran.</p>

            @endforelse

        </div>

    </div>
</section>

@endsection
