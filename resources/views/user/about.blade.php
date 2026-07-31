@extends('layout.main')

@section('containers')

<!-- ==========================
     HERO
=========================== -->
<section class="about-hero section-padding bg-cream">

    <div class="container" style="margin-top: 50px">

        <div class="row align-items-center g-5">

            <div class="col-lg-6 wow fadeInLeft">

                <h1 class="display-4 fw-bold mt-4">

                    Perhimpunan Pelajar Indonesia
                    <span class="text-red">
                        Kastamonu
                    </span>

                </h1>

                <p class="lead mt-4 text-muted">

                    PPI Kastamonu merupakan wadah berhimpunnya pelajar Indonesia
                    di Kastamonu untuk berkembang, berkolaborasi,
                    serta memberikan kontribusi bagi masyarakat Indonesia maupun Turki.

                </p>

            </div>

            <div class="col-lg-6 wow fadeInRight">

                <div class="rounded-img shadow-soft">

                    <img
                        src="{{ asset('img/musta.JPG') }}"
                        class="img-fluid"
                        alt="Tentang Kami"
                        style="height:400px; object-fit:cover;border-radius: 10px;">

                </div>

            </div>

        </div>

    </div>

</section>


<!-- ==========================
     FUNGSI & TUJUAN
=========================== -->

<section class="section-padding">

    <div class="container">

        <div class="text-center mb-5">

            <span class="badge-modern">
                Nilai Organisasi
            </span>

            <h2 class="display-5 mt-3">
                Fungsi & Tujuan
            </h2>

            <div class="divider"></div>

        </div>

        <div class="row g-4">

            <div class="col-lg-6">

                <div class="section-card h-100">

                    <h3 class="text-red mb-4">
                        Fungsi
                    </h3>

                    <ul class="list-unstyled">

                        <li class="mb-3">
                            <i class="fas fa-check-circle text-red me-2"></i>
                            Wadah berhimpunnya pelajar Indonesia di Kastamonu.
                        </li>

                        <li class="mb-3">
                            <i class="fas fa-check-circle text-red me-2"></i>
                            Pendalaman ilmu dan pengembangan potensi.
                        </li>

                        <li class="mb-3">
                            <i class="fas fa-check-circle text-red me-2"></i>
                            Menumbuhkan pola pikir yang kritis,
                            solutif, dan visioner.
                        </li>

                    </ul>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="section-card h-100">

                    <h3 class="text-red mb-4">
                        Tujuan
                    </h3>

                    <ul class="list-unstyled">

                        <li class="mb-3">
                            <i class="fas fa-check-circle text-red me-2"></i>
                            Membentuk pelajar yang beriman,
                            bertakwa dan berakhlak mulia.
                        </li>

                        <li class="mb-3">
                            <i class="fas fa-check-circle text-red me-2"></i>
                            Mengembangkan kemampuan akademik
                            dan organisasi.
                        </li>

                        <li class="mb-3">
                            <i class="fas fa-check-circle text-red me-2"></i>
                            Berkontribusi bagi masyarakat,
                            bangsa, dan negara.
                        </li>

                        <li class="mb-3">
                            <i class="fas fa-check-circle text-red me-2"></i>
                            Memperjuangkan aspirasi pelajar Indonesia.
                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- ==========================
     LOGO
=========================== -->

<section class="section-padding bg-cream">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-5 wow fadeInLeft align-items-center">

                <img
                    src="{{ asset('img/Logo ppi.png') }}"
                    class="img-fluid"
                    style="max-width:300px; border">

            </div>

            <div class="col-lg-7 wow fadeInRight">

                <span class="badge-modern">
                    Identitas Kami
                </span>

                <h2 class="display-6 mt-3 text-red">

                    Makna Logo

                </h2>

                <ul class="list-unstyled mt-4">

                    <li class="mb-3">
                        <i class="fas fa-check-circle text-red me-2"></i>
                        Bawang putih melambangkan identitas Kota Kastamonu.
                    </li>

                    <li class="mb-3">
                        <i class="fas fa-check-circle text-red me-2"></i>
                        Pena melambangkan semangat pelajar.
                    </li>

                    <li class="mb-3">
                        <i class="fas fa-check-circle text-red me-2"></i>
                        Merah Putih sebagai identitas Indonesia.
                    </li>

                    <li class="mb-3">
                        <i class="fas fa-check-circle text-red me-2"></i>
                        Bulan sabit dan bintang melambangkan Turki.
                    </li>

                    <li class="mb-3">
                        <i class="fas fa-check-circle text-red me-2"></i>
                        Siluet kota menunjukkan identitas Kastamonu.
                    </li>

                    <li class="mb-3">
                        <i class="fas fa-check-circle text-red me-2"></i>
                        Sungai melambangkan satu tujuan bersama.
                    </li>

                </ul>

            </div>

        </div>

    </div>

</section>


<!-- ==========================
     KASTAMONU
=========================== -->

<section class="section-padding">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-6 wow fadeInLeft">

                <div class="rounded-img shadow-soft">

                    <img
                        src="{{ asset('img/kastam.jpg') }}"
                        class="img-fluid"
                        alt="Kastamonu"
                        style="border-radius: 10px;">

                </div>

            </div>

            <div class="col-lg-6 wow fadeInRight">

                <span class="badge-modern">
                    Kota Kami
                </span>

                <h2 class="display-6 mt-3 text-red">

                    Kastamonu

                </h2>

                <p class="mt-4 text-muted">

                    Kastamonu merupakan salah satu provinsi di wilayah Laut Hitam
                    Turki yang terkenal sebagai penghasil bawang putih terbaik.
                    Kota ini memiliki lingkungan pendidikan yang nyaman,
                    budaya yang kaya,
                    serta menjadi rumah bagi mahasiswa internasional,
                    termasuk pelajar Indonesia yang tergabung dalam
                    Perhimpunan Pelajar Indonesia Kastamonu.

                </p>

            </div>

        </div>

    </div>

</section>

@endsection