@extends('layout.main')

@section('containers')
    <div class="container-fluid py-5 bg-cream">
        <div class="container" style="margin-top: 100px">

            {{-- HEADER --}}
            <div class="text-center mb-5">

                <h1 class="display-5 fw-bold">
                    Galeri
                    <span class="text-red">PPI Kastamonu</span>
                </h1>

                <div class="divider"></div>

                <p class="text-muted mx-auto" style="max-width:700px;">
                    Dokumentasi berbagai kegiatan, acara, dan momen kebersamaan
                    mahasiswa Indonesia di Universitas Kastamonu.
                </p>

            </div>

            {{-- KOSONG --}}
            @if ($activities->count() == 0 && $blogs->count() == 0)
                <div class="card-modern text-center py-5">

                    <i class="fas fa-images fa-4x text-danger mb-4"></i>

                    <h3 class="text-red">
                        Belum Ada Galeri
                    </h3>

                    <p class="text-muted mb-0">
                        Dokumentasi kegiatan akan segera ditampilkan di sini.
                    </p>

                </div>
            @endif
            @if ($activities->count() > 0 && $blogs->count() > 0)
                <div class="my-5">

                    <hr class="gallery-divider">

                    <div class="text-center py-4">

                        <h2 class="fw-bold text-red">
                            Aktivitas & Kegiatan
                        </h2>

                        <p class="text-muted mb-0">
                            Dokumentasi galeri dari aktivitas PPI Kastamonu.
                        </p>

                    </div>

                    <hr class="gallery-divider">

                </div>
            @endif

            {{-- ================= KEGIATAN ================= --}}
            @foreach ($activities as $activity)
                @if ($activity->images->count() > 0)
                    <div class="mb-5">

                        <div class="text-center mb-4">

                            <h3 class="text-red fw-bold">
                                {{ $activity->nama }}
                            </h3>

                            @if (isset($activity->date))
                                <p class="text-muted mb-0">
                                    {{ \Carbon\Carbon::parse($activity->date)->format('d M Y') }}
                                </p>
                            @endif

                        </div>

                        <div class="row g-4 justify-content-center">

                            @foreach ($activity->images as $img)
                                <div class="col-sm-6 col-md-4 col-lg-3">

                                    <div class="gallery-card shadow-sm">

                                        <a href="javascript:void(0)"
                                            onclick="openLightbox('{{ asset('storage/' . $img->image_path) }}')">

                                            <img src="{{ asset('storage/' . $img->image_path) }}"
                                                class="img-fluid gallery-img" alt="Activity Image">

                                        </a>

                                    </div>

                                </div>
                            @endforeach

                        </div>

                    </div>
                @endif
            @endforeach


            {{-- ================= DIVIDER ================= --}}
            @if ($activities->count() > 0 && $blogs->count() > 0)
                <div class="my-5">

                    <hr class="gallery-divider">

                    <div class="text-center py-4">

                        <h2 class="fw-bold text-red">
                            Blog & Artikel
                        </h2>

                        <p class="text-muted mb-0">
                            Dokumentasi galeri dari artikel Blog PPI Kastamonu.
                        </p>

                    </div>

                    <hr class="gallery-divider">

                </div>
            @endif


            {{-- ================= BLOG ================= --}}
            @foreach ($blogs as $blog)
                @if ($blog->images->count())
                    <div class="mb-5">

                        <div class="text-center mb-4">

                            <h3 class="text-red fw-bold">
                                {{ $blog->title }}
                            </h3>

                            <span class="badge-modern mb-3">

                                <i class="far fa-calendar-alt me-2"></i>

                                {{ $blog->created_at->format('d M Y') }}

                            </span>

                        </div>

                        <div class="row g-4 justify-content-center">

                            @foreach ($blog->images as $img)
                                <div class="col-sm-6 col-md-4 col-lg-3">

                                    <div class="gallery-card shadow-sm">

                                        <a href="javascript:void(0)"
                                            onclick="openLightbox('{{ asset('storage/' . $img->image_path) }}')">

                                            <img src="{{ asset('storage/' . $img->image_path) }}"
                                                class="img-fluid gallery-img" alt="Blog Image">

                                        </a>

                                    </div>

                                </div>
                            @endforeach

                        </div>

                    </div>
                @endif
            @endforeach

        </div>
    </div>

    {{-- LIGHTBOX --}}
    <div id="lightbox" class="lightbox">

        <span class="lightbox-close">&times;</span>

        <img class="lightbox-content" id="lightbox-img">

    </div>

    <style>
        .gallery-card {
            border-radius: 14px;
            overflow: hidden;
            transition: .3s;
            background: #fff;
        }

        .gallery-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, .12);
        }

        .gallery-img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            transition: .35s;
        }

        .gallery-card:hover .gallery-img {
            transform: scale(1.08);
        }

        /* Divider */
        .gallery-divider {
            width: 140px;
            height: 3px;
            margin: 0 auto;
            border: none;
            background: linear-gradient(to right, transparent, #dc3545, transparent);
            opacity: 1;
        }

        /* LIGHTBOX */

        .lightbox {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 9999;
            background: rgba(0, 0, 0, .85);
            backdrop-filter: blur(4px);
            justify-content: center;
            align-items: center;
            animation: fadeIn .2s;
        }

        .lightbox-content {
            max-width: 90%;
            max-height: 85%;
            border-radius: 12px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, .5);
            animation: zoomIn .25s;
        }

        .lightbox-close {
            position: absolute;
            top: 20px;
            right: 30px;
            font-size: 40px;
            color: #fff;
            cursor: pointer;
            font-weight: bold;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes zoomIn {
            from {
                transform: scale(.8);
            }

            to {
                transform: scale(1);
            }
        }
    </style>

    <script>
        function openLightbox(src) {

            const lightbox = document.getElementById('lightbox');
            const img = document.getElementById('lightbox-img');

            img.src = src;
            lightbox.style.display = 'flex';

        }

        document.querySelector('.lightbox-close').onclick = function() {

            document.getElementById('lightbox').style.display = 'none';

        }

        document.getElementById('lightbox').onclick = function(e) {

            if (e.target === this) {

                this.style.display = 'none';

            }

        }

        document.addEventListener('keydown', function(e) {

            if (e.key === 'Escape') {

                document.getElementById('lightbox').style.display = 'none';

            }

        });
    </script>
@endsection
