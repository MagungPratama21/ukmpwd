@extends('layout')

@section('title', 'Register Mahasiswa')

@section('content')

<section class="section" style="padding-top: 3rem;">
    <div class="container" style="max-width: 680px;">
 
        <div class="ukm-card" style="padding: 2rem;">
            <h2 class="section-title gradient-text" style="font-size: 2rem; text-align:center;">
                Daftar Akun Mahasiswa
            </h2>
            <p class="section-description" style="text-align: center; margin-bottom: 2rem;">
                Isi data diri dengan lengkap untuk membuat akun mahasiswa.
            </p>

            <form action="{{ route('register') }}" method="POST" class="form">
                @csrf

                <div class="form-group">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama_mahasiswa" class="form-input" placeholder="Masukkan nama lengkap" required>
                </div>

                <div class="form-group">
                    <label class="form-label">NIM</label>
                    <input type="text" name="nim_mahasiswa" class="form-input" placeholder="Masukkan NIM" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Program Studi</label>
                    <input type="text" name="prodi_mahasiswa" class="form-input" placeholder="Contoh: Teknik Informatika" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Angkatan</label>
                    <input type="number" name="angkatan_mahasiswa" class="form-input" placeholder="Contoh: 2023" required>
                </div>

                <div class="form-group">
                    <label class="form-label">No. Telepon</label>
                    <input type="text" name="notelp_mahasiswa" class="form-input" placeholder="08xxxxxxxxxx" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email_mahasiswa" class="form-input" placeholder="yourname@email.com" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" name="password_mahasiswa" class="form-input" placeholder="Minimal 6 karakter" required>
                </div>

                <!-- TAMBAHAN FORM BANK -->
                <div class="form-group">
                    <label class="form-label">Nama Bank</label>
                    <input type="text" name="nama_bank" class="form-input" placeholder="Contoh: BCA, BRI, Mandiri">
                </div>

                <div class="form-group">
                    <label class="form-label">Nomor Rekening Bank</label>
                    <input type="text" name="no_rekening" class="form-input" placeholder="Masukkan nomor rekening">
                </div>

                <!-- TAMBAHAN FORM E-WALLET -->
                <div class="form-group">
                    <label class="form-label">Jenis E-Wallet</label>
                    <select name="jenis_ewallet" class="form-input">
                        <option value="">Pilih E-Wallet</option>
                        <option value="DANA">DANA</option>
                        <option value="OVO">OVO</option>
                        <option value="GoPay">GoPay</option>
                        <option value="ShopeePay">ShopeePay</option>
                        <option value="LinkAja">LinkAja</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Nomor E-Wallet</label>
                    <input type="text" name="no_ewallet" class="form-input" placeholder="08xxxxxxxxxx">
                </div>

                <button type="submit" class="btn btn-lg btn-purple" style="width: 100%; margin-top: 1rem;">
                    <i class="fas fa-user-plus"></i> Buat Akun
                </button>

                <p style="text-align: center; margin-top: 1.5rem; color:#6b7280;">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="gradient-text" style="font-weight: 600;">
                        Login di sini
                    </a>
                </p>
            </form>
        </div>

    </div>
</section>

@endsection
