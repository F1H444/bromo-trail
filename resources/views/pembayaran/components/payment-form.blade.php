<!-- Payment Form Component -->
<div class="bg-white p-8 rounded-sm border border-zinc-200 shadow-sm">
    <h4 class="text-xl font-bold text-zinc-900 mb-6">Upload Bukti Pembayaran</h4>

    <!-- Bank Info -->
    <div class="bg-zinc-50 p-6 rounded-sm mb-8 border border-zinc-200">
        <p class="text-xs font-bold text-zinc-500 uppercase tracking-widest mb-4">Transfer ke Rekening:</p>
        <div class="space-y-3">
            <div>
                <p class="text-sm text-zinc-500">Bank / E-Wallet</p>
                <p class="font-bold text-zinc-900">BRI / Dana / Gopay / ShopeePay</p>
            </div>
            <div>
                <p class="text-sm text-zinc-500">Nomor Rekening / HP</p>
                <p class="font-bold text-zinc-900 text-lg">088001006448501</p>
            </div>
            <div>
                <p class="text-sm text-zinc-500">Atas Nama</p>
                <p class="font-bold text-zinc-900">Bromotrail Rental</p>
            </div>
        </div>
    </div>

    <!-- Upload Form -->
    <form action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <input type="hidden" name="id_penyewaan" value="{{ $penyewaan->id }}">

        <div class="flex flex-col gap-2">
            <label for="metode_bayar" class="text-xs font-bold text-zinc-500 uppercase tracking-widest">
                Metode Pembayaran
            </label>
            <select name="metode_bayar" id="metode_bayar" required
                class="w-full border border-zinc-300 rounded-sm p-3 focus:outline-none focus:border-zinc-900 transition-colors">
                <option value="">Pilih Metode</option>
                <option value="Transfer BRI">Transfer BRI</option>
                <option value="E-Wallet (Dana/Gopay/ShopeePay)">E-Wallet (Dana/Gopay/ShopeePay)</option>
                <option value="Cash">Cash / On the Spot</option>
            </select>
        </div>

        <div class="flex flex-col gap-2">
            <label for="jumlah_bayar" class="text-xs font-bold text-zinc-500 uppercase tracking-widest">
                Jumlah Bayar (IDR)
            </label>
            <input type="number" name="jumlah_bayar" id="jumlah_bayar" required value="{{ $penyewaan->total_biaya }}"
                class="w-full border border-zinc-300 rounded-sm p-3 focus:outline-none focus:border-zinc-900 transition-colors">
        </div>

        <div class="flex flex-col gap-2">
            <label for="bukti_bayar" class="text-xs font-bold text-zinc-500 uppercase tracking-widest">
                Bukti Transfer (JPG/PNG, Max 2MB)
            </label>
            <input type="file" name="bukti_bayar" id="bukti_bayar" required accept="image/*"
                class="w-full border border-zinc-300 rounded-sm p-3 focus:outline-none focus:border-zinc-900 transition-colors file:mr-4 file:py-2 file:px-4 file:rounded-sm file:border-0 file:text-xs file:font-bold file:bg-zinc-900 file:text-white hover:file:bg-zinc-800">
            <p class="text-[10px] text-zinc-400 mt-1">Upload screenshot atau foto bukti transfer Anda</p>
        </div>

        <button type="submit"
            class="w-full py-4 bg-zinc-900 text-white text-xs font-black tracking-[0.2em] uppercase rounded-sm hover:bg-zinc-800 transition-all shadow-xl hover:shadow-zinc-900/30">
            Kirim Bukti Pembayaran
        </button>
    </form>
</div>
