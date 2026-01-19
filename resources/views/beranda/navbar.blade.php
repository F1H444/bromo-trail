<nav class="fixed top-0 left-0 w-full z-50 transition-all duration-300 bg-white/80 backdrop-blur-md border-b border-zinc-100"
    id="navbar">
    <div class="container mx-auto px-6 h-20 flex items-center justify-between">
        <a href="{{ url('/') }}" class="text-xl font-bold tracking-tighter text-zinc-900 flex items-center gap-3">
            <img src="{{ asset('images/logo.png') }}" alt="Bromotrail Logo" class="w-10 h-10 object-contain">
            BROMOTRAIL
        </a>

        <!-- Desktop Menu -->
        <div class="hidden md:flex items-center gap-8">
            <a href="{{ url('/') }}"
                class="text-sm font-medium {{ Request::is('/') ? 'text-zinc-900' : 'text-zinc-600' }} hover:text-zinc-900 transition-colors">Beranda</a>
            <a href="{{ url('/tentang') }}"
                class="text-sm font-medium {{ Request::is('tentang') ? 'text-zinc-900' : 'text-zinc-600' }} hover:text-zinc-900 transition-colors">Tentang
                Kami</a>
            <a href="{{ url('/motor') }}"
                class="text-sm font-medium {{ Request::is('motor') ? 'text-zinc-900' : 'text-zinc-600' }} hover:text-zinc-900 transition-colors">Motor</a>
            <a href="{{ url('/cara-sewa') }}"
                class="text-sm font-medium {{ Request::is('cara-sewa') ? 'text-zinc-900' : 'text-zinc-600' }} hover:text-zinc-900 transition-colors">Cara
                Sewa</a>
            <a href="{{ url('/spot-foto') }}"
                class="text-sm font-medium {{ Request::is('spot-foto') ? 'text-zinc-900' : 'text-zinc-600' }} hover:text-zinc-900 transition-colors">Spot
                Foto</a>
            <a href="{{ url('/kontak') }}"
                class="text-sm font-medium {{ Request::is('kontak') ? 'text-zinc-900' : 'text-zinc-600' }} hover:text-zinc-900 transition-colors">Kontak</a>
        </div>

        <!-- Desktop Auth Buttons -->
        <div class="hidden md:flex items-center gap-4">
            @auth('pelanggan')
                <div class="flex items-center gap-6 pl-6 border-l border-zinc-100">
                    <a href="{{ url('/dashboard') }}" class="flex items-center gap-3 group">
                        <div class="text-right hidden lg:block">
                            <span
                                class="block text-[10px] font-black uppercase tracking-widest text-zinc-400 group-hover:text-zinc-900 transition-colors">Selamat
                                Datang</span>
                            <span
                                class="block text-xs font-bold text-zinc-900">{{ explode(' ', Auth::guard('pelanggan')->user()->nama_lengkap)[0] }}</span>
                        </div>
                        <div
                            class="w-10 h-10 bg-zinc-900 text-white rounded-sm flex items-center justify-center font-bold text-sm shadow-lg group-hover:scale-105 transition-all">
                            {{ substr(Auth::guard('pelanggan')->user()->nama_lengkap, 0, 1) }}
                        </div>
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-zinc-400 hover:text-red-600 transition-all" title="Keluar">
                            <i class="fa-solid fa-right-from-bracket text-xs"></i>
                        </button>
                    </form>
                </div>
            @else
                <div class="flex items-center gap-2">
                    <a href="{{ route('login') }}"
                        class="px-5 py-2.5 text-xs font-black uppercase tracking-widest text-zinc-900 hover:text-zinc-600 transition-all">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}"
                        class="px-6 py-2.5 bg-zinc-900 text-white text-xs font-black uppercase tracking-widest rounded-sm hover:bg-zinc-800 transition-all shadow-xl hover:shadow-zinc-900/20">
                        Daftar
                    </a>
                </div>
            @endauth
        </div>

        <!-- Mobile Menu Button -->
        <button id="mobile-menu-button" class="md:hidden w-10 h-10 flex items-center justify-center text-zinc-900">
            <i class="fa-solid fa-bars text-xl"></i>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-zinc-100">
        <div class="container mx-auto px-6 py-6 space-y-4">
            <a href="{{ url('/') }}"
                class="block py-3 text-sm font-medium {{ Request::is('/') ? 'text-zinc-900' : 'text-zinc-600' }} hover:text-zinc-900 transition-colors border-b border-zinc-100">
                Beranda
            </a>
            <a href="{{ url('/tentang') }}"
                class="block py-3 text-sm font-medium {{ Request::is('tentang') ? 'text-zinc-900' : 'text-zinc-600' }} hover:text-zinc-900 transition-colors border-b border-zinc-100">
                Tentang Kami
            </a>
            <a href="{{ url('/motor') }}"
                class="block py-3 text-sm font-medium {{ Request::is('motor') ? 'text-zinc-900' : 'text-zinc-600' }} hover:text-zinc-900 transition-colors border-b border-zinc-100">
                Motor
            </a>
            <a href="{{ url('/cara-sewa') }}"
                class="block py-3 text-sm font-medium {{ Request::is('cara-sewa') ? 'text-zinc-900' : 'text-zinc-600' }} hover:text-zinc-900 transition-colors border-b border-zinc-100">
                Cara Sewa
            </a>
            <a href="{{ url('/spot-foto') }}"
                class="block py-3 text-sm font-medium {{ Request::is('spot-foto') ? 'text-zinc-900' : 'text-zinc-600' }} hover:text-zinc-900 transition-colors border-b border-zinc-100">
                Spot Foto
            </a>
            <a href="{{ url('/kontak') }}"
                class="block py-3 text-sm font-medium {{ Request::is('kontak') ? 'text-zinc-900' : 'text-zinc-600' }} hover:text-zinc-900 transition-colors border-b border-zinc-100">
                Kontak
            </a>

            @auth('pelanggan')
                <a href="{{ url('/dashboard') }}"
                    class="block py-3 text-sm font-medium text-zinc-600 hover:text-zinc-900 transition-colors border-b border-zinc-100">
                    Dashboard
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="w-full text-left py-3 text-sm font-medium text-red-600 hover:text-red-700 transition-colors">
                        Keluar
                    </button>
                </form>
            @else
                <div class="pt-4 space-y-3">
                    <a href="{{ route('login') }}"
                        class="block w-full py-3 text-center text-xs font-black uppercase tracking-widest text-zinc-900 border border-zinc-200 rounded-sm hover:bg-zinc-50 transition-all">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}"
                        class="block w-full py-3 text-center bg-zinc-900 text-white text-xs font-black uppercase tracking-widest rounded-sm hover:bg-zinc-800 transition-all">
                        Daftar
                    </a>
                </div>
            @endauth
        </div>
    </div>
</nav>

<script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobile-menu');
        const icon = this.querySelector('i');

        mobileMenu.classList.toggle('hidden');

        if (mobileMenu.classList.contains('hidden')) {
            icon.classList.remove('fa-times');
            icon.classList.add('fa-bars');
        } else {
            icon.classList.remove('fa-bars');
            icon.classList.add('fa-times');
        }
    });
</script>
