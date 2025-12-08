<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'UKM Kampus') }}</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('style.css') }}">

    <script>
        function toggleMobileMenu() {
            const nav = document.getElementById('navbar-mobile');
            nav.classList.toggle('active');
        }
    </script>
</head>

<body>

    <nav class="navbar gradient-bg">
        <div class="navbar-container">

            <a href="{{ route('home') }}" class="navbar-brand">
                <div class="navbar-brand-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                UKM Kampus
            </a>

            <ul class="navbar-menu">
                <li><a href="{{ route('home') }}" class="navbar-link">Beranda</a></li>
                <li><a href="{{ route('ukm.index') }}" class="navbar-link">Daftar UKM</a></li>
                <li><a href="{{ route('status.index') }}" class="navbar-link">Status</a></li>

                @auth('mahasiswa')
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-primary">Logout</button>
                    </form>
                </li>
                @else
                <li><a href="{{ route('login') }}" class="navbar-link">Login</a></li>
                @endauth
            </ul>

            <button class="navbar-toggle" onclick="toggleMobileMenu()">
                <i class="fas fa-bars"></i>
            </button>

        </div>

        <div id="navbar-mobile" class="navbar-mobile">
            <a href="{{ route('home') }}" class="navbar-mobile-link">Beranda</a>
            <a href="{{ route('ukm.index') }}" class="navbar-mobile-link">Daftar UKM</a>
            <a href="{{ route('status.index') }}" class="navbar-mobile-link">Status</a>
            <a href="{{ route('login') }}" class="navbar-mobile-link">Login</a>
        </div>
    </nav>

    <div class="content-wrapper">
        @yield('content')
    </div>

    <footer class="footer gradient-bg">

        <div class="container footer-grid">

            <div>
                <h3 class="footer-title">UKM Kampus</h3>
                <p class="footer-text">
                    Temukan komunitas terbaik untuk mengembangkan minat dan bakatmu
                    di lingkungan kampus.
                </p>
            </div>

            <div>
                <h3 class="footer-title">Navigasi</h3>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}"><i class="fas fa-angle-right"></i> Beranda</a></li>
                    <li><a href="{{ route('ukm.index') }}"><i class="fas fa-angle-right"></i> Daftar UKM</a></li>
                    <li><a href="{{ route('status.index') }}"><i class="fas fa-angle-right"></i> Status</a></li>
                    <li><a href="{{ route('login') }}"><i class="fas fa-angle-right"></i> Login</a></li>
                </ul>
            </div>

            <div>
                <h3 class="footer-title">Kontak</h3>
                <ul class="footer-contact">
                    <li>
                        <i class="fas fa-map-marker-alt"></i>
                        Kampus Indonesia, Jl. Pendidikan No. 123
                    </li>
                    <li>
                        <i class="fas fa-envelope"></i>
                        support@ukmkampus.ac.id
                    </li>
                    <li>
                        <i class="fas fa-phone"></i>
                        +62 812-3456-7890
                    </li>
                </ul>
            </div>

        </div>

        <div class="footer-bottom">
            <p>© {{ date('Y') }} UKM Kampus. All Rights Reserved.</p>
        </div>

    </footer>

</body>
</html>
