@extends('layout.main')

@section('containers')
    <section class="section-padding bg-cream">

        <div class="container" style="margin-top: 50px">

            
            <div class="text-center mb-5">

                <h1 class="display-4 fw-bold mt-3">
                    Kabar
                    <span class="text-red">PPI Kastamonu</span>
                </h1>

                <div class="divider"></div>

                <p class="mx-auto text-muted mb-4" style="max-width:700px;">
                    Selamat datang di Kabar PPI Kastamonu.
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

                                <p class="text-muted grow">

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

                        <div class="text-center p-5">

                            <img src="{{ asset('img/Logo ppi.png') }}" alt="Logo"
                                style="width:120px;opacity:.4;margin:auto;">

                            <h3 class="mt-4 text-red">
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
            @if ($blogs->hasPages())
                <div class="mt-5 d-flex justify-content-center custom-pagination-wrapper">
                    {{ $blogs->appends(request()->query())->links('pagination::bootstrap-5') }}
                </div>
            @endif


        </div>

    </section>

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
