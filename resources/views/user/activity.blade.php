@extends('layout.main')

@section('containers')

<section class="section-padding bg-cream">

    <div class="container" style="margin-top: 50px">

        <!-- Header -->
        <div class="text-center mb-5">

            <h1 class="display-4 fw-bold mt-3">
                Aktivitas
                <span class="text-red">PPI Kastamonu</span>
            </h1>

            <div class="divider"></div>

            <p class="text-muted mx-auto" style="max-width:700px;">
                Berbagai kegiatan yang diselenggarakan oleh
                Perhimpunan Pelajar Indonesia Kastamonu sebagai
                wadah pengembangan akademik, sosial, budaya,
                dan kekeluargaan.
            </p>

        </div>

        @forelse($activities as $activity)

        <div class="row justify-content-center mb-5">

            <div class="col-lg-10">

                <div class="card-modern overflow-hidden wow fadeInUp">

                    <div class="row g-0 align-items-center">

                        <!-- Gambar -->
                        <div class="col-lg-5">

                            <img
                                src="{{ asset('storage/'.$activity->thumbnail) }}"
                                alt="{{ $activity->nama }}"
                                class="img-fluid w-100"
                                style="height:330px; object-fit:cover;">

                        </div>

                        <!-- Konten -->
                        <div class="col-lg-7 d-flex align-items-center">

                            <div class="p-5 text-center text-lg-start w-100">

                                <span class="badge-modern mb-3">
                                    Aktivitas
                                </span>

                                <h2 class="fw-bold text-red mb-4">
                                    {{ $activity->nama }}
                                </h2>

                                <p class="text-muted mb-4">
                                    {{ Str::limit(strip_tags($activity->deskripsi), 250) }}
                                </p>

                                <a href="{{ url('/aktivitas/'.$activity->id) }}"
                                   class="btn btn-modern bg-red text-white">

                                    Selengkapnya
                                    <i class="fas fa-arrow-right ms-2"></i>

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        @empty

        <div class="text-center py-5 justify-content-center align-items-center d-flex flex-column">

            <img src="{{ asset('img/Logo ppi.png') }}"
                 alt="Logo"
                 style="width:120px; opacity:.4;">

            <h4 class="mt-4">
                Belum ada aktivitas yang ditambahkan.
            </h4>

            <p class="text-muted">
                Aktivitas akan muncul di sini setelah ditambahkan melalui dashboard.
            </p>

        </div>

        @endforelse

    </div>

</section>

@endsection