<!-- Sidebar Component -->
<aside id="user-sidebar"
    class="w-64 bg-zinc-900 text-white flex flex-col flex-shrink-0 fixed md:static h-full z-40 -translate-x-full md:translate-x-0 transition-transform duration-300">
    <!-- Mobile Close Button -->
    <button id="close-sidebar"
        class="md:hidden absolute top-4 right-4 w-8 h-8 flex items-center justify-center text-zinc-400 hover:text-white">
        <i class="fa-solid fa-times"></i>
    </button>

    <!-- Logo -->
    <div class="p-6 border-b border-zinc-800">
        <a href="{{ url('/') }}" class="flex items-center gap-3">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-10 h-10 object-contain">
            <div>
                <h1 class="text-xl font-black tracking-tighter uppercase">BROMOTRAIL</h1>
                <p class="text-[10px] text-zinc-400 uppercase tracking-widest">Dashboard</p>
            </div>
        </a>
    </div>

    <!-- User Info -->
    <div class="p-6 border-b border-zinc-800">
        <div class="flex items-center gap-3">
            <div class="w-12 h-12 bg-zinc-700 rounded-sm flex items-center justify-center text-lg font-bold">
                {{ substr(Auth::guard('pelanggan')->user()->nama_lengkap, 0, 1) }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-[10px] text-zinc-400 uppercase tracking-widest">Halo,</p>
                <p class="font-bold text-sm truncate">
                    {{ explode(' ', Auth::guard('pelanggan')->user()->nama_lengkap)[0] }}</p>
            </div>
        </div>
    </div>

    <!-- Navigation Menu -->
    <nav class="flex-1 p-4 space-y-2 overflow-y-auto">
        <a href="{{ route('dashboard') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-sm transition-all {{ Request::is('dashboard') && !Request::is('dashboard/*') ? 'bg-white text-zinc-900 font-bold' : 'text-zinc-300 hover:bg-zinc-800 hover:text-white' }}">
            <i class="fa-solid fa-chart-line w-5 text-center"></i>
            <span class="text-sm uppercase tracking-wider">Dashboard</span>
        </a>

        <a href="{{ route('dashboard.bookings') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-sm transition-all {{ Request::is('dashboard/bookings') ? 'bg-white text-zinc-900 font-bold' : 'text-zinc-300 hover:bg-zinc-800 hover:text-white' }}">
            <i class="fa-solid fa-clock-rotate-left w-5 text-center"></i>
            <span class="text-sm uppercase tracking-wider">Riwayat Sewa</span>
        </a>

        <a href="{{ route('profile') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-sm transition-all {{ Request::is('profile') ? 'bg-white text-zinc-900 font-bold' : 'text-zinc-300 hover:bg-zinc-800 hover:text-white' }}">
            <i class="fa-solid fa-user w-5 text-center"></i>
            <span class="text-sm uppercase tracking-wider">Profil</span>
        </a>
    </nav>

    <!-- Bottom Actions -->
    <div class="p-4 border-t border-zinc-800 space-y-2">
        <a href="{{ url('/') }}"
            class="flex items-center gap-3 px-4 py-3 bg-yellow-500 text-zinc-900 rounded-sm hover:bg-yellow-400 transition-all font-bold">
            <i class="fa-solid fa-house w-5 text-center"></i>
            <span class="text-sm uppercase tracking-wider">Beranda</span>
        </a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="w-full flex items-center gap-3 px-4 py-3 bg-red-600 text-white rounded-sm hover:bg-red-700 transition-all font-bold">
                <i class="fa-solid fa-right-from-bracket w-5 text-center"></i>
                <span class="text-sm uppercase tracking-wider">Keluar</span>
            </button>
        </form>
    </div>
</aside>

<script>
    // Close sidebar on mobile
    document.getElementById('close-sidebar')?.addEventListener('click', () => {
        document.getElementById('user-sidebar').classList.add('-translate-x-full');
        document.getElementById('mobile-overlay').classList.add('hidden');
    });
</script>
