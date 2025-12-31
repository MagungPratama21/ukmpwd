@extends('layout')

@section('title', 'Login Mahasiswa')

@section('content')

<section class="section" style="padding-top: 3rem;">
    <div class="container" style="max-width: 680px;">

        <div class="ukm-card" style="padding: 2rem;">
            <h2 class="section-title gradient-text" style="font-size: 2rem; text-align:center;">
                Login Akun Mahasiswa
            </h2>

            <p class="section-description" style="text-align: center; margin-bottom: 2rem;">
                Masuk menggunakan email dan password yang telah terdaftar.
            </p>

            {{-- Success Message --}}
            @if(session('success'))
                <div style="background-color: #d4edda; color: #155724; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem; border: 1px solid #c3e6cb;">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            {{-- Error Message (General) --}}
            @if($errors->has('error'))
                <div style="background-color: #f8d7da; color: #721c24; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1.5rem; border: 1px solid #f5c6cb;">
                    <i class="fas fa-exclamation-circle"></i> {{ $errors->first('error') }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="form">
                @csrf

                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input
                        type="email"
                        name="email"
                        class="form-input"
                        placeholder="yourname@webmail.uad.ac.id"
                        value="{{ old('email') }}"
                        required
                    >
                    @error('email')
                        <div style="color: #dc3545; font-size: 0.875rem; margin-top: 0.25rem;">
                            <i class="fas fa-exclamation-triangle"></i> {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input
                        type="password"
                        name="password"
                        class="form-input"
                        placeholder="Masukkan password"
                        required
                    >
                    @error('password')
                        <div style="color: #dc3545; font-size: 0.875rem; margin-top: 0.25rem;">
                            <i class="fas fa-exclamation-triangle"></i> {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-lg btn-purple" style="width: 100%; margin-top: 1rem;">
                    <i class="fas fa-sign-in-alt"></i> Login
                </button>

                <p style="text-align: center; margin-top: 1.5rem; color:#6b7280;">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="gradient-text" style="font-weight: 600;">
                        Daftar di sini
                    </a>
                </p>
            </form>
        </div>

    </div>
</section>

@endsection
