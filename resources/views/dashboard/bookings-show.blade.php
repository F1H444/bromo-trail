@extends('layouts.dashboard')

@section('title', 'Detail Booking #' . $booking->id)

@section('content')
    <div class="p-8">
        <!-- Breadcrumb & Header -->
        <div class="mb-8">
            <div class="flex items-center gap-2 text-xs font-bold text-zinc-400 uppercase tracking-widest mb-4">
                <a href="{{ route('dashboard.bookings') }}" class="hover:text-zinc-900 transition-colors">Riwayat Sewa</a>
                <i class="fa-solid fa-chevron-right text-[8px]"></i>
                <span class="text-zinc-900">Detail Booking #{{ $booking->id }}</span>
            </div>
            <h1 class="text-4xl font-black text-zinc-900 tracking-tighter uppercase italic">Detail Booking</h1>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Left: Main Info -->
            <div class="flex-1 space-y-6">
                <!-- Status Card -->
                <div class="bg-white border border-zinc-200 rounded-sm p-8 shadow-sm">
                    <div class="flex flex-wrap items-center justify-between gap-4">
                        <div>
                            <span class="text-[10px] font-bold text-zinc-400 uppercase tracking-widest block mb-1">Status
                                Penyewaan</span>
                            <span
                                class="px-3 py-1 rounded-full text-xs font-black uppercase tracking-wider
                                @if ($booking->status_sewa == 'Booking') bg-blue-100 text-blue-700
                                @elseif($booking->status_sewa == 'Proses Verifikasi') bg-yellow-100 text-yellow-700
                                @elseif($booking->status_sewa == 'Aktif') bg-green-100 text-green-700
                                @elseif($booking->status_sewa == 'Selesai') bg-zinc-100 text-zinc-500 @endif
                            ">
                                {{ $booking->status_sewa }}
                            </span>
                        </div>
                        <div class="text-right">
                            <span class="text-[10px] font-bold text-zinc-400 uppercase tracking-widest block mb-1">ID
                                Transaksi</span>
                            <span
                                class="font-mono font-bold text-zinc-900">#BT-{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}</span>
                        </div>
                    </div>
                </div>

                <!-- Motor Info -->
                <div class="bg-white border border-zinc-200 rounded-sm overflow-hidden shadow-sm">
                    <div class="p-8 border-b border-zinc-100">
                        <h2 class="text-xl font-bold text-zinc-900 mb-6">Unit Motor</h2>
                        <div class="flex flex-col md:flex-row gap-8 items-center">
                            <div class="w-full md:w-64 aspect-video bg-zinc-100 rounded-sm overflow-hidden flex-shrink-0">
                                <img src="{{ $booking->motor->gambar_url }}" alt="{{ $booking->motor->merk_tipe }}"
                                    class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1">
                                <h3 class="text-2xl font-bold text-zinc-900 mb-2">{{ $booking->motor->merk_tipe }}</h3>
                                <div
                                    class="inline-block px-3 py-1 bg-zinc-900 text-white text-[10px] font-bold uppercase tracking-widest rounded-sm mb-4">
                                    {{ $booking->motor->plat_nomor }}
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="flex items-center gap-2 text-sm text-zinc-500">
                                        <i class="fa-solid fa-calendar-day text-zinc-300"></i>
                                        <span>{{ \Carbon\Carbon::parse($booking->tgl_mulai)->format('d M Y') }}</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-sm text-zinc-500">
                                        <i class="fa-solid fa-calendar-check text-zinc-300"></i>
                                        <span>{{ \Carbon\Carbon::parse($booking->tgl_kembali)->format('d M Y') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-zinc-50 p-6 flex flex-wrap gap-8 items-center justify-between">
                        @php
                            $start = \Carbon\Carbon::parse($booking->tgl_mulai);
                            $end = \Carbon\Carbon::parse($booking->tgl_kembali);
                            $days = $start->diffInDays($end) + 1;
                        @endphp
                        <div class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 border border-zinc-200 rounded-full flex items-center justify-center text-zinc-400">
                                <i class="fa-solid fa-clock"></i>
                            </div>
                            <div>
                                <span class="text-[10px] font-bold text-zinc-400 uppercase tracking-widest block">Durasi
                                    Sewa</span>
                                <p class="font-bold text-zinc-900">{{ $days }} Hari</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div
                                class="w-10 h-10 border border-zinc-200 rounded-full flex items-center justify-center text-zinc-400">
                                <i class="fa-solid fa-money-bill-wave"></i>
                            </div>
                            <div>
                                <span class="text-[10px] font-bold text-zinc-400 uppercase tracking-widest block">Harga Per
                                    Hari</span>
                                <p class="font-bold text-zinc-900">IDR
                                    {{ number_format($booking->motor->harga_sewa_per_hari, 0, ',', '.') }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <span class="text-[10px] font-bold text-zinc-400 uppercase tracking-widest block">Subtotal
                                Motor</span>
                            <p class="text-xl font-black text-zinc-900">IDR
                                {{ number_format($booking->motor->harga_sewa_per_hari * $days, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Additional Items -->
                @if ($booking->details->isNotEmpty())
                    <div class="bg-white border border-zinc-200 rounded-sm p-8 shadow-sm">
                        <h2 class="text-xl font-bold text-zinc-900 mb-6">Item Tambahan</h2>
                        <div class="space-y-4">
                            @foreach ($booking->details as $detail)
                                <div class="flex items-center justify-between py-4 border-b border-zinc-100 last:border-0">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 bg-zinc-50 rounded-sm overflow-hidden flex-shrink-0">
                                            <img src="{{ $detail->tambahan->gambar_url }}"
                                                class="w-full h-full object-cover">
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-zinc-900 text-sm">{{ $detail->tambahan->nama_item }}
                                            </h4>
                                            <p class="text-[10px] text-zinc-400">IDR
                                                {{ number_format($detail->tambahan->harga_satuan, 0, ',', '.') }} x
                                                {{ $detail->jumlah }} x {{ $days }} hari</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-bold text-zinc-900">IDR
                                            {{ number_format($detail->subtotal_harga, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <!-- Cek Kondisi History -->
            @if ($booking->cekKondisi->isNotEmpty())
                <div class="bg-white border border-zinc-200 rounded-sm p-8 shadow-sm mt-8">
                    <h2 class="text-xl font-bold text-zinc-900 mb-6">Riwayat Cek Kondisi</h2>
                    <div class="space-y-6">
                        @foreach ($booking->cekKondisi as $cek)
                            <div class="p-6 bg-zinc-50 border border-zinc-100 rounded-sm">
                                <div class="flex items-center justify-between mb-4">
                                    <span
                                        class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider
                                        {{ $cek->waktu_cek == 'Ambil' ? 'bg-blue-100 text-blue-700' : 'bg-orange-100 text-orange-700' }}">
                                        {{ $cek->waktu_cek == 'Ambil' ? 'Pengambilan (OUT)' : 'Pengembalian (IN)' }}
                                    </span>
                                    @if ($cek->foto_kondisi)
                                        <a href="{{ asset($cek->foto_kondisi) }}" target="_blank"
                                            class="flex items-center gap-2 text-xs font-bold text-zinc-500 hover:text-zinc-900 transition-colors">
                                            <i class="fa-solid fa-image"></i> Lihat Foto
                                        </a>
                                    @endif
                                </div>
                                <div>
                                    <span
                                        class="text-[10px] font-bold text-zinc-400 uppercase tracking-widest block mb-2">Catatan
                                        Kondisi</span>
                                    <p class="text-sm text-zinc-700 leading-relaxed italic">
                                        "{{ $cek->catatan_kondisi_fisik }}"</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

        <!-- Right: Summary & Action -->
        <div class="w-full lg:w-96 space-y-6">
            <!-- Payment Status -->
            <div class="bg-white border border-zinc-200 rounded-sm p-8 shadow-sm">
                <h3 class="text-xs font-bold text-zinc-400 uppercase tracking-widest mb-6 border-b border-zinc-100 pb-4">
                    Pembayaran</h3>

                @if ($booking->pembayaran->isNotEmpty())
                    @php $pembayaran = $booking->pembayaran->last(); @endphp
                    <div class="space-y-6">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-zinc-500">Status</span>
                            <span
                                class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider
                                    @if ($pembayaran->status_pembayaran == 'Lunas') bg-green-100 text-green-700
                                    @elseif($pembayaran->status_pembayaran == 'Pending') bg-blue-100 text-blue-700
                                    @elseif($pembayaran->status_pembayaran == 'Menunggu Verifikasi') bg-yellow-100 text-yellow-700
                                    @else bg-red-100 text-red-700 @endif
                                ">
                                {{ $pembayaran->status_pembayaran }}
                            </span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-zinc-500">Metode</span>
                            <span class="text-sm font-bold text-zinc-900 uppercase">{{ $pembayaran->metode_bayar }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-zinc-500">Total Biaya</span>
                            <span class="text-xl font-black text-zinc-900">IDR
                                {{ number_format($booking->total_biaya, 0, ',', '.') }}</span>
                        </div>

                        @if ($pembayaran->bukti_bayar_url)
                            <div class="pt-6 border-t border-zinc-100">
                                <span class="text-[10px] font-bold text-zinc-400 uppercase tracking-widest block mb-4">Bukti
                                    Pembayaran</span>
                                <a href="{{ $pembayaran->bukti_bayar_url }}" target="_blank"
                                    class="block w-full h-40 bg-zinc-50 rounded-sm overflow-hidden group relative border border-zinc-200">
                                    <img src="{{ $pembayaran->bukti_bayar_url }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    <div
                                        class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                        <span class="text-white text-[10px] font-bold uppercase tracking-widest">Lihat
                                            Foto</span>
                                    </div>
                                </a>
                            </div>
                        @endif
                    </div>
                @else
                    <div class="text-center py-6">
                        <div
                            class="w-16 h-16 bg-blue-50 text-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fa-solid fa-receipt text-2xl"></i>
                        </div>
                        <p class="text-zinc-500 text-sm mb-6">Belum ada data pembayaran untuk booking ini.</p>
                        @if ($booking->status_sewa == 'Booking')
                            <a href="{{ route('pembayaran.create', $booking->id) }}"
                                class="block w-full py-4 bg-zinc-900 text-white text-xs font-bold rounded-sm tracking-widest uppercase hover:bg-zinc-800 transition-all shadow-lg hover:shadow-zinc-900/30">
                                Upload Bukti Sekarang
                            </a>
                        @endif
                    </div>
                @endif
            </div>

            <!-- Help Card -->
            <div class="bg-zinc-900 text-white p-8 rounded-sm shadow-xl">
                <h3 class="text-lg font-bold mb-4">Butuh Bantuan?</h3>
                <p class="text-zinc-400 text-xs leading-relaxed mb-6">Jika Anda memiliki kendala terkait penyewaan atau
                    ingin mengganti jadwal, silakan hubungi tim kami via WhatsApp.</p>
                <a href="https://wa.me/your-number" target="_blank"
                    class="flex items-center justify-center gap-2 w-full py-3 bg-white text-zinc-900 text-[10px] font-bold rounded-sm uppercase tracking-widest hover:bg-zinc-100 transition-all">
                    <i class="fa-brands fa-whatsapp text-lg"></i>
                    Hubungi Kami
                </a>
            </div>
        </div>
    </div>
    </div>
@endsection
