<section id="hero" class="relative min-h-[90vh] flex items-center pt-20 overflow-hidden bg-[#FAFAFA]">
    <div class="container mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center relative z-10">
        <div class="space-y-8" id="hero-content">
            <div
                class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-zinc-900/5 border border-zinc-900/10 text-xs font-semibold tracking-widest text-zinc-900 uppercase">
                Sewa Trail Gak Pake Ribet
            </div>
            <h1 class="text-5xl md:text-7xl font-bold tracking-tighter leading-[0.9] text-zinc-900">
                Gaspol di <br>
                <span class="text-zinc-400">Pasir Bromo!</span>
            </h1>
            <p class="text-lg text-zinc-600 max-w-md leading-relaxed">
                Rasain serunya riding di laut pasir Bromo pake motor trail yang mantap.
                Gak peduli kamu udah pro atau baru coba-coba, kita siapin unit terbaik buat kamu.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 pt-4">
                <a href="#motorcycles"
                    class="px-8 py-4 bg-zinc-900 text-white text-xs font-bold rounded-sm hover:bg-zinc-800 transition-all shadow-xl hover:shadow-zinc-900/20 text-center tracking-widest uppercase">
                    LIHAT MOTOR TRAIL
                </a>
                <a href="#how-it-works"
                    class="px-8 py-4 bg-white border border-zinc-200 text-zinc-900 text-xs font-bold rounded-sm hover:bg-zinc-50 transition-all text-center tracking-widest uppercase">
                    CARA SEWA
                </a>
            </div>

            <!-- Enhanced Stats -->
            <div class="grid grid-cols-3 gap-8 pt-12 border-t border-zinc-100">
                <div>
                    <span class="block text-2xl font-bold text-zinc-900">1.2k+</span>
                    <span class="text-[10px] text-zinc-500 font-bold uppercase tracking-widest leading-tight">Rider
                        <br> Puas</span>
                </div>
                <div>
                    <span class="block text-2xl font-bold text-zinc-900">50km+</span>
                    <span class="text-[10px] text-zinc-500 font-bold uppercase tracking-widest leading-tight">Rute <br>
                        Jelajah</span>
                </div>
                <div>
                    <span class="block text-2xl font-bold text-zinc-900">4.9/5</span>
                    <span class="text-[10px] text-zinc-500 font-bold uppercase tracking-widest leading-tight">Rating
                        <br> Bintang</span>
                </div>
            </div>
        </div>

        <div class="relative flex justify-center lg:justify-end" id="hero-image">
            <div class="relative w-full max-w-xl aspect-square group">
                <div
                    class="absolute -inset-4 bg-zinc-900/5 rounded-2xl group-hover:bg-zinc-900/10 transition-colors duration-500">
                </div>
                <img src="hero-img.png" alt="Motor Trail di Gunung Bromo"
                    class="relative rounded-sm shadow-2xl w-full h-full object-cover">

                <div
                    class="absolute top-8 -left-8 w-40 bg-white p-4 shadow-2xl rounded-sm hidden xl:block border border-zinc-100">
                    <div class="space-y-2">
                        <div class="flex gap-1">
                            @for ($i = 0; $i < 5; $i++)
                                <svg class="w-2.5 h-2.5 text-yellow-500 fill-current" viewBox="0 0 20 20">
                                    <path
                                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                </svg>
                            @endfor
                        </div>
                        <p class="text-[9px] font-medium text-zinc-600 leading-tight">
                            "Sumpah seru banget! Motornya enak dipake, gak ada kendala sama sekali pas di pasir."
                        </p>
                        <p class="text-[8px] font-bold text-zinc-900 uppercase tracking-widest">— Alex Rivera</p>
                    </div>
                </div>

                <div class="absolute -bottom-4 -right-4 w-28 h-28 bg-zinc-900 p-4 shadow-xl rounded-sm hidden lg:block">
                    <div
                        class="w-full h-full border border-dashed border-zinc-700 flex flex-col items-center justify-center text-center">
                        <span class="text-xl font-bold text-white">24/7</span>
                        <span class="text-[9px] text-zinc-400 font-bold tracking-widest uppercase">Bantuan</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Background element -->
    <div class="absolute top-0 right-0 w-1/3 h-full bg-zinc-100/50 -z-0 hidden lg:block"></div>
</section>
