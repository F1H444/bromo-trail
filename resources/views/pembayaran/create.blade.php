@extends('layouts.main')

@section('content')
    <div class="min-h-screen bg-zinc-50 pt-32 pb-12">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="flex flex-col lg:flex-row gap-8 items-start">
                <!-- Left: Instructions & Summary -->
                <div class="w-full lg:w-1/2 space-y-4">
                    <div>
                        <h1 class="text-3xl font-bold text-zinc-900 tracking-tighter mb-2">Finalisasi Pembayaran</h1>
                        <p class="text-xs text-zinc-500 leading-relaxed">
                            Selesaikan pembayaran untuk mengamankan jadwal sewa. Verifikasi admin maksimal 24 jam.
                        </p>
                    </div>

                    <!-- Order Summary Card -->
                    <div class="bg-white border border-zinc-200 rounded-sm shadow-lg p-6 overflow-hidden relative">
                        <div class="absolute top-0 right-0 p-3">
                            <span
                                class="px-2 py-0.5 bg-zinc-100 text-zinc-500 text-[9px] font-bold uppercase tracking-widest rounded-full">#{{ $penyewaan->id }}</span>
                        </div>

                        <div class="flex gap-4 mb-4">
                            <div class="w-24 h-18 bg-zinc-100 rounded-sm overflow-hidden flex-shrink-0">
                                <img src="{{ $penyewaan->motor->gambar_url }}" class="w-full h-full object-cover"
                                    alt="Motor">
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-zinc-900 mb-0.5">{{ $penyewaan->motor->merk_tipe }}</h3>
                                <p class="text-xs text-zinc-500 mb-1">
                                    {{ \Carbon\Carbon::parse($penyewaan->tgl_mulai)->format('d M') }} -
                                    {{ \Carbon\Carbon::parse($penyewaan->tgl_kembali)->format('d M Y') }}
                                </p>
                                <span
                                    class="px-2 py-0.5 bg-green-50 text-green-600 text-[9px] font-bold rounded-sm uppercase tracking-tighter">
                                    {{ \Carbon\Carbon::parse($penyewaan->tgl_mulai)->diffInDays(\Carbon\Carbon::parse($penyewaan->tgl_kembali)) + 1 }}
                                    Hari
                                </span>
                            </div>
                        </div>

                        <div class="space-y-3 pt-6 border-t border-zinc-100">
                            <div class="flex justify-between text-sm">
                                <span class="text-zinc-500">Harga Sewa Motor</span>
                                <span class="font-bold text-zinc-900">IDR
                                    {{ number_format($penyewaan->motor->harga_sewa_per_hari, 0, ',', '.') }} x
                                    {{ \Carbon\Carbon::parse($penyewaan->tgl_mulai)->diffInDays(\Carbon\Carbon::parse($penyewaan->tgl_kembali)) + 1 }}</span>
                            </div>
                            @if ($penyewaan->details->isNotEmpty())
                                @foreach ($penyewaan->details as $detail)
                                    <div class="flex justify-between text-sm">
                                        <span class="text-zinc-500">{{ $detail->tambahan->nama_item }}
                                            ({{ $detail->jumlah }}x)
                                        </span>
                                        <span class="font-bold text-zinc-900">IDR
                                            {{ number_format($detail->subtotal_harga, 0, ',', '.') }}</span>
                                    </div>
                                @endforeach
                            @endif
                            <div class="flex justify-between pt-4 border-t border-zinc-900 mt-4">
                                <span class="text-lg font-bold text-zinc-900">Total Tagihan</span>
                                <span class="text-2xl font-black text-zinc-900">IDR
                                    {{ number_format($penyewaan->total_biaya, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Bank Accounts -->
                    <div class="grid grid-cols-2 gap-3">
                        <div class="p-4 bg-white border border-zinc-200 rounded-sm">
                            <p class="text-[9px] font-black text-blue-600 uppercase tracking-widest mb-2">Transfer BRI</p>
                            <p class="text-base font-mono font-bold text-zinc-900 tracking-wider">0880 0100 6448 501</p>
                            <p class="text-[9px] text-zinc-400 mt-0.5 uppercase">a.n. Bromo Trail Rental</p>
                        </div>
                        <div class="p-4 bg-white border border-zinc-200 rounded-sm">
                            <p class="text-[9px] font-black text-orange-600 uppercase tracking-widest mb-2">E-Wallet</p>
                            <p class="text-base font-mono font-bold text-zinc-900 tracking-wider">0880 0100 6448 501</p>
                            <p class="text-[9px] text-zinc-400 mt-0.5 uppercase">Dana / Gopay / ShopeePay</p>
                        </div>
                    </div>
                </div>

                <!-- Right: Form -->
                <div class="w-full lg:w-1/2">
                    <div class="bg-white p-8 rounded-sm border border-zinc-200 shadow-xl">
                        <div class="mb-6">
                            <h2 class="text-xl font-bold text-zinc-900 mb-1">Konfirmasi Transfer</h2>
                            <p class="text-[11px] text-zinc-400 font-medium italic border-l-2 border-zinc-200 pl-3">
                                Pastikan nominal transfer tepat hingga 3 digit terakhir.
                            </p>
                        </div>

                        <form action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data"
                            class="space-y-6">
                            @csrf
                            <input type="hidden" name="id_penyewaan" value="{{ $penyewaan->id }}">
                            <input type="hidden" name="tgl_bayar" value="{{ date('Y-m-d') }}">

                            <div class="space-y-4">
                                <div class="flex flex-col gap-3">
                                    <label for="metode_bayar"
                                        class="text-xs font-black text-zinc-400 uppercase tracking-widest">Metode
                                        Pembayaran</label>
                                    <select name="metode_bayar" id="metode_bayar" required
                                        class="w-full border-2 border-zinc-100 bg-zinc-50 rounded-sm p-4 focus:outline-none focus:border-zinc-900 transition-all font-bold text-zinc-900">
                                        <option value="Transfer BRI">Bank BRI (Otomatis)</option>
                                        <option value="E-Wallet (Dana/Gopay/ShopeePay)">Dana / GoPay / ShopeePay</option>
                                    </select>
                                </div>

                                <div class="flex flex-col gap-3">
                                    <label for="jumlah_bayar_dummy"
                                        class="text-xs font-black text-zinc-400 uppercase tracking-widest">Jumlah Yang Harus
                                        Dibayar</label>
                                    <div class="relative">
                                        <span
                                            class="absolute left-4 top-1/2 -translate-y-1/2 font-bold text-zinc-400">IDR</span>
                                        <input type="text" id="jumlah_bayar_dummy"
                                            value="{{ number_format($penyewaan->total_biaya, 0, ',', '.') }}" readonly
                                            class="w-full border-2 border-zinc-100 bg-zinc-50 rounded-sm p-4 pl-14 focus:outline-none transition-all font-black text-2xl text-zinc-900 cursor-not-allowed">
                                        <input type="hidden" name="jumlah_bayar" value="{{ $penyewaan->total_biaya }}">
                                    </div>
                                    <p class="text-[10px] text-zinc-400 italic font-medium">*Nominal pas, tidak berlaku
                                        sistem DP/Cicilan.</p>
                                </div>

                                <div class="flex flex-col gap-3">
                                    <label class="text-xs font-black text-zinc-400 uppercase tracking-widest">Unggah Bukti
                                        Transaksi</label>
                                    <div class="group border-2 border-dashed border-zinc-200 rounded-sm p-6 text-center hover:border-zinc-900 transition-all cursor-pointer bg-zinc-50/50 hover:bg-white relative"
                                        id="drop-area">
                                        <input type="file" name="bukti_bayar" id="bukti_bayar" accept="image/*"
                                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" required
                                            onchange="previewImage(this)">
                                        <div id="upload-placeholder" class="space-y-2">
                                            <div
                                                class="w-12 h-12 bg-zinc-100 rounded-full flex items-center justify-center mx-auto group-hover:bg-zinc-900 group-hover:text-white transition-all">
                                                <i class="fa-solid fa-cloud-arrow-up text-xl"></i>
                                            </div>
                                            <div>
                                                <p class="text-sm text-zinc-900 font-bold uppercase tracking-tight">Klik
                                                    atau Seret Gambar Ke Sini</p>
                                                <p
                                                    class="text-[10px] text-zinc-400 mt-1 uppercase tracking-widest font-bold">
                                                    Maksimal File 2 MB (JPG, PNG)</p>
                                            </div>
                                        </div>
                                        <div id="preview-container" class="hidden animate-in fade-in zoom-in duration-300">
                                            <img id="image-preview" src="#" alt="Preview"
                                                class="max-h-72 mx-auto rounded-sm shadow-2xl border-4 border-white">
                                            <button type="button" onclick="resetUpload()"
                                                class="mt-4 text-[10px] font-bold text-red-600 uppercase tracking-widest hover:text-red-800">Ganti
                                                Gambar</button>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" id="btn-submit"
                                    class="w-full py-4 bg-zinc-900 text-white font-black rounded-sm hover:bg-zinc-800 transition-all shadow-2xl hover:shadow-zinc-900/40 tracking-[0.2em] uppercase flex justify-center items-center gap-3 mt-4">
                                    <span>Kirim Konfirmasi</span>
                                    <i class="fa-solid fa-paper-plane text-xs"></i>
                                </button>

                                <p
                                    class="text-center text-[9px] text-zinc-400 uppercase tracking-[0.15em] font-medium leading-loose">
                                    Dengan menekan tombol, Anda menyatakan bahwa data transfer yang dikirim adalah benar &
                                    milik Anda sendiri.
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function previewImage(input) {
                const preview = document.getElementById('image-preview');
                const placeholder = document.getElementById('upload-placeholder');
                const container = document.getElementById('preview-container');

                if (input.files && input.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        container.classList.remove('hidden');
                        placeholder.classList.add('hidden');
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            function resetUpload() {
                const input = document.getElementById('bukti_bayar');
                const preview = document.getElementById('image-preview');
                const placeholder = document.getElementById('upload-placeholder');
                const container = document.getElementById('preview-container');

                input.value = "";
                preview.src = "#";
                container.classList.add('hidden');
                placeholder.classList.remove('hidden');
            }

            const form = document.querySelector('form');
            const btnSubmit = document.getElementById('btn-submit');

            form.addEventListener('submit', function() {
                btnSubmit.disabled = true;
                btnSubmit.innerHTML =
                    `<i class="fa-solid fa-circle-notch animate-spin mr-3"></i> Memproses...`;
            });
        </script>
    @endpush
@endsection
