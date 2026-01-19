<!-- Booking Summary Component for Payment Page -->
<div class="bg-white p-8 rounded-sm border border-zinc-200 shadow-sm mb-8">
    <h4 class="text-xl font-bold text-zinc-900 mb-6">Ringkasan Booking</h4>

    <!-- Motor Info -->
    <div class="flex gap-4 items-center pb-6 mb-6 border-b border-zinc-100">
        <div class="w-20 h-14 bg-zinc-100 rounded-sm overflow-hidden">
            <img src="{{ $penyewaan->motor->gambar_url }}" alt="{{ $penyewaan->motor->merk_tipe }}"
                class="w-full h-full object-cover">
        </div>
        <div class="flex-1">
            <h5 class="font-bold text-zinc-900">{{ $penyewaan->motor->merk_tipe }}</h5>
            <p class="text-xs text-zinc-500">{{ $penyewaan->motor->plat_nomor }}</p>
        </div>
    </div>

    <!-- Booking Details -->
    <div class="space-y-4 mb-6">
        <div class="flex justify-between text-sm">
            <span class="text-zinc-500">Nama Penyewa</span>
            <span class="font-bold text-zinc-900">{{ $penyewaan->pelanggan->nama_lengkap }}</span>
        </div>
        <div class="flex justify-between text-sm">
            <span class="text-zinc-500">Tanggal Mulai</span>
            <span
                class="font-bold text-zinc-900">{{ \Carbon\Carbon::parse($penyewaan->tgl_mulai)->format('d M Y') }}</span>
        </div>
        <div class="flex justify-between text-sm">
            <span class="text-zinc-500">Tanggal Kembali</span>
            <span
                class="font-bold text-zinc-900">{{ \Carbon\Carbon::parse($penyewaan->tgl_kembali)->format('d M Y') }}</span>
        </div>
        <div class="flex justify-between text-sm">
            <span class="text-zinc-500">Durasi</span>
            <span
                class="font-bold text-zinc-900">{{ \Carbon\Carbon::parse($penyewaan->tgl_mulai)->diffInDays(\Carbon\Carbon::parse($penyewaan->tgl_kembali)) + 1 }}
                Hari</span>
        </div>
    </div>

    <!-- Total -->
    <div class="pt-6 border-t border-zinc-100">
        <div class="flex justify-between items-center">
            <span class="text-sm font-bold text-zinc-500 uppercase tracking-widest">Total Biaya</span>
            <span class="text-2xl font-black text-zinc-900">IDR
                {{ number_format($penyewaan->total_biaya, 0, ',', '.') }}</span>
        </div>
    </div>
</div>
