<!-- Price Summary Component -->
<div class="bg-white p-8 rounded-sm border border-zinc-200 shadow-xl sticky top-24">
    <h4 class="text-xl font-bold text-zinc-900 mb-6">Ringkasan Biaya</h4>

    <div class="space-y-4 mb-6 pb-6 border-b border-zinc-100">
        <div class="flex justify-between text-sm">
            <span class="text-zinc-500">Sewa Motor</span>
            <span class="font-bold text-zinc-900" id="motor-price">IDR 0</span>
        </div>
        <div class="flex justify-between text-sm">
            <span class="text-zinc-500">Durasi</span>
            <span class="font-bold text-zinc-900"><span id="summary-days">0</span> Hari</span>
        </div>
        <div class="flex justify-between text-sm">
            <span class="text-zinc-500">Item Tambahan</span>
            <span class="font-bold text-zinc-900" id="extras-price">IDR 0</span>
        </div>
    </div>

    <div class="flex justify-between items-center mb-8">
        <span class="text-sm font-bold text-zinc-500 uppercase tracking-widest">Total</span>
        <span class="text-3xl font-black text-zinc-900" id="total-price">IDR 0</span>
    </div>

    <button type="submit"
        class="w-full py-4 bg-zinc-900 text-white text-xs font-black tracking-[0.2em] uppercase rounded-sm hover:bg-zinc-800 transition-all shadow-xl hover:shadow-zinc-900/30">
        Konfirmasi Booking
    </button>

    <p class="text-[10px] text-zinc-400 text-center mt-4 leading-relaxed">
        Dengan melakukan booking, Anda menyetujui syarat dan ketentuan penyewaan kami.
    </p>
</div>
