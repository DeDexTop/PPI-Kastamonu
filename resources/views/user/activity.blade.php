@extends('layout.main')

@section('containers')
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

    <section class="section-padding bg-cream">

        <div class="container" style="margin-top: 50px">

            <!-- Header -->
            <div class="text-center mb-5">

                <h1 class="display-4 fw-bold mt-3">
                    Aktivitas
                    <span class="text-red">PPI Kastamonu</span>
                </h1>

                <div class="divider"></div>

                <p class="text-muted mx-auto" style="max-width:700px;">
                    Berbagai kegiatan yang diselenggarakan oleh
                    Perhimpunan Pelajar Indonesia Kastamonu sebagai
                    wadah pengembangan akademik, sosial, budaya,
                    dan kekeluargaan.
                </p>

            </div>

            @forelse($activities as $activity)
                <div class="row justify-content-center mb-5">

                    <div class="col-lg-10">

                        <div class="card-modern overflow-hidden wow fadeInUp">

                            <div class="row g-0 align-items-center">

                                <!-- Gambar -->
                                <div class="col-lg-5">

                                    <img src="{{ asset('storage/' . $activity->thumbnail) }}" alt="{{ $activity->nama }}"
                                        class="img-fluid w-100" style="height:330px; object-fit:cover;">

                                </div>

                                <!-- Konten -->
                                <div class="col-lg-7 d-flex align-items-center">

                                    <div class="p-5 text-center text-lg-start w-100">

                                        <span class="badge-modern mb-3">
                                            Aktivitas
                                        </span>

                                        <h2 class="fw-bold text-red mb-4">
                                            {{ $activity->nama }}
                                        </h2>

                                        <p class="text-muted mb-4">
                                            {{ Str::limit(strip_tags($activity->deskripsi), 250) }}
                                        </p>

                                        <a href="{{ url('/aktivitas/' . $activity->id) }}"
                                            class="btn btn-modern bg-red text-white">

                                            Selengkapnya
                                            <i class="fas fa-arrow-right ms-2"></i>

                                        </a>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                <div class="text-center py-5 justify-content-center align-items-center d-flex flex-column">

                    <img src="{{ asset('img/Logo ppi.png') }}" alt="Logo" style="width:120px; opacity:.4;">

                    <h4 class="mt-4 text-red">
                        Belum ada aktivitas yang ditambahkan.
                    </h4>

                    <p class="text-muted">
                        Aktivitas akan muncul di sini setelah ditambahkan melalui dashboard.
                    </p>

                </div>
            @endforelse

            {{-- PAGINATION --}}
            @if ($activities->hasPages())
                <div class="mt-5 d-flex justify-content-center custom-pagination-wrapper">
                    {{ $activities->appends(request()->query())->links('pagination::bootstrap-5') }}
                </div>
            @endif


        </div>

    </section>
@endsection
