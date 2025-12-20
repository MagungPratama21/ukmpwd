@extends('layout')

@section('content')
<div style="max-width:420px;margin:60px auto;padding:24px;border-radius:16px;background:#fff;box-shadow:0 12px 28px rgba(0,0,0,0.10);">
    <h2 style="margin:0 0 6px;font-size:22px;font-weight:800;">Login Admin</h2>
    <p style="margin:0 0 18px;color:#6b7280;font-size:13px;">Masuk pakai email admin.</p>

    @if($errors->any())
        <div style="background:#fee2e2;color:#991b1b;padding:10px 12px;border-radius:10px;margin-bottom:14px;font-size:13px;">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.login.submit') }}">
        @csrf

        <div style="margin-bottom:12px;">
            <label style="display:block;font-size:13px;margin-bottom:6px;">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required
                   style="width:100%;padding:12px 12px;border:1px solid #e5e7eb;border-radius:10px;">
        </div>

        <div style="margin-bottom:16px;">
            <label style="display:block;font-size:13px;margin-bottom:6px;">Password</label>
            <input type="password" name="password" required
                   style="width:100%;padding:12px 12px;border:1px solid #e5e7eb;border-radius:10px;">
        </div>

        <button type="submit"
                style="width:100%;padding:12px;border:none;border-radius:12px;background:linear-gradient(90deg,#4f46e5,#7c3aed);color:#fff;font-weight:700;">
            Masuk
        </button>

        <div style="margin-top:14px;text-align:center;font-size:13px;">
            <a href="{{ route('login') }}" style="color:#4f46e5;text-decoration:none;">Login Mahasiswa</a>
        </div>
    </form>
</div>
@endsection
