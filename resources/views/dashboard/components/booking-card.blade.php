<div class="bg-white border border-zinc-200 rounded-sm p-6 hover:shadow-xl transition-all group overflow-hidden relative cursor-pointer"
    onclick="window.location.href='{{ route('dashboard.bookings.show', $booking->id) }}'">
    <div class="flex flex-col md:flex-row gap-6 items-center">
        <!-- Motor Image -->
        <div class="w-full md:w-32 h-20 bg-zinc-100 rounded-sm overflow-hidden flex-shrink-0">
            <img src="{{ $booking->motor->gambar_url }}" alt="{{ $booking->motor->merk_tipe }}"
                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
        </div>

        <!-- Basic Info -->
        <div class="flex-1 text-center md:text-left">
            <div class="flex flex-wrap items-center justify-center md:justify-start gap-3 mb-1">
                <h3 class="font-bold text-zinc-900 group-hover:text-zinc-600 transition-colors">
                    {{ $booking->motor->merk_tipe }}</h3>
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
            <div class="flex flex-col md:flex-row md:items-center gap-x-6 gap-y-1 text-xs text-zinc-400">
                <span class="flex items-center gap-2">
                    <i class="fa-solid fa-calendar text-zinc-200"></i>
                    {{ \Carbon\Carbon::parse($booking->tgl_mulai)->format('d M') }} -
                    {{ \Carbon\Carbon::parse($booking->tgl_kembali)->format('d M Y') }}
                </span>
                <span class="flex items-center gap-2">
                    <i class="fa-solid fa-receipt text-zinc-200"></i>
                    IDR {{ number_format($booking->total_biaya, 0, ',', '.') }}
                </span>
            </div>
        </div>

        <!-- Action -->
        <div class="w-full md:w-auto flex items-center gap-4">
            @if ($booking->status_sewa == 'Booking')
                <a href="{{ route('pembayaran.create', $booking->id) }}" onclick="event.stopPropagation()"
                    class="block w-full md:w-auto text-center px-6 py-3 bg-zinc-900 text-white text-[10px] font-bold rounded-sm tracking-widest uppercase hover:bg-zinc-800 transition-all shadow-lg hover:shadow-zinc-900/20">
                    Upload Bukti
                </a>
            @else
                <div
                    class="px-6 py-3 bg-zinc-50 text-zinc-400 text-[10px] font-bold rounded-sm tracking-widest uppercase border border-zinc-100">
                    Terverifikasi
                </div>
            @endif

            <div
                class="hidden md:flex w-10 h-10 items-center justify-center rounded-full bg-zinc-50 text-zinc-300 group-hover:bg-zinc-900 group-hover:text-white transition-all duration-300">
                <i class="fa-solid fa-chevron-right text-xs"></i>
            </div>
        </div>
    </div>

    <!-- Status Bar Accent -->
    <div class="absolute bottom-0 left-0 h-1 transition-all duration-500 group-hover:h-1.5
        @if ($booking->status_sewa == 'Booking') bg-blue-500
        @elseif($booking->status_sewa == 'Proses Verifikasi') bg-yellow-500
        @elseif($booking->status_sewa == 'Aktif') bg-green-500
        @elseif($booking->status_sewa == 'Selesai') bg-zinc-200 @endif"
        style="width: 100%;">
    </div>
</div>
