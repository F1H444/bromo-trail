@extends('layouts.main')

@section('content')
    <div class="min-h-screen bg-zinc-50 pt-32 pb-16">
        <div class="container mx-auto px-6">
            <!-- Header -->
            <div class="max-w-3xl mx-auto text-center mb-12">
                <h2 class="text-sm font-bold text-zinc-400 uppercase tracking-widest mb-4">Spot Foto</h2>
                <h1 class="text-4xl md:text-5xl font-bold tracking-tighter text-zinc-900 leading-tight mb-6">
                    Lokasi Foto Terbaik<br>
                    di Gunung Bromo
                </h1>
                <p class="text-zinc-600 text-lg">
                    Temukan spot-spot foto paling instagramable untuk mengabadikan petualangan Anda di Gunung Bromo
                </p>
            </div>

            <!-- Google Maps Iframe -->
            <div class="bg-white border border-zinc-200 rounded-sm overflow-hidden shadow-xl mb-12">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63127.89384867384!2d112.91234567890123!3d-7.942500000000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd637aaab794a41%3A0xada40d36ecd2a5dd!2sMount%20Bromo!5e0!3m2!1sen!2sid!4v1234567890123!5m2!1sen!2sid"
                    width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

            <!-- Photo Spots List with Images -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Sunrise Point -->
                <div
                    class="bg-white border border-zinc-200 rounded-sm overflow-hidden hover:shadow-xl transition-all group">
                    <div class="aspect-video relative overflow-hidden bg-zinc-100">
                        <img src="{{ asset('images/sunrise.jpg') }}"
                            alt="Sunrise Point Penanjakan"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div
                            class="absolute top-4 left-4 px-3 py-1 bg-yellow-500 text-zinc-900 text-[10px] font-black uppercase tracking-wider rounded-sm">
                            Sunrise
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-zinc-900 mb-2">Sunrise Point (Penanjakan)</h3>
                        <p class="text-zinc-600 text-sm mb-4">
                            Spot terbaik untuk menyaksikan matahari terbit dengan pemandangan kaldera Bromo yang
                            menakjubkan.
                        </p>
                        <div class="flex items-center gap-2 text-xs text-zinc-400">
                            <i class="fa-solid fa-location-dot"></i>
                            <span>-7.9042, 112.9503</span>
                        </div>
                    </div>
                </div>

                <!-- Kawah Bromo -->
                <div
                    class="bg-white border border-zinc-200 rounded-sm overflow-hidden hover:shadow-xl transition-all group">
                    <div class="aspect-video relative overflow-hidden bg-zinc-100">
                        <img src="{{ asset('images/kawah.webp') }}" alt="Kawah Bromo"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div
                            class="absolute top-4 left-4 px-3 py-1 bg-red-500 text-white text-[10px] font-black uppercase tracking-wider rounded-sm">
                            Iconic
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-zinc-900 mb-2">Kawah Bromo</h3>
                        <p class="text-zinc-600 text-sm mb-4">
                            Pemandangan kawah aktif yang ikonik dengan asap putih mengepul. Spot wajib untuk foto dramatis.
                        </p>
                        <div class="flex items-center gap-2 text-xs text-zinc-400">
                            <i class="fa-solid fa-location-dot"></i>
                            <span>-7.9425, 112.9531</span>
                        </div>
                    </div>
                </div>

                <!-- Bukit Teletubbies -->
                <div
                    class="bg-white border border-zinc-200 rounded-sm overflow-hidden hover:shadow-xl transition-all group">
                    <div class="aspect-video relative overflow-hidden bg-zinc-100">
                        <img src="{{ asset('images/teletubbies.jpg') }}"
                            alt="Bukit Teletubbies"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div
                            class="absolute top-4 left-4 px-3 py-1 bg-green-500 text-white text-[10px] font-black uppercase tracking-wider rounded-sm">
                            Popular
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-zinc-900 mb-2">Bukit Teletubbies</h3>
                        <p class="text-zinc-600 text-sm mb-4">
                            Bukit hijau bergelombang yang menyerupai latar film Teletubbies. Sempurna untuk foto landscape.
                        </p>
                        <div class="flex items-center gap-2 text-xs text-zinc-400">
                            <i class="fa-solid fa-location-dot"></i>
                            <span>-7.9764, 112.9658</span>
                        </div>
                    </div>
                </div>

                <!-- Pasir Berbisik -->
                <div
                    class="bg-white border border-zinc-200 rounded-sm overflow-hidden hover:shadow-xl transition-all group">
                    <div class="aspect-video relative overflow-hidden bg-zinc-100">
                        <img src="{{ asset('images/pasir-berbisik.jpg') }}"
                            alt="Pasir Berbisik"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div
                            class="absolute top-4 left-4 px-3 py-1 bg-amber-500 text-zinc-900 text-[10px] font-black uppercase tracking-wider rounded-sm">
                            Golden Hour
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-zinc-900 mb-2">Pasir Berbisik</h3>
                        <p class="text-zinc-600 text-sm mb-4">
                            Hamparan pasir vulkanik luas dengan latar belakang gunung. Ideal untuk foto siluet saat golden
                            hour.
                        </p>
                        <div class="flex items-center gap-2 text-xs text-zinc-400">
                            <i class="fa-solid fa-location-dot"></i>
                            <span>-7.9425, 112.9461</span>
                        </div>
                    </div>
                </div>

                <!-- Savanna -->
                <div
                    class="bg-white border border-zinc-200 rounded-sm overflow-hidden hover:shadow-xl transition-all group">
                    <div class="aspect-video relative overflow-hidden bg-zinc-100">
                        <img src="{{ asset('images/savanna.jpg') }}"
                            alt="Savanna Bromo"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div
                            class="absolute top-4 left-4 px-3 py-1 bg-emerald-500 text-white text-[10px] font-black uppercase tracking-wider rounded-sm">
                            Pre-Wedding
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-zinc-900 mb-2">Savanna</h3>
                        <p class="text-zinc-600 text-sm mb-4">
                            Padang rumput luas dengan pemandangan gunung di kejauhan. Spot favorit untuk pre-wedding.
                        </p>
                        <div class="flex items-center gap-2 text-xs text-zinc-400">
                            <i class="fa-solid fa-location-dot"></i>
                            <span>-7.9689, 112.9625</span>
                        </div>
                    </div>
                </div>

                <!-- Tangga Kawah -->
                <div
                    class="bg-white border border-zinc-200 rounded-sm overflow-hidden hover:shadow-xl transition-all group">
                    <div class="aspect-video relative overflow-hidden bg-zinc-100">
                        <img src="{{ asset('images/tangga-kawah.jpg') }}"
                            alt="Tangga Kawah Bromo"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div
                            class="absolute top-4 left-4 px-3 py-1 bg-blue-500 text-white text-[10px] font-black uppercase tracking-wider rounded-sm">
                            Adventure
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-zinc-900 mb-2">Tangga Kawah</h3>
                        <p class="text-zinc-600 text-sm mb-4">
                            Tangga menuju kawah dengan view spektakuler. Spot unik untuk foto perjalanan yang berkesan.
                        </p>
                        <div class="flex items-center gap-2 text-xs text-zinc-400">
                            <i class="fa-solid fa-location-dot"></i>
                            <span>-7.9422, 112.9528</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tips Section -->
            <div class="mt-16 bg-zinc-900 text-white rounded-sm p-8 md:p-12">
                <h2 class="text-2xl font-bold mb-6">Tips Fotografi di Bromo</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex gap-4">
                        <div class="w-12 h-12 bg-white/10 rounded-sm flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid fa-clock text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold mb-2">Waktu Terbaik</h3>
                            <p class="text-sm text-zinc-400">Datang saat sunrise (04:00-06:00) atau golden hour
                                (16:00-18:00) untuk cahaya terbaik.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-12 h-12 bg-white/10 rounded-sm flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid fa-camera text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold mb-2">Peralatan</h3>
                            <p class="text-sm text-zinc-400">Bawa tripod untuk long exposure dan lensa wide untuk landscape
                                yang dramatis.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-12 h-12 bg-white/10 rounded-sm flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid fa-temperature-low text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold mb-2">Persiapan</h3>
                            <p class="text-sm text-zinc-400">Suhu bisa mencapai 3-5°C saat pagi. Bawa jaket tebal dan sarung
                                tangan.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-12 h-12 bg-white/10 rounded-sm flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid fa-shield-halved text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold mb-2">Keamanan</h3>
                            <p class="text-sm text-zinc-400">Lindungi kamera dari debu vulkanik dengan plastik atau rain
                                cover.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
