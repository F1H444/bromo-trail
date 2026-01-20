@extends('layouts.main')

@section('content')
    <div class="pt-32 pb-12 bg-white min-h-screen">
        <!-- Header -->
        <div class="container mx-auto px-4 mb-20 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6 text-zinc-900 leading-tight" id="steps-header">
                Panduan Sewa <br><span class="text-zinc-400">Mudah & Transparan</span>
            </h1>
            <p class="text-lg text-zinc-600 max-w-2xl mx-auto leading-relaxed">
                Kami merancang sistem booking yang ringkas agar Anda bisa lebih cepat menikmati keindahan Bromo.
            </p>
        </div>

        <!-- Steps Timeline -->
        <div class="container mx-auto px-6 mb-24">
            <div class="relative max-w-4xl mx-auto">
                <!-- Vertical Line (Desktop Only) -->
                <div class="hidden md:block absolute left-1/2 top-0 bottom-0 w-0.5 bg-zinc-200 -translate-x-1/2"></div>

                <!-- Step 1 -->
                <div class="relative mb-16 md:mb-24">
                    <!-- Mobile Layout -->
                    <div class="flex md:hidden items-start gap-4 w-full">
                        <div
                            class="flex-shrink-0 w-12 h-12 bg-zinc-900 text-white rounded-full flex items-center justify-center font-bold shadow-lg">
                            1
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-zinc-900 mb-2">Pilih Motor & Durasi</h3>
                            <p class="text-zinc-600 text-sm">Jelajahi motor kami dan pilih motor yang sesuai. Tentukan
                                tanggal mulai dan tanggal kembali sewa Anda.</p>
                        </div>
                    </div>

                    <!-- Desktop Layout -->
                    <div class="hidden md:grid md:grid-cols-2 md:gap-8 md:items-center">
                        <!-- Left Content -->
                        <div class="text-right pr-8">
                            <h3 class="text-2xl font-bold text-zinc-900 mb-2">Pilih Motor & Durasi</h3>
                            <p class="text-zinc-600">Jelajahi motor kami dan pilih motor yang sesuai. Tentukan tanggal mulai
                                dan tanggal kembali sewa Anda.</p>
                        </div>
                        <!-- Right Icon -->
                        <div class="pl-8">
                            <div class="bg-zinc-50 p-6 rounded-2xl border border-zinc-100 text-center">
                                <i class="fa-solid fa-motorcycle text-4xl text-zinc-400"></i>
                            </div>
                        </div>
                    </div>
                    <!-- Center Number (Desktop) -->
                    <div
                        class="hidden md:flex absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-12 h-12 bg-white border-4 border-zinc-900 rounded-full items-center justify-center font-bold text-zinc-900 z-10 shadow-lg">
                        1
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="relative mb-16 md:mb-24">
                    <!-- Mobile Layout -->
                    <div class="flex md:hidden items-start gap-4 w-full">
                        <div
                            class="flex-shrink-0 w-12 h-12 bg-zinc-900 text-white rounded-full flex items-center justify-center font-bold shadow-lg">
                            2
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-zinc-900 mb-2">Lengkapi Data Diri</h3>
                            <p class="text-zinc-600 text-sm">Isi formulir dengan Nama Lengkap, Nomor WhatsApp aktif, Alamat
                                Asal, dan upload identitas (KTP/SIM) yang masih berlaku.</p>
                        </div>
                    </div>

                    <!-- Desktop Layout -->
                    <div class="hidden md:grid md:grid-cols-2 md:gap-8 md:items-center">
                        <!-- Left Icon -->
                        <div class="pr-8">
                            <div class="bg-zinc-50 p-6 rounded-2xl border border-zinc-100 text-center">
                                <i class="fa-solid fa-file-pen text-4xl text-zinc-400"></i>
                            </div>
                        </div>
                        <!-- Right Content -->
                        <div class="text-left pl-8">
                            <h3 class="text-2xl font-bold text-zinc-900 mb-2">Lengkapi Data Diri</h3>
                            <p class="text-zinc-600">Isi formulir dengan Nama Lengkap, Nomor WhatsApp aktif, Alamat Asal,
                                dan upload identitas (KTP/SIM) yang masih berlaku.</p>
                        </div>
                    </div>
                    <!-- Center Number (Desktop) -->
                    <div
                        class="hidden md:flex absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-12 h-12 bg-white border-4 border-zinc-900 rounded-full items-center justify-center font-bold text-zinc-900 z-10 shadow-lg">
                        2
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="relative mb-16 md:mb-24">
                    <!-- Mobile Layout -->
                    <div class="flex md:hidden items-start gap-4 w-full">
                        <div
                            class="flex-shrink-0 w-12 h-12 bg-zinc-900 text-white rounded-full flex items-center justify-center font-bold shadow-lg">
                            3
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-zinc-900 mb-2">Pembayaran & Konfirmasi</h3>
                            <p class="text-zinc-600 text-sm">Lakukan transfer ke rekening resmi kami. Setelah transfer,
                                upload bukti pembayaran Anda di halaman konfirmasi.</p>
                        </div>
                    </div>

                    <!-- Desktop Layout -->
                    <div class="hidden md:grid md:grid-cols-2 md:gap-8 md:items-center">
                        <!-- Left Content -->
                        <div class="text-right pr-8">
                            <h3 class="text-2xl font-bold text-zinc-900 mb-2">Pembayaran & Konfirmasi</h3>
                            <p class="text-zinc-600">Lakukan transfer ke rekening resmi kami. Setelah transfer, upload bukti
                                pembayaran Anda di halaman konfirmasi.</p>
                        </div>
                        <!-- Right Icon -->
                        <div class="pl-8">
                            <div class="bg-zinc-50 p-6 rounded-2xl border border-zinc-100 text-center">
                                <i class="fa-solid fa-receipt text-4xl text-zinc-400"></i>
                            </div>
                        </div>
                    </div>
                    <!-- Center Number (Desktop) -->
                    <div
                        class="hidden md:flex absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-12 h-12 bg-white border-4 border-zinc-900 rounded-full items-center justify-center font-bold text-zinc-900 z-10 shadow-lg">
                        3
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="relative">
                    <!-- Mobile Layout -->
                    <div class="flex md:hidden items-start gap-4 w-full">
                        <div
                            class="flex-shrink-0 w-12 h-12 bg-zinc-900 text-white rounded-full flex items-center justify-center font-bold shadow-lg">
                            4
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-zinc-900 mb-2">Verifikasi & Pengambilan</h3>
                            <p class="text-zinc-600 text-sm">Admin akan memverifikasi pesanan Anda. Jika sudah oke, Anda
                                tinggal datang ke lokasi kami untuk serah terima unit.</p>
                        </div>
                    </div>

                    <!-- Desktop Layout -->
                    <div class="hidden md:grid md:grid-cols-2 md:gap-8 md:items-center">
                        <!-- Left Icon -->
                        <div class="pr-8">
                            <div class="bg-zinc-50 p-6 rounded-2xl border border-zinc-100 text-center">
                                <i class="fa-solid fa-vignette text-4xl text-zinc-400"></i>
                            </div>
                        </div>
                        <!-- Right Content -->
                        <div class="text-left pl-8">
                            <h3 class="text-2xl font-bold text-zinc-900 mb-2">Verifikasi & Pengambilan</h3>
                            <p class="text-zinc-600">Admin akan memverifikasi pesanan Anda. Jika sudah oke, Anda tinggal
                                datang ke lokasi kami untuk serah terima unit.</p>
                        </div>
                    </div>
                    <!-- Center Number (Desktop) -->
                    <div
                        class="hidden md:flex absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-12 h-12 bg-white border-4 border-zinc-900 rounded-full items-center justify-center font-bold text-zinc-900 z-10 shadow-lg">
                        4
                    </div>
                </div>
            </div>
        </div>

        <!-- Requirements & FAQ -->
        <div class="bg-zinc-50 py-20">
            <div class="container mx-auto px-4 max-w-5xl">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
                    <!-- Requirements -->
                    <div>
                        <h3 class="text-2xl font-bold text-zinc-900 mb-6 flex items-center gap-3">
                            <i class="fa-solid fa-circle-exclamation text-zinc-400"></i> Syarat & Ketentuan
                        </h3>
                        <div class="bg-white p-8 rounded-2xl border border-zinc-200 shadow-sm">
                            <ul class="space-y-4">
                                <li class="flex items-start gap-3 text-sm">
                                    <i class="fa-solid fa-check text-green-600 mt-1"></i>
                                    <p class="text-zinc-600">Wajib membawa E-KTP asli sebagai jaminan selama masa penyewaan.
                                    </p>
                                </li>
                                <li class="flex items-start gap-3 text-sm">
                                    <i class="fa-solid fa-check text-green-600 mt-1"></i>
                                    <p class="text-zinc-600">Memiliki SIM C yang valid (boleh diperlihatkan via foto).</p>
                                </li>
                                <li class="flex items-start gap-3 text-sm">
                                    <i class="fa-solid fa-check text-green-600 mt-1"></i>
                                    <p class="text-zinc-600">Pelunasan dilakukan paling lambat saat serah terima unit.</p>
                                </li>
                                <li class="flex items-start gap-3 text-sm">
                                    <i class="fa-solid fa-check text-green-600 mt-1"></i>
                                    <p class="text-zinc-600">Segala kerusakan unit akibat kelalaian penyewa menjadi tanggung
                                        jawab penyewa.</p>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- FAQ -->
                    <div>
                        <h3 class="text-2xl font-bold text-zinc-900 mb-6 flex items-center gap-3">
                            <i class="fa-solid fa-circle-question text-zinc-400"></i> Pertanyaan Umum
                        </h3>
                        <div class="space-y-4">
                            <div class="bg-white p-6 rounded-xl border border-zinc-200 shadow-sm">
                                <h4 class="font-bold text-zinc-900 mb-2 text-sm">Apa saja metode pembayarannya?</h4>
                                <p class="text-xs text-zinc-600 leading-relaxed">Kami menerima transfer via Bank BRI dan
                                    beberapa E-Wallet populer seperti Dana, Gopay, dan ShopeePay. Detail nomor rekening akan
                                    tampil setelah Anda
                                    membuat pesanan.</p>
                            </div>
                            <div class="bg-white p-6 rounded-xl border border-zinc-200 shadow-sm">
                                <h4 class="font-bold text-zinc-900 mb-2 text-sm">Bagaimana jika saya ingin membatalkan sewa?
                                </h4>
                                <p class="text-xs text-zinc-600 leading-relaxed">Pembatalan dapat dilakukan minimal 24 jam
                                    sebelum hari H untuk pengembalian dana penuh (dipotong biaya admin).</p>
                            </div>
                            <div class="bg-white p-6 rounded-xl border border-zinc-200 shadow-sm">
                                <h4 class="font-bold text-zinc-900 mb-2 text-sm">Apakah ada biaya tambahan untuk
                                    perlengkapan?</h4>
                                <p class="text-xs text-zinc-600 leading-relaxed">Harga sewa standar sudah termasuk Helm
                                    Trail & Google. Perlengkapan tambahan seperti Boots atau Decker tersedia dengan biaya
                                    tambahan yang terjangkau.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Bottom -->
        <div class="container mx-auto px-4 py-16 text-center">
            <h2 class="text-2xl md:text-3xl font-bold text-zinc-900 mb-8">Berani Taklukkan Bromo?</h2>
            <a href="{{ url('/motor') }}"
                class="inline-flex items-center justify-center px-10 py-4 text-lg font-bold text-white transition-all duration-200 bg-zinc-900 border border-transparent rounded-sm hover:bg-zinc-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-zinc-900 shadow-lg hover:shadow-zinc-900/40 tracking-widest uppercase">
                Pilih Unit Sekarang <i class="fa-solid fa-arrow-right ml-2 text-sm"></i>
            </a>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            gsap.registerPlugin(ScrollTrigger);

            // Header
            gsap.from("#steps-header > *", {
                y: 30,
                opacity: 0,
                duration: 0.8,
                stagger: 0.1,
                ease: "power2.out"
            });

            // Steps
            gsap.from(".step-item", {
                scrollTrigger: {
                    trigger: ".step-item",
                    start: "top 85%",
                },
                y: 40,
                // Removed opacity 0 to ensure content is visible quickly
                duration: 0.6,
                stagger: 0.15,
                ease: "power2.out"
            });
        });
    </script>
@endpush
