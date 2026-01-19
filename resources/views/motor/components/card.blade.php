<div
    class="bg-white border border-zinc-200 rounded-sm overflow-hidden group hover:shadow-2xl transition-all duration-300">
    <!-- Image -->
    <div class="aspect-video bg-zinc-100 overflow-hidden relative">
        <img src="{{ $motor->gambar_url }}" alt="{{ $motor->merk_tipe }}"
            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
        @if ($motor->is_popular)
            <div
                class="absolute top-4 right-4 px-3 py-1 bg-yellow-500 text-zinc-900 text-[10px] font-black uppercase tracking-wider rounded-sm shadow-lg">
                Popular
            </div>
        @endif
    </div>

    <!-- Content -->
    <div class="p-6">
        <h3 class="text-xl font-bold text-zinc-900 mb-2 group-hover:text-zinc-600 transition-colors">
            {{ $motor->merk_tipe }}
        </h3>
        <p class="text-zinc-500 text-sm mb-4 line-clamp-2">
            {{ $motor->deskripsi_singkat }}
        </p>

        <!-- Specs -->
        <div class="flex items-center gap-4 mb-6 text-xs text-zinc-400">
            <span class="flex items-center gap-1">
                <i class="fa-solid fa-cog"></i>
                {{ $motor->spek_mesin }}
            </span>
            <span class="flex items-center gap-1">
                <i class="fa-solid fa-gas-pump"></i>
                {{ $motor->kapasitas_tangki }}L
            </span>
        </div>

        <!-- Price & Action -->
        <div class="flex items-center justify-between pt-4 border-t border-zinc-100">
            <div>
                <span class="block text-[10px] text-zinc-400 uppercase tracking-widest mb-1">Harga / Hari</span>
                <span class="text-2xl font-black text-zinc-900">
                    {{ number_format($motor->harga_sewa_per_hari, 0, ',', '.') }}
                    <span class="text-sm font-normal text-zinc-400">IDR</span>
                </span>
            </div>
            <a href="{{ route('motor.show', $motor->slug) }}"
                class="px-6 py-3 bg-zinc-900 text-white text-xs font-bold rounded-sm hover:bg-zinc-800 transition-all tracking-widest uppercase shadow-lg hover:shadow-zinc-900/30">
                Detail
            </a>
        </div>
    </div>
</div>
