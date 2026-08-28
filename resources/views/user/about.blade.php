@extends('layout.main')

@section('containers')
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

                        Didirikan pada tahun 2016, PPI Kastamonu merupakan wadah berhimpunnya pelajar Indonesia
                        di Kastamonu untuk berkembang, berkolaborasi,
                        serta memberikan kontribusi bagi masyarakat Indonesia maupun Turki.

                    </p>

                </div>

                <div class="col-lg-6 wow fadeInRight">

                    <div class="rounded-img">

                        <img src="{{ asset('img/musta.JPG') }}" class="img-fluid img-about" alt="Tentang Kami"
                            style="height:400px; object-fit:cover;border-radius: 10px;">

                    </div>

                </div>

            </div>

        </div>

    </section>



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



    <section class="section-padding bg-cream">

        <div class="container">
            <div class="row justify-content-center text-center mb-5 wow fadeInUp">
                <span class="badge-modern">
                    Identitas Kami
                </span>
            </div>

            <div class="row align-items-center g-5">


                <div class="col-lg-5 wow fadeInLeft">

                    <img src="{{ asset('img/Logo ppi.png') }}" class="img-fluid img-about" style="max-width:300px; border">

                </div>

                <div class="col-lg-7 wow fadeInRight">

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



    <section class="section-padding">

        <div class="container">

            <div class="row justify-content-center text-center mb-5 wow fadeInUp">
                <span class="badge-modern">
                    Kota Kami
                </span>
            </div>

            <div class="row align-items-center g-5">

                <div class="col-lg-6 wow fadeInLeft">

                    <div class="rounded-img">

                        <img src="{{ asset('img/kastam.jpg') }}" class="img-fluid img-about" alt="Kastamonu"
                            style="border-radius: 10px;">
                        <p class="mt-2">Sumber: <a href="https://hadigez.com/kastamonu-gezi-notlari/" target="_blank"
                                class="text-red">hadigez.com</a></p>

                    </div>

                </div>

                <div class="col-lg-6 wow fadeInRight">

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

            <div class="row justify-content-center mt-5 wow fadeInUp">
                <div class="col-lg-12">
                    <div class="map-wrapper">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d47886.65335111611!2d33.7469699331073!3d41.39763415213568!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4084fa1240163891%3A0xd819b0a02911d532!2sKastamonu%2C%20Kastamonu%20Merkez%2FProvinsi%20Kastamonu%2C%20Turki!5e0!3m2!1sid!2sid!4v1785986925157!5m2!1sid!2sid"
                            width="100%" height="100%" style="border:0; min-height: 350px;" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>

        </div>


    </section>

    <style>
        .map-wrapper {
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
            border: 1px solid rgba(0, 0, 0, 0.03);
            height: 100%;
            min-height: 350px;
        }
    </style>
@endsection
