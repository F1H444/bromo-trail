@extends('layouts.main')

@section('content')
    <div class="min-h-screen bg-zinc-50 pt-32 pb-16">
        <div class="container mx-auto px-6">
            <!-- Header -->
            <div class="max-w-3xl mx-auto text-center mb-16">
                <h2 class="text-sm font-bold text-zinc-400 uppercase tracking-widest mb-4">Hubungi Kami</h2>
                <h1 class="text-4xl md:text-5xl font-bold tracking-tighter text-zinc-900 leading-tight mb-6">
                    Ada Pertanyaan?<br>
                    Kami Siap Membantu
                </h1>
                <p class="text-zinc-600 text-lg">
                    Tim kami siap menjawab pertanyaan Anda seputar penyewaan motor trail di Bromo
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 max-w-6xl mx-auto">
                <!-- Contact Info -->
                <div class="space-y-8">
                    <div class="bg-white border border-zinc-200 rounded-sm p-8 hover:shadow-xl transition-all">
                        <div class="w-14 h-14 bg-green-500 rounded-sm flex items-center justify-center mb-6">
                            <i class="fa-brands fa-whatsapp text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-zinc-900 mb-2">WhatsApp</h3>
                        <p class="text-zinc-600 text-sm mb-4">
                            Hubungi kami langsung via WhatsApp untuk respon cepat
                        </p>
                        <a href="https://wa.me/6282128573839" target="_blank"
                            class="inline-flex items-center gap-2 text-green-600 font-bold hover:text-green-700 transition-colors">
                            +62 821-2857-3839
                            <i class="fa-solid fa-arrow-right text-sm"></i>
                        </a>
                    </div>

                    <div class="bg-white border border-zinc-200 rounded-sm p-8 hover:shadow-xl transition-all">
                        <div class="w-14 h-14 bg-blue-500 rounded-sm flex items-center justify-center mb-6">
                            <i class="fa-solid fa-envelope text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-zinc-900 mb-2">Email</h3>
                        <p class="text-zinc-600 text-sm mb-4">
                            Kirim email untuk pertanyaan detail atau penawaran khusus
                        </p>
                        <a href="mailto:info@bromotrail.com"
                            class="inline-flex items-center gap-2 text-blue-600 font-bold hover:text-blue-700 transition-colors">
                            info@bromotrail.com
                            <i class="fa-solid fa-arrow-right text-sm"></i>
                        </a>
                    </div>

                    <div class="bg-white border border-zinc-200 rounded-sm p-8 hover:shadow-xl transition-all">
                        <div class="w-14 h-14 bg-red-500 rounded-sm flex items-center justify-center mb-6">
                            <i class="fa-solid fa-location-dot text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-zinc-900 mb-2">Lokasi</h3>
                        <p class="text-zinc-600 text-sm mb-4">
                            Kunjungi kantor kami di area Bromo
                        </p>
                        <p class="text-zinc-900 font-medium">
                            Jl. Raya Bromo No. 123<br>
                            Cemoro Lawang, Probolinggo<br>
                            Jawa Timur 67254
                        </p>
                    </div>

                    <div class="bg-white border border-zinc-200 rounded-sm p-8 hover:shadow-xl transition-all">
                        <div class="w-14 h-14 bg-zinc-900 rounded-sm flex items-center justify-center mb-6">
                            <i class="fa-solid fa-clock text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-zinc-900 mb-2">Jam Operasional</h3>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-zinc-600">Senin - Jumat</span>
                                <span class="text-zinc-900 font-bold">08:00 - 20:00</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-zinc-600">Sabtu - Minggu</span>
                                <span class="text-zinc-900 font-bold">06:00 - 22:00</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-zinc-600">Hari Libur</span>
                                <span class="text-zinc-900 font-bold">24 Jam</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="bg-white border border-zinc-200 rounded-sm p-8 shadow-xl">
                    <h3 class="text-2xl font-bold text-zinc-900 mb-6">Kirim Pesan</h3>

                    <!-- Success Message -->
                    <div id="success-message" class="hidden mb-6 p-4 bg-green-50 border border-green-200 rounded-sm">
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-check-circle text-green-600 text-xl"></i>
                            <p class="text-green-800 font-medium">Pesan berhasil dikirim! Kami akan segera menghubungi Anda.
                            </p>
                        </div>
                    </div>

                    <!-- Error Message -->
                    <div id="error-message" class="hidden mb-6 p-4 bg-red-50 border border-red-200 rounded-sm">
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-exclamation-circle text-red-600 text-xl"></i>
                            <p class="text-red-800 font-medium">Gagal mengirim pesan. Silakan coba lagi.</p>
                        </div>
                    </div>

                    <form id="contact-form" class="space-y-6">
                        <div>
                            <label for="from_name" class="block text-sm font-bold text-zinc-700 mb-2">Nama Lengkap</label>
                            <input type="text" id="from_name" name="from_name" required
                                class="w-full px-4 py-3 border border-zinc-200 rounded-sm focus:outline-none focus:border-zinc-900 transition-colors">
                        </div>

                        <div>
                            <label for="from_email" class="block text-sm font-bold text-zinc-700 mb-2">Email</label>
                            <input type="email" id="from_email" name="from_email" required
                                class="w-full px-4 py-3 border border-zinc-200 rounded-sm focus:outline-none focus:border-zinc-900 transition-colors">
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-bold text-zinc-700 mb-2">No. WhatsApp</label>
                            <input type="tel" id="phone" name="phone" required
                                class="w-full px-4 py-3 border border-zinc-200 rounded-sm focus:outline-none focus:border-zinc-900 transition-colors">
                        </div>

                        <div>
                            <label for="subject" class="block text-sm font-bold text-zinc-700 mb-2">Subjek</label>
                            <select id="subject" name="subject" required
                                class="w-full px-4 py-3 border border-zinc-200 rounded-sm focus:outline-none focus:border-zinc-900 transition-colors">
                                <option value="">Pilih Subjek</option>
                                <option value="Pertanyaan Pemesanan">Pertanyaan Pemesanan</option>
                                <option value="Informasi Harga">Informasi Harga</option>
                                <option value="Ketersediaan Motor">Ketersediaan Motor</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-bold text-zinc-700 mb-2">Pesan</label>
                            <textarea id="message" name="message" rows="6" required
                                class="w-full px-4 py-3 border border-zinc-200 rounded-sm focus:outline-none focus:border-zinc-900 transition-colors resize-none"></textarea>
                        </div>

                        <button type="submit" id="submit-btn"
                            class="w-full py-4 bg-zinc-900 text-white text-sm font-black uppercase tracking-widest rounded-sm hover:bg-zinc-800 transition-all shadow-xl hover:shadow-zinc-900/20">
                            <span id="btn-text">Kirim Pesan</span>
                            <span id="btn-loading" class="hidden">
                                <i class="fa-solid fa-spinner fa-spin"></i> Mengirim...
                            </span>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Social Media -->
            <div class="max-w-6xl mx-auto mt-16 bg-zinc-900 text-white rounded-sm p-8 md:p-12">
                <div class="text-center mb-8">
                    <h3 class="text-2xl font-bold mb-2">Ikuti Kami</h3>
                    <p class="text-zinc-400">Dapatkan update terbaru dan promo spesial di social media kami</p>
                </div>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="https://www.instagram.com/bromotrail" target="_blank"
                        class="w-14 h-14 bg-white/10 hover:bg-white/20 rounded-sm flex items-center justify-center transition-all">
                        <i class="fa-brands fa-instagram text-2xl"></i>
                    </a>
                    <a href="https://www.facebook.com/bromotrail" target="_blank"
                        class="w-14 h-14 bg-white/10 hover:bg-white/20 rounded-sm flex items-center justify-center transition-all">
                        <i class="fa-brands fa-facebook text-2xl"></i>
                    </a>
                    <a href="https://www.tiktok.com/@bromotrail" target="_blank"
                        class="w-14 h-14 bg-white/10 hover:bg-white/20 rounded-sm flex items-center justify-center transition-all">
                        <i class="fa-brands fa-tiktok text-2xl"></i>
                    </a>
                    <a href="https://www.youtube.com/@bromotrail" target="_blank"
                        class="w-14 h-14 bg-white/10 hover:bg-white/20 rounded-sm flex items-center justify-center transition-all">
                        <i class="fa-brands fa-youtube text-2xl"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- EmailJS Script -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
    <script type="text/javascript">
        (function() {
            // Initialize EmailJS with your Public Key
            emailjs.init("YOUR_PUBLIC_KEY"); // Ganti dengan Public Key Anda dari EmailJS
        })();

        document.getElementById('contact-form').addEventListener('submit', function(event) {
            event.preventDefault();

            const submitBtn = document.getElementById('submit-btn');
            const btnText = document.getElementById('btn-text');
            const btnLoading = document.getElementById('btn-loading');
            const successMsg = document.getElementById('success-message');
            const errorMsg = document.getElementById('error-message');

            // Hide messages
            successMsg.classList.add('hidden');
            errorMsg.classList.add('hidden');

            // Show loading
            btnText.classList.add('hidden');
            btnLoading.classList.remove('hidden');
            submitBtn.disabled = true;

            // Send email using EmailJS
            emailjs.sendForm('YOUR_SERVICE_ID', 'YOUR_TEMPLATE_ID', this)
                .then(function() {
                    // Success
                    successMsg.classList.remove('hidden');
                    document.getElementById('contact-form').reset();

                    // Reset button
                    btnText.classList.remove('hidden');
                    btnLoading.classList.add('hidden');
                    submitBtn.disabled = false;

                    // Hide success message after 5 seconds
                    setTimeout(() => {
                        successMsg.classList.add('hidden');
                    }, 5000);
                }, function(error) {
                    // Error
                    console.error('EmailJS Error:', error);
                    errorMsg.classList.remove('hidden');

                    // Reset button
                    btnText.classList.remove('hidden');
                    btnLoading.classList.add('hidden');
                    submitBtn.disabled = false;

                    // Hide error message after 5 seconds
                    setTimeout(() => {
                        errorMsg.classList.add('hidden');
                    }, 5000);
                });
        });
    </script>
@endsection
