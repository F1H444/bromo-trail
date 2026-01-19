@extends('layouts.main')

@section('content')
    <div class="min-h-screen bg-zinc-50 pt-32 pb-12 flex items-center justify-center">
        <div class="container mx-auto px-6 max-w-lg">
            <div class="bg-white p-10 rounded-sm border border-zinc-200 shadow-2xl text-center relative overflow-hidden">
                <!-- Success Indicator -->
                <div class="w-20 h-20 bg-green-50 rounded-full flex items-center justify-center mx-auto mb-8 relative z-10">
                    <i class="fa-solid fa-check text-3xl text-green-600 animate-bounce"></i>
                </div>

                <div class="relative z-10">
                    <h1 class="text-3xl font-black text-zinc-900 tracking-tighter mb-4 uppercase italic">Bukti Terkirim!</h1>
                    <p class="text-zinc-500 leading-relaxed mb-8">
                        Terima kasih! Bukti pembayaran Anda telah kami terima dan sedang dalam **proses verifikasi** oleh
                        tim admin.
                    </p>

                    <!-- Info Card -->
                    <div class="bg-zinc-50 border border-zinc-100 rounded-sm p-6 mb-10 text-left">
                        <div class="flex justify-between items-center mb-4 pb-4 border-b border-zinc-200">
                            <span class="text-[10px] font-black text-zinc-400 uppercase tracking-widest">ID BOOKING</span>
                            <span class="font-bold text-zinc-900">#{{ $penyewaan->id }}</span>
                        </div>
                        <div class="space-y-3">
                            <div class="flex justify-between text-sm">
                                <span class="text-zinc-500">Status Pembayaran</span>
                                <span
                                    class="px-2 py-0.5 bg-yellow-100 text-yellow-700 text-[10px] font-bold rounded-sm uppercase tracking-tighter">
                                    {{ $penyewaan->pembayaran->first()->status_pembayaran ?? 'Menunggu Verifikasi' }}
                                </span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-zinc-500">Estimasi Verifikasi</span>
                                <span class="font-bold text-zinc-900">± 24 Jam</span>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="space-y-4">
                        <a href="{{ url('/') }}"
                            class="block w-full py-4 bg-zinc-900 text-white font-black rounded-sm hover:bg-zinc-800 transition-all shadow-xl hover:shadow-zinc-900/40 tracking-[0.2em] uppercase text-center flex items-center justify-center gap-3">
                            <span>Kembali ke Beranda</span>
                            <i class="fa-solid fa-house text-xs"></i>
                        </a>

                        <p class="text-[10px] text-zinc-400 uppercase tracking-widest font-medium">
                            Ada kendala? <a href="https://wa.me/628123456789"
                                class="text-zinc-900 font-bold underline decoration-zinc-200 hover:decoration-zinc-900 transition-all">Hubungi
                                WhatsApp Kami</a>
                        </p>
                    </div>
                </div>

                <!-- Decorative Elements -->
                <div class="absolute -top-10 -right-10 w-32 h-32 bg-green-50/50 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-zinc-100 rounded-full blur-3xl"></div>
            </div>
        </div>
    </div>
@endsection
