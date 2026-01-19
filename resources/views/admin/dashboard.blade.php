@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="p-4 md:p-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-black text-zinc-900 tracking-tighter uppercase italic">Dashboard</h1>
            <p class="text-zinc-500 mt-2">Selamat datang di Admin Panel Bromotrail</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            @include('admin.components.stat-card', [
                'label' => 'Total Motor',
                'value' => $totalMotor,
                'icon' => 'fa-solid fa-motorcycle',
                'color' => 'blue',
            ])

            @include('admin.components.stat-card', [
                'label' => 'Motor Tersedia',
                'value' => $motorTersedia,
                'icon' => 'fa-solid fa-circle-check',
                'color' => 'green',
            ])

            @include('admin.components.stat-card', [
                'label' => 'Penyewaan Aktif',
                'value' => $penyewaanAktif,
                'icon' => 'fa-solid fa-calendar-check',
                'color' => 'yellow',
            ])

            @include('admin.components.stat-card', [
                'label' => 'Pending Pembayaran',
                'value' => $pendingPembayaran,
                'icon' => 'fa-solid fa-clock',
                'color' => 'red',
            ])
        </div>

        <!-- Pendapatan -->
        <div class="bg-gradient-to-r from-zinc-900 to-zinc-800 p-8 rounded-sm text-white mb-12 shadow-xl">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-zinc-400 text-sm uppercase tracking-widest mb-2">Pendapatan Bulan Ini</p>
                    <p class="text-4xl font-black">IDR {{ number_format($pendapatanBulanIni, 0, ',', '.') }}</p>
                </div>
                <div class="w-20 h-20 bg-white/10 rounded-sm flex items-center justify-center">
                    <i class="fa-solid fa-money-bill-trend-up text-4xl"></i>
                </div>
            </div>
        </div>

        <!-- Recent Bookings -->
        <div class="bg-white border border-zinc-200 rounded-sm p-4 md:p-8 shadow-sm">
            <h2 class="text-xl font-bold text-zinc-900 mb-6 flex items-center gap-3">
                <i class="fa-solid fa-clock-rotate-left text-zinc-400"></i>
                Booking Terbaru
            </h2>

            @if ($recentBookings->isEmpty())
                <p class="text-zinc-500 text-center py-8">Belum ada booking</p>
            @else
                {{-- Desktop Table --}}
                <div class="hidden md:block overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-zinc-50 border-b border-zinc-200">
                                <th
                                    class="py-4 px-4 font-bold text-zinc-500 uppercase text-xs tracking-wider text-center w-16">
                                    ID
                                </th>
                                <th
                                    class="py-4 px-4 font-bold text-zinc-500 uppercase text-xs tracking-wider text-left w-48">
                                    Pelanggan</th>
                                <th
                                    class="py-4 px-4 font-bold text-zinc-500 uppercase text-xs tracking-wider text-left w-56">
                                    Motor</th>
                                <th class="py-4 px-4 font-bold text-zinc-500 uppercase text-xs tracking-wider text-left">
                                    Tanggal</th>
                                <th class="py-4 px-4 font-bold text-zinc-500 uppercase text-xs tracking-wider text-center">
                                    Status</th>
                                <th class="py-4 px-4 font-bold text-zinc-500 uppercase text-xs tracking-wider text-right">
                                    Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentBookings as $booking)
                                <tr class="border-b border-zinc-100 hover:bg-zinc-50 transition">
                                    <td class="py-4 px-4 font-mono text-sm text-center">#{{ $booking->id }}</td>
                                    <td class="py-4 px-4 text-sm font-bold">{{ $booking->pelanggan->nama_lengkap }}</td>
                                    <td class="py-4 px-4 text-sm font-bold text-zinc-600">
                                        {{ optional($booking->motor)->merk_tipe ?? 'Motor Dihapus' }}</td>
                                    <td class="py-4 px-4 text-sm text-zinc-500">
                                        {{ \Carbon\Carbon::parse($booking->tgl_mulai)->format('d M Y') }}</td>
                                    <td class="py-4 px-4 text-center">
                                        <span
                                            class="px-2 py-1 rounded-full text-[9px] font-black uppercase tracking-tighter
                                        @if ($booking->status_sewa == 'Booking') bg-blue-50 text-blue-600
                                        @elseif($booking->status_sewa == 'Proses Verifikasi') bg-yellow-50 text-yellow-600
                                        @elseif($booking->status_sewa == 'Aktif') bg-green-50 text-green-600
                                        @else bg-zinc-100 text-zinc-500 @endif">
                                            {{ $booking->status_sewa }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-4 text-sm font-mono font-bold text-right">IDR
                                        {{ number_format($booking->total_biaya, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Mobile Card View --}}
                <div class="md:hidden space-y-4">
                    @foreach ($recentBookings as $booking)
                        <div class="bg-zinc-50 border border-zinc-100 rounded p-4">
                            <div class="flex justify-between items-start mb-2">
                                <span class="font-mono text-xs text-zinc-400">#{{ $booking->id }}</span>
                                <span
                                    class="px-2 py-1 rounded-full text-[9px] font-black uppercase tracking-tighter
                                    @if ($booking->status_sewa == 'Booking') bg-blue-50 text-blue-600
                                    @elseif($booking->status_sewa == 'Proses Verifikasi') bg-yellow-50 text-yellow-600
                                    @elseif($booking->status_sewa == 'Aktif') bg-green-50 text-green-600
                                    @else bg-zinc-100 text-zinc-500 @endif">
                                    {{ $booking->status_sewa }}
                                </span>
                            </div>
                            <div class="mb-2">
                                <h4 class="font-bold text-zinc-900">{{ $booking->pelanggan->nama_lengkap }}</h4>
                                <p class="text-sm text-zinc-600">
                                    {{ optional($booking->motor)->merk_tipe ?? 'Motor Dihapus' }}</p>
                            </div>
                            <div class="flex justify-between items-end border-t border-zinc-200 pt-2 mt-2">
                                <span
                                    class="text-xs text-zinc-500">{{ \Carbon\Carbon::parse($booking->tgl_mulai)->format('d M Y') }}</span>
                                <span class="font-bold text-sm text-zinc-900">IDR
                                    {{ number_format($booking->total_biaya, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection
