@extends('layout.main')

@section('containers')
<div class="container-fluid py-5 bg-cream">
    <div class="container">
        <div class="card border-0 bg-cream">
            <div class="card-body">
                <h1 class="display-5 text-red mb-4">
                    {{ $post->title }}
                </h1>
                <div class="thumbnail-wrapper mb-5">
                    <img 
                        src="{{ asset('storage/'.$post->thumbnail) }}" 
                        class="thumbnail-img"
                        alt="{{ $post->title }}"
                    >
                </div>
                <div class="fs-5 text-dark mb-5">
                    {!! nl2br(e($post->content)) !!}
                </div>
                <hr class="my-5">

                <h5 class="text-red mb-5">Profile Author</h5>

                <div class="d-flex align-items-center gap-4">
                    

                    <img 
                        src="{{ asset('storage/'.$post->author->photo) }}" 
                        width="100"
                        height="100"
                        style="border-radius:15px; object-fit:cover"
                    >

                    <div>
                        <a href="{{ route('author.profile', $post->author->id) }}">
                            <h5 class="text-red mb-1">
                                {{ $post->author->pen_name }}
                            </h5>
                        </a>

                        <small class="text-muted">
                            {{ $post->author->name }}
                        </small>
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>

<style>
    .thumbnail-wrapper{
    width:100%;
    height:100% /* Tinggi yang diinginkan */
    overflow:hidden;
    border-radius:15px;
}

.thumbnail-img{
    width:100%;
    height:100%;
    object-fit:cover;
    border-radius:15px;
}
</style>
@endsection
