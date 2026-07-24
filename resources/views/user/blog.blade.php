@extends('layout.main')

@section('containers')

<div class="container-fluid py-5 bg-cream">
    <div class="container">

        {{-- Header --}}
        <div class="text-center mb-5">
            <h1 class="display-6 text-red">Blog</h1>
            <p class="text-muted mx-auto" style="max-width:800px;">
                Selamat datang di blog kami! Di sini, kami berbagi informasi, cerita, dan pengalaman
                seputar kehidupan mahasiswa Indonesia di Universitas Kastamonu.
                Temukan artikel menarik yang dapat menginspirasi dan memberikan wawasan baru.
            </p>
        </div>

        <div class="row g-4">

            @forelse($blogs as $blog)

                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">

                    <div class="card blog-card h-100 border-0 shadow-sm">

                        {{-- Thumbnail --}}
                        <img
                            src="{{ $blog->thumbnail ? asset('storage/'.$blog->thumbnail) : asset('img/default-blog.jpg') }}"
                            class="card-img-top blog-image"
                            alt="{{ $blog->title }}">

                        <div class="card-body d-flex flex-column">

                            <small class="text-muted mb-2">
                                {{ $blog->created_at->format('d M Y') }}
                            </small>

                            <h4 class="card-title text-red">
                                {{ $blog->title }}
                            </h4>

                            <p class="card-text text-muted flex-grow-1">
                                {{ Str::limit(strip_tags($blog->content), 130) }}
                            </p>

                            <a href="{{ url('/blog/'.$blog->id) }}"
                               class="btn btn-outline-danger mt-auto">
                                Selengkapnya →
                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12 text-center">
                    <h5 class="text-muted">
                        Belum ada postingan yang ditambahkan.
                    </h5>
                </div>

            @endforelse

        </div>

    </div>
</div>

<style>
.blog-card{
    border-radius:18px;
    overflow:hidden;
    transition:.3s;
}

.blog-card:hover{
    transform:translateY(-8px);
    box-shadow:0 15px 35px rgba(0,0,0,.15)!important;
}

.blog-image{
    width:100%;
    height:240px;
    object-fit:cover;
}

.blog-card .card-body{
    padding:22px;
}

.blog-card .card-title{
    font-weight:700;
    margin-bottom:12px;
    min-height:60px;
}

.blog-card .card-text{
    line-height:1.7;
}

.btn-outline-danger{
    border-radius:10px;
    font-weight:600;
}

.btn-outline-danger:hover{
    color:#fff;
}
</style>

@endsection