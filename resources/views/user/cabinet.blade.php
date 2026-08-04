@extends('layout.main')

@section('containers')

    @if (is_null($cabinet))
        <section class="section-padding bg-cream">

            <div class="container text-center" style="margin-top:75px">

                <h1 class="display-4 fw-bold mt-3">
                    Kabinet
                    <span class="text-red">
                        PPI Kastamonu
                    </span>
                </h1>

                <div class="divider"></div>

                <p class="text-muted mx-auto" style="max-width:750px;">
                    Struktur kepengurusan PPI Kastamonu.
                </p>

                <div class="col-12">

                    <div class="empty-state">

                        <img src="{{ asset('img/Logo ppi.png') }}" alt="Logo PPI Kastamonu">

                        <h4>
                            Belum ada data kabinet.
                        </h4>

                        <p class="text-muted">
                            Data anggota akan tampil di sini setelah ditambahkan.
                        </p>

                    </div>

                </div>

            </div>

        </section>
    @elseif($cabinet->groups->count() == 0)
        <section class="section-padding bg-cream">

            <div class="container text-center" style="margin-top:75px">

                <h1 class="display-4 fw-bold">
                    Kabinet
                    <span class="text-red">{{ $cabinet->name }}</span>
                </h1>

                <div class="divider"></div>

                <p class="text-muted">
                    Struktur kepengurusan belum tersedia.
                </p>

            </div>

        </section>
    @else
        <section class="section-padding bg-cream">

            <div class="container" style="margin-top:75px">

                <div class="text-center mb-5">

                    <h1 class="display-4 fw-bold">

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

                @foreach ($cabinet->groups as $group)
                    @php

                        $leaders = $group->members
                            ->filter(function ($member) {
                                return ($member->position->level ?? 999) == 1;
                            })
                            ->sortBy(function ($member) {
                                return $member->position->level;
                            });

                        $members = $group->members
                            ->filter(function ($member) {
                                return ($member->position->level ?? 999) != 1;
                            })
                            ->sortBy(function ($member) {
                                return $member->position->level ?? 999;
                            });

                    @endphp

                    <div class="card-modern p-5 mb-5">

                        <div class="text-center mb-5">

                            <h2 class="text-red fw-bold">

                                {{ $group->name }}

                            </h2>

                            @if ($group->description)
                                <p class="text-muted">

                                    {{ $group->description }}

                                </p>
                            @endif

                        </div>

                        {{-- Pimpinan --}}
                        @if ($leaders->count())
                            <div class="row justify-content-center g-4 mb-5">

                                @foreach ($leaders as $member)
                                    <div class="col-md-6 col-lg-3">

                                        <div class="member-card h-100">

                                            <img src="{{ $member->photo ? asset('storage/' . $member->photo) : asset('img/blank.png') }}"
                                                alt="{{ $member->name }}">

                                            <div class="card-body">

                                                <h5>{{ $member->name }}</h5>

                                                <span>{{ $member->position->name }}</span>

                                            </div>

                                        </div>

                                    </div>
                                @endforeach

                            </div>
                        @endif

                        {{-- Anggota dan Jabatan lainnya --}}
                        <div class="row justify-content-center g-4">

                            @forelse($members as $member)
                                <div class="col-md-6 col-lg-3">

                                    <div class="member-card h-100">

                                        <img src="{{ $member->photo ? asset('storage/' . $member->photo) : asset('img/blank.png') }}"
                                            alt="{{ $member->name }}">

                                        <div class="card-body">

                                            <h5>{{ $member->name }}</h5>

                                            <span>{{ $member->position->name ?? '-' }}</span>

                                        </div>

                                    </div>

                                </div>

                            @empty

                                @if (!$leaders->count())
                                    <div class="col-12 text-center">

                                        <p class="text-muted">

                                            Belum ada anggota.

                                        </p>

                                    </div>
                                @endif
                            @endforelse

                        </div>

                    </div>
                @endforeach

                <div class="text-center mt-5">

                    <a href="{{ route('kabinet.list') }}" class="btn btn-modern bg-red text-white">

                        Arsip Kabinet

                    </a>

                </div>

            </div>

        </section>
    @endif

    <style>
        .empty-state {

            min-height: 350px;

            display: flex;

            flex-direction: column;

            justify-content: center;

            align-items: center;

            text-align: center;

        }

        .empty-state img {

            width: 120px;

            opacity: .4;

            margin-bottom: 20px;

        }

        .empty-state h4 {

            color: var(--primary);

        }
    </style>

@endsection
