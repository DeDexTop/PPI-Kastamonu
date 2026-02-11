@extends('layout.main')

@section('containers')
<div class="container-fluid py-5 bg-cream">
    <div class="container">
        <div class="card border-0 bg-cream">
            <div class="card-body">
                <h1 class="display-5 text-red mb-4">
                    {{ $post->title }}
                </h1>
                <img 
                    src="{{ asset('storage/'.$post->thumbnail) }}" 
                    class="img-fluid w-150 mb-4"
                    style="border-radius:15px"
                >
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
                        <h5 class="mb-1 text-red">
                            {{ $post->author->pen_name }}
                        </h5>

                        <small class="text-muted">
                            {{ $post->author->name }}
                        </small>
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>
@endsection
