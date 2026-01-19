@extends('layouts.dashboard')

@section('title', 'Pengaturan Profil')

@section('content')
    <div class="p-8 max-w-4xl">
        <div class="mb-8">
            <a href="{{ route('dashboard') }}"
                class="text-zinc-400 hover:text-zinc-900 transition-all flex items-center gap-2 text-xs font-bold uppercase tracking-widest mb-4">
                <i class="fa-solid fa-arrow-left text-[8px]"></i> Kembali ke Dashboard
            </a>
            <h1 class="text-4xl font-black text-zinc-900 tracking-tighter uppercase italic">Pengaturan Profil</h1>
        </div>

        @if (session('success'))
            <div
                class="mb-8 p-4 bg-green-50 border border-green-100 text-green-700 text-sm font-bold rounded-sm flex items-center gap-3">
                <i class="fa-solid fa-circle-check"></i>
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white border border-zinc-200 rounded-sm p-10 shadow-xl">
            <form action="{{ route('profile') }}" method="POST" class="space-y-8">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <label for="nama_lengkap"
                            class="text-[10px] font-black text-zinc-400 uppercase tracking-widest">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" id="nama_lengkap"
                            value="{{ old('nama_lengkap', $pelanggan->nama_lengkap) }}" required
                            class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 rounded-sm text-sm focus:outline-none focus:border-zinc-900 transition-colors">
                        @error('nama_lengkap')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-zinc-400 uppercase tracking-widest opacity-50">Email
                            (Tidak bisa diubah)</label>
                        <input type="email" value="{{ $pelanggan->email }}" disabled
                            class="w-full px-4 py-3 bg-zinc-100 border border-zinc-200 rounded-sm text-sm text-zinc-400 cursor-not-allowed">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <label for="no_wa"
                            class="text-[10px] font-black text-zinc-400 uppercase tracking-widest">WhatsApp</label>
                        <input type="text" name="no_wa" id="no_wa" value="{{ old('no_wa', $pelanggan->no_wa) }}"
                            required
                            class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 rounded-sm text-sm focus:outline-none focus:border-zinc-900 transition-colors">
                        @error('no_wa')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="space-y-2">
                        <label for="no_ktp_sim" class="text-[10px] font-black text-zinc-400 uppercase tracking-widest">KTP /
                            SIM</label>
                        <input type="text" name="no_ktp_sim" id="no_ktp_sim"
                            value="{{ old('no_ktp_sim', $pelanggan->no_ktp_sim) }}" required
                            class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 rounded-sm text-sm focus:outline-none focus:border-zinc-900 transition-colors">
                        @error('no_ktp_sim')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="alamat_asal" class="text-[10px] font-black text-zinc-400 uppercase tracking-widest">Alamat
                        Asal</label>
                    <textarea name="alamat_asal" id="alamat_asal" rows="4"
                        class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 rounded-sm text-sm focus:outline-none focus:border-zinc-900 transition-colors">{{ old('alamat_asal', $pelanggan->alamat_asal) }}</textarea>
                    @error('alamat_asal')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-6">
                    <button type="submit"
                        class="w-full py-4 bg-zinc-900 text-white text-[10px] font-black tracking-[0.2em] uppercase rounded-sm hover:bg-zinc-800 transition-all shadow-xl hover:shadow-zinc-900/20">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
