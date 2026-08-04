@extends('layout.main')

@section('containers')
    <div class="container-fluid py-5 bg-cream">
        <div class="container" style="margin-top: 100px">
            <div class="card border-0 bg-cream">
                <div class="card-body">

                    <!-- JUDUL ARTIKEL -->
                    <h1 class="display-5 text-red mb-4">
                        {{ $post->title }}
                    </h1>

                    <!-- AREA UTAMA KONTEN (Sistem Float Alami) -->
                    <div class="blog-wrapper text-start">

                        <!-- BANNER/THUMBNAIL ARTIKEL -->
                        <div class="thumbnail-wrapper">
                            <img src="{{ asset('storage/' . $post->thumbnail) }}" class="thumbnail-img"
                                alt="{{ $post->title }}">
                        </div>

                        <!-- TEKS ISI KASTULIS -->
                        <!-- TEKS ISI KASTULIS (Baru yang otomatis mendeteksi Link) -->
                        <div class="text-dark float-blog-text">
                            {!! nl2br(
                                preg_replace(
                                    '/(https?:\/\/[^\s]+)/',
                                    '<a href="$1" target="_blank" rel="noopener noreferrer" style="color: #dc3545; text-decoration: underline;">$1</a>',
                                    e($post->content),
                                ),
                            ) !!}
                        </div>


                    </div>

                    <!-- MEMBERSIHKAN EFEK FLOAT SEBELUM MASUK KE PROFIL AUTHOR -->
                    <div style="clear: both;"></div>

                    <hr class="my-5">

                    <!-- SEKSI PROFIL AUTHOR -->
                    <h5 class="text-red mb-5">Profile Author</h5>

                    <div class="d-flex align-items-center gap-4">
                        <img src="{{ asset('storage/' . $post->author->photo) }}" width="100" height="100"
                            style="border-radius:15px; object-fit:cover" alt="{{ $post->author->name }}">

                        <div>
                            <a href="{{ route('author.profile', $post->author->id) }}">
                                <h5 class="text-red mb-1">
                                    {{ $post->author->pen_name }}
                                </h5>
                            </a>

                            <small class="text-muted">
                                {{ $post->author->name }}
                            </small>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <style>
        /* CSS UNTUK BANNER UTAMA (FLOAT) */
        .thumbnail-wrapper {
            float: left;
            width: 45%;
            /* Gambar memakan 45% lebar layar desktop */
            margin-right: 30px;
            margin-bottom: 20px;
            overflow: hidden;
            border-radius: 15px;
        }

        .thumbnail-img {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 15px;
        }

        .float-blog-text {
            display: inline;
            /* Teks mengalir alami mengisi sela kosong */
            line-height: 1.7;
        }

        /* RESPONSIVE: Otomatis kembali normal di layar HP agar tulisan tidak berhimpitan */
        @media (max-width: 991px) {
            .thumbnail-wrapper {
                float: none;
                width: 100%;
                margin-right: 0;
                margin-bottom: 25px;
            }

            .float-blog-text {
                display: block;
            }
        }
    </style>
@endsection
