@extends('layouts.main')

@section('content')
    <div class="min-h-screen bg-zinc-50 pt-32 pb-12 flex items-center justify-center">
        <div class="container mx-auto px-6 max-w-md">
            <div class="bg-white p-8 rounded-sm border border-zinc-200 shadow-xl text-center">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>

                <h1 class="text-2xl font-bold text-zinc-900 tracking-tighter mb-2">Booking Berhenti</h1>
                <p class="text-zinc-600 mb-8 leading-relaxed">
                    @php
                        $reason = session('reason') ?? session('error');
                    @endphp

                    @if ($reason)
                        <span
                            class="block px-4 py-3 bg-red-50 border-l-4 border-red-500 text-red-700 text-sm font-medium mb-2">
                            {{ $reason }}
                        </span>
                    @else
                        <span class="text-zinc-500 italic">Terjadi kendala teknis atau motor tidak tersedia pada tanggal
                            tersebut.</span>
                    @endif
                </p>

                @php
                    $motorId = session('id_motor');
                    $motor = $motorId ? \App\Models\Motor::find($motorId) : null;
                @endphp

                @if ($motor)
                    <div class="bg-zinc-50 p-5 rounded-sm border border-zinc-100 mb-8 text-left">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 bg-zinc-200 rounded-sm overflow-hidden">
                                <img src="{{ $motor->gambar_url }}" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-zinc-900">{{ $motor->merk_tipe }}</h4>
                                <p class="text-[10px] text-zinc-500 uppercase tracking-widest">Saran Tindakan</p>
                            </div>
                        </div>
                        <p class="text-xs text-zinc-600 leading-relaxed">
                            Jangan khawatir, Anda bisa mencoba **mengubah tanggal sewa** atau memilih unit lain yang
                            tersedia di koleksi kami.
                        </p>
                    </div>
                @endif

                <div class="flex flex-col gap-3">
                    @if ($motor)
                        <a href="{{ route('booking.create', $motor->slug) }}"
                            class="block w-full py-4 bg-zinc-900 text-white font-bold rounded-sm hover:bg-zinc-800 transition-all shadow-lg hover:shadow-zinc-900/20 tracking-widest uppercase text-center">
                            Ganti Tanggal Sewa
                        </a>
                    @else
                        <button onclick="window.history.back()"
                            class="block w-full py-4 bg-zinc-900 text-white font-bold rounded-sm hover:bg-zinc-800 transition-all shadow-lg hover:shadow-zinc-900/20 tracking-widest uppercase text-center">
                            Ubah Data Booking
                        </button>
                    @endif

                    <a href="{{ url('/motor') }}"
                        class="block w-full py-4 bg-zinc-100 text-zinc-900 font-bold rounded-sm hover:bg-zinc-200 transition-colors tracking-widest uppercase text-xs text-center border border-zinc-200">
                        Lihat Motor Lain
                    </a>

                    <a href="{{ url('/') }}"
                        class="block w-full py-4 bg-white text-zinc-400 font-medium rounded-sm hover:text-zinc-600 transition-colors text-[10px] text-center uppercase tracking-widest">
                        Batalkan & Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
