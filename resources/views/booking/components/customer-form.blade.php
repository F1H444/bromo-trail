<!-- Customer Form Component -->
<div class="bg-white p-8 rounded-sm border border-zinc-200 shadow-sm">
    <h4 class="text-xl font-bold text-zinc-900 mb-6">Data Penyewa</h4>
    <div class="space-y-6">
        <div class="flex flex-col gap-2">
            <label for="nama_lengkap" class="text-xs font-bold text-zinc-500 uppercase tracking-widest">Nama
                Lengkap</label>
            <input type="text" name="nama_lengkap" id="nama_lengkap" required placeholder="Sesuai KTP"
                value="{{ old('nama_lengkap', Auth::guard('pelanggan')->user()->nama_lengkap) }}"
                class="w-full border border-zinc-300 rounded-sm p-3 focus:outline-none focus:border-zinc-900 transition-colors">
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="flex flex-col gap-2">
                <label for="no_wa" class="text-xs font-bold text-zinc-500 uppercase tracking-widest">WhatsApp</label>
                <input type="text" name="no_wa" id="no_wa" required placeholder="08..." pattern="^08[0-9]*$"
                    title="Nomor WhatsApp harus diawali dengan 08"
                    value="{{ old('no_wa', Auth::guard('pelanggan')->user()->no_wa) }}"
                    class="w-full border border-zinc-300 rounded-sm p-3 focus:outline-none focus:border-zinc-900 transition-colors">
                <p class="text-[10px] text-zinc-400 mt-1">Harus diawali dengan 08 (contoh: 08123456789)
                </p>
            </div>
            <div class="flex flex-col gap-2">
                <label for="no_ktp_sim" class="text-xs font-bold text-zinc-500 uppercase tracking-widest">No. KTP /
                    SIM</label>
                <input type="text" name="no_ktp_sim" id="no_ktp_sim" required
                    value="{{ old('no_ktp_sim', Auth::guard('pelanggan')->user()->no_ktp_sim) }}"
                    class="w-full border border-zinc-300 rounded-sm p-3 focus:outline-none focus:border-zinc-900 transition-colors">
            </div>
        </div>
        <div class="flex flex-col gap-2">
            <label for="alamat_asal" class="text-xs font-bold text-zinc-500 uppercase tracking-widest">Alamat
                Asal</label>
            <textarea name="alamat_asal" id="alamat_asal" rows="3"
                class="w-full border border-zinc-300 rounded-sm p-3 focus:outline-none focus:border-zinc-900 transition-colors">{{ old('alamat_asal', Auth::guard('pelanggan')->user()->alamat_asal) }}</textarea>
        </div>
    </div>
</div>
