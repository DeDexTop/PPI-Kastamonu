@extends('layout.main')

@section('containers')

<div class="container-fluid py-5 bg-cream" style="padding-left:0; padding-right:0">
    <div class="container mb-5">
        <div class="card border-0">
            <div class="card-body bg-cream">

                <h3 class="display-5 text-start text-red pe-3 mb-4">
                    {{ $activity->nama }}
                </h3>

                <div class="row g-5 align-items-center">

                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.2s">
                        <div class="about-img">
                            <img 
                                class="img-fluid w-100" 
                                src="{{ asset('storage/'.$activity->thumbnail) }}" 
                                alt="{{ $activity->nama }}"
                                style="border-radius:15px"
                            >
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="wow fadeIn" data-wow-delay="0.3s">
                            <h3>Apa itu {{ $activity->nama }}?</h3>
                            <p class="text-dark" style="white-space: pre-line;">
                                {{ $activity->deskripsi }}
                            </p>
                        </div>
                    </div>

                </div>

                @if ($activity->images->count())
                    <hr class="my-5">

                    <h4 class="text-red mb-4">Galeri Kegiatan</h4>

                    <div class="row g-4 justify-content-center">
                        @foreach ($activity->images as $image)
                            <div class="col-6 col-md-4 col-lg-3 wow fadeIn">
                                <img 
                                    src="{{ asset('storage/'.$image->image_path) }}"
                                    class="img-fluid w-100"
                                    style="border-radius:12px; object-fit:cover; height:180px;"
                                    alt="Galeri {{ $activity->nama }}"
                                >
                            </div>
                        @endforeach
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>

@endsection
