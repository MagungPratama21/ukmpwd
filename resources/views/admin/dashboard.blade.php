<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body style="background:#f3f4f6;">
    <div style="display:flex;min-height:100vh;">

        <!-- SIDEBAR -->
        <aside style="width:260px;background:#fff;border-right:1px solid #e5e7eb;padding:18px;">
            <div style="font-weight:800;font-size:18px;margin-bottom:18px;">Admin UKM</div>

            <div style="display:flex;align-items:center;gap:10px;margin-bottom:18px;">
                <div style="width:40px;height:40px;border-radius:50%;background:#4f46e5;color:#fff;display:flex;align-items:center;justify-content:center;">
                    <i class="fas fa-user"></i>
                </div>
                <div style="font-size:13px;color:#6b7280;">{{ auth('admin')->user()->nama ?? 'Admin' }}</div>
            </div>

            <a href="{{ route('admin.dashboard') }}" style="display:flex;align-items:center;gap:10px;padding:10px 12px;border-radius:12px;background:#ede9fe;color:#4c1d95;text-decoration:none;margin-bottom:8px;">
                <i class="fas fa-house"></i> Dashboard
            </a>

            <form method="POST" action="{{ route('admin.logout') }}" style="margin-top:16px;">
                @csrf
                <button style="width:100%;padding:10px;border:none;border-radius:12px;background:#111827;color:#fff;cursor:pointer;">
                    Logout
                </button>
            </form>
        </aside>

        <!-- CONTENT -->
        <main style="flex:1;padding:26px;">
            <h1 style="margin:0 0 18px;font-size:28px;">Dashboard Admin</h1>

            <!-- CARDS -->
            <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:14px;margin-bottom:18px;">
                <div style="background:#2563eb;color:#fff;border-radius:14px;padding:16px;position:relative;">
                    <div style="font-size:28px;font-weight:800;">{{ $totalUkm }}</div>
                    <div style="opacity:0.9;font-size:13px;">Total UKM</div>
                    <i class="fas fa-users" style="position:absolute;right:14px;top:14px;font-size:34px;opacity:0.35;"></i>
                </div>

                <div style="background:#16a34a;color:#fff;border-radius:14px;padding:16px;position:relative;">
                    <div style="font-size:28px;font-weight:800;">{{ $totalPendaftar }}</div>
                    <div style="opacity:0.9;font-size:13px;">Total Pendaftar</div>
                    <i class="fas fa-user-plus" style="position:absolute;right:14px;top:14px;font-size:34px;opacity:0.35;"></i>
                </div>

                <div style="background:#f59e0b;color:#fff;border-radius:14px;padding:16px;position:relative;">
                    <div style="font-size:28px;font-weight:800;">{{ $totalDiterima }}</div>
                    <div style="opacity:0.9;font-size:13px;">Total Diterima</div>
                    <i class="fas fa-user-check" style="position:absolute;right:14px;top:14px;font-size:34px;opacity:0.35;"></i>
                </div>

                <div style="background:#ec4899;color:#fff;border-radius:14px;padding:16px;position:relative;">
                    <div style="font-size:28px;font-weight:800;">{{ $totalDitolak }}</div>
                    <div style="opacity:0.9;font-size:13px;">Total Ditolak</div>
                    <i class="fas fa-user-xmark" style="position:absolute;right:14px;top:14px;font-size:34px;opacity:0.35;"></i>
                </div>
            </div>

            <!-- TABLE -->
            <div style="background:#fff;border-radius:14px;box-shadow:0 10px 30px rgba(0,0,0,0.06);overflow:hidden;">
                <div style="padding:14px 16px;border-bottom:1px solid #e5e7eb;color:#6b7280;font-size:13px;text-align:center;">
                    Statistik Ringkasan data pendaftaran dan keanggotaan UKM
                </div>

                <div style="overflow:auto;">
                    <table style="width:100%;border-collapse:collapse;font-size:13px;">
                        <thead>
                            <tr style="background:#f9fafb;color:#6b7280;">
                                <th style="padding:12px;border-bottom:1px solid #e5e7eb;text-align:left;">Nama UKM</th>
                                <th style="padding:12px;border-bottom:1px solid #e5e7eb;">Pendaftar</th>
                                <th style="padding:12px;border-bottom:1px solid #e5e7eb;">Diterima</th>
                                <th style="padding:12px;border-bottom:1px solid #e5e7eb;">Ditolak</th>
                                <th style="padding:12px;border-bottom:1px solid #e5e7eb;">Sisa Kuota</th>
                                <th style="padding:12px;border-bottom:1px solid #e5e7eb;">Jumlah Anggota</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ringkasan as $row)
                            <tr>
                                <td style="padding:12px;border-bottom:1px solid #f3f4f6;">{{ $row->nama_ukm }}</td>
                                <td style="padding:12px;border-bottom:1px solid #f3f4f6;text-align:center;">{{ $row->pendaftar ?? 0 }}</td>
                                <td style="padding:12px;border-bottom:1px solid #f3f4f6;text-align:center;">{{ $row->diterima ?? 0 }}</td>
                                <td style="padding:12px;border-bottom:1px solid #f3f4f6;text-align:center;">{{ $row->ditolak ?? 0 }}</td>
                                <td style="padding:12px;border-bottom:1px solid #f3f4f6;text-align:center;">{{ $row->sisa_kuota ?? 0 }}</td>
                                <td style="padding:12px;border-bottom:1px solid #f3f4f6;text-align:center;">{{ $row->jumlah_anggota ?? 0 }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>
</body>
</html>
