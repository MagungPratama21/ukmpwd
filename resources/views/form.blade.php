@extends('layout')

@section('title', 'Form Pendaftaran UKM')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #6a11cb, #2575fc);
    }

    .section {
        padding: 4rem 1rem;
    }

    .ukm-card {
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        overflow: hidden;
    }

    .ukm-card-header {
        background: linear-gradient(135deg, #7f00ff, #b721ff);
        padding: 2rem;
        text-align: center;
    }

    .ukm-card-icon {
        width: 70px;
        height: 70px;
        background: rgba(255,255,255,0.2);
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
        color: #fff;
    }

    .ukm-card-body {
        padding: 2.5rem;
    }

    .ukm-card-title {
        font-weight: 700;
        color: #5a189a;
        margin-bottom: 2rem;
    }

    label {
        font-weight: 600;
        color: #4a148c;
        margin-top: 1rem;
        display: block;
    }

    .input-area {
        width: 100%;
        padding: 12px 14px;
        border-radius: 10px;
        border: 1px solid #ddd;
        margin-top: 0.5rem;
        transition: all 0.3s ease;
    }

    .input-area:focus {
        border-color: #9c27b0;
        box-shadow: 0 0 0 3px rgba(156,39,176,0.2);
        outline: none;
    }

    .btn-purple {
        background: linear-gradient(135deg, #7f00ff, #b721ff);
        color: #fff;
        border: none;
        border-radius: 12px;
        padding: 14px;
        font-weight: 600;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .btn-purple:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(127,0,255,0.3);
    }
</style>

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

                <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <input type="hidden" name="ID_UKM" value="{{ $ukm->ID_UKM }}">

                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" class="input-area" placeholder="Masukkan nama lengkap">

                    <label>NIM</label>
                    <input type="text" name="nim" class="input-area" placeholder="Masukkan NIM">

                    <label>Alasan Bergabung</label>
                    <textarea name="alasan" class="input-area" rows="4" placeholder="Tulis alasan bergabung"></textarea>

                    <label>Tanggal Pendaftaran</label>
                    <input type="date" name="tanggal_pendaftaran" class="input-area">

                    <label>Metode Pembayaran</label>
                    <select name="metode_pembayaran" class="input-area">
                        <option value="">-- Pilih Metode Pembayaran --</option>
                        <option value="transfer">Transfer Bank</option>
                        <option value="ewallet">E-Wallet</option>
                        <option value="cash">Tunai</option>
                    </select>

                    <label>Bukti Pembayaran</label>
                    <input type="file" name="bukti_pembayaran" class="input-area">

                    <label>Berkas Tambahan (Opsional)</label>
                    <input type="file" name="berkas" class="input-area">

                    <button class="btn btn-lg btn-purple" style="width:100%; margin-top:1.5rem;">
                        <i class="fas fa-paper-plane"></i> Kirim Pendaftaran
                    </button>
                </form>

            </div>
        </div>

    </div>
</section>
@endsection
