@extends('layout.main')

@section('containers')
    <section class="section-padding bg-cream">

        <div class="container" style="margin-top: 50px">

            <!-- Header -->
            <div class="text-center mb-5">

                <h1 class="display-4 fw-bold mt-3">
                    Blog
                    <span class="text-red">PPI Kastamonu</span>
                </h1>

                <div class="divider"></div>

                <p class="mx-auto text-muted mb-4" style="max-width:700px;">
                    Selamat datang di blog resmi PPI Kastamonu.
                    Temukan cerita, pengalaman, informasi akademik,
                    kegiatan organisasi, serta berbagai artikel menarik
                    dari mahasiswa Indonesia di Kastamonu.
                </p>

                {{-- SYSTEM SEARCH BAR (DESAIN KAPSUL BARU) --}}
                <div class="search-wrapper mx-auto">
                    <form action="{{ request()->url() }}" method="GET" class="search-form shadow-hover">
                        <div class="search-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <input type="text" name="search" class="form-control search-input" placeholder="Cari artikel..."
                            value="{{ request('search') }}">


                        @if (request('search'))
                            <a href="{{ request()->url() }}" class="btn-reset-search" title="Hapus Pencarian">
                                ✕
                            </a>
                        @endif
                        <button type="submit" class="btn-search-submit">Cari</button>
                    </form>
                </div>

            </div>

            <!-- Blog List -->
            <div class="row justify-content-center g-4">

                @forelse($blogs as $blog)
                    <div class="col-md-6 col-lg-4 wow fadeInUp">

                        <article class="blog-card h-100">

                            <div class="overflow-hidden">

                                <img src="{{ $blog->thumbnail ? asset('storage/' . $blog->thumbnail) : asset('img/default-blog.jpg') }}"
                                    alt="{{ $blog->title }}" class="img-fluid w-100">

                            </div>

                            <div class="card-body d-flex flex-column p-4">

                                <span class="badge-modern mb-3" style="width:fit-content;">

                                    <i class="far fa-calendar-alt me-2"></i>

                                    {{ $blog->created_at->format('d M Y') }}

                                </span>

                                <h4 class="fw-bold mb-3">

                                    {{ $blog->title }}

                                </h4>

                                <p class="text-muted flex-grow-1">

                                    {{ Str::limit(strip_tags($blog->content), 150) }}

                                </p>

                                <div class="mt-3">

                                    <a href="{{ url('/blog/' . $blog->id) }}" class="btn btn-modern bg-red text-white">

                                        Baca Selengkapnya

                                        <i class="fas fa-arrow-right ms-2"></i>

                                    </a>

                                </div>

                            </div>

                        </article>

                    </div>

                @empty

                    <div class="col-lg-8">

                        <div class="card-modern text-center p-5">

                            <img src="{{ asset('img/Logo ppi.png') }}" alt="Logo"
                                style="width:120px;opacity:.4;margin:auto;">

                            <h3 class="mt-4">
                                {{ request('search') ? 'Artikel Tidak Ditemukan' : 'Belum Ada Artikel' }}
                            </h3>

                            <p class="text-muted">
                                {{ request('search')
                                    ? 'Tidak ada artikel atau berita yang cocok dengan kata kunci tersebut.'
                                    : 'Artikel blog akan muncul di halaman ini setelah dipublikasikan melalui dashboard.' }}
                            </p>

                        </div>

                    </div>
                @endforelse

            </div>

            {{-- PAGINATION --}}
            @if (method_exists($blogs, 'hasPages') && $blogs->hasPages())
                <div class="mt-5 d-flex justify-content-center">
                    {{ $blogs->appends(request()->query())->links('pagination::bootstrap-5') }}
                </div>
            @endif

        </div>

    </section>

    {{-- CUSTOM CSS UNTUK FILTER SEARCH --}}
    <style>
        .search-wrapper {
            max-width: 480px;
            width: 100%;
            padding: 0 15px;
        }

        .search-form {
            display: flex;
            align-items: center;
            background: #ffffff;
            border-radius: 50px;
            padding: 6px 6px 6px 20px;
            border: 1px solid rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .search-icon {
            font-size: 0.95rem;
            color: #6c757d;
            margin-right: 10px;
            display: flex;
            align-items: center;
        }

        .search-input {
            border: none !important;
            background-color: transparent !important;
            box-shadow: none !important;
            font-size: 0.95rem;
            color: #495057;
            padding: 8px 0;
        }

        .btn-search-submit {
            background-color: #dc3545;
            /* Menyesuaikan class bg-red / merah PPI */
            color: #ffffff;
            border: none;
            padding: 8px 22px;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 500;
            transition: background-color 0.2s ease;
        }

        .btn-search-submit:hover {
            background-color: #bd2130;
        }

        .btn-reset-search {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            color: #6c757d;
            background-color: #f8f9fa;
            border-radius: 50%;
            text-decoration: none;
            font-size: 0.8rem;
            font-weight: bold;
            transition: all 0.2s ease;
            margin-right: 8px;
            flex-shrink: 0;
        }

        .btn-reset-search:hover {
            background-color: #dc3545;
            color: #ffffff;
            transform: rotate(90deg);
        }
    </style>
@endsection
