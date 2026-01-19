@extends('layouts.admin')

@section('title', 'Detail Pembayaran')

@section('content')
    <div class="p-8">
        <div class="mb-8">
            <a href="{{ route('pembayaran.index') }}" class="text-zinc-500 hover:text-zinc-900 transition mb-2 inline-block">
                <i class="fa-solid fa-arrow-left mr-2"></i> Kembali
            </a>
            <h1 class="text-3xl font-black text-zinc-900 tracking-tighter uppercase italic">Detail Pembayaran</h1>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Info Pembayaran -->
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white border border-zinc-200 rounded-sm shadow-sm p-6">
                    <h2 class="text-lg font-bold text-zinc-900 mb-4 border-b pb-2">Informasi Pembayaran</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-xs text-zinc-500 uppercase tracking-widest mb-1">ID Pembayaran</p>
                            <p class="font-mono font-bold">#{{ $pembayaran->id }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-zinc-500 uppercase tracking-widest mb-1">Tanggal</p>
                            <p class="font-bold">{{ \Carbon\Carbon::parse($pembayaran->tgl_bayar)->format('d M Y H:i') }}
                            </p>
                        </div>
                        <div>
                            <p class="text-xs text-zinc-500 uppercase tracking-widest mb-1">Jumlah</p>
                            <p class="font-mono font-bold text-xl">IDR
                                {{ number_format($pembayaran->jumlah_bayar, 0, ',', '.') }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-zinc-500 uppercase tracking-widest mb-1">Metode</p>
                            <p class="font-bold">{{ $pembayaran->metode_bayar }}</p>
                        </div>
                        <div class="col-span-2">
                            <p class="text-xs text-zinc-500 uppercase tracking-widest mb-1">Catatan</p>
                            <p class="text-sm border p-2 bg-zinc-50 rounded">{{ $pembayaran->catatan ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white border border-zinc-200 rounded-sm shadow-sm p-6">
                    <h2 class="text-lg font-bold text-zinc-900 mb-4 border-b pb-2">Bukti Pembayaran</h2>
                    @if ($pembayaran->bukti_bayar_url)
                        <div class="bg-zinc-100 rounded p-2">
                            <img src="{{ $pembayaran->bukti_bayar_url }}" alt="Bukti Bayar"
                                class="w-full h-auto rounded max-h-[500px] object-contain mx-auto">
                        </div>
                    @else
                        <div class="bg-zinc-50 py-8 text-center text-zinc-400 border border-dashed border-zinc-300 rounded">
                            <i class="fa-solid fa-image-slash text-3xl mb-2"></i>
                            <p>Tidak ada bukti pembayaran diunggah.</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Action & Info Sewa -->
            <div class="space-y-6">
                <!-- Status Action -->
                <div class="bg-white border border-zinc-200 rounded-sm shadow-sm p-6">
                    <h2 class="text-lg font-bold text-zinc-900 mb-4 border-b pb-2">Verifikasi</h2>

                    <div class="mb-6">
                        <p class="text-xs text-zinc-500 uppercase tracking-widest mb-1">Status Saat Ini</p>
                        <span
                            class="px-3 py-1 text-xs font-black uppercase tracking-wider rounded-full inline-block
                            {{ $pembayaran->status_pembayaran == 'Lunas'
                                ? 'bg-green-100 text-green-700'
                                : ($pembayaran->status_pembayaran == 'Pending'
                                    ? 'bg-yellow-100 text-yellow-700'
                                    : 'bg-red-100 text-red-700') }}">
                            {{ $pembayaran->status_pembayaran }}
                        </span>
                    </div>

                    <form action="{{ route('pembayaran.verify', $pembayaran->id) }}" method="POST">
                        @csrf
                        <div class="space-y-3">
                            <button type="submit" name="status_pembayaran" value="Lunas"
                                class="w-full bg-green-600 text-white py-3 rounded-sm font-bold uppercase tracking-wider hover:bg-green-700 transition flex items-center justify-center gap-2">
                                <i class="fa-solid fa-check"></i> Verifikasi Lunas
                            </button>
                            <button type="submit" name="status_pembayaran" value="Ditolak"
                                class="w-full bg-red-600 text-white py-3 rounded-sm font-bold uppercase tracking-wider hover:bg-red-700 transition flex items-center justify-center gap-2">
                                <i class="fa-solid fa-xmark"></i> Tolak Pembayaran
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Info Sewa -->
                <div class="bg-white border border-zinc-200 rounded-sm shadow-sm p-6">
                    <h2 class="text-lg font-bold text-zinc-900 mb-4 border-b pb-2">Terkait Sewa</h2>
                    <div class="space-y-3">
                        <div>
                            <p class="text-xs text-zinc-500 uppercase tracking-widest">Pelanggan</p>
                            <p class="font-bold">{{ $pembayaran->penyewaan->pelanggan->nama_lengkap }}</p>
                        </div>
                        <div>
                            <p class="text-xs text-zinc-500 uppercase tracking-widest">Motor</p>
                            <p class="font-bold">{{ $pembayaran->penyewaan->motor->nama_motor }}</p>
                        </div>
                        <div>
                            <a href="{{ route('penyewaan.show', $pembayaran->id_penyewaan) }}"
                                class="text-blue-600 hover:underline text-sm font-bold">
                                Lihat Detail Sewa <i class="fa-solid fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
