@extends('layout.main')

@section('containers')

    <div class="container-fluid py-5 bg-cream" style="padding-left:0; padding-right:0">
        <div class="container mb-5" style="margin-top: 100px">
            <div class="card border-0">
                <div class="card-body bg-cream">

                    
                    <h3 class="display-5 text-start text-red pe-3 mb-4">
                        {{ $blog->title }}
                    </h3>

                    
                    <div class="mb-4 wow fadeIn" data-wow-delay="0.1s">
                        <span class="badge-modern" style="width:fit-content; display: inline-block;">
                            <i class="far fa-calendar-alt me-2"></i>
                            {{ $blog->created_at->format('d M Y') }}
                        </span>
                    </div>

                    
                    <div class="blog-wrapper text-start">

                        
                        <div class="wow fadeIn float-blog-container" data-wow-delay="0.2s">
                            <img class="img-fluid float-blog-img" src="{{ asset('storage/' . $blog->thumbnail) }}"
                                alt="{{ $blog->title }}" style="border-radius:15px">
                        </div>

                        
                        <div class="text-dark float-blog-text">
                            {!! preg_replace(
                                '/(https?:\/\/[^\s]+)/',
                                '<a href="$1" target="_blank" rel="noopener noreferrer" style="color: #dc3545; text-decoration: underline;">$1</a>',
                                e($blog->content),
                            ) !!}
                        </div>

                    </div>

                    
                    <div style="clear: both;"></div>

                    
                    @if ($blog->images->count())
                        <hr class="my-5">

                        <h4 class="text-red mb-4">Galeri Blog</h4>

                        <div class="row g-4 justify-content-center">
                            @foreach ($blog->images as $image)
                                <div class="col-6 col-md-4 col-lg-3 wow fadeIn">

                                    <img src="{{ asset('storage/' . $image->image_path) }}"
                                        class="img-fluid w-100 gallery-img"
                                        style="border-radius:12px; object-fit:cover; height:180px; cursor:pointer;"
                                        alt="Galeri {{ $blog->title }}"
                                        onclick="openLightbox('{{ asset('storage/' . $image->image_path) }}')">

                                </div>
                            @endforeach
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

    {{-- LIGHTBOX --}}
    <div id="lightbox" class="lightbox">
        <span class="lightbox-close">&times;</span>
        <img id="lightbox-img" class="lightbox-content" src="">
    </div>

    <style>
        /* CSS UNTUK TATA LETAK UTAMA */
        .float-blog-container {
            float: left;
            width: 45%; /* Lebar gambar memakan 45% area desktop */
            margin-right: 30px;
            margin-bottom: 20px;
        }

        .float-blog-img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .float-blog-text {
            white-space: pre-line; /* Menjaga spasi enter paragraf tetap bekerja */
            display: inline;       /* Memaksa text bersifat inline agar mengalir alami mengisi sela kosong */
            line-height: 1.7;
            font-size: 1.05rem;
        }

        @media (max-width: 991px) {
            .float-blog-container {
                float: none;
                width: 100%;
                margin-right: 0;
                margin-bottom: 25px;
            }
            .float-blog-text {
                display: block; /* Kembali menjadi block di perangkat seluler */
            }
        }

        /* STYLE BAWAAN GALERI & LIGHTBOX ANDA */
        .gallery-img {
            transition: .3s;
        }

        .gallery-img:hover {
            transform: scale(1.03);
        }

        .lightbox {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 9999;
            background: rgba(0, 0, 0, .9);
            justify-content: center;
            align-items: center;
        }

        .lightbox-content {
            max-width: 90%;
            max-height: 90%;
            border-radius: 12px;
            animation: zoom .25s;
        }

        .lightbox-close {
            position: absolute;
            top: 20px;
            right: 35px;
            color: white;
            font-size: 42px;
            cursor: pointer;
            font-weight: bold;
        }

        @keyframes zoom {
            from {
                transform: scale(.8);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style>

    <script>
        function openLightbox(src) {
            const lightbox = document.getElementById('lightbox');
            const image = document.getElementById('lightbox-img');

            image.src = src;
            lightbox.style.display = 'flex';
        }

        document.querySelector('.lightbox-close').addEventListener('click', function() {
            document.getElementById('lightbox').style.display = 'none';
        });

        document.getElementById('lightbox').addEventListener('click', function(e) {
            if (e.target === this) {
                this.style.display = 'none';
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                document.getElementById('lightbox').style.display = 'none';
            }
        });
    </script>

@endsection
