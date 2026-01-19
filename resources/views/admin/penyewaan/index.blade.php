@extends('layouts.admin')

@section('title', 'Manajemen Penyewaan')

@section('content')
    <div class="p-4 md:p-8">
        <div class="mb-8">
            <h1 class="text-3xl font-black text-zinc-900 tracking-tighter uppercase italic">Manajemen Penyewaan</h1>
            <p class="text-zinc-500 mt-1">Daftar semua transaksi penyewaan motor.</p>
        </div>

        {{-- Desktop View --}}
        <div class="hidden md:block bg-white border border-zinc-200 rounded-sm shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-zinc-50 border-b border-zinc-200">
                            <th class="py-4 px-4 font-bold text-zinc-500 uppercase text-xs tracking-wider text-center w-24">
                                ID Sewa</th>
                            <th class="py-4 px-4 font-bold text-zinc-500 uppercase text-xs tracking-wider text-left w-48">
                                Pelanggan</th>
                            <th class="py-4 px-4 font-bold text-zinc-500 uppercase text-xs tracking-wider text-left w-48">
                                Motor
                            </th>
                            <th class="py-4 px-4 font-bold text-zinc-500 uppercase text-xs tracking-wider text-left">Tanggal
                                Sewa</th>
                            <th class="py-4 px-4 font-bold text-zinc-500 uppercase text-xs tracking-wider text-center">
                                Status Sewa</th>
                            <th class="py-4 px-4 font-bold text-zinc-500 uppercase text-xs tracking-wider text-right">Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penyewaans as $sewa)
                            <tr class="border-b border-zinc-100 hover:bg-zinc-50 transition">
                                <td class="py-4 px-4 font-mono text-sm text-center">#{{ $sewa->id }}</td>
                                <td class="py-4 px-4">
                                    <div class="font-bold">{{ $sewa->pelanggan->nama_lengkap ?? 'Guest' }}</div>
                                    <div class="text-xs text-zinc-500">{{ $sewa->pelanggan->no_hp ?? '-' }}</div>
                                </td>
                                <td class="py-4 px-4 text-sm">
                                    {{ $sewa->motor->nama_motor }}
                                </td>
                                <td class="py-4 px-4 text-sm">
                                    <div class="flex flex-col">
                                        <span><i class="fa-solid fa-arrow-right text-green-500 mr-1"></i>
                                            {{ \Carbon\Carbon::parse($sewa->tgl_mulai)->format('d M') }}</span>
                                        <span><i class="fa-solid fa-arrow-left text-red-500 mr-1"></i>
                                            {{ \Carbon\Carbon::parse($sewa->tgl_kembali)->format('d M') }}</span>
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <span
                                        class="px-2 py-1 text-[10px] font-black uppercase tracking-wider rounded-full border
                                        @if ($sewa->status_sewa == 'Aktif') bg-green-50 border-green-200 text-green-700
                                        @elseif($sewa->status_sewa == 'Selesai') bg-zinc-100 border-zinc-200 text-zinc-500
                                        @elseif($sewa->status_sewa == 'Booking') bg-blue-50 border-blue-200 text-blue-700
                                        @else bg-yellow-50 border-yellow-200 text-yellow-700 @endif">
                                        {{ $sewa->status_sewa }}
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-right">
                                    <a href="{{ route('penyewaan.show', $sewa->id) }}"
                                        class="inline-block bg-zinc-900 text-white px-4 py-2 rounded-sm text-xs font-bold uppercase tracking-wider hover:bg-zinc-800 transition">
                                        Kelola
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if ($penyewaans->isEmpty())
                <div class="p-8 text-center text-zinc-400">
                    <i class="fa-solid fa-calendar-xmark text-4xl mb-3"></i>
                    <p>Belum ada data penyewaan.</p>
                </div>
            @endif
        </div>

        {{-- Mobile View --}}
        <div class="md:hidden space-y-4">
            @forelse ($penyewaans as $sewa)
                <div class="bg-white border border-zinc-200 rounded-lg shadow-sm p-4">
                    <div class="flex justify-between items-start mb-3">
                        <div>
                            <span class="font-mono text-xs text-zinc-400">#{{ $sewa->id }}</span>
                            <h3 class="font-bold text-zinc-900">{{ $sewa->pelanggan->nama_lengkap ?? 'Guest' }}</h3>
                            <p class="text-xs text-zinc-500">{{ $sewa->pelanggan->no_hp ?? '-' }}</p>
                        </div>
                        <span
                            class="px-2 py-1 text-[10px] font-black uppercase tracking-wider rounded-full border
                            @if ($sewa->status_sewa == 'Aktif') bg-green-50 border-green-200 text-green-700
                            @elseif($sewa->status_sewa == 'Selesai') bg-zinc-100 border-zinc-200 text-zinc-500
                            @elseif($sewa->status_sewa == 'Booking') bg-blue-50 border-blue-200 text-blue-700
                            @else bg-yellow-50 border-yellow-200 text-yellow-700 @endif">
                            {{ $sewa->status_sewa }}
                        </span>
                    </div>

                    <div class="mb-3 p-3 bg-zinc-50 rounded border border-zinc-100">
                        <div class="flex items-center gap-2 mb-2 font-bold text-sm text-zinc-800">
                            <i class="fa-solid fa-motorcycle text-zinc-400"></i> {{ $sewa->motor->nama_motor }}
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="flex items-center gap-1">
                                <i class="fa-solid fa-arrow-right text-green-500 text-xs"></i>
                                {{ \Carbon\Carbon::parse($sewa->tgl_mulai)->format('d M') }}
                            </span>
                            <span class="flex items-center gap-1">
                                <i class="fa-solid fa-arrow-left text-red-500 text-xs"></i>
                                {{ \Carbon\Carbon::parse($sewa->tgl_kembali)->format('d M') }}
                            </span>
                        </div>
                    </div>

                    <a href="{{ route('penyewaan.show', $sewa->id) }}"
                        class="block w-full bg-zinc-900 text-white py-2 rounded text-sm font-bold uppercase tracking-wider text-center hover:bg-zinc-800 transition">
                        Kelola
                    </a>
                </div>
            @empty
                <div class="bg-white border border-zinc-200 rounded-lg p-8 text-center text-zinc-400">
                    <i class="fa-solid fa-calendar-xmark text-4xl mb-3"></i>
                    <p>Belum ada data penyewaan.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
