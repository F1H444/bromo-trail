@extends('layouts.admin')

@section('title', 'Edit Item Tambahan')

@section('content')
    <div class="p-8">
        <div class="max-w-xl mx-auto">
            <div class="mb-8">
                <a href="{{ route('tambahan.index') }}"
                    class="text-zinc-500 hover:text-zinc-900 transition mb-2 inline-block">
                    <i class="fa-solid fa-arrow-left mr-2"></i> Kembali
                </a>
                <h1 class="text-3xl font-black text-zinc-900 tracking-tighter uppercase italic">Edit Item</h1>
            </div>

            <div class="bg-white border border-zinc-200 rounded-sm shadow-sm p-8">
                <form action="{{ route('tambahan.update', $tambahan->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-6">
                        <label for="nama_item"
                            class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Nama Item</label>
                        <input type="text" name="nama_item" id="nama_item" value="{{ $tambahan->nama_item }}" required
                            class="w-full bg-zinc-50 border border-zinc-200 p-3 rounded-sm focus:outline-none focus:border-zinc-900 transition">
                    </div>

                    <div class="grid grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="harga_satuan"
                                class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Harga
                                Sewa</label>
                            <input type="number" name="harga_satuan" id="harga_satuan"
                                value="{{ $tambahan->harga_satuan }}" required
                                class="w-full bg-zinc-50 border border-zinc-200 p-3 rounded-sm focus:outline-none focus:border-zinc-900 transition">
                        </div>
                        <div>
                            <label for="stok_total"
                                class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Stok
                                Total</label>
                            <input type="number" name="stok_total" id="stok_total" value="{{ $tambahan->stok_total }}"
                                required
                                class="w-full bg-zinc-50 border border-zinc-200 p-3 rounded-sm focus:outline-none focus:border-zinc-900 transition">
                        </div>
                    </div>

                    <div class="mb-8">
                        <label for="gambar"
                            class="block text-xs font-bold text-zinc-500 uppercase tracking-widest mb-2">Foto Item</label>

                        <div class="flex items-start gap-6">
                            @if ($tambahan->gambar_url)
                                <div
                                    class="w-20 h-20 bg-zinc-100 rounded overflow-hidden flex-shrink-0 border border-zinc-200">
                                    <img src="{{ $tambahan->gambar_url }}" alt="Preview"
                                        class="w-full h-full object-cover">
                                </div>
                            @endif

                            <div class="flex-grow">
                                <input type="file" name="gambar" id="gambar" accept="image/*"
                                    class="w-full bg-zinc-50 border border-zinc-200 p-2 rounded-sm focus:outline-none focus:border-zinc-900 transition file:mr-4 file:py-2 file:px-4 file:rounded-sm file:border-0 file:text-xs file:font-semibold file:bg-zinc-900 file:text-white hover:file:bg-zinc-800">
                                <p class="text-xs text-zinc-400 mt-1">Upload foto baru untuk mengganti yang lama.</p>
                            </div>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full bg-zinc-900 text-white px-8 py-3 font-bold uppercase tracking-wider rounded-sm hover:bg-zinc-800 transition">
                        Simpan Perubahan
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
