@extends('layouts.admin')

@section('title', 'Input Cek Kondisi')

@section('content')
    <div class="p-8">
        <div class="max-w-2xl mx-auto">
            <div class="mb-8">
                <a href="{{ route('cek-kondisi.index') }}"
                    class="text-zinc-500 hover:text-zinc-900 transition mb-2 inline-block">
                    <i class="fa-solid fa-arrow-left mr-2"></i> Kembali
                </a>
                <h1 class="text-3xl font-black text-zinc-900 tracking-tighter uppercase italic">Input Cek Kondisi</h1>
            </div>

            <div class="bg-white border border-zinc-200 rounded-sm shadow-sm p-8">
                <form action="{{ route('cek-kondisi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-6">
                        <label for="id_penyewaan"
                            class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">ID
                            Penyewaan</label>
                        @if (isset($penyewaan))
                            <input type="text"
                                value="#{{ $penyewaan->id }} - {{ $penyewaan->pelanggan->nama_lengkap }} ({{ $penyewaan->motor->nama_motor }})"
                                readonly
                                class="w-full bg-zinc-100 border border-zinc-200 p-3 rounded-sm text-zinc-500 cursor-not-allowed">
                            <input type="hidden" name="id_penyewaan" value="{{ $penyewaan->id }}">
                        @else
                            <input type="number" name="id_penyewaan" required
                                class="w-full bg-zinc-50 border border-zinc-200 p-3 rounded-sm focus:outline-none focus:border-zinc-900 transition"
                                placeholder="Masukkan ID Penyewaan">
                            <p class="text-xs text-zinc-400 mt-1">Masukkan ID Transaksi Penyewaan yang valid.</p>
                        @endif
                    </div>

                    <div class="mb-6">
                        <label class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Waktu
                            Pengecekan</label>
                        <div class="grid grid-cols-2 gap-4">
                            <label class="cursor-pointer">
                                <input type="radio" name="tipe_cek" value="Ambil" class="peer sr-only" required>
                                <div
                                    class="p-4 border border-zinc-200 rounded-sm text-center peer-checked:bg-blue-50 peer-checked:border-blue-500 peer-checked:text-blue-700 hover:bg-zinc-50 transition">
                                    <span class="font-bold">AMBIL MOTOR (OUT)</span>
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="tipe_cek" value="Kembali" class="peer sr-only">
                                <div
                                    class="p-4 border border-zinc-200 rounded-sm text-center peer-checked:bg-orange-50 peer-checked:border-orange-500 peer-checked:text-orange-700 hover:bg-zinc-50 transition">
                                    <span class="font-bold">KEMBALI MOTOR (IN)</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="kondisi_fisik"
                            class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Catatan Kondisi
                            Fisik</label>
                        <textarea name="kondisi_fisik" id="kondisi_fisik" rows="5" required
                            class="w-full bg-zinc-50 border border-zinc-200 p-3 rounded-sm focus:outline-none focus:border-zinc-900 transition"
                            placeholder="Catat goresan, lecet, kondisi bensin, kelengkapan helm, dll..."></textarea>
                    </div>

                    <div class="mb-8">
                        <label for="foto_bukti"
                            class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Foto Kondisi
                            (Opsional)</label>
                        <input type="file" name="foto_bukti" id="foto_bukti" accept="image/*"
                            class="w-full bg-zinc-50 border border-zinc-200 p-3 rounded-sm focus:outline-none focus:border-zinc-900 transition">
                        <p class="text-xs text-zinc-400 mt-1">Format: JPG, PNG, GIF. Maks: 10MB.</p>
                    </div>

                    <button type="submit"
                        class="w-full bg-zinc-900 text-white px-8 py-3 font-bold uppercase tracking-wider rounded-sm hover:bg-zinc-800 transition">
                        Simpan Data Kondisi
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
