<!-- Admin Sidebar -->
<aside id="admin-sidebar"
    class="w-64 bg-zinc-900 text-white flex flex-col flex-shrink-0 fixed md:static h-full z-40 -translate-x-full md:translate-x-0 transition-transform duration-300">
    <!-- Mobile Close Button -->
    <button id="close-sidebar"
        class="md:hidden absolute top-4 right-4 w-8 h-8 flex items-center justify-center text-zinc-400 hover:text-white">
        <i class="fa-solid fa-times"></i>
    </button>

    <!-- Logo -->
    <div class="p-6 border-b border-zinc-800">
        <div class="flex items-center gap-3">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-10 h-10 object-contain">
            <div>
                <h1 class="text-xl font-black tracking-tighter uppercase">BROMOTRAIL</h1>
                <p class="text-[10px] text-zinc-400 uppercase tracking-widest">Admin Panel</p>
            </div>
        </div>
    </div>

    <!-- Admin Info -->
    <div class="p-6 border-b border-zinc-800">
        <div class="flex items-center gap-3">
            <div class="w-12 h-12 bg-zinc-700 rounded-sm flex items-center justify-center text-lg font-bold">
                {{ substr(Auth::guard('admin')->user()->nama, 0, 1) }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-[10px] text-zinc-400 uppercase tracking-widest">Admin</p>
                <p class="font-bold text-sm truncate">{{ Auth::guard('admin')->user()->nama }}</p>
            </div>
        </div>
    </div>

    <!-- Navigation Menu -->
    <nav class="flex-1 p-4 space-y-2 overflow-y-auto">
        <a href="{{ url('/admin/dashboard') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-sm transition-all {{ Request::is('admin/dashboard') ? 'bg-white text-zinc-900 font-bold' : 'text-zinc-300 hover:bg-zinc-800 hover:text-white' }}">
            <i class="fa-solid fa-chart-line w-5 text-center"></i>
            <span class="text-sm uppercase tracking-wider">Dashboard</span>
        </a>

        <a href="{{ url('/admin/motor') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-sm transition-all {{ Request::is('admin/motor*') ? 'bg-white text-zinc-900 font-bold' : 'text-zinc-300 hover:bg-zinc-800 hover:text-white' }}">
            <i class="fa-solid fa-motorcycle w-5 text-center"></i>
            <span class="text-sm uppercase tracking-wider">Kelola Motor</span>
        </a>

        <a href="{{ url('/admin/tambahan') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-sm transition-all {{ Request::is('admin/tambahan*') ? 'bg-white text-zinc-900 font-bold' : 'text-zinc-300 hover:bg-zinc-800 hover:text-white' }}">
            <i class="fa-solid fa-box w-5 text-center"></i>
            <span class="text-sm uppercase tracking-wider">Item Tambahan</span>
        </a>

        <a href="{{ url('/admin/penyewaan') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-sm transition-all {{ Request::is('admin/penyewaan*') ? 'bg-white text-zinc-900 font-bold' : 'text-zinc-300 hover:bg-zinc-800 hover:text-white' }}">
            <i class="fa-solid fa-calendar-check w-5 text-center"></i>
            <span class="text-sm uppercase tracking-wider">Penyewaan</span>
        </a>

        <a href="{{ url('/admin/pembayaran') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-sm transition-all {{ Request::is('admin/pembayaran*') ? 'bg-white text-zinc-900 font-bold' : 'text-zinc-300 hover:bg-zinc-800 hover:text-white' }}">
            <i class="fa-solid fa-money-bill-wave w-5 text-center"></i>
            <span class="text-sm uppercase tracking-wider">Pembayaran</span>
        </a>

        <a href="{{ url('/admin/cek-kondisi') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-sm transition-all {{ Request::is('admin/cek-kondisi*') ? 'bg-white text-zinc-900 font-bold' : 'text-zinc-300 hover:bg-zinc-800 hover:text-white' }}">
            <i class="fa-solid fa-clipboard-check w-5 text-center"></i>
            <span class="text-sm uppercase tracking-wider">Cek Kondisi</span>
        </a>

        <a href="{{ url('/admin/laporan') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-sm transition-all {{ Request::is('admin/laporan*') ? 'bg-white text-zinc-900 font-bold' : 'text-zinc-300 hover:bg-zinc-800 hover:text-white' }}">
            <i class="fa-solid fa-file-chart-line w-5 text-center"></i>
            <span class="text-sm uppercase tracking-wider">Laporan</span>
        </a>
    </nav>

    <!-- Bottom Actions -->
    <div class="p-4 border-t border-zinc-800 space-y-2">
        <a href="{{ url('/') }}" target="_blank"
            class="flex items-center gap-3 px-4 py-3 bg-zinc-800 text-white rounded-sm hover:bg-zinc-700 transition-all font-bold">
            <i class="fa-solid fa-external-link w-5 text-center"></i>
            <span class="text-sm uppercase tracking-wider">Lihat Website</span>
        </a>

        <form action="{{ url('/admin/logout') }}" method="POST">
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
        document.getElementById('admin-sidebar').classList.add('-translate-x-full');
        document.getElementById('mobile-overlay').classList.add('hidden');
    });
</script>
