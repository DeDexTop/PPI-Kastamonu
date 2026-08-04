@extends('layout.main')

@section('containers')

    @if ($cabinet->groups->isEmpty())
        <section class="section-padding bg-cream">

            <div class="container text-center" style="margin-top:100px;">

                <h1 class="display-5 fw-bold text-red">
                    Pengurus Kabinet
                </h1>

                <h2 class="mb-3">
                    {{ $cabinet->name }}
                </h2>

                <div class="divider"></div>

                <div class="card-modern p-5 mt-4">

                    <i class="fas fa-users fa-4x text-danger mb-4"></i>

                    <h3 class="text-red">
                        Data Belum Tersedia
                    </h3>

                    <p class="text-muted">
                        Data kepengurusan kabinet masih dalam proses pengisian.
                    </p>

                    <a href="{{ route('kabinet.list') }}" class="btn btn-danger rounded-pill px-4 mt-3">
                        Kembali ke Arsip
                    </a>

                </div>

            </div>

        </section>
    @else
        <section class="section-padding bg-cream">

            <div class="container" style="margin-top:100px;">

                {{-- HEADER --}}
                <div class="text-center mb-5">

                    <h1 class="display-5 fw-bold">

                        Kabinet

                        <span class="text-red">

                            {{ $cabinet->name }}

                        </span>

                    </h1>

                    <div class="divider"></div>

                    <span class="badge-modern">

                        {{ $cabinet->start_period }}
                        -
                        {{ $cabinet->end_period }}

                    </span>

                </div>

                @foreach ($cabinet->groups->sortBy('sort_order') as $group)
                    @php
                        // Jabatan level 1 (Ketua Umum, Kepala Divisi, MPA)
                        $leaders = $group->members
                            ->filter(function ($member) {
                                return optional($member->position)->level == 1;
                            })
                            ->sortBy(function ($member) {
                                return optional($member->position)->level;
                            });

                        // Jabatan selain level 1
                        $members = $group->members
                            ->filter(function ($member) {
                                return optional($member->position)->level != 1;
                            })
                            ->sortBy(function ($member) {
                                return optional($member->position)->level ?? 999;
                            });
                    @endphp

                    <div class="mb-5">

                        <h2 class="text-center text-red mb-2">
                            {{ $group->name }}
                        </h2>

                        @if ($group->description)
                            <p class="text-center text-muted mb-5">
                                {{ $group->description }}
                            </p>
                        @endif

                        {{-- Ketua Umum / Kepala Divisi --}}
                        @if ($leaders->count())
                            <div class="row justify-content-center g-4 mb-5">

                                @foreach ($leaders as $member)
                                    <div class="col-md-6 col-lg-4">

                                        <div class="member-card h-100">

                                            <img src="{{ $member->photo ? asset('storage/' . $member->photo) : asset('img/blank.png') }}"
                                                alt="{{ $member->name }}">

                                            <div class="card-body">

                                                <h5>{{ $member->name }}</h5>

                                                <span>{{ optional($member->position)->name }}</span>

                                            </div>

                                        </div>

                                    </div>
                                @endforeach

                            </div>
                        @endif

                        {{-- Jabatan lainnya --}}
                        <div class="row justify-content-center g-4">

                            @forelse($members as $member)
                                <div class="col-md-6 col-lg-4">

                                    <div class="member-card h-100">

                                        <img src="{{ $member->photo ? asset('storage/' . $member->photo) : asset('img/blank.png') }}"
                                            alt="{{ $member->name }}">

                                        <div class="card-body">

                                            <h5>{{ $member->name }}</h5>

                                            <span>{{ optional($member->position)->name ?? '-' }}</span>

                                        </div>

                                    </div>

                                </div>

                            @empty

                                @if (!$leaders->count())
                                    <div class="col-12">

                                        <p class="text-center text-muted">
                                            Belum ada anggota pada group ini.
                                        </p>

                                    </div>
                                @endif
                            @endforelse

                        </div>

                    </div>
                @endforeach

                <div class="text-center mt-5">

                    <a href="{{ route('kabinet.list') }}" class="btn btn-danger rounded-pill px-5 py-3">

                        <i class="fas fa-arrow-left me-2"></i>

                        Kembali ke Arsip Kabinet

                    </a>

                </div>

            </div>

        </section>
    @endif

@endsection
