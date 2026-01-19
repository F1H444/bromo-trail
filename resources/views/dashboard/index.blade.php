@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <div class="p-4 md:p-8 pt-16 md:pt-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-black text-zinc-900 tracking-tighter uppercase italic">Dashboard</h1>
            <p class="text-zinc-500 mt-2">Selamat datang kembali, <span
                    class="font-bold text-zinc-900">{{ $pelanggan->nama_lengkap }}</span></p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            @include('dashboard.components.stats-card', [
                'label' => 'Total Booking',
                'value' => $bookings->count(),
            ])
            @include('dashboard.components.stats-card', [
                'label' => 'Status Aktif',
                'value' => $activeBookings,
            ])
            @include('dashboard.components.stats-card', [
                'label' => 'Selesai',
                'value' => $completedBookings,
            ])
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Recent Bookings -->
            <div class="lg:col-span-2">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-bold text-zinc-900 tracking-tight flex items-center gap-3">
                        <i class="fa-solid fa-clock-rotate-left text-zinc-400 text-sm"></i>
                        Booking Terbaru
                    </h2>
                    <a href="{{ route('dashboard.bookings') }}"
                        class="text-xs font-bold text-zinc-500 hover:text-zinc-900 uppercase tracking-widest">
                        Lihat Semua →
                    </a>
                </div>

                @if ($bookings->isEmpty())
                    <div class="bg-white border border-zinc-200 rounded-sm p-12 text-center">
                        <div class="w-16 h-16 bg-zinc-50 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fa-solid fa-motorcycle text-zinc-200 text-2xl"></i>
                        </div>
                        <h3 class="font-bold text-zinc-900 mb-2">Belum ada penyewaan</h3>
                        <p class="text-zinc-500 text-sm mb-8">Anda belum melakukan pemesanan unit motor trail apa pun.</p>
                        <a href="{{ url('/motor') }}"
                            class="inline-block px-8 py-3 bg-zinc-900 text-white text-xs font-bold rounded-sm tracking-widest uppercase hover:bg-zinc-800 transition-all">
                            Cari Motor Sekarang
                        </a>
                    </div>
                @else
                    <div class="space-y-4">
                        @foreach ($bookings->take(3) as $booking)
                            @include('dashboard.components.booking-card', ['booking' => $booking])
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Profile Summary -->
            <div>
                <div class="bg-white border border-zinc-200 rounded-sm p-8 shadow-sm mb-8">
                    <h2 class="text-xl font-bold text-zinc-900 mb-6 flex items-center gap-3">
                        <i class="fa-solid fa-user text-zinc-400 text-sm"></i>
                        Data Profil
                    </h2>

                    <div class="space-y-6">
                        <div>
                            <span class="block text-[10px] font-black text-zinc-400 uppercase tracking-widest mb-1">Nama
                                Lengkap</span>
                            <span class="font-bold text-zinc-900">{{ $pelanggan->nama_lengkap }}</span>
                        </div>
                        <div>
                            <span
                                class="block text-[10px] font-black text-zinc-400 uppercase tracking-widest mb-1">Email</span>
                            <span class="font-bold text-zinc-900">{{ $pelanggan->email }}</span>
                        </div>
                        <div>
                            <span
                                class="block text-[10px] font-black text-zinc-400 uppercase tracking-widest mb-1">WhatsApp</span>
                            <span class="font-bold text-zinc-900">{{ $pelanggan->no_wa }}</span>
                        </div>
                        <div>
                            <span class="block text-[10px] font-black text-zinc-400 uppercase tracking-widest mb-1">KTP /
                                SIM</span>
                            <span class="font-bold text-zinc-900">{{ $pelanggan->no_ktp_sim }}</span>
                        </div>
                    </div>

                    <div class="mt-8 pt-8 border-t border-zinc-100">
                        <a href="{{ route('profile') }}"
                            class="flex items-center justify-center gap-3 w-full py-3 border border-zinc-200 text-zinc-600 text-[10px] font-bold rounded-sm tracking-widest uppercase hover:bg-zinc-50 transition-all">
                            Edit Profil <i class="fa-solid fa-pen-to-square text-[8px]"></i>
                        </a>
                    </div>
                </div>

                <!-- Help Card -->
                <div class="bg-zinc-900 p-8 rounded-sm text-white overflow-hidden relative">
                    <div class="relative z-10">
                        <h3 class="font-bold mb-2">Butuh Bantuan?</h3>
                        <p class="text-zinc-400 text-xs leading-relaxed mb-6">Hubungi admin kami jika Anda mengalami
                            kesulitan dalam proses penyewaan atau pembayaran.</p>
                        <a href="https://wa.me/628123456789"
                            class="inline-flex items-center gap-2 text-white font-bold text-xs hover:gap-4 transition-all">
                            Hubungi WhatsApp <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                    <i class="fa-brands fa-whatsapp absolute -bottom-4 -right-4 text-white/10 text-8xl"></i>
                </div>
            </div>
        </div>
    </div>
@endsection
