@extends('layouts.admin')

@section('title', 'Laporan Bisnis')

@section('content')
    <div class="p-4 md:p-8">
        <div class="mb-8">
            <h1 class="text-3xl font-black text-zinc-900 tracking-tighter uppercase italic">Laporan Bisnis</h1>
            <p class="text-zinc-500 mt-1">Ringkasan performa bisnis dan transaksi.</p>
        </div>

        <!-- Filter -->
        <div class="bg-white border border-zinc-200 rounded-sm shadow-sm p-6 mb-8">
            <form action="{{ route('laporan.index') }}" method="GET" class="flex flex-col md:flex-row gap-4 items-end">
                <div class="w-full md:w-auto">
                    <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Dari Tanggal</label>
                    <input type="date" name="start_date" value="{{ $startDate }}"
                        class="w-full md:w-auto bg-zinc-50 border border-zinc-200 p-2 rounded-sm focus:outline-none focus:border-zinc-900 transition">
                </div>
                <div class="w-full md:w-auto">
                    <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Sampai
                        Tanggal</label>
                    <input type="date" name="end_date" value="{{ $endDate }}"
                        class="w-full md:w-auto bg-zinc-50 border border-zinc-200 p-2 rounded-sm focus:outline-none focus:border-zinc-900 transition">
                </div>
                <button type="submit"
                    class="w-full md:w-auto bg-zinc-900 text-white px-6 py-2.5 rounded-sm font-bold uppercase tracking-wider hover:bg-zinc-800 transition">
                    <i class="fa-solid fa-filter mr-2"></i> Tampilkan Laporan
                </button>
            </form>
        </div>

        <!-- Stats Overview -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-gradient-to-br from-zinc-900 to-zinc-800 p-6 rounded-sm text-white shadow-lg lg:col-span-2">
                <p class="text-zinc-400 text-xs uppercase tracking-widest mb-1">Total Pendapatan</p>
                <p class="text-4xl font-black">IDR {{ number_format($pendapatan, 0, ',', '.') }}</p>
                <div class="mt-4 text-xs text-zinc-400">
                    <i class="fa-solid fa-calendar-day mr-1"></i> Periode
                    {{ \Carbon\Carbon::parse($startDate)->format('d M') }} -
                    {{ \Carbon\Carbon::parse($endDate)->format('d M Y') }}
                </div>
            </div>

            <div class="bg-white border border-zinc-200 p-6 rounded-sm shadow-sm">
                <p class="text-zinc-500 text-xs uppercase tracking-widest mb-1">Total Transaksi Sewa</p>
                <p class="text-3xl font-black text-zinc-900">{{ $totalSewa }}</p>
                <div class="mt-4 w-full bg-zinc-100 h-1.5 rounded-full overflow-hidden">
                    <div class="bg-blue-500 h-full w-full"></div>
                </div>
            </div>

            <div class="bg-white border border-zinc-200 p-6 rounded-sm shadow-sm">
                <p class="text-zinc-500 text-xs uppercase tracking-widest mb-2">Statistik Status</p>
                <div class="space-y-2">
                    @foreach ($statusStats as $status => $count)
                        <div class="flex justify-between text-sm">
                            <span class="text-zinc-600">{{ $status }}</span>
                            <span class="font-bold">{{ $count }}</span>
                        </div>
                    @endforeach
                    @if ($statusStats->isEmpty())
                        <p class="text-zinc-400 text-xs italic">Tidak ada data.</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Data Tabel Desktop -->
        <div class="hidden md:block bg-white border border-zinc-200 rounded-sm shadow-sm overflow-hidden">
            <div class="p-6 border-b border-zinc-100">
                <h2 class="font-bold text-zinc-900 uppercase tracking-wider">Detail Transaksi</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-zinc-50 border-b border-zinc-200">
                            <th class="py-4 px-4 font-bold text-zinc-500 uppercase text-xs tracking-wider text-center w-16">
                                ID</th>
                            <th class="py-4 px-4 font-bold text-zinc-500 uppercase text-xs tracking-wider text-left">Tanggal
                            </th>
                            <th class="py-4 px-4 font-bold text-zinc-500 uppercase text-xs tracking-wider text-left w-48">
                                Pelanggan</th>
                            <th class="py-4 px-4 font-bold text-zinc-500 uppercase text-xs tracking-wider text-left w-48">
                                Motor
                            </th>
                            <th class="py-4 px-4 font-bold text-zinc-500 uppercase text-xs tracking-wider text-right">Total
                            </th>
                            <th class="py-4 px-4 font-bold text-zinc-500 uppercase text-xs tracking-wider text-center">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi as $trx)
                            <tr class="border-b border-zinc-100 hover:bg-zinc-50 text-sm transition">
                                <td class="py-4 px-4 font-mono text-center">#{{ $trx->id }}</td>
                                <td class="py-4 px-4 text-zinc-500">
                                    {{ \Carbon\Carbon::parse($trx->created_at)->format('d/m/Y') }}</td>
                                <td class="py-4 px-4 font-bold text-zinc-900">{{ $trx->pelanggan->nama_lengkap }}</td>
                                <td class="py-4 px-4 text-zinc-600 font-bold italic">{{ $trx->motor->nama_motor }}</td>
                                <td class="py-4 px-4 font-mono font-bold text-right text-zinc-900">IDR
                                    {{ number_format($trx->total_biaya, 0, ',', '.') }}
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <span
                                        class="px-2 py-1 text-[10px] font-black uppercase tracking-wider rounded-full border
                                        {{ $trx->status_sewa == 'Selesai' ? 'bg-zinc-100 text-zinc-500 border-zinc-200' : 'bg-green-50 text-green-600 border-green-200' }}">
                                        {{ $trx->status_sewa }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if ($transaksi->isEmpty())
                <div class="p-8 text-center text-zinc-400">
                    <p>Tidak ada transaksi pada periode ini.</p>
                </div>
            @endif
        </div>

        {{-- Mobile Card View --}}
        <div class="md:hidden space-y-4">
            <h2 class="font-bold text-zinc-900 uppercase tracking-wider mb-4">Detail Transaksi</h2>
            @forelse ($transaksi as $trx)
                <div class="bg-white border border-zinc-200 rounded-lg shadow-sm p-4">
                    <div class="flex justify-between items-start mb-3">
                        <div>
                            <span class="font-mono text-xs text-zinc-400">#{{ $trx->id }}</span>
                            <div class="text-xs text-zinc-500">
                                {{ \Carbon\Carbon::parse($trx->created_at)->format('d M Y') }}</div>
                        </div>
                        <span
                            class="px-2 py-1 text-[10px] font-black uppercase tracking-wider rounded-full border
                            {{ $trx->status_sewa == 'Selesai' ? 'bg-zinc-100 text-zinc-500' : 'bg-green-50 text-green-600' }}">
                            {{ $trx->status_sewa }}
                        </span>
                    </div>

                    <div class="mb-3">
                        <h3 class="font-bold text-zinc-900">{{ $trx->pelanggan->nama_lengkap }}</h3>
                        <p class="text-sm text-zinc-600"><i class="fa-solid fa-motorcycle mr-1 text-zinc-400"></i>
                            {{ $trx->motor->nama_motor }}</p>
                    </div>

                    <div class="pt-3 border-t border-zinc-100 flex justify-between items-center">
                        <span class="text-xs text-zinc-500 uppercase tracking-wider font-bold">Total</span>
                        <span class="font-mono font-bold text-zinc-900">IDR
                            {{ number_format($trx->total_biaya, 0, ',', '.') }}</span>
                    </div>
                </div>
            @empty
                <div class="bg-white border border-zinc-200 rounded-lg p-8 text-center text-zinc-400">
                    <p>Tidak ada transaksi pada periode ini.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
