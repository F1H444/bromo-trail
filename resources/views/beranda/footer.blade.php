<footer class="py-20 bg-zinc-900 text-white">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
            <div class="col-span-1 md:col-span-1 space-y-6">
                <a href="/" class="text-xl font-bold tracking-tighter text-white flex items-center gap-2">
                    <span
                        class="w-8 h-8 bg-white rounded-sm flex items-center justify-center text-zinc-900 text-xs text-center">BT</span>
                    BROMOTRAIL
                </a>
                <p class="text-zinc-500 text-sm leading-relaxed">
                    Layanan sewa motor trail premium untuk lanskap vulkanik Gunung Bromo. Didirikan atas dasar gairah,
                    dirawat dengan presisi.
                </p>
                <a href="https://www.instagram.com/bromotrail" target="_blank"
                    class="w-10 h-10 border border-zinc-800 flex items-center justify-center rounded-sm hover:bg-white hover:text-zinc-900 transition-all">
                    <i class="fa-brands fa-instagram"></i>
                </a>
                <a href="https://www.facebook.com/bromotrail" target="_blank"
                    class="w-10 h-10 border border-zinc-800 flex items-center justify-center rounded-sm hover:bg-white hover:text-zinc-900 transition-all">
                    <i class="fa-brands fa-facebook"></i>
                </a>
                <a href="https://www.tiktok.com/@bromotrail" target="_blank"
                    class="w-10 h-10 border border-zinc-800 flex items-center justify-center rounded-sm hover:bg-white hover:text-zinc-900 transition-all">
                    <i class="fa-brands fa-tiktok"></i>
                </a>
            </div>

            <div class="space-y-6">
                <h5 class="text-xs font-bold text-white uppercase tracking-widest">Pengalaman</h5>
                <ul class="space-y-4">
                    <li><a href="{{ url('/motor') }}"
                            class="text-zinc-500 hover:text-white transition-colors text-sm">Motor</a></li>
                    <li><a href="{{ url('/spot-foto') }}"
                            class="text-zinc-500 hover:text-white transition-colors text-sm">Spot Foto</a></li>
                    <li><a href="{{ url('/cara-sewa') }}"
                            class="text-zinc-500 hover:text-white transition-colors text-sm">Cara Sewa</a></li>
                    <li><a href="{{ url('/tentang') }}"
                            class="text-zinc-500 hover:text-white transition-colors text-sm">Tentang Kami</a></li>
                </ul>
            </div>

            <div class="space-y-6">
                <h5 class="text-xs font-bold text-white uppercase tracking-widest">Kontak</h5>
                <ul class="space-y-4">
                    <li>
                        <a href="https://wa.me/6282128573839" target="_blank"
                            class="text-zinc-500 hover:text-white transition-colors text-sm flex items-center gap-2">
                            <i class="fa-brands fa-whatsapp"></i>
                            +62 821-2857-3839
                        </a>
                    </li>
                    <li>
                        <a href="mailto:info@bromotrail.com"
                            class="text-zinc-500 hover:text-white transition-colors text-sm flex items-center gap-2">
                            <i class="fa-solid fa-envelope"></i>
                            info@bromotrail.com
                        </a>
                    </li>
                    <li>
                        <p class="text-zinc-500 text-sm flex items-start gap-2">
                            <i class="fa-solid fa-location-dot mt-1"></i>
                            <span>Jl. Raya Bromo No. 123<br>Cemoro Lawang, Probolinggo</span>
                        </p>
                    </li>
                    <li>
                        <a href="{{ url('/kontak') }}"
                            class="text-zinc-500 hover:text-white transition-colors text-sm flex items-center gap-2">
                            <i class="fa-solid fa-paper-plane"></i>
                            Hubungi Kami
                        </a>
                    </li>
                </ul>
            </div>

            <div class="space-y-8">
                <div class="space-y-4">
                    <h5 class="text-xs font-bold text-white uppercase tracking-widest">Berlangganan</h5>
                    <p class="text-zinc-500 text-sm leading-relaxed">Dapatkan info eksklusif mengenai promo dan kondisi
                        jalur Bromo terbaru langsung di email Anda.</p>
                </div>
                <form class="flex">
                    <input type="email" placeholder="Alamat Email"
                        class="w-full bg-zinc-800 border-none text-sm px-4 py-3 text-white focus:ring-1 focus:ring-zinc-700">
                    <button
                        class="bg-white text-zinc-900 px-4 flex items-center justify-center hover:bg-zinc-200 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <line x1="22" y1="2" x2="11" y2="13" />
                            <polygon points="22 2 15 22 11 13 2 9 22 2" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>

        <div class="pt-8 border-t border-zinc-800 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-zinc-500 text-xs">
                &copy; {{ date('Y') }} BROMOTRAIL. Seluruh hak cipta dilindungi. Dibangun untuk para antusias.
            </p>
            <div class="flex gap-8">
                <a href="#"
                    class="text-zinc-500 hover:text-white transition-colors text-[10px] font-medium uppercase tracking-widest">Kebijakan
                    Privasi</a>
                <a href="#"
                    class="text-zinc-500 hover:text-white transition-colors text-[10px] font-medium uppercase tracking-widest">Syarat
                    & Ketentuan</a>
            </div>
        </div>
    </div>
</footer>
