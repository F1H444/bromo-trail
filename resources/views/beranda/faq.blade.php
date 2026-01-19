<section id="faq" class="py-24 bg-zinc-50">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-2xl mx-auto mb-20">
            <h2 class="text-sm font-bold text-zinc-400 uppercase tracking-widest mb-4">FAQ</h2>
            <h3 class="text-4xl font-bold tracking-tighter text-zinc-900 leading-tight">
                Pertanyaan yang Sering <br>
                Diajukan.
            </h3>
        </div>

        <div class="max-w-3xl mx-auto space-y-4">
            <!-- FAQ Item 1 -->
            <div class="bg-white border border-zinc-200 rounded-sm overflow-hidden">
                <button class="w-full px-8 py-6 text-left flex justify-between items-center group" onclick="toggleFaq(1)">
                    <span class="font-bold text-zinc-900">Apakah saya perlu SIM untuk menyewa motor trail?</span>
                    <svg id="icon-1" class="w-5 h-5 text-zinc-400 group-hover:text-zinc-900 transition-transform"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="ans-1" class="hidden px-8 pb-6 text-zinc-600 text-sm leading-relaxed">
                    Ya, Anda memerlukan SIM C yang berlaku untuk menyewa motor trail kami. Untuk warga negara asing, SIM
                    Internasional sangat disarankan sesuai peraturan di Indonesia.
                </div>
            </div>

            <!-- FAQ Item 2 -->
            <div class="bg-white border border-zinc-200 rounded-sm overflow-hidden">
                <button class="w-full px-8 py-6 text-left flex justify-between items-center group"
                    onclick="toggleFaq(2)">
                    <span class="font-bold text-zinc-900">Apa saja yang termasuk dalam biaya sewa?</span>
                    <svg id="icon-2" class="w-5 h-5 text-zinc-400 group-hover:text-zinc-900 transition-transform"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="ans-2" class="hidden px-8 pb-6 text-zinc-600 text-sm leading-relaxed">
                    Setiap penyewaan sudah termasuk helm premium, pelindung dada, siku, dan lutut. Kami juga menyediakan
                    asuransi dasar dan dukungan teknis 24/7 di area Gunung Bromo.
                </div>
            </div>

            <!-- FAQ Item 3 -->
            <div class="bg-white border border-zinc-200 rounded-sm overflow-hidden">
                <button class="w-full px-8 py-6 text-left flex justify-between items-center group"
                    onclick="toggleFaq(3)">
                    <span class="font-bold text-zinc-900">Apakah ada batasan area berkendara?</span>
                    <svg id="icon-3" class="w-5 h-5 text-zinc-400 group-hover:text-zinc-900 transition-transform"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="ans-3" class="hidden px-8 pb-6 text-zinc-600 text-sm leading-relaxed">
                    Area utama adalah Kompleks Taman Nasional Bromo Tengger Semeru. Kami melarang membawa motor ke luar
                    area yang telah ditentukan tanpa izin khusus untuk menjaga performa mesin dan keselamatan.
                </div>
            </div>

            <!-- FAQ Item 4 -->
            <div class="bg-white border border-zinc-200 rounded-sm overflow-hidden">
                <button class="w-full px-8 py-6 text-left flex justify-between items-center group"
                    onclick="toggleFaq(4)">
                    <span class="font-bold text-zinc-900">Bagaimana jika motor mengalami masalah mekanis?</span>
                    <svg id="icon-4" class="w-5 h-5 text-zinc-400 group-hover:text-zinc-900 transition-transform"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="ans-4" class="hidden px-8 pb-6 text-zinc-600 text-sm leading-relaxed">
                    Hubungi nomor darurat kami yang tertera pada motor. Tim rescue kami akan datang ke lokasi Anda
                    secepat mungkin untuk melakukan perbaikan di tempat atau mengganti unit motor jika diperlukan.
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function toggleFaq(id) {
        const ans = document.getElementById('ans-' + id);
        const icon = document.getElementById('icon-' + id);

        if (ans.classList.contains('hidden')) {
            ans.classList.remove('hidden');
            icon.classList.add('rotate-180');
        } else {
            ans.classList.add('hidden');
            icon.classList.remove('rotate-180');
        }
    }
</script>
