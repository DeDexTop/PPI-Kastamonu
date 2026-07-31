@extends('layout.main')

@section('containers')

@if (is_null($cabinet))

<section class="section-padding bg-cream">

    <div class="container text-center" style="margin-top: 100px">

        <h2 class="text-red">
            Belum ada data kabinet yang tersedia.
        </h2>

    </div>

</section>

@elseif(!$cabinet->mpaMembers->count() && !$cabinet->coreMembers->count() && !$cabinet->divisions->count())

<section class="section-padding bg-cream">

    <div class="container text-center" style="margin-top: 100px">

        <h1 class="display-5 fw-bold text-red">

            Kabinet {{ $cabinet->name }}

        </h1>

        <div class="divider"></div>

        <p class="text-muted">

            Data kabinet belum tersedia.

        </p>

    </div>

</section>

@else

<section class="section-padding bg-cream">

<div class="container" style="margin-top: 100px">

    <!-- Header -->

    <div class="text-center mb-5">

        <h1 class="display-4 fw-bold mt-3">

            Pengurus Kabinet

            <span class="text-red">

                {{ $cabinet->name }}

            </span>

        </h1>

        <div class="divider"></div>

    </div>


    {{-- =========================
        MPA
    ========================== --}}

    <div class="mb-5">

        <h2 class="text-center text-red fw-bold mb-5">

            MPA

        </h2>

        <div class="row justify-content-center g-4">

            @forelse($cabinet->mpaMembers as $member)

            <div class="col-md-6 col-lg-4">

                <div class="member-card">

                    <img
                        src="{{ $member->photo ? asset('storage/'.$member->photo) : asset('img/blank.png') }}"
                        alt="{{ $member->name }}">

                    <div class="card-body">

                        <h5>{{ $member->name }}</h5>

                        <span>Majelis Permusyawaratan Anggota</span>

                    </div>

                </div>

            </div>

            @empty

            <p class="text-center text-muted">

                Belum ada anggota MPA.

            </p>

            @endforelse

        </div>

    </div>


    {{-- =========================
        BPH
    ========================== --}}

    <div class="mb-5">

        <h2 class="text-center text-red fw-bold mb-5">

            Badan Pengurus Harian

        </h2>

        <div class="row justify-content-center g-4">

            @forelse($cabinet->coreMembers->sortBy('position_id') as $member)

            <div class="col-md-6 col-lg-4">

                <div class="member-card">

                    <img
                        src="{{ $member->photo ? asset('storage/'.$member->photo) : asset('img/blank.png') }}"
                        alt="{{ $member->name }}">

                    <div class="card-body">

                        <h5>{{ $member->name }}</h5>

                        <span>

                            {{ $member->position->name ?? 'Anggota' }}

                        </span>

                    </div>

                </div>

            </div>

            @empty

            <p class="text-center text-muted">

                Belum ada anggota BPH.

            </p>

            @endforelse

        </div>

    </div>


    {{-- =========================
        DIVISI
    ========================== --}}

    <div>

        <h2 class="text-center text-red fw-bold mb-5">

            Divisi

        </h2>

        @forelse($cabinet->divisions as $division)

        <div class="card-modern p-5 mb-5">

            <h3 class="text-center text-red fw-bold mb-5">

                Divisi {{ $division->name }}

            </h3>

            <!-- Kepala Divisi -->

            <div class="row justify-content-center g-4 mb-5">

                @forelse($division->members->where('position_id',5) as $head)

                <div class="col-md-6 col-lg-4">

                    <div class="member-card">

                        <img
                            src="{{ $head->photo ? asset('storage/'.$head->photo) : asset('img/blank.png') }}">

                        <div class="card-body">

                            <h5>{{ $head->name }}</h5>

                            <span class="text-red fw-bold">

                                {{ $head->position->name }}

                            </span>

                        </div>

                    </div>

                </div>

                @empty

                <p class="text-center text-muted">

                    Belum ada Kepala Divisi.

                </p>

                @endforelse

            </div>

            <!-- Anggota -->

            <div class="row justify-content-center g-4">

                @forelse($division->members->where('position_id','!=',5) as $member)

                <div class="col-md-6 col-lg-4">

                    <div class="member-card">

                        <img
                            src="{{ $member->photo ? asset('storage/'.$member->photo) : asset('img/blank.png') }}">

                        <div class="card-body">

                            <h5>{{ $member->name }}</h5>

                            <span>

                                {{ $member->position->name ?? 'Anggota' }}

                            </span>

                        </div>

                    </div>

                </div>

                @empty

                <p class="text-center text-muted">

                    Belum ada anggota.

                </p>

                @endforelse

            </div>

        </div>

        @empty

        <p class="text-center text-muted">

            Belum ada data divisi.

        </p>

        @endforelse

    </div>


    <!-- Tombol -->

    <div class="text-center mt-5">

        <a href="/kabinet/list"

           class="btn btn-modern bg-red text-white">

            Arsip Kabinet

        </a>

    </div>

</div>

</section>

@endif

@endsection