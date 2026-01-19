@extends('layouts.main')

@section('content')
    <div class="min-h-screen bg-zinc-50 pt-32 pb-12 flex items-center justify-center">
        <div class="container mx-auto px-6 max-w-md">
            <div class="bg-white p-8 rounded-sm border border-zinc-200 shadow-xl text-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>

                <h1 class="text-2xl font-bold text-zinc-900 tracking-tighter mb-2">Booking Berhasil!</h1>
                <p class="text-zinc-500 mb-8">Terima kasih, pesanan Anda telah kami terima.</p>

                <div class="bg-zinc-50 p-4 rounded-sm border border-zinc-100 mb-8 text-left">
                    <div class="flex justify-between mb-2">
                        <span class="text-xs font-bold text-zinc-400 uppercase">ID Booking</span>
                        <span class="text-sm font-bold text-zinc-900">#{{ $penyewaan->id }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="text-xs font-bold text-zinc-400 uppercase">Motor</span>
                        <span class="text-sm font-bold text-zinc-900">{{ $penyewaan->motor->merk_tipe }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="text-xs font-bold text-zinc-400 uppercase">Tanggal</span>
                        <span class="text-sm font-bold text-zinc-900">{{ $penyewaan->tgl_mulai->format('d M') }} -
                            {{ $penyewaan->tgl_kembali->format('d M Y') }}</span>
                    </div>
                    <div class="flex justify-between pt-2 border-t border-zinc-200 mt-2">
                        <span class="text-xs font-bold text-zinc-400 uppercase">Total</span>
                        <span class="text-base font-bold text-zinc-900">IDR
                            {{ number_format($penyewaan->total_biaya, 0, ',', '.') }}</span>
                    </div>
                </div>

                <div class="flex flex-col gap-3">
                    <a href="{{ route('pembayaran.create', $penyewaan->id) }}"
                        class="block w-full py-4 bg-zinc-900 text-white font-bold rounded-sm hover:bg-zinc-800 transition-colors tracking-widest uppercase shadow-lg">
                        Lanjut Pembayaran
                    </a>
                    <a href="{{ url('/') }}"
                        class="block w-full py-4 bg-zinc-100 text-zinc-900 font-bold rounded-sm hover:bg-zinc-200 transition-colors tracking-widest uppercase text-xs">
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
