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



        <p class="text-muted mx-auto"
           style="max-width:750px;">

            Ruang bagi anggota PPI Kastamonu untuk berbagi
            gagasan melalui artikel, puisi, cerita pendek,
            dan tulisan inspiratif.

        </p>


    </div>





    {{-- POSTS --}}
    <div class="row g-4 align-baseline justify-content-center">


        @forelse($posts as $post)



        <div class="col-md-6 col-lg-4">


            <article class="blog-card shadow-hover h-100">


                {{-- IMAGE --}}
                <div class="overflow-hidden">

                    <img
                        src="{{ $post->thumbnail
                            ? asset('storage/'.$post->thumbnail)
                            : asset('img/default-blog.jpg') }}"
                        alt="{{ $post->title }}"
                    >

                </div>




                {{-- BODY --}}
                <div class="card-body d-flex flex-column">



                    <span class="category text-center">

                        Karya Tulisan

                    </span>




                    <div class="d-flex justify-content-between mb-3">


                        <small class="text-muted">

                            ✍
                            {{ $post->author->pen_name ?? $post->author->name }}

                        </small>



                        <small class="text-muted">

                            {{ $post->created_at->format('d M Y') }}

                        </small>


                    </div>





                    <h4>

                        {{ $post->title }}

                    </h4>





                    <p class="flex-grow-1">

                        {{ Str::limit(
                            strip_tags($post->content),
                            130
                        ) }}

                    </p>





                    <a href="{{ route('posts.show',$post->id) }}"
                       class="mt-auto">

                        Baca Selengkapnya
                        <span>
                            →
                        </span>

                    </a>



                </div>


            </article>



        </div>



        @empty



        {{-- EMPTY STATE --}}

        <div class="col-12">


            <div class="empty-state">


                <img
                    src="{{ asset('img/Logo ppi.png') }}"
                    alt="Logo PPI Kastamonu"
                >


                <h4>

                    Belum ada tulisan yang dipublikasikan.

                </h4>


                <p class="text-muted">

                    Karya anggota akan tampil di sini
                    setelah ditambahkan melalui dashboard.

                </p>


            </div>


        </div>



        @endforelse



    </div>





    {{-- PAGINATION --}}

    @if($posts->hasPages())

    <div class="mt-5 d-flex justify-content-center">

        {{ $posts->links('pagination::bootstrap-5') }}

    </div>

    @endif




</div>

</section>




<style>


/* Kastulis Custom */


.blog-card img{

    height:280px;

    object-fit:cover;

}



.blog-card .card-body{

    padding:30px;

}



.blog-card h4{

    min-height:60px;

}



.blog-card a{

    display:inline-flex;

    align-items:center;

    gap:8px;

}



.blog-card a:hover span{

    transform:translateX(5px);

    display:inline-block;

}





.empty-state{

    min-height:350px;

    display:flex;

    flex-direction:column;

    justify-content:center;

    align-items:center;

    text-align:center;

}



.empty-state img{

    width:120px;

    opacity:.4;

    margin-bottom:20px;

}



.empty-state h4{

    color:var(--primary);

}





@media(max-width:768px){


    .blog-card img{

        height:220px;

    }


}



</style>


@endsection