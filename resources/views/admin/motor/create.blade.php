@extends('layouts.admin')

@section('title', 'Tambah Motor Baru')

@section('content')
    <div class="p-8">
        <div class="max-w-3xl mx-auto">
            <div class="mb-8">
                <a href="{{ route('motor.index') }}" class="text-zinc-500 hover:text-zinc-900 transition mb-2 inline-block">
                    <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Daftar
                </a>
                <h1 class="text-3xl font-black text-zinc-900 tracking-tighter uppercase italic">Tambah Motor Baru</h1>
            </div>

            <div class="bg-white border border-zinc-200 rounded-sm shadow-sm p-8">
                <form action="{{ route('motor.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <!-- Nama Motor -->
                        <div>
                            <label for="nama_motor"
                                class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Nama
                                Motor (Merk & Tipe)</label>
                            <input type="text" name="nama_motor" id="nama_motor" required
                                class="w-full bg-zinc-50 border border-zinc-200 p-3 rounded-sm focus:outline-none focus:border-zinc-900 transition"
                                placeholder="Contoh: CRF 150L Merah">
                            @error('nama_motor')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- ... other inputs ... -->

                        <!-- Plat Nomor (Auto-generated) -->
                        <div>
                            <label for="plat_nomor"
                                class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Plat Nomor
                                (Auto-generated)</label>
                            <input type="text" disabled value="Auto-generated"
                                class="w-full bg-zinc-100 border border-zinc-200 p-3 rounded-sm text-zinc-400 cursor-not-allowed">
                        </div>

                        <!-- Harga Sewa -->
                        <div>
                            <label for="harga_sewa"
                                class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Harga Sewa (per
                                Hari)</label>
                            <input type="number" name="harga_sewa" id="harga_sewa" required
                                class="w-full bg-zinc-50 border border-zinc-200 p-3 rounded-sm focus:outline-none focus:border-zinc-900 transition"
                                placeholder="Contoh: 150000">
                        </div>

                        <!-- Status Ketersediaan -->
                        <div>
                            <label for="status_ketersediaan"
                                class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Status
                                Awal</label>
                            <select name="status_ketersediaan" id="status_ketersediaan" required
                                class="w-full bg-zinc-50 border border-zinc-200 p-3 rounded-sm focus:outline-none focus:border-zinc-900 transition">
                                <option value="Tersedia">Tersedia</option>
                                <option value="Disewa">Disewa</option>
                                <option value="Maintenance">Maintenance</option>
                            </select>
                        </div>
                    </div>

                    <!-- Gambar Upload -->
                    <div class="mb-6">
                        <label for="gambar"
                            class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Foto Motor</label>
                        <input type="file" name="gambar" id="gambar" accept="image/*"
                            class="w-full bg-zinc-50 border border-zinc-200 p-2 rounded-sm focus:outline-none focus:border-zinc-900 transition file:mr-4 file:py-2 file:px-4 file:rounded-sm file:border-0 file:text-xs file:font-semibold file:bg-zinc-900 file:text-white hover:file:bg-zinc-800">
                        <p class="text-xs text-zinc-400 mt-1">Format: JPG, PNG, GIF. Maks: 2MB.</p>
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-8">
                        <label for="deskripsi"
                            class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Deskripsi /
                            Catatan</label>
                        <textarea name="deskripsi" id="deskripsi" rows="4"
                            class="w-full bg-zinc-50 border border-zinc-200 p-3 rounded-sm focus:outline-none focus:border-zinc-900 transition"
                            placeholder="Kondisi motor, spesifikasi singkat..."></textarea>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-zinc-900 text-white px-8 py-3 font-bold uppercase tracking-wider rounded-sm hover:bg-zinc-800 transition">
                            Simpan Motor
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
