@extends('layouts.admin')

@section('title', 'Kelola Data Motor')

@section('content')
    <div class="p-4 md:p-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 md:gap-0 mb-8">
            <div>
                <h1 class="text-3xl font-black text-zinc-900 tracking-tighter uppercase italic">Data Motor</h1>
                <p class="text-zinc-500 mt-1">Kelola motor Bromotrail.</p>
            </div>
            <a href="{{ route('motor.create') }}"
                class="w-full md:w-auto bg-zinc-900 text-white px-6 py-3 rounded-sm font-bold uppercase tracking-wider hover:bg-zinc-800 transition text-center">
                <i class="fa-solid fa-plus mr-2"></i> Tambah Motor
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                <p class="font-bold">Berhasil!</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        {{-- Desktop View --}}
        <div class="hidden md:block bg-white border border-zinc-200 rounded-sm shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-zinc-50 border-b border-zinc-200">
                            <th class="py-4 px-4 font-bold text-zinc-500 uppercase text-xs tracking-wider text-center w-24">
                                Foto</th>
                            <th class="py-4 px-4 font-bold text-zinc-500 uppercase text-xs tracking-wider text-left w-64">
                                Nama &
                                Tipe</th>
                            <th class="py-4 px-4 font-bold text-zinc-500 uppercase text-xs tracking-wider text-right">
                                Harga/Hari</th>
                            <th class="py-4 px-4 font-bold text-zinc-500 uppercase text-xs tracking-wider text-center">
                                Status</th>
                            <th class="py-4 px-4 font-bold text-zinc-500 uppercase text-xs tracking-wider text-right">Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($motors as $motor)
                            <tr class="border-b border-zinc-100 hover:bg-zinc-50 transition">
                                <td class="py-4 px-4 text-center">
                                    <div
                                        class="w-16 h-16 bg-zinc-100 rounded-md overflow-hidden flex items-center justify-center mx-auto">
                                        @if ($motor->gambar_url)
                                            <img src="{{ $motor->gambar_url }}" alt="{{ $motor->nama_motor }}"
                                                class="w-full h-full object-cover">
                                        @else
                                            <i class="fa-solid fa-motorcycle text-zinc-300"></i>
                                        @endif
                                    </div>
                                </td>
                                <td class="py-4 px-4">
                                    <h3 class="font-bold text-zinc-900">{{ $motor->merk_tipe }}</h3>
                                    <p class="text-sm text-zinc-500">{{ $motor->plat_nomor }}</p>
                                </td>
                                <td class="py-4 px-4 font-mono text-sm text-right">
                                    IDR {{ number_format($motor->harga_sewa_per_hari, 0, ',', '.') }}
                                </td>
                                <td class="py-4 px-4 text-center">
                                    <span
                                        class="px-2 py-1 text-[10px] font-black uppercase tracking-wider rounded-full 
                                    {{ $motor->status_motor == 'Tersedia' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                        {{ $motor->status_motor }}
                                    </span>
                                </td>
                                <td class="py-4 px-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('motor.edit', $motor) }}"
                                            class="w-8 h-8 flex items-center justify-center bg-blue-50 text-blue-600 rounded hover:bg-blue-100 transition">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <button
                                            onclick="openDeleteModal('{{ route('motor.destroy', $motor) }}', '{{ $motor->merk_tipe }}')"
                                            class="w-8 h-8 flex items-center justify-center bg-red-50 text-red-600 rounded hover:bg-red-100 transition">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if ($motors->isEmpty())
                <div class="p-8 text-center text-zinc-400">
                    <i class="fa-solid fa-motorcycle text-4xl mb-3"></i>
                    <p>Belum ada data motor.</p>
                </div>
            @endif
        </div>

        {{-- Mobile View --}}
        <div class="md:hidden space-y-4">
            @forelse ($motors as $motor)
                <div class="bg-white border border-zinc-200 rounded-lg shadow-sm p-4">
                    <div class="flex gap-4">
                        <div
                            class="w-20 h-20 bg-zinc-100 rounded-md overflow-hidden flex-shrink-0 flex items-center justify-center">
                            @if ($motor->gambar_url)
                                <img src="{{ $motor->gambar_url }}" alt="{{ $motor->nama_motor }}"
                                    class="w-full h-full object-cover">
                            @else
                                <i class="fa-solid fa-motorcycle text-2xl text-zinc-300"></i>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex justify-between items-start mb-1">
                                <h3 class="font-bold text-zinc-900 truncate pr-2">{{ $motor->merk_tipe }}</h3>
                                <div class="flex-shrink-0">
                                    <span
                                        class="px-2 py-0.5 text-[10px] font-black uppercase tracking-wider rounded-full 
                                        {{ $motor->status_motor == 'Tersedia' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                        {{ $motor->status_motor }}
                                    </span>
                                </div>
                            </div>
                            <p class="text-sm text-zinc-500 mb-2">{{ $motor->plat_nomor }}</p>
                            <p class="font-mono text-sm font-bold text-zinc-700">
                                IDR {{ number_format($motor->harga_sewa_per_hari, 0, ',', '.') }} / hari
                            </p>
                        </div>
                    </div>
                    <div class="flex gap-2 mt-4 pt-4 border-t border-zinc-100">
                        <a href="{{ route('motor.edit', $motor) }}"
                            class="flex-1 py-2 bg-blue-50 text-blue-600 rounded text-sm font-bold text-center hover:bg-blue-100 transition">
                            <i class="fa-solid fa-pen-to-square mr-1"></i> Edit
                        </a>
                        <button
                            onclick="openDeleteModal('{{ route('motor.destroy', $motor) }}', '{{ $motor->merk_tipe }}')"
                            class="flex-1 py-2 bg-red-50 text-red-600 rounded text-sm font-bold hover:bg-red-100 transition">
                            <i class="fa-solid fa-trash mr-1"></i> Hapus
                        </button>
                    </div>
                </div>
            @empty
                <div class="bg-white border border-zinc-200 rounded-lg p-8 text-center text-zinc-400">
                    <i class="fa-solid fa-motorcycle text-4xl mb-3"></i>
                    <p>Belum ada data motor.</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Delete Modal -->
    <div id="deleteModal" class="fixed inset-0 z-50 flex items-center justify-center hidden">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" onclick="closeDeleteModal()"></div>

        <!-- Modal Content -->
        <div
            class="bg-white rounded-lg shadow-xl w-full max-w-md mx-4 relative z-10 p-6 transform transition-all scale-100">
            <div class="text-center mb-6">
                <div class="w-16 h-16 bg-red-100 text-red-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fa-solid fa-triangle-exclamation text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-zinc-900 mb-2">Hapus Motor?</h3>
                <p class="text-zinc-500 text-sm">
                    Apakah Anda yakin ingin menghapus motor <span id="deleteItemName"
                        class="font-bold text-zinc-800"></span>?
                    Tindakan ini tidak dapat dibatalkan.
                </p>
            </div>

            <div class="flex gap-3">
                <button onclick="closeDeleteModal()"
                    class="flex-1 py-2.5 px-4 bg-zinc-100 text-zinc-700 font-bold rounded-sm hover:bg-zinc-200 transition">
                    Batal
                </button>
                <form id="deleteForm" action="" method="POST" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="w-full py-2.5 px-4 bg-red-600 text-white font-bold rounded-sm hover:bg-red-700 transition">
                        Ya, Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openDeleteModal(actionUrl, itemName) {
            document.getElementById('deleteForm').action = actionUrl;
            document.getElementById('deleteItemName').innerText = itemName;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }
    </script>
@endsection
