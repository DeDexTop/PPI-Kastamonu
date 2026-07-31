@extends('layout.main')

@section('containers')

@if(!$cabinet->mpaMembers->count() && !$cabinet->coreMembers->count() && !$cabinet->divisions->count())

<section class="section-padding bg-cream">

    <div class="container text-center" style="margin-top:100px">

        <h1 class="display-5 text-red fw-bold">
            Pengurus Kabinet
        </h1>

        <h2 class="mb-4">
            {{ $cabinet->name }}
        </h2>

        <div class="divider"></div>

        <div class="card-modern p-5 mt-4">

            <i class="fas fa-users fa-4x text-danger mb-4"></i>

            <h3 class="text-red">
                Data Belum Tersedia
            </h3>

            <p class="text-muted">
                Mohon maaf, data kepengurusan kabinet ini masih dalam proses pengisian.
            </p>

            <a href="{{ route('kabinet.list') }}" class="btn btn-danger rounded-pill px-4 mt-3">
                Kembali ke Arsip
            </a>

        </div>

    </div>

</section>

@else

<section class="section-padding bg-cream">

<div class="container">

    {{-- HEADER --}}
    <div class="text-center mb-5">

        <h1 class="display-5 fw-bold">
            Kabinet
            <span class="text-red">{{ $cabinet->name }}</span>
        </h1>

        <div class="divider"></div>

        <span class="badge-modern">
            {{ $cabinet->start_period }} / {{ $cabinet->end_period }}
        </span>

    </div>



    {{-- ================= MPA ================= --}}
    <div class="mb-5">

        <h2 class="text-center text-red mb-5">
            MPA
        </h2>

        <div class="row g-4 justify-content-center">

            @forelse($cabinet->mpaMembers as $member)

            <div class="col-md-6 col-lg-4">

                <div class="member-card h-100">

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



    {{-- ================= BPH ================= --}}
    <div class="mb-5">

        <h2 class="text-center text-red mb-5">
            BPH Inti
        </h2>

        <div class="row g-4 justify-content-center">

            @forelse($cabinet->coreMembers->sortBy('position_id') as $member)

            <div class="col-md-6 col-lg-4">

                <div class="member-card h-100">

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
                Belum ada anggota BPH Inti.
            </p>

            @endforelse

        </div>

    </div>



    {{-- ================= DIVISI ================= --}}
    <div>

        <h2 class="text-center text-red mb-5">
            Divisi
        </h2>

        @forelse($cabinet->divisions as $division)

        <div class="mb-5">

            <h3 class="text-center mb-4">
                {{ $division->name }}
            </h3>



            {{-- Kepala Divisi --}}
            <div class="row justify-content-center g-4 mb-4">

                @foreach($division->members->where('position_id',5) as $head)

                <div class="col-md-6 col-lg-4">

                    <div class="member-card h-100">

                        <img
                            src="{{ $head->photo ? asset('storage/'.$head->photo) : asset('img/blank.png') }}"
                            alt="{{ $head->name }}">

                        <div class="card-body">

                            <h5>{{ $head->name }}</h5>

                            <span class="text-red fw-bold">
                                {{ $head->position->name }}
                            </span>

                        </div>

                    </div>

                </div>

                @endforeach

            </div>



            {{-- Anggota --}}
            <div class="row justify-content-center g-4">

                @forelse($division->members->where('position_id','!=',5) as $member)

                <div class="col-md-6 col-lg-4">

                    <div class="member-card h-100">

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

                <div class="text-center">

                    <p class="text-muted">
                        Belum ada anggota divisi.
                    </p>

                </div>

                @endforelse

            </div>

        </div>

        @empty

        <div class="card-modern text-center p-5">

            <h4 class="text-muted">
                Belum ada data divisi.
            </h4>

        </div>

        @endforelse

    </div>



    {{-- BUTTON --}}
    <div class="text-center mt-5">

        <a href="{{ route('kabinet.list') }}"
           class="btn btn-danger rounded-pill px-5 py-3">

            <i class="fas fa-arrow-left me-2"></i>

            Kembali ke Arsip Kabinet

        </a>

    </div>

</div>

</section>

@endif

@endsection