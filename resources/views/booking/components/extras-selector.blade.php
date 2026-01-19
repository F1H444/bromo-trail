<!-- Extras Selector Component -->
<div class="bg-white p-8 rounded-sm border border-zinc-200 shadow-sm">
    <h4 class="text-xl font-bold text-zinc-900 mb-6">Item Tambahan</h4>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @foreach ($tambahan as $index => $item)
            <div
                class="border border-zinc-200 rounded-sm p-4 flex gap-4 items-center group hover:border-zinc-900 transition-colors">
                <div class="w-16 h-16 bg-zinc-100 rounded-sm overflow-hidden flex-shrink-0">
                    @if ($item->gambar_url)
                        <img src="{{ $item->gambar_url }}" alt="{{ $item->nama_item }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-zinc-300">
                            <i class="fa-solid fa-box text-2xl"></i>
                        </div>
                    @endif
                </div>
                <div class="flex-1">
                    <h5 class="font-bold text-sm text-zinc-900">{{ $item->nama_item }}</h5>
                    <p class="text-xs text-zinc-500 mb-2">IDR {{ number_format($item->harga_per_hari, 0, ',', '.') }} /
                        Hari</p>
                    <div class="flex items-center gap-3">
                        <input type="checkbox" name="tambahan[{{ $index }}][id]" value="{{ $item->id }}"
                            id="item-{{ $item->id }}"
                            class="w-4 h-4 rounded border-zinc-300 text-zinc-900 focus:ring-zinc-900"
                            onchange="updateExtrasPrice()">
                        <label for="item-{{ $item->id }}" class="text-xs font-medium text-zinc-600 cursor-pointer">
                            Tambahkan
                        </label>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
