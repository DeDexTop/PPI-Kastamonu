@extends('layout.main')

@section('containers')

<div class="container-fluid py-5 bg-cream">
    <div class="container">

        <div class="row">

            {{-- Profil Author --}}
            <div class="col-lg-4 mb-4">

                <div class="card border-0 shadow-sm rounded-4 text-center p-4">

                    @if($author->photo)
                        <img src="{{ asset('storage/'.$author->photo) }}"
                             class="rounded-circle mx-auto mb-3"
                             style="width:180px;height:180px;object-fit:cover;"
                             alt="{{ $author->pen_name }}">
                    @else
                        <img src="{{ asset('img/blank.png') }}"
                             class="rounded-circle mx-auto mb-3"
                             style="width:180px;height:180px;object-fit:cover;"
                             alt="Default">
                    @endif

                    <h2 class="text-red mb-1">
                        {{ $author->pen_name }}
                    </h2>

                    <h6 class="text-muted mb-3">
                        {{ $author->name }}
                    </h6>

                    <hr>

                    <div class="text-start">

                        <p>
                            <strong>Jumlah Tulisan</strong><br>
                            {{ $author->posts->count() }} Artikel
                        </p>

                    </div>

                </div>

            </div>

            {{-- Biodata --}}
            <div class="col-lg-8">

                <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">

                    <h3 class="text-red mb-3">
                        Tentang Penulis
                    </h3>

                    <p style="white-space: pre-line;">
                        {{ $author->bio ?? 'Penulis belum menambahkan biodata.' }}
                    </p>

                </div>

                {{-- Daftar Tulisan --}}
                <div class="card border-0 shadow-sm rounded-4 p-4">

                    <h3 class="text-red mb-4">
                        Tulisan Penulis
                    </h3>

                    @forelse($author->posts as $post)

                        <div class="mb-4">

                            <h5>
                                <a href="{{ route('posts.show',$post->id) }}"
                                   class="text-decoration-none text-dark">
                                    {{ $post->title }}
                                </a>
                            </h5>

                            <small class="text-muted">
                                {{ $post->created_at->format('d M Y') }}
                            </small>

                            <p class="mt-2">
                                {{ Str::limit(strip_tags($post->content),150) }}
                            </p>

                            <a href="{{ route('posts.show',$post->id) }}"
                               class="btn btn-outline-danger btn-sm">
                                Baca Selengkapnya
                            </a>

                        </div>

                        <hr>

                    @empty

                        <div class="text-center py-4">
                            <p class="text-muted mb-0">
                                Penulis belum memiliki artikel.
                            </p>
                        </div>

                    @endforelse

                </div>

            </div>

        </div>

    </div>
</div>

@endsection