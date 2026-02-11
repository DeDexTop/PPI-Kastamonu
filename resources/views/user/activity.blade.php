@extends('layout.main')

@section('containers')
<div class="container-fluid py-5 bg-cream">
    <div class="container">
        <div class="row g-5">

            <div class="service-title">
                <h1 class="display-6 mb-4 text-red">Aktivitas-Aktivitas Kami</h1>
                <p class="fs-8 mb-6">
                    Kami bekerja untuk memperkuat hubungan antara pelajar Indonesia yang belajar di Universitas Kastamonu.
                </p>
            </div>

            <div class="col-12">
                <div class="row g-5">

                    @foreach ($activities as $activity)
                        <div class="col-lg-12 wow fadeIn mb-5" data-wow-delay="0.1s">
                            <div class="service-item h-100">

                                {{-- Thumbnail --}}
                                <img 
                                    src="{{ asset('storage/'.$activity->thumbnail) }}"
                                    alt="{{ $activity->nama }}"
                                    style="float:right; border-radius:15px; width:400px; height:auto;"
                                    class="mb-3"
                                >

                                <h3 class="text-red">{{ $activity->nama }}</h3>

                                <p class="mb-2">
                                    {{ Str::limit($activity->deskripsi, 150) }}
                                </p>

                                <a 
                                    href="{{ url('/aktivitas/'.$activity->id) }}" 
                                    class="text-red"
                                >
                                    Selengkapnya
                                </a>

                            </div>
                        </div>
                    @endforeach

                    @if ($activities->isEmpty())
                        <div class="col-12 text-center wow fadeIn" data-wow-delay="0.1s">
                            <p class="fs-8 text-muted">
                                Belum ada aktivitas yang ditambahkan.
                            </p>
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
