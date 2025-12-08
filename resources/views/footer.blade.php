<footer class="footer gradient-bg">
    <div class="container">
        <div class="footer-grid">

            <div>
                <div class="navbar-brand" style="margin-bottom: 1rem;">
                    <div class="navbar-brand-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <span>UKM Kampus</span>
                </div>
                <p class="footer-text">
                    Platform pendaftaran UKM yang memudahkan mahasiswa untuk bergabung dengan organisasi kampus.
                </p>
            </div>

            <div>
                <h3 class="footer-title">Navigasi</h3>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}"><i class="fas fa-chevron-right"></i> Beranda</a></li>
                    <li><a href="{{ route('ukm.index') }}"><i class="fas fa-chevron-right"></i> Daftar UKM</a></li>

                    @auth('mahasiswa')
                        <li><a href="{{ route('status') }}"><i class="fas fa-chevron-right"></i> Status</a></li>
                    @else
                        <li><a href="{{ route('login') }}"><i class="fas fa-chevron-right"></i> Login</a></li>
                    @endauth
                </ul>
            </div>

            <div>
                <h3 class="footer-title">Kontak</h3>
                <ul class="footer-contact">
                    <li><i class="fas fa-envelope"></i> ukm@kampus.ac.id</li>
                    <li><i class="fas fa-phone"></i> (0274) 123-4567</li>
                    <li><i class="fas fa-map-marker-alt"></i> Yogyakarta, Indonesia</li>
                </ul>
            </div>

        </div>

        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} UKM Kampus. All rights reserved.</p>
        </div>
    </div>
</footer>
