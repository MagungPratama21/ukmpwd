@extends('ukm.layout')

@section('content')
<style>
    .status-card {
        background: white;
        border-radius: 1rem;
        padding: 1.5rem;
        margin-bottom: 1rem;
        border-left: 4px solid #d1d5db;
        transition: all 0.3s;
    }
    .status-card:hover {
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        transform: translateX(4px);
    }
    .status-card.pending { border-left-color: #f59e0b; }
    .status-card.diterima { border-left-color: #10b981; }
    .status-card.ditolak { border-left-color: #ef4444; }

    .notif-card {
        background: linear-gradient(135deg, #f3e8ff 0%, #dbeafe 100%);
        border-radius: 1rem;
        padding: 1rem;
        margin-bottom: 0.75rem;
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
    }
    .notif-card.unread {
        background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
</style>

<main style="min-height: 100vh; padding: 3rem 0; background: linear-gradient(135deg, #f3e8ff 0%, #dbeafe 100%);">
    <div class="container container-lg">

        <div style="margin-bottom: 2rem;">
            <h1 class="gradient-text" style="font-size: 2.5rem; font-weight: 700; margin-bottom: 0.5rem;">
                Status Pendaftaran UKM 📋
            </h1>
            <p style="color: #6b7280; font-size: 1.125rem;">
                Ahmad Rizki. NIM: 2021010123. Teknik Informatika
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
            <div class="stat-card">
                <div class="stat-icon gradient">
                    <i class="fas fa-file-alt"></i>
                </div>
                <h3 class="stat-number gradient-text">3</h3>
                <p class="stat-label">Total Pendaftaran</p>
            </div>

            <div class="stat-card">
                <div class="stat-icon yellow">
                    <i class="fas fa-clock"></i>
                </div>
                <h3 class="stat-number" style="color: #f59e0b;">2</h3>
                <p class="stat-label">Menunggu Verifikasi</p>
            </div>

            <div class="stat-card">
                <div class="stat-icon green">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h3 class="stat-number" style="color: #10b981;">1</h3>
                <p class="stat-label">Diterima</p>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr; gap: 2rem;">
            <div>
                <div style="background: white; border-radius: 1.5rem; box-shadow: 0 10px 25px rgba(0,0,0,0.1); padding: 2rem;">
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem;">
                        <h2 class="gradient-text" style="font-size: 1.75rem; font-weight: 700;">
                            <i class="fas fa-list-alt"></i> Daftar Pendaftaran
                        </h2>
                        <a href="{{ route('ukm.index') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Daftar UKM Baru
                        </a>
                    </div>

                    <div class="status-card pending">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1rem;">
                            <div>
                                <h3 style="font-size: 1.25rem; font-weight: 700; color: #1f2937; margin-bottom: 0.5rem;">UKM Badminton</h3>
                                <p style="color: #6b7280; font-size: 0.875rem;">
                                    <i class="fas fa-calendar"></i> Tanggal Daftar: 15 November 2024
                                </p>
                            </div>
                            <span style="background: #fef3c7; color: #92400e; padding: 0.5rem 1rem; border-radius: 9999px; font-size: 0.875rem; font-weight: 600; white-space: nowrap;">
                                <i class="fas fa-clock"></i> Pending
                            </span>
                        </div>
                        <p style="color: #6b7280; margin-bottom: 1rem;">Pendaftaran Anda sedang dalam proses review oleh admin UKM.</p>
                        <div style="display: flex; gap: 0.5rem;">
                            <button class="btn-card btn-purple"><i class="fas fa-eye"></i> Lihat Detail</button>
                            <button class="btn-card" style="background: #ef4444; color: white;"><i class="fas fa-times"></i> Batalkan</button>
                        </div>
                    </div>

                    <div class="status-card diterima">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1rem;">
                            <div>
                                <h3 style="font-size: 1.25rem; font-weight: 700; color: #1f2937; margin-bottom: 0.5rem;">UKM Musik</h3>
                                <p style="color: #6b7280; font-size: 0.875rem;">
                                    <i class="fas fa-calendar"></i> Tanggal Daftar: 10 November 2024
                                </p>
                            </div>
                            <span style="background: #d1fae5; color: #065f46; padding: 0.5rem 1rem; border-radius: 9999px; font-size: 0.875rem; font-weight: 600; white-space: nowrap;">
                                <i class="fas fa-check-circle"></i> Diterima
                            </span>
                        </div>
                        <div style="background: #d1fae5; padding: 1rem; border-radius: 0.75rem; margin-bottom: 1rem;">
                            <p style="color: #065f46; font-weight: 600;">
                                <i class="fas fa-calendar-check"></i> Jadwal Wawancara:
                                <strong>20 November 2024, 14:00 WIB</strong>
                            </p>
                            <p style="color: #065f46; font-size: 0.875rem; margin-top: 0.5rem;">
                                <i class="fas fa-map-marker-alt"></i> Lokasi: Studio Musik Kampus
                            </p>
                        </div>
                        <p style="color: #6b7280; margin-bottom: 1rem;">Selamat! Pendaftaran Anda diterima.</p>
                        <button class="btn-card btn-purple"><i class="fas fa-eye"></i> Lihat Detail</button>
                    </div>

                    <div class="status-card pending">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1rem;">
                            <div>
                                <h3 style="font-size: 1.25rem; font-weight: 700; color: #1f2937; margin-bottom: 0.5rem;">UKM Fotografi</h3>
                                <p style="color: #6b7280; font-size: 0.875rem;">
                                    <i class="fas fa-calendar"></i> Tanggal Daftar: 08 November 2024
                                </p>
                            </div>
                            <span style="background: #fef3c7; color: #92400e; padding: 0.5rem 1rem; border-radius: 9999px; font-size: 0.875rem; font-weight: 600; white-space: nowrap;">
                                <i class="fas fa-clock"></i> Pending
                            </span>
                        </div>
                        <p style="color: #6b7280; margin-bottom: 1rem;">Pendaftaran Anda sedang dalam proses review oleh admin UKM.</p>
                        <div style="display: flex; gap: 0.5rem;">
                            <button class="btn-card btn-purple"><i class="fas fa-eye"></i> Lihat Detail</button>
                            <button class="btn-card" style="background: #ef4444; color: white;"><i class="fas fa-times"></i> Batalkan</button>
                        </div>
                    </div>

                </div>

                <div style="background: white; border-radius: 1.5rem; box-shadow: 0 10px 25px rgba(0,0,0,0.1); padding: 2rem; margin-top: 2rem;">
                    <h2 class="gradient-text" style="font-size: 1.75rem; font-weight: 700; margin-bottom: 1.5rem;">
                        <i class="fas fa-bell"></i> Notifikasi
                    </h2>

                    <div class="notif-card unread">
                        <i class="fas fa-bell" style="color: #f59e0b; font-size: 1.25rem; margin-top: 0.25rem;"></i>
                        <div style="flex: 1;">
                            <p style="color: #1f2937; font-weight: 600; margin-bottom: 0.25rem;">Jadwal wawancara UKM Musik</p>
                            <p style="color: #6b7280; font-size: 0.875rem; margin-bottom: 0.5rem;">
                                Anda dijadwalkan wawancara pada 20 November 2024 pukul 14:00 WIB.
                            </p>
                            <p style="color: #9ca3af; font-size: 0.75rem;">
                                <i class="fas fa-clock"></i> 2 jam lalu
                            </p>
                        </div>
                    </div>

                    <div class="notif-card unread">
                        <i class="fas fa-check-circle" style="color: #10b981; font-size: 1.25rem; margin-top: 0.25rem;"></i>
                        <div style="flex: 1;">
                            <p style="color: #1f2937; font-weight: 600; margin-bottom: 0.25rem;">Pendaftaran UKM Musik diterima</p>
                            <p style="color: #6b7280; font-size: 0.875rem; margin-bottom: 0.5rem;">
                                Selamat! Pendaftaran Anda di UKM Musik telah diterima.
                            </p>
                            <p style="color: #9ca3af; font-size: 0.75rem;">
                                <i class="fas fa-clock"></i> 5 jam lalu
                            </p>
                        </div>
                    </div>

                    <div class="notif-card">
                        <i class="fas fa-paper-plane" style="color: #7c3aed; font-size: 1.25rem; margin-top: 0.25rem;"></i>
                        <div style="flex: 1;">
                            <p style="color: #1f2937; font-weight: 600; margin-bottom: 0.25rem;">Pendaftaran berhasil dikirim</p>
                            <p style="color: #6b7280; font-size: 0.875rem; margin-bottom: 0.5rem;">
                                Pendaftaran Anda ke UKM Fotografi berhasil dikirim dan sedang diproses.
                            </p>
                            <p style="color: #9ca3af; font-size: 0.75rem;">
                                <i class="fas fa-clock"></i> 1 hari lalu
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
</main>
@endsection
