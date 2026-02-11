@extends('layout.main')

@section('containers')

@if(!$cabinet->mpaMembers->count() && !$cabinet->coreMembers->count() && !$cabinet->divisions->count())
<div class="container py-5 text-center">
    <p class="display-6 text-center text-red px-3">
        Pengurus Kabinet {{ $cabinet->name }}
    </p>
    <p class="text-danger mt-5">Data kabinet belum lengkap</p>
    <p class="text-muted">Mohon maaf, data kabinet saat ini belum tersedia. Silakan cek kembali nanti.</p>
</div>

@else
<div class="container-fluid py-5">

    {{-- ================== HEADER KABINET ================== --}}
    <div class="container text-center mb-5">
        <p class="display-6 text-center text-red px-3">
            Pengurus Kabinet {{ $cabinet->name }}
        </p>
    </div>

    {{-- ================== MPA ================== --}}
    <div class="container mb-5">
        <h1 class="display-6 mb-4 text-red text-center">MPA</h1>
        <div class="row g-4 justify-content-center">

            @forelse($cabinet->mpaMembers as $member)
                <div class="col-md-6 col-lg-4">
                    <div class="team-item d-flex h-100 p-4">
                        <div class="team-detail text-center w-100">
                            <img class="img-fluid mb-3"
                                src="{{ $member->photo ? asset('storage/'.$member->photo) : asset('img/blank.png') }}"
                                style="border-radius: 15px">
                            <h3>{{ $member->name }}</h3>
                            <span>MPA</span>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-muted">Belum ada anggota MPA.</p>
            @endforelse

        </div>
    </div>

    {{-- ================== BPH INTI ================== --}}
    <div class="container mb-5">
        <h1 class="display-6 mb-4 text-red text-center">BPH Inti</h1>
        <div class="row g-4 justify-content-center">

            @forelse($cabinet->coreMembers->sortBy('position_id') as $member)
                <div class="col-md-6 col-lg-4">
                    <div class="team-item d-flex h-100 p-4">
                        <div class="team-detail text-center w-100">
                            <img class="img-fluid mb-3"
                                src="{{ $member->photo ? asset('storage/'.$member->photo) : asset('img/blank.png') }}"
                                style="border-radius: 15px">
                            <h3>{{ $member->name }}</h3>
                            <span>{{ $member->position->name ?? 'Anggota' }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-muted">Belum ada anggota BPH Inti.</p>
            @endforelse

        </div>
    </div>

    {{-- ================== DIVISI ================== --}}
    <div class="container mb-5">
        <h1 class="display-6 mb-4 text-red text-center">Divisi-Divisi</h1>

        @forelse($cabinet->divisions as $division)

            <div class="mb-5">
                <h3 class="text-center text-red mb-4">
                    Divisi {{ $division->name }}
                </h3>

                {{-- KEPALA DIVISI --}}
                <div class="row g-4 justify-content-center mb-4">
                    @forelse($division->members->where('position_id', 5) as $head) 
                        <div class="col-md-6 col-lg-4">
                            <div class="team-item d-flex h-100 p-4 border-none">
                                <div class="team-detail text-center w-100">
                                    <img class="img-fluid mb-3"
                                        src="{{ $head->photo ? asset('storage/'.$head->photo) : asset('img/blank.png') }}"
                                        style="border-radius: 15px">
                                    <h3>{{ $head->name }}</h3>
                                    <span class="fw-bold text-red">
                                        {{ $head->position->name ?? 'Kepala Divisi' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-muted">Belum ada kepala divisi untuk Divisi {{ $division->name }}.</p>
                    @endforelse
                </div>

                {{-- ANGGOTA DIVISI --}}
                <div class="row g-4 justify-content-center">
                    @forelse($division->members->where('position_id', '!=', 5) as $member)
                        <div class="col-md-6 col-lg-4">
                            <div class="team-item d-flex h-100 p-4">
                                <div class="team-detail text-center w-100">
                                    <img class="img-fluid mb-3"
                                        src="{{ $member->photo ? asset('storage/'.$member->photo) : asset('img/blank.png') }}"
                                        style="border-radius: 15px">
                                    <h3>{{ $member->name }}</h3>
                                    <span>{{ $member->position->name ?? 'Anggota' }}</span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-muted">Belum ada anggota untuk Divisi {{ $division->name }}.</p>
                    @endforelse
                </div>

            </div>
            @empty
                <p class="text-center text-muted">Belum ada data divisi.</p>
        @endforelse
    </div>

    {{-- ================== ARSIP ================== --}}
    <div class="container text-center">
        <a href="/kabinet/list" class="btn bg-red text-beige" style="border-radius:15px">
            Arsip Kabinet
        </a>
    </div>

</div>

@endif
@endsection



