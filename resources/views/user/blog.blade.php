@extends('layout.main')

@section('containers')

<section class="section-padding bg-cream" >

    <div class="container" style="margin-top: 50px">

        <!-- Header -->
        <div class="text-center mb-5">


            <h1 class="display-4 fw-bold mt-3">
                Blog
                <span class="text-red">PPI Kastamonu</span>
            </h1>

            <div class="divider"></div>

            <p class="mx-auto text-muted" style="max-width:700px;">
                Selamat datang di blog resmi PPI Kastamonu.
                Temukan cerita, pengalaman, informasi akademik,
                kegiatan organisasi, serta berbagai artikel menarik
                dari mahasiswa Indonesia di Kastamonu.
            </p>

        </div>

        <!-- Blog List -->
        <div class="row justify-content-center g-4">

            @forelse($blogs as $blog)

            <div class="col-md-6 col-lg-4 wow fadeInUp">

                <article class="blog-card h-100">

                    <div class="overflow-hidden">

                        <img
                            src="{{ $blog->thumbnail
                                ? asset('storage/'.$blog->thumbnail)
                                : asset('img/default-blog.jpg') }}"
                            alt="{{ $blog->title }}"
                            class="img-fluid w-100">

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

                            <a href="{{ url('/blog/'.$blog->id) }}"
                               class="btn btn-modern bg-red text-white">

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

                    <img
                        src="{{ asset('img/Logo ppi.png') }}"
                        alt="Logo"
                        style="width:120px;opacity:.4;margin:auto;">

                    <h3 class="mt-4">

                        Belum Ada Artikel

                    </h3>

                    <p class="text-muted">

                        Artikel blog akan muncul di halaman ini
                        setelah dipublikasikan melalui dashboard.

                    </p>

                </div>

            </div>

            @endforelse

        </div>

    </div>

</section>

@endsection