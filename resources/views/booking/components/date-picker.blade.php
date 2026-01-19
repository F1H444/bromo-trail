<!-- Date Picker Component -->
<div class="bg-white p-8 rounded-sm border border-zinc-200 shadow-sm">
    <h4 class="text-xl font-bold text-zinc-900 mb-6">Tanggal Sewa</h4>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="flex flex-col gap-2">
            <label for="tgl_mulai" class="text-xs font-bold text-zinc-500 uppercase tracking-widest">Mulai</label>
            <input type="date" name="tgl_mulai" id="tgl_mulai" required
                class="w-full border border-zinc-300 rounded-sm p-3 focus:outline-none focus:border-zinc-900 transition-colors"
                min="{{ date('Y-m-d') }}">
        </div>
        <div class="flex flex-col gap-2">
            <label for="tgl_kembali" class="text-xs font-bold text-zinc-500 uppercase tracking-widest">Kembali</label>
            <input type="date" name="tgl_kembali" id="tgl_kembali" required
                class="w-full border border-zinc-300 rounded-sm p-3 focus:outline-none focus:border-zinc-900 transition-colors"
                min="{{ date('Y-m-d') }}">
        </div>
    </div>
    <p id="duration-display" class="mt-4 text-sm font-bold text-zinc-900 bg-zinc-100 p-3 rounded-sm hidden">
        Total Durasi: <span id="days-count">0</span> Hari
    </p>
</div>
