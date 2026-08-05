@extends('layout.main')

@section('containers')

    <div class="container-fluid p-0 wow fadeIn bg-cream" data-wow-delay="0.1s">
        <div class="owl-carousel header-carousel py-5">
            <div class="container py-5">
                <div class="card border-0">
                    <div class="card-body bg-cream">
                        <div class="row g-5 align-items-center">
                            <div class="col-lg-6">
                                <div class="carousel-text px-4">
                                    <p class="fs-5 text-red">Motto Kami</p>
                                    <h1 class="display-1 text-uppercase mb-3 text-red">"Berpadu Menuju Satu"</h1>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="carousel-img">
                                    <img class="w-100" src="{{ asset('img/home_page.JPG') }}" alt="Image"
                                        style="border-radius: 20px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container py-5">
                <div class="card border-0">
                    <div class="card-body bg-cream">
                        <div class="row g-5 align-items-center">
                            <div class="col-lg-6">
                                <div class="carousel-text px-4">
                                    <p class="fs-5 text-red">Jargon Kami</p>
                                    <h2 class="display-2 text-uppercase mb-3 text-red">"Bismillah Kastamonu Kuat"</h2>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="carousel-img">
                                    <img class="w-100" src="{{ asset('img/home_page2.JPG') }}" alt="Image"
                                        style="border-radius: 20px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SEKSI: KENAPA KASTAMONU? -->
    <div class="container-fluid py-5 bg-cream border-top">
        <div class="container py-4">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <img src="{{ asset('img/kastamonu_kampus.JPG') }}" alt="Kastamonu" class="img-fluid image-shadow"
                        style="width: 100%; height: 380px; object-fit: cover; border-radius: 20px;">
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                    <p class="fs-5 text-red fw-bold mb-1">Eksplorasi</p>
                    <h2 class="text-dark mb-4 fw-bold">Kenapa Kuliah di Kastamonu?</h2>
                    <p class="text-muted text-justify-custom" style="line-height: 1.8;">
                        Kastamonu menawarkan perpaduan sempurna antara kualitas pendidikan tinggi yang berstandar Eropa
                        dan lingkungan kota yang aman, asri, serta kaya akan nilai sejarah budaya Turki.
                        Suhu udara yang sejuk dan biaya hidup yang relatif terjangkau menjadikannya salah satu kota tujuan
                        studi favorit bagi mahasiswa luar negeri.
                    </p>
                    <p class="text-muted text-justify-custom mb-4" style="line-height: 1.8;">
                        Bersama PPI Kastamonu, mahasiswa Indonesia tidak hanya belajar di ruang kelas, tetapi juga aktif
                        mengasah soft skill, berorganisasi, dan memperkenalkan kekayaan budaya nusantara ke masyarakat lokal
                        melalui berbagai festival internasional.
                    </p>
                    <div class="row g-3">
                        <div class="col-sm-6 d-flex align-items-center">
                            <i class="fa fa-check text-red me-2"></i> <span class="text-dark fw-bold small">Biaya Hidup
                                Terjangkau</span>
                        </div>
                        <div class="col-sm-6 d-flex align-items-center">
                            <i class="fa fa-check text-red me-2"></i> <span class="text-dark fw-bold small">Lingkungan Aman
                                & Nyaman</span>
                        </div>
                        <div class="col-sm-6 d-flex align-items-center">
                            <i class="fa fa-check text-red me-2"></i> <span class="text-dark fw-bold small">Ijazah Diakui
                                Global (Europass)</span>
                        </div>
                        <div class="col-sm-6 d-flex align-items-center">
                            <i class="fa fa-check text-red me-2"></i> <span class="text-dark fw-bold small">Komunitas
                                Kekeluargaan Erat</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SEKSI: PILAR GERAKAN ORGANISASI -->
    <div class="container-fluid py-5 bg-white border-top">
        <div class="container py-4">
            <div class="text-center mb-5 wow fadeIn">
                <p class="fs-5 text-red fw-bold mb-1">Fokus Utama</p>
                <h2 class="text-dark fw-bold">Pilar Kegiatan PPI Kastamonu</h2>
            </div>
            <div class="row g-4 text-center justify-content-center">
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="p-4 rounded-4 shadow-sm border h-100 bg-cream">
                        <div class="icon-box-pilar mb-3 mx-auto bg-red text-white rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 70px; height: 70px;">
                            <i class="fa fa-graduation-cap fs-3"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-2">Akademik & Edukasi</h5>
                        <p class="text-muted small mb-0">Mendukung kelancaran perkuliahan mahasiswa melalui kelas sharing,
                            bimbingan bahasa, dan penyediaan informasi kampus.</p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="p-4 rounded-4 shadow-sm border h-100 bg-cream">
                        <div class="icon-box-pilar mb-3 mx-auto bg-red text-white rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 70px; height: 70px;">
                            <i class="fa fa-users fs-3"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-2">Minat & Bakat</h5>
                        <p class="text-muted small mb-0">Wadah pengembangan potensi diri lewat kegiatan olahraga, seni,
                            pembuatan konten digital, dan komunitas diskusi.</p>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="p-4 rounded-4 shadow-sm border h-100 bg-cream">
                        <div class="icon-box-pilar mb-3 mx-auto bg-red text-white rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 70px; height: 70px;">
                            <i class="fa fa-globe fs-3"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-2">Diplomasi Budaya</h5>
                        <p class="text-muted small mb-0">Mengenalkan identitas dan kekayaan adat istiadat Indonesia kepada
                            publik internasional di wilayah Kastamonu.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SEKSI STATISTIK ORGANISASI -->
    <div class="container-fluid py-5 bg-red text-white">
        <div class="container py-3">
            <div class="row g-4 text-center">
                <div class="col-6 col-md-3 wow fadeIn" data-wow-delay="0.1s">
                    <h2 class="display-4 fw-extrabold mb-1 text-cream"><span class="counter" data-target="100">0</span>+
                    </h2>
                    <p class="mb-0 text-uppercase tracking-wider small text-beige">Mahasiswa Indonesia</p>
                </div>
                <div class="col-6 col-md-3 wow fadeIn" data-wow-delay="0.3s">
                    <h2 class="display-4 fw-extrabold mb-1 text-cream"><span class="counter" data-target="10">0</span>+
                    </h2>
                    <p class="mb-0 text-uppercase tracking-wider small text-beige">Divisi Kabinet</p>
                </div>
                <div class="col-6 col-md-3 wow fadeIn" data-wow-delay="0.5s">
                    <h2 class="display-4 fw-extrabold mb-1 text-cream"><span class="counter" data-target="15">0</span>+
                    </h2>
                    <p class="mb-0 text-uppercase tracking-wider small text-beige">Program Kerja</p>
                </div>
                <div class="col-6 col-md-3 wow fadeIn" data-wow-delay="0.7s">
                    <h2 class="display-4 fw-extrabold mb-1 text-cream"><span class="counter" data-target="10">0</span>+
                    </h2>
                    <p class="mb-0 text-uppercase tracking-wider small text-beige">Tahun Berdiri</p>
                </div>
            </div>
        </div>
    </div>


    <!-- SEKSI HIGHLIGHT BLOG / BERITA TERBARU -->
    <div class="container-fluid py-5 bg-cream border-top">
        <div class="container py-4">
            <div class="text-center mb-5 wow fadeIn">
                <p class="fs-5 text-red fw-bold mb-1">Kabar Kastamonu</p>
                <h2 class="text-dark fw-bold">Artikel & Berita Terbaru</h2>
            </div>
            <div class="row g-4 justify-content-center">
                @forelse(($blogs ?? []) as $blog)
                    <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.2s">
                        <div class="card h-100 border-0 card-blog-shadow" style="border-radius: 15px; overflow: hidden;">
                            <img src="{{ asset('storage/' . ($blog['thumbnail'] ?? '')) }}" class="card-img-top"
                                alt="{{ $blog['title'] ?? '' }}" style="height: 200px; object-fit: cover;">
                            <div class="card-body bg-white p-4 d-flex flex-column">
                                <span class="badge bg-cream-badge text-red mb-3 align-self-start py-2 px-3 fw-bold"
                                    style="border-radius: 30px;">
                                    <i class="far fa-calendar-alt me-2"></i>
                                    @if (isset($blog['created_at']))
                                        @if ($blog['created_at'] instanceof \Carbon\Carbon)
                                            {{ $blog['created_at']->format('d M Y') }}
                                        @else
                                            {{ \Carbon\Carbon::parse($blog['created_at'])->format('d M Y') }}
                                        @endif
                                    @else
                                        -
                                    @endif
                                </span>
                                <h5 class="card-title fw-bold text-dark mb-2 line-clamp-2">
                                    {{ $blog['title'] ?? '' }}
                                </h5>
                                <p class="card-text text-muted small flex-grow-1">
                                    {{ Str::limit(strip_tags($blog['content'] ?? ''), 100) }}
                                </p>
                                <a href="{{ route('blog.show', $blog['id'] ?? '#') }}"
                                    class="text-red fw-bold text-decoration-none mt-3 d-inline-block hover-arrow">
                                    Baca Selengkapnya <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted py-4">
                        Belum ada artikel berita yang diterbitkan.
                    </div>
                @endforelse
            </div>
        </div>
    </div>


    <!-- TAMBAHAN CSS UNTUK KONTEN BARU -->
    <style>
        /* CSS TAMBAHAN UNTUK SEKSI BARU */
        .fw-bold {
            font-weight: 700 !important;
        }

        .fw-extrabold {
            font-weight: 800 !important;
        }

        .bg-red {
            background-color: #dc3545 !important;
        }

        .text-red {
            color: #dc3545 !important;
        }

        .bg-cream-badge {
            background-color: #f7f1e3 !important;
        }


        .image-shadow {
            box-shadow: 0 12px 30px rgba(0, 0, 0, .12);
        }

        .card-blog-shadow {
            box-shadow: 0 10px 25px rgba(0, 0, 0, .05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-blog-shadow:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, .1);
        }

        .hover-arrow i {
            transition: transform 0.2s ease;
        }

        .hover-arrow:hover i {
            transform: translateX(5px);
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .text-justify-custom {
            text-align: justify;
        }

        .tracking-wider {
            letter-spacing: 0.05em;
        }

        .rounded-4 {
            border-radius: 1.25rem !important;
        }

        @media (max-width: 991px) {
            .text-justify-custom {
                text-align: center;
            }
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const counters = document.querySelectorAll('.counter');
            const duration = 1500; // Durasi total animasi dalam milidetik (1.5 detik)

            const animateCounter = (counter) => {
                const target = +counter.getAttribute('data-target');
                const startTime = performance.now();

                const updateCount = (currentTime) => {
                    const elapsedTime = currentTime - startTime;
                    // Hitung kemajuan animasi berdasarkan waktu yang telah berjalan
                    const progress = Math.min(elapsedTime / duration, 1);

                    // Hitung angka saat ini secara proporsional
                    const currentCount = Math.floor(progress * target);
                    counter.innerText = currentCount;

                    if (progress < 1) {
                        requestAnimationFrame(updateCount);
                    } else {
                        counter.innerText = target; // Pastikan angka akhir pas sesuai target
                    }
                };

                requestAnimationFrame(updateCount);
            };

            // Deteksi scroll menggunakan IntersectionObserver
            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateCounter(entry.target);
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.2
            });

            counters.forEach(counter => {
                observer.observe(counter);
            });
        });
    </script>



@endsection
