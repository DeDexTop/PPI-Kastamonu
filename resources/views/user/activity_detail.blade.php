@extends('layout.main')

@section('containers')

<div class="container-fluid py-5 bg-cream" style="padding-left:0;padding-right:0">
    <div class="container mb-5" style="margin-top:100px">
        <div class="card border-0">
            <div class="card-body bg-cream">

                <!-- JUDUL AKTIVITAS -->
                <h3 class="display-5 text-start text-red pe-3 mb-4">
                    {{ $activity->nama }}
                </h3>

                <!-- BADGE STATUS -->
                <div class="mb-4 wow fadeIn" data-wow-delay="0.1s">
                    <span class="badge-modern" style="width:fit-content; display: inline-block;">
                        <i class="fas fa-calendar-alt me-2"></i>
                        Aktivitas
                    </span>
                </div>

                <!-- AREA UTAMA KONTEN (Sistem Float Murni & Stabil) -->
                <div class="blog-wrapper text-start">

                    <!-- BANNER/THUMBNAIL AKTIVITAS -->
                    <div class="wow fadeIn float-blog-container" data-wow-delay="0.2s">
                        <img
                            class="img-fluid float-blog-img"
                            src="{{ asset('storage/'.$activity->thumbnail) }}"
                            alt="{{ $activity->nama }}"
                            style="border-radius:15px">
                    </div>

                    <!-- PROSES MEMECAH TEXTAREA MENJADI PARAGRAF ASLI -->
                    @php
                        // 1. Amankan teks dasar dari XSS
                        $safe_text = e($activity->deskripsi);

                        // 2. Ubah URL teks biasa menjadi link HTML aktif yang bisa diklik
                        $text_with_links = preg_replace(
                            '/(https?:\/\/[^\s]+)/',
                            '<a href="$1" target="_blank" rel="noopener noreferrer" style="color: #dc3545; text-decoration: underline;">$1</a>',
                            $safe_text
                        );

                        // 3. Pecah teks berdasarkan tombol 'Enter' (pindah baris)
                        $paragraphs = explode("\n", $text_with_links);
                    @endphp

                    <!-- MENAMPILKAN SETIAP PARAGRAF SEBAGAI ELEMEN BARU -->
                    @foreach ($paragraphs as $paragraph)
                        @if (trim($paragraph) !== '')
                            <p class="text-dark float-blog-text">
                                {!! $paragraph !!}
                            </p>
                        @endif
                    @endforeach

                </div>

                <!-- MEMBERSIHKAN EFEK FLOAT SEBELUM MASUK KE GALERI -->
                <div style="clear: both;"></div>

                <!-- SEKSI GALERI KEGIATAN -->
                @if($activity->images->count())
                <hr class="my-5">

                <h4 class="text-red mb-4">
                    Galeri Kegiatan
                </h4>

                <div class="row g-4 justify-content-center">
                    @foreach($activity->images as $image)
                    <div class="col-6 col-md-4 col-lg-3 wow fadeIn">
                        <img
                            src="{{ asset('storage/'.$image->image_path) }}"
                            class="img-fluid w-100 gallery-img"
                            style="border-radius:12px;object-fit:cover;height:180px;cursor:pointer;"
                            alt="Galeri {{ $activity->nama }}"
                            onclick="openLightbox('{{ asset('storage/'.$image->image_path) }}')">
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
    <img id="lightbox-img" class="lightbox-content" src="">
</div>

<style>
/* CSS UTAMA UNTUK TATA LETAK ARTIKEL */
.float-blog-container {
    float: left;
    width: 45%; /* Lebar gambar memakan 45% area pada layar desktop */
    margin-right: 30px;
    margin-bottom: 15px;
}

.float-blog-img {
    width: 100%;
    height: auto;
    object-fit: cover;
}

.float-blog-text {
    line-height: 1.7;
    font-size: 1.05rem;
    margin-bottom: 1.5rem; /* Memberikan jarak antar paragraf yang konsisten */
}

/* RESPONSIVE: Otomatis kembali normal di layar HP agar tulisan tidak bertumpuk */
@media (max-width: 991px) {
    .float-blog-container {
        float: none;
        width: 100%;
        margin-right: 0;
        margin-bottom: 25px;
    }
}

/* STYLE BAWAAN GALERI & LIGHTBOX ANDA */
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
    color:#fff;
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
    const lightbox=document.getElementById('lightbox');
    const image=document.getElementById('lightbox-img');

    image.src=src;
    lightbox.style.display='flex';
}

document.querySelector('.lightbox-close').addEventListener('click',function(){
    document.getElementById('lightbox').style.display='none';
});

document.getElementById('lightbox').addEventListener('click',function(e){
    if(e.target===this){
        this.style.display='none';
    }
});

document.addEventListener('keydown',function(e){
    if(e.key==='Escape'){
        document.getElementById('lightbox').style.display='none';
    }
});
</script>

@endsection
