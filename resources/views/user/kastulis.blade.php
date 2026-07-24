@extends('layout.main')

@section('containers')

<div class="container-fluid py-5 bg-cream">
    <div class="container">

        {{-- Header --}}
        <div class="text-center mb-5">
            <h1 class="display-6 text-red">Apa itu Kastulis?</h1>
            <p class="text-muted mx-auto" style="max-width:850px;">
                Kastulis adalah Kastamonu Penulis, sebuah wadah bagi para penulis di organisasi
                PPI Kastamonu untuk berbagi karya tulis mereka. Di sini Anda dapat menemukan
                berbagai artikel, cerita pendek, puisi, dan esai yang ditulis oleh anggota
                organisasi kami.
            </p>
        </div>

        {{-- LIST POST --}}
        <div class="row g-4">

            @forelse($posts as $post)

                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">

                    <div class="card post-card border-0 shadow-sm h-100">

                        {{-- Thumbnail --}}
                        <img
                            src="{{ $post->thumbnail ? asset('storage/'.$post->thumbnail) : asset('img/default-blog.jpg') }}"
                            class="card-img-top post-image"
                            alt="{{ $post->title }}">

                        <div class="card-body d-flex flex-column">

                            {{-- Author & Date --}}
                            <div class="d-flex justify-content-between align-items-center mb-2">

                                <small class="text-muted">
                                    ✍ {{ $post->author->pen_name ?? $post->author->name }}
                                </small>

                                <small class="text-muted">
                                    {{ $post->created_at->format('d M Y') }}
                                </small>

                            </div>

                            {{-- Title --}}
                            <h4 class="card-title text-red">
                                {{ $post->title }}
                            </h4>

                            {{-- Excerpt --}}
                            <p class="card-text text-muted flex-grow-1">
                                {{ Str::limit(strip_tags($post->content), 120) }}
                            </p>

                            {{-- Button --}}
                            <a href="{{ route('posts.show', $post->id) }}"
                               class="btn btn-outline-danger mt-auto">
                                Selengkapnya →
                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12 text-center">
                    <h5 class="text-muted">
                        Belum ada tulisan yang dipublikasikan.
                    </h5>
                </div>

            @endforelse

        </div>

        {{-- Pagination --}}
        <div class="mt-5 d-flex justify-content-center">
            {{ $posts->links('pagination::bootstrap-5') }}
        </div>

    </div>
</div>

<style>
.post-card{
    border-radius:18px;
    overflow:hidden;
    transition:.3s;
    background:#fff;
}

.post-card:hover{
    transform:translateY(-8px);
    box-shadow:0 18px 35px rgba(0,0,0,.15)!important;
}

.post-image{
    width:100%;
    height:230px;
    object-fit:cover;
}

.post-card .card-body{
    padding:22px;
}

.post-card .card-title{
    font-size:1.25rem;
    font-weight:700;
    min-height:65px;
    margin-bottom:12px;
}

.post-card .card-text{
    line-height:1.7;
}

.btn-outline-danger{
    border-radius:10px;
    font-weight:600;
}

.btn-outline-danger:hover{
    color:#fff;
}

@media (max-width:768px){
    .post-image{
        height:200px;
    }

    .post-card .card-title{
        min-height:auto;
    }
}
</style>

@endsection