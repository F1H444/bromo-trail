@extends('layouts.admin')

@section('title', 'Verifikasi Pembayaran')

@section('content')
    <div class="p-4 md:p-8">
        <div class="mb-8">
            <h1 class="text-3xl font-black text-zinc-900 tracking-tighter uppercase italic">Verifikasi Pembayaran</h1>
            <p class="text-zinc-500 mt-1">Daftar pembayaran yang perlu diverifikasi.</p>
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
                            <th class="py-4 px-4 font-bold text-zinc-500 uppercase text-xs tracking-wider text-left w-64">
                                Pelanggan</th>
                            <th class="py-4 px-4 font-bold text-zinc-500 uppercase text-xs tracking-wider text-left">Tanggal
                            </th>
                            <th class="py-4 px-4 font-bold text-zinc-500 uppercase text-xs tracking-wider text-right">Jumlah
                            </th>
                            <th class="py-4 px-4 font-bold text-zinc-500 uppercase text-xs tracking-wider text-center">
                                Metode</th>
                            <th class="py-4 px-4 font-bold text-zinc-500 uppercase text-xs tracking-wider text-center">
                                Status</th>
                            <th class="py-4 px-4 font-bold text-zinc-500 uppercase text-xs tracking-wider text-right">Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pembayarans as $pembayaran)
                            <tr class="border-b border-zinc-100 hover:bg-zinc-50 transition">
                                <td class="py-4 px-4 font-mono text-sm text-center">#{{ $pembayaran->id }}</td>
                                <td class="py-4 px-4">
                                    <div class="font-bold">{{ $pembayaran->penyewaan->pelanggan->nama_lengkap ?? 'Guest' }}
                                    </div>
                                    <div class="text-xs text-zinc-500">Ref Sewa: #{{ $pembayaran->id_penyewaan }}</div>
                                </td>
                                <td class="py-4 px-4 text-sm">
                                    {{ \Carbon\Carbon::parse($pembayaran->tgl_bayar)->format('d M Y H:i') }}
                                </td>
                                <td class="py-4 px-4 font-bold font-mono text-right">
                                    IDR {{ number_format($pembayaran->jumlah_bayar, 0, ',', '.') }}
                                </td>
                                <td class="py-4 px-4 text-sm text-center">
                                    {{ $pembayaran->metode_bayar }}
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <span
                                        class="px-2 py-1 text-[10px] font-black uppercase tracking-wider rounded-full
                                        {{ $pembayaran->status_pembayaran == 'Lunas'
                                            ? 'bg-green-100 text-green-700'
                                            : ($pembayaran->status_pembayaran == 'Pending'
                                                ? 'bg-yellow-100 text-yellow-700'
                                                : 'bg-red-100 text-red-700') }}">
                                        {{ $pembayaran->status_pembayaran }}
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-right">
                                    <a href="{{ route('pembayaran.show', $pembayaran->id) }}"
                                        class="inline-block bg-zinc-900 text-white px-4 py-2 rounded-sm text-xs font-bold uppercase tracking-wider hover:bg-zinc-800 transition">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if ($pembayarans->isEmpty())
                <div class="p-8 text-center text-zinc-400">
                    <i class="fa-solid fa-file-invoice-dollar text-4xl mb-3"></i>
                    <p>Belum ada data pembayaran.</p>
                </div>
            @endif
        </div>

        {{-- Mobile View --}}
        <div class="md:hidden space-y-4">
            @forelse ($pembayarans as $pembayaran)
                <div class="bg-white border border-zinc-200 rounded-lg shadow-sm p-4">
                    <div class="flex justify-between items-start mb-3">
                        <div>
                            <span class="font-mono text-xs text-zinc-400">#{{ $pembayaran->id }}</span>
                            <h3 class="font-bold text-zinc-900">
                                {{ $pembayaran->penyewaan->pelanggan->nama_lengkap ?? 'Guest' }}</h3>
                            <p class="text-xs text-zinc-500">Ref Sewa: #{{ $pembayaran->id_penyewaan }}</p>
                        </div>
                        <span
                            class="px-2 py-1 text-[10px] font-black uppercase tracking-wider rounded-full
                            {{ $pembayaran->status_pembayaran == 'Lunas'
                                ? 'bg-green-100 text-green-700'
                                : ($pembayaran->status_pembayaran == 'Pending'
                                    ? 'bg-yellow-100 text-yellow-700'
                                    : 'bg-red-100 text-red-700') }}">
                            {{ $pembayaran->status_pembayaran }}
                        </span>
                    </div>

                    <div class="flex justify-between items-center mb-4 p-3 bg-zinc-50 rounded border border-zinc-100">
                        <div>
                            <p class="text-xs text-zinc-500 mb-1">Total Bayar</p>
                            <p class="font-bold font-mono text-zinc-800">IDR
                                {{ number_format($pembayaran->jumlah_bayar, 0, ',', '.') }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-zinc-500 mb-1">
                                {{ \Carbon\Carbon::parse($pembayaran->tgl_bayar)->format('d M Y') }}</p>
                            <p class="text-xs font-bold text-zinc-700">{{ $pembayaran->metode_bayar }}</p>
                        </div>
                    </div>

                    <a href="{{ route('pembayaran.show', $pembayaran->id) }}"
                        class="block w-full bg-zinc-900 text-white py-2 rounded text-sm font-bold uppercase tracking-wider text-center hover:bg-zinc-800 transition">
                        Detail
                    </a>
                </div>
            @empty
                <div class="bg-white border border-zinc-200 rounded-lg p-8 text-center text-zinc-400">
                    <i class="fa-solid fa-file-invoice-dollar text-4xl mb-3"></i>
                    <p>Belum ada data pembayaran.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
