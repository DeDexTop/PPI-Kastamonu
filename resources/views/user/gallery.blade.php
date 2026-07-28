@extends('layout.main')

@section('containers')

<div class="container-fluid py-5 bg-cream">
    <div class="container">

        {{-- HEADER --}}
        <div class="text-center mb-5">
            <h1 class="display-6 text-red">Galeri Kegiatan</h1>
        </div>

        {{-- JIKA TIDAK ADA DATA --}}
        @if($activities->count() == 0 && $blogs->count() == 0)
            <div class="text-center py-5">
                <h5 class="text-muted">Belum ada dokumentasi kegiatan 📸</h5>
            </div>
        @endif

        {{-- LOOP ACTIVITY --}}
        @foreach($activities as $activity)
            @if($activity->images->count() > 0)
                <div class="mb-5">

                    {{-- JUDUL ACTIVITY --}}
                    <div class="text-center mb-4">
                        <h3 class="text-red fw-bold">
                            {{ $activity->nama }}
                        </h3>
                        @if(isset($activity->date))
                            <p class="text-muted mb-0">
                                {{ \Carbon\Carbon::parse($activity->date)->format('d M Y') }}
                            </p>
                        @endif
                    </div>

                    {{-- GRID FOTO --}}
                    <div class="row g-4 justify-content-center">

                        @foreach($activity->images as $img)
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="gallery-card shadow-sm">

                                    <a href="javascript:void(0)" 
                                       onclick="openLightbox('{{ asset('storage/'.$img->image_path) }}')">
                                        <img src="{{ asset('storage/'.$img->image_path) }}" 
                                             class="img-fluid gallery-img" 
                                             alt="Activity Image">
                                    </a>

                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
            @endif
        @endforeach

        {{-- ================= BLOG ================= --}}
        @foreach($blogs as $blog)
            @if($blog->images->count())

                <div class="mb-5">

                    <div class="text-center mb-4">
                        <h3 class="text-red fw-bold">
                            {{ $blog->title }}
                        </h3>
                    </div>

                    <div class="row g-4 justify-content-center">

                        @foreach($blog->images as $img)

                            <div class="col-sm-6 col-md-4 col-lg-3">

                                <div class="gallery-card shadow-sm">

                                    <a href="javascript:void(0)"
                                    onclick="openLightbox('{{ asset('storage/'.$img->image_path) }}')">

                                        <img src="{{ asset('storage/'.$img->image_path) }}"
                                        class="img-fluid gallery-img">

                                    </a>

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>

            @endif
        @endforeach

    </div>
</div>

{{-- LIGHTBOX MODAL --}}
<div id="lightbox" class="lightbox">
    <span class="lightbox-close">&times;</span>
    <img class="lightbox-content" id="lightbox-img">
</div>

<style>
.gallery-card {
    border-radius: 14px;
    overflow: hidden;
    transition: 0.3s ease;
    background: #fff;
}
.gallery-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.12);
}
.gallery-img {
    width: 100%;
    height: 220px;
    object-fit: cover;
    transition: 0.4s ease;
}
.gallery-card:hover .gallery-img {
    transform: scale(1.08);
}

/* LIGHTBOX STYLE */
.lightbox {
    display: none;
    position: fixed;
    z-index: 9999;
    inset: 0;
    background: rgba(0,0,0,0.85);
    backdrop-filter: blur(4px);
    justify-content: center;
    align-items: center;
    animation: fadeIn .2s ease;
}

.lightbox-content {
    max-width: 90%;
    max-height: 85%;
    border-radius: 10px;
    box-shadow: 0 20px 50px rgba(0,0,0,0.5);
    animation: zoomIn .25s ease;
}

.lightbox-close {
    position: absolute;
    top: 20px;
    right: 30px;
    font-size: 36px;
    color: white;
    cursor: pointer;
    font-weight: bold;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes zoomIn {
    from { transform: scale(0.8); }
    to { transform: scale(1); }
}
</style>

<script>
function openLightbox(src) {
    const lightbox = document.getElementById('lightbox');
    const img = document.getElementById('lightbox-img');

    img.src = src;
    lightbox.style.display = 'flex';
}

document.querySelector('.lightbox-close').onclick = function() {
    document.getElementById('lightbox').style.display = 'none';
}

// klik background untuk tutup
document.getElementById('lightbox').onclick = function(e) {
    if (e.target === this) {
        this.style.display = 'none';
    }
}
</script>

@endsection
