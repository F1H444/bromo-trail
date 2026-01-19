<div class="bg-white px-6 py-4 border border-zinc-200 rounded-sm shadow-sm">
    <div class="flex items-center justify-between">
        <div>
            <span
                class="block text-[10px] font-black text-zinc-400 uppercase tracking-widest mb-1">{{ $label }}</span>
            <span class="text-3xl font-bold text-zinc-900">{{ $value }}</span>
        </div>
        <div class="w-14 h-14 bg-{{ $color ?? 'zinc' }}-100 rounded-sm flex items-center justify-center">
            <i class="{{ $icon }} text-{{ $color ?? 'zinc' }}-600 text-2xl"></i>
        </div>
    </div>
</div>
