<section id="features" class="py-24 bg-white">
    <div class="container mx-auto px-6">
        <div class="max-w-3xl mb-16" id="features-header">
            <h2 class="text-sm font-bold text-zinc-400 uppercase tracking-widest mb-4">Tentang Bromotrail</h2>
            <h3 class="text-4xl font-bold tracking-tighter text-zinc-900 leading-tight">
                Dirancang untuk Performa. <br>
                Didedikasikan untuk Keselamatan Anda.
            </h3>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-16">
            <!-- Feature 1 -->
            <div class="space-y-6 feature-card group">
                <div
                    class="w-14 h-14 bg-zinc-900 flex items-center justify-center text-white rounded-sm group-hover:bg-zinc-800 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path
                            d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z" />
                    </svg>
                </div>
                <div class="space-y-3">
                    <h4 class="text-xl font-bold tracking-tight text-zinc-900">Perawatan Ahli</h4>
                    <p class="text-zinc-600 leading-relaxed text-sm">
                        Motor Trail kami diperiksa dan dirawat dengan teliti oleh mekanik motor trail bersertifikat
                        setiap
                        selesai perjalanan.
                    </p>
                </div>
            </div>

            <!-- Feature 2 -->
            <div class="space-y-6 feature-card group">
                <div
                    class="w-14 h-14 bg-zinc-900 flex items-center justify-center text-white rounded-sm group-hover:bg-zinc-800 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                    </svg>
                </div>
                <div class="space-y-3">
                    <h4 class="text-xl font-bold tracking-tight text-zinc-900">Perlengkapan Keselamatan</h4>
                    <p class="text-zinc-600 leading-relaxed text-sm">
                        Keselamatan adalah prioritas. Setiap penyewaan mencakup helm bersertifikat DOT, pelindung dada,
                        dan pelindung sendi.
                    </p>
                </div>
            </div>

            <!-- Feature 3 -->
            <div class="space-y-6 feature-card group">
                <div
                    class="w-14 h-14 bg-zinc-900 flex items-center justify-center text-white rounded-sm group-hover:bg-zinc-800 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M16 8l-8 8" />
                        <path d="M8 8l8 8" />
                    </svg>
                </div>
                <div class="space-y-3">
                    <h4 class="text-xl font-bold tracking-tight text-zinc-900">Dukungan 24/7</h4>
                    <p class="text-zinc-600 leading-relaxed text-sm">
                        Tim penyelamat kami selalu siaga. Jika Anda mengalami masalah mekanis di lautan pasir, kami
                        hanya sejauh panggilan telepon.
                    </p>
                </div>
            </div>

            @if (!isset($limit))
                <!-- Feature 4 -->
                <div class="space-y-6 feature-card group">
                    <div
                        class="w-14 h-14 bg-zinc-900 flex items-center justify-center text-white rounded-sm group-hover:bg-zinc-800 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                            <circle cx="12" cy="10" r="3" />
                        </svg>
                    </div>
                    <div class="space-y-3">
                        <h4 class="text-xl font-bold tracking-tight text-zinc-900">Keahlian Lokal</h4>
                        <p class="text-zinc-600 leading-relaxed text-sm">
                            Dapatkan akses ke rute rahasia yang hanya diketahui warga lokal. Kami menyediakan rute GPS
                            khusus melampaui jalur turis biasa.
                        </p>
                    </div>
                </div>

                <!-- Feature 5 -->
                <div class="space-y-6 feature-card group">
                    <div
                        class="w-14 h-14 bg-zinc-900 flex items-center justify-center text-white rounded-sm group-hover:bg-zinc-800 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                        </svg>
                    </div>
                    <div class="space-y-3">
                        <h4 class="text-xl font-bold tracking-tight text-zinc-900">Termasuk Asuransi</h4>
                        <p class="text-zinc-600 leading-relaxed text-sm">
                            Berkendara dengan tenang. Semua penyewaan kami sudah termasuk perlindungan asuransi dasar
                            untuk
                            pengendara dan motor.
                        </p>
                    </div>
                </div>

                <!-- Feature 6 -->
                <div class="space-y-6 feature-card group">
                    <div
                        class="w-14 h-14 bg-zinc-900 flex items-center justify-center text-white rounded-sm group-hover:bg-zinc-800 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <rect x="2" y="7" width="20" height="14" rx="2" ry="2" />
                            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" />
                        </svg>
                    </div>
                    <div class="space-y-3">
                        <h4 class="text-xl font-bold tracking-tight text-zinc-900">Basecamp Utama</h4>
                        <p class="text-zinc-600 leading-relaxed text-sm">
                            Basecamp premium kami di Cemoro Lawang menawarkan shower air panas, loker, dan area santai
                            setelah berkendara seharian.
                        </p>
                    </div>
                </div>
            @endif
        </div>

        @if (isset($limit))
            <div class="mt-16 text-center">
                <a href="{{ url('/tentang') }}"
                    class="inline-block px-8 py-4 bg-zinc-900 text-white text-xs font-bold rounded-sm hover:bg-zinc-800 transition-colors tracking-widest uppercase">
                    Selengkapnya Tentang Kami
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" class="inline-block ml-2 -mt-1">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
        @endif
    </div>
</section>
