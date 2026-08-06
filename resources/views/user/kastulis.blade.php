@extends('layout.main')

@section('containers')
    <section class="section-padding bg-cream">

        <div class="container" style="margin-top: 50px">

            {{-- HEADER --}}
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold mt-3">
                    Cerita & Karya
                    <span class="text-red">
                        PPI Kastamonu
                    </span>
                </h1>

                <div class="divider"></div>

                <p class="text-muted mx-auto mb-4" style="max-width:750px;">
                    Ruang bagi anggota PPI Kastamonu untuk berbagi
                    gagasan melalui artikel, puisi, cerita pendek,
                    dan tulisan inspiratif.
                </p>

                {{-- FILTER SYSTEM (DESIGN UPDATED) --}}
                <div class="filter-wrapper mx-auto">
                    <form action="{{ request()->url() }}" method="GET" class="filter-form shadow-hover">
                        <div class="filter-icon">
                            ✍
                        </div>
                        <select name="author" class="form-select filter-select" onchange="this.form.submit()">
                            <option value="">Semua Penulis</option>
                            @foreach ($authors as $author)
                                <option value="{{ $author->id }}"
                                    {{ request('author') == $author->id ? 'selected' : '' }}>
                                    {{ $author->pen_name ?? $author->name }}
                                </option>
                            @endforeach
                        </select>

                        @if (request('author'))
                            <a href="{{ request()->url() }}" class="btn-reset" title="Reset Filter">
                                ✕
                            </a>
                        @endif
                    </form>
                </div>
            </div>

            {{-- POSTS --}}
            <div class="row g-4 align-baseline justify-content-center">
                @forelse($posts as $post)
                    <div class="col-md-6 col-lg-4">
                        <article class="blog-card shadow-hover h-100">
                            {{-- IMAGE --}}
                            <div class="overflow-hidden">
                                <img src="{{ $post->thumbnail ? asset('storage/' . $post->thumbnail) : asset('img/default-blog.jpg') }}"
                                    alt="{{ $post->title }}">
                            </div>

                            {{-- BODY --}}
                            <div class="card-body d-flex flex-column">
                                <span class="category text-center">
                                    Karya Tulisan
                                </span>

                                <div class="d-flex justify-content-between mb-3">
                                    <small class="text-muted">
                                        ✍ {{ $post->author->pen_name ?? $post->author->name }}
                                    </small>
                                    <small class="text-muted">
                                        {{ $post->created_at->format('d M Y') }}
                                    </small>
                                </div>

                                <h4>{{ $post->title }}</h4>

                                <p class="flex-grow-1">
                                    {{ Str::limit(strip_tags($post->content), 130) }}
                                </p>

                                <a href="{{ route('posts.show', $post->id) }}" class="mt-auto">
                                    Baca Selengkapnya <span>→</span>
                                </a>
                            </div>
                        </article>
                    </div>
                @empty
                    {{-- EMPTY STATE --}}
                    <div class="col-12">
                        <div class="empty-state">
                            <img src="{{ asset('img/Logo ppi.png') }}" alt="Logo PPI Kastamonu">
                            <h4>Belum ada tulisan yang dipublikasikan.</h4>
                            <p class="text-muted">
                                @if (request('author'))
                                    Penulis ini belum memiliki karya yang dipublikasikan.
                                @else
                                    Karya anggota akan tampil di sini setelah ditambahkan.
                                @endif
                            </p>
                        </div>
                    </div>
                @endforelse
            </div>

            {{-- PAGINATION --}}
            @if ($posts->hasPages())
                <div class="mt-5 d-flex justify-content-center custom-pagination-wrapper">
                    {{ $posts->appends(request()->query())->links('pagination::bootstrap-5') }}
                </div>
            @endif


        </div>
    </section>

    <style>
        .blog-card img {
            height: 280px;
            object-fit: cover;
        }

        .blog-card .card-body {
            padding: 30px;
        }

        .blog-card h4 {
            min-height: 60px;
        }

        .blog-card a {
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .blog-card a:hover span {
            transform: translateX(5px);
            display: inline-block;
        }

        .empty-state {
            min-height: 350px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .empty-state img {
            width: 120px;
            opacity: .4;
            margin-bottom: 20px;
        }

        .empty-state h4 {
            color: var(--primary);
        }


        .filter-wrapper {
            max-width: 400px;
            width: 100%;
            padding: 0 15px;
        }

        .filter-form {
            display: flex;
            align-items: center;
            background: #ffffff;
            border-radius: 50px;
            padding: 6px 6px 6px 20px;
            border: 1px solid rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .filter-icon {
            font-size: 1.1rem;
            color: #6c757d;
            margin-right: 5px;
            display: flex;
            align-items: center;
        }

        .filter-select {
            border: none !important;
            background-color: transparent !important;
            box-shadow: none !important;
            font-size: 0.95rem;
            font-weight: 500;
            color: #495057;
            cursor: pointer;
            padding-top: 8px;
            padding-bottom: 8px;
        }


        .btn-reset {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            background-color: #f8f9fa;
            color: #6c757d;
            border-radius: 50%;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: bold;
            transition: all 0.2s ease;
            margin-left: 5px;
            flex-shrink: 0;
        }

        .btn-reset:hover {
            background-color: #dc3545;
            color: #ffffff;
            transform: rotate(90deg);
        }

        @media(max-width:768px) {
            .blog-card img {
                height: 220px;
            }
        }

        .custom-pagination-wrapper nav .d-none,
        .custom-pagination-wrapper nav div.flex-sm-fill {
            display: flex !important;
            width: 100% !important;
            justify-content: center !important;
        }


        .custom-pagination-wrapper nav div:first-child,
        .custom-pagination-wrapper nav p {
            display: none !important;
        }

        .custom-pagination-wrapper .pagination {
            display: flex !important;
            margin-bottom: 0;
            padding-left: 0 !important;
            list-style: none !important;
            gap: 6px !important;
            margin: 0 auto !important;
        }

        .custom-pagination-wrapper .page-item .page-link {
            display: flex !important;
            color: #495057 !important;
            background-color: #ffffff !important;
            border: 1px solid rgba(0, 0, 0, 0.06) !important;
            border-radius: 50% !important;
            /* Bulat Lingkaran */
            width: 42px !important;
            height: 42px !important;
            align-items: center !important;
            justify-content: center !important;
            font-size: 0.95rem !important;
            font-weight: 500 !important;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.02);
            transition: all 0.2s ease;
        }

        .custom-pagination-wrapper .page-item .page-link:hover {
            color: #dc3545 !important;
            background-color: #fff5f5 !important;
            border-color: rgba(220, 53, 69, 0.2) !important;
            transform: translateY(-2px);
        }

        .custom-pagination-wrapper .page-item.active .page-link {
            color: #ffffff !important;
            background-color: #dc3545 !important;
            border-color: #dc3545 !important;
            font-weight: 600;
            box-shadow: 0 4px 10px rgba(220, 53, 69, 0.25);
        }

        .custom-pagination-wrapper .page-item.disabled .page-link {
            color: #bcbcbc !important;
            background-color: #f8f9fa !important;
            border-color: rgba(0, 0, 0, 0.04) !important;
            pointer-events: none;
        }

        @media(max-width: 768px) {
            .custom-pagination-wrapper .page-item .page-link {
                width: 38px !important;
                height: 38px !important;
                font-size: 0.85rem !important;
            }
        }
    </style>
@endsection
