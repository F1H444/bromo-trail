@extends('layouts.main')

@section('content')
    <section class="pt-32 pb-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="flex flex-col lg:flex-row gap-12 items-start">
                <!-- Image Section -->
                <div class="w-full lg:w-1/2">
                    <div class="aspect-video bg-zinc-100 rounded-sm overflow-hidden relative group">
                        <img src="{{ $motor->gambar_url }}" alt="{{ $motor->merk_tipe }}" class="w-full h-full object-cover">
                        @if ($motor->is_popular)
                            <div
                                class="absolute top-4 left-4 px-3 py-1 bg-zinc-900 text-white text-[10px] font-bold tracking-widest uppercase">
                                Banyak yang Suka
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Details Section -->
                <div class="w-full lg:w-1/2">
                    <div class="mb-8">
                        <h5 class="text-sm font-bold text-zinc-400 uppercase tracking-widest mb-2">Detail Motor Trail</h5>
                        <h1 class="text-4xl font-bold text-zinc-900 tracking-tighter mb-4">{{ $motor->merk_tipe }}</h1>
                        <p class="text-zinc-600 leading-relaxed">{{ $motor->deskripsi_singkat }}</p>
                    </div>

                    <div class="grid grid-cols-2 gap-6 py-8 border-y border-zinc-100 mb-8">
                        <div>
                            <span class="block text-[10px] font-bold text-zinc-400 uppercase tracking-widest mb-1">Spek
                                Mesin</span>
                            <span class="text-lg font-bold text-zinc-900">{{ $motor->spek_mesin }}</span>
                        </div>
                        <div>
                            <span class="block text-[10px] font-bold text-zinc-400 uppercase tracking-widest mb-1">Kapasitas
                                Tangki</span>
                            <span class="text-lg font-bold text-zinc-900">{{ $motor->kapasitas_tangki }}</span>
                        </div>
                        <div>
                            <span class="block text-[10px] font-bold text-zinc-400 uppercase tracking-widest mb-1">Plat
                                Nomor</span>
                            <span class="text-lg font-bold text-zinc-900">{{ $motor->plat_nomor }}</span>
                        </div>
                        <div>
                            <span
                                class="block text-[10px] font-bold text-zinc-400 uppercase tracking-widest mb-1">Status</span>
                            <span
                                class="inline-block px-2 py-1 text-xs font-bold rounded-sm {{ $motor->status_motor === 'Tersedia' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $motor->status_motor }}
                            </span>
                        </div>
                    </div>

                    <div class="flex items-end justify-between mb-8">
                        <div>
                            <span class="block text-[10px] font-bold text-zinc-400 uppercase tracking-widest mb-1">Harga
                                Sewa</span>
                            <div class="flex items-baseline gap-1">
                                <span class="text-3xl font-bold text-zinc-900">IDR
                                    {{ number_format($motor->harga_sewa_per_hari, 0, ',', '.') }}k</span>
                                <span class="text-xs font-bold text-zinc-500 uppercase tracking-widest">/ Hari</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('booking.create', $motor) }}"
                            class="flex-1 py-4 bg-zinc-900 text-white text-xs font-bold rounded-sm hover:bg-zinc-800 transition-colors text-center tracking-widest uppercase">
                            Booking Sekarang
                        </a>
                        <a href="{{ url('/motor') }}"
                            class="px-8 py-4 bg-white border border-zinc-200 text-zinc-900 text-xs font-bold rounded-sm hover:bg-zinc-50 transition-colors text-center tracking-widest uppercase">
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
