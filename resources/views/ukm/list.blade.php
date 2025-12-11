@extends('layout')

@section('content')

<section class="section">
    <div class="container">

        <h1 class="section-title gradient-text" style="text-align:center; margin-bottom:2rem;">
            Daftar UKM Kampus
        </h1>

        <div class="cards-grid">

            @foreach ($ukms as $ukm)
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

                    <p class="ukm-card-description">{{ $ukm->Deskripsi_UKM }}</p>

                    <div class="ukm-card-members">
                        <i class="fas fa-user"></i> {{ $ukm->Jumlah_Anggota }} Anggota
                    </div>

                    <div class="ukm-card-actions">
                        <a href="{{ route('ukm.show', $ukm->id) }}" class="btn-card btn-purple">
                            Detail
                        </a>

                        <a href="{{ route('pendaftaran.create', $ukm->id) }}" class="btn-card btn-green">
                            Daftar
                        </a>
                    </div>

                </div>

            </div>
            @endforeach

        </div>

    </div>
</section>

@endsection
