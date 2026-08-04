@extends('layout.main')

@section('containers')

<section class="section-padding bg-cream">

    <div class="container" style="margin-top:100px">

        {{-- HEADER --}}
        <div class="text-center mb-5">

            <h1 class="display-5 fw-bold">
                Arsip
                <span class="text-red">Kabinet</span>
            </h1>

            <div class="divider"></div>

            <p class="text-muted mx-auto" style="max-width:700px;">
                Daftar kabinet PPI Kastamonu dari periode ke periode.
                Klik salah satu kabinet untuk melihat struktur kepengurusannya.
            </p>

        </div>

        <div class="row g-4 justify-content-center">

            @forelse($cabinets as $cabinet)

                @php
                    $chairman = null;

                    foreach ($cabinet->groups as $group) {
                        foreach ($group->members as $member) {
                            if ($member->position && str_contains(strtolower($member->position->name), 'ketua')) {
                                $chairman = $member;
                                break 2;
                            }
                        }
                    }
                @endphp

                <div class="col-lg-6 wow fadeInUp">

                    <div class="card-modern shadow-hover h-100">

                        <div class="card-body p-4 d-flex flex-column">

                            <span class="badge-modern mb-3 align-self-start">
                                {{ $cabinet->start_period }}/{{ $cabinet->end_period }}
                            </span>

                            <h3 class="text-red mb-3">
                                {{ $cabinet->name }}
                            </h3>

                            <p class="text-muted mb-4">

                                <strong>Ketua Kabinet :</strong><br>

                                {{ $chairman->name ?? '-' }}

                            </p>

                            <div class="mt-auto">

                                <a href="{{ route('kabinet.show',$cabinet->id) }}"
                                   class="btn btn-danger rounded-pill px-4">

                                    Lihat Kepengurusan
                                    <i class="fas fa-arrow-right ms-2"></i>

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="card-modern text-center p-5">

                        <i class="fas fa-users fa-3x text-danger mb-4"></i>

                        <h4 class="text-red">
                            Belum Ada Data Kabinet
                        </h4>

                        <p class="text-muted mb-0">
                            Arsip kabinet belum tersedia.
                        </p>

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>

@endsection