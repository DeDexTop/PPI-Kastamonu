@extends('admin.layout.main')

@section('containers')

<div class="space-y-8">

    {{-- ================= HEADER ================= --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Selamat datang di panel admin</h1>
        </div>

        @if($activeCabinet)
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded-lg text-sm font-semibold">
                Kabinet Aktif: {{ $activeCabinet->name }}
            </div>
        @else
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded-lg text-sm font-semibold">
                Tidak ada kabinet aktif
            </div>
        @endif
    </div>

    {{-- ================= STATISTICS ================= --}}
    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">

        <div class="bg-white p-5 rounded-xl shadow hover:shadow-lg transition">
            <p class="text-sm text-gray-500">Kabinet</p>
            <h2 class="text-3xl font-bold text-gray-800">{{ $totalCabinets }}</h2>
        </div>

        <div class="bg-white p-5 rounded-xl shadow hover:shadow-lg transition">
            <p class="text-sm text-gray-500">Aktivitas</p>
            <h2 class="text-3xl font-bold text-gray-800">{{ $totalActivities }}</h2>
        </div>

        <div class="bg-white p-5 rounded-xl shadow hover:shadow-lg transition">
            <p class="text-sm text-gray-500">Penulisan</p>
            <h2 class="text-3xl font-bold text-gray-800">{{ $totalPosts }}</h2>
        </div>

        <div class="bg-white p-5 rounded-xl shadow hover:shadow-lg transition">
            <p class="text-sm text-gray-500">Galeri Gambar</p>
            <h2 class="text-3xl font-bold text-gray-800">{{ $totalImages }}</h2>
        </div>

        <div class="bg-gradient-to-r from-blue-500 to-red-700 text-white p-5 rounded-xl shadow">
            <p class="text-sm opacity-80">Kabinet Aktif</p>
            <h2 class="text-xl font-bold">
                {{ $activeCabinet->name ?? '-' }}
            </h2>
        </div>

    </section>

    {{-- ================= RECENT MEMBERS ================= --}}
    <section class="bg-white rounded-xl shadow p-6">

        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-800">Anggota Terbaru</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="text-left border-b text-gray-600">
                        <th class="py-3">Nama</th>
                        <th>Jabatan</th>
                        <th>Kabinet</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody class="divide-y">

                    @forelse($recentMembers as $member)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="py-3 flex items-center gap-3">
                                <img 
                                    src="{{ $member->photo ? asset('storage/'.$member->photo) : asset('img/blank.png') }}"
                                    class="w-10 h-10 rounded-full object-cover"
                                >
                                <span class="font-medium text-gray-800">
                                    {{ $member->name }}
                                </span>
                            </td>
                            <td>
                                {{ $member->position->name ?? 'MPA' }}
                            </td>
                            <td>
                                {{ $member->cabinet->name ?? '-' }}
                            </td>
                            <td class="text-gray-500">
                                {{ $member->created_at->format('d M Y') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-4 text-center text-gray-500">
                                Belum ada data anggota
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

    </section>

</div>

@endsection
