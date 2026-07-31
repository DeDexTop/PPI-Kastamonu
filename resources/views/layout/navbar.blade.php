<header class="site-header-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top custom-navbar">
        <div class="container">

            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="{{ asset('img/Logo ppi.png') }}" alt="Logo" class="logo">
                <span class="brand-text">PPI Kastamonu</span>
            </a>

            <!-- Button Mobile -->
            <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse" style="border: 1px solid #fff; border-radius: 5px; padding: 5px 10px;">
                <i class="fa-solid fa-bars"></i>
            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbarCollapse">

                <ul class="navbar-nav mx-auto text-center">

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">
                            Beranda
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('tentang') ? 'active' : '' }}" href="/tentang">
                            Tentang
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('aktivitas') ? 'active' : '' }}" href="/aktivitas">
                            Aktivitas
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('kastulis') ? 'active' : '' }}" href="/kastulis">
                            Kastulis
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('kabinet') ? 'active' : '' }}" href="/kabinet">
                            Kabinet
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('blog') ? 'active' : '' }}" href="/blog">
                            Blog
                        </a>
                    </li>

                </ul>

                <!-- Tombol -->
                <div class="d-flex">
                    <a href="/kontak" class="btn btn-primary-custom">
                        Hubungi Kami
                    </a>
                </div>

            </div>

        </div>
    </nav>
</header>
