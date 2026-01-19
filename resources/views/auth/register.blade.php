<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | Bromotrail</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                    },
                }
            }
        }
    </script>
</head>

<body class="bg-[#FAFAFA] font-sans antialiased text-zinc-900">
    <div class="min-h-screen flex items-center justify-center p-6">
        <div class="w-full max-w-md">
            <div class="text-center mb-10">
                <a href="/" class="inline-flex items-center gap-3 text-2xl font-bold tracking-tighter">
                    <img src="{{ asset('images/logo.png') }}" alt="Bromotrail Logo" class="w-10 h-10 object-contain">
                    BROMOTRAIL
                </a>
            </div>

            <div class="bg-white border border-zinc-200 p-8 shadow-sm">
                <div class="mb-8">
                    <h1 class="text-2xl font-bold tracking-tight">Buat Akun</h1>
                    <p class="text-zinc-500 text-sm mt-1">Mulai petualangan Bromo Anda hari ini.</p>
                </div>

                <form action="{{ route('register') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="space-y-2">
                        <label for="nama_lengkap" class="text-xs font-bold uppercase tracking-widest text-zinc-400">
                            Nama Lengkap
                        </label>
                        <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}"
                            required autofocus
                            class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 text-sm focus:outline-none focus:border-zinc-900 transition-colors"
                            placeholder="John Doe">
                        @error('nama_lengkap')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="email" class="text-xs font-bold uppercase tracking-widest text-zinc-400">
                            Alamat Email
                        </label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                            class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 text-sm focus:outline-none focus:border-zinc-900 transition-colors"
                            placeholder="name@company.com">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label for="no_wa" class="text-xs font-bold uppercase tracking-widest text-zinc-400">
                                No. WhatsApp
                            </label>
                            <input type="text" id="no_wa" name="no_wa" value="{{ old('no_wa') }}" required
                                class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 text-sm focus:outline-none focus:border-zinc-900 transition-colors"
                                placeholder="0812...">
                            @error('no_wa')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="space-y-2">
                            <label for="no_ktp_sim" class="text-xs font-bold uppercase tracking-widest text-zinc-400">
                                No. KTP / SIM
                            </label>
                            <input type="text" id="no_ktp_sim" name="no_ktp_sim" value="{{ old('no_ktp_sim') }}"
                                required
                                class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 text-sm focus:outline-none focus:border-zinc-900 transition-colors"
                                placeholder="3512...">
                            @error('no_ktp_sim')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="alamat_asal" class="text-xs font-bold uppercase tracking-widest text-zinc-400">
                            Alamat Asal
                        </label>
                        <textarea id="alamat_asal" name="alamat_asal" required rows="2"
                            class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 text-sm focus:outline-none focus:border-zinc-900 transition-colors"
                            placeholder="Alamat Lengkap">{{ old('alamat_asal') }}</textarea>
                        @error('alamat_asal')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="password" class="text-xs font-bold uppercase tracking-widest text-zinc-400">
                            Kata Sandi
                        </label>
                        <input type="password" id="password" name="password" required
                            class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 text-sm focus:outline-none focus:border-zinc-900 transition-colors"
                            placeholder="••••••••">
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="password_confirmation"
                            class="text-xs font-bold uppercase tracking-widest text-zinc-400">
                            Konfirmasi Kata Sandi
                        </label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                            class="w-full px-4 py-3 bg-zinc-50 border border-zinc-200 text-sm focus:outline-none focus:border-zinc-900 transition-colors"
                            placeholder="••••••••">
                    </div>

                    <div class="text-xs text-zinc-500 leading-relaxed">
                        Dengan membuat akun, Anda menyetujui
                        <a href="#" class="text-zinc-900 font-bold hover:underline">Syarat Layanan</a> dan
                        <a href="#" class="text-zinc-900 font-bold hover:underline">Kebijakan Privasi</a> kami.
                    </div>

                    <button type="submit"
                        class="w-full py-4 bg-zinc-900 text-white text-xs font-bold rounded-sm hover:bg-zinc-800 transition-colors tracking-widest uppercase">
                        Daftar
                    </button>
                </form>

                <div class="mt-8 pt-8 border-t border-zinc-100">
                    <p class="text-center text-sm text-zinc-600">
                        Sudah punya akun?
                        <a href="{{ route('login') }}" class="font-bold text-zinc-900 hover:underline">Masuk</a>
                    </p>
                </div>
            </div>

            <p class="text-center mt-8 text-zinc-400 text-[10px] uppercase tracking-widest font-medium">
                &copy; {{ date('Y') }} Bromotrail. Sistem Akses Aman.
            </p>
        </div>
    </div>
</body>

</html>
