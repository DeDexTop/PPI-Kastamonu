@extends('layout.main')

@section('containers')

<section class="section-padding bg-cream">

    <div class="container" style="margin-top:100px">

        <div class="row justify-content-center">

            <div class="col-lg-10">

                <!-- Header -->
                <div class="text-center mb-5">

                    <span class="badge-modern">
                        Penulis
                    </span>

                    <h1 class="display-4 fw-bold mt-3">

                        {{ $author->pen_name }}

                    </h1>

                    <div class="divider"></div>

                </div>

                <div class="row g-5">

                    <!-- Profil -->
                    <div class="col-lg-4">

                        <div class="member-card">

                            @if($author->photo)

                                <img
                                    src="{{ asset('storage/'.$author->photo) }}"
                                    alt="{{ $author->pen_name }}">

                            @else

                                <img
                                    src="{{ asset('img/blank.png') }}"
                                    alt="Default">

                            @endif

                            <div class="card-body">

                                <h4 class="fw-bold">

                                    {{ $author->pen_name }}

                                </h4>

                                <span>

                                    {{ $author->name }}

                                </span>

                                <hr>

                                <h5 class="text-red">

                                    {{ $author->posts->count() }}

                                </h5>

                                <small class="text-muted">

                                    Artikel Dipublikasikan

                                </small>

                            </div>

                        </div>

                    </div>

                    <!-- Biodata & Artikel -->
                    <div class="col-lg-8">

                        <!-- Biodata -->

                        <div class="card-modern p-4 mb-5">

                            <h3 class="text-red mb-4">

                                Tentang Penulis

                            </h3>

                            <p
                                class="text-muted"
                                style="white-space:pre-line;line-height:2;">

                                {{ $author->bio ?? 'Penulis belum menambahkan biodata.' }}

                            </p>

                        </div>

                        <!-- Artikel -->

                        <div class="card-modern p-4">

                            <h3 class="text-red mb-4">

                                Artikel Penulis

                            </h3>

                            @forelse($author->posts as $post)

                                <div class="blog-card mb-4">

                                    <div class="card-body">

                                        <span class="badge-modern mb-3">

                                            {{ $post->created_at->translatedFormat('d M Y') }}

                                        </span>

                                        <h4>

                                            {{ $post->title }}

                                        </h4>

                                        <p class="text-muted">

                                            {{ Str::limit(strip_tags($post->content),170) }}

                                        </p>

                                        <a
                                            href="{{ route('posts.show',$post->id) }}"
                                            class="btn btn-modern bg-red text-white">

                                            Baca Selengkapnya

                                        </a>

                                    </div>

                                </div>

                            @empty

                                <div class="text-center py-5">

                                    <img
                                        src="{{ asset('img/Logo ppi.png') }}"
                                        style="width:90px;opacity:.35;">

                                    <h4 class="mt-4">

                                        Belum Ada Artikel

                                    </h4>

                                    <p class="text-muted">

                                        Penulis ini belum mempublikasikan artikel.

                                    </p>

                                </div>

                            @endforelse

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection