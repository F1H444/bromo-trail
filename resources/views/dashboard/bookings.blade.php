@extends('layouts.dashboard')

@section('title', 'Riwayat Sewa')

@section('content')
    <div class="p-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-black text-zinc-900 tracking-tighter uppercase italic">Riwayat Sewa</h1>
            <p class="text-zinc-500 mt-2">Semua riwayat penyewaan motor trail Anda</p>
        </div>

        @if ($bookings->isEmpty())
            <div class="bg-white border border-zinc-200 rounded-sm p-16 text-center">
                <div class="w-20 h-20 bg-zinc-50 rounded-full flex items-center justify-center mx-auto mb-8">
                    <i class="fa-solid fa-motorcycle text-zinc-200 text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-zinc-900 mb-3">Belum ada riwayat penyewaan</h3>
                <p class="text-zinc-500 mb-10">Anda belum melakukan pemesanan unit motor trail apa pun.</p>
                <a href="{{ url('/motor') }}"
                    class="inline-block px-10 py-4 bg-zinc-900 text-white text-xs font-bold rounded-sm tracking-widest uppercase hover:bg-zinc-800 transition-all shadow-xl">
                    <i class="fa-solid fa-magnifying-glass mr-2"></i>
                    Cari Motor Sekarang
                </a>
            </div>
        @else
            <!-- Filter/Sort (Optional - for future) -->
            <div class="mb-6 flex items-center justify-between">
                <p class="text-sm text-zinc-500">
                    Menampilkan <span class="font-bold text-zinc-900">{{ $bookings->count() }}</span> booking
                </p>
            </div>

            <!-- Bookings List -->
            <div class="space-y-4">
                @foreach ($bookings as $booking)
                    @include('dashboard.components.booking-card', ['booking' => $booking])
                @endforeach
            </div>
        @endif
    </div>
@endsection
