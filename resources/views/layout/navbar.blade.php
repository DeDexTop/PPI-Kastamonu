<header>
    <div class="container-fluid bg-red px-0 mobile-navbar">
        <div class="nav-bar">
            <nav class="navbar navbar-expand-lg navbar-dark py-lg-0">
                <h4 class="d-lg-none m-0 text-beige">Menu</h4>
                <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse" >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav me-auto">
                        <a href="/" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Beranda</a>
                        <a href="/tentang" class="nav-item nav-link {{ Request::is('tentang') ? 'active' : '' }}">Tentang</a>
                        <a href="/aktivitas" class="nav-item nav-link {{ Request::is('aktivitas') ? 'active' : '' }}">Aktivitas</a>
                        <a href="/kastulis" class="nav-item nav-link {{ Request::is('kastulis') ? 'active' : '' }}">Kastulis</a>
                        <a href="/kabinet" class="nav-item nav-link {{ Request::is('kabinet') ? 'active' : '' }}">Kabinet</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>