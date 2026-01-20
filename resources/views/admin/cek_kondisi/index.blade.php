@extends('layouts.admin')

@section('title', 'Riwayat Cek Kondisi')

@section('content')
    <div class="p-4 md:p-8">
        <div class="mb-8 flex flex-col md:flex-row justify-between items-start md:items-center gap-4 md:gap-0">
            <div>
                <h1 class="text-3xl font-black text-zinc-900 tracking-tighter uppercase italic">Riwayat Cek Kondisi</h1>
                <p class="text-zinc-500 mt-1">Log kondisi motor saat pengambilan dan pengembalian.</p>
            </div>
            <a href="{{ route('cek-kondisi.create') }}"
                class="w-full md:w-auto bg-zinc-900 text-white px-6 py-3 rounded-sm font-bold uppercase tracking-wider hover:bg-zinc-800 transition text-center">
                <i class="fa-solid fa-plus mr-2"></i> Input Baru
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6">
                {{ session('success') }}
            </div>
        @endif

        {{-- Desktop View --}}
        <div class="hidden md:block bg-white border border-zinc-200 rounded-sm shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-zinc-50 border-b border-zinc-200">
                            <th class="py-4 px-4 font-bold text-zinc-500 uppercase text-xs tracking-wider text-center w-16">
                                ID</th>
                            <th class="py-4 px-4 font-bold text-zinc-500 uppercase text-xs tracking-wider text-center">Tipe
                            </th>
                            <th class="py-4 px-4 font-bold text-zinc-500 uppercase text-xs tracking-wider text-left w-48">
                                Unit
                                Motor</th>
                            <th class="py-4 px-4 font-bold text-zinc-500 uppercase text-xs tracking-wider text-left w-48">
                                Pelanggan</th>
                            <th class="py-4 px-4 font-bold text-zinc-500 uppercase text-xs tracking-wider text-left">Kondisi
                            </th>
                            <th class="py-4 px-4 font-bold text-zinc-500 uppercase text-xs tracking-wider text-center">Bukti
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($checks as $check)
                            <tr class="border-b border-zinc-100 hover:bg-zinc-50 transition">
                                <td class="py-4 px-4 text-sm font-mono text-center">
                                    #{{ $check->id }}
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <span
                                        class="px-2 py-1 text-[10px] font-black uppercase tracking-wider rounded-full border
                                        {{ $check->waktu_cek == 'Ambil' ? 'bg-blue-50 border-blue-200 text-blue-700' : 'bg-orange-50 border-orange-200 text-orange-700' }}">
                                        {{ $check->waktu_cek }}
                                    </span>
                                </td>
                                <td class="py-4 px-4 font-bold text-sm">
                                    {{ $check->penyewaan->motor->nama_motor ?? 'N/A' }}
                                </td>
                                <td class="py-4 px-4 text-sm">
                                    {{ $check->penyewaan->pelanggan->nama_lengkap ?? 'N/A' }}
                                    <div class="text-[10px] text-zinc-400">Ref: #{{ $check->id_penyewaan }}</div>
                                    <div class="text-[10px] text-zinc-400">Oleh: {{ $check->admin->username ?? 'Admin' }}
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-sm max-w-xs truncate" title="{{ $check->catatan_kondisi_fisik }}">
                                    {{ $check->catatan_kondisi_fisik }}
                                </td>
                                <td class="py-4 px-4 text-center">
                                    @if ($check->foto_kondisi)
                                        <a href="{{ asset($check->foto_kondisi) }}" target="_blank"
                                            class="text-blue-600 hover:text-blue-800">
                                            <i class="fa-solid fa-image"></i> Lihat
                                        </a>
                                    @else
                                        <span class="text-zinc-300">-</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if ($checks->isEmpty())
                <div class="p-8 text-center text-zinc-400">
                    <i class="fa-solid fa-clipboard-question text-4xl mb-3"></i>
                    <p>Belum ada data cek kondisi.</p>
                </div>
            @endif
        </div>

        {{-- Mobile View --}}
        <div class="md:hidden space-y-4">
            @forelse ($checks as $check)
                <div class="bg-white border border-zinc-200 rounded-lg shadow-sm p-4">
                    <div class="flex justify-between items-start mb-3">
                        <div>
                            <span class="font-mono text-xs text-zinc-400">#{{ $check->id }}</span>
                            <h3 class="font-bold text-zinc-900">{{ $check->penyewaan->motor->nama_motor ?? 'N/A' }}</h3>
                            <p class="text-xs text-zinc-500">{{ $check->penyewaan->pelanggan->nama_lengkap ?? 'N/A' }}</p>
                        </div>
                        <span
                            class="px-2 py-1 text-[10px] font-black uppercase tracking-wider rounded-full border
                            {{ $check->waktu_cek == 'Ambil' ? 'bg-blue-50 border-blue-200 text-blue-700' : 'bg-orange-50 border-orange-200 text-orange-700' }}">
                            {{ $check->waktu_cek }}
                        </span>
                    </div>

                    <div class="mb-3">
                        <p class="text-xs text-zinc-500 mb-1 font-bold">Catatan Kondisi</p>
                        <p class="text-sm bg-zinc-50 p-2 rounded text-zinc-700 border border-zinc-100">
                            {{ $check->catatan_kondisi_fisik ?: 'Tidak ada catatan.' }}
                        </p>
                    </div>

                    @if ($check->foto_kondisi)
                        <a href="{{ $check->foto_kondisi }}" target="_blank"
                            class="block w-full bg-zinc-100 text-zinc-600 py-2 rounded text-sm font-bold text-center hover:bg-zinc-200 transition border border-zinc-200">
                            <i class="fa-solid fa-image mr-1"></i> Lihat Foto Bukti
                        </a>
                    @endif
                </div>
            @empty
                <div class="bg-white border border-zinc-200 rounded-lg p-8 text-center text-zinc-400">
                    <i class="fa-solid fa-clipboard-question text-4xl mb-3"></i>
                    <p>Belum ada data cek kondisi.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
