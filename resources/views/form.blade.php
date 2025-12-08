@extends('layout')

@section('title', 'Form Pendaftaran UKM')

@section('content')

<section class="section">
    <div class="container" style="max-width: 700px">

        <div class="ukm-card">

            <div class="ukm-card-header">
                <div class="ukm-card-icon">
                    <i class="fas fa-paper-plane"></i>
                </div>
            </div>

            <div class="ukm-card-body">

                <h2 class="ukm-card-title" style="text-align:center;">
                    Pendaftaran UKM: {{ $ukm->Nama_UKM }}
                </h2>

                <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data" style="margin-top:2rem;">
                    @csrf
                    
                    <input type="hidden" name="ID_UKM" value="{{ $ukm->ID_UKM }}">

                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" class="input-area">

                    <label>NIM</label>
                    <input type="text" name="nim" class="input-area">

                    <label>Alasan Bergabung</label>
                    <textarea name="alasan" class="input-area" rows="4"></textarea>

                    <label>Berkas Tambahan (Opsional)</label>
                    <input type="file" name="berkas" class="input-area">

                    <button class="btn btn-lg btn-purple" style="width:100%; margin-top:1rem;">
                        <i class="fas fa-paper-plane"></i> Kirim Pendaftaran
                    </button>
                </form>

            </div>
        </div>

    </div>
</section>

@endsection
