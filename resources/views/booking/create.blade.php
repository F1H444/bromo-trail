@extends('layouts.main')

@section('content')
    <div class="min-h-screen bg-zinc-50 pt-32 pb-12">
        <div class="container mx-auto px-6">
            <h1 class="text-3xl font-bold text-zinc-900 tracking-tighter mb-8">Booking & Sewa Tambahan</h1>

            @if ($errors->any())
                <div class="mb-8 p-4 bg-red-50 border border-red-100 rounded-sm">
                    <h4 class="text-sm font-bold text-red-600 mb-2">Terjadi kesalahan:</h4>
                    <ul class="list-disc list-inside text-xs text-red-500 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('booking.store') }}" method="POST" id="bookingForm" class="flex flex-col lg:flex-row gap-8">
                @csrf
                <input type="hidden" name="id_motor" value="{{ $motor->id }}">

                <!-- Left Column: Inputs -->
                <div class="w-full lg:w-2/3 space-y-8">
                    <!-- Motor Summary (Card) -->
                    <div class="bg-white p-6 rounded-sm border border-zinc-200 shadow-sm flex gap-6 items-center">
                        <div class="w-24 h-16 bg-zinc-100 rounded-sm overflow-hidden">
                            <img src="{{ $motor->gambar_url }}" alt="{{ $motor->merk_tipe }}"
                                class="w-full h-full object-cover">
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

                    <!-- Date Selection -->
                    <div class="bg-white p-8 rounded-sm border border-zinc-200 shadow-sm">
                        <h4 class="text-xl font-bold text-zinc-900 mb-6">Tanggal Sewa</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="flex flex-col gap-2">
                                <label for="tgl_mulai"
                                    class="text-xs font-bold text-zinc-500 uppercase tracking-widest">Mulai</label>
                                <input type="date" name="tgl_mulai" id="tgl_mulai" required
                                    class="w-full border border-zinc-300 rounded-sm p-3 focus:outline-none focus:border-zinc-900 transition-colors"
                                    min="{{ date('Y-m-d') }}">
                            </div>
                            <div class="flex flex-col gap-2">
                                <label for="tgl_kembali"
                                    class="text-xs font-bold text-zinc-500 uppercase tracking-widest">Kembali</label>
                                <input type="date" name="tgl_kembali" id="tgl_kembali" required
                                    class="w-full border border-zinc-300 rounded-sm p-3 focus:outline-none focus:border-zinc-900 transition-colors"
                                    min="{{ date('Y-m-d') }}">
                            </div>
                        </div>
                        <p id="duration-display"
                            class="mt-4 text-sm font-bold text-zinc-900 bg-zinc-100 p-3 rounded-sm hidden">
                            Total Durasi: <span id="days-count">0</span> Hari
                        </p>
                    </div>

                    <!-- Additional Items -->
                    <div class="bg-white p-8 rounded-sm border border-zinc-200 shadow-sm">
                        <h4 class="text-xl font-bold text-zinc-900 mb-6">Item Tambahan</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach ($tambahan as $index => $item)
                                <div
                                    class="border border-zinc-200 rounded-sm p-4 flex gap-4 items-center group hover:border-zinc-900 transition-colors">
                                    <div class="w-16 h-16 bg-zinc-100 rounded-sm overflow-hidden flex-shrink-0">
                                        @if ($item->gambar_url)
                                            <img src="{{ $item->gambar_url }}" alt="{{ $item->nama_item }}"
                                                class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-zinc-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <rect width="18" height="18" x="3" y="3" rx="2"
                                                        ry="2" />
                                                    <circle cx="9" cy="9" r="2" />
                                                    <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21" />
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex-1">
                                        <h5 class="font-bold text-zinc-900 text-sm">{{ $item->nama_item }}</h5>
                                        <p class="text-[10px] text-zinc-500 mb-1">Stok: {{ $item->stok_total }}</p>
                                        <p class="text-xs font-bold text-zinc-900">IDR
                                            {{ number_format($item->harga_satuan, 0, ',', '.') }}</p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <input type="hidden" name="items[{{ $index }}][id]"
                                            value="{{ $item->id }}">
                                        <button type="button"
                                            class="w-6 h-6 rounded-full bg-zinc-100 text-zinc-900 hover:bg-zinc-200 font-bold flex items-center justify-center btn-minus text-xs"
                                            data-index="{{ $index }}">-</button>
                                        <input type="number" name="items[{{ $index }}][jumlah]" value="0"
                                            min="0" max="{{ $item->stok_total }}"
                                            class="w-10 text-center border-none focus:ring-0 p-0 font-bold text-zinc-900 text-sm item-qty"
                                            data-price="{{ $item->harga_satuan }}" readonly>
                                        <button type="button"
                                            class="w-6 h-6 rounded-full bg-zinc-900 text-white hover:bg-zinc-800 font-bold flex items-center justify-center btn-plus text-xs"
                                            data-index="{{ $index }}" data-max="{{ $item->stok_total }}">+</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Customer Summary -->
                    <div class="bg-white p-8 rounded-sm border border-zinc-200 shadow-sm">
                        <div class="flex items-center justify-between mb-6">
                            <h4 class="text-xl font-bold text-zinc-900">Data Penyewa</h4>
                            <a href="{{ route('profile') }}"
                                class="text-[10px] font-bold text-zinc-400 hover:text-zinc-900 transition-colors uppercase tracking-widest border-b border-zinc-200">Ubah
                                Profil</a>
                        </div>

                        @php
                            $user = Auth::guard('pelanggan')->user();
                        @endphp

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="space-y-1">
                                <span class="text-[10px] font-bold text-zinc-400 uppercase tracking-widest block">Nama
                                    Lengkap</span>
                                <p class="font-bold text-zinc-900">{{ $user->nama_lengkap }}</p>
                            </div>
                            <div class="space-y-1">
                                <span class="text-[10px] font-bold text-zinc-400 uppercase tracking-widest block">No.
                                    WhatsApp</span>
                                <p class="font-bold text-zinc-900">{{ $user->no_wa }}</p>
                            </div>
                            <div class="space-y-1">
                                <span class="text-[10px] font-bold text-zinc-400 uppercase tracking-widest block">No. KTP /
                                    SIM</span>
                                <p class="font-bold text-zinc-900">{{ $user->no_ktp_sim }}</p>
                            </div>
                        </div>
                        @if ($user->alamat_asal)
                            <div class="mt-6 pt-6 border-t border-zinc-100">
                                <span
                                    class="text-[10px] font-bold text-zinc-400 uppercase tracking-widest block mb-1">Alamat
                                    Asal</span>
                                <p class="text-sm text-zinc-600 leading-relaxed">{{ $user->alamat_asal }}</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Right Column: Order Summary (Sticky) -->
                <div class="w-full lg:w-1/3">
                    <div class="sticky top-24 bg-white p-8 rounded-sm border border-zinc-200 shadow-xl">
                        <h4 class="text-xl font-bold text-zinc-900 mb-6 pb-4 border-b border-zinc-100">Ringkasan Biaya</h4>

                        <div class="space-y-4 mb-6">
                            <!-- Motor Cost -->
                            <div class="flex justify-between text-sm">
                                <span class="text-zinc-600">Sewa Motor (x<span id="summary-days">0</span> hari)</span>
                                <span class="font-bold text-zinc-900">IDR <span id="summary-motor-total">0</span></span>
                            </div>

                            <!-- Items Cost -->
                            <div id="items-summary"
                                class="hidden space-y-2 border-t border-dashed border-zinc-200 pt-4 mt-4">
                                <!-- Dynamic Items will be appended here -->
                            </div>
                        </div>

                        <div class="flex justify-between items-center pt-6 border-t border-zinc-900 mb-8">
                            <span class="text-lg font-bold text-zinc-900">Total Biaya</span>
                            <span class="text-2xl font-bold text-zinc-900">IDR <span id="grand-total">0</span></span>
                        </div>

                        <button type="submit"
                            class="w-full py-4 bg-zinc-900 text-white font-bold rounded-sm hover:bg-zinc-800 transition-all shadow-lg hover:shadow-zinc-900/20 tracking-widest uppercase">
                            Konfirmasi Booking
                        </button>
                        <p class="text-[10px] text-center text-zinc-400 mt-4">Pembayaran dilakukan saat serah terima unit.
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const motorPrice = {{ $motor->harga_sewa_per_hari }};
                const tglMulai = document.getElementById('tgl_mulai');
                const tglKembali = document.getElementById('tgl_kembali');
                const daysCountSpan = document.getElementById('days-count');
                const durationDisplay = document.getElementById('duration-display');
                const summaryDaysSpan = document.getElementById('summary-days');
                const summaryMotorTotalSpan = document.getElementById('summary-motor-total');
                const itemsSummaryDiv = document.getElementById('items-summary');
                const grandTotalSpan = document.getElementById('grand-total');

                let totalDays = 0;
                let itemsCost = 0;

                function formatNumber(num) {
                    return new Intl.NumberFormat('id-ID').format(num);
                }

                function calculateDays() {
                    if (tglMulai.value) {
                        // Set min for tglKembali to tglMulai
                        tglKembali.min = tglMulai.value;
                    }

                    if (tglMulai.value && tglKembali.value) {
                        const start = new Date(tglMulai.value);
                        start.setHours(0, 0, 0, 0);
                        const end = new Date(tglKembali.value);
                        end.setHours(0, 0, 0, 0);

                        const submitBtn = document.querySelector('button[type="submit"]');

                        if (end >= start) {
                            const diffTime = Math.abs(end - start);
                            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                            totalDays = diffDays + 1;

                            daysCountSpan.textContent = totalDays;
                            durationDisplay.classList.remove('hidden');
                            durationDisplay.classList.remove('bg-red-50', 'text-red-600');
                            durationDisplay.classList.add('bg-zinc-100', 'text-zinc-900');

                            submitBtn.disabled = false;
                            submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');

                            updateSummary();
                        } else {
                            totalDays = 0;
                            daysCountSpan.textContent = "0";
                            durationDisplay.innerHTML =
                                `Total Durasi: <span class="text-red-600 font-bold">Tanggal kembali tidak boleh sebelum tanggal mulai!</span>`;
                            durationDisplay.classList.remove('hidden', 'bg-zinc-100', 'text-zinc-900');
                            durationDisplay.classList.add('bg-red-50', 'text-red-600');

                            submitBtn.disabled = true;
                            submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
                        }
                    }
                }

                function updateSummary() {
                    // Motor
                    const motorTotal = motorPrice * totalDays;
                    summaryDaysSpan.textContent = totalDays;
                    summaryMotorTotalSpan.textContent = formatNumber(motorTotal);

                    // Items
                    const qtyInputs = document.querySelectorAll('.item-qty');
                    itemsSummaryDiv.innerHTML = '';
                    let currentItemsCost = 0;

                    let hasItems = false;
                    qtyInputs.forEach(input => {
                        const qty = parseInt(input.value);
                        const price = parseFloat(input.getAttribute('data-price'));

                        if (qty > 0) {
                            hasItems = true;
                            // Assuming items are per day as well? 
                            // "harga sewa per hari" usually applies to equipment too.
                            // Let's calculate per day.
                            const subtotal = qty * price * (totalDays || 1);
                            // Fallback to 1 day for item cost Preview if date not selected yet? 
                            // No, strictly use totalDays. If 0 days, cost 0. 

                            currentItemsCost += subtotal;

                            const itemName = input.closest('.border').querySelector('h5').textContent;

                            const itemRow = document.createElement('div');
                            itemRow.className = 'flex justify-between text-xs text-zinc-500';
                            itemRow.innerHTML = `
                            <span>${itemName} x${qty} (${totalDays} hari)</span>
                            <span>IDR ${formatNumber(subtotal)}</span>
                        `;
                            itemsSummaryDiv.appendChild(itemRow);
                        }
                    });

                    if (hasItems) {
                        itemsSummaryDiv.classList.remove('hidden');
                    } else {
                        itemsSummaryDiv.classList.add('hidden');
                    }

                    // Grand Total
                    const grandTotal = motorTotal + currentItemsCost;
                    grandTotalSpan.textContent = formatNumber(grandTotal);
                }

                // Event Listeners Dates
                tglMulai.addEventListener('change', calculateDays);
                tglKembali.addEventListener('change', calculateDays);

                // Item Quantity Buttons
                document.querySelectorAll('.btn-plus').forEach(btn => {
                    btn.addEventListener('click', () => {
                        const index = btn.getAttribute('data-index');
                        const max = parseInt(btn.getAttribute('data-max'));
                        const input = document.querySelector(`input[name="items[${index}][jumlah]"]`);
                        let val = parseInt(input.value);
                        if (val < max) {
                            input.value = val + 1;
                            updateSummary();
                        }
                    });
                });

                document.querySelectorAll('.btn-minus').forEach(btn => {
                    btn.addEventListener('click', () => {
                        const index = btn.getAttribute('data-index');
                        const input = document.querySelector(`input[name="items[${index}][jumlah]"]`);
                        let val = parseInt(input.value);
                        if (val > 0) {
                            input.value = val - 1;
                            updateSummary();
                        }
                    });
                });

                // WA Validation
                const waInput = document.getElementById('no_wa');
                const submitBtn = document.querySelector('button[type="submit"]');

                waInput.addEventListener('input', () => {
                    const val = waInput.value;
                    if (val.length > 0 && !val.startsWith('08')) {
                        waInput.classList.add('border-red-500');
                        waInput.setCustomValidity('Nomor WhatsApp harus diawali dengan 08');
                    } else {
                        waInput.classList.remove('border-red-500');
                        waInput.setCustomValidity('');
                    }
                });

                // Initial call
                calculateDays();
            });
        </script>
    @endpush
@endsection
