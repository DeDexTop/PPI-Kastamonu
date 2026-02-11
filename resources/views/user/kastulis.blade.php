@extends('layout.main')

@section('containers')
<div class="container-fluid py-5 bg-cream">
    <div class="container">

        <div class="row g-5">
            <div class="col-lg-8 wow fadeIn mb-4" data-wow-delay="0.1s">
                <div class="service-title mb-4">
                    <h1 class="display-6 text-red">Apa itu Kastulis?</h1>
                    <p class="fs-8 ">
                        Kastulis adalah Kastamonu Penulis, sebuah wadah bagi para penulis di organisasi
                        PPI Kastamonu untuk berbagi karya tulis mereka. Di sini, Anda dapat menemukan berbagai artikel,
                        cerita pendek, puisi, dan esai yang ditulis oleh anggota organisasi kami.
                    </p>
                </div>
            </div>
        </div>



        {{-- LIST POSTS --}}
<div class="row g-4 justify-content-center">

    @forelse ($posts as $post)
        <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.1s">
            <div class="post-card h-100">

                {{-- Thumbnail --}}
                <img 
                    src="{{ asset('storage/'.$post->thumbnail) }}" 
                    alt="{{ $post->title }}"
                    class="post-thumb"
                >

                {{-- Body --}}
                <div class="post-body">

                    <h3 class="post-title">
                        {{ $post->title }}
                    </h3>

                    <div class="post-author">
                        ✍ {{ $post->author->pen_name ?? $post->author->name }}
                    </div>

                    <p class="post-excerpt">
                        {{ Str::limit(strip_tags($post->content), 120) }}
                    </p>

                    <a 
                        href="{{ route('posts.show', $post->id) }}"
                        class="text-red fw-semibold"
                    >
                        Selengkapnya →
                    </a>

                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center wow fadeIn">
            <p class="fs-8 text-muted">
                Belum ada tulisan yang dipublikasikan.
            </p>
        </div>
    @endforelse

</div>


        {{-- PAGINATION --}}
        <div class="mt-5 d-flex justify-content-center">
            {{ $posts->links('pagination::bootstrap-5') }}
        </div>

    </div>
</div>
@endsection
