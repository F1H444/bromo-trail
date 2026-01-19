@extends('layouts.admin')

@section('title', 'Edit Motor')

@section('content')
    <div class="p-8">
        <div class="max-w-3xl mx-auto">
            <div class="mb-8">
                <a href="{{ route('motor.index') }}" class="text-zinc-500 hover:text-zinc-900 transition mb-2 inline-block">
                    <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Daftar
                </a>
                <h1 class="text-3xl font-black text-zinc-900 tracking-tighter uppercase italic">Edit Data Motor</h1>
                <p class="text-zinc-500">{{ $motor->nama_motor }}</p>
            </div>

            <div class="bg-white border border-zinc-200 rounded-sm shadow-sm p-8">
                <form action="{{ route('motor.update', $motor->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <!-- Nama Motor -->
                        <div>
                            <label for="nama_motor"
                                class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Nama
                                Motor (Merk & Tipe)</label>
                            <input type="text" name="nama_motor" id="nama_motor" value="{{ $motor->merk_tipe }}" required
                                class="w-full bg-zinc-50 border border-zinc-200 p-3 rounded-sm focus:outline-none focus:border-zinc-900 transition">
                        </div>

                        <!-- Plat Nomor (Read-only) -->
                        <div>
                            <label for="plat_nomor"
                                class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Plat
                                Nomor</label>
                            <input type="text" disabled value="{{ $motor->plat_nomor }}"
                                class="w-full bg-zinc-100 border border-zinc-200 p-3 rounded-sm text-zinc-400 cursor-not-allowed">
                        </div>

                        <!-- Harga Sewa -->
                        <div>
                            <label for="harga_sewa"
                                class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Harga Sewa (per
                                Hari)</label>
                            <input type="number" name="harga_sewa" id="harga_sewa"
                                value="{{ $motor->harga_sewa_per_hari }}" required
                                class="w-full bg-zinc-50 border border-zinc-200 p-3 rounded-sm focus:outline-none focus:border-zinc-900 transition">
                        </div>

                        <!-- Status Ketersediaan -->
                        <div>
                            <label for="status_ketersediaan"
                                class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Status Saat
                                Ini</label>
                            <select name="status_ketersediaan" id="status_ketersediaan" required
                                class="w-full bg-zinc-50 border border-zinc-200 p-3 rounded-sm focus:outline-none focus:border-zinc-900 transition">
                                <option value="Tersedia" {{ $motor->status_motor == 'Tersedia' ? 'selected' : '' }}>
                                    Tersedia</option>
                                <option value="Disewa" {{ $motor->status_motor == 'Disewa' ? 'selected' : '' }}>
                                    Disewa</option>
                                <option value="Maintenance" {{ $motor->status_motor == 'Maintenance' ? 'selected' : '' }}>
                                    Maintenance</option>
                            </select>
                        </div>
                    </div>

                    <!-- Gambar Upload -->
                    <div class="mb-6">
                        <label for="gambar"
                            class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Foto Motor</label>

                        <div class="flex items-start gap-6">
                            @if ($motor->gambar_url)
                                <div
                                    class="w-32 h-20 bg-zinc-100 rounded overflow-hidden flex-shrink-0 border border-zinc-200">
                                    <img src="{{ $motor->gambar_url }}" alt="Preview" class="w-full h-full object-cover">
                                </div>
                            @endif

                            <div class="flex-grow">
                                <input type="file" name="gambar" id="gambar" accept="image/*"
                                    class="w-full bg-zinc-50 border border-zinc-200 p-2 rounded-sm focus:outline-none focus:border-zinc-900 transition file:mr-4 file:py-2 file:px-4 file:rounded-sm file:border-0 file:text-xs file:font-semibold file:bg-zinc-900 file:text-white hover:file:bg-zinc-800">
                                <p class="text-xs text-zinc-400 mt-1">Upload foto baru untuk mengganti yang lama. Format:
                                    JPG, PNG, GIF.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-8">
                        <label for="deskripsi"
                            class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Deskripsi /
                            Catatan</label>
                        <textarea name="deskripsi" id="deskripsi" rows="4"
                            class="w-full bg-zinc-50 border border-zinc-200 p-3 rounded-sm focus:outline-none focus:border-zinc-900 transition">{{ $motor->deskripsi_singkat }}</textarea>
                    </div>

                    <div class="flex justify-end gap-4">
                        <a href="{{ route('motor.index') }}"
                            class="px-6 py-3 font-bold uppercase tracking-wider text-zinc-500 hover:text-zinc-900 transition">
                            Batal
                        </a>
                        <button type="submit"
                            class="bg-zinc-900 text-white px-8 py-3 font-bold uppercase tracking-wider rounded-sm hover:bg-zinc-800 transition">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
