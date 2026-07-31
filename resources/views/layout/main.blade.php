<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="{{ asset('img/Logo ppi.png') }}">

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Icons --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    {{-- Libraries --}}
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    {{-- Bootstrap --}}
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    {{-- CSS --}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/search.css') }}" rel="stylesheet">
</head>

<body>

    {{-- Spinner --}}
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-danger" role="status"></div>
    </div>

    {{-- Navbar --}}
    @include('layout.navbar')

    {{-- Content --}}
    <main>

        @yield('containers')

    </main>

    {{-- Footer --}}
    @include('layout.footer')

    {{-- Back To Top --}}
    <a href="#" class="back-to-top">
        <i class="bi bi-arrow-up"></i>
    </a>

    {{-- Javascript --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>

    <script src="{{ asset('js/main.js') }}"></script>

    <script>

        let lastScrollY = window.scrollY;
const customNavbar = document.querySelector('.custom-navbar');

window.addEventListener('scroll', () => {
  const currentScrollY = window.scrollY;

  // Efek berjalan jika pengguna sudah scroll melampaui 40px dari atas layar
  if (currentScrollY > 40) {
    if (currentScrollY > lastScrollY) {
      // Jika scroll ke BAWAH -> Sembunyikan navbar
      customNavbar.classList.add('nav-hidden');
    } else {
      // Jika scroll ke ATAS -> Tampilkan kembali navbar
      customNavbar.classList.remove('nav-hidden');
    }
  } else {
    // Jika kembali ke paling atas halaman, pastikan navbar selalu muncul
    customNavbar.classList.remove('nav-hidden');
  }

  // Rekam posisi scroll terakhir
  lastScrollY = currentScrollY;
});
    

    </script>

</body>

</html>