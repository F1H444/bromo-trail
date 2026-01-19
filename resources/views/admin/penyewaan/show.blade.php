@extends('layouts.admin')

@section('title', 'Detail Penyewaan')

@section('content')
    <div class="p-8">
        <div class="mb-8 flex justify-between items-start">
            <div>
                <a href="{{ route('penyewaan.index') }}"
                    class="text-zinc-500 hover:text-zinc-900 transition mb-2 inline-block">
                    <i class="fa-solid fa-arrow-left mr-2"></i> Kembali
                </a>
                <h1 class="text-3xl font-black text-zinc-900 tracking-tighter uppercase italic">Detail Penyewaan
                    #{{ $penyewaan->id }}</h1>
            </div>
            <div>
                <span
                    class="px-4 py-2 text-sm font-black uppercase tracking-wider rounded-sm
                    @if ($penyewaan->status_sewa == 'Aktif') bg-green-100 text-green-800
                    @elseif($penyewaan->status_sewa == 'Selesai') bg-zinc-200 text-zinc-600
                    @elseif($penyewaan->status_sewa == 'Booking') bg-blue-100 text-blue-800
                    @else bg-yellow-100 text-yellow-800 @endif">
                    {{ $penyewaan->status_sewa }}
                </span>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Info -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Pelanggan & Motor -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white border border-zinc-200 rounded-sm shadow-sm p-6">
                        <h2 class="text-sm font-bold text-zinc-900 mb-4 uppercase tracking-widest border-b pb-2"><i
                                class="fa-solid fa-user mr-2"></i> Pelanggan</h2>
                        <p class="font-bold text-lg">{{ $penyewaan->pelanggan->nama_lengkap }}</p>
                        <p class="text-zinc-500">{{ $penyewaan->pelanggan->email }}</p>
                        <p class="text-zinc-500">{{ $penyewaan->pelanggan->no_hp }}</p>
                        <p class="text-zinc-500 text-sm mt-2">{{ $penyewaan->pelanggan->alamat }}</p>
                    </div>

                    <div class="bg-white border border-zinc-200 rounded-sm shadow-sm p-6">
                        <h2 class="text-sm font-bold text-zinc-900 mb-4 uppercase tracking-widest border-b pb-2"><i
                                class="fa-solid fa-motorcycle mr-2"></i> Unit Motor</h2>
                        <div class="flex gap-4">
                            @if ($penyewaan->motor->gambar_url)
                                <img src="{{ $penyewaan->motor->gambar_url }}"
                                    class="w-16 h-16 object-cover rounded bg-zinc-100">
                            @endif
                            <div>
                                <p class="font-bold text-lg">{{ $penyewaan->motor->nama_motor }}</p>
                                <p class="text-zinc-500">{{ $penyewaan->motor->tipe_motor }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Detail Biaya -->
                <div class="bg-white border border-zinc-200 rounded-sm shadow-sm p-6">
                    <h2 class="text-sm font-bold text-zinc-900 mb-4 uppercase tracking-widest border-b pb-2"><i
                            class="fa-solid fa-receipt mr-2"></i> Rincian Biaya</h2>
                    <table class="w-full text-sm">
                        <tr class="border-b border-zinc-100">
                            <td class="py-4 px-4 text-zinc-500">Harga Sewa Motor (per hari)</td>
                            <td class="py-4 px-4 text-right font-mono font-bold">IDR
                                {{ number_format($penyewaan->motor->harga_sewa, 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr class="border-b border-zinc-100">
                            <td class="py-4 px-4 text-zinc-500">Durasi</td>
                            <td class="py-4 px-4 text-right font-bold">
                                {{ \Carbon\Carbon::parse($penyewaan->tgl_mulai)->diffInDays(\Carbon\Carbon::parse($penyewaan->tgl_kembali)) }}
                                Hari</td>
                        </tr>
                        <!-- Tambahan placeholder if any -->
                        <tr class="font-bold bg-zinc-50 border-t-2 border-zinc-900">
                            <td class="py-4 px-4 text-zinc-900">TOTAL BIAYA</td>
                            <td class="py-4 px-4 text-right text-lg text-zinc-900 font-mono">IDR
                                {{ number_format($penyewaan->total_biaya, 0, ',', '.') }}</td>
                        </tr>
                    </table>
                </div>

                <!-- Riwayat Pembayaran -->
                <div class="bg-white border border-zinc-200 rounded-sm shadow-sm p-6">
                    <h2 class="text-sm font-bold text-zinc-900 mb-4 uppercase tracking-widest border-b pb-2"><i
                            class="fa-solid fa-money-bill-wave mr-2"></i> Riwayat Pembayaran</h2>
                    @if ($penyewaan->pembayaran->isEmpty())
                        <p class="text-zinc-400 italic">Belum ada pembayaran.</p>
                    @else
                        <div class="space-y-3">
                            @foreach ($penyewaan->pembayaran as $bayar)
                                <div class="flex justify-between items-center border border-zinc-100 p-3 rounded">
                                    <div>
                                        <p class="font-bold">IDR {{ number_format($bayar->jumlah_bayar, 0, ',', '.') }}</p>
                                        <p class="text-xs text-zinc-500">
                                            {{ \Carbon\Carbon::parse($bayar->tgl_bayar)->format('d M Y H:i') }} •
                                            {{ $bayar->metode_bayar }}</p>
                                    </div>
                                    <span
                                        class="text-xs font-bold uppercase {{ $bayar->status_pembayaran == 'Lunas' ? 'text-green-600' : 'text-yellow-600' }}">
                                        {{ $bayar->status_pembayaran }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <!-- Sidebar Actions -->
            <div class="space-y-6">
                <div class="bg-white border border-zinc-200 rounded-sm shadow-sm p-6">
                    <h2 class="text-sm font-bold text-zinc-900 mb-4 uppercase tracking-widest border-b pb-2">Update Status
                    </h2>
                    <form action="{{ route('penyewaan.updateStatus', $penyewaan->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="mb-4">
                            <label class="block text-xs font-bold text-zinc-500 mb-2">Ubah Status Sewa</label>
                            <select name="status_sewa" class="w-full border p-2 rounded-sm bg-zinc-50">
                                <option value="Booking" {{ $penyewaan->status_sewa == 'Booking' ? 'selected' : '' }}>
                                    Booking</option>
                                <option value="Proses Verifikasi"
                                    {{ $penyewaan->status_sewa == 'Proses Verifikasi' ? 'selected' : '' }}>Proses
                                    Verifikasi</option>
                                <option value="Aktif" {{ $penyewaan->status_sewa == 'Aktif' ? 'selected' : '' }}>Aktif
                                    (Sedang Disewa)</option>
                                <option value="Selesai" {{ $penyewaan->status_sewa == 'Selesai' ? 'selected' : '' }}>
                                    Selesai (Kembali)</option>
                                <option value="Dibatalkan" {{ $penyewaan->status_sewa == 'Dibatalkan' ? 'selected' : '' }}>
                                    Dibatalkan</option>
                            </select>
                        </div>
                        <button type="submit"
                            class="w-full bg-zinc-900 text-white py-3 font-bold uppercase rounded-sm hover:bg-zinc-800 transition">
                            Simpan Status
                        </button>
                    </form>
                </div>

                <div class="bg-white border border-zinc-200 rounded-sm shadow-sm p-6">
                    <h2 class="text-sm font-bold text-zinc-900 mb-4 uppercase tracking-widest border-b pb-2">Aksi Lain</h2>
                    <a href="{{ route('cek-kondisi.create', ['id_penyewaan' => $penyewaan->id]) }}"
                        class="block w-full text-center border-2 border-zinc-900 text-zinc-900 py-3 font-bold uppercase rounded-sm hover:bg-zinc-50 transition mb-2">
                        <i class="fa-solid fa-clipboard-check mr-2"></i> Cek Kondisi
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
