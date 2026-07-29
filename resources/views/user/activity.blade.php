@extends('layout.main')

@section('containers')

<div class="container-fluid py-5 bg-cream">
    <div class="container">

        {{-- Header --}}
        <div class="service-title text-center mb-5">
            <h1 class="display-6 mb-3 text-red">Aktivitas-Aktivitas Kami</h1>
            <p class="fs-6 text-muted">
                Kami bekerja untuk memperkuat hubungan antara pelajar Indonesia yang belajar di Universitas Kastamonu.
            </p>
        </div>

        <div class="row">

            @forelse ($activities as $activity)

                <div class="col-12 mb-5 wow fadeIn" data-wow-delay="0.1s">

                    <div class="service-item activity-box">

                        <div class="row align-items-center">

                            {{-- Deskripsi --}}
                            <div class="col-lg-7">

                                <h3 class="text-red mb-3">
                                    {{ $activity->nama }}
                                </h3>

                                <p class="text-muted mb-4">
                                    {{ Str::limit(strip_tags($activity->deskripsi), 180) }}
                                </p>

                                <a href="{{ url('/aktivitas/'.$activity->id) }}" class="read-more">
                                    Selengkapnya →
                                </a>

                            </div>

                            {{-- Thumbnail --}}
                            <div class="col-lg-5 text-center">

                                <img
                                    src="{{ asset('storage/'.$activity->thumbnail) }}"
                                    alt="{{ $activity->nama }}"
                                    class="activity-image">

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12 text-center">
                    <h5 class="text-muted">
                        Belum ada aktivitas yang ditambahkan.
                    </h5>
                </div>

            @endforelse

        </div>

    </div>
</div>

<style>

.read-more{
    color:#b22222;
    font-weight:600;
    text-decoration:none;
    transition:.3s;
}

.read-more:hover{
    color:#8b1c1c;
    text-decoration:none;
    letter-spacing:.5px;
}

.read-more:focus,
.read-more:active{
    color:#8b1c1c;
    text-decoration:none;
    outline:none;
}

.read-more::before,
.read-more::after{
    display:none !important;
    content:none !important;
}

.activity-box{
    background:#fff;
    border-radius:18px;
    padding:30px;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
    transition:.3s;
}

.activity-box:hover{
    transform:translateY(-4px);
    box-shadow:0 18px 35px rgba(0,0,0,.12);
}

.activity-image{
    width:100%;
    max-width:420px;
    height:260px;
    object-fit:cover;
    border-radius:16px;
    box-shadow:0 10px 25px rgba(0,0,0,.15);
}

.activity-box h3{
    font-weight:700;
}

.activity-box p{
    line-height:1.8;
}

@media (max-width:991px){

    .activity-box{
        text-align:center;
    }

    .activity-image{
        margin-top:25px;
        height:220px;
    }

}
</style>

@endsection