@extends('layouts.main')

@section('content')
    <div class="pt-32 pb-12 bg-zinc-50 min-h-screen">
        <!-- Header -->
        <div class="container mx-auto px-4 mb-16 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6 text-zinc-900 leading-tight" id="fleet-header">
                Motor <span class="text-zinc-400">Trail</span>
            </h1>
            <p class="text-lg text-zinc-600 max-w-2xl mx-auto leading-relaxed">
                Setiap unit kami dipersiapkan secara mendalam untuk menaklukkan medan ekstrem Bromo dengan standar keamanan
                tinggi.
            </p>
        </div>

        <!-- Grid -->
        <div class="container mx-auto px-4 mb-24">
            @if ($motors->isEmpty())
                <div class="text-center py-20 bg-white rounded-3xl border border-dashed border-zinc-200">
                    <p class="text-xl text-zinc-400">Belum ada unit motor yang tersedia saat ini.</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="motorcycles-grid">
                    @foreach ($motors as $motor)
                        <div
                            class="bg-white rounded-sm overflow-hidden border border-zinc-200 group hover:shadow-xl transition-all duration-500 bike-card flex flex-col h-full">
                            <div class="aspect-video bg-zinc-100 relative overflow-hidden">
                                <img src="{{ $motor->gambar_url }}" alt="{{ $motor->merk_tipe }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">

                                @if ($motor->is_popular)
                                    <div
                                        class="absolute top-4 left-4 px-3 py-1 bg-zinc-900 text-white text-[10px] font-bold tracking-widest uppercase">
                                        Banyak yang Suka
                                    </div>
                                @endif
                            </div>
                            <div class="p-8 flex flex-col flex-1">
                                <div class="flex justify-between items-start mb-4">
                                    <div>
                                        <h4 class="text-xl font-bold text-zinc-900 tracking-tight">{{ $motor->merk_tipe }}
                                        </h4>
                                        <p class="text-xs font-medium text-zinc-500 uppercase tracking-widest">
                                            {{ $motor->deskripsi_singkat }}</p>
                                    </div>
                                    <div class="text-right">
                                        <span class="block text-xl font-bold text-zinc-900">IDR
                                            {{ number_format($motor->harga_sewa_per_hari, 0, ',', '.') }}k</span>
                                        <span
                                            class="block text-[10px] font-medium text-zinc-500 uppercase tracking-widest">/
                                            Hari</span>
                                    </div>
                                </div>
                                <div class="flex gap-4 py-6 border-y border-zinc-100 mb-8">
                                    <div class="flex flex-col">
                                        <span class="text-[10px] font-bold text-zinc-400 uppercase tracking-widest">Spek
                                            Mesin</span>
                                        <span class="text-xs font-medium text-zinc-900">{{ $motor->spek_mesin }}</span>
                                    </div>
                                    <div class="flex flex-col border-l border-zinc-100 pl-4">
                                        <span
                                            class="text-[10px] font-bold text-zinc-400 uppercase tracking-widest">Kapasitas
                                            Tangki</span>
                                        <span
                                            class="text-xs font-medium text-zinc-900">{{ $motor->kapasitas_tangki }}</span>
                                    </div>
                                </div>
                                <div class="flex gap-2 mt-auto">
                                    <a href="{{ route('motor.show', $motor) }}"
                                        class="flex-1 py-4 bg-white border border-zinc-200 text-zinc-900 text-xs font-bold rounded-sm hover:bg-zinc-50 transition-colors text-center tracking-widest uppercase">
                                        Detail
                                    </a>
                                    <a href="{{ route('booking.create', $motor) }}"
                                        class="flex-1 py-4 bg-zinc-900 text-white text-xs font-bold rounded-sm hover:bg-zinc-800 transition-colors text-center tracking-widest uppercase">
                                        Booking
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Info Section -->
        <div class="container mx-auto px-4">
            <div class="bg-zinc-900 rounded-3xl p-8 md:p-16 relative overflow-hidden text-center md:text-left">
                <!-- Background Gradients Removed -->

                <div class="bg-zinc-900 rounded-3xl p-12 overflow-hidden relative">
                    <div class="relative z-10">
                        <h2 class="text-3xl font-bold text-white mb-6">Komitmen Kami pada Motor</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 text-zinc-400">
                            <div class="space-y-6">
                                <div class="flex gap-4">
                                    <div
                                        class="w-12 h-12 bg-zinc-800 rounded-2xl flex items-center justify-center flex-shrink-0">
                                        <i class="fa-solid fa-wrench text-zinc-500"></i>
                                    </div>
                                    <div>
                                        <h4 class="text-white font-bold mb-2 uppercase tracking-widest text-xs">Pengecekan
                                            Rutin</h4>
                                        <p class="text-sm leading-relaxed">Setiap motor melalui inspeksi mekanik profesional
                                            sebelum diserahkan kepada Anda.</p>
                                    </div>
                                </div>
                                <div class="flex gap-4">
                                    <div
                                        class="w-12 h-12 bg-zinc-800 rounded-2xl flex items-center justify-center flex-shrink-0">
                                        <i class="fa-solid fa-gas-pump text-zinc-500"></i>
                                    </div>
                                    <div>
                                        <h4 class="text-white font-bold mb-2 uppercase tracking-widest text-xs">Unit Siap
                                            Pakai</h4>
                                        <p class="text-sm leading-relaxed">Tangki terisi penuh dan kondisi mesin dalam
                                            performa puncak untuk mendaki.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- ... other points ... -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            gsap.registerPlugin(ScrollTrigger);

            // Header
            gsap.from("#fleet-header > *", {
                y: 20,
                opacity: 0,
                duration: 0.8,
                stagger: 0.1,
                ease: "power2.out"
            });

            // Grid animation simplified to fix the "samar-samar" visual bug
            gsap.from(".bike-card", {
                scrollTrigger: {
                    trigger: "#motorcycles-grid",
                    start: "top 90%",
                },
                y: 30,
                // Opacity 0 removed to avoid invisible/faded cards if Trigger/JS fails or delays
                duration: 0.6,
                stagger: 0.1,
                ease: "power2.out"
            });
        });
    </script>
@endpush
