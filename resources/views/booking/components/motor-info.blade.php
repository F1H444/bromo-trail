<!-- Motor Info Card Component -->
<div class="bg-white p-6 rounded-sm border border-zinc-200 shadow-sm flex gap-6 items-center">
    <div class="w-24 h-16 bg-zinc-100 rounded-sm overflow-hidden">
        <img src="{{ $motor->gambar_url }}" alt="{{ $motor->merk_tipe }}" class="w-full h-full object-cover">
    </div>
    <div>
        <h3 class="font-bold text-lg text-zinc-900">{{ $motor->merk_tipe }}</h3>
        <p class="text-sm text-zinc-500">{{ $motor->plat_nomor }}</p>
    </div>
    <div class="ml-auto text-right">
        <span class="block font-bold text-lg text-zinc-900">IDR
            {{ number_format($motor->harga_sewa_per_hari, 0, ',', '.') }}</span>
        <span class="text-xs text-zinc-400">/ Hari</span>
    </div>
</div>
