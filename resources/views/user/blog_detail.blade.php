@extends('layout.main')

@section('containers')

<div class="container-fluid py-5 bg-cream" style="padding-left:0; padding-right:0">
    <div class="container mb-5">
        <div class="card border-0">
            <div class="card-body bg-cream">

                <h3 class="display-5 text-start text-red pe-3 mb-4">
                    {{ $blog->title }}
                </h3>

                <div class="row g-5 align-items-center">

                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.2s">
                        <div class="about-img">
                            <img 
                                class="img-fluid w-100" 
                                src="{{ asset('storage/'.$blog->thumbnail) }}" 
                                alt="{{ $blog->title }}"
                                style="border-radius:15px"
                            >
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="wow fadeIn" data-wow-delay="0.3s">
                            <h3>{{ $blog->title }}</h3>
                            <p class="text-dark" style="white-space: pre-line;">
                                {{ $blog->content }}
                            </p>
                        </div>
                    </div>

                </div>

                @if ($blog->images->count())
                    <hr class="my-5">

                    <h4 class="text-red mb-4">Galeri Blog</h4>

                    <div class="row g-4 justify-content-center">
                        @foreach ($blog->images as $image)
                            <div class="col-6 col-md-4 col-lg-3 wow fadeIn">

                                <img
                                    src="{{ asset('storage/'.$image->image_path) }}"
                                    class="img-fluid w-100 gallery-img"
                                    style="border-radius:12px; object-fit:cover; height:180px; cursor:pointer;"
                                    alt="Galeri {{ $blog->title }}"
                                    onclick="openLightbox('{{ asset('storage/'.$image->image_path) }}')"
                                >

                            </div>
                        @endforeach
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>

{{-- LIGHTBOX --}}
<div id="lightbox" class="lightbox">
    <span class="lightbox-close">&times;</span>

    <img
        id="lightbox-img"
        class="lightbox-content"
        src=""
    >
</div>

<style>
.gallery-img{
    transition:.3s;
}

.gallery-img:hover{
    transform:scale(1.03);
}

.lightbox{
    display:none;
    position:fixed;
    inset:0;
    z-index:9999;
    background:rgba(0,0,0,.9);
    justify-content:center;
    align-items:center;
}

.lightbox-content{
    max-width:90%;
    max-height:90%;
    border-radius:12px;
    animation:zoom .25s;
}

.lightbox-close{
    position:absolute;
    top:20px;
    right:35px;
    color:white;
    font-size:42px;
    cursor:pointer;
    font-weight:bold;
}

@keyframes zoom{
    from{
        transform:scale(.8);
        opacity:0;
    }
    to{
        transform:scale(1);
        opacity:1;
    }
}
</style>

<script>
function openLightbox(src){
    const lightbox = document.getElementById('lightbox');
    const image = document.getElementById('lightbox-img');

    image.src = src;
    lightbox.style.display = 'flex';
}

document.querySelector('.lightbox-close').addEventListener('click', function () {
    document.getElementById('lightbox').style.display = 'none';
});

document.getElementById('lightbox').addEventListener('click', function(e){
    if(e.target === this){
        this.style.display = 'none';
    }
});

document.addEventListener('keydown', function(e){
    if(e.key === 'Escape'){
        document.getElementById('lightbox').style.display = 'none';
    }
});
</script>

@endsection
