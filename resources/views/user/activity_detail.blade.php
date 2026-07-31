@extends('layout.main')

@section('containers')

<section class="section-padding bg-cream">

    <div class="container" style="margin-top: 100px">

        {{-- HEADER --}}

        <div class="row justify-content-center">

            <div class="col-lg-10">

                <div class="card-modern p-4 p-lg-5">

                    <!-- Judul -->

                    <div class="text-center mb-5">

                        <span class="badge-modern">
                            Aktivitas
                        </span>

                        <h1 class="display-4 fw-bold text-red mt-3">
                            {{ $activity->nama }}
                        </h1>

                        <div class="divider"></div>

                    </div>

                    <!-- Konten -->

                    <div class="row g-5 align-items-center">

                        <div class="col-lg-6">

                            <div class="activity-thumbnail">

                                <img
                                    src="{{ asset('storage/'.$activity->thumbnail) }}"
                                    alt="{{ $activity->nama }}"
                                    class="img-fluid">

                            </div>

                        </div>

                        <div class="col-lg-6">

                            <h3 class="text-red fw-bold mb-4">

                                Tentang Kegiatan

                            </h3>

                            <p
                                class="text-muted"
                                style="white-space:pre-line;line-height:2;">

                                {{ $activity->deskripsi }}

                            </p>

                        </div>

                    </div>

                    @if($activity->images->count())

                    <div class="mt-5 pt-5 border-top">

                        <div class="text-center mb-5">

                            <span class="badge-modern">

                                Dokumentasi

                            </span>

                            <h2 class="fw-bold mt-3">

                                Galeri Kegiatan

                            </h2>

                            <div class="divider"></div>

                        </div>

                        <div class="row g-4 justify-content-center d-flex">

                            @foreach($activity->images as $image)

                            <div class="col-6 col-md-4 col-lg-3">

                                <div
                                    class="gallery-item"
                                    onclick="openLightbox('{{ asset('storage/'.$image->image_path) }}')">

                                    <img
                                        src="{{ asset('storage/'.$image->image_path) }}"
                                        class="img-fluid"
                                        alt="Galeri">

                                </div>

                            </div>

                            @endforeach

                        </div>

                    </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

</section>

<!-- Lightbox -->

<div id="activity-lightbox" class="activity-lightbox">

    <span class="activity-lightbox-close">&times;</span>

    <img
        id="activity-lightbox-image"
        class="activity-lightbox-image"
        src="">

</div>

<style>

.activity-lightbox{
    position:fixed;
    inset:0;
    display:none;
    align-items:center;
    justify-content:center;
    background:rgba(0,0,0,.92);
    z-index:99999;
    animation:fadeIn .3s;
}

.activity-lightbox-image{
    max-width:90%;
    max-height:90%;
    border-radius:20px;
    box-shadow:0 20px 60px rgba(0,0,0,.4);
    animation:zoomIn .35s;
}

.activity-lightbox-close{
    position:absolute;
    top:25px;
    right:35px;
    font-size:50px;
    color:#fff;
    cursor:pointer;
    transition:.3s;
}

.activity-lightbox-close:hover{
    transform:rotate(90deg);
}

@keyframes zoomIn{

    from{
        opacity:0;
        transform:scale(.8);
    }

    to{
        opacity:1;
        transform:scale(1);
    }

}

@media(max-width:768px){

    .activity-lightbox-image{

        max-width:95%;
        max-height:80%;

    }

}

</style>

<script>

const lightbox=document.getElementById('activity-lightbox');
const image=document.getElementById('activity-lightbox-image');

function openLightbox(src){

    image.src=src;
    lightbox.style.display='flex';

}

function closeLightbox(){

    lightbox.style.display='none';

}

document.querySelector('.activity-lightbox-close')
.addEventListener('click',closeLightbox);

lightbox.addEventListener('click',function(e){

    if(e.target===lightbox){

        closeLightbox();

    }

});

document.addEventListener('keydown',function(e){

    if(e.key==="Escape"){

        closeLightbox();

    }

});

</script>

@endsection