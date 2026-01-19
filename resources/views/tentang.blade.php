@extends('layouts.main')

@section('content')
    <div class="pt-32 pb-12 overflow-hidden">
        <!-- Hero Section -->
        <div class="container mx-auto px-4 mb-20">
            <div class="max-w-4xl mx-auto text-center" id="about-header">
                <h1 class="text-4xl md:text-5xl font-bold mb-6 text-zinc-900 leading-tight">
                    Lebih Dari Sekadar <span class="text-zinc-400">Sewa Motor</span>
                </h1>
                <p class="text-lg md:text-xl text-zinc-600 leading-relaxed max-w-2xl mx-auto">
                    Kami hadir untuk memastikan setiap momen petualangan Anda di Gunung Bromo menjadi cerita yang tak
                    terlupakan. Fokus kami bukan hanya pada unit motor, tapi pada kenyamanan pengalaman Anda.
                </p>
            </div>
        </div>

        <!-- Story Section -->
        <div class="container mx-auto px-4 mb-24">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="relative about-image-wrapper">
                    <!-- Gradient accent removed -->
                    <div class="absolute inset-0 bg-zinc-100 rounded-3xl transform rotate-3 scale-105 -z-10"></div>
                    <img src="{{ asset('images/hero-tentang.png') }}" alt="Bromo Adventure"
                        class="rounded-3xl shadow-xl w-full h-[400px] object-cover grayscale hover:grayscale-0 transition-all duration-500">
                </div>
                <div class="about-content">
                    <h2 class="text-3xl font-bold mb-6 flex items-center gap-3">
                        <span class="w-10 h-1 bg-zinc-900 rounded-full"></span>
                        Cerita Kami
                    </h2>
                    <p class="text-zinc-600 mb-6 leading-relaxed">
                        Berawal dari kecintaan kami pada keindahan alam Bromo, **Bromotrail** didirikan untuk menjembatani
                        para petualang yang ingin mengeksplorasi laut pasir dengan cara yang lebih seru dan menantang.
                    </p>
                    <p class="text-zinc-600 mb-8 leading-relaxed">
                        Kami paham bahwa kualitas unit motor adalah kunci utama keamanan. Itulah mengapa setiap unit kami
                        selalu melalui pengecekan rutin yang ketat sebelum sampai ke tangan Anda.
                    </p>
                    <div class="bg-zinc-900 text-white p-12 rounded-3xl relative overflow-hidden">
                        <div class="relative z-10 grid grid-cols-1 md:grid-cols-2 gap-12">
                            <div>
                                <h3 class="text-2xl font-bold mb-6">Visi Kami</h3>
                                <p class="text-zinc-400 leading-relaxed italic">
                                    "Menjadi partner petualangan trail nomor satu di Bromo yang dikenal karena kualitas unit
                                    dan kemudahan layanannya."
                                </p>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold mb-6 text-zinc-300 italic">Nilai Utama</h3>
                                <ul class="space-y-4">
                                    <li class="flex items-center gap-3">
                                        <i class="fa-solid fa-shield-halved text-zinc-500"></i>
                                        <span class="text-sm font-medium">Keamanan Tanpa Kompromi</span>
                                    </li>
                                    <li class="flex items-center gap-3">
                                        <i class="fa-solid fa-bolt text-zinc-500"></i>
                                        <span class="text-sm font-medium">Layanan Cepat & Tanggap</span>
                                    </li>
                                    <li class="flex items-center gap-3">
                                        <i class="fa-solid fa-heart text-zinc-500"></i>
                                        <span class="text-sm font-medium">Kepuasan Pelanggan Utama</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Decorative element -->
                        <div
                            class="absolute top-0 right-0 w-64 h-64 bg-zinc-800 rounded-full translate-x-32 -translate-y-32">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Why Us / Values -->
        <div class="bg-zinc-900 text-white py-20 rounded-3xl mx-4 md:mx-8 mb-24 relative overflow-hidden">
            <!-- Background blobs/gradients removed -->

            <div class="container mx-auto px-6 relative z-10">
                <div class="text-center max-w-2xl mx-auto mb-16 about-values-header">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">Kenapa Memilih Kami?</h2>
                    <p class="text-zinc-400 text-lg">
                        Karena petualangan Anda di Bromo terlalu berharga untuk kompromi.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                    <!-- Value 1 -->
                    <div
                        class="p-8 bg-zinc-800 rounded-2xl border border-zinc-800 hover:border-orange-500 transition-colors duration-300 value-card">
                        <div
                            class="w-16 h-16 bg-zinc-700/50 rounded-full flex items-center justify-center mx-auto mb-6 text-orange-500 text-2xl">
                            <i class="fa-solid fa-wrench"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-white">Perawatan Primal</h3>
                        <p class="text-zinc-400 text-sm">
                            Setiap unit melalui inspeksi teknis menyeluruh setelah pemakaian. Kami memastikan performa mesin
                            dan sistem keamanan tetap optimal.
                        </p>
                    </div>

                    <!-- Value 2 -->
                    <div
                        class="p-8 bg-zinc-800 rounded-2xl border border-zinc-800 hover:border-orange-500 transition-colors duration-300 value-card">
                        <div
                            class="w-16 h-16 bg-zinc-700/50 rounded-full flex items-center justify-center mx-auto mb-6 text-orange-500 text-2xl">
                            <i class="fa-solid fa-user-shield"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-white">Safety Equipment</h3>
                        <p class="text-zinc-400 text-sm">
                            Keamanan penyewa adalah nomor satu. Kami menyediakan Helm Trail & Google standar keamanan tinggi
                            di setiap paket penyewaan.
                        </p>
                    </div>

                    <!-- Value 3 -->
                    <div
                        class="p-8 bg-zinc-800 rounded-2xl border border-zinc-800 hover:border-orange-500 transition-colors duration-300 value-card">
                        <div
                            class="w-16 h-16 bg-zinc-700/50 rounded-full flex items-center justify-center mx-auto mb-6 text-orange-500 text-2xl">
                            <i class="fa-solid fa-map-location-dot"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-white">Local Knowledge</h3>
                        <p class="text-zinc-400 text-sm">
                            Tim kami adalah warga lokal yang mengenal seluk-beluk jalur Bromo. Kami siap memberikan
                            rekomendasi rute terbaik sesuai kemampuan Anda.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA -->
        <div class="container mx-auto px-4 text-center">
            <div
                class="bg-zinc-50 border border-zinc-200 rounded-3xl p-12 max-w-4xl mx-auto transform hover:scale-[1.01] transition-transform duration-300 cta-box">
                <h2 class="text-3xl font-bold text-zinc-900 mb-4">Siap Menerjang Lautan Pasir?</h2>
                <p class="text-lg text-zinc-600 mb-8 max-w-xl mx-auto">
                    Ayo jadwalkan petualangan Anda hari ini dan rasakan sensasi menaklukkan medan Bromo.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ url('/motor') }}"
                        class="inline-flex items-center justify-center px-8 py-4 text-base font-bold text-white transition-all duration-200 bg-orange-600 border border-transparent rounded-full hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-600 shadow-lg">
                        Lihat Motor
                    </a>
                    <a href="{{ url('/cara-sewa') }}"
                        class="inline-flex items-center justify-center px-8 py-4 text-base font-bold text-zinc-700 transition-all duration-200 bg-zinc-200 border border-transparent rounded-full hover:bg-zinc-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-zinc-400">
                        Panduan Sewa
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            gsap.registerPlugin(ScrollTrigger);

            // Header Animation
            gsap.from("#about-header > *", {
                y: 30,
                opacity: 0,
                duration: 0.8,
                stagger: 0.2,
                ease: "power3.out"
            });

            // Values
            gsap.from(".value-card", {
                scrollTrigger: {
                    trigger: ".about-values-header",
                    start: "top 80%",
                },
                y: 30,
                duration: 0.6,
                stagger: 0.1,
                ease: "power2.out"
            });

            // CTA
            gsap.from(".cta-box", {
                scrollTrigger: {
                    trigger: ".cta-box",
                    start: "top 90%",
                },
                y: 20,
                opacity: 0,
                duration: 0.6,
                ease: "power2.out"
            });
        });
    </script>
@endpush
