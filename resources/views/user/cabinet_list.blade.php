@extends('layout.main')

@section('containers')

<div class="container-fluid py-5 bg-cream">
    <div class="container">
        <div class="row g-5">
            <div class="service-title">
                <h1 class="display-6 mb-4 text-red">Kabinet-kabinet Kami</h1>
            </div>

            <div class="col-md-12 col-lg-8 col-xl-12">
                <div class="row g-5">

                    @forelse($cabinets as $cabinet)
                        <div class="col-sm-6 col-lg-12 wow fadeIn mb-5" data-wow-delay="0.1s">
                            <div class="service-item h-100">
                                <h3 class="text-red">
                                    {{ $cabinet->name }}
                                    ({{ $cabinet->start_period }}/{{ $cabinet->end_period }})
                                </h3>

                                <p class="mb-2">
                                    Ketua: {{ $cabinet->coreMembers->firstWhere('position_id', 1)->name ?? '-' }}
                                </p>

                                <a href="{{ route('kabinet.show', $cabinet->id) }}" class="text-red">
                                    Kabinet Lengkap
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <h4 class="text-muted">Belum ada data kabinet</h4>
                        </div>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
