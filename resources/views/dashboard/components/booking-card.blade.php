<div
    class="bg-white border border-zinc-200 rounded-sm p-6 hover:shadow-lg transition-all group overflow-hidden relative">
    <div class="flex flex-col md:flex-row gap-6 items-center">
        <!-- Motor Image -->
        <div class="w-full md:w-40 h-24 bg-zinc-100 rounded-sm overflow-hidden flex-shrink-0">
            <img src="{{ $booking->motor->gambar_url }}" alt="{{ $booking->motor->merk_tipe }}"
                class="w-full h-full object-cover">
        </div>

        <!-- Basic Info -->
        <div class="flex-1 text-center md:text-left">
            <div class="flex flex-wrap items-center justify-center md:justify-start gap-3 mb-2">
                <h3 class="font-bold text-zinc-900">{{ $booking->motor->merk_tipe }}</h3>
                <span
                    class="px-2 py-0.5 rounded-full text-[9px] font-black uppercase tracking-tighter
                    @if ($booking->status_sewa == 'Booking') bg-blue-50 text-blue-600
                    @elseif($booking->status_sewa == 'Proses Verifikasi') bg-yellow-50 text-yellow-600
                    @elseif($booking->status_sewa == 'Aktif') bg-green-50 text-green-600
                    @elseif($booking->status_sewa == 'Selesai') bg-zinc-100 text-zinc-500 @endif
                ">
                    {{ $booking->status_sewa }}
                </span>
            </div>
            <div class="flex flex-col md:flex-row md:items-center gap-x-6 gap-y-1 text-xs text-zinc-500">
                <span class="flex items-center gap-2">
                    <i class="fa-solid fa-calendar text-zinc-300"></i>
                    {{ \Carbon\Carbon::parse($booking->tgl_mulai)->format('d M Y') }} -
                    {{ \Carbon\Carbon::parse($booking->tgl_kembali)->format('d M Y') }}
                </span>
                <span class="flex items-center gap-2">
                    <i class="fa-solid fa-receipt text-zinc-300"></i>
                    IDR {{ number_format($booking->total_biaya, 0, ',', '.') }}
                </span>
            </div>
        </div>

        <!-- Action -->
        <div class="w-full md:w-auto">
            @if ($booking->status_sewa == 'Booking')
                <a href="{{ route('pembayaran.create', $booking->id) }}"
                    class="block w-full text-center px-6 py-3 bg-zinc-900 text-white text-[10px] font-bold rounded-sm tracking-widest uppercase hover:bg-zinc-800 transition-all">
                    Upload Bukti
                </a>
            @else
                <button disabled
                    class="block w-full text-center px-6 py-3 bg-zinc-100 text-zinc-400 text-[10px] font-bold rounded-sm tracking-widest uppercase cursor-not-allowed">
                    Terverifikasi
                </button>
            @endif
        </div>
    </div>

    <!-- Status Bar Accent -->
    <div class="absolute bottom-0 left-0 h-1 
        @if ($booking->status_sewa == 'Booking') bg-blue-500
        @elseif($booking->status_sewa == 'Proses Verifikasi') bg-yellow-500
        @elseif($booking->status_sewa == 'Aktif') bg-green-500
        @elseif($booking->status_sewa == 'Selesai') bg-zinc-200 @endif"
        style="width: 100%;">
    </div>
</div>
